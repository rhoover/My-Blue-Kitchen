(function() {
  'use strict';

  var printButton = document.querySelector('.print-button');

  if (!printButton) {
    return;
  } else {
    printButton.onclick = function () {
      window.print();
    }    
  };
})();