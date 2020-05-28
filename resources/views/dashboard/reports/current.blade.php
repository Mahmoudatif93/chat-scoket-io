@extends('dashboard/require/index_dashboard')
@section('title', __('site.reports'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @lang('site.dashboard')
            <small> @lang('site.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
            <li class="active">@lang('site.reports')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      
        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.reports')</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $dataTable->table(['class'=>"table table-bordered table-striped dataTable no-footer "],true) !!}


                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>



    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@push('js')

<script>
    function delete_gov(input) {
        //alert($(input).attr("data-url"));

        $("#form_delete_gov").attr("action", $(input).attr("data-url"));
    }




    function get_govs(vall) {
        //alert();
        //$("input").prop('disabled', true);
        //$("input").prop('disabled', false);
        if (vall == 1) {
            $('#fatra').show();
            $("#from").prop('disabled', false);
            $("#to").prop('disabled', false);
            $("#year").prop('disabled', true);
            $("#month").prop('disabled', true);
            $('#s_month').hide();
            $('#s_year').hide();


        } else if (vall == 2) {
            $('#s_month').show();
            $("#from").prop('disabled', true);
            $("#to").prop('disabled', true);
            $("#year").prop('disabled', true);
            $("#month").prop('disabled', false);
            $('#fatra').hide();
            $('#s_year').hide();
        } else if (vall == 3) {
            $('#s_year').show();
            $("#from").prop('disabled', true);
            $("#to").prop('disabled', true);
            $("#year").prop('disabled', false);
            $("#month").prop('disabled', true);
            $('#fatra').hide();
            $('#s_month').hide();
        }
    }

</script>

{!! $dataTable->scripts() !!}
@endpush
