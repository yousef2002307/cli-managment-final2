@extends('users.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

@if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
@if ($doc[0]->cli->pending)
<div class="alert alert-danger">
   the clinic is under review due to reports come back later
</div>
@else   

@php
$id = $doc[0]->cli->id;    
@endphp
<a href='{{url("/report/$id")}}' class="report">  report clinic </a>
<a href='{{url("/map/$id")}}' style="top: 59%" class="report">  clinic map location </a>
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
       <h1>{{$doc[0]->name}}</h1>
       <p>doctor <span class="typed" data-typed-items="Profile"></span></p>
    </div>
 </section><!-- End Hero -->

 <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
       <div class="container">

          <div class="section-title">
             <h2>About</h2>
             <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                fugiat sit
                in iste officiis commodi quidem hic quas.</p> -->
          </div>

          <div class="row">
             <div class="col-lg-4" data-aos="fade-right">
                <img src="{{asset('images/medical-background-with-close-up-doctor-vector-28362546.jpg')}}" class="img-fluid" alt="">
             </div>
             <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                <h3>doctor information</h3>
                <p class="fst-italic">
                  {{$doc[0]->cli->desc2}}
                </p>
                <div class="row">
                   <div class="col-lg-5">
                      <ul>
                         <li><i class="bi bi-chevron-right"></i> <strong>username:</strong> <span> {{$doc[0]->username}}</span>
                         </li>
                         <li><i class="bi bi-chevron-right"></i> <strong>name:</strong>
                            <span> {{$doc[0]->name}}</span>
                         </li>
                         <li><i class="bi bi-chevron-right"></i> <strong>clinic name:</strong> <span> {{$doc[0]->cli->name}}</span>
                         </li>
                         <li><i class="bi bi-chevron-right"></i> <strong>phone of doctor:</strong> <span> {{$doc[0]->phone}}</span>
                         </li>
                      </ul>
                   </div>
                   <div class="col-lg-5">
                      <ul>
                         <li><i class="bi bi-chevron-right"></i> <strong>rating:</strong> <span> {{$doc[0]->numofrating == 0 ? 0 :number_format($doc[0]->rating  / $doc[0]->numofrating,1)}}</span></li>
                         <li><i class="bi bi-chevron-right"></i> <strong>address:</strong> <span> {{$doc[0]->cli->b_no}}/ {{$doc[0]->cli->city}}/ {{$doc[0]->cli->street}}</span></li>
                         <li><i class="bi bi-chevron-right"></i> <strong>phone of clinic:</strong>
                            <span>{{$doc[0]->cli->phone}}</span>
                         </li>
                         <li><i class="bi bi-chevron-right"></i> <strong>work hours:</strong> <span>( {{substr($doc[0]->cli->works_from,0,5)}} to {{substr($doc[0]->cli->works_to,0,5)}})</span>
                         </li>
                      </ul>
                   </div>
                </div>
                <p>
                  <strong class="d-block">qualification:</strong>
                  {{$doc[0]->qualification}}
                </p>
             </div>
          </div>

       </div>

       <div class="star-rating" style="justify-content: center; margin: 20px auto">
         <i class="fas fa-star star-icon active" data-rating="1"></i>
         <i class="fas fa-star star-icon" data-rating="2"></i>
         <i class="fas fa-star star-icon" data-rating="3"></i>
         <i class="fas fa-star star-icon" data-rating="4"></i>
         <i class="fas fa-star star-icon" data-rating="5"></i>
       </div>
       @if ($bool)
       <p class="text-center">(you already rate the clinic ({{$bool}} / 5) , you can change it anytime)</p>
       @endif
       
       <form action="{{route('user.rate')}}" method="POST" class="row">
        
           @csrf
           @method("post")
           <input value="1" type="hidden" class="hidden2" name="hidden"/>
           <input value="{{$doc[0]->id}}" type="hidden"  name="hidden2" />
           <input value="{{session('userid')}}" type="hidden"  name="hidden3" />
       <button type="submit" class="btn-sm btn btn-primary mb-4">give your rating</button>
       </form>
       <a href="{{route('user.docappoi',$doc[0]->id)}}" class=" hvr-bounce-to-right theme_btn_two  ">make appoiments</a>
    </section><!-- End About Section -->


    </section><!-- End Contact Section -->

 </main>
 @endif

@endsection
