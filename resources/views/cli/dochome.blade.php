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
@if ($status )
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Hello doc</strong> Youhave missing data please complete you profile to make it easier and more attractive to patient <a href="{{url('/doceditprofile')}}">here</a>.
 <button class="btn donotshow">do not show this agian</button>
 <input type="hidden" class="xuz" value="{{session('docid')}}"/>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<!--skllskd-->
@if ($count == 0)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  no patients today
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if ($count == -1)
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  no work today go have fun
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if ($count > 0)
<section class="jocards">
  <div class="container">
    <div class="jocard">
      

    </div>
     
<div class="jo22">
  <form action="{{url('/examination')}}" method="post">
    @csrf
    @method('post')
    <input type="hidden" name="hid" class="doc-hid" value="{{$appointment->patients->id}}">
    <input type="hidden" name="hid2" class="doc-hid2" value="{{$appointment->id}}">
  <button type="submit" class="exa hvr-bounce-to-right theme_btn_two  ">start examination</button>

  </form>
</div>
  </div>
</section>
@endif


@endsection

@section('script')
<script>
  ////////////////////////////////////////////////////

  $.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
    
  
      ///////////////////
      $.ajax({
        method: "post",
        url: "{{url('/reshome2')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {}, //the data you sed to index method
        success: function (response) {
          document.querySelector('.jocard').innerHTML = ``
         if(response.success){
         
           $(".doc-hid").val(response.result[0].patients.id)
           $(".doc-hid2").val(response.result[0].id)
            let srcjo = response.result[0].patients.image == 'x' ? "{{asset('images/pic-1.jpg')}}" : "{{asset('images/')}}/"+  response.result[0].patients.image 
          
            document.querySelector('.jocard').innerHTML +=`
           
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
        
    
   
            `












         }

       
         
        }
       });














  ///////////////////////////////////////////////////////


$timeint = 9000
setInterval(() => {
   

$.ajaxSetup({
            headers : {
                'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
            }
    });
    
  
      ///////////////////
      $.ajax({
        method: "post",
        url: "{{url('/reshome2')}}" , // that is blade function to go to specific route
//or you can pass a parameter to url func like this
//  url: `{{url('/test2/${userid}')}}`

        data : {}, //the data you sed to index method
        success: function (response) {
          document.querySelector('.jocard').innerHTML = ``
         if(response.success){
         
           $(".doc-hid").val(response.result[0].patients.id)
           $(".doc-hid2").val(response.result[0].id)
            let srcjo = response.result[0].patients.image == 'x' ? "{{asset('images/pic-1.jpg')}}" : "{{asset('images/')}}/"+  response.result[0].patients.image 
          
            document.querySelector('.jocard').innerHTML +=`
           
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
        
    
   
            `












         }

       
         
        }
       });


      }, $timeint);






</script>
@endsection