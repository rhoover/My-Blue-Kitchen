(()=>{"use strict";const homeShareButton=document.querySelector(".home-share"),pageURL=document.querySelector("link[rel=canonical]"),pageTitle=document.title;navigator.share&&(homeShareButton.style.display="block",homeShareButton.addEventListener("click",(()=>navigator.share({title:pageTitle,url:pageURL.href}))))})();