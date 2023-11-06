(() => {
'use strict';

let selectLabel = document.querySelector('.selectAmount');
let selectAmountButton = document.querySelector('.paymentSelect');

selectLabel.innerHTML += "YES, you must click me!";

selectAmountButton.addEventListener('click', function () {
  selectAmountButton.style.padding = "0.5rem";
  selectAmountButton.style.backgroundColor = "teal";
});
})();