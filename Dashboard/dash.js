console.log("test");

function ajax() {
  var req = new XMLHttpRequest();

  req.onreadystatechange = function() {
    if (req.readyState == 4 && req.status == 200) {
      document.getElementById("chat").innerHTML = req.responseText;
    }
  };

  req.open("GET", "chat.php", "true");
  req.send();
}
setInterval(function() {
  ajax();
}, 1000);

//moving dashboard viewport
$(document).ready(function() {
  console.log("test");

  const el = document.querySelector(".dashboard-content");
  el.addEventListener("mousemove", e => {
    el.style.backgroundPositionX = -e.offsetX + "px";
    el.style.backgroundPositionY = -e.offsetY + "px";
  });
});
