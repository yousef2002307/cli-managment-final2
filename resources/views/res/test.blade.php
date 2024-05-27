@extends('res.home')
@section('con')
@if ($status )
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hello receptionist</strong> Youhave missing data t <a href="{{url('/resedit')}}">here</a>.
 <button class="btn donotshow">do not show this agian</button>
 <input type="hidden" class="xuz" value="{{session('resid')}}"/>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<div class="sch-res">
  <h1 class="mt-4 mb-1 text-center">there 5 appoimnts lefts</h1>
  <section class="jocards">
    <div class="container">
      <div class="jocard">
        <span>
          #1
        </span>
       
        <img src="{{asset('images/pic-1.jpg')}}" alt="">
       
      
        <strong class="d-block mb-4 text-center">
         name:samy
        </strong>
        <strong class="d-block text-center">
          status:  visit
         </strong>
        <div class="act act-green">
          active
        </div>
        
      </div>
    </div>
    <div class="jo22">
     
       
      <button type="submit" class="exa hvr-bounce-to-right theme_btn_two  ">send it to another day</button>
    
     
    </div>
   
  </section>
</div>
@endsection