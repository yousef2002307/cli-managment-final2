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


<section class="cliview">
    <div>
    <p>doctor username : {{$count ? $doctor->username : ''}}</p>
    </div>
    <div>
        <p>clinic rating: {{$count ? ($doctor->numofrating? $doctor->numofrating / $doctor->rating : 0)  : ''}}</p>
    </div>
    <div>
        <p>joined AT: {{$cli->created_at}} </p>
    </div>
    <div>
        <p>num of visits acceptable: {{$cli->numofvisits}} </p>
    </div>
    <div>
        <p>profits made :{{$count ? $doctor->profits : ''}} </p>
    </div>
    <div>
        <p>price of clinic :{{$cli->price}} </p>
    </div>
    <div>
        <p>doctor name : {{$count ? $doctor->name : ''}}</p>
    </div>
    <div>
        <p>clinic phone : {{$cli->phone}} </p>
    </div>
    <div class="pend">
        @if ($cli->pending)
        <a href="{{url("/adminactivatecli/$cli->id")}}" class="btn">activate</a>
        @else
        
        <a href="{{url("/adminpendingcli/$cli->id")}}" class="btn">disable this clininc for review</a>
        @endif
        <a class="aclose" href='{{url("/adminclidel/$cli->id")}}'>delete</a>
    </div>
</section>
@endsection
