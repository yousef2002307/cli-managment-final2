@extends('res.home')
@section('con')
@if (isset($error))
<div class='alert alert-danger'>{{$error}}  </div>
@endif
@if (isset($success))
<div class='alert alert-success'>{{$success}}  </div>
@endif
<script>
    setTimeout(function() {
       
    window.location.href = "{{ url()->previous() }}";  // Replace with your desired route
    }, 2000); // Delay in milliseconds (5 seconds in this case)
    </script>



@endsection