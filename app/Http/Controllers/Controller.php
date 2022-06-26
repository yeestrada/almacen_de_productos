<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Generic filter
     *
     * @param $data data to filter
     * @param $table table to search
     * @param array $exceptions in case of specific param if you want to change the query
     * @param array $join
     * @param array $selects
     * @param bool $not_perm
     * @return \Illuminate\Http\Response
     */
    public function internalFilter($data, $info, $exceptions = [], $join = [], $selects = [], $not_perm = false){
        $string_types = ['text','char','character varying'];
        $date_types = ['timestamp without time zone','date'];
        $var_types = DB::table('information_schema.columns')
            ->select('column_name','data_type')
            ->where('table_name',$info['table'])
            ->pluck('data_type','column_name')->toArray();

        $autocomplete = isset($data['autocomplete']);
        $allparams = isset($data['allparams'])? $data['allparams']: true;

        $info['order_by']= isset($info['order_by'])? $info['order_by']:'T.id';

        if(!$autocomplete && $allparams) {
            $totalData = DB::select(sprintf("Select count(*) from %s", $info['table']))[0]->count;
            $totalFiltered = $totalData;
            $limit = $data['length'];
            $start = $data['start'];
            $order = $info['columns'][$data['order'][0]['column']];
            $dir = $data['order'][0]['dir'];
            $draw = $data['draw'];
            $limit = sprintf("  LIMIT %s OFFSET %s ", $data['length'], $data['start']);
        }
        else
            $limit = "  LIMIT 10 OFFSET 0 ";

        $where = '';
        $query = sprintf("SELECT * FROM (SELECT %s %s",
            $autocomplete?'Distinct ':'',
            $allparams == true? sprintf('T.id as id_%s, *', $info['table']): array_keys($data['filter'])[0]);//. array_keys($data['filter'])[0]
        foreach ($selects as $s)
            $query .= ','. $s;

        $query .= sprintf(" from %s as T ", $info['table']);
        if(isset($data['filter']))
            foreach($data['filter'] as $key => $value) {
                $temp = '';
                $key =  str_replace("_filter", "", $key);
                if (!empty($value) || !is_null($value))
                    if(array_key_exists($key, $exceptions))
                        $temp = $exceptions[$key];
                    else{
                        if(isset($var_types[$key]) && in_array($var_types[$key], $string_types))
                            $temp = "lower(\"$key\") LIKE lower('%$value%')";
                        else if(isset($var_types[$key]) && in_array($var_types[$key], $date_types)){
                            $dtime = \DateTime::createFromFormat("d/m/Y", $value);
                            $temp = "to_char($key, 'DD-MM-YYYY') = "."'".date_format($dtime, 'd-m-Y')."'";
                        }
                        else if(isset($var_types[$key]))
                            $temp = '"'.$key.'" = '."'$value'";
                        else
                            $temp =  !is_numeric($value)? "lower(\"$key\") LIKE lower('%$value%')": '"'.$key.'" = '."'$value'";
                    }

                if (!empty($temp))
                    $where .= $temp . " AND ";
            }
        //joins
        foreach($join as $key => $j)
            $query .= 'LEFT JOIN ' . $j;

        $query .= sprintf(' ORDER BY %s ',$info['order_by']);

        $query .= ') as TT ';
        $where = empty($where)? '': ' where '. rtrim($where, 'AND ');
        #var_dump($query.$where.$limit);die;
        $response = DB::select($query.$where.$limit);
        if($autocomplete)
            return json_encode($response);

        $totalFiltered = count(DB::select($query.$where));

        $data = array();
        if(!empty($response)){
            foreach ($response as $r) {
                foreach ($info['columns'] as $c) {
                    if (isset($info['replace'][$c])) {
                        if (isset($info['replace'][$c]['replace_link'])) {
                            $url = null;
                            if (!is_null($r->$c)) {
                                $arr = explode('\\', $r->$c);
                                $url = $info['replace'][$c]['replace_link']['data']['url'] . '\\' . end($arr);
                            }
                            $name = $info['replace'][$c]['replace_link']['data']['name'];
                            $nestedData[$c] = is_null($url) ? '' : sprintf($info['replace'][$c]['replace_link']['text'], $url, $r->$name);
                        } else $nestedData[$c] = $info['replace'][$c][$r->$c];
                    } else {
                        $nestedData[$c] = $r->$c;
                    }
                }

                $options = '';
                $id = 'id_' . $info['table'];

                #var_dump($info);die;
                $show = route($info['route']['show']['name'], $r->$id);
                $col = isset($info['route']['show']['col']) ? $info['route']['show']['col'] : 'col-sm-3';
                $options .= sprintf('<div class="' . $col . '">
                                            <a href="%s" class="btn btn-default btn-sm" title="%s">
                                                <i class="entypo-eye"></i>
                                            </a>
                                        </div>', $show, $info['route']['show']['text']);

                $edit = route($info['route']['edit']['name'], $r->$id);
                $col = isset($info['route']['edit']['col']) ? $info['route']['edit']['col'] : 'col-sm-3';
                $options .= sprintf('<div class="' . $col . '">
                                            <a href="%s" class="btn btn-default btn-sm" title="%s">
                                                <i class="entypo-pencil"></i>
                                            </a>
                                        </div>', $edit, $info['route']['edit']['text']);


                foreach (array_keys($info['route']) as $script_funct){
                    if(strpos($script_funct,'script') !== false){
                        $function = $info['route'][$script_funct]['function'];
                        $col = isset($info['route'][$script_funct]['col']) ? $info['route']['destroy']['col'] : 'col-sm-3';
                        $modal = isset($info['route'][$script_funct]['modal'])? 'data-toggle="modal" data-target="#'.$info['route'][$script_funct]['modal'].'"': '';
                        $da = isset($info['route'][$script_funct]['data'])? $info['route'][$script_funct]['data']: '';
                        $options .= sprintf('<div class="' . $col . '">
                                        <div id="cat-'.$script_funct.'"   
                                            <button type="button" name="btn_'.$script_funct.'" class="btn btn-default btn-sm" title="%s" '.$modal.' onclick="%s ( %s )">
                                                <i class="%s"></i>
                                            </button>
                                        </div>
                                     </div>', $info['route'][$script_funct]['text'], $info['route'][$script_funct]['function'], $r->$da, $info['route'][$script_funct]['icon']);
                    }
                }

                $destroy = route($info['route']['destroy']['name'], $r->$id);
                $col = isset($info['route']['destroy']['col']) ? $info['route']['destroy']['col'] : 'col-sm-3';
                $options .= sprintf('<div class="' . $col . '">
                                    <form id="cat-%s" action="%s" method="post">
                                        %s
                                        <input type="hidden" name="_method" value="DELETE"/>    
                                        <button type="button" name="btnTrash" class="btn btn-danger btn-sm" title="%s" data-id="%s">
                                            <i class="entypo-trash"></i>
                                        </button>
                                    </form>
                                 </div>', $r->$id, $destroy, csrf_field(), $info['route']['destroy']['text'], $r->$id);


                $nestedData['options'] = $options;
                $data[] = $nestedData;
            }
        }
        //var_dump('hola');die();

        return json_encode([
            "draw"            => intval($draw),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        ]);
    }

    public static function getComponent($name, $text = '', $value= '',$others = null){
        $id = $name;
        $component = '';
        switch (gettype($value)){
            case "boolean": $component = <<<EOD
                    <div class="col-sm-2 row" style="margin-left: 1px; margin-bottom: 5px">
                         <input type="checkbox" style="alignment: left" value="1" class="form-control filter_item" id="$id" title='$text' name="$id">$text                         
                    </div>
EOD;
                break;
            case "integer":
            case "double":$component = <<<EOD
                     <div class="row col-sm-2" style="margin-left: 1px; margin-bottom: 5px">
                        <input type="number" class="form-control filter_item" name="$id" id="$id" placeholder="$text" title='$text' autofocus/>
                     </div>
EOD;
                break;
            case "string":$component = <<<EOD
                     <div class="row col-sm-2" style="margin-left: 1px; margin-bottom: 5px">
                            <input type="text" class="form-control filter_item" name="$id" id="$id" placeholder="$text" title='$text' autofocus/>
                     </div>
EOD;
                break;
            case "object":
                if($value instanceof \DateTime){
                    $component = <<<EOD
                        <div class="row col-sm-2" style='margin-left: 1px; margin-bottom: 5px;'>
                            <input type="text" class="form-control js_datepicker filter_item" name='$id' id='$id' title='$text'  placeholder="$text" autofocus>
                        </div>
EOD;
                }
                break;

            case "array":
                $component = "
                     <div class='row col-sm-2' style='margin-left: 1px; margin-bottom: 5px;'>
                        <select class='form-control filter_item js_select' name='$id' id='$id' title='$text' autofocus>
                            <option value='' style='display:none' disabled selected hidden>$text</option>";
                foreach($value as $key => $value)
                    $component .="<option value='$key'>".$value."</option>";
                $component .="</select>
                     </div>";
                break;
        }
        return ['component'=>$component, 'text'=>$text, 'id'=>$id];
    }
}
