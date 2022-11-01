$(".contratosocial").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#contratosocial-" + msg);

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
      document.querySelector("#divcontratosocial-" + msg).style.display =
        "none";

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

      document.querySelector("#divcontratosocial-" + msg).style.display =
        "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcontratosocial-" + msg).style.display =
        "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#contratosocial-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".socios").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#socios-" + msg);

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
      document.querySelector("#divsocios-" + msg).style.display = "none";

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

      document.querySelector("#divsocios-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divsocios-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#socios-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".certmun").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#certmun-" + msg);

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
      document.querySelector("#divcertmun-" + msg).style.display = "none";

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

      document.querySelector("#divcertmun-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcertmun-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#certmun-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".certestad").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#certestad-" + msg);

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
      document.querySelector("#divcertestad-" + msg).style.display = "none";

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

      document.querySelector("#divcertestad-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcertestad-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#certestad-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".certfed").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#certfed-" + msg);

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
      document.querySelector("#divcertfed-" + msg).style.display = "none";

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

      document.querySelector("#divcertfed-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcertfed-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#certfed-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".inss").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#inss-" + msg);

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
      document.querySelector("#divinss--" + msg).style.display = "none";

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

      document.querySelector("#divinss-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divinss-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#inss-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".fgts").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#fgts-" + msg);

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
      document.querySelector("#divfgts-" + msg).style.display = "none";

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

      document.querySelector("#divfgts-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divfgts-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#fgts-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".curso").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#curso-" + msg);

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
      document.querySelector("#divcurso-" + msg).style.display = "none";

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

      document.querySelector("#divcurso-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcurso-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#curso-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".multas").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#multas-" + msg);

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
      document.querySelector("#divmultas-" + msg).style.display = "none";

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

      document.querySelector("#divmultas-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divmultas-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#multas-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".alvara").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#alvara-" + msg);

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
      document.querySelector("#divalvara-" + msg).style.display = "none";

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

      document.querySelector("#divalvara-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divalvara-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#alvara-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".alvarapj").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#alvarapj-" + msg);

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
      document.querySelector("#divalvarapj-" + msg).style.display = "none";

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

      document.querySelector("#divalvarapj-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divalvarapj-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#alvarapj-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".negmunpj").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#negmunpj-" + msg);

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
      document.querySelector("#divnegmunpj-" + msg).style.display = "none";

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

      document.querySelector("#divnegmunpj-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divnegmunpj-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#negmunpj-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".negestpg").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#negestpg-" + msg);

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
      document.querySelector("#divnegestpg-" + msg).style.display = "none";

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

      document.querySelector("#divnegestpg-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divnegestpg-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#negestpg-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".negfedpj").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#negfedpj-" + msg);

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
      document.querySelector("#divnegfedpj-" + msg).style.display = "none";

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

      document.querySelector("#divnegfedpj-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divnegfedpj-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#negfedpj-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".neginsspj").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#neginsspj-" + msg);

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
      document.querySelector("#divneginsspj-" + msg).style.display = "none";

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

      document.querySelector("#divneginsspj-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divneginsspj-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#neginsspj-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".negfgtspj").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#negfgtspj-" + msg);

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
      document.querySelector("#divnegfgtspj-" + msg).style.display = "none";

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

      document.querySelector("#divnegfgtspj-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divnegfgtspj-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#negfgtspj-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".contratosocialmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#contratosocialmei-" + msg);

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
      document.querySelector("#divcontratosocialmei-" + msg).style.display =
        "none";

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

      document.querySelector("#divcontratosocialmei-" + msg).style.display =
        "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcontratosocialmei-" + msg).style.display =
        "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#contratosocialmei-" + msg).style.display =
        "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".sociosmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#sociosmei-" + msg);

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
      document.querySelector("#divsociosmei-" + msg).style.display = "none";

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

      document.querySelector("#divsociosmei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divsociosmei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#sociosmei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".certmunmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#certmunmei-" + msg);

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
      document.querySelector("#divcertmunmei-" + msg).style.display = "none";

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

      document.querySelector("#divcertmunmei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcertmunmei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#certmunmei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".certestadmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#certestadmei-" + msg);

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
      document.querySelector("#divcertestadmei-" + msg).style.display = "none";

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

      document.querySelector("#divcertestadmei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcertestadmei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#certestad-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".fgtsmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#fgtsmei-" + msg);

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
      document.querySelector("#divfgtsmei-" + msg).style.display = "none";

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

      document.querySelector("#divfgts-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divfgtsmei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#fgtsmei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".cursomei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#cursomei-" + msg);

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
      document.querySelector("#divcursomei-" + msg).style.display = "none";

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

      document.querySelector("#divcursomei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcursomei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#cursomei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".multasmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#multasmei-" + msg);

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
      document.querySelector("#divmultasmei-" + msg).style.display = "none";

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

      document.querySelector("#divmultasmei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divmultasmei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#multasmei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".alvaramei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#alvaramei-" + msg);

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
      document.querySelector("#divalvaramei-" + msg).style.display = "none";

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

      document.querySelector("#divalvaramei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divalvaramei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#alvaramei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});

$(".csmei").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#csmei-" + msg);

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
      document.querySelector("#divcsmei-" + msg).style.display = "none";

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

      document.querySelector("#divcsmei-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcsmei-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#csmei-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".certurismo").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#certurismo-" + msg);

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
      document.querySelector("#divcerturismo-" + msg).style.display = "none";

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

      document.querySelector("#divcerturismo-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcerturismo-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#certurismo-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".negpen").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#negpen-" + msg);

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
      document.querySelector("#divnegpen-" + msg).style.display = "none";

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

      document.querySelector("#divnegpen-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divnegpen-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#negpen-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
$(".cnpj").change(function () {
  //ou Id do input
  var msg = $(this).data("msg");

  $msgbox = $("#msg-error-arquivo");
  $pdfview = $("#cnpj-" + msg);

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
      document.querySelector("#divcnpj-" + msg).style.display = "none";

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

      document.querySelector("#divcnpj-" + msg).style.display = "none";

      //  $j('#validate').attr('disabled', 'disabled');
    } else {
      $msgbox.html("");
      _OBJECT_URL = URL.createObjectURL(file);
      document.querySelector("#divcnpj-" + msg).style.display = "block";
      document.querySelector("#control-show-" + msg).style.display = "block";
      document.querySelector("#control-hide-" + msg).style.display = "none";
      document.querySelector("#cnpj-" + msg).style.display = "block";

      // showPDF(_OBJECT_URL);
      $pdfview.html(
        '<iframe src="' +
          _OBJECT_URL +
          '" width="100%" height="420px"></iframe>'
      );
    }
  }
});
