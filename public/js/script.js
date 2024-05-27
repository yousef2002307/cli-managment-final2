let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');
///////////////////
/*
document.addEventListener("click", function(event) {
   const element = event.target;
   console.log(element.classList)
   if (element.classList.contains("fa-message")) {
      console.log(1)
      if ( document.querySelector(".messages").classList.contains("show2")) {
         document.querySelector(".messages").classList.remove("show2");
         document.querySelector(".form3").classList.remove("show2");
      }else{
         document.querySelector(".messages").classList.add("show2");
         document.querySelector(".messages").scrollTop =  document.querySelector(".messages").scrollHeight;
         document.querySelector(".form3").classList.add("show2");
      }
     
   }


});
*/

//////////////////
const enableDarkMode = () => {
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   if(document.querySelector(".table")){
   document.querySelector(".table").classList.add('table-dark')
   }
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () => {
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   if(document.querySelector(".table")){
   document.querySelector(".table").classList.remove('table-dark')
   }
   localStorage.setItem('dark-mode', 'disabled');
}

if (darkMode === 'enabled') {
   enableDarkMode();
}

toggleBtn.onclick = (e) => {
   darkMode = localStorage.getItem('dark-mode');
   if (darkMode === 'disabled') {
      enableDarkMode();
   } else {
      disableDarkMode();
   }
}

let profile = document.querySelector('.header .flex .profile');

// document.querySelector('#user-btn').onclick = () =>{
//    profile.classList.toggle('active');
//    search.classList.remove('active');
// }

let search = document.querySelector('.header .flex .search-form');

document.querySelector('#search-btn').onclick = () => {
   search.classList.toggle('active');
   profile.classList.remove('active');
}

let sideBar = document.querySelector('.side-bar');

document.querySelector('#menu-btn').onclick = () => {
   sideBar.classList.toggle('active');
   body.classList.toggle('active');
}

document.querySelector('#close-btn').onclick = () => {
   sideBar.classList.remove('active');
   body.classList.remove('active');
}

window.onscroll = () => {
   profile.classList.remove('active');
   search.classList.remove('active');

   if (window.innerWidth < 1200) {
      sideBar.classList.remove('active');
      body.classList.remove('active');
   }
}