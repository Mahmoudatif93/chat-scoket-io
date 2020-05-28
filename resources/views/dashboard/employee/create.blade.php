@extends('dashboard/require/index_dashboard')
@section('title', __('site.add_emps'))

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
            <li><a href="{{route('employees.index')}}">@lang('site.employees')</a></li>
            <li class="active">@lang('site.add_emps')</li>
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
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                    @endif
                    @include('dashboard/require/_errors')

                    <?php if(isset($post)) {   $ckhasm=""; $emp_name=$post->emp_name; $national_num=$post->national_num;$adress=$post->adress;$phone=$post->phone;$disable="none";$required="readonly";?>
                    <form action="{{route('employees.update',$post->id)}}" method="post" enctype="multipart/form-data">

                        <?php } else {?>
                        <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
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
                                    <input type="number" value="{{ $phone}}" name="phone" class="form-control text-right" data-validation="required">
                                </div>
                            </div>

                            <div class="col-md-4" style="display: <?= $disable?>">


                                <?php $employee=array(0=>'بدون',1=>'مدير النظام ',2=>'مستخدم'); ?>
                                <div class="form-group ">

                                    <label class="control-label">نوع المستخدم</label>
                                    <select class="form-control" id="emp_type" name="emp_type" value=" {{ $ckhasm}} " onchange="changeUser($(this).val())" id="khasm">

                                        <?php foreach($employee as $key=>$value){?>

                                        <option value="<?=$key;?>" <?php if (!empty($ckhasm)) {
                                                if ( $key== $ckhasm ) {
                                                    echo 'selected';
        
                                                }
        
                                            }
        
                                                ?>><?=$value ?></option>




                                        <?php } ?>


                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4" id="email" style="display:none">
                                <div class="form-group">

                                    <label class="control-label">البريد الألكترونى</label>
                                    <input type="text" id="email" name="email" class="form-control text-right">
                                </div>
                            </div>

                            <div class="col-md-4" id="password" style="display:none">
                                <div class="form-group">

                                    <label class="control-label">الرقم السري</label>
                                    <input type="password" id="password" name="password" class="form-control text-right">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">صوره الموظف</label>

                                    <input type="file" value="" name="post_image" id="post_image" data-validation="required" class="form-control text-right">
                                </div>
                            </div>

                            <div class="col-md-12">
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

        <div class="row">
            <div class="col-xs-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('site.employees')</h3>
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
                                                <th> اسم الموظف</th>
                                                <th> الرقم القومي</th>
                                                <th> رقم التلفون </th>
                                                <th> العنوان</th>
                                                <th> الاجراء </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($employees) && !empty($employees))
                                            <?php $x=1;?>
                                            @foreach($employees as $row)
                                            <tr>
                                                <td>{{ $x}} </td>

                                                <td> {{$row->emp_name}}</td>
                                                <td> {{$row->national_num}}</td>
                                                <td> {{ $row->phone}} </td>
                                                <td> {{$row->adress}} </td>
                                                <td>
                                                    <div>
                                                        <a href="{{route('employees.edit',$row->id)}}" class="btn btn-default btn-xs edit">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>


                                                    <div>
                                                        <form id="form_delete_city" action="{{route('employees.destroy',$row->id)}}" method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button type="submit" class="btn btn-danger delete btn-xs"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $x++;?>
                                            @endforeach
                                            @endif
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
