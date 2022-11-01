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
    <link rel="stylesheet" href="../public/styles/partials/header.css">
    <link rel="stylesheet" href="../public/styles/partials/forms.css">
    <link rel="stylesheet" href="../public/styles/partials/page-login.css">
    <link rel="stylesheet" href="../public/styles/partials/footercadastros.css">

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
</style>

<body id="page-login">

    <div id="container">
        <header class="page-header">
            <div class="top-bar-container">
                <nav class="navbar">
                    <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                    <!-- <ul class="navbar-links">
                        <li>
                            <a class="portugues" href="./cadastrar-login.php">Cadastre-se</a>
                        </li>
                    </ul> -->
                </nav>
            </div>

            <div class="header-content">
                <div>

                </div>
                <strong>Login</strong>
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
            <div style="text-align:center">
                <a href="http://redemobilidade.pmf.sc.gov.br/cadastro/loginmain/redefinirsenha.php"> Esqueceu sua Senha?</a>
            </div>


        </main>
        <footer class="footer">Secretaria Municipal de Mobilidade e Planejamento Urbano<br>(48) 3222-1457<br><a style="color:white" href="mailto:dpft.smpu@pmf.sc.gov.br">dpft.smpu@pmf.sc.gov.br</a></footer>
    </div>

</body>

</html>