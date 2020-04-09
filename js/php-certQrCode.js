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
  };

  let myJSON = JSON.stringify(certificateData);
  qrcode.makeCode(myJSON);
};
