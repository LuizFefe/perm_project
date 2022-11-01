/*----------------------------------------------CPF MASK ----------------------------------------------- */
function is_cpf(c) {
  if ((c = c.replace(/[^\d]/g, "")).length != 11) return false;

  if (c == "00000000000") return false;

  var r;
  var s = 0;

  for (i = 1; i <= 9; i++) s = s + parseInt(c[i - 1]) * (11 - i);

  r = (s * 10) % 11;

  if (r == 10 || r == 11) r = 0;

  if (r != parseInt(c[9])) return false;

  s = 0;

  for (i = 1; i <= 10; i++) s = s + parseInt(c[i - 1]) * (12 - i);

  r = (s * 10) % 11;

  if (r == 10 || r == 11) r = 0;

  if (r != parseInt(c[10])) return false;

  return true;
}

function fMasc(objeto, mascara) {
  obj = objeto;
  masc = mascara;
  setTimeout("fMascEx()", 1);
}

function fMascEx() {
  obj.value = masc(obj.value);
}

function mCPF(cpf) {
  cpf = cpf.replace(/\D/g, "");
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  return cpf;
}

cpfCheck = function (el) {
  document.getElementById("cpfResponse").innerHTML = is_cpf(el.value)
    ? '<i class="fas fa-check" style="color:green;font-size:17px"></i>'
    : '<i class="fas fa-times" style="color:red;font-size:17px"></i>';
  if (el.value == "") document.getElementById("cpfResponse").innerHTML = "";
};
const validateEmail = (email) => {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};
/*--------------------------------------------------------------------------------------------- */
/*----------------------------------------------EMAIL MASK ----------------------------------------------- */

const validate = () => {
  const $result = $("#result");
  const email = $("#email").val();
  $result.text("");

  if (validateEmail(email)) {
    $result.html(
      '<i class="fas fa-check" style="color:green;font-size:17px"></i>'
    );
  } else {
    $result.html(
      '<i class="fas fa-times" style="color:red;font-size:17px"></i>'
    );
  }
  return false;
};

$("#email").on("input", validate);
/*--------------------------------------------------------------------------------------------- */
/*----------------------------------------------PHONE MASK----------------------------------------------- */

jQuery("input.telefone")
  .mask("(99) 9999-99999")
  .focusout(function (event) {
    var target, phone, element;
    target = event.currentTarget ? event.currentTarget : event.srcElement;
    phone = target.value.replace(/\D/g, "");
    element = $(target);
    element.unmask();
    if (phone.length > 10) {
      element.mask("(99) 99999-9999");
    } else {
      element.mask("(99) 9999-99999");
    }
  });
/*--------------------------------------------------------------------------------------------- */
/*----------------------------------------------CPF MASK ----------------------------------------------- */

function limpa_formulário_cep() {
  //Limpa valores do formulário de cep.
  document.getElementById("rua").value = "";
  document.getElementById("bairro").value = "";
  document.getElementById("cidade").value = "";
}

function meu_callback(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById("ruapf").value = conteudo.logradouro;
    document.getElementById("bairropf").value = conteudo.bairro;
    document.getElementById("cidadepf").value = conteudo.localidade;
  } //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
  }
}

function pesquisacep(valor) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, "");

  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById("ruapf").value = "...";
      document.getElementById("bairropf").value = "...";
      document.getElementById("cidadepf").value = "...";

      //Cria um elemento javascript.
      var script = document.createElement("script");

      //Sincroniza com o callback.
      script.src =
        "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
}

function meu_callbackmei(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById("ruapfmei").value = conteudo.logradouro;
    document.getElementById("bairropfmei").value = conteudo.bairro;
    document.getElementById("cidadepfmei").value = conteudo.localidade;
  } //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
  }
}

function pesquisacepmei(valor) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, "");

  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById("ruapfmei").value = "...";
      document.getElementById("bairropfmei").value = "...";
      document.getElementById("cidadepfmei").value = "...";

      //Cria um elemento javascript.
      var script = document.createElement("script");

      //Sincroniza com o callback.
      script.src =
        "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callbackmei";

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_cep();
      alert("Formato de CEP inválido.");
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
  }
}

function limpa_formulário_ceppj() {
  //Limpa valores do formulário de cep.
  document.getElementById("ruapj").value = "";
  document.getElementById("bairropj").value = "";
  document.getElementById("testepj").value = "";
}

function meu_callbackpj(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById("ruapj").value = conteudo.logradouro;
    document.getElementById("bairropj").value = conteudo.bairro;
    document.getElementById("testepj").value = conteudo.localidade;
  } //end if.
  else {
    //CEP não Encontrado.
    limpa_formulário_ceppj();
    alert("CEP não encontrado.");
  }
}

function pesquisaceppj(valor) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, "");

  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if (validacep.test(cep)) {
      //Preenche os campos com "..." enquanto consulta webservice.
      document.getElementById("ruapj").value = "...";
      document.getElementById("bairropj").value = "...";
      document.getElementById("testepj").value = "...";

      //Cria um elemento javascript.
      var script = document.createElement("script");

      //Sincroniza com o callback.
      script.src =
        "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callbackpj";

      //Insere script no documento e carrega o conteúdo.
      document.body.appendChild(script);
    } //end if.
    else {
      //cep é inválido.
      limpa_formulário_ceppj();
      alert("Formato de CEP inválido.");
    }
  } //end if.
  else {
    //cep sem valor, limpa formulário.
    limpa_formulário_ceppj();
  }
}
/*--------------------------------------------------------------------------------------------- */
/*--------------------------------------------------------------------------------------------- */
/*--------------------------------------------------------------------------------------------- */
/*--------------------------------------------------------------------------------------------- */

/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */

