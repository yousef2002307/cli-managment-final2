@extends('res.home')

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
@if ($status )
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hello receptionist</strong> Youhave missing data t <a href="{{url('/resedit')}}">here</a>.
 <button class="btn donotshow">do not show this agian</button>
 <input type="hidden" class="xuz" value="{{session('resid')}}"/>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<div class="sch-res">
  <div class="progress">
    <div class="bar"> </div>
  
  </div>
  <div class="loading" style="    text-align: center;
  position: relative;
  top: -55px;color:#ccc;"> loading..............</div>
</div>

@endsection

@section('script')
    <script>
      
////////////////////////////////////////////////////
  setTimeout(() => {
    


$.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
    
  
      ///////////////////
      $.ajax({
        method: "post",
        cache: true,
        url: "{{url('/reshome2')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {}, //the data you sed to index method
        success: function (response) {
     console.log(response)
         if(!response.success){
            if( document.querySelector('.sch-res')){
            document.querySelector('.sch-res').innerHTML = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
  no patients today-sorry
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`
            }
         }else{
     //  if(response.result != "neu"){
          
        
            let url = "{{ url('/') }}/endofqueue/" + response.result[0].id + "/"+response.result[0].patients.id;
            let url2 = "{{ url('/') }}/appedit/" + response.result[0].id ;
            let srcjo = response.result[0].patients.image == 'x' ? "{{asset('images/pic-1.jpg')}}" : "{{asset('images/')}}/"+  response.result[0].patients.image 
            document.querySelector('.sch-res').innerHTML = ``
            document.querySelector('.sch-res').innerHTML +=`
            <h1 class="mt-4 mb-1 text-center" style="color:#ccc">there ${response.result.length} appoimnts lefts</h1>
            <section class="jocards">
    <div class="container">
      <div class="jocard">
        <span>
          #${response.result[0].queue_num}
        </span>
       
        <img src="${srcjo}" alt="">
       
      
        <strong class="d-block mb-4 text-center">
         name:${response.result[0].status ? response.result[0].name : response.result[0].patients.name}
        </strong>
        <strong class="d-block text-center">
          status:  ${response.result[0].revisit?"revisit" : "visit"}
         </strong>
        <div class="act ${response.result[0].active ? "act-green" : "act-red"}">
         ${response.result[0].active ? "active" : "non-active"}
        </div>
        
      </div>
    </div>
    
            `


if(response.result[0].active){
   document.querySelector('.sch-res').innerHTML +=` 
   
  </div>
 
</section>
<form method="POST" action="{{url('/delayall')}}">
@csrf
@method('post')
<button type="submit" class="${response.result[0].active == 0 ? "" : 'd-none'}">delay all apoiments to another day</button>
</form>

   `
}else{
   document.querySelector('.sch-res').innerHTML +=` 
   <div class="jo22 text-center" style="margin-top:-30px">
    
    <a href="${url}" class="exa hvr-bounce-to-right theme_btn_two  ">send it to end of queue</a>
    <a href="${url2}" class="exa hvr-bounce-to-right theme_btn_two  ${response.result[0].status == 0 ? "d-inline-block" : 'd-none'}" >send it to another day</a>
  </div>
   
  </div>
 
</section>
<form class='form221' method="POST" action="{{url('/delayall')}}">
@csrf
@method('post')
<button class="exa hvr-bounce-to-right theme_btn_two " type="submit">delay all apoiments to another day(guest appoiments not included)</button>
</form>

   `
}









         
        }
         
         }
         
      //  }
       });


      }, 3000);



















//////////////////////////////////////////////

$timeint = 10000
setInterval(() => {
   

$.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
    
  
      ///////////////////
      $.ajax({
        method: "post",
        cache: true,
        url: "{{url('/reshome2')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {}, //the data you sed to index method
        success: function (response) {
     console.log(response)
         if(!response.success){
            if( document.querySelector('.sch-res')){
            document.querySelector('.sch-res').innerHTML = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
  no patients today-sorry
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`
            }
         }else{
     //  if(response.result != "neu"){
          
        
            let url = "{{ url('/') }}/endofqueue/" + response.result[0].id + "/"+response.result[0].patients.id;
            let url2 = "{{ url('/') }}/appedit/" + response.result[0].id ;
            let srcjo = response.result[0].patients.image == 'x' ? "{{asset('images/pic-1.jpg')}}" : "{{asset('images/')}}/"+  response.result[0].patients.image 
            document.querySelector('.sch-res').innerHTML = ``
            document.querySelector('.sch-res').innerHTML +=`
            <h1 class="mt-4 mb-1 text-center" style="color:#ccc">there ${response.result.length} appoimnts lefts</h1>
            <section class="jocards">
    <div class="container">
      <div class="jocard">
        <span>
          #${response.result[0].queue_num}
        </span>
       
        <img src="${srcjo}" alt="">
       
      
        <strong class="d-block mb-4 text-center">
         name:${response.result[0].status ? response.result[0].name : response.result[0].patients.name}
        </strong>
        <strong class="d-block text-center">
          status:  ${response.result[0].revisit?"revisit" : "visit"}
         </strong>
        <div class="act ${response.result[0].active ? "act-green" : "act-red"}">
         ${response.result[0].active ? "active" : "non-active"}
        </div>
        
      </div>
    </div>
    
            `


if(response.result[0].active){
   document.querySelector('.sch-res').innerHTML +=` 
   
  </div>
 
</section>
<form method="POST" action="{{url('/delayall')}}">
@csrf
@method('post')
<button type="submit" class="${response.result[0].active == 0 ? "" : 'd-none'}">delay all apoiments to another day</button>
</form>

   `
}else{
   document.querySelector('.sch-res').innerHTML +=` 
   <div class="jo22 text-center" style="margin-top:-30px">
    
    <a href="${url}" class="exa hvr-bounce-to-right theme_btn_two  ">send it to end of queue</a>
    <a href="${url2}" class="exa hvr-bounce-to-right theme_btn_two  ${response.result[0].status == 0 ? "d-inline-block" : 'd-none'}" >send it to another day</a>
  </div>
   
  </div>
 
</section>
<form class='form221' method="POST" action="{{url('/delayall')}}">
@csrf
@method('post')
<button class="exa hvr-bounce-to-right theme_btn_two " type="submit">delay all apoiments to another day(guest appoiments not included)</button>
</form>

   `
}









         
        }
         
         }
         
      //  }
       });


      }, $timeint);








       const bar = document.querySelector(".bar");

setTimeout(() => {
  bar.style.setProperty("--progress", "75%");
}, 0);


///////////////////////////////////////



     
    </script>
@endsection