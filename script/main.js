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

//shake CTA
$(document).ready(function() {
  $(window).scroll(function() {
    $(".signUp").effect("shake", { times: 10 }, 1000);
  });
});

//if upload form tick is not checked, alert user to agree.
function uploadCheck() {
  if ((document.getElementById("uploadCheck").checked = false)) {
    alert(
      "Please check the box to allow us to share your notes with your peers."
    );
  }
}
