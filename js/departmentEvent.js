//------------------------------------------------>> APPLY PROMOCODE
$(document).ready(function () {
  $(".applyPromocode").click(function () {
    var eventId = $(this).attr("id");
    var promocode = $("#event" + eventId).val();
    var apply = "apply";

    $.ajax({
      url: "ajaxHandlerPHP/ajaxdepartmentEvent.php",
      type: "post",
      data: {
        eventId: eventId,
        promocode: promocode,
        apply: apply,
      },
      success(data) {
        console.log(data);
        var discountPrice = parseInt(data);
        console.log(discountPrice);
        if (discountPrice) {
          $("#entryFee" + eventId).val(data);
          alert("Promocode Applied Successfully");
        } else {
          $("#responsePromocode").val(data);
          alert(data);
        }
      },
      error(err) {
        alert("Something Went Wrong");
      },
    });

    if (promocode === "") {
      alert("Promocode Cannot be Empty");
      return false;
    }
  });
});
