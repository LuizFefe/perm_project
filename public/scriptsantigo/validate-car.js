$(document).ready(function () {
  $("#placa").inputmask({ mask: ["AAA[ ][-]9[A][9]99"] });
});
$(document).ready(function () {
  //newly added
  $("#cadastrar-viagem-btn").on("click", function () {
    var placa = document.getElementById("placa").value;
    var marca = document.getElementById("marca").value;
    var modelo = document.getElementById("modelo").value;
    var combustivel = document.getElementById("combustivel").value;
    var anofab = document.getElementById("anofab").value;
    var anomod = document.getElementById("anomod").value;
    var categoria = document.getElementById("categoria").value;
    var lotacao = document.getElementById("lotacao").value;
    var chassi = document.getElementById("chassi").value;
    var renavam = document.getElementById("renavam").value;
    var validadeapp = document.getElementById("validadeapp").value;
    var crlv = document.getElementById("crlv").value;
    var doccar = document.getElementById("doccar").value;
    button = document.getElementById("cadastrar-viagem-btn");
    document.getElementById("placa_msg").innerHTML = "";
    document.getElementById("marca_msg").innerHTML = "";
    document.getElementById("modelo_msg").innerHTML = "";
    document.getElementById("ponto_msg").innerHTML = "";
    document.getElementById("anofab_msg").innerHTML = "";
    document.getElementById("anomod_msg").innerHTML = "";
    document.getElementById("categoria_msg").innerHTML = "";
    document.getElementById("lotacao_msg").innerHTML = "";
    document.getElementById("chassi_msg").innerHTML = "";
    document.getElementById("renavam_msg").innerHTML = "";
    document.getElementById("validadeapp_msg").innerHTML = "";
    document.getElementById("crlv_msg").innerHTML = "";
    document.getElementById("doccar_msg").innerHTML = "";
    button.disabled = true;

    $.ajax({
      url: "../src/verificadores/validate_car.php",
      data: {
        placa: placa,
      },
      type: "post",
      success: function (result) {
        if (result == "placaexistente") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "Placa ja Cadastrada!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (placa == "") {
          button.disabled = false;
          document.getElementById("placa_msg").innerHTML =
            "<b>**Preencha com a placa!<br></b>";
          document.getElementById("placa").focus();
          return false;
        }
        if (marca == "") {
          button.disabled = false;
          document.getElementById("marca_msg").innerHTML =
            "<b>**Preencha com a marca!<br></b>";
          document.getElementById("marca").focus();
          return false;
        }
        if (modelo == "") {
          button.disabled = false;
          document.getElementById("modelo_msg").innerHTML =
            "<b>**Preencha com o modelo!<br></b>";
          document.getElementById("modelo").focus();
          return false;
        }
        if (combustivel == "Selecione o tipo") {
          button.disabled = false;
          document.getElementById("ponto_msg").innerHTML =
            "<b>**Selecione o tipo de combustivel!<br></b>";
          document.getElementById("combustivel").focus();
          return false;
        }
        if (anofab == "") {
          button.disabled = false;
          document.getElementById("anofab_msg").innerHTML =
            "<b>**Preencha com o ano de fabricacao!<br></b>";
          document.getElementById("anofab").focus();
          return false;
        }
        if (anomod == "") {
          button.disabled = false;
          document.getElementById("anomod_msg").innerHTML =
            "<b>**Preencha com o ano do modelo!<br></b>";
          document.getElementById("anomod").focus();
          return false;
        }
        if (categoria == "") {
          button.disabled = false;
          document.getElementById("categoria_msg").innerHTML =
            "<b>**Preencha com a categoria do carro!<br></b>";
          document.getElementById("categoria").focus();
          return false;
        }
        if (lotacao == "") {
          button.disabled = false;
          document.getElementById("lotacao_msg").innerHTML =
            "<b>**Preencha com a lotação do carro!<br></b>";
          document.getElementById("lotacao").focus();
          return false;
        }
        if (chassi == "") {
          button.disabled = false;
          document.getElementById("chassi_msg").innerHTML =
            "<b>**Preencha com  o chassi do carro!<br></b>";
          document.getElementById("chassi").focus();

          return false;
        }
        if (renavam == "") {
          button.disabled = false;
          document.getElementById("renavam_msg").innerHTML =
            "<b>**Preencha com o renavam do carro!<br></b>";
          document.getElementById("renavam").focus();
          return false;
        }
        if (validadeapp == "") {
          button.disabled = false;
          document.getElementById("validadeapp_msg").innerHTML =
            "<b>**Preencha com a validade da APP!<br></b>";
          document.getElementById("validadeapp").focus();
          return false;
        }
        if (crlv == "") {
          button.disabled = false;
          document.getElementById("crlv_msg").innerHTML =
            "<b>**Preencha com o CRLV do carro!<br></b>";
          document.getElementById("crlv").focus();
          return false;
        }
        if (doccar == "") {
          button.disabled = false;
          document.getElementById("doccar_msg").innerHTML =
            "<b>**Envie seu documento do carro!<br></b>";
          document.getElementById("doccar").focus();
          return false;
        }
        if (document.getElementById("scales").checked == false) {
          button.disabled = false;
          Swal.fire({
            title: "Confirme suas informações!",
            text: "Para prosseguir você deve assinalar o termo de compromisso!",
            icon: "error",
            confirmButtonText: "Ok",
          });
          document.getElementById("scales").focus();
          return false;
        } else {
          document.forms["cadastrar_carro"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });
  });
}); /*/*  */
