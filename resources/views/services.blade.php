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



    <h2 class="text-center mb-4">our-services</h2>
    <div class="container">
    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">AI tools</h5>
              <p class="card-text">user to use these tools and with doctor supervision.</p>
              <a href="{{url('/userlogin')}}" class="btn btn-primary">Go and see for yourself</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">automuate scheduling</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="{{url('/cliniclogin')}}" class="btn btn-primary">Go see for yourself</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">notifcation between user and clinic</h5>
                <p class="card-text">you get notify when docor be absent this day or notify when there is appoiment change</p>
                <a href="{{url('/userlogin')}}" class="btn btn-primary">Go and see</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">doctor access to patient medical record and history</h5>
                <p class="card-text">doctor see all prev preceription that he made for user and user medical info and so on</p>
                <a href="{{url('/cliniclogin')}}" class="btn btn-primary">Go and see</a>
              </div>
            </div>
          </div>
          <a href="{{url('/')}}" class="mt-4 btn btn-primary">and many other more aweasome services for user and doctor and clinic go and see</a>
    </div>
      </div>


</div>
</section>
@endsection
