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

cpfCheckmot = function (el) {
  console.log($("#cpfResponsemott").css("color") == "green");
  document.getElementById("cpfResponsemot").innerHTML = is_cpf(el.value)
    ? '<i class="fas fa-check" id="cpfResponsemott" style="color:green;font-size:17px"></i>'
    : '<i class="fas fa-times" style="color:red;font-size:17px"></i>';
  if (el.value == "") document.getElementById("cpfResponse").innerHTML = "";
};
cpfCheckmoni = function (el) {
  document.getElementById("cpfResponsemoni").innerHTML = is_cpf(el.value)
    ? '<i class="fas fa-check" style="color:green;font-size:17px"></i>'
    : '<i class="fas fa-times" style="color:red;font-size:17px"></i>';
  if (el.value == "") document.getElementById("cpfResponse").innerHTML = "";
};
const validateEmail = (email) => {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};

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

jQuery("input.telefone")
  .mask("(99) 9999-9999?9")
  .focusout(function (event) {
    var target, phone, element;
    target = event.currentTarget ? event.currentTarget : event.srcElement;
    phone = target.value.replace(/\D/g, "");
    element = $(target);
    element.unmask();
    if (phone.length > 10) {
      element.mask("(99) 99999-999?9");
    } else {
      element.mask("(99) 9999-9999?9");
    }
  });

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

function limpa_formulário_ceppj() {
  //Limpa valores do formulário de cep.
  document.getElementById("ruamonitor").value = "";
  document.getElementById("bairromonitor").value = "";
  document.getElementById("cidademonitor").value = "";
}

