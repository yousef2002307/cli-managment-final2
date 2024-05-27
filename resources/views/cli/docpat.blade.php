@extends('cli.home')
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
<section class="courses">

    <h1 class="heading">patients</h1>

    <div class="box-container">
@foreach ($pats as $pat)
<div class="box">
    <div class="tutor">
        @if ($pat->patients->image == 'x')
      <img src="{{asset('images/pic-1.jpg')}}" alt="">
      @else 
      <img src="{{asset('images/'.$pat->patients->image)}}" alt="">

      @endif
       <div class="info">
          <h3>{{$pat->patients->name}}</h3>
          <!-- <span>21-10-2022</span> -->
       </div>
    </div>
    <!-- <div class="thumb">
       <img src="images/thumb-1.png" alt="">
       <span>10 videos</span>
    </div> -->
  
    <a href="{{url('/viewinfo',$pat->patients->id)}}" class="inline-btn">view info</a>
  
 </div>
@endforeach
      

 
    </div>
  
 </section>


@endsection