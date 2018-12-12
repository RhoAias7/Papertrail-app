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
  console.log("test");

  const el = document.querySelector(".dashboard-content");
  el.addEventListener("mousemove", e => {
    el.style.backgroundPositionX = -e.offsetX + "px";
    el.style.backgroundPositionY = -e.offsetY + "px";
  });
});
