(() => {
  'use strict';
  let wakeButton = document.querySelector('.wake-screen-button');

  if (navigator.wakeLock) {

    wakeButton.style.display = "block";

    wakeButton.addEventListener('click', () => {
      const requestWakeLock = async () => {
        let wakeState = null;
        wakeState = await navigator.wakeLock.request("screen");
        alert('Your screen will now not go black while you are cooking this recipe!');
      };
      requestWakeLock();
    });
  };



})();