	(function () {
    'use strict';
    let backButton = document.querySelector('.header-backbutton');

    // history.length is always 1 or 2 when landing on site for first time
    // it will be 2 if landing on site for the first time from URL in a new tab
    // if (document.referrer == '' && history.state == null) {
    if (history.state == null && document.referrer == '') {
      history.replaceState({ historyLength: history.length, href: location.href, page: 'Landing Page' }, "foo");
      return;
    // it will be 1 if site was landed upon for the first time from a link somewhere else
    } else if (history.length == 1) {
      return;
    } else {
      backButton.classList.add('header-backbutton-active');
    };

    backButton.onclick = function () {
      history.back();
    }}());