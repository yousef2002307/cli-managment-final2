<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>clinic managment system</title>

        <meta charset="UTF-8">
  
     @csrf
   <link rel="stylesheet" href="{{asset('css/style.css')}}">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body >
 
    <h2 style="text-align: center;margin-top:77px;margin-bottom:77px">Chat</h2>
    <div class="messages">
       
        
    </div>
    <div class="form3">
       <input type="text" name="" id="">
          <button class="send" type="submit">send</button>
    </div>
<span class="d-block text-center" style="display: block;
text-align: center;
margin-top: 20px;
margin-bottom: 40px;
color: #646161;
padding: 14px 0;
text-shadow: 0px 3px 11px #ffb1b1;
border-top: 1px solid #ddd;
border-bottom: 1px solid #ccc;">chat get deleted in the next day</span>
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    <script >
  document.querySelector(".messages").scrollTop =  document.querySelector(".messages").scrollHeight;
var scroll = false;
  document.addEventListener("click", function(event) {
   const element = event.target;
  
   if (element.classList.contains("send")) {
     var message = document.querySelector('.form3 input').value;
      document.querySelector('.form3 input').value = '';
      
      $.ajaxSetup({
                   headers : {
                       'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
                   }
           });
          
           
             ///////////////////
             $.ajax({
               method: "post",
               url: "{{url('/chatinsert')}}" , // that is blade function to go to specific route
       //or you can pass a parameter to url func like this
       //  url: `{{url('/test2/${userid}')}}`
       
               data : {val:0,message}, //the data you sed to index method
               success: function (response) {
                  setTimeout(() => {
                     document.querySelector(".messages").scrollTop =  document.querySelector(".messages").scrollHeight;
                  }, 2000);
              
                  document.querySelector(".messages").scrollTop =  document.querySelector(".messages").scrollHeight;
      
                
               
                
              
                
               }
              });
         
     
     
   }
 
         

       
     
     
     
     

});




























//SELECT * FROM `chat` WHERE clinic_id = 55 AND created_at = CURDATE();

setInterval(() => {
         
     
       
         $.ajaxSetup({
                   headers : {
                       'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
                   }
           });
          
           
             ///////////////////
             $.ajax({
               method: "post",
               url: "{{url('/chat')}}" , // that is blade function to go to specific route
       //or you can pass a parameter to url func like this
       //  url: `{{url('/test2/${userid}')}}`
       
               data : {val:1}, //the data you sed to index method
               success: function (response) {
                console.log(response)
       
                if(!response.status){
                  return;
                }
                let chats = response.result;
               document.querySelector(".messages").innerHTML ='';
               document.querySelector(".messages").innerHTML +=' <h6>chat with receptionist</h6>';
                chats.map(ele => {
                 
                  if(ele.type == 1){
                     document.querySelector(".messages").innerHTML +=` <div class="message-left">
               <span>rec:</span>
               ${ele.message}
            </div>`;
            
                  }else{
                     document.querySelector(".messages").innerHTML +=` <div class="message-right">
               <span>me:</span>
              ${ele.message}
            </div>`;
                  }
                 
                });
              
                if(!scroll){
                document.querySelector(".messages").scrollTop =  document.querySelector(".messages").scrollHeight;
                }else{
                  scroll = true;
                }
               }
              });
             }, 2000);
     
     
     
     
             $.ajaxSetup({
                   headers : {
                       'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
                   }
           });
          
           
             ///////////////////
             $.ajax({
               method: "post",
               url: "{{url('/chat')}}" , // that is blade function to go to specific route
       //or you can pass a parameter to url func like this
       //  url: `{{url('/test2/${userid}')}}`
       
               data : {val:1,first:0}, //the data you sed to index method
               success: function (response) {
                console.log(response)
       
               
                let chats = response.result;
               document.querySelector(".messages").innerHTML ='';
               document.querySelector(".messages").innerHTML +=' <h6>chat with receptionist</h6>';
                chats.map(ele => {
                 
                  if(ele.type == 1){
                     document.querySelector(".messages").innerHTML +=` <div class="message-left">
               <span>rec:</span>
               ${ele.message}
            </div>`;
            
                  }else{
                     document.querySelector(".messages").innerHTML +=` <div class="message-right">
               <span>me:</span>
              ${ele.message}
            </div>`;
                  }
                 
                });
              
                if(!scroll){
                document.querySelector(".messages").scrollTop =  document.querySelector(".messages").scrollHeight;
                }else{
                  scroll = true;
                }
               }
              });


     
     
     






             $.ajaxSetup({
                   headers : {
                       'X-CSRF-TOKEN' :$("input[type='hidden']").attr("value")
                   }
           });
          
           
             ///////////////////
             $.ajax({
               method: "post",
               url: "{{url('/chatupdate')}}" , // that is blade function to go to specific route
       //or you can pass a parameter to url func like this
       //  url: `{{url('/test2/${userid}')}}`
       
               data : {val:1}, //the data you sed to index method
               success: function (response) {
               
       
      
                
               
                
              
                
               }
              });
         

    </script>
</body>
</html>
