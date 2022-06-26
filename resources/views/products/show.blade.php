@extends('layout')

@section('breadcrumb')
    <li>
        <a href="{{ route('products.index') }}">{{ trans('admin.products') }}</a>
    </li>
    <li class="active">
        <strong>{{$title}}</strong>
    </li>
@endsection

@section('script_up')
    <script src="{{ asset('js/icon-picker/icon-picker.js') }}"></script>
@endsection

@section('content')
    <form role="form" class="form-horizontal form-groups-bordered" method="post" action="{{ route('products.update', $product) }}">
        {{ csrf_field() }}

        @if ($errors->any())
            <div class="row">
                <div class="col-sm-offset-2 col-sm-8">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-group{{ $errors->any() ? ' has-error' : '' }}">
            <div class="col-md-3" style="margin-top: -10px; padding-top: 10px">
                <h4 class="roboto">{{trans('admin.products_data')}}</h4>
                <div class="rcorners" style="height: 285px; overflow-y: auto">
                    <table style="border: none; font-family: 'Open Sans Light'" id="data_recorded">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-8">
                <div class="col-md-12" style="margin-bottom: 15px">
                    <div class="col-md-7">
                        <div class="top_rcorners" style="margin-left: -30px; color: #003756; font-family: 'Century Gothic'">
                            {{$title}}
                        </div>
                    </div>
                </div>
                <div class="panel minimal" >
                    <!-- panel head -->
                    <div class="panel-heading">
                        <div class="panel-title roboto">{!! trans('admin.product') !!}</div>
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active" data-name="{!! trans('admin.products') !!}">
                                    <a href="#product_tab" data-toggle="tab"><i class="fa fa-archive"></i></a>
                                </li>
                                <li data-name="{!! trans('admin.products_data') !!}">
                                    <a href="#data_tab" data-toggle="tab"><i class="fa fa-info"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- panel body -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" style="height: 195px; " id="product_tab" name="{{trans('admin.products')}}">
                                <div class="rcorners" style="margin-top: 20px">
                                    <div class="verticalLine">
                                        <div class="row">
                                            <label for="nombre" class="col-sm-3 control-label">{{trans('admin.name')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nombre" id="nombre" value="{{$product->nombre}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="sku" class="col-sm-3 control-label">{{trans('admin.sku')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="sku" id="sku" value="{{$product->sku}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="marca" class="col-sm-3 control-label">{{trans('admin.brand')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="marca" id="marca" value="{{$product->marca}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="costo" class="col-sm-3 control-label">{{trans('admin.price')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control" name="costo" id="costo" value="{{$product->costo}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="tipo" class="col-sm-3 control-label">{{trans('admin.type')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="tipo" id="tipo" value="{{$product->getProductType()}}" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane readonly" style="height: 195px; " id="data_tab" name="{{trans('admin.data')}}">
                                <div class="rcorners" style="margin-top: 20px">
                                    <div class="verticalLine">
                                        <div class="tv product_optional" @if($product->getProductType() != 'tv') hidden @endif>
                                            <div class="row">
                                                <label for="tipo_pantalla" class="col-sm-3 control-label">{{trans('admin.screen_type')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control make_user recorder" name="tipo_pantalla" id="tipo_pantalla" value="{{$product->getChildData() != null?$product->getChildData()->tipo_pantalla:''}}" readonly/>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="tamano_pantalla" class="col-sm-3 control-label">{{trans('admin.screen_size')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control make_user recorder" name="tamano_pantalla" id="tamano_pantalla" value="{{$product->getChildData() != null?$product->getChildData()->tamano_pantalla:''}}" readonly/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="laptop product_optional" @if($product->getProductType() != 'laptop') hidden @endif>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="procesador" class="col-sm-3 control-label">{{trans('admin.processor')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control make_user recorder" name="procesador" id="procesador" value="{{$product->getChildData() != null?$product->getChildData()->procesador:''}}" readonly/>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="ram" class="col-sm-3 control-label">{{trans('admin.ram')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control make_user recorder" name="ram" id="ram" value="{{$product->getChildData() != null?$product->getChildData()->ram:''}}" readonly/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shoes product_optional" @if($product->getProductType() != 'shoes') hidden @endif>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="material" class="col-sm-3 control-label">{{trans('admin.material')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control make_user recorder" name="material" id="material" value="{{$product->getChildData() != null?$product->getChildData()->material:''}}" readonly/>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="numero" class="col-sm-3 control-label">{{trans('admin.number')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control make_user recorder" name="numero" id="numero" value="{{$product->getChildData() != null?$product->getChildData()->numero:''}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script_down')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.remove-icon').remove();
            $('.product_optional').hide();
            var type = '{{$product->getProductType()==null?'':$product->getProductType()}}';
            if (type == '')
                type = $('#tipo').children("option:selected").val()
            $('.'+ type).show();

            $(".panel-body :input").each(function(e){
                id = this.id;
                if (this.value != '')
                    record($(this), $(this).val());
            });
        });
    </script>
@endsection