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
<h2 class="text-center mt-5 mb-5">choose clinic</h2>
<form action="{{url('/adminreports')}}" method="POST" >
    @csrf
    @method("post")
   
    
   <select class="form-control mb-4" name="clinic" id="">
    @foreach ($cli as $item)
        <option value="{{$item->id}}"> {{$item->name}}</option>
    @endforeach
   </select>
   
    
      
    <button type="submit" class="btn btn-primary">choose</button>
  </form>
@endsection
