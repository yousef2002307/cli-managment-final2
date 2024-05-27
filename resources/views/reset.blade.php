@extends('welcome')
@section('home')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif


<div class="content py-5" style="position: relative;z-index:6;color:#fff">
   <form action="{{url('/reset')}}" method="post">
    @csrf
    @method('post')
    <h2 class="text-center">enter code was sent to your phone number {{$phone}}</h2>
   
   <label style="color: black" for="">enter code</label>
    <input type="text" name="email" id="" class="form-control mb-3" placeholder="write code here" required/>
    

    <label style="color: black" for="">enter new  password</label>
    <input type="password" name="password" id="" class="form-control mb-3" placeholder="write password here" required/>
   
   <input name="hid" type="hidden" value="{{$number}}">
   <input name="id" type="hidden" value="{{$id}}">

    <input type="submit" value="send" class="btn btn-dark text-white">
    
   </form>
</div>

@endsection
