$(function () {
  $("#dtBasicExample1").tablesorter();
  $("#dtBasicExample2").tablesorter();
  $("#dtBasicExample3").tablesorter();
  $("#dtBasicExample4").tablesorter();
  $("#dtBasicExample5").tablesorter();
  $("#dtBasicExample6").tablesorter();
  $("#dtBasicExample7").tablesorter();
});
$("input#search").quicksearch("table", {
  bind: "keyup keydown",
});
$("input#search").quicksearch("table tbody tr", {
  bind: "keyup keydown",
});

$("input#searchh").quicksearch("table", {
  bind: "keyup keydown",
});
$("input#searchh").quicksearch("table tbody tr", {
  bind: "keyup keydown",
});

document.getElementById("escdropdown").addEventListener("click", function (e) {
  $("i", this).toggleClass("uil uil-angle-up");
});
document.getElementById("taxidropdown").addEventListener("click", function (e) {
  console.log(this);
  $("i", this).toggleClass("uil uil-angle-up");
});

$(function () {
  var e = $.Event("keypress");
  e.which = 65; // Character 'A'
  $("input#search").trigger(e);
});
document.getElementById("search").addEventListener("keydown", function (e) {
  document.getElementById("searchh").value = "";
  $("input#searchh").keyup();
  document.getElementById("analise").classList.remove("ativo");
  document.getElementById("pendente").classList.remove("ativo");
  document.getElementById("rever").classList.remove("ativo");
  document.getElementById("aprovado").classList.remove("ativo");
});

document.getElementById("analise").addEventListener("click", function (e) {
  if (document.getElementById("searchh").value == "Em análise") {
    document.getElementById("searchh").value = "";
    $("input#searchh").keyup();
    document.getElementById("analise").classList.remove("ativo");
  } else {
    document.getElementById("pendente").classList.remove("ativo");
    document.getElementById("rever").classList.remove("ativo");
    document.getElementById("aprovado").classList.remove("ativo");
    document.getElementById("analise").classList.add("ativo");
    document.getElementById("searchh").value = "Em análise";
    $("input#searchh").keyup();
  }
});
document.getElementById("pendente").addEventListener("click", function (e) {
  if (document.getElementById("searchh").value == "Pendente de Documentação") {
    document.getElementById("searchh").value = "";
    $("input#searchh").keyup();
    document.getElementById("pendente").classList.remove("ativo");
  } else {
    document.getElementById("analise").classList.remove("ativo");
    document.getElementById("rever").classList.remove("ativo");
    document.getElementById("aprovado").classList.remove("ativo");
    document.getElementById("pendente").classList.add("ativo");
    document.getElementById("searchh").value = "Pendente de Documentação";
    $("input#searchh").keyup();
  }
});
document.getElementById("rever").addEventListener("click", function (e) {
  if (document.getElementById("searchh").value == "Aguardando a Reanálise") {
    document.getElementById("searchh").value = "";
    $("input#searchh").keyup();
    document.getElementById("rever").classList.remove("ativo");
  } else {
    document.getElementById("analise").classList.remove("ativo");
    document.getElementById("pendente").classList.remove("ativo");
    document.getElementById("aprovado").classList.remove("ativo");
    document.getElementById("rever").classList.add("ativo");
    document.getElementById("searchh").value = "Aguardando a Reanálise";
    $("input#searchh").keyup();
  }
});
document.getElementById("aprovado").addEventListener("click", function (e) {
  if (document.getElementById("searchh").value == "Aprovado") {
    document.getElementById("searchh").value = "";
    $("input#searchh").keyup();
    document.getElementById("aprovado").classList.remove("ativo");
  } else {
    document.getElementById("analise").classList.remove("ativo");
    document.getElementById("pendente").classList.remove("ativo");
    document.getElementById("rever").classList.remove("ativo");
    document.getElementById("aprovado").classList.add("ativo");
    document.getElementById("searchh").value = "Aprovado";
    $("input#searchh").keyup();
  }
});

function openNav() {
  if (document.getElementById("mySidebar").style.width == "250px") {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    /* document.getElementById("header-content").style.marginLeft = "0"; */
  } else {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("header-content").style.marginLeft = "250px";
  }
}
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

