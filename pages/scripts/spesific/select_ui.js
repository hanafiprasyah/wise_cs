$(document).ready(function () {
  $("#myselection").on("change", function () {
    var demovalue = $(this).val();
    $("div.myDiv").fadeOut("fast");
    $("#show" + demovalue).fadeIn("fast");
  });
});
