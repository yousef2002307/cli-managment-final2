@extends('cli.home')
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
       <h2 class="text-center">edit profile</h2>
       <form action="{{url('/cliupdate')}}" method="POST" >
        @csrf
        @method("post")
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input value="{{$patient->email}}" required type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            
            <input value="{{$patient->password}}" type="hidden" name="password2" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
       
        <div class="form-group">
            @php $sliced3 =  $patient->numofvisits; @endphp
            <label for=""> num of visits</label>
            <select class="form-control mb-4" name="visit" id="" required>
              <option value="2" {{$sliced3 == '2' ? "selected" : ""}}>2(1$)</option>
              <option value="3"  {{$sliced3 == '3' ? "selected" : ""}}>3(2$)</option>
              <option value="10" {{$sliced3 == '10' ? "selected" : ""}}>10(30$)</option>
              <option value="20" {{$sliced3 == '20' ? "selected" : ""}}>20(41$)</option>
              <option value="30"  {{$sliced3 == '30' ? "selected" : ""}}>30(72$)</option>
              <option value="50" {{$sliced3== '50' ? "selected" : ""}}>50(100$)</option>
              <option value="1000" {{$sliced3 == '1000' ? "selected" : ""}}>infinite(501$)</option>
            </select>
          </div>
          <input type="hidden" name="hidden" value="{{$patient->id}}">
          <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input value="{{$patient->name}}"required type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
           
          </div>
          

          <div class="form-group">
            <label for="exampleInputPassword1">description</label>
            <input value="{{$patient->desc2}}" required type="text" name="desc2" class="form-control"  placeholder="enter her all your qulifcatuon">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">b_no</label>
            <input value="{{$patient->b_no}}"required  name="b_no" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter b_no">
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">street</label>
            <input value="{{$patient->street}}"required type="text" class="form-control" id="exampleInputPassword1" name="street" placeholder="street">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">city</label>
            <input value="{{$patient->city}}" required name="city" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="city">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">phone</label>
            <input value="{{$patient->phone}}" required type="number" name="phone"  class="form-control" id="exampleInputPassword1" placeholder="phone">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">price of visit</label>
            <input value="{{$patient->price}}" required name="price" type="number" class="form-control visit" id="exampleInputEmail1" aria-describedby="emailHelp" >
           
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">price of revisit</label>
            <input  value="{{$patient->price2}}" required type="number" name="price2" class="form-control visit" id="exampleInputPassword1">
          </div>
          @php $sliced = explode(' ', $patient->work_days)[0]; @endphp
          @php $sliced2 = explode(' ',$patient->work_days)[2]; @endphp
          <div class="form-group">
            <label>work days from</label>
            <select name="dayf" id="" required>
               
              <option value="Sunday" {{$sliced == 'Sunday' ? "selected" : ""}}>Sunday(0)</option>
              <option value="Monday"  {{$sliced == 'Monday' ? "selected" : ""}}>Monday(1)</option>
              <option value="Tuesday" {{$sliced == 'Tuesday' ? "selected" : ""}}>Tuesday(2)</option>
              <option value="Wednesday" {{$sliced == 'Wednesday' ? "selected" : ""}}>Wednesday(3)</option>
              <option value="Thursday" {{$sliced == 'Thursday' ? "selected" : ""}}>Thursday(4)</option>
              <option value="Friday"   {{$sliced == 'Friday' ? "selected" : ""}}>Friday(5)</option>
              <option value="Saturday"   {{$sliced == 'Saturday' ? "selected" : ""}}>Saturday(6)</option>
            </select>
            <label>to</label>
            <select name="dayt" id="" required>
                <option value="Sunday" {{$sliced2 == 'Sunday' ? "selected" : ""}}>Sunday(0)</option>
              <option value="Monday"  {{$sliced2 == 'Monday' ? "selected" : ""}}>Monday(1)</option>
              <option value="Tuesday" {{$sliced2 == 'Tuesday' ? "selected" : ""}}>Tuesday(2)</option>
              <option value="Wednesday" {{$sliced2 == 'Wednesday' ? "selected" : ""}}>Wednesday(3)</option>
              <option value="Thursday" {{$sliced2 == 'Thursday' ? "selected" : ""}}>Thursday(4)</option>
              <option value="Friday"   {{$sliced2 == 'Friday' ? "selected" : ""}}>Friday(5)</option>
              <option value="Saturday"   {{$sliced2== 'Saturday' ? "selected" : ""}}>Saturday(6)</option>
            </select>
          </div>
          <div class="form-group">
            
            <div>work hours from</div>
            <input name="timef" value="{{$patient->works_from}}" type="time" required>
            <div>to</div>
            <input name="timet" value="{{$patient->works_to}}" type="time" required>
          </div>
        
          <div id = "sample" style = "width:100%; height:100px;"></div>
          <input value="c" class="c1" type="hidden" name="lan" id="">
          <input value="c" class="c2" type="hidden" name="lon" id="">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
       </div>
       </section>
       </main>


@endsection
