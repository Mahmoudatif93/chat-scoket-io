 <!DOCTYPE html>
<html>

  
<head>
    
    <link href="{{asset('/public/dashboard/css/bootstrap-rtl.css')}}" rel="stylesheet" type="text/css"/>
	
	<link href="{{asset('/public/dashboard/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
    
   <link href="{{asset('/public/dashboard/login/fonts/iconic/css/material-design-iconic-font.min.css')}}" rel="stylesheet" type="text/css"/>
   
   <link href="{{asset('/public/dashboard/login/vendor1/animate/animate.css')}}" rel="stylesheet" type="text/css"/>
   
   
    <link href="{{asset('/public/dashboard/login/vendor1/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<link href="{{asset('/public/dashboard/login/vendor1/animsition/css/animsition.min.css')}}" rel="stylesheet" type="text/css"/>
   
  <link href="{{asset('/public/dashboard/login/vendor1/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>
  
  <link href="{{asset('/public/dashboard/login/vendor1/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css"/>
  
  <link href="{{asset('/public/dashboard/login/css3/util.css')}}" rel="stylesheet" type="text/css"/>
  
  
  <link href="{{asset('/public/dashboard/login/css3/mainar.css')}}" rel="stylesheet" type="text/css"/>

  
    
  
   
     <link rel="icon" type="image/png" sizes="16x16" href="">
    
   
    
   
</head>
    
    
    
    <body style="background-image: url('http://localhost/test/public/dashboard/login/img/desk.jpg');">
	
         
        
        
	<div class="limiter">
<div class="container-login100" >
			<div class="wrap-login100">
              <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
			 @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						تسجيل الدخول
					</span>

					<div class="wrap-input100 validate-input" data-validate = "أدخل أسم المستخدم">
                    
                    
						<input class="input100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="أدخل أسم المستخدم" type="text" name="email" value="{{ old('email') }}"  autofocus >
                          @if ($errors->has('email'))
						<span class="focus-input100" data-placeholder="&#xf207;" role="alert"></span>
                          <strong style="color: red;font-size: larger;">{{ $errors->first('email') }}</strong>
                          @endif
					</div>
                     
                    
                    
                    
                    
                    

					<div class="wrap-input100 validate-input" data-validate="أدخل كلمة السر">
						<input class="input100 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" placeholder="أدخل كلمة السر" name="password" >
					
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback focus-input100" role="alert" data-placeholder="&#xf191;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                     
					</div>

					<div class="contact100-form-checkbox">
                      
					 
                        
                        
                        
                        
                        
                        
                        
                        <input class="input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						<label class="label-checkbox100" for="remember">
							تذكرنى
						</label>
					</div>
<div class="text-left  ">
					 
                        
                        
                          @if (Route::has('password.request'))
                                    <a class="txt1" href="{{ route('password.request') }}">
                                       هل نسيت كلمة السر؟
                                    </a>
                                @endif
					</div>
					<div class="container-login100-form-btn">
                    
                    
                     
                    
                    
                    
                    
                    
						<button class="login100-form-btn" type="submit">
                          
                        
							تسجيل الدخول
						</button>
                       
					</div>

					 
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
        
        
        	  
	  
	  <script src="{{asset('/public/dashboard/login/vendor1/jquery/jquery-3.2.1.min.js')}}"></script>
	  
	  <script src="{{asset('/public/dashboard/login/vendor1/animsition/js/animsition.min.js')}}"></script>
	  <script src="{{asset('/public/dashboard/login/vendor1/bootstrap/js/popper.js')}}"></script>
	  
	  <script src="{{asset('/public/dashboard/login/vendor1/bootstrap/js/bootstrap.min.js')}}"></script>
	  
	   <script src="{{asset('/public/dashboard/login/vendor1/select2/select2.min.js')}}"></script>
	   
	   <script src="{{asset('/public/dashboard/login/vendor1/daterangepicker/moment.min.js')}}"></script>
	   
	    <script src="{{asset('/public/dashboard/login/vendor1/daterangepicker/daterangepicker.js')}}"></script>
		
		 <script src="{{asset('/public/dashboard/login/vendor1/countdowntime/countdowntime.js')}}"></script>
         <script src="{{asset('/public/dashboard/login/vendor1/countdowntime/main.js')}}"></script>
		 <script src="{{asset('/public/dashboard/login/js/main.js')}}"></script>
         <script>
         
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
          //  if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
              //  return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).addClass('active');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).removeClass('active');
            showPass = 0;
        }
        
    });


})(jQuery);
         </script>
         
   
</body>