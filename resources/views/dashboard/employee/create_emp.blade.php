@extends('dashboard/require/index_dashboard')
@section('content')

<link href="{{asset('/public/dashboard/css1/style.css')}}" rel="stylesheet" type="text/css" />
<body>
    <!-- Side Navbar -->

    <div class="content-wrapper page" style="overflow-y: scroll;
    height: 20px;">


        <div class="col-xs-12">
            <form action="{{route('store_emp')}}" method="post">
                {{ csrf_field() }}
                {{ method_field('post')}}

                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="panel-heading">
                        <h3 class="panel-title">اضافه موظف كمستخدم</h3>
                    </div>
                    <div class="panel-body">
                        <!-- open panel-body-->
                        <fieldset>
                            <legend></legend>



                            <div class="form-group col-md-3 col-sm-6 padding-4 ">
                                <label class="label"> الموظفين </label>
                                <input type="hidden" id="e_name" name="name" value=""/>
                                <select onchange="change_name(this)" class="form-control " id="employeed_id" name="employee_id" class="form-control" data-validation="required">
                                    <option>اختر</option>
                                    <?php
                                        if(!empty($employees))
                                            foreach ($employees as $value) {?>
                                                <option value="<?= $value->id?>"><?= $value->emp_name?></option>
                                             <?php } ?>

                                </select>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 padding-4 ">
                                <div class="form-group ">
                                    <label class="control-label">نوع المستخدم</label>
                                    <select class="form-control" id="emp_type" name="emp_type" value="">
                                        <option value="1">مدير مستخدم </option>
                                        <option value="2">مستخدم</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">البريد الألكترونى</label>
                                    <input type="text" name="email" class="form-control text-right" data-validation="required">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">الرقم السري</label>
                                    <input type="password" name="password" class="form-control text-right" data-validation="required">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <?php

                     $cruds3=array(1=>'create',2=>'update',3=>'delete',4=>'read');

                     $cruds_ar=array('','اضافه','تعديل','حذف','طباعه','تعديل');
                     ?>
                                <?php
             if(isset($pages) && !empty($pages)){
                foreach($pages as $page) {?>
                                <div class="col-md-6">
                                    <div class=" col-md-12 col-xs-12 no-padding">
                                        <div class="clearfix"></div>
                                        <div class="panel panel-success ">
                                            <div class="panel-heading" style="margin-top:-1px">
                                                <h3 class="panel-title"><?php echo $page->title ; ?> </h3>
                                            </div>
                                            <div class="panel-body">
                                                <div id="page-wrap">
                                                    <ul class="treeview">
                                                        <?php if(isset($page->sub) && !empty($page->sub)){

                   foreach($page->sub as $sub_page) {?>
                                                        <li>

                                                        <li>
                                                            <div class="col-md-12">
                                                                <div class="col-md-6">
                                                                    <input type="checkbox" name="select-all[]" value="<?php echo $page->id ; ?>">
                                                                    <label for="tall" class="custom-checked"><?php echo $sub_page->title ; ?> </label>

                                                                </div>

                                                                <div class="col-md-6">
                                                                    <?php if($sub_page->type_crud==1){
                    foreach($cruds3 as $row=>$value){
                        if($row!=5){
                        ?>
                                                                    <input type="checkbox" name="permission[]" value="<?php echo $value; ?>_<?php echo $sub_page->route; ?> " /><?php echo $cruds_ar[$row] ; ?>
                                                                    <?php } else { ?>
                                                                    <input type="checkbox" name="permission[]" value="<?php echo $value; ?>_<?php echo $value; ?><?php echo $sub_page->route; ?> " /><?php echo $cruds_ar[$row] ; ?>

                                                                    <?php } ?>
                                                                    <?php }   }else {  ?>
                                                                    <input type="checkbox" name="permission[]" value="read_<?php echo $sub_page->route; ?>" /><?php echo $cruds_ar[$row] ; ?>

                                                                    <?php } ?>



                                                                </div>
                                                            </div>




                                                        </li>

                                                        <?php } } ?>

                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <?php } } ?>


                            </div>

                            <div class="col-md-3">
                                <div class="form-group" style="margin-top: 19px">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
                                </div>
                            </div>
                        </fieldset>
                        <!-- close panel-body-->
                    </div>
                </div>
            </form>
        </div>
        <section class="content">
            <div class="col-md-1"></div>

































            <div class="col-md-1"></div>
        </section>
        <!--content-->


































    </div>


</body>






<script>
    function change_name(n){
        $('#e_name').val($('option:selected',n ).text());
    }
</script>




@endsection




