<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Admin Panel"/>
    <meta name="author" content=""/>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}">

    <title>{{trans('admin.app_title')}} | {{$title}}</title>

    <link rel="stylesheet" href="{{ asset('css/neon/font-icons/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neon/font-icons/entypo/css/entypo.css') }}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{ asset('css/neon/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neon/neon-core.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neon/neon-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neon/neon-forms.css') }}">
    <link rel="stylesheet" href="{{ asset('css/neon/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icon-picker/icon-picker.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/political/person-modal.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/political/back_end_changes.css') }}">

    <script src="{{ asset('js/jquery-1.12.4/jquery-1.12.4.js') }}"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <![endif]-->


    <link rel="stylesheet" href="{{ asset('js/neon/datatables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/select2/select2-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/daterangepicker/daterangepicker-bs3.css') }}">

    <link rel="stylesheet" href="{{ asset('js/neon/selectboxit/jquery.selectBoxIt.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/icheck/skins/minimal/_all.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/icheck/skins/square/_all.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/icheck/skins/flat/_all.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/icheck/skins/futurico/futurico.css') }}">
    <link rel="stylesheet" href="{{ asset('js/neon/icheck/skins/polaris/polaris.css') }}">

    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <!-- Bottom scripts (common) -->
    <script src="{{ asset('js/neon/gsap/TweenMax.min.js') }}"></script>
    <script src="{{ asset('js/neon/bootstrap.js') }}"></script>
    <script src="{{ asset('js/neon/joinable.js') }}"></script>
    <script src="{{ asset('js/neon/resizeable.js') }}"></script>
    <script src="{{ asset('js/neon/neon-api.js') }}"></script>
    <script src="{{ asset('js/neon/neon-charts.js') }}"></script>

    <!--Charts-->
    <script src="{{ asset('js/chartjs/js/Chart.js') }}"></script>
    <script src="{{ asset('js/chartjs/js/Chart.bundle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/chartjs/css/Chart.css') }}">

    <script src="{{ asset('js/neon/datatables/datatables.js') }}"></script>
    <script src="{{ asset('js/neon/select2/select2.min.js') }}"></script>
    <script src="{{ asset('js/neon/typeahead.min.js') }}"></script>
    <script src="{{ asset('js/neon/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/neon/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/neon/moment.min.js') }}"></script>
    <script src="{{ asset('js/neon/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/neon/jquery.multi-select.js') }}"></script>

    <script src="{{ asset('js/neon/fileinput.js') }}"></script>
    <script src="{{ asset('js/neon/selectboxit/jquery.selectBoxIt.min.js') }}"></script>

    <script src="{{ asset('js/neon/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('js/neon/typeahead.min.js') }}"></script>

    <script src="{{ asset('js/neon/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/neon/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/neon/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('js/neon/moment.min.js') }}"></script>
    <script src="{{ asset('js/neon/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/neon/icheck/icheck.min.js') }}"></script>

    <script src="{{ asset('js/neon/bootstrap-switch.min.js') }}"></script>

    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

    <script src="{{ asset('js/neon/neon-chat.js') }}"></script>
    <script src="{{ asset('js/political/jquery.validate.min.js') }}"></script>


<!-- JavaScripts initializations and stuff -->
    <script src="{{ asset('js/neon/neon-custom.js') }}"></script>

    <!-- Demo Settings -->
    <script src="{{ asset('js/neon/neon-demo.js') }}"></script>

    <!--notify-->
    <script src="{{ asset('js/notify.min.js') }}"></script>

    <!--Charts-->
        <script src="{{ asset('js/chartjs/js/Chart.js') }}"></script>
    <script src="{{ asset('js/chartjs/js/Chart.bundle.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/chartjs/css/Chart.css') }}">

    @yield('script_up')

</head>
<body class="page-body" data-url="http://neon.dev">
@if(!isset($current_controller)) {{$current_controller = ''}} @endif

