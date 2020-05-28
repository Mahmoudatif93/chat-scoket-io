
var chickWidth =$("#chick-width").val();
var chickHeight =$("#chick-height").val();


$('#checkbox1').on('change', function() { 
	if (!this.checked) {

		$("#data-block1").css("visibility","hidden");
		$("#padR1").attr("disabled","disabled");
		$("#padT1").attr("disabled","disabled");
		$("#padR1").val("");
		$("#padT1").val("");
	}
	else{
		$("#data-block1").css("visibility","visible");
		$("#padR1").removeAttr("disabled");
		$("#padT1").removeAttr("disabled");
	}      
});

$('#checkbox2').on('change', function() { 
	if (!this.checked) {

		$("#data-block2").css("visibility","hidden");
		$("#padR2").attr("disabled","disabled");
		$("#padT2").attr("disabled","disabled");
		$("#padR2").val("");
		$("#padT2").val("");
	}
	else{
		$("#data-block2").css("visibility","visible");
		$("#padR2").removeAttr("disabled");
		$("#padT2").removeAttr("disabled");
	}      
});
$('#checkbox3').on('change', function() { 
	if (!this.checked) {

		$("#data-block3").css("visibility","hidden");
		$("#padR3").attr("disabled","disabled");
		$("#padT3").attr("disabled","disabled");
		$("#padR3").val("");
		$("#padT4").val("");
	}
	else{
		$("#data-block3").css("visibility","visible");
		$("#padR3").removeAttr("disabled");
		$("#padT3").removeAttr("disabled");
	}      
});

$('#checkbox4').on('change', function() { 
	if (!this.checked) {

		$("#data-block4").css("visibility","hidden");
		$("#padR4").attr("disabled","disabled");
		$("#padT4").attr("disabled","disabled");
		$("#padR4").val("");
		$("#padT4").val("");
	}
	else{
		$("#data-block4").css("visibility","visible");
		$("#padR4").removeAttr("disabled");
		$("#padT4").removeAttr("disabled");
	}      
});
$('#checkbox5').on('change', function() { 
	if (!this.checked) {

		$("#data-block5").css("visibility","hidden");
		$("#padR5").attr("disabled","disabled");
		$("#padT5").attr("disabled","disabled");
		$("#padR5").val("");
		$("#padT5").val("");
	}
	else{
		$("#data-block5").css("visibility","visible");
		$("#padR5").removeAttr("disabled");
		$("#padT5").removeAttr("disabled");
	}      
});
$('#checkbox6').on('change', function() { 
	if (!this.checked) {

		$("#data-block6").css("visibility","hidden");
		$("#padR6").attr("disabled","disabled");
		$("#padT6").attr("disabled","disabled");
		$("#padR6").val("");
		$("#padT6").val("");
	}
	else{
		$("#data-block6").css("visibility","visible");
		$("#padR6").removeAttr("disabled");
		$("#padT6").removeAttr("disabled");
	}      
});
/*
$('#checkbox7').on('change', function() { 
	if (!this.checked) {

		$("#data-block7").css("visibility","hidden");
		$("#padR7").attr("disabled","disabled");
		$("#padT7").attr("disabled","disabled");
		$("#padR7").val("");
		$("#padT7").val("");
	}
	else{
		$("#data-block7").css("visibility","visible");
		$("#padR7").removeAttr("disabled");
		$("#padT7").removeAttr("disabled");
	}      
});*/
$('#checkbox7').on('change', function() { 
	if (!this.checked) {

		$("#data-block7").css("visibility","hidden");
		$("#padR7").attr("disabled","disabled");
		$("#padT7").attr("disabled","disabled");
		$("#condition_text").attr("disabled","disabled");
		$("#condition_text").val("");
		$("#padR7").val("");
		$("#padT7").val("");
	}
	else{
		$('#condition_text').removeAttr("disabled");
		$("#data-block7").css("visibility","visible");
		$("#padR7").removeAttr("disabled");
		$("#padT7").removeAttr("disabled");
	}      
});

