
 @extends('dashboard/require/index_dashboard')
@section('content')

    <link href="{{asset('/public/dashboard/css1/style.css')}}" rel="stylesheet" type="text/css"/>
  <body>
    <!-- Side Navbar -->

    <div class="content-wrapper page" style="overflow-y: scroll;
    height: 20px;">

<div class="col-xs-12" >
    @include('dashboard/require/_errors')

     <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    {{ method_field('post')}}

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">اضافه مستخدم</h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
            <fieldset>
               <legend></legend>



               <div class="col-md-4">
                 <div class="form-group">

                     <label class="control-label">الاسم</label>
                     <input type="text" value="" name="name" class="form-control text-right" data-validation="required">
                 </div>
             </div>

             <div class="col-md-4">
                 <div class="form-group">

                     <label class="control-label">البريد الألكترونى</label>
                     <input type="text"   name="email" class="form-control text-right" data-validation="required">
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">العنوان</label>
                    <input type="text" value="" name="adress" class="form-control text-right" data-validation="required">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">التلفون</label>
                    <input type="number"   value="" name="phone" class="form-control text-right" data-validation="required">
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">صوره الموظف</label>

                    <input type="file" value="" name="user_image" id="user_image" data-validation="required" class="form-control text-right">
                </div>
            </div>


  <div class="col-md-4">
                 <div class="form-group">

                     <label class="control-label">الرقم السري</label>
                     <input type="password"   name="password" class="form-control text-right" data-validation="required">
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
     <ul class="treeview" >
           <?php if(isset($page->sub) && !empty($page->sub)){

                   foreach($page->sub as $sub_page) {?>
     <li>

     <li>
         <div class="col-md-12" >
         <div class="col-md-6" >
  <input type="checkbox" name="select-all[]" value="<?php echo $page->id ; ?>">
<label for="tall" class="custom-checked"><?php echo $sub_page->title ; ?>  </label>

         </div>

   <div class="col-md-6"  >
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


     <!--

    <div class="col-md-12">

<div class="main-menu">
          <h3 class="sidenav-heading">Main</h3>
          <ul id="side-main-menu" class="side-menu list-unstyled">
             <?php
             if(isset($pages) && !empty($pages)){
                foreach($pages as $page) {?>

            <li> <input type="checkbox" /> <a href="#exampledropdownDropdown<?php echo $page->id ; ?>" aria-expanded="false" data-toggle="collapse">
                <i class="fa fa-window-restore" aria-hidden="true"></i><span> <?php echo $page->title ; ?></span> </a>


              <ul id="exampledropdownDropdown<?php echo $page->id ; ?>" class="collapse list-unstyled ">
              <?php if(isset($page->sub) && !empty($page->sub)){

                   foreach($page->sub as $sub_page) {?>
                  <li>
                  <?php if($sub_page->type_crud==1){
                    foreach($cruds3 as $row=>$value){
                        if($row!=4){
                        ?>
                    <input type="checkbox" name="permission[]" value="<?php echo $value; ?>_<?php echo $sub_page->route; ?> " /><?php echo $value; ?>
                    <?php } else { ?>
                    <input type="checkbox" name="permission[]" value="<?php echo $value; ?>_<?php echo $value; ?><?php echo $sub_page->route; ?> " /><?php echo $value; ?>

                    <?php } ?>
                <?php }   } else{ ?>
                    <input type="checkbox" name="permission[]" value="show_<?php echo $sub_page->route; ?>" />dsss
               <?php  }?>




                   <a href="{{ url($sub_page->url) }}"><span><?php echo $sub_page->title ; ?></span></a></li>

                    <?php } } ?>

              </ul>
            </li>

            <?php } } ?>


          </ul>
        </div>
</div>
-->






            <div class="col-md-3">
             <div class="form-group" style="margin-top: 19px">
                 <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
             </div>
         </div>
     </fieldset>
     <!-- close panel-body-->
 </div>
</div></form>
</div>

<section class="content"  >
 <div class="col-md-1"></div>

































      <div class="col-md-1"></div>
</section><!--content-->


































    </div>


  </body>






















@endsection



