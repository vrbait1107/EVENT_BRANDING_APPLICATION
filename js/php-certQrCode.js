// Check Javascript in strict mode

"use strict";
let elem = document.getElementById("qrcode");
let qrcode = new QRCode(elem, {
  width: 100,
  height: 100,
});

const makeCode = () => {
  let certificateData = {
    First_Name: a,
    Last_Name: b,
    Department: c,
    Event: d,
    Prize: e,
    Certificate_ID: f,
  };

  Object.freeze(certificateData);
  let myJSON = JSON.stringify(certificateData);

  qrcode.makeCode(myJSON);
};
