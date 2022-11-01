$(function () {
  $("#dtBasicExample1").tablesorter();
  $("#dtBasicExample2").tablesorter();
  $("#dtBasicExample3").tablesorter();
  $("#dtBasicExample4").tablesorter();
  $("#dtBasicExample5").tablesorter();
  $("#dtBasicExample6").tablesorter();
  $("#dtBasicExample7").tablesorter();
});

/* function reset() {
  if (
    document.getElementById("veiculostaxi").classList !="btn btn-lg m-3 btn-success"
  ) {
    document.getElementById("veiculostaxi").classList.remove("btn-primary");
    document.getElementById("veiculostaxi").classList.add("btn-success");
  }
  if (
    document.getElementById("auxiliartaxi").classList !=
    "btn btn-lg m-3 btn-success"
  ) {
    document.getElementById("auxiliartaxi").classList.remove("btn-primary");
    document.getElementById("auxiliartaxi").classList.add("btn-success");
  }
  if (document.getElementById("permissionariotaxi").classList != "btn btn-lg m-3 btn-success") {
    document.getElementById("permissionariotaxi").classList.remove("btn-primary");
    document.getElementById("permissionariotaxi").classList.add("btn-success");
  }
  if (
    document.getElementById("veiculosescolar").classList !=
    "btn btn-lg m-3 btn-success"
  ) {
    document.getElementById("veiculosescolar").classList.remove("btn-primary");
    document.getElementById("veiculosescolar").classList.add("btn-success");
  }
  if (
    document.getElementById("auxiliarescolar").classList !=
    "btn btn-lg m-3 btn-success"
  ) {
    document.getElementById("auxiliarescolar").classList.remove("btn-primary");
    document.getElementById("auxiliarescolar").classList.add("btn-success");
  }
  if (
    document.getElementById("permissionarioescolar").classList !=
    "btn btn-lg m-3 btn-success"
  ) {
    document.getElementById("permissionarioescolar").classList.remove("btn-primary");
    document.getElementById("permissionarioescolar").classList.add("btn-success");
  }
  document.getElementById("divauxiliar").classList.remove("d-none");
  document.getElementById("divpermissionario").classList.remove("d-none");
  document.getElementById("divveiculo").classList.remove("d-none");
  document.getElementById("divpermescolar").classList.remove("d-none");
  document.getElementById("divmotmoniescolar").classList.remove("d-none");
  document.getElementById("divveiculoescolar").classList.remove("d-none");

} */

function selecttaxista() {
  /* reset(); */
  var taxista = document.getElementById("taxista");
  var escolar = document.getElementById("escolar");
  var taxistas = document.getElementById("taxistas");
  var escolares = document.getElementById("escolares");
  /* var buttontaxistas = document.getElementById("taxistabuttons");
  var buttonescolares = document.getElementById("escolarbuttons"); */
  if (taxista.classList == "btn btn-lg m-3 btn-success") {
    if (escolar.classList == "btn btn-lg m-3 btn-primary") {
      escolar.classList.remove("btn-primary");
      escolar.classList.add("btn-success");
    }
    /* buttontaxistas.classList.remove("d-none");
    buttonescolares.classList.add("d-none"); */
    taxista.classList.remove("btn-success");
    taxista.classList.add("btn-primary");
    taxistas.classList.remove("d-none");
    escolares.classList.add("d-none");
  } else {
    /* buttontaxistas.classList.add("d-none");
    buttonescolares.classList.add("d-none"); */
    taxistas.classList.remove("d-none");
    escolares.classList.remove("d-none");
    taxista.classList.remove("btn-primary");
    taxista.classList.add("btn-success");
  }
}
function selectescolares() {
  /*  reset(); */
  var taxista = document.getElementById("taxista");
  var escolar = document.getElementById("escolar");
  var taxistas = document.getElementById("taxistas");
  var escolares = document.getElementById("escolares");
  /*  var buttontaxistas = document.getElementById("taxistabuttons");
  var buttonescolares = document.getElementById("escolarbuttons"); */
  if (escolar.classList == "btn btn-lg m-3 btn-success") {
    if (taxista.classList == "btn btn-lg m-3 btn-primary") {
      taxista.classList.remove("btn-primary");
      taxista.classList.add("btn-success");
    }
    /* buttonescolares.classList.remove("d-none");
    buttontaxistas.classList.add("d-none"); */
    escolar.classList.remove("btn-success");
    escolar.classList.add("btn-primary");
    escolares.classList.remove("d-none");
    taxistas.classList.add("d-none");
  } else {
    /* buttontaxistas.classList.add("d-none");
    buttonescolares.classList.add("d-none"); */
    taxistas.classList.remove("d-none");
    taxistas.classList.remove("d-none");
    escolar.classList.remove("btn-primary");
    escolar.classList.add("btn-success");
  }
}

