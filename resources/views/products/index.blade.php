@extends('layout')

@section('breadcrumb')
    <li>
{{--        <a href="{{ route('home') }}"><i class="fa fa-home"></i>{{ trans('admin.home') }}</a>--}}
    </li>
    <li class="active">
        <strong>{{$title}}</strong>
    </li>
@endsection

@section('content')
    {{-- start filter--}}
    <div class="rcorners">
        <form role="form" id="filter-form" class="form-horizontal form-groups-bordered" method="post">
            {{ csrf_field() }}
            <div class="row" style="padding-left: 30px">
                <div class="col-sm-offset-11 col-sm-1 filter_submit" >
                    <button type="submit" class="btn btn-blue btn-icon pull-right" style="margin-top: -5px;">
                        {{trans('admin.search')}}
                        <i class="entypo-search"></i>
                    </button>
                </div>
                <div class="form-group col-sm-12" style="margin-top: -40px;" >
                    <h2>{{trans('admin.filter_parameters')}}</h2>
                    <select class="select2 filter_data" placeholder="{{trans('admin.filter')}}" multiple>
                        @foreach($columns as $key => $val)
                            <option value="{{$key}}">{{$val['text']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="filter-menu" hidden style="margin-bottom: 10px"></div>
        </form>
    </div>
    {{-- end filter--}}
    <div class="rcorners table-download" style="margin-top: 10px">
        <table class="table table-bordered table-striped datatable" id="table-2" style="width: 100%">
            <thead>
            <tr>
                <th style="width: 15px">{{trans('admin.select')}}</th>
                <th>{{trans('admin.name')}}</th>
                <th>{{trans('admin.sku')}}</th>
                <th>{{trans('admin.brand')}}</th>
                <th>{{trans('admin.price')}}</th>
                <th>{{trans('admin.sales_price')}}</th>
                <th>{{trans('admin.type')}}</th>
                <th style="width: 20%;">{{trans('admin.actions')}}</th>
            </tr>
            </thead>
        </table>
    </div>
    <br/>
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm" title="{{trans('admin.add_products')}}">
            <i class="entypo-plus"></i>
    </a>
@endsection

@section('script_down')
    <script type="text/javascript">
            (function($){
            $(window).on('load',function(){
                var product_table = $("#table-2");

                // Initialize DataTable
                product_table.DataTable( {
                    "language":{
                        "url": "{{ asset('js/datatable/'.App::getLocale().'/datatable.json') }}"
                    },
                    "searching": false,
                    "lengthMenu": [[10, 25, 50], [10, 25, 50]],
                    "stateSave": true,
                    "displayLength": 10,
                    "pageLength": 10,
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        "url": "{{route('products.filter')}}",
                        "dataType": "json",
                        "type": "POST",
                        "data": function(d){update_params(d)}
                    },
                    "columns": [
                        { "data": "selected" },
                        { "data": "nombre" },
                        { "data": "sku" },
                        { "data": "marca" },
                        { "data": "costo" },
                        { "data": "precio_venta" },
                        { "data": "tipo" },
                        { "data": "options" }
                    ],
                    columnDefs: [ {
                        orderable: false,
                        className: 'select-checkbox',
                        targets:   0
                    } ],
                    select: {
                        style:    'multi',
                        selector: 'td:first-child'
                    }
                });

                product_table.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
                    minimumResultsForSearch: -1
                });

                // start filter part
                $('.filter_data').change(function(){
                    var value = $(this).val() == null? new Array(): $(this).val();
                    var columns = {!! json_encode($columns) !!};
                    update_filters(value,columns);
                });

                $( "#filter-form" ).submit(function( event ) {
                    event.preventDefault();
                    product_table.DataTable().ajax.reload();
                });
           });
        })(jQuery);
    </script>
@endsection
