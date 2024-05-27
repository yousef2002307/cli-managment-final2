@extends('cli.home')
@section('con')
@if($errors->any())
{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
@endif
@if(session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<section class="courses">

    <h1 class="heading">patientinfo</h1>

    <div class="box-container mb-3">

<div class="box">
    <div class="tutor">
       
      
     
       <div class="title">
          <h3>previouse disease</h3>
          <!-- <span>21-10-2022</span> -->
       </div>
      
    </div>
    <p>
        @if (!count($disease))
            no data available
        @else
        @foreach ($disease as $item)
        <span>{{$item->disease}}</span> -
        @endforeach
        @endif
       
     
     </p>
     @if (!count($disease2))
     users notes about his past  :no data available
 @else
     <p ><strong style="color: #ccc; font-weight:bold;font-size:30px" class="xt"> users notes about his past  : </strong>   {{$disease2[0]->notes}}</p>

     @endif
    <!-- <div class="thumb">
       <img src="images/thumb-1.png" alt="">
       <span>10 videos</span>
    </div> -->
  
 
  
 </div>

  
    </div>

    <div class="box-container">

       
              
         <div class="box">
            <div class="tutor">
               
              
             
               <div class="title">
                  <h3>previouse precraption</h3>
                  
               </div>
              
            </div>
            @if (!count($prec))
            no data available
        @else
        @foreach ($prec as $item)
        <span class="d-block mb-3">{{$item->created_at}}</span> 
            <p class="mb-3">
              <strong style="color: #ccc; font-weight:bold;font-size:30px" class="xt"> notes : </strong> <p>{{$item->notes}}</p>
             </p>

             <p class="mb-3">
               <strong style="color: #ccc; font-weight:bold;font-size:30px" class="xt"> precraption : </strong>  <p>{{$item->desc2}}</p>
              </p>
              <hr/>
        @endforeach
        @endif
       
            
         </div>
        
         
            </div>
  
 </section>


@endsection