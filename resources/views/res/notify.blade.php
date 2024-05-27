@extends('res.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section class="py-5">
    <div class="container">
    <h1 class="text-center">notifcations</h1>
    <div class="notif">
        @if ($notifycount == 0)
            <div>there is no notifcations avilable</div>


        @else
        @foreach ($notify as $item)
        <div class="alert alert-warning alert-dismissible fade show my-5" role="alert">
             {{$item->message}}
             ({{$item->created_at}})
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endforeach

       
        @endif
    </div>
</div>
</section>



@endsection