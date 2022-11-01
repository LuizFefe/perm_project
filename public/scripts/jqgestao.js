$(document).ready(function () {
  if (
    document.getElementById("buttoncontrolpendente").classList ==
    "d-block p-2 btn btn-warning w-100 a a a a a a a"
  ) {
    $("#buttoncontrolpendente").removeAttr("disabled");
    $("#buttoncontrolaprova").removeAttr("disabled");
  } else {
    document.getElementById("buttoncontrolpendente").classList.add("a");
  }
  console.log(document.getElementById("buttoncontrolpendente").classList);
});
