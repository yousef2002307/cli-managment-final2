<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>clinic manment sysstem</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link href="assets/img/favicon.png" rel="icon">
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('hover-min.css')}}">
   <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('WOW-master\css\libs\animate.css')}}">
   <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4\docs\assets\owlcarousel\assets\owl.carousel.min.css')}}">
   <link rel="stylesheet" href="{{asset('OwlCarousel2-2.3.4\docs\assets\owlcarousel\assets\owl.theme.default.min.css')}}">
   <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
   <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
 
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
   <link rel="stylesheet"
   href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet"
   href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
   
   <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

   <link rel="stylesheet" href="{{asset('css/rome.css')}}">
   
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   
   <!-- Style -->
   <link rel="stylesheet" href="{{asset('css/style3.css')}}">

  
   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{asset('css/style2.css')}}">
   <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">
 <!-- Template Main CSS File -->
 <link rel="stylesheet" href="{{asset('css/style2.css')}}">
 <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">
   <!-- Template Main CSS File -->
   <link rel="stylesheet" href="{{asset('chat.css')}}">
   <link rel="stylesheet" href="{{asset('css/style2.css')}}">
   <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('css/clinic-user.css')}}">
 
   <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
@csrf
<button class="d-none xnn">clcik</button>
<audio class="audio">
   <source src="{{asset('iphone_notification.mp3')}}" type="audio/mpeg">
   Your browser does not support the audio element.
 </audio>
 
   <header class="header">

      <section class="flex">

         <!-- <a href="home.html" class="logo">Educa.</a> -->

         <form action="search.html" method="post" class="search-form">
            @if (url("/do2chome2") === url()->current())
            <input class="user-search" type="text" name="search_box" required placeholder="search doctors or clinic..." maxlength="100">
            <button type="submit" class="fas fa-search"></button>
            @endif
           
         </form>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <a style="cursor: pointer" href="{{url('docchat')}}" target="_blank">
            <div id="message-btn" style="position: relative"  class="fas fa-message">
               <span class="num"></span>
            </div>
         </a>
            <!-- <div id="user-btn" class="fas fa-user"></div> -->
            <div id="toggle-btn" class="fas fa-sun"></div>
         </div>
         
         
      
         <!-- <div class="profile">
            <img src="images/pic-1.jpg" class="image" alt="">
            <h3 class="name">shaikh anas</h3>
            <p class="role">studen</p> -->
         <!-- <a href="profile.html" class="btn">view profile</a>
            <div class="flex-btn">
               <a href="login.html" class="option-btn">login</a>
               <a href="register.html" class="option-btn">register</a>
            </div> -->
         </div>

      </section>

   </header>

   <div class="side-bar">

      <div id="close-btn">
         <i class="fas fa-times"></i>
      </div>

      <div class="profile">
        @if (session('docimg'))
        <img src="{{asset('images/'.session('docimg'))}}" class="image" alt="">
        @else
        <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">

        @endif
         
       
         
         <h3 class="name">{{session('docname')}}</h3>
         <p class="role">doctor</p>
         @if (isset($rate))
         <div class="rating">
            <i class="fas fa-star" style="color: gold"></i><span>{{number_format($rate,1)}}</span>
         </div>
         @endif
         
         <div class="social-links mt-3 text-center">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
         </div>
  
         <!-- <a href="profile.html" class="btn">view profile</a> -->
      </div>

      <nav class="navbar row">
         <a href="{{url("/dochome")}}"><i class="fas fa-home"></i><span>home</span></a>
         <a href="{{url("/docappoiments2")}}"><i class="fas fa-question"></i><span>today sechedule</span></a>
         <a href="{{url("/docappoiments")}}"><i class="fas fa-question"></i><span>all Appointment</span></a>
         <a href="{{url("/doceditprofile")}}"><i class="fas fa-graduation-cap"></i><span>edit profile</span></a>
         <a href="{{url("/resedit")}}"><i class="fas fa-graduation-cap"></i><span>edit receptionist</span></a>
         <a href="{{url("/docpatients")}}"><i class="fas fa-chalkboard-user"></i><span>my patients</span></a>
         <a href="{{url("/climap")}}"><i class="fas fa-chalkboard-user"></i><span>change clinic map</span></a>
         <!-- earch ther clinics will be teh same as user-clinic page and tehy go to same route and i will add teh middle ware of doc to it and hide make appoiment button if and only if there session of docname  -->
         <a href="{{url("/clieditprofile")}}"><i class="fas fa-chalkboard-user"></i><span>edit clinic </span></a>

         <a href="{{url("/profits")}}"><i class="fas fa-chalkboard-user"></i><span>profits </span></a>
         <a href="{{url("/logout")}}"><i class="fas fa-headset"></i><span>logout</span></a>
      </nav>

   </div>

<section class="xxx">  @yield('con') </section>








<!--

   <footer class="footer">

      &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

   </footer>
