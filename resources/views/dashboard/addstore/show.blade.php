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

                <form id="form_update_city" action="" method="post">
                    {{ csrf_field() }}
                    {{ method_field('put') }}

                    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                        <div class="panel-heading">
                            <h3 class="panel-title">تعديل مدينه </h3>
                        </div>
                        <div class="panel-body">
                            <!-- open panel-body-->
                            <fieldset>
                                <legend></legend>
                                <div class="col-md-12">
                                    <div class="form-group col-md-3 col-sm-6 padding-4 " id="get_govs">
                                        <label class="label"> المحافظة </label>
                                        <select class="form-control " id="from_id" name="from_id" class="form-control" data-validation="required">

                                            <?php
                                                if(!empty($country_govs))
                                                    foreach ($country_govs as $value) {
                                                        if($value->id == $from_id){?>
                                            <option selected value="<?= $value->id?>"><?= $value->title?></option>
                                            <?php }else {?>
                                            <option value=" <?= $value->id?>"><?= $value->title?></option>
                                            <?php }
                                                } ?>

                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <label class="control-label">اسم </label>
                                            <input type="text" value="" name="title" id="title" data-validation="required" class="form-control text-right">
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-12" style="display: flex;">
                                    <div class="col-md-3">
                                        <div class="form-group" style="margin-top: 19px">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-floppy-o"></i> تعديل </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <!-- close panel-body-->
                        </div>
                    </div>
                </form>

                @if(isset($cities) && !empty($cities))
                <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                    <div class="col-xs-12">
                        <table class="table table-striped table-bordered dt-responsive nowrap example" cellspacing="0" width="100%">
                            <thead>
                                <tr class="info">
                                    <th>م </th>
                                    <th> اسم المدينة</th>

                                    <th> الاجراء </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1;?>
                                @foreach($cities as $row)
                                <tr>
                                    <td><?php echo $x ; ?> </td>

                                    <td>{{$row->title }} </td>


                                    <td>
                                        <a href="#" onclick="get_data('{{$row->id}}','{{$row->title}}','{{$row->from_id}}')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <a onclick="delete_city('{{$row->id}}','{{$row->title}}','{{$row->from_id}}')" data-toggle="modal" data-target="#del_city"><i class="fa fa-trash"></i></a>

                                    </td>

                                </tr>
                                <?php $x++;?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>

        </div>

        <div class="col-md-1"></div>
    </section>
    <!--content-->

</div>
<!-- Modal -->
<div id="del_city" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="form_delete_city" action="" method="post">
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



<script>
    function get_data(id, title, from_id) {
        $('#title').val(title);

        $("#from_id option:selected").prop("selected", false);
        $("#from_id option[value=" + from_id + "]")
            .prop("selected", true);
        cURL = id;
        $("#form_update_city").attr("action", cURL);
    }


    function delete_city(id, title, from_id) {
        $('#del_city .modal-body h4').text('هل تريد حذف مدينة ' + title);

        cURL = id;
        $("#form_delete_city").attr("action", cURL);
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