$('#checkbox-Kaab').on('change', function() { 
	if (!this.checked) {
		$("#secondDiv").css("display","none");
		$("#fisrtDiv").attr("class","elbelad col-xs-12 no-padding");

		$("#padR8").attr("disabled","disabled");
		$("#padT8").attr("disabled","disabled");
		$("#wid8").attr("disabled","disabled");
		$("#padR9").attr("disabled","disabled");
		$("#padT9").attr("disabled","disabled");
		$("#wid9").attr("disabled","disabled");
		$("#padR10").attr("disabled","disabled");
		$("#padT10").attr("disabled","disabled");
		$("#wid10").attr("disabled","disabled");
		$("#padR11").attr("disabled","disabled");
		$("#padT11").attr("disabled","disabled");
		$("#wid11").attr("disabled","disabled");

		$("#padR8").val("");
		$("#padT8").val("");
		$("#padR9").val("");
		$("#padT9").val("");
		$("#padR10").val("");
		$("#padT10").val("");
		$("#padR11").val("");
		$("#padT11").val("");

		if($("#chick-width").val()<=20){
			$(".elbelad").css("width","16cm");
		}
		else
		{
			$(".elbelad").css("width","20.6cm");
		}
	}
	else{
		$("#secondDiv").css("display","block");
		$("#fisrtDiv").attr("class","elbelad col-xs-9 no-padding");
		$("#padR8").removeAttr("disabled");
		$("#padT8").removeAttr("disabled");
		$("#wid8").removeAttr("disabled");
		$("#padR9").removeAttr("disabled");
		$("#padT9").removeAttr("disabled");
		$("#wid9").removeAttr("disabled");
		$("#padR10").removeAttr("disabled");
		$("#padT10").removeAttr("disabled");
		$("#wid10").removeAttr("disabled");
		$("#padR11").removeAttr("disabled");
		$("#padT11").removeAttr("disabled");
		$("#wid11").removeAttr("disabled");
		
		if($("#chick-width").val()<=20){
			$(".elbelad").css("width","16cm");
		}
		else
		{
			$(".elbelad").css("width","20.6cm");
		}

		
	}      
});

$('#checkbox8').on('change', function() { 
	if (!this.checked) {

		$("#data-block8").css("visibility","hidden");
		$("#padR8").attr("disabled","disabled");
		$("#padT8").attr("disabled","disabled");
		$("#wid8").attr("disabled","disabled");
		$("#padR8").val("");
		$("#padT8").val("");
	}
	else{
		$("#data-block8").css("visibility","visible");
		$("#padR8").removeAttr("disabled");
		$("#padT8").removeAttr("disabled");
		$("#wid8").removeAttr("disabled");
	}      
});

$('#checkbox9').on('change', function() { 
	if (!this.checked) {

		$("#data-block9").css("visibility","hidden");
		$("#padR9").attr("disabled","disabled");
		$("#padT9").attr("disabled","disabled");
		$("#wid9").attr("disabled","disabled");
		$("#padR9").val("");
		$("#padT9").val("");
	}
	else{
		$("#data-block9").css("visibility","visible");
		$("#padR9").removeAttr("disabled");
		$("#padT9").removeAttr("disabled");
		$("#wid9").removeAttr("disabled");
	}      
});

$('#checkbox10').on('change', function() { 
	if (!this.checked) {

		$("#data-block10").css("visibility","hidden");
		$("#padR10").attr("disabled","disabled");
		$("#padT10").attr("disabled","disabled");
		$("#wid10").attr("disabled","disabled");
		$("#padR10").val("");
		$("#padT10").val("");
	}
	else{
		$("#data-block10").css("visibility","visible");
		$("#padR10").removeAttr("disabled");
		$("#padT10").removeAttr("disabled");
		$("#wid10").removeAttr("disabled");
	}      
});

$('#checkbox11').on('change', function() { 
	if (!this.checked) {

		$("#data-block11").css("visibility","hidden");
		$("#padR11").attr("disabled","disabled");
		$("#padT11").attr("disabled","disabled");
		$("#wid11").attr("disabled","disabled");
		$("#padR11").val("");
		$("#padT11").val("");
	}
	else{
		$("#data-block11").css("visibility","visible");
		$("#padR11").removeAttr("disabled");
		$("#padT11").removeAttr("disabled");
		$("#wid11").removeAttr("disabled");
	}      
});



