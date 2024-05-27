@extends('res.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('error'))
  <div class="alert alert-danger">
      {{ session('error') }}
  </div>
@endif

@if(session('success3'))
  <div class="alert alert-success">
      {{ session('success3') }}
  </div>
@endif
<section class="form-container">

    <form action="{{url('/addguest2')}}" method="POST" >
        @csrf
        @method("post")
       <h3>Make appointment</h3>
       <p>Name</p>
       <input type="text" name="name" placeholder="" maxlength="50" class="box">

       <p>Please select the condition:</p>
        <input type="radio" id="non-errogent" name="cond" value="0" checked>
        <label for="non-errogent" style="color: #ccc">non-errogent</label><br>
        <input type="radio" id="errogent" name="cond" value="1">
        <label for="errogent" style="color: #ccc">errogent</label><br>
      <input type="submit" style="color: #ccc" value="Make appointment" name="submit" class="btn">

    </form>

 </section>
 <span class="d-block text-center" style="color: #ccc">the system will calculate price of non-errogent:(price of visit + price of revisit)</span>
<span class="d-block text-center" style="color: #ccc">the system will calculate price of non-errogent:(price of visit + price of revisit) * 2</span>



 @endsection




