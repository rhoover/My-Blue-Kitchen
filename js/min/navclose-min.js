(()=>{"use strict";const navMenu=document.querySelector(".nav-main"),closeItem=document.createElement("p"),menuText=(document.querySelector(".header-menu"),document.querySelector(".menu-button-text")),menuButtonWrap=document.querySelector(".menu-toggle");closeItem.setAttribute("class","nav-main-close"),closeItem.textContent="Close",navigator.share()&&(navMenu.prepend(closeItem),closeItem.onclick=()=>{navMenu.classList.toggle("nav-main-open"),menuButtonWrap.classList.toggle("opened"),menuText.classList.toggle("menu-button-text-red"),"Menu"===menuText.innerHTML?menuText.innerHTML="Close":menuText.innerHTML="Menu"})})();