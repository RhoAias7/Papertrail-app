//fade CTA
$(document).ready(function() {
  $(".cta")
    .delay(500)
    .fadeIn(2000);
});
$(document).ready(function() {
  $(".signUp")
    .hide(0)
    .delay(1500)
    .fadeIn(500);
});

// //shake CTA
// $(document).ready(function() {
//   $(window).ready(function() {
//     $(".signUp").effect("shake", { times: 10 }, 1000);
//   });
// });

//img rotation
$(document).ready(function() {
  var rotation = function() {
    $(".signInNoticeImg").rotate({
      angle: 0,
      animateTo: -360,
      callback: rotation
    });
  };
  rotation();
});

//scroll to top funciton
$(document).ready(function() {
  $(window).scroll(function() {
    if ($(this).scrollTop() > 10) {
      $(".scrollUp").fadeIn();
    } else {
      $(".scrollUp").fadeOut();
    }
  });
  $("#scrollUp").on("click", function() {
    $("html", "body").animate({ scrollTop: 0 }, 1000);
  });
});

//If upload form tick is not checked, alert user to agree.
function uploadCheck() {
  if ((document.getElementById("uploadCheck").checked = false)) {
    alert(
      "Please check the box to allow us to share your notes with your peers."
    );
  }
}
