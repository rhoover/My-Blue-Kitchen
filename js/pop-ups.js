(() => {
  'use strict';

  const buttonSection = document.querySelector('.dinners-buttons');
  const eventButtons = document.querySelectorAll('.dinners-button');
  const menuDivs = document.querySelectorAll('.dinners-menu');

  buttonSection.addEventListener('click', toggleMenus);
  function toggleMenus(event) {
    let activeButton = event.target;
    let activeButtonData = event.target.dataset.button;

    // make the button clicked look like an active button
    eventButtons.forEach(eventButton => {
      if (eventButton.classList.contains('dinners-button-active')) {
        eventButton.classList.remove('dinners-button-active');
      };
    });
    activeButton.classList.add('dinners-button-active');

    // make each menu appear in the div
    menuDivs.forEach(menu => {
      let menuDataSet = menu.dataset.flavor;
      if (menuDataSet == activeButtonData) {
        menu.classList.add('dinners-menu-active');
      } else {
        menu.classList.remove('dinners-menu-active');
      };
    });
  };


})();