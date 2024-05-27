@extends('welcome')
@section('home')
@if($errors->any())
  {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<section class="jo4">
    <form class="d-flex" action="{{route('clilog2')}}" method="POST" >
        @csrf
        @method("post")
        <div class="first">
            <div class="title">Create doctor</div>
            <div class="">
               
                <input class="form-control" name="username" type="text" placeholder="Enter your username" required>
              </div>
              

              <div class="">
              
                
                <input class="form-control" name="password" type="password" placeholder="Enter your password(at least 6 character and one is alphaphetic)" required>
              </div>
            <div class="">
                
                <input class="form-control" name="creditcardnumber" type="number" placeholder="Enter your credit card num" required>
              </div>
              <div class="">
               
                <input class="form-control" name="cvc" type="number" placeholder="Enter your cvc" required>
              </div>
              <div class="" style="display: block;margin-bottom:20px">
               <span for="" class="d-block"> choose credit card type</span>
                <select style="display:block" name="creditCardType" class="form-control" required>
                  <option value="visa">Visa</option>
                  <option value="mastercard">Mastercard</option>
                  
                </select>
              </div>
        </div>
        <div class="sec">
            <div class="title">Create recipoinist</div>
            <div class="">
              
                <input class="form-control" name="username2" type="text" placeholder="Enter your username" required>
              </div>
              

              <div class="">
              
                
                <input class="form-control" name="password2" type="password" placeholder="Enter your password(at least 6 character and one is alphaphetic)" required>
              </div>
        </div>
        <div class="button input-box">
            <input type="submit" value="Create">
          </div>
    </form>
</section>
@endsection
