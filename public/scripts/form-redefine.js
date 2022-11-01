$(document).ready(function () {
  //newly added
  /* EVENT TRIGGER ON CLICK NO BOTAO DO FORMULARIO */
  $("#logar_operador_db").on("click", function () {
    const operador_login_email = document.getElementById(
      "operador_login_email"
    ).value;
    var emailval = $("#operador_login_email").val();
    var condition;
    /* REQUEST PARA VERIFICAR CADASTRO DO EMAIL 
     DEPENDENDO DO RETORNO IRA EXIBIR UMA MENSAGEM OU NENHUMA*/
    $.ajax({
      url: "../src/motorista/operador_analisaredefine.php",
      data: {
        email: emailval,
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
