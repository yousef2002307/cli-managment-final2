@extends('users.home')
@section('con')
<section class="courses">

    <h1 class="heading">doctors</h1>
    <form method="GET" action="{{ url('/userhome') }}">
      <label for="order">Sort Order:</label>
      <select name="order" id="order">
          
          <option value="rating" {{ request('order') == 'rating' ? 'selected' : '' }}  >rating</option>
          <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending(oldest)</option>
          <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending(newest)</option>
          <option value="distance" {{  strpos(request('order'), "distance") === 0 ? 'selected' : ''}}>distance</option>
      </select>
      <button type="submit">Apply</button>
    </form>
    <div class="box-container">
      @foreach ($doctors as $item)
      <div class="box" data-id="{{$item->id}}">
         <div class="tutor">
            @if ($item->image)
            <img src="images/{{$item->image}}" alt="">

            @else
            <img src="images/pic-2.jpg" alt="">
            @endif
          
            <div class="info">
               <h3>{{$item->username}}</h3>
               @if ($item->rating==0)
               <span><i class="fa-solid fa-star" style="color: gold"></i>0(0)</span>
               @else 
               <span><i class="fa-solid fa-star" style="color: gold"></i>{{number_format($item->rating / $item->numofrating,1)}}({{$item->numofrating}})</span>
               @endif
              
               <!-- <span>21-10-2022</span> -->
            </div>
         </div>
         <!-- <div class="thumb">
            <img src="images/thumb-1.png" alt="">
            <span>10 videos</span>
         </div> -->
         @php
             $id = $item->cli->id;
         @endphp
         <h3 class="title">name of clinic : {{$item->cli->name}}</h3>
         <h3 class="title">name of doctor : {{$item->name}}</h3>
         <h3 class="title">address of clinic : {{$item->cli->b_no}},{{$item->cli->city}},{{$item->cli->street}}</h3>
         <h3 class="title">work hours :( {{substr($item->cli->works_from,0,5)}} to {{substr($item->cli->works_to,0,5)}})</h3>
         <h3 class="title">work days : {{$item->cli->work_days}}</h3>
         <a href="{{route('user.docpro', ['id' => $item->id])}}" class="inline-btn">view info</a>
         @if ( (strpos(request('order'), "distance") === 0))
         <a href="{{url("/map/$id")}}" class="inline-btn">show on map</a>
         @endif
      </div>

      @endforeach
       
      



    </div>
  
 </section>
 @if ( !(strpos(request('order'), "distance") === 0))
 {!! $doctors->withQueryString()->links('pagination::bootstrap-5') !!}
 @endif

<script>
   if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successCallback);
} else {
    console.log("Geolocation is not supported by this browser.");
}

function successCallback(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    console.log("Latitude: " + latitude);
    console.log("Longitude: " + longitude);

    // Get the select box element
    var selectBox = document.getElementById("order");

    // Get the last option
    var lastOption = selectBox.options[selectBox.options.length - 1];

    // Set the value of the last option
    lastOption.value = "distance-" + latitude + "-" + longitude;
}
</script>
@endsection