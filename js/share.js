(() => {
'use strict';

const shareButton = document.querySelector(".footer-share-button");
const pageURL = document.querySelector("link[rel=canonical]");
const pageTitle = document.title;

if (navigator.share) {
  shareButton.style.display = 'block';
  console.log(pageURL, pageTitle);
  shareButton.addEventListener('click', () =>
    navigator.share({
      title: pageTitle,
      url: pageURL.href
    })
  );
} else {
  shareButton.style.display = 'none';
  console.log(pageURL.href, pageTitle);
};

})();