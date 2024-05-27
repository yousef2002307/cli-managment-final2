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
        <img src="images/frontImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Every new friend is a <br> new adventure</span>
          <span class="text-2">Let's get connected</span>
        </div>
      </div>
      <div class="back">
        <img class="backImg" src="images/backImg.jpg" alt="">
        <div class="text">
          <span class="text-1">Complete miles of journey <br> with one step</span>
          <span class="text-2">Let's get started</span>
        </div>
      </div>
    </div>

    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login to clinic</div>
          <form action="{{url('/cliniclog')}}" class="login" method="POST">
            @csrf
            @method("post")
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name='email'type="text" placeholder="name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="password" required>
              </div>
           
              <div class="text"><a href="{{url('/forget2')}}">Forgot Password?</a></div>
            
              <div class="button input-box">
                <input type="submit" value="Login">
              </div>
              <div class="text sign-up-text">Don't have an Aclinic? <label for="flip">Create clinic</label></div>
            </div>
          </form>
        </div>
        <div class="signup-form">
          <div class="title">Create clinic</div>
          <form action="{{route('Cli-login.post')}}" method="POST" >
            @csrf
            @method("post")
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input name="name" type="text" placeholder="Enter your clinic name name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="password" type="password" placeholder="Enter your password" required>
              </div>

              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input name="email" type="email" placeholder="Enter your email" required>
              </div>

              <div class="input-box">
                <i class="fa-solid fa-comment-medical fa-xl"></i>
                <input name="desc" type="text" placeholder="Enter your clinic discription" required>
              </div>
              <div class="input-box">
                <i class="fa-solid fa-phone fa-xl"></i>
                <input name="phone" type="number" placeholder="Enter your phone" required>
              </div>
              <div class="input-box">
               
                <label for=""> num of visits</label>
                <select class="form-control mb-4" name="visit" id="" required>
                  <option value="2">2(1$)</option>
                  <option value="3">3(2$)</option>
                  <option value="10">10(30$)</option>
                  <option value="20">20(41$)</option>
                  <option value="30">30(72$)</option>
                  <option value="50">50(100$)</option>
                  <option value="1000">infinite(501$)</option>
                </select>
               
              </div>
              <div class="input-box">


                <div>work hours from</div>
                <input name="timef" type="time" required>
                <div>to</div>
                <input name="timet" type="time" required>


              </div>


              <div class="input-box">


                <div>work days from</div>
                <select name="dayf" id="" required>
                  <option value="Sunday">Sunday(0)</option>
                  <option value="Monday">Monday(1)</option>
                  <option value="Tuesday">Tuesday(2)</option>
                  <option value="Wednesday">Wednesday(3)</option>
                  <option value="Thursday">Thursday(4)</option>
                  <option value="Friday">Friday(5)</option>
                  <option value="Saturday">Saturday(6)</option>
                </select>
                <div>to</div>
                <select name="dayt" id="" required>
                
                  <option value="Monday">Monday(1)</option>
                  <option value="Tuesday">Tuesday(2)</option>
                  <option value="Wednesday">Wednesday(3)</option>
                  <option value="Thursday">Thursday(4)</option>
                  <option value="Friday">Friday(5)</option>
                  <option value="Saturday">Saturday(6)</option>
                 
                </select>


              </div>

              <div class="input-box">
              
              
                <input name="price" class="visit" type="number" placeholder="price of visit to the clinic" required>
              </div>

              <div class="input-box">
              
                <input name="price2" class="visit" type="number" placeholder="price of re-visit to the clinic" required>
              </div>
              <div class="input-box">
                <i class="fa-solid fa-location-dot fa-xl"></i>
                <input name="add3" type="text" placeholder="Enter address(1234 Main St)" required>
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
  
              <div class="input-box">
                <i class="fa-solid fa-street-view fa-xl"></i>
                <input name="add1" type="text" placeholder="Enter your city" required>
              </div>
              
              <input value="c" class="c1" type="hidden" name="lan" id="">
              <input value="c" class="c2" type="hidden" name="lon" id="">
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
