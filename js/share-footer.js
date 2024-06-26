(() => {
'use strict';

  const footerShareButton = document.querySelector(".footer-share-button");
  const recipeShareButton = document.querySelector(".share-button");
  const pageURL = document.querySelector("link[rel=canonical]");
  const pageTitle = document.title;

  if (navigator.share) {
    footerShareButton.style.display = 'grid';
    footerShareButton.addEventListener('click', () =>
      navigator.share({
        title: pageTitle,
        url: pageURL.href
      })
    );
    if (recipeShareButton) {
      recipeShareButton.style.display = 'grid';
      recipeShareButton.addEventListener('click', () =>
        navigator.share({
          title: pageTitle,
          url: pageURL.href
        })
      );    
    }
  } else {
    footerShareButton.style.display = 'none';
    if (recipeShareButton) {
      recipeShareButton.style.display = 'none';    
    }
  };

})();