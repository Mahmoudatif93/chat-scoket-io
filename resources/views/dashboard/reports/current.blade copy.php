@extends('dashboard/require/index_dashboard')
@section('content')


<div class="content-wrapper page">


    <section class="content">
        <div class="col-md-1"></div>

        <!-- MAIN CONTENT-->

        <br>



        <div class="content1" /*style="margin-right: 50px;" * />


       
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">المفقود والموجود</h3>
            </div>
            <div class="panel-body">
                <!-- open panel-body-->
                <fieldset>
                    {!! $dataTable->table(['class'=>"table"],true) !!}

                </fieldset>
                <!-- close panel-body-->
            </div>
        </div>
        <div class="col-md-1"></div>
    </section>
    <!--content-->



</div>
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
                    <h4>هل انت متاكد من الحذف</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>

    </div>
</div>
@push('js')

<script>
    function delete_gov(input) {
        //alert($(input).attr("data-url"));

        $("#form_delete_gov").attr("action", $(input).attr("data-url"));
    }




    function get_govs(vall) {
        //alert();
        //$("input").prop('disabled', true);
        //$("input").prop('disabled', false);
        if (vall == 1) {
            $('#fatra').show();
            $("#from").prop('disabled', false);
            $("#to").prop('disabled', false);
            $("#year").prop('disabled', true);
            $("#month").prop('disabled', true);
            $('#s_month').hide();
            $('#s_year').hide();


        } else if (vall == 2) {
            $('#s_month').show();
            $("#from").prop('disabled', true);
            $("#to").prop('disabled', true);
            $("#year").prop('disabled', true);
            $("#month").prop('disabled', false);
            $('#fatra').hide();
            $('#s_year').hide();
        } else if (vall == 3) {
            $('#s_year').show();
            $("#from").prop('disabled', true);
            $("#to").prop('disabled', true);
            $("#year").prop('disabled', false);
            $("#month").prop('disabled', true);
            $('#fatra').hide();
            $('#s_month').hide();
        }
    }

</script>

{!! $dataTable->scripts() !!}
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection
