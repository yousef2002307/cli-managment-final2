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
   <form action="{{url('/forget3')}}" method="post">
    @csrf
    @method('post')
    <h2 class="text-center">forget password,doc</h2>
    <div class="container text-center">
   <label style="color: black" for="">old info to find your account</label>
    <input type="email" name="email" id="" class="form-control mb-3" placeholder="write email here" required/>
    
    <input type="text" name="username" id="" class="form-control mb-3" placeholder="write username here" required/>
   

    <label for="" style="color: black">new password</label>

    <input type="password" name="password" id="" class="form-control mb-3" placeholder="write password here" required/>
    <input type="submit" value="send" class="btn btn-dark text-white">
   </form>
</div>

@endsection
