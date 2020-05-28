 @extends('dashboard/require/index_dashboard')
 @section('content')


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             پیشخوان
             <small>پنل مدیریت</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
             <li class="active">پیشخوان</li>
         </ol>
     </section>


     <!-- Main content -->
     <section class="content ">
         <!-- Small boxes (Stat box) -->
         <div class="row">


             <section class="content1" style="padding-top: 10px;padding: 15px 15px 0 15px;">
                 <div class="col-md-1"></div>

                 <div class="col-md-10 col-xs-12 no-padding" style="width: 100%">



                     <div class="index-icons no-padding grid_system">
                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 board_directors wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #f9a61a;">

                                 <a data-toggle="modal" onclick="get_sub_cats(3);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/e0d4fe6227c98b3138df677ec1dc8c85.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> اداره الاعدادات </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 secretary wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #fa7bff;">

                                 <a data-toggle="modal" onclick="get_sub_cats(5);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/def93300c222214cedf2534476f9ed5f.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> اداره التسجيل </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 system wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #08704d;">

                                 <a data-toggle="modal" onclick="get_sub_cats(6);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/4b43cddf45f2326614e87f8d360ab316.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> اداره النظام </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 finance_resource wow fadeIn" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #96c63e;">

                                 <a data-toggle="modal" onclick="get_sub_cats(8);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/9712eb652f276d4ea9c5f5bdb247ab58.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> الحضور والانصراف </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 human_resource wow fadeIn" data-wow-delay="0.9s" style="visibility: visible; animation-delay: 0.9s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #fd5656;">

                                 <a data-toggle="modal" onclick="get_sub_cats(10);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/6e756dd5321dad1a24f40e148ee781fb.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> اداره التقارير </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 social_affairs wow fadeIn" data-wow-delay="1.1s" style="visibility: visible; animation-delay: 1.1s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #ff8d6f;">

                                 <a data-toggle="modal" onclick="get_sub_cats(11);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/fffb4096f2e23e83dddf86ba2d4564f8.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> اداره الموقع </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 public_relations wow fadeIn" data-wow-delay="1.3s" style="visibility: visible; animation-delay: 1.3s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #5a5a5a;">

                                 <a data-toggle="modal" onclick="get_sub_cats(12);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/18a52cbebc2a528d5eb6e34d528af9ac.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> تسديد الرسوم </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 care wow fadeIn" data-wow-delay="1.5s" style="visibility: visible; animation-delay: 1.5s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #5a5a5a;">

                                 <a data-toggle="modal" onclick="get_sub_cats(42);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/18a52cbebc2a528d5eb6e34d528af9ac.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> الشئون المالية والمحاسبية </h5>
                                 </a>
                             </div>
                         </div>

                         <!--col-md20 col-md-3 col-sm-4-->
                         <div class="padding-2 support wow fadeIn" data-wow-delay="1.7s" style="visibility: visible; animation-delay: 1.7s; animation-name: fadeIn;">
                             <div class="box" style="background-color: #5a5a5a;">

                                 <a data-toggle="modal" onclick="get_sub_cats(73);" href="#sub_cats" alt="" class="center-block  " style="color: #fff;">
                                     <!--	<img src="https://belahodod-sa.com/uploads/pages_images/thumbs/18a52cbebc2a528d5eb6e34d528af9ac.png" 
                                  alt="" class="center-block">-->
                                     <img src="https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg" onerror="this.src='https://belahodod-sa.com/uploads/images/b937349ee4f7577bd166d2ffc3651a7e.jpg'" alt="" class="center-block">
                                     <h5 class="text-center"> الموارد البشرية </h5>
                                 </a>
                             </div>
                         </div>



                     </div>








                 </div>
                 <div class="col-md-1"></div>
             </section>




         </div><!-- /.row -->
         <!-- Main row -->

         <div class="row">
             <div class="col-md-12">

                 <table class="table table-bordered table-striped example dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                     <thead>
                         <tr class="greentd" role="row">
                             <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="0" aria-sort="ascending" aria-label="م: activate to sort column descending" style="width: 20px;">م
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="1" aria-label="الإسم : activate to sort column ascending" style="width: 105px;">الإسم
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="2" aria-label="رقم الهويه: activate to sort column ascending" style="width: 111px;">رقم الهويه
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="3" aria-label="تاريخ الهويه: activate to sort column ascending" style="width: 111px;">تاريخ الهويه
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="4" aria-label="تاريخ الميلاد : activate to sort column ascending" style="width: 111px;">تاريخ الميلاد
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="5" aria-label="محل الميلاد : activate to sort column ascending" style="width: 119px;">محل الميلاد
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="6" aria-label=" المؤهل : activate to sort column ascending" style="width: 67px;"> المؤهل
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="7" aria-label="العنوان: activate to sort column ascending" style="width: 119px;">العنوان
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="8" aria-label="رقم الهاتف: activate to sort column ascending" style="width: 139px;">رقم الهاتف
                             </th>

                             <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" data-column-index="9" aria-label="الإجراء: activate to sort column ascending" style="width: 71px;">الإجراء
                             </th>
                         </tr>
                     </thead>
                     <tbody>

                         <tr role="row" class="odd">
                             <td class="sorting_1">1</td>
                             <td>نسرين قطان </td>
                             <td>1088796521 </td>
                             <td>1995-04-01 </td>

                             <td> </td>
                             <td> </td>
                             <td>جامعي </td>

                             <td>المدينه المنوره </td>

                             <td>0561123450 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/9" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/9" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                         <tr role="row" class="even">
                             <td class="sorting_1">2</td>
                             <td>منيره العتيبي </td>
                             <td>1080775586 </td>
                             <td>2003-04-07 </td>

                             <td> </td>
                             <td> </td>
                             <td>جامعي </td>

                             <td>المدينه المنوره </td>

                             <td>0598822902 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/8" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/8" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                         <tr role="row" class="odd">
                             <td class="sorting_1">3</td>
                             <td>منار عبدالعزيز </td>
                             <td>1100702180 </td>
                             <td>2006-04-02 </td>

                             <td> </td>
                             <td> </td>
                             <td>دبلوم </td>







                             <td>المدينه المنوره </td>

                             <td>0507279656 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/7" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/7" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                         <tr role="row" class="even">
                             <td class="sorting_1">4</td>
                             <td>امنه باعبيد </td>
                             <td>1012024152 </td>
                             <td>1989-04-03 </td>

                             <td> </td>
                             <td> </td>
                             <td>جامعي </td>







                             <td>المدينه المنوره </td>

                             <td>0550043072 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/6" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/6" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                         <tr role="row" class="odd">
                             <td class="sorting_1">5</td>
                             <td>محمود احمد </td>
                             <td>2155446565 </td>
                             <td>0001-01-01 </td>

                             <td> </td>
                             <td>مكه </td>
                             <td>يبيبيب </td>







                             <td>يبييبي </td>

                             <td>454545 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/5" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/5" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                         <tr role="row" class="even">
                             <td class="sorting_1">6</td>
                             <td>احمد محمود </td>
                             <td>2155446565 </td>
                             <td>0001-01-01 </td>

                             <td>0001-01-01 </td>
                             <td>مكه </td>
                             <td>يسيسي </td>







                             <td>سسيسي </td>

                             <td>154545454545 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/4" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/4" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                         <tr role="row" class="odd">
                             <td class="sorting_1">7</td>
                             <td>مشاعل النمر </td>
                             <td>1075463990 </td>
                             <td>17/03/1430 </td>

                             <td> </td>
                             <td>المدينة المنورة </td>
                             <td>دبلوم </td>







                             <td>المدينه </td>

                             <td>05610001950 </td>


                             <td>
                                 <a href="https://belahodod-sa.com/Instructor/update_instructor/3" title="تعديل"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                 <span> </span>


                                 <a href="https://belahodod-sa.com/Instructor/delete_Instructor/3" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');">
                                     <i class="fa fa-trash" aria-hidden="true"></i></a>
                             </td>
                         </tr>
                     </tbody>

                 </table>

             </div>
         </div>



     </section><!-- /.content -->
 </div><!-- /.content-wrapper -->



 @endsection
