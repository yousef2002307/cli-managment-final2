@extends('welcome')
@section('home')
<section class="home py-4">
    <div class="overlay"></div>
<nav class="j-home">
    <ul class="j-home-nav">
        <li><a href="{{url('/')}}">home</a></li>
        <li ><a href="{{url('/about')}}">about-us</a></li>
        <li ><a href="{{url('/serv')}}">services</a></li>
        <li ><a href="{{url('/contact')}}">contact-us</a></li>
        
    </ul>
 </nav>
<h4 class="title"  style="position: fixed;
z-index: 6;
color: #fff;
top: 40px;
left: 20px;
font-size: 15px;">heart clinic managment system</h4>
 <div class="j-buttons ">
   
    <button><a href="{{route("user-login")}}">login as patient</a></button>
    <button><a href="{{route("Cli-login")}}">login as clinic</a></button>
 </div>
</section>
@endsection
