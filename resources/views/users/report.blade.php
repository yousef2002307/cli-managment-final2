@extends('users.home')
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

@if (!$count)
<div class="alert alert-danger">
    to report clinic you have to be examined by it first
</div>
@else 


<section class="report2">
    <div class="container">
        <h1 class="text-center mb-5">report clinic</h1>
        <form action="{{url('/report')}}" method="POST">
            @method("post")
            @csrf
            <div class="form-group">
                <label for="">Prescription Fraud</label>
                <input type="radio" name="ch" value="1" checked>
            </div>
            <div class="form-group">
                <label for="">Billing Fraud</label>
                <input type="radio" name="ch" value="2">
            </div>
            <div class="form-group">
                <label for="">Unlicensed Practices</label>
                <input type="radio" name="ch" value="3">
            </div>
            <div class="form-group">
                <label for="">False Advertising</label>
                <input type="radio" name="ch" value="4">
            </div>
            <div class="form-group">
                <label for="">Overcharging</label>
                <input type="radio" name="ch" value="5" >
            </div>
            <input type="hidden" name="hidden" value="{{$id}}"/>
            <input type="submit" class="btn btn-lg btn=primary" value="submit">
        </form>
    </div>
</section>
@endif
@endsection