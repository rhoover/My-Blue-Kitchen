(() => {
  'use strict';

  const homeShareButton = document.querySelector(".home-share");
  const pageURL = document.querySelector("link[rel=canonical]");
  const pageTitle = document.title;

  const contentElem = document.querySelector('.content');
  const contentElemPos = contentElem.offsetTop;

  if (navigator.share) {
    window.addEventListener('scroll', function () {
      let scrollPos = window.scrollY;
      if (scrollPos >= contentElemPos) {
        homeShareButton.style.display = 'block';
      } else {
        homeShareButton.style.display = 'none';  
      };
    });
    homeShareButton.addEventListener('click', () =>
      navigator.share({
        title: pageTitle,
        url: pageURL.href
      })
    );
  };
})();