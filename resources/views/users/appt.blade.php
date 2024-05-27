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
<h2 class="text-center mt-5 mb-5" style="    color: #c50d0ddd;">appoiments tracker</h2>
@if(!count($app))


<div class="alert alert-danger mb-5">
   you have no appoiments today
</div>

@else




@foreach ($app as $key => $item)
<div class="alert alert-warning alert-dismissible fade show mt-5 mb-5" role="alert">
    <strong>Hello  </strong> your appoiments with {{$item->cli->name}} there <strong>{{$arr[$key]}} </strong>before you and your queue number is  <strong>{{$item->queue_num}}</strong>.
   @if ($arr2[$key])
   <strong>clinic has opened</strong>    
   @else
   <strong>clinic has not opened </strong> 
   @endif
   
  </div> 
@endforeach
 you need to refresh for any updates

  @endif
@endsection