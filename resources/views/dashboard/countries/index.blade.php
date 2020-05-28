@extends('dashboard/require/index_dashboard')
@section('title', __('site.countries'))

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
            <li class="active">@lang('site.countries')</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.create_country')</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="countries" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}


                            <div class="form-group col-md-3">
                                <label for="country_id"> اختر النوع مدينه او محافظة </label>

                                <select class="form-control  " id="country_id" name="country_id" class="form-control" data-validation="required" onchange="get_govs(this.value);">

                                    <option value="">اختر</option>
                                    <option value="1">مدينة</option>
                                    <option value="2">محافظه</option>

                                </select>
                            </div>


                            <div class="form-group col-md-3" id="get_govs" style="display:none">
                                <label for="from_id"> اختر المحافظة </label>
                                <select class="form-control " id="from_id" name="from_id" style="display:none" class="form-control">

                                    <?php
                                                if(!empty($country_govs))
                                                    foreach ($country_govs as $value) {?>
                                    <option value=" <?= $value->id?>"><?= $value->title?></option>
                                    <?php }
                                                ?>

                                </select>
                            </div>

                            <div class="form-group col-md-3">

                                <label for="title">@lang('site.name')</label>
                                <input type="text" value="{{old('title')}}" name="title" id="title" data-validation="required" class="form-control ">
                            </div>



                            <div class="col-md-12" style="display: flex;">
                                <div class="col-md-3">
                                    <div class="form-group" style="margin-top: 19px">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> حفظ </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.countries')</h3>
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
                                                <th> اسم المحافظة</th>
                                                <th> الاجراء </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $x=1;?>
                                            @foreach($country_govs as $row)
                                            <tr>
                                                <td><?php echo $x ; ?> </td>

                                                <td> <?php echo $row->title  ; ?> </td>


                                                <td>
                                                    <a class="btn btn-default" href="{{route('countries.show',$row->id)}}"><i class="fa fa-list" aria-hidden="true"></i></a>
                                                    <a class="btn btn-info" onclick="update_gov('{{$row->id}}','{{$row->title}}','{{$row->from_id}}')" data-toggle="modal" data-target="#update_gov"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger" onclick="delete_gov('{{$row->id}}','{{$row->title}}','{{$row->from_id}}')" data-toggle="modal" data-target="#del_city"><i class="fa fa-trash"></i></a>
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

    function delete_gov(id, title, from_id) {
        $('#del_city .modal-body h4').text(' هل تريد حذف محافظة  ' + title + ' والمدن التابعه لها ');

        cURL = id;
        $("#form_delete_gov").attr("action", 'countries/' + cURL);
    }

    function update_gov(id, title, from_id) {
        $('#update_gov .modal-body #title').val(title);

        cURL = id;
        $("#form_update_gov").attr("action", 'countries/' + cURL);
    }

</script>

@endpush
