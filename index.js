var logForm = document.querySelector(".log");
var regForm = document.querySelector(".reg");
var regBtn = document.querySelector(".registerBtn");
var logBtn = document.querySelector(".loginBtn");

logBtn.addEventListener("click", function () {
  regForm.style.display = "none";
  logForm.style.display = "block";
  logBtn.style.display = "none";
  regBtn.style.display = "block";
});

regBtn.addEventListener("click", function () {
  regForm.style.display = "block";
  logForm.style.display = "none";
  regBtn.style.display = "none";
  logBtn.style.display = "block";
});
