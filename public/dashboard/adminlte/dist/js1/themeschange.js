            function createCookie(name,value,days) {
              if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
              }
              else var expires = "";
              document.cookie = name+"="+value+expires+"; path=/";
            }

            function readCookie(name) {
              var nameEQ = name + "=";
              var ca = document.cookie.split(';');
              for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
              }
              return null;
            }

            function eraseCookie(name) {
              createCookie(name,"",-1);
            }

            document.addEventListener('DOMContentLoaded',function(){

              if(readCookie('css')){
        var e = document.getElementById('test-css'); // <link href="..." id="test-css"/>
        e.href = readCookie('css'); 
      }
var element = document.getElementById('change-css');
    var element1 = document.getElementById('change-css1'); // <a herf="#" id="change-css" rel="file.css">Click Here</a>
    var element2 = document.getElementById('change-css2');
    var element3 = document.getElementById('change-css3');
    var element4 = document.getElementById('change-css4');

    element.addEventListener('click', function (event) { 
      var e = document.getElementById('test-css');
      e.href = this.rel;
      if(readCookie('css')){  
        eraseCookie('css');     
      }
      createCookie('css',this.rel,365); 
      event.preventDefault(); 
    }, false);


    element1.addEventListener('click', function (event) { 
      var e = document.getElementById('test-css');
      e.href = this.rel;
      if(readCookie('css')){  
        eraseCookie('css');     
      }
      createCookie('css',this.rel,365); 
      event.preventDefault(); 
    }, false);

    element2.addEventListener('click', function (event) { 
      var e = document.getElementById('test-css');
      e.href = this.rel;
      if(readCookie('css')){  
        eraseCookie('css');     
      }
      createCookie('css',this.rel,365); 
      event.preventDefault(); 
    }, false);

    element3.addEventListener('click', function (event) { 
      var e = document.getElementById('test-css');
      e.href = this.rel;
      if(readCookie('css')){  
        eraseCookie('css');     
      }
      createCookie('css',this.rel,365); 
      event.preventDefault(); 
    }, false);

    element4.addEventListener('click', function (event) { 
      var e = document.getElementById('test-css');
      e.href = this.rel;
      if(readCookie('css')){  
        eraseCookie('css');     
      }
      createCookie('css',this.rel,365); 
      event.preventDefault(); 
    }, false);




  });
