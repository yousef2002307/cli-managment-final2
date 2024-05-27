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
<form action="{{url('/cliupdate2002')}}" method="POST" >
    @csrf
    @method("post")
<label for="">show your exact current location on map(prefered to be inside the clinic,if you are not leave it as it is or adjust manually if you wish,if your location is not showing please reload)</label>
<div id = "sample" style = "width:100%; height:399px;"></div>
<input value="c" class="c1" type="hidden" name="lan" id="">
<input value="c" class="c2" type="hidden" name="lon" id="">
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection

@section('script')
<script src = "https://maps.googleapis.com/maps/api/js"></script>
<script>
  var  latitude = 21.2222
  var longitude = 21.222
  if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
} else {
  console.log("Geolocation is not supported by this browser.");
}

function successCallback(position) {
   latitude = position.coords.latitude;
  longitude = position.coords.longitude;
  document.querySelector(".c1").value = latitude
      document.querySelector(".c2").value = longitude
  console.log("Latitude: " + latitude);
  console.log("Longitude: " + longitude);
}

function errorCallback(error) {
  console.log("Error occurred while retrieving location: " + error.message);
}

 function loadMap() {
    var mapOptions = {
      center: new google.maps.LatLng(latitude, longitude),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("sample"), mapOptions);

    var marker = new google.maps.Marker({
      position: mapOptions.center,
      map: map,
      draggable: true
    });

    google.maps.event.addListener(marker, 'dragend', function(event) {
      var latitude = event.latLng.lat();
      var longitude = event.latLng.lng();
      document.querySelector(".c1").value = latitude
      document.querySelector(".c2").value = longitude
      console.log("Latitude: " + latitude);
      console.log("Longitude: " + longitude);
    });
  }

  google.maps.event.addDomListener(window, 'load', loadMap);
</script>

@endsection
