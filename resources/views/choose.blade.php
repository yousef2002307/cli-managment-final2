@extends('welcome')
@section('home')
<section class="home py-4">
   <div class="overlay"></div>
 <div class="j-buttons">
    <button><a href="{{url('/doclogin')}}">continue as doctor</a></button>
    <button><a href="{{url('/reslog')}}">continue as receptionist</a></button>
 </div>
</section>
@endsection