$(document).ready(function () {
  $("#cadastrar-cpf").on("click", function () {
    /** Validação fieldset de "Informações Sobre a Origem da Viagem"*/
    let button = document.getElementById("cadastrar-cpf");
    let nome = document.getElementById("nomepf").value;
    let cpf = document.getElementById("CPFpf").value;
    /* let cnpj = document.forms["cadastrar_pf"]["CNPJ"].value; */
    let email = document.getElementById("emailpf").value;
    let cmc = document.getElementById("cmcpf").value;
    let telefone = document.getElementById("telefonepf").value;
    let cep = document.getElementById("ceppf").value;
    let rua = document.getElementById("ruapf").value;
    let bairro = document.getElementById("bairropf").value;
    let teste = document.getElementById("cidadepf").value;
    let numero = document.getElementById("numeropf").value;
    let localdoponto = document.getElementById("localdoponto").value;
    let itinerario = document.getElementById("itinerario").value;
    let permcode = document.getElementById("permcodepf").value;
    let cnh = document.getElementById("cnhpf").value;
    let certpenal = document.getElementById("certpenalpf").value;
    let certmun = document.getElementById("certmunpf").value;
    let sanidade = document.getElementById("sanidadepf").value;
    let residencia = document.getElementById("residenciapf").value;
    let alvarapf = document.getElementById("cursopf").value;
    let curso = document.getElementById("alvarapf").value;
    let multaspf = document.getElementById("multaspf").value;
    document.getElementById("nome_msgpf").innerHTML = "";
    document.getElementById("email_msgpf").innerHTML = "";
    document.getElementById("cpf_msgpf").innerHTML = "";
    document.getElementById("tipo_codperm_msgpf").innerHTML = "";
    document.getElementById("cmc_msgpf").innerHTML = "";
    document.getElementById("telefone_msgpf").innerHTML = "";
    document.getElementById("cep_msgpf").innerHTML = "";
    document.getElementById("rua_msgpf").innerHTML = "";
    document.getElementById("bairro_msgpf").innerHTML = "";
    document.getElementById("cidade_msgpf").innerHTML = "";
    document.getElementById("num_msgpf").innerHTML = "";
    document.getElementById("localdoponto_msgpf").innerHTML = "";
    document.getElementById("itinerario_msgpf").innerHTML = "";
    /* document.getElementById("ponto_msgpf").innerHTML = ""; */
    document.getElementById("cnh_msgpf").innerHTML = "";
    document.getElementById("certpenal_msgpf").innerHTML = "";
    document.getElementById("certnum_msgpf").innerHTML = "";
    document.getElementById("sanidade_msgpf").innerHTML = "";
    /*  document.getElementById("inss_msgpf").innerHTML = ""; */
    document.getElementById("residencia_msgpf").innerHTML = "";
    document.getElementById("curso_msgpf").innerHTML = "";
    document.getElementById("alvara_msgpf").innerHTML = "";
    document.getElementById("negativamultaspf_msgpf").innerHTML = "";
    document.getElementById("info_msgpf").innerHTML = "";
    button.disabled = true;
    var cpff = $("#CPFpf").val();
    var cmcc = $("#cmcpf").val();
    var permcodepjj = $("#permcodepf").val();
    $.ajax({
      url: "../src/escolar/operador_analisapermpf.php",
      data: {
        cpf: cpff,
        cmc: cmcc,
        nperm: permcodepjj,
      },
      type: "post",
      success: function (result) {
        if (result == "cpfcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CNPJ Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "cmccadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CMC Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "npermcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "Numero de Permissionário Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (nome == "") {
          button.disabled = false;
          document.getElementById("nome_msgpf").innerHTML =
            "<b>É  necessario preencher com seu nome  <br></b>";
          document.getElementById("nomepf").focus();
          return false;
        } else {
          document.getElementById("nome_msgpf").innerHTML = "";
        }

        if (cpf == "") {
          button.disabled = false;
          document.getElementById("cpf_msgpf").innerHTML =
            "<b>É necessario preencher com seu documento  <br></b>";
          document.getElementById("CPFpf").focus();
          return false;
        } else {
          document.getElementById("cpf_msgpf").innerHTML = "";
        }
        if (email == "") {
          button.disabled = false;
          document.getElementById("email_msgpf").innerHTML =
            "<b>É necessario preencher com seu email  <br></b>";
          document.getElementById("emailpf").focus();
          return false;
        } else {
          document.getElementById("email_msgpf").innerHTML = "";
        }
        if (cmc == "") {
          button.disabled = false;
          document.getElementById("cmc_msgpf").innerHTML =
            "<b>É necessario preencher com seu CMC  <br></b>";
          document.getElementById("cmcpf").focus();
          return false;
        } else {
          document.getElementById("cmc_msgpf").innerHTML = "";
        }
        if (permcode == "") {
          button.disabled = false;
          document.getElementById("tipo_codperm_msgpf").innerHTML =
            "<b>É necessario preencher com seu código de permissionário  <br></b>";
          document.getElementById("permcodepf").focus();
          return false;
        } else {
          document.getElementById("tipo_codperm_msgpf").innerHTML = "";
        }
        if (telefone == "") {
          button.disabled = false;
          document.getElementById("telefone_msgpf").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefonepf").focus();
          return false;
        } else {
          document.getElementById("telefone_msgpf").innerHTML = "";
        }
        if (cep == "") {
          button.disabled = false;
          document.getElementById("cep_msgpf").innerHTML =
            "<b>É necessario preencher com seu CEP  <br></b>";
          document.getElementById("ceppf").focus();
          return false;
        } else {
          document.getElementById("cep_msgpf").innerHTML = "";
        }
        if (rua == "") {
          button.disabled = false;
          document.getElementById("rua_msgpf").innerHTML =
            "<b>É necessario preencher com sua rua  <br></b>";
          document.getElementById("ruapf").focus();
          return false;
        } else {
          document.getElementById("rua_msgpf").innerHTML = "";
        }
        if (bairro == "") {
          button.disabled = false;
          document.getElementById("bairro_msgpf").innerHTML =
            "<b>É necessario preencher com seu bairro  <br></b>";
          document.getElementById("bairropf").focus();
          return false;
        } else {
          document.getElementById("bairro_msgpf").innerHTML = "";
        }
        if (teste == "") {
          button.disabled = false;
          document.getElementById("cidade_msgpf").innerHTML =
            "<b>É necessario preencher com sua cidade  <br></b>";
          document.getElementById("cidadepf").focus();
          return false;
        } else {
          document.getElementById("cidade_msgpf").innerHTML = "";
        }
        if (numero == "") {
          button.disabled = false;
          document.getElementById("num_msgpf").innerHTML =
            "<b>É necessario preencher com o numero da sua casa  <br></b>";
          document.getElementById("numeropf").focus();
          return false;
        } else {
          document.getElementById("num_msgpf").innerHTML = "";
        }
        if (localdoponto == "") {
          button.disabled = false;
          document.getElementById("localdoponto_msgpf").innerHTML =
            "<b>É necessario preencher com os colégios  <br></b>";
          document.getElementById("localdoponto").focus();
          return false;
        } else {
          document.getElementById("num_msgpf").innerHTML = "";
        }
        if (itinerario == "") {
          button.disabled = false;
          document.getElementById("itinerario_msgpf").innerHTML =
            "<b>É necessario preencher com o seu itinerário  <br></b>";
          document.getElementById("itinerario").focus();
          return false;
        } else {
          document.getElementById("num_msgpf").innerHTML = "";
        }

        if (cnh == "") {
          button.disabled = false;
          document.getElementById("cnh_msgpf").innerHTML =
            "<b>É necessario enviar sua CNH!  <br></b>";
          document.getElementById("cnhdivpf").focus();
          return false;
        } else {
          document.getElementById("cnh_msgpf").innerHTML = "";
        }
        if (certpenal == "") {
          button.disabled = false;
          document.getElementById("certpenal_msgpf").innerHTML =
            "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
          document.getElementById("certpendivpf").focus();
          return false;
        } else {
          document.getElementById("certpenal_msgpf").innerHTML = "";
        }
        if (certmun == "") {
          button.disabled = false;
          document.getElementById("certnum_msgpf").innerHTML =
            "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
          document.getElementById("negmunidivpf").focus();
          return false;
        } else {
          document.getElementById("certnum_msgpf").innerHTML = "";
        }
        if (sanidade == "") {
          button.disabled = false;
          document.getElementById("sanidade_msgpf").innerHTML =
            "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
          document.getElementById("sanidadedivpf").focus();
          return false;
        } else {
          document.getElementById("sanidade_msgpf").innerHTML = "";
        }
        if (residencia == "") {
          button.disabled = false;
          document.getElementById("residencia_msgpf").innerHTML =
            "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
          document.getElementById("residenciadivpf").focus();
          return false;
        } else {
          document.getElementById("residencia_msgpf").innerHTML = "";
        }
        if (curso == "") {
          button.disabled = false;
          document.getElementById("curso_msgpf").innerHTML =
            "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
          document.getElementById("cursodivpf").focus();
          return false;
        } else {
          document.getElementById("curso_msgpf").innerHTML = "";
        }
        if (alvarapf == "") {
          button.disabled = false;
          document.getElementById("alvara_msgpf").innerHTML =
            "<b>É necessario enviar seu Alvará!  <br></b>";
          document.getElementById("alvara").focus();
          return false;
        } else {
          document.getElementById("alvara_msgpf").innerHTML = "";
        }
        if (multaspf == "") {
          button.disabled = false;
          document.getElementById("negativamultaspf_msgpf").innerHTML =
            "<b>É necessario enviar sua negativa de multas!  <br></b>";
          document.getElementById("multas").focus();
          return false;
        } else {
          document.getElementById("negativamultaspf_msgpf").innerHTML = "";
        }
        if (document.getElementById("scalespf").checked == false) {
          button.disabled = false;
          Swal.fire({
            title: "Confirme suas informações!",
            text: "Para prosseguir você deve assinalar o termo de compromisso!",
            icon: "error",
            confirmButtonText: "Ok",
          });
          document.getElementById("info_msgpf").innerHTML =
            "<b><br>Para prosseguir você precisa confirmar suas informações!  <br></b>";
          return false;
        } else {
          document.forms["cadastrar_pf"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });

    //check empty password field
  });
}); /*/*  */
/*--------------------------------------------------------------------------------------------- */

/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */
$(document).ready(function () {
  $("#cadastrar-cnpj").on("click", function () {
    let button = document.getElementById("cadastrar-cnpj");
    let nome = document.getElementById("nomepj").value;
    let cnpj = document.getElementById("CNPJ").value;
    /* let cnpj = document.forms["cadastrar_pj"]["CNPJ"].value; */
    let email = document.getElementById("emailpj").value;
    let cmc = document.getElementById("cmcpj").value;
    let telefone = document.getElementById("telefonepj").value;
    let permcode = document.getElementById("permcodepj").value;
    let cep = document.getElementById("ceppj").value;
    let rua = document.getElementById("ruapj").value;
    let bairro = document.getElementById("bairropj").value;
    let teste = document.getElementById("testepj").value;
    let numero = document.getElementById("numeropj").value;
    let pontopj = document.getElementById("pontopj").value;
    let itinerariopj = document.getElementById("itinerariopj").value;
    let alvarapj = document.getElementById("alvarapj").value;
    let negmunpj = document.getElementById("negmunpj").value;
    let negestpg = document.getElementById("negestpg").value;
    let negfedpj = document.getElementById("negfedpj").value;
    let neginsspj = document.getElementById("neginsspj").value;
    let negfgtspj = document.getElementById("negfgtspj").value;
    document.getElementById("nome_msgpj").innerHTML = "";
    document.getElementById("email_msgpj").innerHTML = "";
    document.getElementById("cnpj_msgpj").innerHTML = "";
    document.getElementById("tipo_codperm_msgpj").innerHTML = "";
    document.getElementById("cmc_msgpj").innerHTML = "";
    document.getElementById("telefone_msgpj").innerHTML = "";
    document.getElementById("cep_msgpj").innerHTML = "";
    document.getElementById("rua_msgpj").innerHTML = "";
    document.getElementById("bairro_msgpj").innerHTML = "";
    document.getElementById("cidade_msgpj").innerHTML = "";
    document.getElementById("numpj_msg").innerHTML = "";
    document.getElementById("alvarapj_msg").innerHTML = "";
    document.getElementById("negmunpj_msg").innerHTML = "";
    document.getElementById("negestpg_msg").innerHTML = "";
    document.getElementById("negfedpj_msg").innerHTML = "";
    document.getElementById("neginsspj_msg").innerHTML = "";
    document.getElementById("fgtspj_msg").innerHTML = "";
    document.getElementById("pontopj_msgpj").innerHTML = "";
    document.getElementById("itinerariopj_msgpj").innerHTML = "";
    var cnpjj = $("#CNPJ").val();
    var cmcc = $("#cmcpj").val();
    var permcodepjj = $("#permcodepj").val();
    $.ajax({
      url: "../src/escolar/operador_analisapermpj.php",
      data: {
        cnpj: cnpjj,
        cmc: cmcc,
        nperm: permcodepjj,
      },
      type: "post",
      success: function (result) {
        if (result == "cnpjcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CNPJ Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "cmccadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CMC Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "npermcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "Numero de Permissionário Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (nome == "") {
          button.disabled = false;
          document.getElementById("nome_msgpj").innerHTML =
            "<b>É  necessario preencher com seu nome  <br></b>";
          document.getElementById("nomepj").focus();
          return false;
        } else {
          document.getElementById("nome_msgpj").innerHTML = "";
        }
        if (email == "") {
          button.disabled = false;
          document.getElementById("email_msgpj").innerHTML =
            "<b>É necessario preencher com seu email  <br></b>";
          document.getElementById("emailpj").focus();
          return false;
        } else {
          document.getElementById("email_msgpj").innerHTML = "";
        }

        if (cnpj == "") {
          document.getElementById("cnpj_msgpj").innerHTML =
            "<b>É necessario preencher com seu documento  <br></b>";
          document.getElementById("CNPJ").focus();
          return false;
        } else {
          document.getElementById("cnpj_msgpj").innerHTML = "";
        }

        if (cmc == "") {
          document.getElementById("cmc_msgpj").innerHTML =
            "<b>É necessario preencher com seu CMC  <br></b>";
          document.getElementById("cmcpj").focus();
          return false;
        } else {
          document.getElementById("cmc_msgpj").innerHTML = "";
        }
        if (permcode == "") {
          document.getElementById("tipo_codperm_msgpj").innerHTML =
            "<b>É necessario preencher com seu código de permissionário  <br></b>";
          document.getElementById("permcodepj").focus();
          return false;
        } else {
          document.getElementById("tipo_codperm_msgpj").innerHTML = "";
        }
        if (telefone == "") {
          document.getElementById("telefone_msgpj").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefonepj").focus();
          return false;
        } else {
          document.getElementById("telefone_msgpj").innerHTML = "";
        }
        if (cep == "") {
          document.getElementById("cep_msgpj").innerHTML =
            "<b>É necessario preencher com seu CEP  <br></b>";
          document.getElementById("ceppj").focus();
          return false;
        } else {
          document.getElementById("cep_msgpj").innerHTML = "";
        }
        if (rua == "") {
          document.getElementById("rua_msgpj").innerHTML =
            "<b>É necessario preencher com sua rua  <br></b>";
          document.getElementById("ruapj").focus();
          return false;
        } else {
          document.getElementById("rua_msgpj").innerHTML = "";
        }
        if (bairro == "") {
          document.getElementById("bairro_msgpj").innerHTML =
            "<b>É necessario preencher com seu bairro  <br></b>";
          document.getElementById("bairropj").focus();
          return false;
        } else {
          document.getElementById("bairro_msgpj").innerHTML = "";
        }
        if (teste == "") {
          document.getElementById("cidade_msgpj").innerHTML =
            "<b>É necessario preencher com sua cidade  <br></b>";
          document.getElementById("testepj").focus();
          return false;
        } else {
          document.getElementById("cidade_msgpj").innerHTML = "";
        }

        if (numero == "") {
          document.getElementById("numpj_msg").innerHTML =
            "<b>É necessario preencher com o numero da sua casa  <br></b>";
          document.getElementById("numeropj").focus();
          return false;
        } else {
          document.getElementById("numpj_msg").innerHTML = "";
        }
        if (pontopj == "") {
          document.getElementById("pontopj_msgpj").innerHTML =
            "<b>É necessario preencher com o seu local do ponto/colegio!  <br></b>";
          document.getElementById("pontopj").focus();
          return false;
        } else {
          document.getElementById("pontopj_msgpj").innerHTML = "";
        }
        if (itinerariopj == "") {
          document.getElementById("itinerariopj_msgpj").innerHTML =
            "<b>É necessario preencher com o seu itinerário! <br></b>";
          document.getElementById("itinerariopj").focus();
          return false;
        } else {
          document.getElementById("itinerariopj_msgpj").innerHTML = "";
        }

        if (alvarapj == "") {
          document.getElementById("alvarapj_msg").innerHTML =
            "<b>É necessario enviar seu Alvara!  <br></b>";
          document.getElementById("alvarapjdiv").focus();
          return false;
        } else {
          document.getElementById("alvarapj_msg").innerHTML = "";
        }
        if (negmunpj == "") {
          document.getElementById("negmunpj_msg").innerHTML =
            "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
          document.getElementById("negmunpjdiv").focus();
          return false;
        } else {
          document.getElementById("negmunpj_msg").innerHTML = "";
        }
        if (negestpg == "") {
          document.getElementById("negestpg_msg").innerHTML =
            "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
          document.getElementById("negestpgdiv").focus();
          return false;
        } else {
          document.getElementById("negestpg_msg").innerHTML = "";
        }
        if (negfedpj == "") {
          document.getElementById("negfedpj_msg").innerHTML =
            "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
          document.getElementById("negfedpjediv").focus();
          return false;
        } else {
          document.getElementById("negfedpj_msg").innerHTML = "";
        }
        if (neginsspj == "") {
          document.getElementById("neginsspj_msg").innerHTML =
            "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
          document.getElementById("neginsspjdiv").focus();
          return false;
        } else {
          document.getElementById("neginsspj_msg").innerHTML = "";
        }
        if (negfgtspj == "") {
          document.getElementById("fgtspj_msg").innerHTML =
            "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
          document.getElementById("negfgtspjdiv").focus();
          return false;
        } else {
          document.getElementById("fgtspj_msg").innerHTML = "";
        }
        if (document.getElementById("scalespj").checked == false) {
          Swal.fire({
            title: "Confirme suas informações!",
            text: "Para prosseguir você deve assinalar o termo de compromisso!",
            icon: "error",
            confirmButtonText: "Ok",
          });
          document.getElementById("info_msgpf").innerHTML =
            "<b><br>Para prosseguir você precisa confirmar suas informações!  <br></b>";
          return false;
        } else {
          button.disabled = true;
          document.forms["cadastrar_pj"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });

    //check empty password field
  });
}); /*/*  */
/*--------------------------------------------------------------------------------------------- */
/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */
function validarmotorista() {
  /** Validação fieldset de "Informações Sobre a Origem da Viagem"*/
  let nome = document.forms["cadastrar_pf"]["nomepf"].value;
  let cpf = document.forms["cadastrar_pf"]["CPFpf"].value;
  /* let cnpj = document.forms["cadastrar_pf"]["CNPJ"].value; */
  let email = document.forms["cadastrar_pf"]["emailpf"].value;
  let cmc = document.forms["cadastrar_pf"]["cmcpf"].value;
  let telefone = document.forms["cadastrar_pf"]["telefonepf"].value;
  let cep = document.forms["cadastrar_pf"]["ceppf"].value;
  let rua = document.forms["cadastrar_pf"]["ruapf"].value;
  let bairro = document.forms["cadastrar_pf"]["bairropf"].value;
  let teste = document.forms["cadastrar_pf"]["cidadepf"].value;
  let numero = document.forms["cadastrar_pf"]["numeropf"].value;
  let localdoponto = document.forms["cadastrar_pf"]["localdoponto"].value;
  let itinerario = document.forms["cadastrar_pf"]["itinerario"].value;
  let permcode = document.forms["cadastrar_pf"]["permcodepf"].value;
  let cnh = document.forms["cadastrar_pf"]["cnh"].value;
  let certpenal = document.forms["cadastrar_pf"]["certpenal"].value;
  let certmun = document.forms["cadastrar_pf"]["certmun"].value;
  let sanidade = document.forms["cadastrar_pf"]["sanidade"].value;
  /* let quitacao = document.forms["cadastrar_pf"]["quitacao"].value; */
  /* let inss = document.forms["cadastrar_pf"]["inss"].value; */
  let residencia = document.forms["cadastrar_pf"]["residencia"].value;
  let curso = document.forms["cadastrar_pf"]["curso"].value;
  /*   let ponto = document.forms["cadastrar_pf"]["tipodocumento"].value; */
  document.getElementById("nome_msgpf").innerHTML = "";
  document.getElementById("email_msgpf").innerHTML = "";
  document.getElementById("cpf_msgpf").innerHTML = "";
  document.getElementById("tipo_codperm_msgpf").innerHTML = "";
  document.getElementById("cmc_msgpf").innerHTML = "";
  document.getElementById("telefone_msgpf").innerHTML = "";
  document.getElementById("cep_msgpf").innerHTML = "";
  document.getElementById("rua_msgpf").innerHTML = "";
  document.getElementById("bairro_msgpf").innerHTML = "";
  document.getElementById("cidade_msgpf").innerHTML = "";
  document.getElementById("num_msgpf").innerHTML = "";
  document.getElementById("localdoponto_msgpf").innerHTML = "";
  document.getElementById("itinerario_msgpf").innerHTML = "";
  /* document.getElementById("ponto_msgpf").innerHTML = ""; */
  document.getElementById("cnh_msgpf").innerHTML = "";
  document.getElementById("certpenal_msgpf").innerHTML = "";
  document.getElementById("certnum_msgpf").innerHTML = "";
  document.getElementById("sanidade_msgpf").innerHTML = "";
  /*  document.getElementById("inss_msgpf").innerHTML = ""; */
  document.getElementById("residencia_msgpf").innerHTML = "";
  document.getElementById("curso_msgpf").innerHTML = "";
  document.getElementById("info_msgpf").innerHTML = "";

  if (nome == "") {
    document.getElementById("nome_msgpf").innerHTML =
      "<b>É  necessario preencher com seu nome  <br></b>";
    document.getElementById("nomepf").focus();
    return false;
  } else {
    document.getElementById("nome_msgpf").innerHTML = "";
  }

  if (cpf == "") {
    document.getElementById("cpf_msgpf").innerHTML =
      "<b>É necessario preencher com seu documento  <br></b>";
    document.getElementById("CPFpf").focus();
    return false;
  } else {
    document.getElementById("cpf_msgpf").innerHTML = "";
  }
  if (email == "") {
    document.getElementById("email_msgpf").innerHTML =
      "<b>É necessario preencher com seu email  <br></b>";
    document.getElementById("emailpf").focus();
    return false;
  } else {
    document.getElementById("email_msgpf").innerHTML = "";
  }
  if (cmc == "") {
    document.getElementById("cmc_msgpf").innerHTML =
      "<b>É necessario preencher com seu CMC  <br></b>";
    document.getElementById("cmcpf").focus();
    return false;
  } else {
    document.getElementById("cmc_msgpf").innerHTML = "";
  }
  if (permcode == "") {
    document.getElementById("tipo_codperm_msgpf").innerHTML =
      "<b>É necessario preencher com seu código de permissionário  <br></b>";
    document.getElementById("permcodepf").focus();
    return false;
  } else {
    document.getElementById("tipo_codperm_msgpf").innerHTML = "";
  }
  if (telefone == "") {
    document.getElementById("telefone_msgpf").innerHTML =
      "<b>É necessario preencher com seu telefone  <br></b>";
    document.getElementById("telefonepf").focus();
    return false;
  } else {
    document.getElementById("telefone_msgpf").innerHTML = "";
  }
  if (cep == "") {
    document.getElementById("cep_msgpf").innerHTML =
      "<b>É necessario preencher com seu CEP  <br></b>";
    document.getElementById("ceppf").focus();
    return false;
  } else {
    document.getElementById("cep_msgpf").innerHTML = "";
  }
  if (rua == "") {
    document.getElementById("rua_msgpf").innerHTML =
      "<b>É necessario preencher com sua rua  <br></b>";
    document.getElementById("ruapf").focus();
    return false;
  } else {
    document.getElementById("rua_msgpf").innerHTML = "";
  }
  if (bairro == "") {
    document.getElementById("bairro_msgpf").innerHTML =
      "<b>É necessario preencher com seu bairro  <br></b>";
    document.getElementById("bairropf").focus();
    return false;
  } else {
    document.getElementById("bairro_msgpf").innerHTML = "";
  }
  if (teste == "") {
    document.getElementById("cidade_msgpf").innerHTML =
      "<b>É necessario preencher com sua cidade  <br></b>";
    document.getElementById("cidadepf").focus();
    return false;
  } else {
    document.getElementById("cidade_msgpf").innerHTML = "";
  }
  if (numero == "") {
    document.getElementById("num_msgpf").innerHTML =
      "<b>É necessario preencher com o numero da sua casa  <br></b>";
    document.getElementById("numeropf").focus();
    return false;
  } else {
    document.getElementById("num_msgpf").innerHTML = "";
  }
  if (localdoponto == "") {
    document.getElementById("localdoponto_msgpf").innerHTML =
      "<b>É necessario preencher com os colégios  <br></b>";
    document.getElementById("localdoponto").focus();
    return false;
  } else {
    document.getElementById("num_msgpf").innerHTML = "";
  }
  if (itinerario == "") {
    document.getElementById("itinerario_msgpf").innerHTML =
      "<b>É necessario preencher com o seu itinerário  <br></b>";
    document.getElementById("itinerario").focus();
    return false;
  } else {
    document.getElementById("num_msgpf").innerHTML = "";
  }

  if (cnh == "") {
    document.getElementById("cnh_msgpf").innerHTML =
      "<b>É necessario enviar sua CNH!  <br></b>";
    document.getElementById("cnhdivpf").focus();
    return false;
  } else {
    document.getElementById("cnh_msgpf").innerHTML = "";
  }
  if (certpenal == "") {
    document.getElementById("certpenal_msgpf").innerHTML =
      "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
    document.getElementById("certpendivpf").focus();
    return false;
  } else {
    document.getElementById("certpenal_msgpf").innerHTML = "";
  }
  if (certmun == "") {
    document.getElementById("certnum_msgpf").innerHTML =
      "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
    document.getElementById("negmunidivpf").focus();
    return false;
  } else {
    document.getElementById("certnum_msgpf").innerHTML = "";
  }
  if (sanidade == "") {
    document.getElementById("sanidade_msgpf").innerHTML =
      "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
    document.getElementById("sanidadedivpf").focus();
    return false;
  } else {
    document.getElementById("sanidade_msgpf").innerHTML = "";
  }
  /* if (quitacao == "") {
      document.getElementById("quitacao_msgpf").innerHTML =
        "<b>É necessario enviar seu atestado de quitação sindical!  <br></b>";
      document.getElementById("quitacaodivpf").focus();
      return false;
    } else {
      document.getElementById("quitacao_msgpf").innerHTML = "";
    } */
  if (residencia == "") {
    document.getElementById("residencia_msgpf").innerHTML =
      "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
    document.getElementById("residenciadivpf").focus();
    return false;
  } else {
    document.getElementById("residencia_msgpf").innerHTML = "";
  }
  if (curso == "") {
    document.getElementById("curso_msgpf").innerHTML =
      "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
    document.getElementById("cursodivpf").focus();
    return false;
  } else {
    document.getElementById("curso_msgpf").innerHTML = "";
  }
  if (document.getElementById("scalespf").checked == false) {
    Swal.fire({
      title: "Confirme suas informações!",
      text: "Para prosseguir você deve assinalar o termo de compromisso!",
      icon: "error",
      confirmButtonText: "Ok",
    });
    document.getElementById("info_msgpf").innerHTML =
      "<b><br>Para prosseguir você precisa confirmar suas informações!  <br></b>";
    return false;
  }
}
/*--------------------------------------------------------------------------------------------- */
/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */
function validarmotoristapj() {
  /** Validação fieldset de "Informações Sobre a Origem da Viagem"*/
  let nome = document.forms["cadastrar_pj"]["nomepj"].value;
  let cnpj = document.forms["cadastrar_pj"]["cnpj"].value;
  /* let cnpj = document.forms["cadastrar_pj"]["CNPJ"].value; */
  let email = document.forms["cadastrar_pj"]["emailpj"].value;
  let cmc = document.forms["cadastrar_pj"]["cmcpj"].value;
  let telefone = document.forms["cadastrar_pj"]["telefonepj"].value;
  let cep = document.forms["cadastrar_pj"]["ceppj"].value;
  let rua = document.forms["cadastrar_pj"]["ruapj"].value;
  let bairro = document.forms["cadastrar_pj"]["bairropj"].value;
  let teste = document.forms["cadastrar_pj"]["cidadepj"].value;
  let numero = document.forms["cadastrar_pj"]["numeropj"].value;
  let pontopj = document.forms["cadastrar_pj"]["pontopj"].value;
  let itinerariopj = document.forms["cadastrar_pj"]["itinerariopj"].value;
  let permcode = document.forms["cadastrar_pj"]["permcodepj"].value;
  let alvarapj = document.forms["cadastrar_pj"]["alvarapj"].value;
  let negmunpj = document.forms["cadastrar_pj"]["negmunpj"].value;
  let negestpg = document.forms["cadastrar_pj"]["negestpg"].value;
  let negfedpj = document.forms["cadastrar_pj"]["negfedpj"].value;
  let neginsspj = document.forms["cadastrar_pj"]["neginsspj"].value;
  let negfgtspj = document.forms["cadastrar_pj"]["negfgtspj"].value;

  document.getElementById("nome_msgpj").innerHTML = "";
  document.getElementById("email_msgpj").innerHTML = "";
  document.getElementById("cnpj_msgpj").innerHTML = "";
  document.getElementById("tipo_codperm_msgpj").innerHTML = "";
  document.getElementById("cmc_msgpj").innerHTML = "";
  document.getElementById("telefone_msgpj").innerHTML = "";
  document.getElementById("cep_msgpj").innerHTML = "";
  document.getElementById("rua_msgpj").innerHTML = "";
  document.getElementById("bairro_msgpj").innerHTML = "";
  document.getElementById("cidade_msgpj").innerHTML = "";
  document.getElementById("numpj_msg").innerHTML = "";
  document.getElementById("alvarapj_msg").innerHTML = "";
  document.getElementById("negmunpj_msg").innerHTML = "";
  document.getElementById("negestpg_msg").innerHTML = "";
  document.getElementById("negfedpj_msg").innerHTML = "";
  document.getElementById("neginsspj_msg").innerHTML = "";
  document.getElementById("fgtspj_msg").innerHTML = "";
  document.getElementById("pontopj_msgpj").innerHTML = "";
  document.getElementById("itinerariopj_msgpj").innerHTML = "";

  if (nome == "") {
    document.getElementById("nome_msgpj").innerHTML =
      "<b>É  necessario preencher com seu nome  <br></b>";
    document.getElementById("nomepj").focus();
    return false;
  } else {
    document.getElementById("nome_msgpj").innerHTML = "";
  }
  if (email == "") {
    document.getElementById("email_msgpj").innerHTML =
      "<b>É necessario preencher com seu email  <br></b>";
    document.getElementById("emailpj").focus();
    return false;
  } else {
    document.getElementById("email_msgpj").innerHTML = "";
  }

  if (cnpj == "") {
    document.getElementById("cnpj_msgpj").innerHTML =
      "<b>É necessario preencher com seu documento  <br></b>";
    document.getElementById("CNPJ").focus();
    return false;
  } else {
    document.getElementById("cnpj_msgpj").innerHTML = "";
  }

  if (cmc == "") {
    document.getElementById("cmc_msgpj").innerHTML =
      "<b>É necessario preencher com seu CMC  <br></b>";
    document.getElementById("cmcpj").focus();
    return false;
  } else {
    document.getElementById("cmc_msgpj").innerHTML = "";
  }
  if (permcode == "") {
    document.getElementById("tipo_codperm_msgpj").innerHTML =
      "<b>É necessario preencher com seu código de permissionário  <br></b>";
    document.getElementById("permcodepj").focus();
    return false;
  } else {
    document.getElementById("tipo_codperm_msgpj").innerHTML = "";
  }
  if (telefone == "") {
    document.getElementById("telefone_msgpj").innerHTML =
      "<b>É necessario preencher com seu telefone  <br></b>";
    document.getElementById("telefonepj").focus();
    return false;
  } else {
    document.getElementById("telefone_msgpj").innerHTML = "";
  }
  if (cep == "") {
    document.getElementById("cep_msgpj").innerHTML =
      "<b>É necessario preencher com seu CEP  <br></b>";
    document.getElementById("ceppj").focus();
    return false;
  } else {
    document.getElementById("cep_msgpj").innerHTML = "";
  }
  if (rua == "") {
    document.getElementById("rua_msgpj").innerHTML =
      "<b>É necessario preencher com sua rua  <br></b>";
    document.getElementById("ruapj").focus();
    return false;
  } else {
    document.getElementById("rua_msgpj").innerHTML = "";
  }
  if (bairro == "") {
    document.getElementById("bairro_msgpj").innerHTML =
      "<b>É necessario preencher com seu bairro  <br></b>";
    document.getElementById("bairropj").focus();
    return false;
  } else {
    document.getElementById("bairro_msgpj").innerHTML = "";
  }
  if (teste == "") {
    document.getElementById("cidade_msgpj").innerHTML =
      "<b>É necessario preencher com sua cidade  <br></b>";
    document.getElementById("testepj").focus();
    return false;
  } else {
    document.getElementById("cidade_msgpj").innerHTML = "";
  }

  if (numero == "") {
    document.getElementById("numpj_msg").innerHTML =
      "<b>É necessario preencher com o numero da sua casa  <br></b>";
    document.getElementById("numeropj").focus();
    return false;
  } else {
    document.getElementById("numpj_msg").innerHTML = "";
  }
  if (pontopj == "") {
    document.getElementById("pontopj_msgpj").innerHTML =
      "<b>É necessario preencher com o seu local do ponto/colegio!  <br></b>";
    document.getElementById("pontopj").focus();
    return false;
  } else {
    document.getElementById("pontopj_msgpj").innerHTML = "";
  }
  if (itinerariopj == "") {
    document.getElementById("itinerariopj_msgpj").innerHTML =
      "<b>É necessario preencher com o seu itinerário! <br></b>";
    document.getElementById("itinerariopj").focus();
    return false;
  } else {
    document.getElementById("itinerariopj_msgpj").innerHTML = "";
  }

  if (alvarapj == "") {
    document.getElementById("alvarapj_msg").innerHTML =
      "<b>É necessario enviar seu Alvara!  <br></b>";
    document.getElementById("alvarapjdiv").focus();
    return false;
  } else {
    document.getElementById("alvarapj_msg").innerHTML = "";
  }
  if (negmunpj == "") {
    document.getElementById("negmunpj_msg").innerHTML =
      "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
    document.getElementById("negmunpjdiv").focus();
    return false;
  } else {
    document.getElementById("negmunpj_msg").innerHTML = "";
  }
  if (negestpg == "") {
    document.getElementById("negestpg_msg").innerHTML =
      "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
    document.getElementById("negestpgdiv").focus();
    return false;
  } else {
    document.getElementById("negestpg_msg").innerHTML = "";
  }
  if (negfedpj == "") {
    document.getElementById("negfedpj_msg").innerHTML =
      "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
    document.getElementById("negfedpjediv").focus();
    return false;
  } else {
    document.getElementById("negfedpj_msg").innerHTML = "";
  }
  if (neginsspj == "") {
    document.getElementById("neginsspj_msg").innerHTML =
      "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
    document.getElementById("neginsspjdiv").focus();
    return false;
  } else {
    document.getElementById("neginsspj_msg").innerHTML = "";
  }
  if (negfgtspj == "") {
    document.getElementById("fgtspj_msg").innerHTML =
      "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
    document.getElementById("negfgtspjdiv").focus();
    return false;
  } else {
    document.getElementById("fgtspj_msg").innerHTML = "";
  }
  if (document.getElementById("scalespj").checked == false) {
    Swal.fire({
      title: "Confirme suas informações!",
      text: "Para prosseguir você deve assinalar o termo de compromisso!",
      icon: "error",
      confirmButtonText: "Ok",
    });
    document.getElementById("info_msgpf").innerHTML =
      "<b><br>Para prosseguir você precisa confirmar suas informações!  <br></b>";
    return false;
  }
}
/*--------------------------------------------------------------------------------------------- */
/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */
$(document).ready(function () {
  $("#cadastrar-cpfmei").on("click", function () {
    /** Validação fieldset de "Informações Sobre a Origem da Viagem"*/
    let button = document.getElementById("cadastrar-cpfmei");
    let nome = document.getElementById("nomepfmei").value;
    let cpf = document.getElementById("CPFpf").value;
    /* let cnpj = document.forms["cadastrar_pf"]["CNPJ"].value; */
    let email = document.getElementById("emailpfmei").value;
    let cmc = document.getElementById("cmcpfmei").value;
    let telefone = document.getElementById("telefonepfmei").value;
    let cep = document.getElementById("ceppfmei").value;
    let rua = document.getElementById("ruapfmei").value;
    let bairro = document.getElementById("bairropfmei").value;
    let teste = document.getElementById("cidadepfmei").value;
    let numero = document.getElementById("numeropfmei").value;
    let localdoponto = document.getElementById("localdopontomei").value;
    let itinerario = document.getElementById("itinerariomei").value;
    let permcode = document.getElementById("permcodepfmei").value;
    let cnh = document.getElementById("cnhpfmei").value;
    let certpenal = document.getElementById("certpenalpfmei").value;
    let certmun = document.getElementById("certmunpfmei").value;
    let sanidade = document.getElementById("sanidadepfmei").value;
    let residencia = document.getElementById("residenciapfmei").value;
    let alvarapfmei = document.getElementById("alvarapfmei").value;
    let curso = document.getElementById("cursopfmei").value;
    let multaspfmei = document.getElementById("multaspfmei").value;
    document.getElementById("nome_msgpfmei").innerHTML = "";
    document.getElementById("email_msgpfmei").innerHTML = "";
    document.getElementById("cpf_msgpfmei").innerHTML = "";
    document.getElementById("tipo_codperm_msgpfmei").innerHTML = "";
    document.getElementById("cmc_msgpfmei").innerHTML = "";
    document.getElementById("telefone_msgpfmei").innerHTML = "";
    document.getElementById("cep_msgpfmei").innerHTML = "";
    document.getElementById("rua_msgpfmei").innerHTML = "";
    document.getElementById("bairro_msgpfmei").innerHTML = "";
    document.getElementById("cidade_msgpfmei").innerHTML = "";
    document.getElementById("num_msgpfmei").innerHTML = "";
    document.getElementById("localdoponto_msgpfmei").innerHTML = "";
    document.getElementById("itinerario_msgpfmei").innerHTML = "";
    /* document.getElementById("ponto_msgpfmei").innerHTML = ""; */
    document.getElementById("cnh_msgpfmei").innerHTML = "";
    document.getElementById("certpenal_msgpfmei").innerHTML = "";
    document.getElementById("certnum_msgpfmei").innerHTML = "";
    document.getElementById("sanidade_msgpfmei").innerHTML = "";
    /*  document.getElementById("inss_msgpfmei").innerHTML = ""; */
    document.getElementById("residencia_msgpfmei").innerHTML = "";
    document.getElementById("curso_msgpfmei").innerHTML = "";
    document.getElementById("alvara_msgpfmei").innerHTML = "";
    document.getElementById("negativamultaspfmei_msgpfmei").innerHTML = "";
    document.getElementById("info_msgpfmei").innerHTML = "";
    button.disabled = true;
    var cpff = $("#CPFpfmei").val();
    var cmcc = $("#cmcpfmei").val();
    var permcodepjj = $("#permcodepfmei").val();
    $.ajax({
      url: "../src/escolar/operador_analisapermpf.php",
      data: {
        cpf: cpff,
        cmc: cmcc,
        nperm: permcodepjj,
      },
      type: "post",
      success: function (result) {
        if (result == "cpfcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CNPJ Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "cmccadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "CMC Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "npermcadastrado") {
          button.disabled = false;
          Swal.fire({
            title: "Erro!",
            text: "Numero de Permissionário Cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (nome == "") {
          button.disabled = false;
          document.getElementById("nome_msgpfmei").innerHTML =
            "<b>É  necessario preencher com seu nome  <br></b>";
          document.getElementById("nomepfmei").focus();
          return false;
        } else {
          document.getElementById("nome_msgpfmei").innerHTML = "";
        }

        if (cpf == "") {
          button.disabled = false;
          document.getElementById("cpf_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu documento  <br></b>";
          document.getElementById("CPFpfmei").focus();
          return false;
        } else {
          document.getElementById("cpf_msgpfmei").innerHTML = "";
        }
        if (email == "") {
          button.disabled = false;
          document.getElementById("email_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu email  <br></b>";
          document.getElementById("emailpfmei").focus();
          return false;
        } else {
          document.getElementById("email_msgpfmei").innerHTML = "";
        }
        if (cmc == "") {
          button.disabled = false;
          document.getElementById("cmc_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu CMC  <br></b>";
          document.getElementById("cmcpfmei").focus();
          return false;
        } else {
          document.getElementById("cmc_msgpfmei").innerHTML = "";
        }
        if (permcode == "") {
          button.disabled = false;
          document.getElementById("tipo_codperm_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu código de permissionário  <br></b>";
          document.getElementById("permcodepfmei").focus();
          return false;
        } else {
          document.getElementById("tipo_codperm_msgpfmei").innerHTML = "";
        }
        if (telefone == "") {
          button.disabled = false;
          document.getElementById("telefone_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefonepfmei").focus();
          return false;
        } else {
          document.getElementById("telefone_msgpfmei").innerHTML = "";
        }
        if (cep == "") {
          button.disabled = false;
          document.getElementById("cep_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu CEP  <br></b>";
          document.getElementById("ceppfmei").focus();
          return false;
        } else {
          document.getElementById("cep_msgpfmei").innerHTML = "";
        }
        if (rua == "") {
          button.disabled = false;
          document.getElementById("rua_msgpfmei").innerHTML =
            "<b>É necessario preencher com sua rua  <br></b>";
          document.getElementById("ruapfmei").focus();
          return false;
        } else {
          document.getElementById("rua_msgpfmei").innerHTML = "";
        }
        if (bairro == "") {
          button.disabled = false;
          document.getElementById("bairro_msgpfmei").innerHTML =
            "<b>É necessario preencher com seu bairro  <br></b>";
          document.getElementById("bairropfmei").focus();
          return false;
        } else {
          document.getElementById("bairro_msgpfmei").innerHTML = "";
        }
        if (teste == "") {
          button.disabled = false;
          document.getElementById("cidade_msgpfmei").innerHTML =
            "<b>É necessario preencher com sua cidade  <br></b>";
          document.getElementById("cidadepfmei").focus();
          return false;
        } else {
          document.getElementById("cidade_msgpfmei").innerHTML = "";
        }
        if (numero == "") {
          button.disabled = false;
          document.getElementById("num_msgpfmei").innerHTML =
            "<b>É necessario preencher com o numero da sua casa  <br></b>";
          document.getElementById("numeropfmei").focus();
          return false;
        } else {
          document.getElementById("num_msgpfmei").innerHTML = "";
        }
        if (localdoponto == "") {
          button.disabled = false;
          document.getElementById("localdoponto_msgpfmei").innerHTML =
            "<b>É necessario preencher com os colégios  <br></b>";
          document.getElementById("localdopontomei").focus();
          return false;
        } else {
          document.getElementById("num_msgpfmei").innerHTML = "";
        }
        if (itinerario == "") {
          button.disabled = false;
          document.getElementById("itinerario_msgpfmei").innerHTML =
            "<b>É necessario preencher com o seu itinerário  <br></b>";
          document.getElementById("itinerariomei").focus();
          return false;
        } else {
          document.getElementById("num_msgpfmei").innerHTML = "";
        }

        if (cnh == "") {
          button.disabled = false;
          document.getElementById("cnh_msgpfmei").innerHTML =
            "<b>É necessario enviar sua CNH!  <br></b>";
          document.getElementById("cnhdivpfmei").focus();
          return false;
        } else {
          document.getElementById("cnh_msgpfmei").innerHTML = "";
        }
        if (certpenal == "") {
          button.disabled = false;
          document.getElementById("certpenal_msgpfmei").innerHTML =
            "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
          document.getElementById("certpendivpfmei").focus();
          return false;
        } else {
          document.getElementById("certpenal_msgpfmei").innerHTML = "";
        }
        if (certmun == "") {
          button.disabled = false;
          document.getElementById("certnum_msgpfmei").innerHTML =
            "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
          document.getElementById("negmunidivpfmei").focus();
          return false;
        } else {
          document.getElementById("certnum_msgpfmei").innerHTML = "";
        }
        if (sanidade == "") {
          button.disabled = false;
          document.getElementById("sanidade_msgpfmei").innerHTML =
            "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
          document.getElementById("sanidadedivpfmei").focus();
          return false;
        } else {
          document.getElementById("sanidade_msgpfmei").innerHTML = "";
        }
        if (residencia == "") {
          button.disabled = false;
          document.getElementById("residencia_msgpfmei").innerHTML =
            "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
          document.getElementById("residenciadivpfmei").focus();
          return false;
        } else {
          document.getElementById("residencia_msgpfmei").innerHTML = "";
        }
        if (curso == "") {
          button.disabled = false;
          document.getElementById("curso_msgpfmei").innerHTML =
            "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
          document.getElementById("cursodivpfmei").focus();
          return false;
        } else {
          document.getElementById("curso_msgpfmei").innerHTML = "";
        }
        if (alvarapfmei == "") {
          button.disabled = false;
          document.getElementById("alvara_msgpfmei").innerHTML =
            "<b>É necessario enviar seu Alvará!  <br></b>";
          document.getElementById("alvara").focus();
          return false;
        } else {
          document.getElementById("alvara_msgpfmei").innerHTML = "";
        }
        if (multaspfmei == "") {
          button.disabled = false;
          document.getElementById("negativamultaspfmei_msgpfmei").innerHTML =
            "<b>É necessario enviar sua negativa de multas!  <br></b>";
          document.getElementById("multas").focus();
          return false;
        } else {
          document.getElementById("negativamultaspfmei_msgpfmei").innerHTML =
            "";
        }
        if (document.getElementById("scalespfmei").checked == false) {
          button.disabled = false;
          Swal.fire({
            title: "Confirme suas informações!",
            text: "Para prosseguir você deve assinalar o termo de compromisso!",
            icon: "error",
            confirmButtonText: "Ok",
          });
          document.getElementById("info_msgpfmei").innerHTML =
            "<b><br>Para prosseguir você precisa confirmar suas informações!  <br></b>";
          return false;
        } else {
          document.forms["cadastrar_pfmei"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });

    //check empty password field
  });
}); /*/* 
//*/
/*------------------------------------------------------------------------------------------------------------------------------------- */
