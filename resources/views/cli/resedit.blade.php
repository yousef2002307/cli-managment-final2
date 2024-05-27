
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
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="edit" class="edit">
       <div class="container">
       <h2 class="text-center">edit profile</h2>
       <form action="{{url('resupdate')}}" method="POST" >
        @csrf
        @method("post")
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input value="{{$patient->email}}" type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            
            <input value="{{$patient->password}}" type="hidden" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
      
          <input type="hidden" name="hidden" value="{{$patient->id}}">
          <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input value="{{$patient->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">username</label>
            <input value="{{$patient->username2}}" required type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="username">
          </div>

         
          
          <div class="form-group">
            <label for="exampleInputPassword1">phone</label>
            <input value="{{$patient->phone}}" type="number" name="phone"  class="form-control" id="exampleInputPassword1" placeholder="phone">
          </div>
        
          
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
       </div>
       </section>
       </main>
@endsection