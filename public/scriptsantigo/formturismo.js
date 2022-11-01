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

/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */
/*--------------------------------------------------------------------------------------------- */

/*-----------------------------------MASCARA INPUTS DO CADASTRO---------------------------------------------------------- */
$(document).ready(function () {
  $("#cadastrar-cnpj").on("click", function () {
    let button = document.getElementById("cadastrar-cnpj");
    let razaosocial = document.getElementById("razaosocial").value;
    let nome = document.getElementById("nomepj").value;
    let cnpj = document.getElementById("CNPJ").value;
    let telefone = document.getElementById("telefonepj").value;
    let email = document.getElementById("emailpj").value;
    let cmc = document.getElementById("cmc").value;
    let cep = document.getElementById("ceppj").value;
    let rua = document.getElementById("ruapj").value;
    let bairro = document.getElementById("bairropj").value;
    let teste = document.getElementById("testepj").value;
    let numero = document.getElementById("numeropj").value;
    let alvarapj = document.getElementById("alvarapj").value;
    let cartaopj = document.getElementById("cnpjcard").value;
    let negmunpj = document.getElementById("negmunpj").value;
    let negestpg = document.getElementById("negestpg").value;
    let negfedpj = document.getElementById("negfedpj").value;
    let neginsspj = document.getElementById("neginsspj").value;
    let negfgtspj = document.getElementById("negfgtspj").value;
    let contsocial = document.getElementById("contsocial").value;
    let negpen = document.getElementById("negpen").value;
    /* let app = document.getElementById("app").value; */
    let dam = document.getElementById("dam").value;
    document.getElementById("razaosocial_msg").innerHTML = "";
    document.getElementById("nome_msgpj").innerHTML = "";
    document.getElementById("cnpj_msgpj").innerHTML = "";
    document.getElementById("telefone_msgpj").innerHTML = "";
    document.getElementById("cmc_msg").innerHTML = "";
    document.getElementById("cep_msgpj").innerHTML = "";
    document.getElementById("rua_msgpj").innerHTML = "";
    document.getElementById("bairro_msgpj").innerHTML = "";
    document.getElementById("cidade_msgpj").innerHTML = "";
    document.getElementById("numpj_msg").innerHTML = "";
    document.getElementById("alvarapj_msg").innerHTML = "";
    document.getElementById("cnpjcard_msg").innerHTML = "";
    document.getElementById("negmunpj_msg").innerHTML = "";
    document.getElementById("negestpg_msg").innerHTML = "";
    document.getElementById("negfedpj_msg").innerHTML = "";
    document.getElementById("neginsspj_msg").innerHTML = "";
    document.getElementById("fgtspj_msg").innerHTML = "";
    document.getElementById("contratosocial_msgpfmei").innerHTML = "";
    document.getElementById("certpenal_msgpf").innerHTML = "";

    document.getElementById("dam_msgpf").innerHTML = "";
    var cnpjj = $("#CNPJ").val();
    var permcodepjj = $("#permcodepj").val();
    $.ajax({
      url: "../src/embarcacoes/operador_turismo.php",
      data: {
        cnpj: cnpjj,
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
        if (razaosocial == "") {
          button.disabled = false;
          document.getElementById("razaosocial_msg").innerHTML =
            "<b>É  necessario preencher com a sua razão social  <br></b>";
          document.getElementById("razaosocial").focus();
          return false;
        } else {
          document.getElementById("razaosocial_msg").innerHTML = "";
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
        if (cnpj == "") {
          document.getElementById("cnpj_msgpj").innerHTML =
            "<b>É necessario preencher com seu documento  <br></b>";
          document.getElementById("CNPJ").focus();
          return false;
        } else {
          document.getElementById("cnpj_msgpj").innerHTML = "";
        }
        if (telefone == "") {
          document.getElementById("telefone_msgpj").innerHTML =
            "<b>É necessario preencher com seu telefone  <br></b>";
          document.getElementById("telefonepj").focus();
          return false;
        } else {
          document.getElementById("telefone_msgpj").innerHTML = "";
        }
        if (cmc == "") {
          button.disabled = false;
          document.getElementById("cmc_msg").innerHTML =
            "<b>É necessario preencher com seu cmc  <br></b>";
          document.getElementById("cmc").focus();
          return false;
        } else {
          document.getElementById("cmc_msg").innerHTML = "";
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
        if (alvarapj == "") {
          document.getElementById("alvarapj_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("alvarapjdiv").focus();
          return false;
        } else {
          document.getElementById("alvarapj_msg").innerHTML = "";
        }
        if (cartaopj == "") {
          document.getElementById("cnpjcard_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("cnpjcarddiv").focus();
          return false;
        } else {
          document.getElementById("cnpjcard_msg").innerHTML = "";
        }
        if (negmunpj == "") {
          document.getElementById("negmunpj_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("negmunpjdiv").focus();
          return false;
        } else {
          document.getElementById("negmunpj_msg").innerHTML = "";
        }
        if (negestpg == "") {
          document.getElementById("negestpg_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("negestpgdiv").focus();
          return false;
        } else {
          document.getElementById("negestpg_msg").innerHTML = "";
        }
        if (negfedpj == "") {
          document.getElementById("negfedpj_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("negfedpjediv").focus();
          return false;
        } else {
          document.getElementById("negfedpj_msg").innerHTML = "";
        }
        if (neginsspj == "") {
          document.getElementById("neginsspj_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("neginsspjdiv").focus();
          return false;
        } else {
          document.getElementById("neginsspj_msg").innerHTML = "";
        }
        console.log(negfgtspj);
        if (negfgtspj == "") {
          document.getElementById("fgtspj_msg").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("negfgtspjdiv").focus();
          return false;
        } else {
          document.getElementById("fgtspj_msg").innerHTML = "";
        }
        if (contsocial == "") {
          document.getElementById("contratosocial_msgpfmei").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("contsocialdiv").focus();
          return false;
        } else {
          document.getElementById("contratosocial_msgpfmei").innerHTML = "";
        }
        if (negpen == "") {
          document.getElementById("certpenal_msgpf").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("certpendivpf").focus();
          return false;
        } else {
          document.getElementById("certpenal_msgpf").innerHTML = "";
        }
        /* if (app == "") {
          document.getElementById("app_msgpf").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("appdivpf").focus();
          return false;
        } else {
          document.getElementById("app_msgpf").innerHTML = "";
        } */

        if (dam == "") {
          document.getElementById("dam_msgpf").innerHTML =
            "<b>Anexe o arquivo<br></b>";
          document.getElementById("damdivpf").focus();
          return false;
        } else {
          document.getElementById("dam_msgpf").innerHTML = "";
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
if (screen && screen.width > 480) {
  $(".arquivoPDF").change(function () {
    //ou Id do input
    var msg = $(this).data("msg");

    $msgbox = $("#msg-error-arquivo");
    $pdfview = $("#pdf-" + msg);

    var fileInput = $(this);
    var file = this.files[0];
    _OBJECT_URL = URL.createObjectURL(file);

    // var maxSize = $j(this).data('max-size');
    var maxSize = 4194304;
    // var extPermitidas = ['jpg', 'png', 'gif', 'pdf', 'txt', 'doc', 'docx'];
    var extPermitidas = ["pdf"];

    console.log(fileInput.get(0).files[0].size);

    //aqui a sua função normal
    if (fileInput.get(0).files.length) {
      var fileSize = fileInput.get(0).files[0].size; // in bytes
      if (fileSize > maxSize) {
        $msgbox.html(
          '<div class="alert alert-danger" role="alert"><h4>Arquivo excedeu o limite permitido, por favor escolha arquivos com no <b>maximo 4MB!</b></h4></div>'
        );
        $(this).val("");
        $(this).focus();
        document.querySelector("#divpdf-" + msg).style.display = "none";

        // $j('#validate').attr('disabled', 'disabled');
      } else if (
        typeof extPermitidas.find(function (ext) {
          return fileInput.val().split(".").pop() == ext;
        }) == "undefined"
      ) {
        $msgbox.html(
          '<div class="alert alert-danger" role="alert"><h4>Extensão inválida utlize <b>arquivos PDF!</b></h4></div>'
        );
        $(this).val("");
        $(this).focus();

        document.querySelector("#divpdf-" + msg).style.display = "none";

        //  $j('#validate').attr('disabled', 'disabled');
      } else {
        $msgbox.html("");
        _OBJECT_URL = URL.createObjectURL(file);
        document.querySelector("#divpdf-" + msg).style.display = "block";
        document.querySelector("#control-show-" + msg).style.display = "block";
        document.querySelector("#control-hide-" + msg).style.display = "none";
        document.querySelector("#pdf-" + msg).style.display = "block";

        // showPDF(_OBJECT_URL);
        $pdfview.html(
          '<iframe src="' +
            _OBJECT_URL +
            '" width="100%" height="850px"></iframe>'
        );
      }
    }
  });
}
