/* ---------------MASCARA PARA A PLACA DO VEICULO------------------- */
$(document).ready(function () {
  $("#placa").inputmask({ mask: ["AAA[ ][-]9[A][9]99"] }); //MASCARA PERMITINDO PLACAS ANTIGAS E PLACAS NOVAS
});
/* ---------------MASCARA INPUTS DO FORMULARIO------------------- */
$(document).ready(function () {
  //newly added
  $("#cadastrar-carro-btn").on("click", function () {
    button = document.getElementById("cadastrar-carro-btn");
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
    var segapp = document.getElementById("seguroapp").value;
    /* var vistoria = document.getElementById("vistoria").value; */
    var licenciamento = document.getElementById("licenciamento").value;
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
    document.getElementById("seguroapp_msg").innerHTML = "";
    /* document.getElementById("vistoria_msg").innerHTML = ""; */
    document.getElementById("licenciamento_msg").innerHTML = "";

    $.ajax({
      //REQUEST PARA VERIFICAR OS DADOS DIGITADOS NA BASE, DEPENDENDO DO RETORONO EXIBIRA UMA MENSAGEM
      url: "../src/verificadores/validate_carescolar.php",
      data: {
        renavam: renavam,
        chassi: chassi,
        placa: placa,
      },
      type: "post",
      success: function (result) {
        if (result == "placaexistente") {
          Swal.fire({
            title: "Erro!",
            text: "Placa ja Cadastrada!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "chassiexistente") {
          Swal.fire({
            title: "Erro!",
            text: "Chassi ja Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "renavamexistente") {
          Swal.fire({
            title: "Erro!",
            text: "Renavam ja Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (placa == "") {
          document.getElementById("placa_msg").innerHTML =
            "<b>**Preencha com a placa!<br></b>";
          document.getElementById("placa").focus();
          return false;
        }
        if (marca == "") {
          document.getElementById("marca_msg").innerHTML =
            "<b>**Preencha com a marca!<br></b>";
          document.getElementById("marca").focus();
          return false;
        }
        if (modelo == "") {
          document.getElementById("modelo_msg").innerHTML =
            "<b>**Preencha com o modelo!<br></b>";
          document.getElementById("modelo").focus();
          return false;
        }
        if (combustivel == "Selecione o tipo") {
          document.getElementById("ponto_msg").innerHTML =
            "<b>**Selecione o tipo de combustivel!<br></b>";
          document.getElementById("combustivel").focus();
          return false;
        }
        if (anofab == "") {
          document.getElementById("anofab_msg").innerHTML =
            "<b>**Preencha com o ano de fabricacao!<br></b>";
          document.getElementById("anofab").focus();
          return false;
        }
        if (anomod == "") {
          document.getElementById("anomod_msg").innerHTML =
            "<b>**Preencha com o ano do modelo!<br></b>";
          document.getElementById("anomod").focus();
          return false;
        }
        if (categoria == "") {
          document.getElementById("categoria_msg").innerHTML =
            "<b>**Preencha com a categoria do carro!<br></b>";
          document.getElementById("categoria").focus();
          return false;
        }
        if (lotacao == "") {
          document.getElementById("lotacao_msg").innerHTML =
            "<b>**Preencha com a lotação do carro!<br></b>";
          document.getElementById("lotacao").focus();
          return false;
        }
        if (chassi == "") {
          document.getElementById("chassi_msg").innerHTML =
            "<b>**Preencha com  o chassi do carro!<br></b>";
          document.getElementById("chassi").focus();

          return false;
        }
        if (renavam == "") {
          document.getElementById("renavam_msg").innerHTML =
            "<b>**Preencha com o renavam do carro!<br></b>";
          document.getElementById("renavam").focus();
          return false;
        }
        if (validadeapp == "") {
          document.getElementById("validadeapp_msg").innerHTML =
            "<b>**Preencha com a validade da APP!<br></b>";
          document.getElementById("validadeapp").focus();
          return false;
        }
        if (segapp == "") {
          document.getElementById("seguroapp_msg").innerHTML =
            "<b>**Envie seu documento do carro!<br></b>";
          document.getElementById("divapp").focus();
          return false;
        }
        /* if (vistoria == "") {
          document.getElementById("vistoria_msg").innerHTML =
            "<b>**Envie seu documento do carro!<br></b>";
          document.getElementById("divvistoria").focus();
          return false;
        } */
        if (licenciamento == "") {
          document.getElementById("licenciamento_msg").innerHTML =
            "<b>**Envie seu documento do carro!<br></b>";
          document.getElementById("divlicenciamento").focus();
          return false;
        }
        if (document.getElementById("scales").checked == false) {
          Swal.fire({
            title: "Confirme suas informações!",
            text: "Para prosseguir você deve assinalar o termo de compromisso!",
            icon: "error",
            confirmButtonText: "Ok",
          });
          document.getElementById("scales").focus();
          return false;
        } else {
          button.disabled = true;
          document.forms["cadastrar_carro"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });
  });
}); /*/*  */
