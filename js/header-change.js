(() => {
  'use strict';

  const header = document.querySelector('.header');
  const mainElement = document.querySelector('main');
  const mainElementPosition = mainElement.offsetTop;

  const headerArrow = document.querySelector('.header-arrow');
  const backText = document.querySelector('.header-back-text');

  const headerTitle = document.querySelector('.header-center-title');

  const menuIcon = document.querySelector('.icon');
  const menuText = document.querySelector('.menu-button-text');

  const menuItems = document.querySelectorAll('.menu-item');

  window.addEventListener('scroll', () => {
    var scrollPos = window.scrollY;
    if (scrollPos >= mainElementPosition) {
      header.style.borderBottom = '1px solid rgb(44, 112, 112)';
      headerArrow.style.fill = 'rgb(44, 112, 112)';
      backText.style.color = 'rgb(44, 112, 112)';
      headerTitle.style.color = 'rgb(44, 112, 112)';
      menuIcon.style.fill = 'rgb(44, 112, 112)';
      menuText.style.color = 'rgb(44, 112, 112)';

      menuItems.forEach(item => {
        item.style.color =  'rgb(44, 112, 112)';
      });
    } else {
      header.removeAttribute('style');
      headerArrow.removeAttribute('style');
      backText.removeAttribute('style');
      headerTitle.removeAttribute('style');
      menuIcon.removeAttribute('style');
      menuText.removeAttribute('style');

      menuItems.forEach(item => {
        item.removeAttribute('style');
      });
    };
  });

})();