function meu_callbackpj(conteudo) {
  if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById("ruamonitor").value = conteudo.logradouro;
    document.getElementById("bairromonitor").value = conteudo.bairro;
    document.getElementById("cidademonitor").value = conteudo.localidade;
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
      document.getElementById("ruamonitor").value = "...";
      document.getElementById("bairromonitor").value = "...";
      document.getElementById("cidademonitor").value = "...";

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
$(document).ready(function () {
  $("#cadastrar-monitor").on("click", function () {
    button = document.getElementById("cadastrar-monitor");
    let nomemonitor = document.getElementById("nomemonitor").value;
    let cpfmonitor = document.getElementById("cpfmonitor").value;
    let telefonemonitor = document.getElementById("telefonemonitor").value;
    let cepmonitor = document.getElementById("cepmonitor").value;
    let ruamonitor = document.getElementById("ruamonitor").value;
    let bairromonitor = document.getElementById("bairromonitor").value;
    let testemonitor = document.getElementById("cidademonitor").value;
    let numeromonitor = document.getElementById("numeropj").value;
    let cursomonitor = document.getElementById("cursomonitor").value;
    let residenciamonitor = document.getElementById("residenciamonitor").value;
    let cpfrgmonitor = document.getElementById("cpfrgmonitor").value;
    let penalmonitor = document.getElementById("penalmonitor").value;
    let sanidademonitor = document.getElementById("sanidademonitor").value;
    document.getElementById("nome_msgpj").innerHTML = "";
    document.getElementById("cnpj_msgpj").innerHTML = "";
    document.getElementById("telefone_msgpj").innerHTML = "";
    document.getElementById("cep_msgpj").innerHTML = "";
    document.getElementById("rua_msgpj").innerHTML = "";
    document.getElementById("bairro_msgpj").innerHTML = "";
    document.getElementById("cidade_msgpj").innerHTML = "";
    document.getElementById("numpj_msg").innerHTML = "";
    document.getElementById("alvarapj_msg").innerHTML = "";
    document.getElementById("negmunpj_msg").innerHTML = "";
    document.getElementById("negestpg_msg").innerHTML = "";
    document.getElementById("certpenalmoni_msgpf").innerHTML = "";
    document.getElementById("sanidademoni_msgpf").innerHTML = "";

    var tipo = $("#tipocadastromoni").val();
    var cpff = $("#cpfmonitor").val();
    $.ajax({
      url: "../src/escolar/operador_analisamonitor.php",
      data: {
        cpf: cpff,
        tipo: tipo,
      },
      type: "post",
      success: function (result) {
        if (result == "cpfcadastrado") {
          Swal.fire({
            title: "Erro!",
            text: "CPF ja Cadastrado como monitor!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (cpfmonitor == "") {
          document.getElementById("cnpj_msgpj").innerHTML =
            "<b>É necessario preencher com seu documento  <br></b>";
          document.getElementById("cpfmonitor").focus();
          return false;
        } else {
          document.getElementById("cnpj_msgpj").innerHTML = "";
        }
        if (is_cpf(cpfmonitor) == false) {
          document.getElementById("cnpj_msgpj").innerHTML =
            "<b>É necessario preencher com seu documento corretamente  <br></b>";
          document.getElementById("cpfmonitor").focus();
          return false;
        } else {
          document.getElementById("cnpj_msgpj").innerHTML = "";
        }
        if (nomemonitor == "") {
          document.getElementById("nome_msgpj").innerHTML =
            "<b>É  necessario preencher com seu nome  <br></b>";
          document.getElementById("nomemonitor").focus();
          return false;
        } else {
          document.getElementById("nome_msgpj").innerHTML = "";
        }
        if (telefonemonitor == "") {
          document.getElementById("telefone_msgpj").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefonemonitor").focus();
          return false;
        } else {
          document.getElementById("telefone_msgpj").innerHTML = "";
        }
        if (cepmonitor == "") {
          document.getElementById("cep_msgpj").innerHTML =
            "<b>É necessario preencher com seu CEP  <br></b>";
          document.getElementById("cepmonitor").focus();
          return false;
        } else {
          document.getElementById("cep_msgpj").innerHTML = "";
        }
        if (ruamonitor == "") {
          document.getElementById("rua_msgpj").innerHTML =
            "<b>É necessario preencher com sua rua  <br></b>";
          document.getElementById("ruapf").focus();
          return false;
        } else {
          document.getElementById("rua_msgpj").innerHTML = "";
        }
        if (bairromonitor == "") {
          document.getElementById("bairro_msgpj").innerHTML =
            "<b>É necessario preencher com seu bairro  <br></b>";
          document.getElementById("bairropf").focus();
          return false;
        } else {
          document.getElementById("bairro_msgpj").innerHTML = "";
        }
        if (testemonitor == "") {
          document.getElementById("cidade_msgpj").innerHTML =
            "<b>É necessario preencher com sua cidade  <br></b>";
          document.getElementById("cidadepf").focus();
          return false;
        } else {
          document.getElementById("cidade_msgpj").innerHTML = "";
        }
        if (numeromonitor == "") {
          document.getElementById("numpj_msg").innerHTML =
            "<b>É necessario preencher com o numero da sua casa  <br></b>";
          document.getElementById("numeropf").focus();
          return false;
        } else {
          document.getElementById("numpj_msg").innerHTML = "";
        }

        if (cpfrgmonitor == "") {
          document.getElementById("alvarapj_msg").innerHTML =
            "<b>É necessario enviar seu CPF OU RG  <br></b>";
          document.getElementById("alvarapjdiv").focus();
          return false;
        } else {
          document.getElementById("alvarapj_msg").innerHTML = "";
        }
        if (cursomonitor == "") {
          document.getElementById("negmunpj_msg").innerHTML =
            "<b>É necessario enviar seu curso de monitor!<br></b>";
          document.getElementById("negmunpjdiv").focus();
          return false;
        } else {
          document.getElementById("negmunpj_msg").innerHTML = "";
        }
        if (residenciamonitor == "") {
          document.getElementById("negestpg_msg").innerHTML =
            "<b>É necessario enviar seu comprovante de residência   <br></b>";
          document.getElementById("negestpgdiv").focus();
          return false;
        } else {
          document.getElementById("negestpg_msg").innerHTML = "";
        }
        if (sanidademonitor == "") {
          document.getElementById("sanidademoni_msgpf").innerHTML =
            "<b>É necessario enviar seu comprovante de residência   <br></b>";
          document.getElementById("sanidadendivmoni").focus();
          return false;
        } else {
          document.getElementById("sanidademoni_msgpf").innerHTML = "";
        }
        if (penalmonitor == "") {
          document.getElementById("certpenalmoni_msgpf").innerHTML =
            "<b>É necessário enviar seu certificado de negativa penal   <br></b>";
          document.getElementById("certpendivmoni").focus();
          return false;
        } else {
          document.getElementById("certpenalmoni_msgpf").innerHTML = "";
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
          document.forms["cadastrar_monitor"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });

    //check empty password field
  });
});

$(document).ready(function () {
  $("#cadastrar-motorista").on("click", function () {
    button = document.getElementById("cadastrar-motorista");
    let nomemotorista = document.getElementById("nomepf").value;
    let cpfmotorista = document.getElementById("CPFpf").value;
    let telefonemotorista = document.getElementById("telefonepf").value;
    let cepmotorista = document.getElementById("ceppf").value;
    let ruamotorista = document.getElementById("ruapf").value;
    let bairromotorista = document.getElementById("bairropf").value;
    let testemotorista = document.getElementById("cidadepf").value;
    let numeromotorista = document.getElementById("numeropf").value;
    let cnhmotorista = document.getElementById("cnhmotorista").value;
    let forummotorista = document.getElementById("forummotorista").value;
    let sanidademotorista = document.getElementById("sanidademotorista").value;
    let residenciamotorista = document.getElementById(
      "residenciamotorista"
    ).value;
    let cursomotorista = document.getElementById("cursomotorista").value;
    let multasmotorista = document.getElementById("multasmotorista").value;
    document.getElementById("nome_msgpf").innerHTML = "";
    document.getElementById("cpf_msgpf").innerHTML = "";
    document.getElementById("telefone_msgpf").innerHTML = "";
    document.getElementById("cep_msgpf").innerHTML = "";
    document.getElementById("rua_msgpf").innerHTML = "";
    document.getElementById("bairro_msgpf").innerHTML = "";
    document.getElementById("cidade_msgpf").innerHTML = "";
    document.getElementById("num_msgpf").innerHTML = "";
    document.getElementById("cnh_msgpf").innerHTML = "";
    document.getElementById("certpenal_msgpf").innerHTML = "";
    document.getElementById("sanidade_msgpf").innerHTML = "";
    document.getElementById("residencia_msgpf").innerHTML = "";
    document.getElementById("curso_msgpf").innerHTML = "";
    document.getElementById("negativamultaspf_msgpf").innerHTML = "";

    var tipo = $("#tipocadastromot").val();
    var cpff = $("#CPFpf").val();
    $.ajax({
      url: "../src/escolar/operador_analisamotorista.php",
      data: {
        cpf: cpff,
        tipo: tipo,
      },
      type: "post",
      success: function (result) {
        if (result == "cpfcadastrado") {
          Swal.fire({
            title: "Erro!",
            text: "CPF ja Cadastrado como motorista!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (cpfmotorista == "") {
          document.getElementById("cpf_msgpf").innerHTML =
            "<b>É necessario preencher com seu documento  <br></b>";
          document.getElementById("CPFpf").focus();
          return false;
        } else {
          document.getElementById("cpf_msgpf").innerHTML = "";
        }
        if (is_cpf(cpfmotorista) == false) {
          document.getElementById("cpf_msgpf").innerHTML =
            "<b>É necessario preencher com seu documento corretamente  <br></b>";
          document.getElementById("CPFpf").focus();
          return false;
        } else {
          document.getElementById("cpf_msgpf").innerHTML = "";
        }
        if (nomemotorista == "") {
          document.getElementById("nome_msgpf").innerHTML =
            "<b>É  necessario preencher com seu nome  <br></b>";
          document.getElementById("nomepf").focus();
          return false;
        } else {
          document.getElementById("nome_msgpf").innerHTML = "";
        }

        if (telefonemotorista == "") {
          document.getElementById("telefone_msgpf").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefonepf").focus();
          return false;
        } else {
          document.getElementById("telefone_msgpf").innerHTML = "";
        }
        if (cepmotorista == "") {
          document.getElementById("cep_msgpf").innerHTML =
            "<b>É necessario preencher com seu CEP  <br></b>";
          document.getElementById("ceppf").focus();
          return false;
        } else {
          document.getElementById("cep_msgpf").innerHTML = "";
        }
        if (ruamotorista == "") {
          document.getElementById("rua_msgpf").innerHTML =
            "<b>É necessario preencher com sua rua  <br></b>";
          document.getElementById("ruapf").focus();
          return false;
        } else {
          document.getElementById("rua_msgpf").innerHTML = "";
        }
        if (bairromotorista == "") {
          document.getElementById("bairro_msgpf").innerHTML =
            "<b>É necessario preencher com seu bairro  <br></b>";
          document.getElementById("bairropf").focus();
          return false;
        } else {
          document.getElementById("bairro_msgpf").innerHTML = "";
        }
        if (testemotorista == "") {
          document.getElementById("cidade_msgpf").innerHTML =
            "<b>É necessario preencher com sua cidade  <br></b>";
          document.getElementById("cidadepf").focus();
          return false;
        } else {
          document.getElementById("cidadepf").innerHTML = "";
        }
        if (numeromotorista == "") {
          document.getElementById("num_msgpf").innerHTML =
            "<b>É necessario preencher com o numero da sua casa  <br></b>";
          document.getElementById("numeropf").focus();
          return false;
        } else {
          document.getElementById("num_msgpf").innerHTML = "";
        }
        if (cnhmotorista == "") {
          document.getElementById("cnh_msgpf").innerHTML =
            "<b>É necessario enviar seu Alvara!  <br></b>";
          document.getElementById("cnhdivpf").focus();
          return false;
        } else {
          document.getElementById("cnh_msgpf").innerHTML = "";
        }
        if (forummotorista == "") {
          document.getElementById("certpenal_msgpf").innerHTML =
            "<b>É necessario enviar seu certificado de distribuição penal!   <br></b>";
          document.getElementById("certpendivpf").focus();
          return false;
        } else {
          document.getElementById("certpenal_msgpf").innerHTML = "";
        }
        if (sanidademotorista == "") {
          document.getElementById("sanidade_msgpf").innerHTML =
            "<b>É necessario enviar sua certidão negativa municipal!<br></b>";
          document.getElementById("sanidadedivpf").focus();
          return false;
        } else {
          document.getElementById("sanidade_msgpf").innerHTML = "";
        }
        if (residenciamotorista == "") {
          document.getElementById("residencia_msgpf").innerHTML =
            "<b>É necessario enviar seu atestado de sanidade física e mental!  <br></b>";
          document.getElementById("residenciadivpf").focus();
          return false;
        } else {
          document.getElementById("residencia_msgpf").innerHTML = "";
        }
        if (cursomotorista == "") {
          document.getElementById("curso_msgpf").innerHTML =
            "<b>É necessario enviar seu comprovante de resiência!  <br></b>";
          document.getElementById("cursodivpf").focus();
          return false;
        } else {
          document.getElementById("curso_msgpf").innerHTML = "";
        }
        if (multasmotorista == "") {
          document.getElementById("negativamultaspf_msgpf").innerHTML =
            "<b>É necessario enviar seu comprovante de curso de condutor!  <br></b>";
          document.getElementById("multas").focus();
          return false;
        } else {
          document.getElementById("negativamultaspf_msgpf").innerHTML = "";
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
        } else {
          button.disabled = true;
          document.forms["cadastrar_motorista"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });

    //check empty password field
  });
});

//*/