function reset() {
  if (document.getElementById("veitaxi").classList == "dropdownitem ativo") {
    document.getElementById("veitaxi").classList.remove("ativo");
  }
  if (document.getElementById("auxtaxi").classList == "dropdownitem ativo") {
    document.getElementById("auxtaxi").classList.remove("ativo");
  }
  if (document.getElementById("permtaxi").classList == "dropdownitem ativo") {
    document.getElementById("permtaxi").classList.remove("ativo");
  }
  if (
    document.getElementById("veiculosescolar").classList == "dropdownitem ativo"
  ) {
    document.getElementById("veiculosescolar").classList.remove("ativo");
  }
  if (
    document.getElementById("auxiliarescolar").classList == "dropdownitem ativo"
  ) {
    document.getElementById("auxiliarescolar").classList.remove("ativo");
  }
  if (
    document.getElementById("permissionarioescolar").classList ==
    "dropdownitem ativo"
  ) {
    document.getElementById("permissionarioescolar").classList.remove("ativo");
  }
  document.getElementById("divauxiliar").classList.remove("d-none");
  document.getElementById("divpermissionario").classList.remove("d-none");
  document.getElementById("divveiculo").classList.remove("d-none");
  document.getElementById("divpermescolar").classList.remove("d-none");
  document.getElementById("divmotmoniescolar").classList.remove("d-none");
  document.getElementById("divveiculoescolar").classList.remove("d-none");
}
function resetclose() {
  document.getElementById("searchh").value = "";
  $("input#searchh").keyup();
  document.getElementById("analise").classList.remove("ativo");
  document.getElementById("pendente").classList.remove("ativo");
  document.getElementById("rever").classList.remove("ativo");
  document.getElementById("aprovado").classList.remove("ativo");
  var taxista = document.getElementById("taxidropdown");
  taxistadropdown = taxista.nextElementSibling;
  var escolar = document.getElementById("escdropdown");
  escolardropdown = escolar.nextElementSibling;
  console.log(taxista.classList);
  if (taxista.classList == "dropdown-btn ativo") {
    $("i", taxista).toggleClass("uil uil-angle-up");
    taxistadropdown.style.display = "none";
    taxista.classList.remove("ativo");
  }

  if (escolar.classList == "dropdown-btn ativo") {
    $("i", escolar).toggleClass("uil uil-angle-up");
    escolardropdown.style.display = "none";
    escolar.classList.remove("ativo");
  }

  if (document.getElementById("veitaxi").classList == "dropdownitem ativo") {
    document.getElementById("veitaxi").classList.remove("ativo");
  }
  if (document.getElementById("auxtaxi").classList == "dropdownitem ativo") {
    document.getElementById("auxtaxi").classList.remove("ativo");
  }
  if (document.getElementById("permtaxi").classList == "dropdownitem ativo") {
    document.getElementById("permtaxi").classList.remove("ativo");
  }
  if (
    document.getElementById("veiculosescolar").classList == "dropdownitem ativo"
  ) {
    document.getElementById("veiculosescolar").classList.remove("ativo");
  }
  if (
    document.getElementById("auxiliarescolar").classList == "dropdownitem ativo"
  ) {
    document.getElementById("auxiliarescolar").classList.remove("ativo");
  }
  if (
    document.getElementById("permissionarioescolar").classList ==
    "dropdownitem ativo"
  ) {
    document.getElementById("permissionarioescolar").classList.remove("ativo");
  }
  document.getElementById("divauxiliar").classList.remove("d-none");
  document.getElementById("divpermissionario").classList.remove("d-none");
  document.getElementById("divveiculo").classList.remove("d-none");
  document.getElementById("divpermescolar").classList.remove("d-none");
  document.getElementById("divmotmoniescolar").classList.remove("d-none");
  document.getElementById("divveiculoescolar").classList.remove("d-none");
  document.getElementById("taxistas").classList.remove("d-none");
  document.getElementById("escolares").classList.remove("d-none");
}

