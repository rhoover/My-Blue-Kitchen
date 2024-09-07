(() => {
  'use strict';

  const allMenuItems = document.querySelectorAll('.menu-item');
  const navMenu = document.querySelector('.nav-main');
  const menuText = document.querySelector('.menu-button-text');
  const menuButtonWrap = document.querySelector('.menu-toggle');
  
  allMenuItems.forEach((menuItem) => {
    if (menuItem.innerText == "Close") {
      menuItem.classList.add('nav-main-close');
    }
  });
  const closeButton = document.querySelector('.nav-main-close');

  closeButton.onclick = () => {
    navMenu.classList.toggle('nav-main-open');
    menuButtonWrap.classList.toggle('opened');
    menuText.classList.toggle('menu-button-text-red');
    if (menuText.innerHTML === 'Menu') {
      menuText.innerHTML = 'Close'
    } else {
      menuText.innerHTML = 'Menu'
    };
  };
})();