function selectauxiliar() {
  var veiculo = document.getElementById("veiculostaxi");
  var auxiliar = document.getElementById("auxiliartaxi");
  var permissionario = document.getElementById("permissionariotaxi");
  var divauxiliar = document.getElementById("divauxiliar");
  var divpermissionario = document.getElementById("divpermissionario");
  var divveiculo = document.getElementById("divveiculo");
  if (auxiliar.classList == "btn btn-lg m-3 btn-success") {
    if (veiculo.classList == "btn btn-lg m-3 btn-primary") {
      veiculo.classList.remove("btn-primary");
      veiculo.classList.add("btn-success");
    }
    if (permissionario.classList == "btn btn-lg m-3 btn-primary") {
      permissionario.classList.remove("btn-primary");
      permissionario.classList.add("btn-success");
    }
    divauxiliar.classList.remove("d-none");
    divpermissionario.classList.add("d-none");
    divveiculo.classList.add("d-none");
    auxiliar.classList.remove("btn-success");
    auxiliar.classList.add("btn-primary");
  } else {
    divpermissionario.classList.remove("d-none");
    divauxiliar.classList.remove("d-none");
    divveiculo.classList.remove("d-none");
    auxiliar.classList.remove("btn-primary");
    auxiliar.classList.add("btn-success");
  }
}

function selectpermissionario() {
  var veiculo = document.getElementById("veiculostaxi");
  var auxiliar = document.getElementById("auxiliartaxi");
  var permissionario = document.getElementById("permissionariotaxi");
  var divauxiliar = document.getElementById("divauxiliar");
  var divpermissionario = document.getElementById("divpermissionario");
  var divveiculo = document.getElementById("divveiculo");
  if (permissionario.classList == "btn btn-lg m-3 btn-success") {
    if (veiculo.classList == "btn btn-lg m-3 btn-primary") {
      veiculo.classList.remove("btn-primary");
      veiculo.classList.add("btn-success");
    }
    if (auxiliar.classList == "btn btn-lg m-3 btn-primary") {
      auxiliar.classList.remove("btn-primary");
      auxiliar.classList.add("btn-success");
    }
    divauxiliar.classList.add("d-none");
    divpermissionario.classList.remove("d-none");
    divveiculo.classList.add("d-none");
    permissionario.classList.remove("btn-success");
    permissionario.classList.add("btn-primary");
  } else {
    divpermissionario.classList.remove("d-none");
    divauxiliar.classList.remove("d-none");
    divveiculo.classList.remove("d-none");
    permissionario.classList.remove("btn-primary");
    permissionario.classList.add("btn-success");
  }
}
function selectveiculo() {
  var veiculo = document.getElementById("veiculostaxi");
  var auxiliar = document.getElementById("auxiliartaxi");
  var permissionario = document.getElementById("permissionariotaxi");
  var divauxiliar = document.getElementById("divauxiliar");
  var divpermissionario = document.getElementById("divpermissionario");
  var divveiculo = document.getElementById("divveiculo");
  if (veiculo.classList == "btn btn-lg m-3 btn-success") {
    if (auxiliar.classList == "btn btn-lg m-3 btn-primary") {
      auxiliar.classList.remove("btn-primary");
      auxiliar.classList.add("btn-success");
    }
    if (permissionario.classList == "btn btn-lg m-3 btn-primary") {
      permissionario.classList.remove("btn-primary");
      permissionario.classList.add("btn-success");
    }
    divauxiliar.classList.add("d-none");
    divpermissionario.classList.add("d-none");
    divveiculo.classList.remove("d-none");
    veiculo.classList.remove("btn-success");
    veiculo.classList.add("btn-primary");
  } else {
    divauxiliar.classList.remove("d-none");
    divveiculo.classList.remove("d-none");
    divpermissionario.classList.remove("d-none");
    veiculo.classList.remove("btn-primary");
    veiculo.classList.add("btn-success");
  }
}