function selecttaxista() {
  reset();
  var taxista = document.getElementById("taxidropdown");
  taxistadropdown = taxista.nextElementSibling;
  var escolar = document.getElementById("escdropdown");
  escolardropdown = escolar.nextElementSibling;
  var taxistas = document.getElementById("taxistas");
  var escolares = document.getElementById("escolares");
  if (taxista.classList == "dropdown-btn") {
    if (escolar.classList == "dropdown-btn ativo") {
      $("i", escolar).toggleClass("uil uil-angle-up");
      escolardropdown.style.display = "none";
      escolar.classList.remove("ativo");
    }
    taxistadropdown.style.display = "block";
    taxista.classList.add("ativo");
    escolar.classList.remove("ativo");
    taxistas.classList.remove("d-none");
    escolares.classList.add("d-none");
  } else {
    escolardropdown.style.display = "none";
    taxistadropdown.style.display = "none";
    taxistas.classList.remove("d-none");
    escolares.classList.remove("d-none");
    taxista.classList.remove("ativo");
  }
}
function selectescolares() {
  reset();
  var taxista = document.getElementById("taxidropdown");
  taxistadropdown = taxista.nextElementSibling;
  var escolar = document.getElementById("escdropdown");
  escolardropdown = escolar.nextElementSibling;
  var taxistas = document.getElementById("taxistas");
  var escolares = document.getElementById("escolares");
  if (escolar.classList == "dropdown-btn") {
    if (taxista.classList == "dropdown-btn ativo") {
      $("i", taxista).toggleClass("uil uil-angle-up");
      taxistadropdown.style.display = "none";
      taxista.classList.remove("ativo");
    }
    escolardropdown.style.display = "block";
    taxista.classList.remove("ativo");
    escolar.classList.add("ativo");
    escolares.classList.remove("d-none");
    taxistas.classList.add("d-none");
  } else {
    escolardropdown.style.display = "none";
    taxistadropdown.style.display = "none";
    taxistas.classList.remove("d-none");
    taxistas.classList.remove("d-none");
    escolar.classList.remove("ativo");
  }
}

function selectauxiliar() {
  var veiculo = document.getElementById("veitaxi");
  var auxiliar = document.getElementById("auxtaxi");
  var permissionario = document.getElementById("permtaxi");
  var divauxiliar = document.getElementById("divauxiliar");
  var divpermissionario = document.getElementById("divpermissionario");
  var divveiculo = document.getElementById("divveiculo");
  if (auxiliar.classList == "dropdownitem") {
    if (veiculo.classList == "dropdownitem ativo") {
      veiculo.classList.remove("ativo");
    }
    if (permissionario.classList == "dropdownitem ativo") {
      permissionario.classList.remove("ativo");
    }
    divauxiliar.classList.remove("d-none");
    divpermissionario.classList.add("d-none");
    divveiculo.classList.add("d-none");
    auxiliar.classList.add("ativo");
  } else {
    divpermissionario.classList.remove("d-none");
    divauxiliar.classList.remove("d-none");
    divveiculo.classList.remove("d-none");
    auxiliar.classList.remove("ativo");
  }
}
function selectpermissionario() {
  var veiculo = document.getElementById("veitaxi");
  var auxiliar = document.getElementById("auxtaxi");
  var permissionario = document.getElementById("permtaxi");
  var divauxiliar = document.getElementById("divauxiliar");
  var divpermissionario = document.getElementById("divpermissionario");
  var divveiculo = document.getElementById("divveiculo");
  if (permissionario.classList == "dropdownitem") {
    if (veiculo.classList == "dropdownitem ativo") {
      veiculo.classList.remove("ativo");
    }
    if (auxiliar.classList == "dropdownitem ativo") {
      auxiliar.classList.remove("ativo");
    }
    divauxiliar.classList.add("d-none");
    divpermissionario.classList.remove("d-none");
    divveiculo.classList.add("d-none");
    permissionario.classList.add("ativo");
  } else {
    divpermissionario.classList.remove("d-none");
    divauxiliar.classList.remove("d-none");
    divveiculo.classList.remove("d-none");
    permissionario.classList.remove("ativo");
  }
}
function selectveiculo() {
  var veiculo = document.getElementById("veitaxi");
  var auxiliar = document.getElementById("auxtaxi");
  var permissionario = document.getElementById("permtaxi");
  var divauxiliar = document.getElementById("divauxiliar");
  var divpermissionario = document.getElementById("divpermissionario");
  var divveiculo = document.getElementById("divveiculo");
  if (veiculo.classList == "dropdownitem") {
    if (auxiliar.classList == "dropdownitem ativo") {
      auxiliar.classList.remove("ativo");
    }
    if (permissionario.classList == "dropdownitem ativo") {
      permissionario.classList.remove("ativo");
    }
    divauxiliar.classList.add("d-none");
    divpermissionario.classList.add("d-none");
    divveiculo.classList.remove("d-none");
    veiculo.classList.add("ativo");
  } else {
    divauxiliar.classList.remove("d-none");
    divveiculo.classList.remove("d-none");
    divpermissionario.classList.remove("d-none");
    veiculo.classList.remove("ativo");
  }
}

