@extends('dashboard/require/index_dashboard')
@section('title', __('site.create_user_emps'))

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
            <li><a href="{{route('usersemps.index')}}">@lang('site.user_emps')</a></li>
            <li class="active">@lang('site.create_user_emps')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.add_emps')</h3>
                    </div>
                    <div class="box-body">

                        @include('dashboard/require/_errors')
                        <form action="{{route('usersemps.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('post')}}


                            <div class="form-group col-md-3 col-sm-6 padding-4 ">
                                <label class="label"> الموظفين </label>
                                <select id="employee_id" name="employee_id" class="form-control" data-validation="required">
                                    <option value="">اختر</option>
                                    <?php
                                        if(!empty($employees))
                                            foreach ($employees as $value) {?>
                                    <option {{ ($value->id==old('employee_id')) ? 'selected':'' }} value="<?= $value->id?>"><?= $value->emp_name?></option>
                                    <?php } ?>

                                </select>

                            </div>

                            <div class="form-group col-md-3 col-sm-6 padding-4 ">
                                <label class="label"> نوع المستخدم</label>
                                <select id="role_id" name="role_id" class="form-control" data-validation="required">
                                    <option value="">اختر</option>

                                    <option {{ (old('role_id')==1) ? 'selected':'' }} value="1">مدير على النظام</option>
                                    <option {{ (old('role_id')==2) ? 'selected':'' }} value="2">مدير</option>
                                </select>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">البريد الألكترونى</label>
                                    <input value="{{old('email')}}" type="text" name="email" class="form-control text-right" data-validation="required">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">الرقم السري</label>
                                    <input type="password" name="password" class="form-control text-right" data-validation="required">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">تاكيد الرقم السرى</label>
                                    <input type="password" name="password_confirmation" class="form-control text-right" data-validation="required">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label class="control-label">صورة المستخدم</label>
                                    <input type="file" name="user_img" class="form-control text-right" onchange='readURL(this);' data-view='user_img_view'>
                                    <img src="" id="user_img_view" style="width: 70px; height: 40px;" class="img-thumbnail" alt="">

                                </div>
                            </div>

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
                                                    $pre = $value."_".$sub_page->route;
                                                    if($row!=5){
                                                    ?>
                                                                <input {{(!empty(old('permission')) && in_array($pre,old('permission'))?'checked':'')}} type="checkbox" name="permission[]" value="<?php echo $value; ?>_<?php echo $sub_page->route; ?>" /><?php echo $cruds_ar[$row] ; ?>
                                                                <?php } else { ?>
                                                                <input {{(!empty(old('permission')) &&in_array($pre,old('permission'))?'checked':'')}} type="checkbox" name="permission[]" value="<?php echo $value; ?>_<?php echo $value; ?><?php echo $sub_page->route; ?>" /><?php echo $cruds_ar[$row] ; ?>

                                                                <?php } ?>
                                                                <?php }   }else {  ?>
                                                                <input {{(!empty(old('permission')) &&in_array($pre,old('permission'))?'checked':'')}} type="checkbox" name="permission[]" value="read_<?php echo $sub_page->route; ?>" /><?php echo $cruds_ar[$row] ; ?>

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




                            <div class="col-md-3">
                                <div class="form-group" style="margin-top: 19px">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
                                </div>
                            </div>




                        </form>
                    </div>
                </div>

            </div>
            <!-- /.col -->
        </div>



    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script>
    function changeUser(vall) {


        if (vall == 0) {
            $('#email').hide();
            $('#password').hide();
        } else {
            $('#email').show();
            $('#password').show();
        }
    }

</script>

@endsection
