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
    <p> username : {{$cli->username}}</p>
    </div>
    <div>
        <p>address: {{$cli->b_no}}/{{$cli->street}}/{{$cli->city}}</p>
    </div>
    <div>
        <p>joined AT: {{$cli->created_at}} </p>
    </div>
    <div>
        <p>name: {{$cli->name}} </p>
    </div>
    <div>
        <p>email: {{$cli->email}} </p>
    </div>
    <div>
        <p> phone : {{$cli->phone}} </p>
    </div>
    <div class="pend">
        @if ($cli->pending)
        <a href="{{url("/adminactivatecli2/$cli->id")}}" class="btn">activate</a>
        @else
        
        <a href="{{url("/adminpendingcli2/$cli->id")}}" class="btn">disable this user for review</a>
        @endif
        
            <a class="aclose" href='{{url("/adminclidel2/$cli->id")}}'>delete</a>
    
    </div>
</section>
@endsection