function permescolar() {
  var permissionarioescolar = document.getElementById("permissionarioescolar");
  var auxiliarescolar = document.getElementById("auxiliarescolar");
  var veiculosescolar = document.getElementById("veiculosescolar");
  var divpermescolar = document.getElementById("divpermescolar");
  var divmotmoniescolar = document.getElementById("divmotmoniescolar");
  var divveiculoescolar = document.getElementById("divveiculoescolar");

  if (permissionarioescolar.classList == "dropdownitem") {
    if (veiculosescolar.classList == "dropdownitem ativo") {
      veiculosescolar.classList.remove("ativo");
    }
    if (auxiliarescolar.classList == "dropdownitem ativo") {
      auxiliarescolar.classList.remove("ativo");
    }
    divveiculoescolar.classList.add("d-none");
    divmotmoniescolar.classList.add("d-none");
    divpermescolar.classList.remove("d-none");
    permissionarioescolar.classList.add("ativo");
  } else {
    divveiculoescolar.classList.remove("d-none");
    divmotmoniescolar.classList.remove("d-none");
    divpermescolar.classList.remove("d-none");
    permissionarioescolar.classList.remove("ativo");
  }
}

function motmoniescolarr() {
  var permissionarioescolar = document.getElementById("permissionarioescolar");
  var auxiliarescolar = document.getElementById("auxiliarescolar");
  var veiculosescolar = document.getElementById("veiculosescolar");
  var divpermescolar = document.getElementById("divpermescolar");
  var divmotmoniescolar = document.getElementById("divmotmoniescolar");
  var divveiculoescolar = document.getElementById("divveiculoescolar");

  if (auxiliarescolar.classList == "dropdownitem") {
    if (permissionarioescolar.classList == "dropdownitem ativo") {
      permissionarioescolar.classList.remove("ativo");
    }
    if (veiculosescolar.classList == "dropdownitem ativo") {
      veiculosescolar.classList.remove("ativo");
    }
    divpermescolar.classList.add("d-none");
    divveiculoescolar.classList.add("d-none");
    divmotmoniescolar.classList.remove("d-none");
    auxiliarescolar.classList.add("ativo");
  } else {
    divveiculoescolar.classList.remove("d-none");
    divmotmoniescolar.classList.remove("d-none");
    divpermescolar.classList.remove("d-none");
    auxiliarescolar.classList.remove("ativo");
  }
}

function veiculoescolar() {
  var permissionarioescolar = document.getElementById("permissionarioescolar");
  var auxiliarescolar = document.getElementById("auxiliarescolar");
  var veiculosescolar = document.getElementById("veiculosescolar");
  var divpermescolar = document.getElementById("divpermescolar");
  var divmotmoniescolar = document.getElementById("divmotmoniescolar");
  var divveiculoescolar = document.getElementById("divveiculoescolar");

  if (veiculosescolar.classList == "dropdownitem") {
    if (auxiliarescolar.classList == "dropdownitem ativo") {
      auxiliarescolar.classList.remove("ativo");
    }
    if (permissionarioescolar.classList == "dropdownitem ativo") {
      permissionarioescolar.classList.remove("ativo");
    }
    divpermescolar.classList.add("d-none");
    divmotmoniescolar.classList.add("d-none");
    divveiculoescolar.classList.remove("d-none");
    veiculosescolar.classList.add("ativo");
  } else {
    divveiculoescolar.classList.remove("d-none");
    divmotmoniescolar.classList.remove("d-none");
    divpermescolar.classList.remove("d-none");
    veiculosescolar.classList.remove("ativo");
  }
}
