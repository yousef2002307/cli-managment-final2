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

 <section class="form-container">
  @if (!$patient->creditcardnumber || !$patient->ccv)
  <div class="" style="
    position: fixed;
    bottom: 31px;">to pay online fill all our credit card data from  <a style="cursor: pointer;
    display: inline-block;
    position: relative;
    z-index: 77777777777;" href="{{url("/usereditprofile")}}">here</a></div>
  @endif
  <!-- <form action="" method="post" enctype="multipart/form-data"> -->
    <p class="appoint" style="font-weight: 700; font-size: 200%; color: black; margin-top: 50px; position: fixed; top: 10%;">Make appointment</p>
   
    <div class="content" style="color: black; margin-top: 50px; position: fixed; top: 20%; padding-right: 20%;">

        <div class="container text-left">
          <div class="row justify-content-center">
            <div class="col-lg-3">
              @if (!isset($editid))
              <form action="{{route('user.docappoi2')}}" method="POST" class="row">
                @else
                <form action="{{route('user.update')}}" method="POST" class="row">
                @endif
                  @csrf
                  @method("post")
                <div class="col-md-12">
                  <div class="form-group">
                    @if (!isset($editid))
                      <input type="hidden" name="hidden" value="{{$id}}">
                      @else
                      <input type="hidden" name="hidden" value="{{$editid}}">
                      @endif
                   
                      <label for="input_from">Select date</label>
                      @if (!isset($editid))
                    <input  name="date" type="text" class="form-control" id="input" style="font-size: 100%; color: black;" >
                    @else
                    <input value="{{$appoiment->date}}"  name="date" type="text" class="form-control" id="input" style="font-size: 100%; color: black;" >
                    @endif
                    @if (!isset($editid))
                    @if ($patient->creditcardnumber & $patient->ccv)
                    <input type="radio" name="radio" value="0">pay  visa
                    @endif
                   
                    <input type="radio" name="radio" value="1" checked>pay  cash
                    @else
                    @if ($patient->creditcardnumber & $patient->ccv)
                    <input type="radio" name="radio" value="0" {{ $appoiment->payment_status == 0 ?"checked" : ""}}>pay  visa
                    @endif
                   
                    
                    <input type="radio" name="radio" value="1" {{ $appoiment->payment_status == 1 ?"checked" : ""}}>pay  cash
                    @endif
                    <button type="submit" style="margin-left: 110px;"  class="inline-btn">check availability</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
              
        </div>
      </div>
    
  <!-- </form> -->
</section>





@endsection