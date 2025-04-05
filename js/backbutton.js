	(function () {
    'use strict';
    var backButton = document.querySelector('.header-backbutton');

  // history.length is always 1 or 2 when landing on site for first time
  // it will be 2 if landing on site for the first time from URL in a new tab
  if (document.referrer == '' && history.length == 2) {
    console.log('first if:', document.referrer, history.length);
    return;
  // it will be 1 if site was landed upon for the first time from a link somewhere else
  } else if (history.length == 1) {
    console.log('second if:', document.referrer, history.length);
    return;
  // when both the above are false, show the back button
  } else {
    console.log('else:', document.referrer, history.length)
    backButton.classList.add('header-backbutton-active');
  };

    backButton.onclick = function () {
      history.back();
    }}());