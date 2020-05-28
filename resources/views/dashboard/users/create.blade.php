@extends('dashboard/require/index_dashboard')
@section('title', __('site.add_user'))

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
            <li><a href="{{route('users.index')}}">@lang('site.users')</a></li>
            <li class="active">@lang('site.add_user')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.add_user')</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @include('dashboard/require/_errors')
                          </div>
                </div>

                </form>

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
