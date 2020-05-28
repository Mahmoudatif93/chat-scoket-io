@extends('dashboard/require/index_dashboard')
@section('title', __('site.stores'))

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
            <li class="active">@lang('site.stores')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.create_store')</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <div class="box-body">



                            <div class="form-group col-md-3">
                <a class="btn btn-success" href="{{route('addstore.create')}}"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>

                            </div>

                        </div>

                </div>

            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.stores')</h3>
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
                                    <table id="exp1" class="table table-bordered table-striped example">
                                        <thead>
                                            <tr class="info" role="row">
                                                <th>م </th>

                                                <th> تصنيف المتجر</th>
                                                <th> اسم المتجر</th>
                                                <th> عنوان المتجر</th>
                                                <th> موبيل المتجر</th>
                                                <th> المحافظه التابع لها  المتجر</th>
                                                <th> المدينه التابع لها  المتجر</th>

                                                <th> الاجراء </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $x=1;?>
                                            @foreach($stores as $row)
                                            <tr>
                                                <td><?php echo $x ; ?> </td>

                                                <td> <?php echo $row->cat_name  ; ?> </td>
                                                <td> <?php echo $row->store_name  ; ?> </td>
                                                <td> <?php echo $row->store_address  ; ?> </td>
                                                <td> <?php echo $row->store_mobile  ; ?> </td>
                                                <td> <?php echo $row->govern_title  ; ?> </td>
                                                <td> <?php echo $row->city_title  ; ?> </td>


                                                <td>

                                                    <a class="btn btn-info btn-xs edit" href="{{route('addstore.edit',$row->id)}}"><i class="fa fa-pencil"></i></a>


                                                        <form id="" action="{{route('addstore.destroy',$row->id)}}" method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                                <button type="submit" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>
                                                        </form>

                                                </td>

                                            </tr>
                                            <?php $x++;?>
                                            @endforeach
                                        </tbody>

                                    </table>
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

@endsection





@push('js')


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
                    <h4></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- update_gov -->
<div id="update_gov" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="form_update_gov" action="" method="post">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <div class="modal-body ">
                    <div class="form-group">

                        <label class="control-label">اسم </label>
                        <input type="text" value="" name="title" id="title" data-validation="required" class="form-control text-right">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-success">تعديل</button>
                </div>
            </form>
        </div>

    </div>
</div>


<script>
    function get_govs(vall) {


        if (vall == 2) {
            $('#get_govs').hide();
            $('#from_id').hide();
        } else if (vall == 1) {
            $('#get_govs').show();
            $('#from_id').show();
        }
    }

    function delete_gov(id) {
        $('#del_city .modal-body h4').text(' هل تريد الحذف   ');

        cURL = id;
        $("#form_delete_gov").attr("action", 'addstore/' + cURL);
    }

    function update_gov(id, title, from_id) {
        $('#update_gov .modal-body #title').val(title);

        cURL = id;
        $("#form_update_gov").attr("action", 'countries/' + cURL);
    }

</script>

@endpush
