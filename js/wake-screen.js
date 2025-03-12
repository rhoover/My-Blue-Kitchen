(() => {
  'use strict';
  let wakeButton = document.querySelector('.wake-screen-button');

  if (navigator.wakeLock) {

    wakeButton.style.display = "block";

    wakeButton.addEventListener('click', () => {
      const requestWakeLock = async () => {
        let wakeState = null;
        wakeState = await navigator.wakeLock.request("screen");
        alert('Your screen will NOW STAY ON while you are cooking this recipe!');
      };
      requestWakeLock();
    });
  };



})();