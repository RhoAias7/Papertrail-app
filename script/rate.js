function perRate() {
  document.getElementById("changePer").checked = true;
  document.querySelector(".showHideBottom").style.visibility = "visible";
  document.querySelector(".textField").style.display = "block";
  document.querySelector("#perRow").style.backgroundColor = "#38bd34";
  document.querySelector("#relRow").style.backgroundColor = "#9f9f9f";
  document.querySelector("#irelRow").style.backgroundColor = "#9f9f9f";
}
function relRate() {
  document.getElementById("changeRel").checked = true;
  document.querySelector(".showHideBottom").style.visibility = "visible";
  document.querySelector(".textField").style.display = "block";
  document.querySelector("#relRow").style.backgroundColor = "#009be4";
  document.querySelector("#perRow").style.backgroundColor = "#9f9f9f";
  document.querySelector("#irelRow").style.backgroundColor = "#9f9f9f";
}
function irelRate() {
  document.getElementById("changeIrel").checked = true;
  document.querySelector(".showHideBottom").style.visibility = "visible";
  document.querySelector(".textField").style.display = "block";
  document.querySelector("#irelRow").style.backgroundColor = "#f13f53";
  document.querySelector("#perRow").style.backgroundColor = "#9f9f9f";
  document.querySelector("#relRow").style.backgroundColor = "#9f9f9f";
}
function closeRate() {
  document.querySelector(".formContainer").style.visibility = "hidden";
}
