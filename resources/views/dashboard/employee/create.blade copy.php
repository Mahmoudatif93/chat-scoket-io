
 @extends('dashboard/require/index_dashboard')
@section('content')

    <link href="{{asset('/public/dashboard/css1/style.css')}}" rel="stylesheet" type="text/css"/>
  <body>
    <!-- Side Navbar -->

    <div class="content-wrapper page" style="overflow-y: scroll;
    height: 20px;">

<div class="col-xs-12" >

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">اضافه موظف</h3>
        </div>
        <div class="panel-body">
            @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
@endif
            <!-- open panel-body-->
            <fieldset>
               <legend></legend>

               <?php if(isset($post)) {   $ckhasm=""; $emp_name=$post->emp_name; $national_num=$post->national_num;$adress=$post->adress;$phone=$post->phone;$disable="none";$required="readonly";?>
                <form action="{{route('employees.update',$post->id)}}" method="post" enctype="multipart/form-data">

             <?php } else {?>
                <form action="{{route('employees.store')}}" method="post"enctype="multipart/form-data">
             <?php $ckhasm=""; $emp_name=""; $national_num="";$adress=" ";$phone="";$disable="";$required="";

            } ?>

            {{ csrf_field() }}
            <?php if(isset($post->id)) { ?>
          {{ method_field('put') }}

          <?php } else {?>
           {{ method_field('post') }}
          <?php } ?>

               <div class="col-md-4">
                 <div class="form-group">

                     <label class="control-label">الاسم</label>
                     <input type="text" {{ $required }} value="{{ $emp_name }}" name="emp_name" class="form-control text-right" data-validation="required">
                 </div>
             </div>
             <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">الرقم القومي</label>
                    <input type="number" onkeypress="return validate_number(event);" value="{{ $national_num}}" name="national_num" class="form-control text-right" data-validation="required">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">العنوان</label>
                    <input type="text" value="{{ $adress }}" name="adress" class="form-control text-right" data-validation="required">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">

                    <label class="control-label">التلفون</label>
                    <input type="number"   value="{{ $phone}}" name="phone" class="form-control text-right" data-validation="required">
                </div>
            </div>

            <div class="col-md-4" style="display: <?= $disable?>">


                <?php $employee=array(0=>'بدون',1=>'مدير النظام ',2=>'مستخدم'); ?>
                <div class="form-group ">

                    <label class="control-label">نوع المستخدم</label>
                <select class="form-control" id="emp_type" name="emp_type" value=" {{ $ckhasm}} "  onchange="changeUser($(this).val())" id="khasm">

                   <?php foreach($employee as $key=>$value){?>

                  <option value="<?=$key;?>"
                        <?php if (!empty($ckhasm)) {
                                        if ( $key== $ckhasm ) {
                                            echo 'selected';

                                        }

                                    }

                                        ?> ><?=$value ?></option>




                        <?php } ?>


             </select>
            </div>
            </div>



            <div class="col-md-4" id="email" style="display:none">
                <div class="form-group" >

                    <label class="control-label">البريد الألكترونى</label>
                    <input type="text"  id="email" name="email" class="form-control text-right" >
                </div>
            </div>
 <div class="col-md-4" id="password"  style="display:none">
                <div class="form-group">

                    <label class="control-label">الرقم السري</label>
                    <input type="password" id="password"  name="password" class="form-control text-right" >
                </div>
            </div>








           <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">صوره الموظف</label>

                    <input type="file" value="" name="post_image" id="post_image" data-validation="required" class="form-control text-right">
                </div>
            </div>









            <div class="col-md-3">
             <div class="form-group" style="margin-top: 19px">
                 <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
             </div>
         </div></form>
     </fieldset>
     <!-- close panel-body-->


     <?php
     if(isset($employees) && !empty($employees)){?>


      <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
<div class="col-xs-12">
<table  class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0" width="100%">
    <thead>
    <tr class="info">
        <th>م </th>
            <th>  اسم الموظف</th>
            <th>   الرقم القومي</th>
            <th>  رقم التلفون </th>
            <th>   العنوان</th>
                <th> الاجراء </th>
    </tr>
    </thead>
    <tbody class="text-center">
     <?php
     if(isset($employees) && !empty($employees)){
        $x=1;
        foreach($employees as $row){

            ?>

        <tr>
            <td><?php echo $x ; ?> </td>

            <td> <?php echo $row->emp_name  ; ?> </td>
            <td> <?php echo $row->national_num  ; ?> </td>
            <td> <?php echo $row->phone  ; ?> </td>
            <td> <?php echo $row->adress  ; ?> </td>


            <td>
                <div>
                <a href="{{route('employees.edit',$row->id)}}" class="btn btn-default btn-xs" >
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>


                    <div>
                  <form id="form_delete_city" action="{{route('employees.destroy',$row->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                    </form>
                </div>





            </td>

        </tr>
        <?php  $x++ ;  } } ?>






    </tbody>
</table>
</div>
</div>
<?php } ?>




 </div>
</div>
</div>

<section class="content"  >
 <div class="col-md-1"></div>

































      <div class="col-md-1"></div>
</section><!--content-->


































    </div>


  </body>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script>
    function  changeUser(vall){


      if(vall == 0){
        $('#email').hide();
        $('#password').hide();
      }else{
        $('#email').show();
        $('#password').show();
      }
    }

</script>












@endsection