<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">
        <div class="sidebar-menu-inner">
            <header class="logo-env">
                <!-- logo -->
                <div class="logo">
                    <a href="">
                        <img src="{{ asset("images/logo/logo_".App::getLocale().".png") }}" alt=""/>
                    </a>
                </div>
                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>
                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>
            </header>

            <ul id="main-menu" class="main-menu">
{{--                <li>--}}
{{--                    <a href="{{ route('home') }}">--}}
{{--                        <i class="entypo-gauge"></i>--}}
{{--                        <span class="title">{{trans('admin.dashboard')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="fa fa-archive"></i>
                        <span class="title">{{trans('admin.products')}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="row">
            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix upper_icons">
            </div>
            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs upper_icons">
                <ul class="list-inline links-list pull-right">
                    <!-- Language Selector -->
                    <li class="dropdown language-selector">
                        {{trans('admin.language')}}: &nbsp;
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                            <img src="{{ asset('flat/'.config('locale.languages')[App::getLocale()][3]) }}" class="img-circle"/>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            @foreach(config('locale.languages') as $lang)
                                @if($lang[0] != App::getLocale())
                                    <li>
                                @else
                                    <li class="active">
                                        @endif
                                        <a href="{{ route('lang.swap', $lang[0]) }}">
                                            <img src="{{ asset('flat/'.$lang[3]) }}"  class="img-circle"/>
                                            <span>{{ $lang[4] }}</span>
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <hr/>
        <ol class="breadcrumb bc-3">
            @yield('breadcrumb')
        </ol>

        <div class="main-content-font">
        @yield('content')

        <!-- Add Address modal -->
            <div class="modal fade" id="myModalImportData">
                <div class="modal-dialog" role="document" style="width: 450px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">{{trans('admin.importData')}}</h4>
                        </div>
                        <div class="modal-body" id="modalBody" style="text-align: center">
                            <form role="form" id="modal-form-upload-data"  method="post" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">

                                <div class="row" style="margin-top: 5px">
                                    <div class="col-sm-12">
                                        {{ csrf_field() }}
                                        <input class="form-control" type="file" name="file" id="upload_file" accept=".xls" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-right" style="margin-right: 20px">
                                        <button type="submit" class="btn btn-default import-submit">{{trans('admin.send')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Address modal end -->
        </div>
        <br/>
        <!-- Footer -->
    </div>

</div>

<script type="text/javascript">
    //function format
    var _r= function(p,c){return p.replace(/%s/,c)};

    //save data to left panel
    function record(item){
        var name = (item.attr('id')== undefined? item.attr('name'): item.attr('id')) + '_recorded';
        if(item.val() == '' || item.val() == null || (item.is(':checkbox') && item.is(":not(:checked)"))) {
            $('#' + name).remove();
        }
        else{
            var id = item.attr('id')== undefined? item.attr('name'): item.attr('id');
            var text = '<strong>' + $.trim($('label[for="' + id + '"]').html().replace(/<[^>]*>?/gm, '').replace('*',''))+ ':</strong> ';

            if( item.is(':radio') )
                text += item.val() == 1? '{!! trans('admin.yes') !!}': '{!! trans('admin.no') !!}';
            else if( item.is(':checkbox') )
                text += '{!! trans('admin.yes') !!}';
            else if( item.is( "select" ) ){
                if(item.prop( "multiple" )){
                    $.each(item.val(), function( i, v ) {
                        text += item.find("option[value='"+v+"']").text() + ', '
                    });
                    text = text.substr(0,text.length-2)
                }
                else
                    text += item.find('option:selected').text();
            }
            else
                text += item.val();

            if(text != $('#'+name).text()){
                $('#'+name).remove();
                $('#data_recorded > tbody').append("<tr><td id='"+name+"' data-level='1'>" + text + "</td></tr>")
            }
        }
    }

    //Update listing filter
    function update_filters(value, columns, container = 'filter-menu', verify = true){
        $('.filter_item').each(function (i,v) {
            if($.inArray( v.id, value ) == -1)
                $('#'+v.id).closest("div").remove();
        });

        if(value.length >0){
            $('#'+container).show();
            $.each(value, function( i, v ) {
                if($.inArray( v, value )>-1 && (verify? $('#'+v).length == 0: true)) {
                    $('#'+container).append(columns[v].component);
                    if(columns[v].component.indexOf("js_datepicker") >= 0)
                        $('#'+columns[v].id).datepicker({ format: 'dd/mm/yyyy' });
                }
            });
            $('#'+container).height( value.length%6 == 0 ? (value.length/6)*32 : (parseInt(value.length/6)+1) * 32 );
        }
    }

    function update_params(d, filter = 'filter-form', other = null){
        var itms = $('#'+ filter).serializeArray();
        d.filter = {};
        itms.forEach(function(it, index) {
            if( it.value != ''){
                if (it.name == '_token') d[it.name] = it.value;
                else d.filter[it.name] = it.value;
            }
        });
        if(other != null)
            Object.assign(d.filter, other);
    }

    function autocomplete(field, url, param, items = undefined){
        if(items != undefined)
            field.autocomplete({ source: items });
        else{
            items = new Array();
            var filter = {[param]:field.val()}
            $.post(url,
                { "_token": "{{ csrf_token() }}", filter, 'autocomplete':true, 'allparams':false},
                function (data, status) {
                    var decoded_data = jQuery.parseJSON(data);
                    $.each(decoded_data, function( i, v ) {
                        items.push(v[param]);
                    });
                    field.autocomplete({ source: items });
                });
        }
    }

    //Function change select
    function update_select( child_id, child_name, parent_name, parent_id, data, select = true){
        $('#'+ child_id)
            .find('option')
            .remove()
            .end()
        if(select)
            $('#'+ child_id).append('<option value="">--- <?php echo e(trans('admin.select')); ?> ---</option>');

        if(parent_id != ''){
            $.each( data, function( key, value ) {
                if(value[parent_name] == parent_id )
                    $('#'+ child_id).append('<option value="' + value.id + '" data-parent="' + data[parent_name] + '">'+ value[child_name] +'</option>')
            });
        }
        else
            $.each( data, function( key, value ) {
                    $('#'+ child_id).append('<option value="' + value.id + '" data-parent="' + data[parent_name] + '">'+ value[child_name] +'</option>')
            });
        $("#"+ child_id).val($("#target option:first").val()).trigger('change');;
    }

    (function($){
        $(window).on('load',function(){
            var current_controller = {!! json_encode($current_controller) !!};

            $('.exportData').click(function(e){
                e.preventDefault();
                var url = $(this).attr('href')+ '?' + $('#filter-form').serialize()
                window.location = url;
            });

            $('.has-sub').each(function( index ) {
                var names = [];
                $(this).find('ul li').each(function( index ) {
                    names.push($(this).attr('name'));
                    if(jQuery.inArray( $(this).attr('name'), user_controllers )< 0)
                        $(this).remove();
                });

                if(jQuery.inArray( current_controller, names ) >= 0)
                    menu_do_expand($(this).children(),$(this), submenu_options);

                if($(this).find('ul li').length == 0)
                    $(this).hide();
            });

            $('.importData').click(function(e){
                e.preventDefault();
                var href = [$(this).data("href")].reduce(_r, "%s");
                $('#modal-form-upload-data').attr('action',href);
            });

            $(document).on('click', 'button[name="btnTrash"]', function(e){
                id = $(this).data('id');
                e.preventDefault();
                jQuery.noConflict();
                if (confirm("{{trans('admin.sure_you_want_to_delete_the_record')}}") == true) {
                    // $('#cat-' + id).submit();
                    var url = "{{route('products.delete','')}}/"+id;
                    $.post(url,
                        { "_token": "{{ csrf_token() }}"},
                        function (data, status) {
                            $( "#filter-form" ).submit();
                        });
                }
            });

            $('.recorder').change(function(){
                record($(this), $(this).val());
            });

            $('.recorder').focusout(function(){
                record($(this), $(this).val());
            });

            $(".nav-tabs > li").on("click", function() {
                $('.panel-title').text($(this).data('name'));
            });
        });
    })(jQuery);
</script>

@yield('script_down')

</body>
</html>
