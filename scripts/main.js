//fade CTA
$(document).ready(function() {
  $(".cta")
    .hide(0)
    .delay(500)
    .fadeIn(2000);
});
$(document).ready(function() {
  $(".signUp")
    .hide(0)
    .delay(1500)
    .fadeIn(500);
});

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

//moving dashboard viewport
$(document).ready(function() {
  const dash = document.querySelector(".dashboard-body");
  dash.addEventListener("mousemove", e => {
    dash.style.backgroundPositionX = -e.offsetX + "px";
    dash.style.backgroundPositionY = -e.offsetY + "px";
  });
  console.log("end of file");
});
