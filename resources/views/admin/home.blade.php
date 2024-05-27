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
       
        <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">

       
         
       
         
         <h3 class="name"></h3>
         <p class="role">admin</p>
       
         
       
  
         <!-- <a href="profile.html" class="btn">view profile</a> -->
      </div>

      <nav class="navbar row">
         <a href="{{url("/adminhome")}}"><i class="fas fa-home"></i><span>home</span></a>
         <a href="{{url("/searchcli")}}"><i class="fas fa-question"></i><span>search clinics</span></a>
         <a href="{{url("/searchuser")}}"><i class="fas fa-question"></i><span>search users</span></a>
         <a href="{{url("/adminuserstable")}}"><i class="fas fa-chalkboard-user"></i><span>users</span></a>
         <a href="{{url("/clitable")}}"><i class="fas fa-chalkboard-user"></i><span>clinics</span></a>
         <!-- earch ther clinics will be teh same as user-clinic page and tehy go to same route and i will add teh middle ware of doc to it and hide make appoiment button if and only if there session of docname  -->
         <a href="{{url("/editadmin")}}"><i class="fas fa-chalkboard-user"></i><span>edit profile </span></a>
         <a href="{{url("/adminreports")}}"><i class="fas fa-chalkboard-user"></i><span>reports </span></a>
      
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

<script>
   $(document).on("click",".aclose",function (e) { 
 
 console.log("xxx")
 return confirm("are you sure you want delete this record");
       });


</script>
</body>

</html>