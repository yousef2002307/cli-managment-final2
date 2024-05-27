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
 <audio class="audio2">
   <source src="{{asset('mixkit-bell-notification-933.wav')}}" >
   Your browser does not support the audio element.
 </audio>
   <header class="header">

      <section class="flex">

         <!-- <a href="home.html" class="logo">Educa.</a> -->

         <form action="search.html" method="post" class="search-form">
            @if (url("/userhome") === url()->current())
            <input class="user-search" type="text" name="search_box" required placeholder="search doctors or clinic or state..." maxlength="100">
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
         @if (session('image') == 'x')
         <img src="{{asset('images/pic-1.jpg')}}" class="image" alt="">
         @else
         @if (session()->has('imagenet'))
         <img src="{{ session('image') }}" class="image" alt="User Image">
        
       @else
         <img src="{{ asset('images/' . session('image')) }}" class="image" alt="">
         @endif
         @endif
         <h3 class="name">{{session('username')}}</h3>
         <p class="role">patient</p>
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
         <a href="{{url("/userhome")}}"><i class="fas fa-home"></i><span>home</span></a>
         <a href="{{url("/usernotify")}}"><i class="fas fa-bell"></i><span>notifcation (<strong class="notify">({{session('usercount')}})</strong>)</span></a>
         <a href="{{url("/usermed")}}"><i class="fas fa-chalkboard-user"></i><span>add medical info</span></a>
        
         <a href="{{url("/userappoiments")}}"><i class="fas fa-question"></i><span>Appointment</span></a>
         <a href="{{url("/usereditprofile")}}"><i class="fas fa-graduation-cap"></i><span>edit profile</span></a>

         <a href="{{url("/appt")}}"><i class="fas fa-chalkboard-user"></i><span>appoiment tracker</span></a>
       
         <a href="{{url("/userecho")}}"><i class="fas fa-chalkboard-user"></i><span>Echo classificatient</span></a>
         <a href="{{url("/userchat")}}"><i class="fas fa-chalkboard-user"></i><span>chatbot</span></a>
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
   <script async>
    
      $(document).ready(function () {
       $(document).on("click",".aclose",function (e) { 
 
 console.log("xxx")
 return confirm("are you sure you want delete this record");
       });



       ////////////////////////////////////add more input/////////////////////////////
 $('.sec5 form a').click(function (e) { 
   e.preventDefault();
   
   let name = $('.sec5 form input[type="text"]').last().attr('name');
   let lastindex = name.lastIndexOf('e');
   let name1 = name.substring(0,lastindex + 1)
   let name2 = parseInt(name.substring(lastindex+1))+1;
   var newElement = $(` <input style="font-size: 20px;width:90%;display:inline-block" class="form-control mb-3" type="text" name="${name1}${name2}"/>`);
   var i = $(` <i style="cursor:pointer;display:inline-block;margin-left:6px" class='inputc fas fa-close'></i>`);
   $('.sec5 form div.xz >*').last().after(newElement);
   $('.sec5 form input[type="text"]').last().after(i);
   console.log(name1,name2)
   
});
console.log("sssss")

$(document).on("click",".inputc",function (e) { 
   $(this).prev().remove();
   $(this).remove();
});
var newElement2 = $(' <i class="star" style="color:red; font-size:25px;">*</i>');
$("form:not('.login') div input[required]").after(newElement2);
});
  </script>
 <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}" async></script>
 <script src="{{asset('assets/vendor/aos/aos.js')}}" async></script>
 <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" async></script>
 <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}" ></script>
 <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}" async></script>
 <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}" async></script>
 <script src="{{asset('assets/vendor/typed.js/typed.umd.js')}}" async></script>
 <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}" async></script>
 <script src="{{asset('assets/vendor/php-email-form/validate.js')}}" async></script>

 
 <script src="{{asset('assets/js/main.js')}}" async></script>
 <script src="{{asset('js/script.js')}}" async></script>
 
 

 <script src="{{asset('js/popper.min.js')}}" defer></script>
 <script src="{{asset('js/bootstrap.min.js')}}" defer></script>
 <script src="{{asset('js/rome.js')}}" defer></script>
 <script src="{{asset('js/main.js')}}" defer></script>
 <script src="{{asset('chat.js')}}" defer></script>
 <script src="{{asset('WOW-master\dist\wow.min.js')}}" ></script>
                <script defer>
                    new WOW().init();
                </script>
