(()=>{"use strict";const header=document.querySelector(".header"),mainElementPosition=document.querySelector("main").offsetTop,headerArrow=document.querySelector(".header-arrow"),backText=document.querySelector(".header-back-text"),headerTitle=document.querySelector(".header-center-title"),menuIcon=document.querySelector(".icon"),menuText=document.querySelector(".menu-button-text"),menuItems=document.querySelectorAll(".menu-item");window.addEventListener("scroll",(()=>{window.scrollY>=mainElementPosition?(header.style.borderBottom="1px solid rgb(44, 112, 112)",headerArrow.style.fill="rgb(44, 112, 112)",backText.style.color="rgb(44, 112, 112)",headerTitle.style.color="rgb(44, 112, 112)",menuIcon.style.fill="rgb(44, 112, 112)",menuText.style.color="rgb(44, 112, 112)",menuItems.forEach((item=>{item.style.color="rgb(44, 112, 112)"}))):(header.removeAttribute("style"),headerArrow.removeAttribute("style"),backText.removeAttribute("style"),headerTitle.removeAttribute("style"),menuIcon.removeAttribute("style"),menuText.removeAttribute("style"),menuItems.forEach((item=>{item.removeAttribute("style")})))}))})();