function permescolar() {
  var permissionarioescolar = document.getElementById("permissionarioescolar");
  var auxiliarescolar = document.getElementById("auxiliarescolar");
  var veiculosescolar = document.getElementById("veiculosescolar");
  var divpermescolar = document.getElementById("divpermescolar");
  var divmotmoniescolar = document.getElementById("divmotmoniescolar");
  var divveiculoescolar = document.getElementById("divveiculoescolar");

  if (permissionarioescolar.classList == "btn btn-lg m-3 btn-success") {
    if (veiculosescolar.classList == "btn btn-lg m-3 btn-primary") {
      veiculosescolar.classList.remove("btn-primary");
      veiculosescolar.classList.add("btn-success");
    }
    if (auxiliarescolar.classList == "btn btn-lg m-3 btn-primary") {
      auxiliarescolar.classList.remove("btn-primary");
      auxiliarescolar.classList.add("btn-success");
    }
    divveiculoescolar.classList.add("d-none");
    divmotmoniescolar.classList.add("d-none");
    divpermescolar.classList.remove("d-none");
    permissionarioescolar.classList.remove("btn-success");
    permissionarioescolar.classList.add("btn-primary");
  } else {
    divveiculoescolar.classList.remove("d-none");
    divmotmoniescolar.classList.remove("d-none");
    divpermescolar.classList.remove("d-none");
    permissionarioescolar.classList.remove("btn-primary");
    permissionarioescolar.classList.add("btn-success");
  }
}

function motmoniescolarr() {
  var permissionarioescolar = document.getElementById("permissionarioescolar");
  var auxiliarescolar = document.getElementById("auxiliarescolar");
  var veiculosescolar = document.getElementById("veiculosescolar");
  var divpermescolar = document.getElementById("divpermescolar");
  var divmotmoniescolar = document.getElementById("divmotmoniescolar");
  var divveiculoescolar = document.getElementById("divveiculoescolar");

  if (auxiliarescolar.classList == "btn btn-lg m-3 btn-success") {
    if (permissionarioescolar.classList == "btn btn-lg m-3 btn-primary") {
      permissionarioescolar.classList.remove("btn-primary");
      permissionarioescolar.classList.add("btn-success");
    }
    if (veiculosescolar.classList == "btn btn-lg m-3 btn-primary") {
      veiculosescolar.classList.remove("btn-primary");
      veiculosescolar.classList.add("btn-success");
    }
    divpermescolar.classList.add("d-none");
    divveiculoescolar.classList.add("d-none");
    divmotmoniescolar.classList.remove("d-none");
    auxiliarescolar.classList.remove("btn-success");
    auxiliarescolar.classList.add("btn-primary");
  } else {
    divveiculoescolar.classList.remove("d-none");
    divmotmoniescolar.classList.remove("d-none");
    divpermescolar.classList.remove("d-none");
    auxiliarescolar.classList.remove("btn-primary");
    auxiliarescolar.classList.add("btn-success");
  }
}

function veiculoescolar() {
  var permissionarioescolar = document.getElementById("permissionarioescolar");
  var auxiliarescolar = document.getElementById("auxiliarescolar");
  var veiculosescolar = document.getElementById("veiculosescolar");
  var divpermescolar = document.getElementById("divpermescolar");
  var divmotmoniescolar = document.getElementById("divmotmoniescolar");
  var divveiculoescolar = document.getElementById("divveiculoescolar");

  if (veiculosescolar.classList == "btn btn-lg m-3 btn-success") {
    if (auxiliarescolar.classList == "btn btn-lg m-3 btn-primary") {
      auxiliarescolar.classList.remove("btn-primary");
      auxiliarescolar.classList.add("btn-success");
    }
    if (permissionarioescolar.classList == "btn btn-lg m-3 btn-primary") {
      permissionarioescolar.classList.remove("btn-primary");
      permissionarioescolar.classList.add("btn-success");
    }
    divpermescolar.classList.add("d-none");
    divmotmoniescolar.classList.add("d-none");
    divveiculoescolar.classList.remove("d-none");
    veiculosescolar.classList.remove("btn-success");
    veiculosescolar.classList.add("btn-primary");
  } else {
    divveiculoescolar.classList.remove("d-none");
    divmotmoniescolar.classList.remove("d-none");
    divpermescolar.classList.remove("d-none");
    veiculosescolar.classList.remove("btn-primary");
    veiculosescolar.classList.add("btn-success");
  }
}
