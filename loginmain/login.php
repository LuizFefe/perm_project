<?php
session_start();
require_once('../login/session_validalogmain.php');
include_once("../src/conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
<!-- lang é um atributo-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Permissionário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="../public/styles/main.css">
    <link rel="stylesheet" href="../public/styles/partials/newheader.css">
    <link rel="stylesheet" href="../public/styles/partials/forms.css">
    <link rel="stylesheet" href="../public/styles/partials/page-login.css">
    <link rel="stylesheet" href="../public/styles/footercadastros.css">

    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/scripts/form-login.js" defer></script>

    <!-- mascaras de input dos forms -->
    <script src="../public/scripts/masks.js" defer></script>
    <script type="text/javascript" src="../../bas/js/jquery.mask.min.js" defer></script>

    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->



</head>
<style>
    .swal2-popup {
        font-size: 20px !important;
        border-radius: 25px;
    }

    .logo_selo_horizontal {
        min-width: 0;
    }
</style>

<body id="page-login">

    <div id="container">
        <header class="page-header">
            <!-- header menu local load -->
            <!-- <div data-include="headermenu_index1"></div> -->
            <div data-include="headermenu2logos"></div>
            <div class="header-contentnew">
                <strong>LOGIN</strong>
            </div>
            <div class="headmessage-div">
                <b class="header-message">Caso você possua cadastro nesta plataforma, preencha com seu e-mail e senha e clique em "Acessar".<br> Caso ainda não possua, clique em "Cadastre-se" e preencha todas as informações solicitadas.</b>
            </div>
        </header>
        <main>
            <form method="post" id="loginform" action="../login/session_valida.php">

                <fieldset id="cadastro_contratantes" class="div-show" style="display: block;">
                    <legend></legend>
                    <div class="login_show" id="login_show" style="display: block;">
                        <span id="msg-error-contratantes"></span>
                        <div class="input-block">
                            <label class="portugues" for="operador_login_email"><strong>Email</strong></label>
                            <input type="text" class="form-control" name="email" id="operador_login_email" aria-describedby="operador_login_email_helpId" placeholder="email@mail.com">
                            <small id="operador_login_email_helpId" class="form-text text-muted">
                            </small>
                            <small id="operador_login_email_msg" class="small-message"></small>
                        </div>
                        <div class="input-block">
                            <label class="portugues" for="operador_cep"><strong>Senha</strong></label>
                            <input type="password" class="form-control" name="senha" id="operador_login_senha" aria-describedby="operador_login_senha_helpId" placeholder="">
                            <small id="operador_login_senha_helpId" class="form-text text-muted">
                                <div class="portugues">Senha de acesso</div>
                            </small>
                            <small id="operador_login_senha_msg" class="small-message"></small>
                        </div>
                        <div style="text-align:center">
                            <a href="http://redemobilidade.pmf.sc.gov.br/cadastro/loginmain/redefinirsenha.php"> Esqueceu sua Senha?</a>
                        </div>
                    </div>
                </fieldset>
            </form>
            <footer>
                <div>
                    <button id="logar_operador_db">
                        <div class="portugues">Acessar</div>
                    </button>
                </div>

                <div>
                    <a href="cadastrar-login.php" id="logar_operador_db">
                        <div class="portugues">Cadastre-se</div>
                    </a>
                </div>
            </footer>



        </main>
        <div data-include="FOOTERlogos"></div>
    </div>

</body>
<script>
    // le arquivos externos da pagina


    $(function() {
        var includes = $('[data-include]')
        $.each(includes, function() {
            var file = '../../general/public/views/' + $(this).data('include') + '.php'
            $(this).load(file)
        })
    })


    // validar form 01 - pedido de incentivo e termo declaratorio
</script>

</html>