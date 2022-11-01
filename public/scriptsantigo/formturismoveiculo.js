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
    var chassi = document.getElementById("chassi").value;
    var renavam = document.getElementById("renavam").value;
    var modelo = document.getElementById("modelo").value;
    var marca = document.getElementById("marca").value;
    var anofab = document.getElementById("anofab").value;
    var anomod = document.getElementById("anomod").value;
    var categoria = document.getElementById("categoria").value;
    var tipocarro = document.getElementById("tipocarro").value;
    var lotacao = document.getElementById("lotacao").value;
    var combustivel = document.getElementById("combustivel").value;
    /* var nperm = document.getElementById("nperm").value; */
    var validadeapp = document.getElementById("validadeapp").value;
    var licenciamento = document.getElementById("licenciamento").value;
    var termodevistoria = document.getElementById("termodevistoria").value;
    /*  var contratocomodato = document.getElementById("contratocomodato").value; */
    /* var claspessoajuridica =
      document.getElementById("claspessoajuridica").value; */
    let app = document.getElementById("app").value;
    var fotoveiculo = document.getElementById("fotoveiculo").value;
    /* var cadastropreenchido =
      document.getElementById("cadastropreenchido").value; */
    document.getElementById("placa_msg").innerHTML = "";
    document.getElementById("chassi_msg").innerHTML = "";
    document.getElementById("renavam_msg").innerHTML = "";
    document.getElementById("modelo_msg").innerHTML = "";
    document.getElementById("marca_msg").innerHTML = "";
    document.getElementById("anofab_msg").innerHTML = "";
    document.getElementById("anomod_msg").innerHTML = "";
    document.getElementById("categoria_msg").innerHTML = "";
    document.getElementById("veiculo_msg").innerHTML = "";
    document.getElementById("lotacao_msg").innerHTML = "";
    document.getElementById("combustivel_msg").innerHTML = "";
    document.getElementById("nperm_msg").innerHTML = "";
    document.getElementById("validadeapp_msg").innerHTML = "";
    document.getElementById("licenciamento_msg").innerHTML = "";
    document.getElementById("licenciamento_msg").innerHTML = "";
    document.getElementById("vistoria_msg").innerHTML = "";
    /* document.getElementById("contratocomodato_msg").innerHTML = ""; */
    /* document.getElementById("claspessoajuridica_msg").innerHTML = ""; */
    document.getElementById("fotoveiculo_msg").innerHTML = "";
    document.getElementById("app_msgpf").innerHTML = "";
    /* document.getElementById("cadastropreenchido_msg").innerHTML = "" */ $.ajax(
      {
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
          if (chassi == "") {
            document.getElementById("chassi_msg").innerHTML =
              "<b>**Preencha com  o chassi do veículo!<br></b>";
            document.getElementById("chassi").focus();
            return false;
          }
          if (renavam == "") {
            document.getElementById("renavam_msg").innerHTML =
              "<b>**Preencha com o renavam do veículo!<br></b>";
            document.getElementById("renavam").focus();
            return false;
          }
          if (modelo == "") {
            document.getElementById("modelo_msg").innerHTML =
              "<b>**Preencha com o modelo do veículo!<br></b>";
            document.getElementById("modelo").focus();
            return false;
          }
          if (marca == "") {
            document.getElementById("marca_msg").innerHTML =
              "<b>**Preencha com a fabricante do veículo!<br></b>";
            document.getElementById("marca").focus();
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
          if (tipocarro == "") {
            document.getElementById("veiculo_msg").innerHTML =
              "<b>**Preencha com o tipo do veículo!<br></b>";
            document.getElementById("tipocarro").focus();
            return false;
          }
          if (lotacao == "") {
            document.getElementById("lotacao_msg").innerHTML =
              "<b>**Preencha com a lotação do carro!<br></b>";
            document.getElementById("lotacao").focus();
            return false;
          }
          if (combustivel == "") {
            document.getElementById("combustivel_msg").innerHTML =
              "<b>**Preencha com o tipo de combústivel!<br></b>";
            document.getElementById("combustivel").focus();
            return false;
          }
          if (validadeapp == "") {
            document.getElementById("validadeapp_msg").innerHTML =
              "<b>**Preencha com a validade da APP!<br></b>";
            document.getElementById("validadeapp").focus();
            return false;
          }
          if (licenciamento == "") {
            document.getElementById("licenciamento_msg").innerHTML =
              "<b>**Anexe seu arquivo!<br></b>";
            document.getElementById("divlicenciamento").focus();
            return false;
          }
          if (termodevistoria == "") {
            document.getElementById("vistoria_msg").innerHTML =
              "<b>**Anexe seu arquivo!<br></b>";
            document.getElementById("divvistoria").focus();
            return false;
          }
          if (app == "") {
            document.getElementById("app_msgpf").innerHTML =
              "<b>Anexe o arquivo<br></b>";
            document.getElementById("appdivpf").focus();
            return false;
          }
          /* if (contratocomodato == "") {
            document.getElementById("contratocomodato_msg").innerHTML =
              "<b>**Anexe seu arquivo!<br></b>";
            document.getElementById("divcontratocomodato").focus();
            return false;
          } */
          /* if (claspessoajuridica == "") {
            document.getElementById("claspessoajuridica_msg").innerHTML =
              "<b>**Anexe seu arquivo!<br></b>";
            document.getElementById("divclaspessoajuridica").focus();
            return false;
          } */
          if (fotoveiculo == "") {
            document.getElementById("fotoveiculo_msg").innerHTML =
              "<b>**Anexe seu arquivo!<br></b>";
            document.getElementById("divfotoveiculo").focus();
            return false;
          }
          /* if (cadastropreenchido == "") {
          document.getElementById("cadastropreenchido_msg").innerHTML =
            "<b>**Anexe seu arquivo!<br></b>";
          document.getElementById("divcadastropreenchido").focus();
          return false;
        } */
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
      }
    );
  });
}); /*/*  */
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
