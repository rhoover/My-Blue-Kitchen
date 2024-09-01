(() => {
  'use strict';

  const navMenu = document.querySelector('.nav-main');
  const closeItem = document.createElement('p');
  const menuButton = document.querySelector('.header-menu');
  const menuText = document.querySelector('.menu-button-text');
  const menuButtonWrap = document.querySelector('.menu-toggle');

  closeItem.setAttribute('class', 'nav-main-close');
  closeItem.textContent = 'Close';


  if (navigator.share) {
    
    navMenu.prepend(closeItem);

    closeItem.onclick = () => {
      navMenu.classList.toggle('nav-main-open');
      menuButtonWrap.classList.toggle('opened');
      menuText.classList.toggle('menu-button-text-red');
      if (menuText.innerHTML === 'Menu') {
        menuText.innerHTML = 'Close'
      } else {
        menuText.innerHTML = 'Menu'
      };
    };
  };
})();