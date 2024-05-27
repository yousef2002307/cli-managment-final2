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
    <h2 class="text-center">about-us</h2>
    <p class="lead" style="    width: 50%;
    margin: 28px auto;
    font-size: 1rem;">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </p>

<hr/>
    

</div>
</section>
@endsection
