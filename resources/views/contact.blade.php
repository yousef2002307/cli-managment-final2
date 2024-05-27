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
<div class="content py-5" style="position: relative;z-index:6;color:#fff">
   <form action="{{url('/contact')}}" method="post">
    @csrf
    @method('post')
    <h2 class="text-center">contact-us</h2>
    <div class="container text-center">
   
    <input type="email" name="email" id="" class="form-control mb-3" placeholder="write email here"/>
    <textarea name="message" id="" cols="30" rows="10" class="form-control mb-3">
        write your message here
    </textarea>
    <input type="submit" value="send" class="btn btn-dark text-white">
   </form>
</div>
</div>
</section>
@endsection
