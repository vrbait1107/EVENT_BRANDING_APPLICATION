function validateForm() {
  var x = document.forms["myForm"]["firstName"].value;
  if (!isNaN(x)) {
    alert("Only Characters are allowed");
    return false;
  }

  var y = document.forms["myForm"]["lastName"].value;
  if (!isNaN(y)) {
    alert("Only Characters are allowed");
    return false;
  }

  var z = document.forms["myForm"]["department"].value;
  if (!isNaN(z)) {
    alert("Only Characters are allowed");
    return false;
  }

  var a = document.forms["myForm"]["event"].value;
  if (!isNaN(a)) {
    alert("Only Characters are allowed");
    return false;
  }

  var b = document.forms["myForm"]["prize"].value;
  if (!isNaN(b)) {
    alert("Only Characters are allowed");
    return false;
  }
}

// Register Validate form

function formValidationRegister() {
  var a = document.forms["myForm"]["firstName"].value;
  var n = document.forms["myForm"]["lastName"].value;
  var b = document.forms["myForm"]["collegeName"].value;
  var c = document.forms["myForm"]["department"].value;
  var d = document.forms["myForm"]["year"].value;

  var x = document.forms["myForm"]["mobileNumber"].value;
  var y = document.forms["myForm"]["password"].value;
  var z = document.forms["myForm"]["confirm_password"].value;

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
}

// Contact Form Validation

function validateFormContact() {
  var name = document.getElementById("name").value;
  if (name == "") {
    alert("Name cannot be empty");
    return false;
  }
  var email = document.getElementById("email").value;
  if (email == "") {
    alert("Email cannot be empty");
    return false;
  } else {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (!re.test(email)) {
      alert("Email format invalid");
      return false;
    }
  }
  var subject = document.getElementById("subject").value;
  if (subject == "") {
    alert("Subject cannot be empty");
    return false;
  }
  var message = document.getElementById("message").value;
  if (message == "") {
    alert("Message cannot be empty");
    return false;
  }
}

// User Validate form

function formValidationUserProfileForm() {
  var a = document.forms["userProfileForm"]["firstName"].value;
  var b = document.forms["userProfileForm"]["lastName"].value;
  var c = document.forms["userProfileForm"]["collegeName"].value;
  var d = document.forms["userProfileForm"]["departmentName"].value;
  var e = document.forms["userProfileForm"]["academicYear"].value;
  var f = document.forms["userProfileForm"]["mobileNumber"].value;

  if (!isNaN(a)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper First Name",
    });
    return false;
  }

  if (!isNaN(b)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Last Name",
    });
    return false;
  }

  if (!isNaN(c)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper College Name",
    });
    return false;
  }
  if (!isNaN(d)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Department Name",
    });
    return false;
  }
  if (!isNaN(e)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Academic Year",
    });
    return false;
  }

  if (isNaN(f)) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Valid Mobile Number",
    });
    return false;
  }

  if (f.length !== 10) {
    Swal.fire({
      icon: "error",
      title: "ERROR",
      text: "Please Provide Proper Valid Mobile Number",
    });
    return false;
  }
}
