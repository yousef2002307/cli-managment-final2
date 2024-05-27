<span>
    #{{$appointment->queue_num}}
  </span>
  @if ($appointment->patients->image == 'x')
  <img src="{{asset('images/pic-1.jpg')}}" alt="">
  @else 
  <img src="{{asset('images/'.$appointment->patients->image)}}" alt="">

  @endif

  <strong class="d-block mb-4 text-center">
   name:{{$appointment->patients->name}}
  </strong>
  <strong class="d-block text-center">
    status:   {{$appointment->revisit ? "revisit" : "visit"}}
   </strong>
   @if ($appointment->status == 1 || $appointment->status == 2)
    @else 
    <a href="{{url('/viewinfo',$appointment->patients->id)}}" class=" hvr-bounce-to-right theme_btn_two  ">view info</a>
   @endif
  
</div>
</div>