-->
 <!-- Vendor JS Files -->
   <!-- custom js file link  -->
   @yield('script')

   <script src="{{asset('js/jquery.min.js')}}" ></script>
   
 <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}" defer></script>
 <script src="{{asset('assets/vendor/aos/aos.js')}}" defer></script>
 <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
 <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}" ></script>
 <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}" async></script>
 <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}" async></script>
 <script src="{{asset('assets/vendor/typed.js/typed.umd.js')}}" async></script>
 <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}" async></script>
 <script src="{{asset('assets/vendor/php-email-form/validate.js')}}" async></script>

 
 <script src="{{asset('assets/js/main.js')}}" async></script>
 <script src="{{asset('js/script.js')}}" async></script>
 
 

 <script src="{{asset('js/popper.min.js')}}" async></script>
 <script src="{{asset('js/bootstrap.min.js')}}" async></script>
 <script src="{{asset('js/rome.js')}}" defer></script>
 <script src="{{asset('js/main.js')}}" defer></script>
 <script src="{{asset('chat.js')}}" defer></script>
 <script src="{{asset('WOW-master\dist\wow.min.js')}}" ></script>
                <script>
                    new WOW().init();
                </script>


<script >


const audioElement = document.querySelector('.audio');
let chat = false;
let notify =false;



/////////////////////////////////////////////////////////////
 
$.ajaxSetup({
                   headers : {
                       'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
                   }
           });
          
           
             ///////////////////
             $.ajax({
               method: "post",
               url: "{{url('/chatcount')}}" , // that is blade function to go to specific route
       //or you can pass a parameter to url func like this
       //  url: `{{url('/test2/${userid}')}}`
       
               data : {val:1}, //the data you sed to index method
               success: function (response) {
               
       
                  if(parseInt(response.result) > 0){
             if(document.querySelector("#message-btn .num").innerHTML!=response.result && chat){
              audioElement.play();
             }
             chat = true;
               

            }
           
     
                
                document.querySelector("#message-btn .num").innerHTML =response.result;
                
              
                
               }
              });





















///////////////////////////////////////////////////////////////



















///////////////////chat////////////////////////////
setInterval(() => {
         
     
       
         $.ajaxSetup({
                   headers : {
                       'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
                   }
           });
          
           
             ///////////////////
             $.ajax({
               method: "post",
               url: "{{url('/chatcount')}}" , // that is blade function to go to specific route
       //or you can pass a parameter to url func like this
       //  url: `{{url('/test2/${userid}')}}`
       
               data : {val:1}, //the data you sed to index method
               success: function (response) {
               
       
                  if(parseInt(response.result) > 0){
             if(document.querySelector("#message-btn .num").innerHTML!=response.result && chat){
              audioElement.play();
             }
             chat = true;
               

            }
           
     
                
                document.querySelector("#message-btn .num").innerHTML =response.result;
                
              
                
               }
              });
             }, 6000);
     
     
     
     
     
     
















/////////////////////////////////////
document.addEventListener("click", function(event) {
  const element = event.target;
  if (element.classList.contains("donotshow")) {
    // Get the value of the input with class ".xuz"
    const inputElement = document.querySelector(".xuz");
    const inputValue = inputElement.value;

    // Build the cookie with type and ID
    const type = "doc";
    const id = encodeURIComponent(inputValue); // Encode ID for safe cookie storage
    const cookieValue = `type=${type};id=${id}`;
    const csrfToken = '{{ csrf_token() }}';
    $.ajax({
   method : "POST",
    url: '/your-route-to-set-cookie',
    data: {
            _token: csrfToken, // Include the CSRF token here
            inputValue: $(".xuz").val()
        }, // Pass the input value to the server
    success: function(response) {
    
        const parentElement = event.target.parentElement;
        if (parentElement) {
            parentElement.style.display = 'none';
        }
    }
});



    // Hide the parent element
    const parentElement = element.parentElement;
    if (parentElement) {
      parentElement.style.display = "none";
    }
  }
  $(document).ready(function () {
            $('.visit').change(function (e) { 
                if($(this).val() < 0){
                    $(this).val(0)
                }
                
            });
        });

        var newElement2 = $(' <i class="star" style="color:red; font-size:25px;">*</i>');
$("form:not('.login') div input[required]").after(newElement2);
});




















/*

$timeint = 1000
setInterval(() => {
   

$.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
    
  
      ///////////////////
      $.ajax({
        method: "post",
        url: "{{url('/reshome2')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {}, //the data you sed to index method
        success: function (response) {
      
         if(response.success){
           $(".doc-hid").val(response.result[0].patients.id)
           $(".doc-hid2").val(response.result[0].id)
            let srcjo = response.result[0].patients.image == 'x' ? "{{asset('images/pic-1.jpg')}}" : "{{asset('images/')}}/"+  response.result[0].patients.image 
            document.querySelector('.jocard').innerHTML = ``
            document.querySelector('.jocard').innerHTML +=`
           
        <span>
          #${response.result[0].queue_num}
        </span>
       
        <img src="${srcjo}" alt="">
       
      
        <strong class="d-block mb-4 text-center">
         name:${response.result[0].patients.name}
        </strong>
        <strong class="d-block text-center">
          status:  ${response.result[0].revisit?"revisit" : "visit"}
         </strong>
        <div class="act ${response.result[0].active ? "act-green" : "act-red"}">
         ${response.result[0].active ? "active" : "non-active"}
        </div>
        
    
   
            `












         }

       
         
        }
       });


      }, $timeint);



*/










$(document).on("click",".aclose",function (e) { 
 
 console.log("xxx")
 return confirm("are you sure you want delete this record");
       });



</script>

@yield('script')
</body>

</html>