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

@if (@isset($true))
<section>

    <div id = "sample" style = "width:1000px; height:1000px;"></div>
  
  </section>
@else 
<div class="alert alert-danger">
   the clinic did not provide location on a map
</div>

@endif

@endsection
@if (@isset($true))
    

@section('script')
<script src = "https://maps.googleapis.com/maps/api/js"></script>
<script>
   function loadMap() {
    var mapOptions = {
      center: new google.maps.LatLng("{{$row->lan}}", "{{$row->lon}}"),
      zoom: 12,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("sample"), mapOptions);

    var marker = new google.maps.Marker({
      position: mapOptions.center,
      map: map,
      clickable: true
    });

    google.maps.event.addListener(marker, 'click', function() {
      var latitude = marker.getPosition().lat();
      var longitude = marker.getPosition().lng();
      var googleMapsUrl = "https://www.google.com/maps/search/?api=1&query=" + latitude + "," + longitude;
      window.open(googleMapsUrl, "_blank");
    });
  }

  google.maps.event.addDomListener(window, 'load', loadMap);
</script>

@endsection
@endif