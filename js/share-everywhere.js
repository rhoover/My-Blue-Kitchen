(() => {
  'use strict';

  const homeShareButton = document.querySelector(".home-share");
  const pageURL = document.querySelector("link[rel=canonical]");
  const pageTitle = document.title;

  if (navigator.share) {
    homeShareButton.style.display = 'block';
    homeShareButton.addEventListener('click', () =>
      navigator.share({
        title: pageTitle,
        url: pageURL.href
      })
    );
  };
})();