const landing = document.querySelector(".landing");
const login = document.querySelector(".login");
var home = document.querySelector("#home");
var about = document.querySelector("#about");
var contact = document.querySelector("#contact");
const formLogin = document.querySelector("#login-submit");
const regBtn = document.querySelector("#reg");
const signupBtn = document.querySelector('.signup-btn');
const signinBtn = document.querySelector('.signin-btn');


signinBtn.addEventListener('click',(event)=>{
  const signin = document.querySelector(".signin-wrap");
  const signup = document.querySelector(".signup-wrap");
  signin.id = 'login-remove';
  signup.id = 'signin-remove';
  removeSignup();
  appendSignin();
  signin.removeAttribute('id');
  signup.removeAttribute('id');
  signin.classList.add('login-appear');
  signup.classList.add('signup-appear');
  event.preventDefault();
})

signupBtn.addEventListener('click', (event) =>{
  const signin = document.querySelector(".signin-wrap");
  const signup = document.querySelector(".signup-wrap");
  signin.id = 'login-remove';
  signup.id = 'signin-remove';
  removeSignin();
  appendSignup();
  signin.removeAttribute('id');
  signup.removeAttribute('id');
  signin.classList.add('login-appear');
  signup.classList.add('signup-appear');
  event.preventDefault();
})

formLogin.addEventListener('click',(event)=>{
  // event.preventDefault();
})

regBtn.addEventListener('click',(event)=>{
  var data = document.querySelector('#captureData').attributes('value');
  event.preventDefault();
})

//TODO : home navigation
home.addEventListener('click',(event) => {
  const signin = document.querySelector(".signin-wrap");
  const signup = document.querySelector(".signup-wrap");
  const slideLeft = document.querySelector(".slide-left");
  if(slideLeft){
    landing.id = 'slide-right';
    signin.id = 'login-remove';
    signup.id = 'signin-remove';
    landing.classList.remove('slide-left');
  }
  removeSignup();
  appendSignin();
  event.preventDefault();
})

login.addEventListener('click',(event) => {
 const signin = document.querySelector(".signin-wrap");
 const signup = document.querySelector(".signup-wrap");
 const slideLeft = document.querySelector(".slide-left");
 removeSignup();
 appendSignin();
 if(!slideLeft){
  landing.removeAttribute('id');
  signin.removeAttribute('id');
  signup.removeAttribute('id');
  landing.classList.add('slide-left');
  signin.classList.add('login-appear');
  signup.classList.add('signin-appear');
}
})

function appendSignin() {
  const signin = document.querySelector('.signin-wrap');
  if (signin.classList.contains('display-none')){
    signin.classList.remove('display-none')
  }
}

function appendSignup() {
  const signup = document.querySelector('.signup-wrap');
  if (signup.classList.contains('display-none')){
    signup.classList.remove('display-none')
  }
}

function removeSignup() {
  const signup = document.querySelector('.signup-wrap');
  if(!signup.classList.contains('display-none')){
    signup.classList.add('display-none');
  }
}

function removeSignin() {
  const signin = document.querySelector('.signin-wrap');
  if(!signin.classList.contains('display-none')){
    signin.classList.add('display-none');
  }
}