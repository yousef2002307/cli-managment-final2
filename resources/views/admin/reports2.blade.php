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
@php
    $arr = array(
        "1" => "Prescription Fraud",
        "2" => "Billing Fraud",
        "3" => "Unlicensed Practices",
        "4" => "False Advertising",
        "5" => "Overcharging"
);
@endphp
<h2 class="text-center mt-5 mb-5">available reports</h2>

   
    
 
    @foreach ($cli as $item)
    <div>
        @php
      $cli = DB::select('select * from patient where id = ? LIMIT 1', [$item->patient_id]);
    @endphp
      <p> {{$arr[$item->val]}}</p>
      <span>{{$item->created_at}}</span>
      <p>name of user : <a href="{{url("/admincliview2/$item->patient_id")}}"> {{$cli[0]->username}}</a></p>
        <hr style="background-color: brown"/>
    </div>
    @endforeach

   
    
      
    
@endsection
