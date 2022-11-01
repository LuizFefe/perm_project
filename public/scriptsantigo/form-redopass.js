$(document).ready(function () {
  //newly added
  $("#logar_operador_db").on("click", function () {
    /* --------------------------------- PEGA CAMPOS DE INPUT E DIV DE MENSAGENS ----------------------- */
    var pw1 = document.getElementById("operador_senha").value;
    var pw2 = document.getElementById("operador_rep_senha").value;
    document.getElementById("operador_senha_msg").innerHTML = "";
    document.getElementById("operador_rep_senha_msg").innerHTML = "";
    /* ----------------------------------------------------------------------------------------------------- */
    /* -----------------------------------FAZ CONTROLE DOS CAMPOS------------------------------------------- */
    if (pw1 == "") {
      document.getElementById("operador_senha_msg").innerHTML =
        "<b>**Preencha com a senha!<br></b>";
      return false;
    }
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
    } else {
      /* ----------------------------------------------------------------------------------------------------- */
      /* ------------------------ENVIA O FORMULARIO CASO NAO ENTRE EM NENHUM CAMPO--------------------------- */
      document.forms["redefinform"].submit();
    }
  });
});
