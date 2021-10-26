var getQR = function() {
  
document.querySelector('.payment').classList.add('goodnot');
document.querySelector('.yourQR').classList.add('goodnow');
let wallet = document.querySelector('#wallet').value;
let amount = document.querySelector('#amount').value;
let label = document.querySelector('#label').value.split(' ').join('-');
let message = document.querySelector('#message').value.split(' ').join('%20');
let addr = "bitcoin:"+wallet+"?amount="+amount+"&label="+label+"&message="+message; /* BTC URI SCHEME */
new QRCode(document.querySelector('#qrCode'), addr); /* Generate QRCode from data */ 
document.querySelector('#wwalet').innerHTML += wallet;
  document.querySelector('#aamount').innerHTML += amount;
  document.querySelector('#llabel').innerHTML += label;
  document.querySelector('#mmessage').innerHTML += message;
  setTimeout(function(){ var QRDATA = document.querySelector('.yourQR img').src;
  document.querySelector('.downloadQR').setAttribute('href', QRDATA);
                      }, 500);
}

var start = function() {
  document.querySelector('.payment').classList.add('goodnow');
  document.querySelector('.details').classList.add('goodnot');
  document.querySelector('.start').classList.add('goodnot');
    document.querySelector("#wallet").focus();

}