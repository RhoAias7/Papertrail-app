function perRate() {
  document.getElementById("changePer").checked = true;
  document.querySelector(".showHideBottom").style.visibility = "visible";
  document.querySelector(".textField").style.display = "block";
  document.querySelector("#perRow").style.backgroundColor = "#38bd34";
  document.querySelector("#relRow").style.backgroundColor = "rgb(221, 221, 221)";
  document.querySelector("#irelRow").style.backgroundColor = "rgb(221, 221, 221)";
}
function relRate() {
  document.getElementById("changeRel").checked = true;
  document.querySelector(".showHideBottom").style.visibility = "visible";
  document.querySelector(".textField").style.display = "block";
  document.querySelector("#relRow").style.backgroundColor = "#009be4";
  document.querySelector("#perRow").style.backgroundColor = "rgb(221, 221, 221)";
  document.querySelector("#irelRow").style.backgroundColor = "rgb(221, 221, 221)";
}
function irelRate() {
  document.getElementById("changeIrel").checked = true;
  document.querySelector(".showHideBottom").style.visibility = "visible";
  document.querySelector(".textField").style.display = "block";
  document.querySelector("#irelRow").style.backgroundColor = "#f13f53";
  document.querySelector("#perRow").style.backgroundColor = " rgb(221, 221, 221)";
  document.querySelector("#relRow").style.backgroundColor = " rgb(221, 221, 221)";
}
function closeRate() {
  document.querySelector(".formContainer").style.visibility = "hidden";
}

// //If upload form is not checked, alert user to agree.
// function uploadCheck() {
//   console.log("test text");
//   if (document.getElementById("uploadChecked").checked) {
//     alert("checked");
//   } else {
//     alert("You didn't check it! Let me check it for you.");
//   }
// }
