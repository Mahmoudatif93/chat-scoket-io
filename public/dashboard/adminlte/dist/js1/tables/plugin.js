$(document).ready(function() {
	var table= $('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
        'pageLength',
		'copy', 
        'csv', 
        'excelHtml5',
        {
          extend: "pdfHtml5",
          orientation: 'landscape'
      }, 
      
      {
        extend: 'print',
        exportOptions: { columns: ':visible'},
        orientation: 'landscape'
    },
    'colvis'
    ],
    colReorder: true
} );

    var table2= $('.example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    } );




$('#addSearchInputs').click( function () {
    $('#example thead tr:eq(0) ').css("display" ,"table-row");
 $('.example thead tr:eq(0) ').css("display" ,"table-row");
 
 
    $("#example thead tr:eq(0) th").each( function ( i ) {
        var select = $('<select class="selectpicker form-control"  data-show-subtext="true" data-live-search="true"><option value="">اختر</option></select>')
        .appendTo( $(this).empty() )
        .on( 'change', function () {
            table.column( i )
            .search( $(this).val() )
            .draw();
        } );

        table.column( i ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
        $('#example thead tr:eq(0) th:first-child').html("");
        $('#example thead tr:eq(0) th:last-child').html("");

    } );
    
    
        $(".example thead tr:eq(0) th").each( function ( i ) {
        var select = $('<select class="selectpicker form-control"  data-show-subtext="true" data-live-search="true"><option value="">اختر</option></select>')
        .appendTo( $(this).empty() )
        .on( 'change', function () {
            table2.column( i )
            .search( $(this).val() )
            .draw();
        } );

        table2.column( i ).data().unique().sort().each( function ( d, j ) {
            select.append( '<option value="'+d+'">'+d+'</option>' )
        } );
        $('.example thead tr:eq(0) th:first-child').html("");
        $('.example thead tr:eq(0) th:last-child').html("");

    } );
});





$('#example tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
    }
    else {
       table.$('tr.selected').removeClass('selected');
       $(this).addClass('selected');
   }
} );


$('.example tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
    }
    else {
       table2.$('tr.selected').removeClass('selected');
       $(this).addClass('selected');
   }
} );




$('#Delete-Record').click( function () {
    table.row().remove().draw( false );
    $('.modal').modal('toggle');
    showLoading();
    showAlertDelete();

} );


function showAlertDelete() {

    $('.top-line').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>تم المسح !</strong> لقد قمت بحذف بعض العناصر ...</div>'
        ).fadeIn().delay(4000).fadeOut();

}


function showLoading() {

    $('#preloading').html('<div id="load"></div>');
    window.setTimeout(function(){
     $('#load').css("display", "none");
     $('#Main-content').css("display", "block");
 }, 1000);
}
	/*$('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );*/


} );






