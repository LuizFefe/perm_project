$(document).ready(function () {
  //newly added
  $("#button").on("click", function () {
    var pw1 = document.getElementById("operador_senha").value;
    var pw2 = document.getElementById("operador_rep_senha").value;
    var cpf = document.getElementById("operador_documento").value;
    var email = document.getElementById("operador_email").value;
    var email_rep = document.getElementById("operador_email_rep").value;
    var tipo_cadastro = document.getElementById("tipo").value;
    var cpfval = $("#operador_documento").val();
    var emailVal = $("#operador_email").val();
    document.getElementById("operador_senha_msg").innerHTML = "";
    document.getElementById("operador_rep_senha_msg").innerHTML = "";
    document.getElementById("operador_documento_msg").innerHTML = "";
    document.getElementById("operador_email_msg").innerHTML = "";
    document.getElementById("operador_email_rep_msg").innerHTML = "";
    document.getElementById("ponto_msg").innerHTML = "";
    $.ajax({
      url: "../src/verificadores/checkcadlogin.php",
      data: {
        cpf: cpfval,
        email: emailVal,
      },
      type: "post",
      success: function (result) {
        if (result == "emailexist") {
          Swal.fire({
            title: "Erro!",
            text: "Email ja cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "cpfexist") {
          Swal.fire({
            title: "Erro!",
            text: "CPF ja cadastrado!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        console.log(pw1);
        console.log(pw2);
        if (cpf == "") {
          document.getElementById("operador_documento_msg").innerHTML =
            "<b>**Preencha com seu CPF!<br></b>";
          return false;
        }
        if (pw1 == "") {
          document.getElementById("operador_senha_msg").innerHTML =
            "<b>**Preencha com a senha!<br></b>";
          return false;
        }

        //check empty confirm password field
        if (pw2 == "") {
          document.getElementById("operador_rep_senha_msg").innerHTML =
            "<b>**Preencha com a senha!<br></b>";
          return false;
        }

        //minimum password length validation
        if (pw1.length < 6) {
          document.getElementById("operador_senha_msg").innerHTML =
            "<b>**Senha deve ser no minimo de 6 caracteres!<br></b>";
          return false;
        }

        //maximum length of password validation
        if (pw1.length > 15) {
          document.getElementById("operador_senha_msg").innerHTML =
            "<b>**Senha nao pode ter mais de 15 caracteres!<br></b>";
          return false;
        }

        if (pw1 != pw2) {
          document.getElementById("operador_rep_senha_msg").innerHTML =
            "<b>**Senhas não sao iguais!<br></b>";
          return false;
        }
        if (email == "") {
          document.getElementById("operador_email_msg").innerHTML =
            "<b>**Preencha com seu email!<br></b>";
          return false;
        }
        if (email_rep == "") {
          document.getElementById("operador_email_rep_msg").innerHTML =
            "<b>**Preencha com seu email!<br></b>";
          return false;
        }
        if (email != email_rep) {
          document.getElementById("operador_email_rep_msg").innerHTML =
            "<b>**Emails não são iguais!<br></b>";
          return false;
        }
        if (tipo_cadastro == "Selecione o Tipo do Cadastro") {
          document.getElementById("ponto_msg").innerHTML =
            "<b>**Selecione o seu tipo de cadastro!<br></b>";
          return false;
        } else {
          document.forms["operadorform"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });
  });
}); /*/*  */
