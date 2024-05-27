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
<h2 class="text-center mt-5 mb-5">search patient</h2>
<form action="{{url('/searchuser')}}" method="POST" >
    @csrf
    @method("post")
   
    
   <input type="text" name="name" class="form-control" placeholder="enter exact username of patient"/>
   
    
      
    <button type="submit" class="btn btn-primary">search</button>
  </form>
@endsection
