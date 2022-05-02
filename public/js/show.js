var isBouncing = false;

var bounceDavid = function() {
  if (isBouncing) {
    alert("He's wbbling! Stop it!");
    $("#actualDavid").removeClass("animate__animated");
    isBouncing = false;
    $('#bounceButton').html("Wobble David");
  } else {
    alert("He's sitting still, so let's wobble him.");
    $("#actualDavid").addClass("animate__animated");
    isBouncing = true;
    $('#bounceButton').html("Stop it!");
  }
}