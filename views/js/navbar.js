profile = document.querySelector('#profile');
menu = document.querySelector('.profile-menu');


profile.addEventListener('click',(event)=>{
  menu.classList.toggle('display');
});