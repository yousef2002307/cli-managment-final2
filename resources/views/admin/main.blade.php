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



<div class="gridjo">
    <div class="item">
        num of clinics : <span>{{$cli}}</span>
    </div>
    <div class="item"> num of patients : <span> {{$pat}}</span></div>
    <div class="item"> num of doctors : <span> {{$doc}}</span></div>
    <div class="item"> num of receptionists : <span> {{$res}}</span></div>
</div>
@endsection
