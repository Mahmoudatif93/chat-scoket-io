 @extends('dashboard/require/index_dashboard')
 @section('content')


 <div class="content-wrapper page">


     <section class="content">
         <div class="col-md-1"></div>







         <!-- MAIN CONTENT-->


         <br>



         <div class="content1" /*style="margin-right: 50px;" */>


             <div class="row">
                 <div class="col-md-12">
                     <?php if(isset($category->name)) { ?>
                     <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <?php } else {?>
                         <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                             <?php } ?>


                             {{ csrf_field() }}
                             <?php if(isset($category->name)) { ?>
                             {{ method_field('put') }}
                             <?php } else {?>
                             {{ method_field('post') }}
                             <?php } ?>
                             <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                                 <div class="panel-heading">
                                     <h3 class="panel-title">اضافه تصنيف</h3>
                                 </div>
                                 <div class="panel-body">
                                     <!-- open panel-body-->
                                     <fieldset>
                                         <legend></legend>
                                         <div class="col-md-12" style="display: flex;">

                                             <div class="col-md-4">
                                                 <div class="form-group">

                                                     <label class="control-label">اسم التصنيف</label>
                                                     <input type="text" value="<?php if(isset($category->name)) echo $category->name ; ?>  " name="name" id="name" data-validation="required" class="form-control text-right">
                                                 </div>
                                             </div>
                                             <div class="col-md-4">
                                                 <div class="form-group">

                                                     <label class="control-label">صوره التصنيف</label>
                                                     <input type="file" value="" name="file" id="file" data-validation="required" class="form-control text-right">
                                                 </div>
                                             </div>
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




                         <?php
                 if(isset($categories) && !empty($categories)){?>


                         <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                             <div class="col-xs-12">
                                 <table class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0" width="100%">
                                     <thead>
                                         <tr class="info">
                                             <th>م </th>
                                             <th> اسم التصنيف</th>

                                             <th> الاجراء </th>
                                         </tr>
                                     </thead>
                                     <tbody class="text-center">
                                         <?php
                 if(isset($categories) && !empty($categories)){
                    $x=1;
                    foreach($categories as $row){

                        ?>

                                         <tr>
                                             <td><?php echo $x ; ?> </td>

                                             <td> <?php echo $row->name  ; ?> </td>


                                             <td>
                                                 <a href="{{route('categories.edit',$row->id)}}">
                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                                 <a href="{{route('categories.destroy',$row->id)}}">
                                                     <i class="fa fa-trash"> </i></a>
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



         <div class="col-md-1"></div>
     </section>
     <!--content-->



 </div>




 @endsection
