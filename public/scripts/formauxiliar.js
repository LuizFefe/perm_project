/* ----------------PEGA OS CAMPOS DE INPUT DO FORM VIA JAVASCRIPT NAO JQUERY ---------------------- */
function validarmotorista() {
  /** Validação fieldset de "Informações Sobre a Origem da Viagem"*/
  let nome = document.forms["cadastrar_viagem"]["nome"].value;
  let cpf = document.forms["cadastrar_viagem"]["cpf"].value;
  let email = document.forms["cadastrar_viagem"]["email"].value;
  let cmc = document.forms["cadastrar_viagem"]["cmc"].value;
  let telefone = document.forms["cadastrar_viagem"]["telefone"].value;
  let cep = document.forms["cadastrar_viagem"]["cep"].value;
  let rua = document.forms["cadastrar_viagem"]["rua"].value;
  let bairro = document.forms["cadastrar_viagem"]["bairro"].value;
  let cidade = document.forms["cadastrar_viagem"]["cidade"].value;
  let numero = document.forms["cadastrar_viagem"]["numero"].value;
  let cnh = document.forms["cadastrar_viagem"]["cnh"].value;
  let certpenal = document.forms["cadastrar_viagem"]["certpenal"].value;
  let certmun = document.forms["cadastrar_viagem"]["certmun"].value;
  let sanidade = document.forms["cadastrar_viagem"]["sanidade"].value;
  let quitacao = document.forms["cadastrar_viagem"]["quitacao"].value;
  let inss = document.forms["cadastrar_viagem"]["inss"].value;
  let residencia = document.forms["cadastrar_viagem"]["residencia"].value;
  let curso = document.forms["cadastrar_viagem"]["curso"].value;
  let ponto = document.forms["cadastrar_viagem"]["pontos"].value;
  button = document.getElementById("cadastrar-viagem-btn");
  button.disabled = true;
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
    document.getElementById("cep").focus();
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
    document.getElementById("cidade").focus();
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
  if (ponto === "Selecione o ponto") {
    button.disabled = false;
    document.getElementById("ponto_msg").innerHTML =
      "<b>Por favor informe seu ponto!  <br> </b>";
    document.getElementById("pontos").focus();
    return false;
  } else {
    document.getElementById("ponto_msg").innerHTML = "";
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
  if (sanidade == "") {
    button.disabled = false;
    document.getElementById("sanidade_msg").innerHTML =
      "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
    document.getElementById("sanidadediv").focus();
    return false;
  } else {
    document.getElementById("sanidade_msg").innerHTML = "";
  }
  if (quitacao == "") {
    button.disabled = false;
    document.getElementById("quitacao_msg").innerHTML =
      "<b>É necessario enviar seu atestado de quitação sindical!  <br></b>";
    document.getElementById("quitacaodiv").focus();
    return false;
  } else {
    document.getElementById("quitacao_msg").innerHTML = "";
  }
  if (inss == "") {
    button.disabled = false;
    document.getElementById("inss_msg").innerHTML =
      "<b>É necessario enviar seu inss!  <br></b>";
    document.getElementById("inssdiv").focus();
    return false;
  } else {
    document.getElementById("inss_msg").innerHTML = "";
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
  if (curso == "") {
    button.disabled = false;
    document.getElementById("curso_msg").innerHTML =
      "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
    document.getElementById("cursodiv").focus();
    return false;
  } else {
    document.getElementById("curso_msg").innerHTML = "";
  }
  if (document.getElementById("scales").checked) {
  } else {
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
  }
}

//*/
