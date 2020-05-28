@extends('dashboard/require/index_dashboard')
@section('title', __('site.user_emps'))
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
            <li><a href="{{url('/admin/usersemps')}}">@lang('site.user_emps')</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.user_emps')</h3>
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
                                    {!! $dataTable->table(['class'=>"table table-bordered table-hover dataTable  "],true) !!}

                                    
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
{!! $dataTable->scripts() !!}
@endpush