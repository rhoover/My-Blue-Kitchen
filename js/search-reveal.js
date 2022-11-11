(function() {
  'use strict';
  var magnifyElement = document.querySelector('.header-magnify');
  var magnifySVG = document.querySelector('.header-magnify-svg');
  var searchDiv = document.querySelector('.header-search');

  magnifyElement.onclick = function() {
    searchDiv.classList.toggle('header-search-active');
    magnifySVG.classList.toggle('header-magnify-svg-close');
  }
}())