const themeToggle = document.querySelector(".night-mode");

const currentTheme = localStorage.getItem("theme");
var pageTheme = document.body;

let isDark = true

if (currentTheme == "dark") {
  pageTheme.classList.add("dark-theme");
  
} else {
   
}

function themeMode() {
    isDark = !isDark;
    pageTheme.classList.toggle("dark-theme");

    let theme = "light";
    if (pageTheme.classList.contains("dark-theme")) {
      theme = "dark";
    }
    localStorage.setItem("theme", theme);
}

themeToggle.addEventListener("click", themeMode)








const menu = document.querySelector('#menu')
const closeBtn = document.querySelector('#close-btn')
const openBtn = document.querySelector('#open-btn')



  openBtn.addEventListener('click' ,()=>{
  menu.style.display ='flex';
  openBtn.style.display='none';
  closeBtn.style.display='inline-block';
} )



  closeBtn.addEventListener('click' , ()=>{
    menu.style.display ='none';
  openBtn.style.display='inline-block';
  closeBtn.style.display='none';

})


const open = document.querySelector('#close');
/* const open = document.querySelector('.control'); */
const close = document.querySelector('#open');
const aside = document.querySelector('aside ');
const control= document.querySelector('.control');

   
  
  open.addEventListener('click', () => {
    aside.style.right = '0';
    open.style.display = 'none';
    close.style.display = 'inline-block';
  })

 close.addEventListener('click', () => {
    aside.style.right = '-100%';
    close.style.display = 'none';
    open.style.display = 'inline-block';
  })


