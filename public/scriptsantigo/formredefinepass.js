$(document).ready(function () {
  //newly added
  $("#logar_operador_db").on("click", function () {
    const operador_login_email = document.getElementById(
      "operador_login_email"
    ).value;
    const operador_login_senha = document.getElementById(
      "operador_login_senha"
    ).value;
    var emailval = $("#operador_login_email").val();
    var senhaval = $("#operador_login_senha").val();
    operador_login_senha;
    var condition;
    $.ajax({
      url: "../src/motorista/operador_analisa.php",
      data: {
        email: emailval,
        senha: senhaval,
      },
      type: "post",
      success: function (result) {
        if (result == "emailnaocadastrado") {
          Swal.fire({
            title: "Erro!",
            text: "E-mail Inexistente!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "emailousenhaincorreto") {
          Swal.fire({
            title: "Erro!",
            text: "E-mail ou senha incorretos!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (result == "contanaoativa") {
          Swal.fire({
            title: "Verifique seu e-mail!",
            text: "Sua conta ainda não foi ativada, cheque seu e-mail!",
            icon: "error",
            confirmButtonText: "Ok",
          });

          return false;
        }
        if (operador_login_senha == "" || operador_login_senha.length <= 5) {
          document.getElementById("operador_login_senha_msg").innerHTML =
            "A senha deve conter no mínimio 6 caracteres!";
          loginform.operador_login_senha.focus();
          return false;
        } else {
          document.forms["loginform"].submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, "ERRO NO CADASTRO DO CPF");
      },
    });

    //check empty password field
  });
}); /*/*  */
