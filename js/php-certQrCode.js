 var elem = document.getElementById("qrcode");
var qrcode = new QRCode(elem, {
    width : 100,
    height : 100
});

function makeCode () {
var obj = {  First_Name: a, Last_Name: b, Department: c, Event: d, Prize:e };
var myJSON = JSON.stringify(obj);


    if (myJSON.value === "") {
        //alert("Input a text");
        //elText.focus();
        return;
    }
 
    qrcode.makeCode(myJSON);
}