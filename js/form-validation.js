// Feedback Validation Form

const feedbackForm = () => {
  "use strict";

  let likeMost = document.forms["feedbackForm"]["likeMost"].value;
  let likeLeast = document.forms["feedbackForm"]["likeLeast"].value;
  let suggestion = document.forms["feedbackForm"]["suggestion"].value;

  let attendBefore = document.getElementsByName("attendBefore");
  let attendBeforeValue = false;

  for (var i = 0; i < attendBefore.length; i++) {
    if (attendBefore[i].checked == true) {
      attendBeforeValue = true;
    }
  }
  if (!attendBeforeValue) {
    alert("Please Choose the gender");
    return false;
  }

  if (likeMost == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "if you don't want to specify anything just put - in input field.",
    });
    return false;
  }

  if (likeLeast == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "if you don't want to specify anything just put - in input field.",
    });
    return false;
  }

  if (suggestion == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "if you don't want to specify anything just put - in input field.",
    });
    return false;
  }
};

//Synergy Certificate Form Validation

const synergyValidateForm = () => {
  "use strict";
  let a = document.forms["myForm"]["firstName"].value;
  if (!isNaN(a) || a == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Only Characters are allowed or first name cannot be empty",
    });
    return false;
  }

  let b = document.forms["myForm"]["lastName"].value;
  if (!isNaN(b) || b == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Only Characters are allowed or Last Name cannot be empty",
    });
    return false;
  }

  let c = document.forms["myForm"]["department"].value;
  if (!isNaN(c) || c == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Only Characters are allowed or Department cannot be Empty",
    });
    return false;
  }

  let d = document.forms["myForm"]["event"].value;
  if (!isNaN(d) || d == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Only Characters are allowed or Event cannot be Empty",
    });
    return false;
  }

  let e = document.forms["myForm"]["prize"].value;
  if (!isNaN(e) || e == "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Only Characters are allowed or Event cannot be empty",
    });
    return false;
  }
};

// Register Validate form

const formValidationRegister = () => {
  "use strict";
  let a = document.forms["myForm"]["firstName"].value;
  let n = document.forms["myForm"]["lastName"].value;
  let b = document.forms["myForm"]["collegeName"].value;
  let c = document.forms["myForm"]["department"].value;
  let d = document.forms["myForm"]["year"].value;
  let x = document.forms["myForm"]["mobileNumber"].value;
  let y = document.forms["myForm"]["password"].value;
  let z = document.forms["myForm"]["confirm_password"].value;

  if (!isNaN(a)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper First Name",
    });
    return false;
  }

  if (!isNaN(n)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Last Name",
    });
    return false;
  }

  if (!isNaN(b)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper College Name",
    });
    return false;
  }

  if (!isNaN(c)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Department Name",
    });
    return false;
  }

  if (!isNaN(d)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Academic Year",
    });
    return false;
  }

  if (isNaN(x)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Valid Mobile Number",
    });
    return false;
  }

  if (x.length !== 10) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Valid Mobile Number",
    });
    return false;
  }

  if (y.length <= 7 || y.length > 20) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Password length must be between 8 to 20",
    });
    return false;
  }

  if (y !== z) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Password & Confirm password field are not Same",
    });
    return false;
  }
};
