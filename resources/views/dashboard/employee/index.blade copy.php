@extends('dashboard/require/index_dashboard')
@section('content')

<link href="{{asset('/public/dashboard/css1/style.css')}}" rel="stylesheet" type="text/css" />
<style>
    .bu {
        margin: 5px;
    }

</style>
<body>
    <!-- Side Navbar -->

    <div class="content-wrapper page" style="overflow-y: scroll;
     height: 20px;">

        <div class="col-xs-12">
            {!! $dataTable->table(['class'=>"table  "],true) !!}

        </div>

        <section class="content">
            <div class="col-md-1"></div>

            <div class="col-md-1"></div>
        </section>
        <!--content-->



    </div>


</body>
@push('js')
{!! $dataTable->scripts() !!}
@endpush
@endsection
