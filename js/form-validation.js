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
  let e = document.forms["myForm"]["email"].value;
  let x = document.forms["myForm"]["mobileNumber"].value;
  let y = document.forms["myForm"]["password"].value;
  let z = document.forms["myForm"]["confirm_password"].value;

  if (!isNaN(a) || a === "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper First Name",
    });
    return false;
  }

  if (e === "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Email",
    });
    return false;
  }

  if (!isNaN(n) || n === "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Last Name",
    });
    return false;
  }

  if (!isNaN(b) || b === "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper College Name",
    });
    return false;
  }

  if (!isNaN(c) || c === "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Department Name",
    });
    return false;
  }

  if (!isNaN(d) || d === "") {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Academic Year",
    });
    return false;
  }

  if (isNaN(x) === "") {
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
