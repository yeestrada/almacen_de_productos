<?php

namespace App;

use App\Exports\ClassExport;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'nombre',
        'sku',
        'marca',
        'costo'
    ];

    public function getProductType()
    {
        $prod =Tv::where('id_product', $this->id)->first();
        if (!is_null($prod)) return 'tv';

        $prod =Laptop::where('id_product', $this->id)->first();
        if (!is_null($prod)) return 'laptop';

        $prod =Shoe::where('id_product', $this->id)->first();
        if (!is_null($prod)) return 'shoes';
        return null;
    }

    public function getChildData(){
        $prod =Tv::where('id_product', $this->id)->first();
        if (!is_null($prod)) return $prod;

        $prod =Laptop::where('id_product', $this->id)->first();
        if (!is_null($prod)) return $prod;

        $prod =Shoe::where('id_product', $this->id)->first();
        if (!is_null($prod)) return $prod;
    }

    public static function getTableColumns() {

        $type = array('Laptop'=>"Laptop",'Tv' => "Tv",trans('admin.shoe') => trans('admin.shoe'));

        return [
            'name'=> Controller::getComponent('nombre', trans('admin.name')),
            'sku'=> Controller::getComponent('sku', trans('admin.sku')),
            'marca'=> Controller::getComponent('brand', trans('admin.brand')),
            'price'=> Controller::getComponent('price', trans('admin.price'), 0),
            'sales_price'=> Controller::getComponent('sales_price', trans('admin.sales_price'), 0),
            'type'=> Controller::getComponent('tipo', trans('admin.type'), $type),
           ];
    }
}
