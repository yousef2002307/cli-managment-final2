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
<section class="jo4">
    <form class="d-flex login" action="{{route('doclogin.post')}}" method="POST" >
        @csrf
        @method("post")
        <div class="first mx-auto">
            <div class="title">doctor login</div>
            <div class="">
               
                <input class="form-control" name="username" type="text" placeholder="Enter your username" required>
              </div>
              

              <div class="">
              
                
                <input class="form-control" name="password" type="password" placeholder="Enter your password(at least 6 character and one is alphaphetic)" required>
              </div>
           
        </div>
    
        <div class="button input-box">
            <input type="submit" value="login">
          </div>
          <div class="text" style="    margin: auto;"><a href="{{url('/forget3')}}">Forgot Password?</a></div>
    </form>
   
</section>
@endsection
