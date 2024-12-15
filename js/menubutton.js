	(function() {
    'use strict';
    var menuButton = document.querySelector('.header-menu');
    var menuText = document.querySelector('.menu-button-text');
    var menuButtonWrap = document.querySelector('.menu-toggle');
    var navMenu = document.querySelector('.nav-main');

    menuButton.onclick=function(){
      navMenu.classList.toggle('nav-main-open');

      menuButtonWrap.classList.toggle('opened');
      menuText.classList.toggle('menu-button-text-red');

      if (menuText.innerHTML === 'Site') {
        menuText.innerHTML = 'Close'
      } else {
        menuText.innerHTML = 'Site'}
      }
    }());