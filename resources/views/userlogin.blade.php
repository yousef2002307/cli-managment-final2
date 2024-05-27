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
<a class="btn btn-primary" style="position: fixed;
top: 20px;
left: 0px;" href="{{url("/")}}">back</a>
<div class="container">
  
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="{{asset('images/frontImg.jpg')}}" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="{{asset('images/backImg.jpg')}}" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>
    <div class="forms">
    
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login as user</div>
          <form action="{{route('user-login2.post')}}" class="login" method="POST">
            @csrf
            @method("post")
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="text" placeholder="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input name="password" type="password" placeholder="password" required>
              </div>
             
              <div class="text"><a href="{{url('/forget')}}">Forgot Password?</a></div>
             
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
              <a class="google-button" href="{{url('auth/google')}}">Continue using Google</a>
              <div class="text sign-up-text">Don't have an profile? <label for="flip">Create profile</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Create profile</div>
        
          <form action="{{route('user-login.post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("post")
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="name" type="text" placeholder="Enter your name" required>
              </div>

                <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="username" type="text" placeholder="Enter your username" required>
              </div>
               <div class="input-box">
               
                <i class="fas fa-envelope"></i>
                <input name="email" type="email" placeholder="Enter your email" required>
              </div>

              <div class="input-box">
                <i class="fa-solid fa-lock"></i>
                
                <input name="password" type="password" placeholder="Enter your password(at least 6 character and one is alphaphetic)" required>
              </div>

             
              <div class="input-box">
                <i class="fa-solid fa-phone fa-xl"></i>
                <input name="phone" type="number" placeholder="Enter your phone" required>
              </div>
              
              <div class="input-box">
                <i class="fa-solid fa-location-dot fa-xl"></i>
                <input name="add1" type="text" placeholder="Enter address(1234 Main St)" required>
              </div>
              
              <div class="input-box">
                <i class="fa-solid fa-street-view fa-xl"></i>
                <input name="add3" type="text" placeholder="Enter your city" required>
              </div>
              <div class="input-box">
              <span for="" class="d-block"> choose your state</span>
              <select style="display:block"  name="add2" class="form-control" >
                <option value="Alexandria">الإسكندرية (Alexandria)</option>
                <option value="Aswan">أسوان (Aswan)</option>
                <option value="Asyut">أسيوط (Asyut)</option>
                <option value="Beheira">البحيرة (Beheira)</option>
                <option value="Bani_Sueif">بني سويف (Bani Sueif)</option>
                <option value="Cairo">القاهرة (Cairo)</option>
                <option value="Dakahlia">الداخلية (Dakahlia)</option>
                <option value="Damietta">دمياط (Damietta)</option>
                <option value="Faiyum">الفيوم (Faiyum)</option>
                <option value="Gharbia">الغربية (Gharbia)</option>
                <option value="Giza">الجيزة (Giza)</option>
                <option value="Ismailia">الإسماعيلية (Ismailia)</option>
                <option value="Kafer_El_Sheikh">كفر الشيخ (Kafer El Sheikh)</option>
                <option value="Minya">المنيا (Minya)</option>
                <option value="Monufia">المنوفية (Monufia)</option>
                <option value="New_Valley">الوادي الجديد (New Valley)</option>
                <option value="North_Sinai">شمال سيناء (North Sinai)</option>
                <option value="Port_Said">بورسعيد (Port Said)</option>
                <option value="Qalyubia">القليوبية (Qalyubia)</option>
                <option value="Red_Sea">البحر الأحمر (Red Sea)</option>
                <option value="Sharqia">الشرقية (Sharqia)</option>
                <option value="Sohag">سوهاج (Sohag)</option>
                <option value="South_Sinai">جنوب سيناء (South Sinai)</option>
                <option value="Suez">السويس (Suez)</option>
                <option value="Suez_Canal">قناة السويس (Suez Canal)</option>
                
              </select>
             
                
              </div>


              <h6>credit card details</h6>
              <div class="input-box">
                
                <input name="creditcardnumber" type="number" placeholder="Enter your credit card num" >
              </div>
              <div class="input-box">
               
                <input name="cvc" type="number" placeholder="Enter your cvc" >
              </div>
              <div class="input-box" style="display: block;margin-bottom:20px">
               <span for="" class="d-block"> choose credit card type</span>
                <select style="display:block" name="creditCardType" class="form-control" >
                  <option value="visa">Visa</option>
                  <option value="mastercard">Mastercard</option>
                  
                </select>
              </div>

              <h6>add img</h6>
              <div class="input-box">
                
                <input name="image" type="file"  required>
              </div>
              
              <!-- <div class="form-row">
                <div class="form-group input-boxes col-md-6">
                  <div class="labl">City</div>
                  <input type="text" class="form-control" id="inputCity">
                </div>

                <div class="form-group input-boxes col-md-4">
                  <div class="labl">State</div>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div> -->
            </div>
            <div class="button input-box">
              <input type="submit" value="Create">
            </div>
      
            <div class="text sign-up-text">Already have an account? <label for="flip">login to clinic</label></div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection
