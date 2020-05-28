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
                    <?php if(isset($post)) {  $tasnef=$post->tsnef; $store_name=$post->store_name; $store_address=$post->store_address;$store_mobile=$post->store_mobile;$disable="none";$required="readonly";?>
                <form action="{{route('addstore.update',$post->id)}}" method="post" enctype="multipart/form-data">

                    <div class="box-body">
                            {{ csrf_field() }}
                            {{ method_field('put') }}


                            <?php } ?>


                            <div class="form-group col-md-3"  >
                                <label for="tsnef"> اختر التصنيف </label>
                                <select class="form-control " id="tsnef" name="tsnef">
                                     <option selected disabled>اختر</option>

                                     <?php foreach($categories as $key=>$value){?>

                                        <option value="<?=$key;?>"
                                              <?php if (!empty($tasnef)) {
                                                              if ( $value->id== $tasnef ) {
                                                                  echo 'selected';

                                                              }

                                                          }

                                                              ?> ><?=$value->name ?></option>




                                              <?php } ?>

                                </select>
                            </div>

                            <div class="form-group col-md-3">

                                <label for="store_name">@lang('site.name')</label>
                                <input type="text" value="{{ $store_name }}" name="store_name" id="store_name" data-validation="required" class="form-control ">
                            </div>

                            <div class="form-group col-md-3">

                                <label for="store_mobile">@lang('site.mobile')</label>
                                <input type="text" value="{{$store_mobile}}" name="store_mobile" id="store_mobile" data-validation="required" class="form-control ">
                            </div>

                            <div class="form-group col-md-3">

                                <label for="store_address">@lang('site.address')</label>
                                <input type="text" value="{{$store_address}}" name="store_address" id="store_address" data-validation="required" class="form-control ">
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo">@lang('site.logo')</label>

                                    <input type="file" value="" name="logo" id="logo" data-validation="required" class="form-control text-right">
                                </div>
                            </div>

                            <div class="form-group col-md-3"  >
                                <label for="Governorate"> @lang('site.choose_country') </label>
                                <select class="form-control " id="Governorate" name="Governorate">
                                    <option selected disabled>اختر</option>
                                    <?php
                                                if(!empty($country_govs))
                                                    foreach ($country_govs as $value) {?>
                                    <option value=" <?= $value->id?>"><?= $value->title?></option>
                                    <?php }
                                                ?>

                                </select>
                            </div>

                            <div class="form-group col-md-3"  >
                                <label for="City"> @lang('site.choose_city') </label>
                                <select name="City" class="form-control" >
                                    <option selected disabled>اختر</option>
                                </select>
                            </div>



                            <div class="form-horizontal" style="width: 550px">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Location:</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="us3-address" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Radius:</label>

                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="us3-radius" style="font-family: arial" />
                                    </div>
                                </div>
                                <div id="us3" style="width: 550px; height: 400px;"></div>
                                <div class="clearfix">&nbsp;</div>
                                <div class="m-t-small">
                                    <label class="p-r-small col-sm-1 control-label"> (Lat):</label>

                                    <div class="col-sm-3">
                                        <input type="text" name="lat_map" class="form-control" style="width: 110px;font-family: arial" id="us3-lat" />
                                    </div>
                                    <label class="p-r-small col-sm-2 control-label"> (Long):</label>

                                    <div class="col-sm-3">
                                        <input type="text" name="lang_map" class="form-control" style="width: 110px;font-family: arial" id="us3-lon" />
                                    </div>
                                </div>
                                <div class="clearfix"></div>

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




    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection





@push('js')









<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>

<script src="{{ url('/') }}/public/dashboard/adminlte/plugins/jQuery/locationpicker.jquery.js"></script>
<script>
    $('#us3').locationpicker({
        mapTypeId: google.maps.MapTypeId.HYBRID,
        location: {
            latitude: 26.37506589156855,
            longitude: 43.97146415710449
        },

        radius: 300,
        zoom: 12,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },

        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="Governorate"]').on('change', function() {
            var stateID = parseInt($(this).val());
           // alert(stateID);return;


            if(stateID) {
                $.ajax({
                    url: '{{url('')}}/ar/admin/getcity/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="City"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="City"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="City"]').empty();
            }
        });
    });
</script>









@endpush
