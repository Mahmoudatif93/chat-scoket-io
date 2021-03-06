@extends('dashboard/require/index_dashboard')
@section('content')


<div class="content-wrapper page">


    <section class="content">
        <div class="col-md-1"></div>

        <!-- MAIN CONTENT-->

        <br>



        <div class="content1" /*style="margin-right: 50px;" * />


        <div class="row">
            <div class="col-md-12">

                <form action="{{route('reports.index')}}" method="get" enctype="multipart/form-data">
                    {{-- csrf_field() --}}
                    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                        <div class="panel-heading">
                            <h3 class="panel-title">التقارير</h3>
                        </div>
                        <div class="panel-body">
                            <!-- open panel-body-->
                            <fieldset>
                                <legend></legend>
                                <div class="col-md-12" >

                                    <div class="form-group col-md-3 col-sm-3 padding-4">
                                        <label class="label"> اختر طريقة البحث </label>

                                        <select class="form-control " id="report_with" name="report_with" class="form-control" data-validation="required" onchange="get_govs(this.value);">

                                            <option value="">اختر</option>
                                            <option value="1">فترة</option>
                                            <option value="2">شهر</option>
                                            <option value="3">سنة</option>

                                        </select>
                                    </div>


                                    <div class="form-group col-md-2 col-sm-2 padding-4 " id="s_month" style="display:none">
                                        <label class="label"> اختر الشهر </label>
                                        <select class="form-control " id="month" name="month" class="form-control" data-validation="required" disabled>
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

                                </div>
                                <div class="form-group col-md-2 col-sm-2 padding-4 " id="s_year" style="display:none">
                                    <label class="label"> اختر السنة </label>

                                    <?php $years = range(1990, strftime("%Y", time())); ?>
                                    <select class="form-control " id="year" name="year" disabled class="form-control" data-validation="required">
                                        <option> اختر السنة</option>
                                        <?php foreach($years as $year) : ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>


                                <div class="form-group col-md-2 col-sm-2 padding-4 " id="fatra" style="display:none">

                                    <label class="label"> من </label>

                                    <input type="date" id="from" name="from" class="form-control" disabled required />
                                    <label class="label"> الى </label>

                                    <input type="date" id="to" name="to" class="form-control" disabled required />
                                </div>




                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 19px">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- close panel-body-->
                        </div>
                    </div>
                </form>



            </div>

        </div>
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">المفقود والموجود</h3>
            </div>
            <div class="panel-body">
                <!-- open panel-body-->
                <fieldset>
                    {!! $dataTable->table(['class'=>"table"],true) !!}

                </fieldset>
                <!-- close panel-body-->
            </div>
        </div>
        <div class="col-md-1"></div>
    </section>
    <!--content-->



</div>
<!-- delete -->
<div id="del_city" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="form_delete_gov" action="" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <div class="modal-body ">
                    <h4>هل انت متاكد من الحذف</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>

    </div>
</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
