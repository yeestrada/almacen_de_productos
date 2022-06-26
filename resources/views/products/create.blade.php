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
    <form role="form" class="form-horizontal form-groups-bordered" method="post" action="{{ route('products.store') }}">
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
                                                <input type="text" class="form-control make_user recorder" name="nombre" id="nombre" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="sku" class="col-sm-3 control-label">{{trans('admin.sku')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control make_user recorder" name="sku" id="sku" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="marca" class="col-sm-3 control-label">{{trans('admin.brand')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control make_user recorder" name="marca" id="marca" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="costo" class="col-sm-3 control-label">{{trans('admin.price')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="number" class="form-control make_user recorder" name="costo" id="costo" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 5px">
                                            <label for="tipo" class="col-sm-3 control-label">{{trans('admin.type')}}<span style="color: red">*</span></label>
                                            <div class="col-sm-9">
                                                <select id="tipo" name="tipo" class="form-control select2 recorder selector" >
                                                    @foreach($tipo as $key=>$val)
                                                        <option value="{{ $key }}" selected>{{ $val }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" style="height: 195px; " id="data_tab" name="{{trans('admin.data')}}">
                                <div class="rcorners" style="margin-top: 20px">
                                    <div class="verticalLine">
                                        <div class="tv product_optional" hidden>
                                            <div class="row">
                                                <label for="tipo_pantalla" class="col-sm-3 control-label">{{trans('admin.screen_type')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <select id="tipo_pantalla" name="tipo_pantalla" class="form-control select2 recorder" >
                                                        <option value="" selected>---{{trans('admin.select')}} ---</option>
                                                        @foreach($tipo_pantalla as $key=>$val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="tamano_pantalla" class="col-sm-3 control-label">{{trans('admin.screen_size')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control make_user recorder" name="tamano_pantalla" id="tamano_pantalla" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="laptop product_optional" hidden>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="procesador" class="col-sm-3 control-label">{{trans('admin.processor')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <select id="procesador" name="procesador" class="form-control select2 recorder" >
                                                        <option value="" selected>---{{trans('admin.select')}} ---</option>
                                                        @foreach($procesador as $key=>$val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="ram" class="col-sm-3 control-label">{{trans('admin.ram')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control make_user recorder" name="ram" id="ram" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="shoes product_optional" hidden>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="material" class="col-sm-3 control-label">{{trans('admin.material')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <select id="material" name="material" class="form-control select2 recorder" >
                                                        <option value="" selected>---{{trans('admin.select')}} ---</option>
                                                        @foreach($material as $key=>$val)
                                                            <option value="{{ $key }}" >{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 5px">
                                                <label for="numero" class="col-sm-3 control-label">{{trans('admin.number')}}<span style="color: red">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control make_user recorder" name="numero" id="numero" />
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
            <div class="col-sm-offset-5 col-sm-3 text-center">
                <button type="submit" class="btn btn-default submit_form">{{ trans('admin.send') }}</button>
            </div>
        </div>

    </form>
@endsection

@section('script_down')
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.remove-icon').remove();
            $('.product_optional').hide();
            $('.'+ $('#tipo').children("option:selected").val()).show();

            $('.selector').on('change', function (e) {
                $('.product_optional').hide();
                $('.'+this.value).show();
            });
        });
    </script>
@endsection