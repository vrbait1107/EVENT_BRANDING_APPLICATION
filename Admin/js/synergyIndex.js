$(document).ready(function () {
  $("#synergyForm").submit(function (e) {
    e.preventDefault();

    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let department = $("#department").val();
    let event = $("#event").val();
    let prize = $("#prize").val();
    let certificateId = parseInt(Math.random() * 1000000000);
    let submit = "submit";

    if (!isNaN(firstName) || firstName === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "First Name cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(lastName) || lastName === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Last Name cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(department) || department === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Department cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(event) || event === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Event cannot be Number or cannot be Empty",
      });
      return false;
    }

    if (!isNaN(prize) || prize === "") {
      Swal.fire({
        icon: "warning",
        title: "Required",
        text: "Prize cannot be Number or cannot be Empty",
      });
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxSynergyIndex.php",
      type: "post",
      data: {
        firstName: firstName,
        lastName: lastName,
        department: department,
        event: event,
        prize: prize,
        certificateId: certificateId,
        submit: submit,
      },
      beforeSend() {
        $("#responseMessage").html('<h5 class="text-danger">Processing</h5>');
      },
      success(data) {
        $("#responseMessage").html(data);
        $("#synergyForm").trigger("reset");
      },
      error() {
        $("#responseMessage").html("Something Went Wrong");
      },
    });

    // Your web app's Firebase configuration
    var firebaseConfig = {
      apiKey: "AIzaSyCzbLFCUfBHGmmWWye01lWPvOWhDxESjJc",
      authDomain: "git-shodh-2k20-certificates.firebaseapp.com",
      databaseURL: "https://git-shodh-2k20-certificates.firebaseio.com",
      projectId: "git-shodh-2k20-certificates",
      storageBucket: "git-shodh-2k20-certificates.appspot.com",
      messagingSenderId: "64170861595",
      appId: "1:64170861595:web:9eb79e0a9a68e3b6b144be",
      measurementId: "G-5ZWXWTC1EW",
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    var db = firebase.firestore();
    var messagesRef = db.collection("Synergy Certificate");

    messagesRef
      .add({
        First_Name: firstName,
        Last_Name: lastName,
        Department: department,
        Event: event,
        Prize: prize,
        CertificateId: certificateId,
      })
      .then(function () {
        console.log("Document successfully written!", messagesRef.id);
      })
      .catch(function (error) {
        console.error("Error writing document: ", error);
      });
  });
});
