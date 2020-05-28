 @extends('dashboard/require/index_dashboard')
@section('content')


    <div class="content-wrapper page"  >
   
 
<section class="content"  >
 <div class="col-md-1"></div>
  
  
   
    
    
    
 
	 <!-- MAIN CONTENT-->
    

<br>
              
				 

					<div class="content1" /*style="margin-right: 50px;"*/  >
	 

						<div class="row">
							<div class="col-md-12">
								 
									<form action="{{ url('en/admin/pages') }}" method="post">
    {{ csrf_field() }}
{{ method_field('post') }} 
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">اضافه صفحة</h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
            <fieldset>
               <legend></legend>
                  <div class="col-md-12"  style="display: flex;">
                <div class="col-md-4">
                <div class="form-group ">
							<label class="control-label" >النوع</label>
							<select class="form-control" name="type" data-validation="required" id="type" onchange="check_type($(this).val());">
                            	<option value="">اختر </option>
								<option value="1">رئيسي </option>
                                <option value="2">فرعي </option>
							</select>
						</div>
         </div>
                 
               <div class="col-md-4">
                 <div class="form-group">
                      
                     <label class="control-label">اسم الصفحه</label>
                     <input type="text" value="" name="title" id="title" data-validation="required" class="form-control text-right">
                 </div>
             </div>
                
          
             
                 <div class="col-md-4">
                <div class="form-group">
							<label class="control-label" >فرعي من</label>
							<select class="form-control" name="from_id" id="from_id"  data-validation="required"> 
								<option value="">اختر </option>
                                <?php if(isset($page) && !empty($page)){
                                foreach($page as $row){ ?>
                                <option value="<?php echo $row->id ;?>"><?php echo $row->title ;?> </option>
                                 <?php  } } ?>
							</select>
						</div>
         </div> 
                </div> 
        <div class="col-md-12"  style="display: flex;">
                 <div class="col-md-4">
                <div class="form-group ">      
							<label class="control-label" > لها صفحات فرعيه</label>
							<select class="form-control" name="have_branch" id="have_branch" data-validation="required">
                                <option value=""> اختر</option>
								<option value="1">تعم </option>
                                <option value="2">لا </option>
							</select>
						</div>
         </div>
                 
                
             <div class="col-md-4">
                <div class="form-group "> 
							<label class="control-label" > crud</label>
							<select class="form-control" name="type_crud" data-validation="required" id="type_crud" data-validation="required">
                                <option value=""> اختر</option>
								<option value="1">تعم </option>
                                <option value="2">لا </option>
							</select>
						</div>
         </div>
                  
             
             <div class="col-md-4">
                 <div class="form-group"> 
                      
                     <label class="control-label">route  </label>
                     <input type="text" id="route"   name="route" class="form-control text-right" data-validation="required">
                 </div>
             </div>
                </div>
            <div class="col-md-12"  style="display: flex;">
  <div class="col-md-4">
                 <div class="form-group">
                      
                     <label class="control-label">  اللينك</label> 
                     <input type="text"   name="url" id="url" class="form-control text-right" data-validation="required">
                 </div>
             </div>
                </div>
                 
            <div class="col-md-12" style="display: flex;">   
            <div class="col-md-3">
             <div class="form-group" style="margin-top: 19px">
                 <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
             </div>
         </div></div>
     </fieldset>
     <!-- close panel-body-->
 </div>
</div> 
    
    
    
    </form>
								  
                                    
                                   
                                    
                                    
                                    
                                    
                  <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">                  	
            <div class="col-xs-12">
            <table  class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>م </th>
                        <th> نوع الاداره</th>
                        <th> اسم الاداره </th>
                        <th> الاداره الاساسيه</th>
                        <th> لها صفحات فرعيه </th>
                         <th> crud </th>
                         <th> route </th>
                           <th> اللينك </th>
                            <th> الاجراء </th>
                </tr>
                </thead>
                <tbody class="text-center">
                 <?php
                 if(isset($pagess) && !empty($pagess)){
                    $x=1;
                    foreach($pagess as $row){
                        
                        ?>
                
                    <tr>
                        <td><?php echo $x ; ?> </td>
                        <td> <?php if($row->from_id==0) echo 'رئيسيه'; else echo ' فرعيه' ; ?> </td>
                        <td> <?php echo $row->title ; ?> </td>
                        <td> <?php echo $row->page_name ; ?> </td>
                        <td> <?php if($row->have_branch==1) echo 'نعم'; else echo ' لا' ; ?> </td>
                        <td> <?php if($row->have_branch==1) echo 'نعم'; else echo ' لا' ; ?> </td>
                        <td> <?php echo $row->route ; ?> </td>
                           <td> <?php echo $row->url ; ?> </td>
                           
                        <td>
                            <a href="{{route('pages.edit',$row->id)}}" >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                            <a href="#" onclick='swal({
                                    title: "تنبيه",
                                    text: "هل أنت متأكد من الحذف",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "حذف",
                                    cancelButtonText: "إلغاء",
                                    closeOnConfirm: false
                                    },
                                    function(){
                                    swal("تم الحذف!", "", "success");
                                    window.location="clients/Client/delete_d/<?php echo $row->id; ?>";
                                    });'>
                                <i class="fa fa-trash"> </i></a>
                        </td>
                       
                    </tr>
                    <?php  $x++ ;  } } ?>
                   
                    
                    
                    
                     
                     
                </tbody>
            </table>
        </div> 
           </div>                 
                                    
                                    
                                    
                                   
                                      
                                    
                                    
                              
							</div>
						</div>
    
    
    
    
      
                        
                        
                        
                      
                        
                        
                        
                        
                        
                         
 
    
    
    
    
    
    
    </div>
    
    
 
      <div class="col-md-1"></div>
</section><!--content-->
 
   
    
    </div>
   
     
     <script>
     
     function check_type(valu)
     {
        
        if(valu==2)
        {
           
          $('#from_id').prop("disabled", false);
          $('#have_branch').prop("disabled", false);
          $('#type_crud').prop("disabled", false);
         $('#route').val('#');
          $('#url').val('#');
          $('#route').prop("readonly", false);
           $('#url').prop("readonly", false);
        }else{
          
          $('#from_id').prop("disabled", true);
          $('#have_branch').prop("disabled", true);
          $('#type_crud').prop("disabled", true);
          $('#route').val('#');
          $('#url').val('#');
            $('#route').prop("readonly", true);
            $('#url').prop("readonly", true);
        }
     }
     
     </script>
    
     
@endsection