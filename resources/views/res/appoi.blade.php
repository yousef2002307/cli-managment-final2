@extends('res.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('error2'))
  <div class="alert alert-danger">
      {{ session('error2') }}
  </div>
@endif

@if(session('success4'))
  <div class="alert alert-success">
      {{ session('success4') }}
  </div>
@endif



<section class="form-container">

    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
      <p class="appoint" style="font-weight: 700; font-size: 200%; color: black; margin-top: 50px; position: fixed; top: 10%;">Make appointment</p>
      <div class="content" style="color: black; margin-top: 50px; position: fixed; top: 20%; padding-right: 20%;">
  
          <div class="container text-left">
            <div class="row justify-content-center">
              <div class="col-lg-3">
                
                  <form action="{{route('resapp.update')}}" method="POST" class="row">
                
                    @csrf
                    @method("post")
                  <div class="col-md-12">
                    <div class="form-group">
                     
                        <input type="hidden" name="hidden" value="{{$editid}}">
                        <input type="hidden" name="hidden2" value="{{$appoiment->patient_id}}">
                     
                        <label for="input_from">Select date</label>
                       
                      <input value="{{$appoiment->date}}"  name="date" type="text" class="form-control" id="input" style="font-size: 100%; color: black;" >
                    
                     
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




