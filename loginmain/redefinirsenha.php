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
    <script src="../public/scripts/form-redefine.js" defer></script>

    <!-- mascaras de input dos forms -->
    <script src="../public/scripts/masks.js" defer></script>
    <script type="text/javascript" src="../../bas/js/jquery.mask.min.js" defer></script>

    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->
    <style>
        .buttontoken {
            margin-top: 0;
            margin-bottom: 2em;
            width: 300px;
            height: 4rem;
            background: var(--color-secondary);
            color: var(--color-button-text);
            border: 0;
            border-radius: 0.8rem;
            cursor: pointer;
            font: 700 1.6rem Archivo;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: 0.2s;
        }
    </style>


</head>
<style>
    .swal2-popup {
        font-size: 20px !important;
        border-radius: 25px;
    }
</style>

<body id="page-login">

    <div id="container">
        <header class="page-header">
            <!-- <div class="top-bar-container">
                <nav class="navbar">
                    <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                    <ul class="navbar-links">
                        <li>
                            <a class="portugues" href="./login.php">Inicio</a>
                        </li>
                        <li>
                            <a class="portugues" href="./cadastrar-login.php">Cadastre-se</a>
                        </li>
                    </ul>
                </nav>
            </div> -->
            <div data-include="headermenu_ipuf"></div>
            <div class="header-contentnew">
                <strong>Redefina sua Senha</strong>
            </div>
            <div class="headmessage-div">
                <b class="header-message">Digite seu email para redefinir sua senha.</b>
            </div>

        </header>
        <main>
            <form method="post" id="loginform" action="../loginmain/sendemailsenha.php">

                <fieldset id="cadastro_contratantes" class="div-show" style="display: block;">
                    <legend>Insira seu Email</legend>
                    <div class="login_show" id="login_show" style="display: block;">
                        <span id="msg-error-contratantes"></span>
                        <div class="input-block">
                            <label class="portugues" for="operador_login_email"><strong>Email</strong></label>
                            <input type="text" class="form-control" name="email" id="operador_login_email" aria-describedby="operador_login_email_helpId" placeholder="email@mail.com">
                            <small id="operador_login_email_helpId" class="form-text text-muted">
                            </small>
                            <small id="operador_login_email_msg" class="small-message"></small>
                        </div>
                    </div>
                </fieldset>


            </form>
            <footer>
                <div>
                    <input type="submit" name="password-reset-token" class="buttontoken" value="Enviar Email Recuperação" id="logar_operador_db">
                    <!-- <button id="logar_operador_db">
                        <div class="portugues">Enviar Email Recuperação</div>
                    </button> -->
                </div>
            </footer>


        </main>
        <div data-include="FOOTER"></div>
    </div>

</body>
<script>
    $(function() {
        var includes = $('[data-include]')
        $.each(includes, function() {
            var file = '../../general/public/views/' + $(this).data('include') + '.php'
            $(this).load(file)
        })
    })
</script>

</html>