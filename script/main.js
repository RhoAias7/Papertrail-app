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
