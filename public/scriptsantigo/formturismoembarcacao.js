/* ---------------MASCARA INPUTS DO FORMULARIO------------------- */
$(document).ready(function () {
  //newly added
  $("#cadastrar-carro-btn").on("click", function () {
    button = document.getElementById("cadastrar-carro-btn");
    var razaosocial = document.getElementById("razaosocial").value;
    var nomeembarcacao = document.getElementById("nomeembarcacao").value;
    var tipoembarcacao = document.getElementById("tipoembarcacao").value;
    var modeloembarcacao = document.getElementById("modeloembarcacao").value;
    var casco = document.getElementById("casco").value;
    var propulsao = document.getElementById("propulsao").value;
    var combustivel = document.getElementById("combustivel").value;
    var insccapitania = document.getElementById("insccapitania").value;
    var arqbruta = document.getElementById("arqbruta").value;
    var arqliquida = document.getElementById("arqliquida").value;
    var tonelagem = document.getElementById("tonelagem").value;
    var comptotal = document.getElementById("comptotal").value;
    var boca = document.getElementById("boca").value;
    var ntripulantes = document.getElementById("ntripulantes").value;
    var pontal = document.getElementById("pontal").value;
    var caladoleve = document.getElementById("caladoleve").value;
    var caladocarregado = document.getElementById("caladocarregado").value;
    var contorno = document.getElementById("contorno").value;
    var anoconstrucao = document.getElementById("anoconstrucao").value;
    var npassageiros = document.getElementById("npassageiros").value;
    var licenciamento = document.getElementById("licenciamento").value;
    var contratocomodato = document.getElementById("contratocomodato").value;
    var termodevistoria = document.getElementById("termodevistoria").value;
    var nperm = document.getElementById("nperm").value;
    document.getElementById("razaosocial_msg").innerHTML = "";
    document.getElementById("nomeembarcacao_msg").innerHTML = "";
    document.getElementById("tipoembarcacao_msg").innerHTML = "";
    document.getElementById("modeloembarcacao_msg").innerHTML = "";
    document.getElementById("casco_msg").innerHTML = "";
    document.getElementById("propulsao_msg").innerHTML = "";
    document.getElementById("combustivel_msg").innerHTML = "";
    document.getElementById("insccapitania_msg").innerHTML = "";
    document.getElementById("arqbruta_msg").innerHTML = "";
    document.getElementById("arqliquida_msg").innerHTML = "";
    document.getElementById("tonelagem_msg").innerHTML = "";
    document.getElementById("comptotal_msg").innerHTML = "";
    document.getElementById("boca_msg").innerHTML = "";
    document.getElementById("ntripulantes_msg").innerHTML = "";
    document.getElementById("npontal_msg").innerHTML = "";
    document.getElementById("caladoleve_msg").innerHTML = "";
    document.getElementById("caladocarregado_msg").innerHTML = "";
    document.getElementById("contorno_msg").innerHTML = "";
    document.getElementById("anoconstrucao_msg").innerHTML = "";
    document.getElementById("npassageiros_msg").innerHTML = "";
    document.getElementById("nperm_msg").innerHTML = "";
    document.getElementById("licenciamento_msg").innerHTML = "";
    document.getElementById("contratocomodato_msg").innerHTML = "";
    document.getElementById("vistoria_msg").innerHTML = "";
    if (razaosocial == "") {
      document.getElementById("razaosocial_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("razaosocial").focus();
      return false;
    }
    if (nomeembarcacao == "") {
      document.getElementById("nomeembarcacao_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("nomeembarcacao").focus();
      return false;
    }
    if (tipoembarcacao == "") {
      document.getElementById("tipoembarcacao_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("tipoembarcacao").focus();
      return false;
    }
    if (modeloembarcacao == "") {
      document.getElementById("modeloembarcacao_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("modeloembarcacao").focus();
      return false;
    }
    if (casco == "") {
      document.getElementById("casco_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("casco").focus();
      return false;
    }
    if (propulsao == "") {
      document.getElementById("propulsao_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("propulsao").focus();
      return false;
    }
    if (combustivel == "") {
      document.getElementById("combustivel_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("combustivel").focus();
      return false;
    }
    if (insccapitania == "") {
      document.getElementById("insccapitania_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("insccapitania").focus();
      return false;
    }
    if (arqbruta == "") {
      document.getElementById("arqbruta_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("arqbruta").focus();
      return false;
    }
    if (arqliquida == "") {
      document.getElementById("arqliquida_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("arqliquida").focus();
      return false;
    }
    if (tonelagem == "") {
      document.getElementById("tonelagem_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("tonelagem").focus();
      return false;
    }
    if (comptotal == "") {
      document.getElementById("comptotal_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("comptotal").focus();
      return false;
    }
    if (boca == "") {
      document.getElementById("boca_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("boca").focus();
      return false;
    }
    if (ntripulantes == "") {
      document.getElementById("ntripulantes_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("ntripulantes").focus();
      return false;
    }
    if (pontal == "") {
      document.getElementById("npontal_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("pontal").focus();
      return false;
    }
    if (caladoleve == "") {
      document.getElementById("caladoleve_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("caladoleve").focus();
      return false;
    }
    if (caladocarregado == "") {
      document.getElementById("caladocarregado_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("caladocarregado").focus();
      return false;
    }
    if (contorno == "") {
      document.getElementById("contorno_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("contorno").focus();
      return false;
    }
    if (anoconstrucao == "") {
      document.getElementById("anoconstrucao_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("anoconstrucao").focus();
      return false;
    }
    if (npassageiros == "") {
      document.getElementById("npassageiros_msg").innerHTML =
        "<b>**Preencha esse campo!<br></b>";
      document.getElementById("npassageiros").focus();
      return false;
    }
    if (licenciamento == "") {
      document.getElementById("licenciamento_msg").innerHTML =
        "<b>**Anexe seu arquivo!<br></b>";
      document.getElementById("divlicenciamento").focus();
      return false;
    }
    if (contratocomodato == "") {
      document.getElementById("contratocomodato_msg").innerHTML =
        "<b>**Anexe seu arquivo!<br></b>";
      document.getElementById("divcontratocomodato").focus();
      return false;
    }
    if (termodevistoria == "") {
      document.getElementById("vistoria_msg").innerHTML =
        "<b>**Anexe seu arquivo!<br></b>";
      document.getElementById("divvistoria").focus();
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
  });
});
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
