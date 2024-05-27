@extends('admin.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
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
       <form action="{{route('editadmin')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("post")
       
        
        <div class="form-group">
            <label for="exampleInputPassword1">username</label>
            <input value="{{$patient->username}}" required type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="username">
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input value="{{$patient->password}}" type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
      

       
        
          
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
       </div>
       </section>
       </main>
@endsection
