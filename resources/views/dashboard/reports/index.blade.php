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
                        <form action="{{route('reports.index')}}" method="get" enctype="multipart/form-data">
                            {{-- csrf_field() --}}

                            <div class="form-group col-md-4 col-sm-3 padding-4">
                                <label class="control-label"> اختر طريقة البحث </label>

                                <select required class="form-control " id="report_with" name="report_with" class="form-control" data-validation="required" onchange="get_govs(this.value);">

                                    <option value="2">شهر</option>
                                    <option value="1">فترة</option>
                                    <option value="3">سنة</option>

                                </select>
                            </div>


                            <div class="form-group col-md-4 col-sm-2 padding-4 " id="s_month" style="">
                                <label class="control-label"> اختر الشهر </label>
                                <select class="form-control " id="month" name="month" class="form-control" data-validation="required" >
                                    <option value="">اختر</option>
                                    <option value="1">يناير</option>
                                    <option value="2">فبراير</option>
                                    <option value="3">مارس</option>
                                    <option value="4">ابريل</option>
                                    <option value="5">مايو </option>
                                    <option value="6">يونيو</option>
                                    <option value="7">يوليو</option>
                                    <option value="8">اغسطس</option>
                                    <option value="9">سبتمبر</option>
                                    <option value="10">اكتوبر</option>
                                    <option value="11">نوفمبر</option>
                                    <option value="12">ديسمبر</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-2 padding-4 " id="s_year" style="display:none">
                                <label class="control-label"> اختر السنة </label>

                                <?php $years = range(1990, strftime("%Y", time())); ?>
                                <select class="form-control " id="year" name="year" disabled class="form-control" data-validation="required">
                                    <option> اختر السنة</option>
                                    <?php foreach($years as $year) : ?>
                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>


                            <div class="form-group col-md-4 col-sm-2 padding-4 " id="fatra" style="display:none">

                                <label class="control-label"> من </label>

                                <input type="date" id="from" name="from" class="form-control" disabled required />
                                <label class="control-label"> الى </label>

                                <input type="date" id="to" name="to" class="form-control" disabled required />
                            </div>




                            <div class="col-md-12" style="display: flex;">
                                <div class="col-md-3">
                                    <div class="form-group" style="margin-top: 19px">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>



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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