/*
for (var i = 1; i <12; i++) {
	var padR= $("#padR"+i).val();
	var padT= $("#padT"+i).val();
	$("#data-block"+i).css("right",padR+"cm");
	$("#data-block"+i).css("top",padT +"cm");
}
*/

      // change margins

      $("#padR1").keyup(function() {
      	var padR1=$(this).val();
      	$("#data-block1").css("right",padR1+"cm");
      });
      $("#padT1").keyup(function() {
      	var padT1=$(this).val();
      	$("#data-block1").css("top",padT1+"cm");
      });
        // change 2
        $("#padR2").keyup(function() {
        	var padR2=$(this).val();
        	$("#data-block2").css("right",padR2+"cm");
        });
        $("#padT2").keyup(function() {
        	var padT2=$(this).val();
        	$("#data-block2").css("top",padT2+"cm");
        });

        // change 3
        $("#padR3").keyup(function() {
        	var padR3=$(this).val();
        	$("#data-block3").css("right",padR3+"cm");
        });
        $("#padT3").keyup(function() {
        	var padT3=$(this).val();
        	$("#data-block3").css("top",padT3+"cm");
        });

      // change 4
      $("#padR4").keyup(function() {
      	var padR4=$(this).val();
      	$("#data-block4").css("right",padR4+"cm");
      });
      $("#padT4").keyup(function() {
      	var padT4=$(this).val();
      	$("#data-block4").css("top",padT4+"cm");
      });

      // change 5
      $("#padR5").keyup(function() {
      	var padR5=$(this).val();
      	$("#data-block5").css("right",padR5+"cm");
      });
      $("#padT5").keyup(function() {
      	var padT5=$(this).val();
      	$("#data-block5").css("top",padT5+"cm");
      });

      // change 6
      $("#padR6").keyup(function() {
      	var padR6=$(this).val();
      	$("#data-block6").css("right",padR6+"cm");
      });
      $("#padT6").keyup(function() {
      	var padT6=$(this).val();
      	$("#data-block6").css("top",padT6+"cm");
      });

      // change 7
      $("#padR7").keyup(function() {
      	var padR7=$(this).val();
      	$("#data-block7").css("right",padR7+"cm");
      });
      $("#padT7").keyup(function() {
      	var padT7=$(this).val();
      	$("#data-block7").css("top",padT7+"cm");
      });











      $("#wid8").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid8=$(this).val();
      	$("#data-block8").css("width",wid8+"%");
      });
      $("#padR8").keyup(function() {
      	var padR8=$(this).val();
      	$("#data-block8").css("right",padR8+"cm");
      });
      $("#padT8").keyup(function() {
      	var padT8=$(this).val();
      	$("#data-block8").css("top",padT8+"cm");
      });





      $("#wid9").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid9=$(this).val();
      	$("#data-block9").css("width",wid9+"%");
      });
      $("#padR9").keyup(function() {
      	var padR9=$(this).val();
      	$("#data-block9").css("right",padR9+"cm");
      });
      $("#padT9").keyup(function() {
      	var padT9=$(this).val();
      	$("#data-block9").css("top",padT9+"cm");
      });





      $("#wid10").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid10=$(this).val();
      	$("#data-block10").css("width",wid10+"%");
      });
      $("#padR10").keyup(function() {
      	var padR10=$(this).val();
      	$("#data-block10").css("right",padR10+"cm");
      });
      $("#padT10").keyup(function() {
      	var padT10=$(this).val();
      	$("#data-block10").css("top",padT10+"cm");
      });





      $("#wid11").keyup(function() {
      	if ($(this).val() > $(this).attr('max')*1) {
      		$(this).val($(this).attr('max'));
      	} 
      	else if ($(this).val() < $(this).attr('min')*1) {
      		$(this).val($(this).attr('min'));
      	} 

      	var wid11=$(this).val();
      	$("#data-block11").css("width",wid11+"%");
      });
      $("#padR11").keyup(function() {
      	var padR11=$(this).val();
      	$("#data-block11").css("right",padR11+"cm");
      });
      $("#padT11").keyup(function() {
      	var padT11=$(this).val();
      	$("#data-block11").css("top",padT11+"cm");
      });


      

      $(".jscolor").blur(function() {

      	var jscolor=$(this).val();

      	$("#cheque").css("color", "#"+jscolor);
      	//$(".elbelad").css("borderBottom","1px solid " + "#"+jscolor);

      	//$(".right-chick").css("border","1px solid " + "#"+jscolor);
      	//$(".line").css("borderBottom","1px solid " + "#"+jscolor);

      	
      });


      function makewidth(){
      	$("#cheque").css("width",chickWidth)
      }




    