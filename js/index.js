// Disabling Loader after page load
window.onload = () => {
  document.getElementById("loader").style.display = "none";
};

//Shodh Cancellation Notice Popup
setTimeout(function () {
  Swal.fire({
    title: "<strong>CANCELLATION NOTICE</strong>",
    icon: "info",
    width: 800,
    padding: "2em",
    html:
      '<p class="text-justify">Due to the unfortunate outbreak of COVID-19 in India, the administration of GIT, Lavel has decided to cancel this edition of the techfest as a precautionary measure according to Goverment of India  guidelines for the safety of participants.</p> <br/>' +
      '<h3 class ="font-time">Thank you for showing interest in GIT SHODH 2K20. <br> Hope to see you at GIT SHODH 2K21 </h3> <br> <h3 class="text-danger font-time"> Stay Safe, Stay Home</h3>',
  });
}, 3000);
