//------------------------------------------------>> APPLY PROMOCODE
$(document).ready(function () {
  $(".applyPromocode").click(function () {
    var eventId = $(this).attr("id");
    var promocode = $("#event" + eventId).val();
    var apply = "apply";

    if (promocode === "") {
      alert("Promocode Cannot be Empty");
      return false;
    }

    $.ajax({
      url: "ajaxHandlerPHP/ajaxdepartmentEvent.php",
      type: "post",
      data: {
        eventId,
        promocode,
        apply,
      },
      success(data) {
        var discountPrice = parseInt(data);

        if (!isNaN(discountPrice)) {
          $("#entryFee" + eventId).val(discountPrice);
          $("#entryFee2" + eventId).html("Entry Fee &#x20b9;" + discountPrice);
          $("#entryFee2" + eventId).val(discountPrice);
          $("#entryFee3" + eventId).val(discountPrice);
          $("#event" + eventId).val(null);

          Swal.fire({
            icon: "success",
            title: "Successful",
            text: "Promocode Applied Successfully",
          });

        } else {
          $("#responsePromocode").html(data);
          $("#event" + eventId).val(null);
        }
      },
      error(err) {
        alert("Something Went Wrong");
      },
    });
  });
});
