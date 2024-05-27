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
<main id="main">

    <!-- ======= About Section ======= -->
    <section id="edit" class="edit">
       <div class="container">
        @if(!session('success2'))
       <div class="alert alert-danger">to continue using the system you must full all your info</div>
       @endif
       <form action="{{route('user-upd.post')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("post")
    
        
        <div class="form-group">
            
            <input value="{{$patient->password}}" type="hidden" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
       
       
          <input type="hidden" name="hidden" value="{{$patient->id}}">
          <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input value="{{$patient->name}}" required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">username</label>
            <input value="{{$patient->username}}" required type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="username">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">b_no</label>
            <input value="{{$patient->b_no}}" required name="b_no" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter b_no">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">street</label>
            <input value="{{$patient->street}}" type="text" class="form-control" id="exampleInputPassword1" name="street" required placeholder="street">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">city</label>
            <input value="{{$patient->city}}" required name="city" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="city">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">phone</label>
            <input value="{{$patient->phone}}" type="number" name="phone" required class="form-control" id="exampleInputPassword1" placeholder="phone">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">creditcardnumber</label>
            <input value="{{$patient->creditcardnumber}}"  name="creditcardnumber" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter creditcardnumber">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">cvc</label>
            <input value="{{$patient->ccv}}"  type="number" name="cvc" class="form-control" id="exampleInputPassword1" placeholder="cvc">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">cardtype</label>
            <select style="display:block" name="creditCardType" class="form-control" required>
                <option value="visa" {{$patient->cardtype == "visa" ? "selected" : ""}}>Visa</option>
                <option value="mastercard" {{$patient->cardtype == "mastercard" ? "selected" : ""}}>Mastercard</option>
                
              </select>
          </div>
          
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
       </div>
       </section>
       </main>

@endsection

