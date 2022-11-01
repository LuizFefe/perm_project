$(document).ready(function () {
  $("#placa").inputmask({ mask: ["AAA[ ][-]9[A][9]99"] });
});
$(document).ready(function () {
  //newly added
  $("#cadastrar-permissionario").on("click", function () {
    nome = document.getElementById("nome").value;
    cpf = document.getElementById("cpf").value;
    email = document.getElementById("email").value;
    cmc = document.getElementById("cmc").value;
    telefone = document.getElementById("telefone").value;
    nperm = document.getElementById("permcode").value;
    cep = document.getElementById("ceppf").value;
    rua = document.getElementById("rua").value;
    bairro = document.getElementById("bairro").value;
    cidade = document.getElementById("cidadepf").value;
    numero = document.getElementById("numero").value;
    cnh = document.getElementById("cnh").value;
    alvara = document.getElementById("alvara").value;
    pontcnh = document.getElementById("pontuacao").value;
    certpenal = document.getElementById("certpenal").value;
    certmun = document.getElementById("certmun").value;
    sanidade = document.getElementById("sanidade").value;
    inss = document.getElementById("inss").value;
    residencia = document.getElementById("residencia").value;
    curso = document.getElementById("curso").value;
    pontos = document.getElementById("pontos").value;

    button = document.getElementById("cadastrar-permissionario");
    document.getElementById("nome_msg").innerHTML = "";
    document.getElementById("cpf_msg").innerHTML = "";
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("cmc_msg").innerHTML = "";
    document.getElementById("tipo_codperm_msg").innerHTML = "";
    document.getElementById("telefone_msg").innerHTML = "";
    document.getElementById("cep_msg").innerHTML = "";
    document.getElementById("rua_msg").innerHTML = "";
    document.getElementById("bairro_msg").innerHTML = "";
    document.getElementById("cidade_msg").innerHTML = "";
    document.getElementById("num_msg").innerHTML = "";
    document.getElementById("ponto_msg").innerHTML = "";
    document.getElementById("cnh_msg").innerHTML = "";
    document.getElementById("certpenal_msg").innerHTML = "";
    document.getElementById("certnum_msg").innerHTML = "";
    document.getElementById("sanidade_msg").innerHTML = "";
    document.getElementById("inss_msg").innerHTML = "";
    document.getElementById("residencia_msg").innerHTML = "";
    document.getElementById("curso_msg").innerHTML = "";

    $.ajax({
      url: "../src/checkpermtaxi.php",
      data: {
        cmc: cmc,
        nperm: nperm,
      },
      type: "post",
      success: function (result) {
        if (result == "cmccadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CMC ja Cadastrada!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "permcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "Nº de permissionário ja Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (nome == "") {
          button.disabled = false;
          document.getElementById("nome_msg").innerHTML =
            "<b>É  necessario preencher com seu nome  <br></b>";
          document.getElementById("nome").focus();
          return false;
        } else {
          document.getElementById("nome_msg").innerHTML = "";
        }
        if (cpf == "") {
          button.disabled = false;
          document.getElementById("cpf_msg").innerHTML =
            "<b>É necessario preencher com seu CPF  <br></b>";
          document.getElementById("cpf").focus();
          return false;
        } else {
          document.getElementById("cpf_msg").innerHTML = "";
        }
        if (email == "") {
          button.disabled = false;
          document.getElementById("email_msg").innerHTML =
            "<b>É necessario preencher com seu email  <br></b>";
          document.getElementById("email").focus();
          return false;
        } else {
          document.getElementById("email_msg").innerHTML = "";
        }
        if (cmc == "") {
          button.disabled = false;
          document.getElementById("cmc_msg").innerHTML =
            "<b>É necessario preencher com seu CMC  <br></b>";
          document.getElementById("cmc").focus();
          return false;
        } else {
          document.getElementById("cmc_msg").innerHTML = "";
        }
        if (nperm == "") {
          button.disabled = false;
          document.getElementById("tipo_codperm_msg").innerHTML =
            "<b>É necessario preencher com Nº de permissionário  <br></b>";
          document.getElementById("permcode").focus();
          return false;
        } else {
          document.getElementById("tipo_codperm_msg").innerHTML = "";
        }
        if (telefone == "") {
          button.disabled = false;
          document.getElementById("telefone_msg").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefone").focus();
          return false;
        } else {
          document.getElementById("telefone_msg").innerHTML = "";
        }
        if (cep == "") {
          button.disabled = false;
          document.getElementById("cep_msg").innerHTML =
            "<b>É necessario preencher com seu CEP  <br></b>";
          document.getElementById("ceppf").focus();
          return false;
        } else {
          document.getElementById("cep_msg").innerHTML = "";
        }
        if (rua == "") {
          button.disabled = false;
          document.getElementById("rua_msg").innerHTML =
            "<b>É necessario preencher com sua rua  <br></b>";
          document.getElementById("rua").focus();
          return false;
        } else {
          document.getElementById("rua_msg").innerHTML = "";
        }
        if (bairro == "") {
          button.disabled = false;
          document.getElementById("bairro_msg").innerHTML =
            "<b>É necessario preencher com seu bairro  <br></b>";
          document.getElementById("bairro").focus();
          return false;
        } else {
          document.getElementById("bairro_msg").innerHTML = "";
        }
        if (cidade == "") {
          button.disabled = false;
          document.getElementById("cidade_msg").innerHTML =
            "<b>É necessario preencher com sua cidade  <br></b>";
          document.getElementById("cidadepf").focus();
          return false;
        } else {
          document.getElementById("cidade_msg").innerHTML = "";
        }
        if (numero == "") {
          button.disabled = false;
          document.getElementById("num_msg").innerHTML =
            "<b>É necessario preencher com o numero da sua casa  <br></b>";
          document.getElementById("numero").focus();
          return false;
        } else {
          document.getElementById("num_msg").innerHTML = "";
        }
        if (pontos === "Selecione o ponto") {
          button.disabled = false;
          document.getElementById("ponto_msg").innerHTML =
            "<b>Por favor informe seu ponto!  <br> </b>";
          document.getElementById("pontos").focus();
          return false;
        } else {
          document.getElementById("ponto_msg").innerHTML = "";
        }
        if (alvara == "") {
          button.disabled = false;
          document.getElementById("alvara_msg").innerHTML =
            "<b>É necessario enviar seu Alvara!  <br></b>";
          document.getElementById("alvaradiv").focus();
          return false;
        } else {
          document.getElementById("alvara_msg").innerHTML = "";
        }
        if (cnh == "") {
          button.disabled = false;
          document.getElementById("cnh_msg").innerHTML =
            "<b>É necessario enviar sua CNH!  <br></b>";
          document.getElementById("cnhdiv").focus();
          return false;
        } else {
          document.getElementById("cnh_msg").innerHTML = "";
        }
        if (certpenal == "") {
          button.disabled = false;
          document.getElementById("certpenal_msg").innerHTML =
            "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
          document.getElementById("certpendiv").focus();
          return false;
        } else {
          document.getElementById("certpenal_msg").innerHTML = "";
        }
        if (certmun == "") {
          button.disabled = false;
          document.getElementById("certnum_msg").innerHTML =
            "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
          document.getElementById("negmunidiv").focus();
          return false;
        } else {
          document.getElementById("certnum_msg").innerHTML = "";
        }
       /*  if (sanidade == "") {
          button.disabled = false;
          document.getElementById("sanidade_msg").innerHTML =
            "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
          document.getElementById("sanidadediv").focus();
          return false;
        } else {
          document.getElementById("sanidade_msg").innerHTML = "";
        }
        if (inss == "") {
          button.disabled = false;
          document.getElementById("inss_msg").innerHTML =
            "<b>É necessario enviar seu inss!  <br></b>";
          document.getElementById("inssdiv").focus();
          return false;
        } else {
          document.getElementById("inss_msg").innerHTML = "";
        } */
        if (pontcnh == "") {
          button.disabled = false;
          document.getElementById("pontuacao_msg").innerHTML =
            "<b>É necessario enviar seu comprovante de pontuação de CNH!  <br></b>";
          document.getElementById("pontuacaodiv").focus();
          return false;
        } else {
          document.getElementById("pontuacao_msg").innerHTML = "";
        }
        if (residencia == "") {
          button.disabled = false;
          document.getElementById("residencia_msg").innerHTML =
            "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
          document.getElementById("residenciadiv").focus();
          return false;
        } else {
          document.getElementById("residencia_msg").innerHTML = "";
        }
       /*  if (curso == "") {
          button.disabled = false;
          document.getElementById("curso_msg").innerHTML =
            "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
          document.getElementById("cursodiv").focus();
          return false;
        } else {
          document.getElementById("curso_msg").innerHTML = "";
        } */
        if (document.getElementById("scales").checked == false) {
          button.disabled = false;
          Swal.fire({
            title: "Confirme suas informações!",
            text: "Para prosseguir você deve confirmar que suas informações são verdadeiras!",
            icon: "error",
            confirmButtonText: "Ok",
          });
          document.getElementById("info_msg").innerHTML =
            "<b><br>Para prosseguir você precisa confirmar suas informações!  <br></b>";
          return false;
        } else {
          document.forms["cadastrar_permissionario"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });
  });
});
/*/*  */

//*/