<script >
   const audioElement = document.querySelector('.audio');

const audioElement2 = document.querySelector('.audio2');
let chat = false;
let notify =false;
   $(document).ready(function () {
      setInterval(() => {
         
     
       //////////////////////////////notifcation count/////////////////////////////////////////////
  $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
  
    
      ///////////////////
      $.ajax({
        method: "post",
        url: "{{url('/notifycount')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {}, //the data you sed to index method
        success: function (response) {
        

console.log(response); // Output: 5
if(parseInt(response.result) > 0){
               
             if(document.querySelector(".notify").innerHTML!=response.result && notify){
              audioElement2.play();

             }
             notify = true;
               

            }
         document.querySelector(".notify").innerHTML =response.result;
         
       
         
        }
       });
      }, 5000);
      //////////////////////////////get selected value/////
      var selectedValue = $('#order').val();
      //////////////////////////
      function getPageNumberFromUrl(url) {
  const urlParams = new URLSearchParams(url.split('?')[1]); // Extract query parameters
  return urlParams.get('page'); // Get the value of the 'page' parameter
}

      $(document).on("input",".user-search",function (e) { 
       let value = $(this).val();
       console.log(value == '')
      $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
    
         const url = window.location.href;
const pageNumber = getPageNumberFromUrl(url);
      ///////////////////
      $.ajax({
        method: "post",
        url: "{{url('/usersearch')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {value,pageNumber: Number( pageNumber),selectedValue}, //the data you sed to index method
        success: function (response) {
        

console.log(pageNumber,response); // Output: 5
         
         document.querySelector(".box-container").innerHTML ='';
         console.log(response.result.data);
         response.result.map(ele => {
            let url = "{{ url('/') }}/userdocpro/" + ele.id;
            console.log(url);
            document.querySelector(".box-container").innerHTML += `
            <div class="box" data-id="${ele.id}">
         <div class="tutor">
            <img src=${ele.image == 'x' || ele.image == null ?"images/pic-2.jpg": `images/${ele.image}`} alt="">
            <div class="info">
               <h3>${ele.username}</h3>
               <span><i class="fa-solid fa-star" style="color: gold"></i>${ele.rating != 0 ?(ele.rating / ele.numofrating).toFixed(1) : 0}(${ele.numofrating})</span>
               <!-- <span>21-10-2022</span> -->
            </div>
         </div>
         <!-- <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div> -->
         <h3 class="title">name of clinic : ${ele.cli.name}</h3>
         <h3 class="title">name of doctor : ${ele.name}</h3>
         <h3 class="title">address of clinic : ${ele.cli.city},${ele.cli.b_no},${ele.cli.street}</h3>
         <h3 class="title">work hours :( ${ele.cli.works_from.substring(0, 5)} to ${ele.cli.works_to.substring(0, 5)})</h3>
         <a href="${url}" class="inline-btn">view info</a>
      </div>

            `;
         });
         
        }
       });
      // console.log($(this).val()) 
      });
      //////////////////////////preveny submit of search///////////////
      $(".search-form").submit(function (e) { 
         e.preventDefault();
         
      });

   });
   /////////////////rating
const starRating = document.querySelector('.star-rating');

starRating.addEventListener('click', (event) => {
  const clickedStar = event.target;

  // 1. Check for star icon
  if (!clickedStar.classList.contains('star-icon')) return; // Ensure only star icons trigger the action

  // 2. Clear active classes
  const starIcons = document.querySelectorAll('.star-icon');
  console.log(11,starIcons)
  starIcons.forEach(star => star.classList.remove('active'));

  // Debugging: Check if starIcons are retrieved correctly
  console.log(22,starIcons); // Log the star elements to the console

  // 3. Apply active classes
  const rating = parseInt(clickedStar.dataset.rating); // Ensure rating is a number
   console.log("hid val",rating)
   $(".hidden2").val(rating);
  for (let i = 0; i < rating; i++) {
    starIcons[i].classList.add('active');
  }

  // Debugging: Check for errors or unexpected behavior
  console.log('Active classes applied:', starIcons); // Log the elements with active classes
  //////////////////////delete button////////


 

});

</script>

</body>

</html>