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
    <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-operadoras.css">
    <link rel="stylesheet" href="../public/styles/footercadastros.css">
    <!-- <link rel="stylesheet" href="../public/styles/partials/page-login.css"> -->
    <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
    <link rel="stylesheet" href="../public/styles/partials/modal-passageiros.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../public/scripts/on-off.js"></script>
    <script src="../public/scripts/validate-login.js"></script>

    <script src="https://kit.fontawesome.com/46b9108a1b.js" crossorigin="anonymous"></script>
    <script src="../public/scripts/form.js" defer></script>
    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>
    <script>

    </script>

</head>
<style>
    label {
        font-size: 20px
    }

    .logo_selo_horizontal {
        min-width: 0;
    }
</style>

<body id="page-cadastrar-operadoras">

    <div id="container">
        <header class="page-header">
            <!-- header menu local load -->
            <!-- <div data-include="headermenu_index1"></div> -->
            <div data-include="headermenu2logos"></div>
            <div class="header-contentnew">
                <strong>Cadastro de Usuário</strong>
            </div>
            <div class="headmessage-div">
                <b class="header-message">Preencha com suas informações e comece a navegar na plataforma.</b>
            </div>
        </header>
        <!--     <header class="page-header">
            <div class="top-bar-container">
                <nav class="navbar">
                    <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                    <ul class="navbar-links">
                        <li>
                            <a class="portugues" href="./login.php">Entrar</a>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="header-content">
                <div>
                    <strong class="portugues">Cadastro de Usuário</strong>
                    <p class="portugues">Preencha com suas informações <br> e comece a navegar na plataforma.</p>
                </div>
            </div>
        </header> -->

        <main>
            <!-- action="./src/cadastrar_operadora_db.php"  onsubmit="return validateForm()"-->
            <form id="operadorform" action="../src/cadastrar_login_db.php" method="POST">

                <fieldset id="cadastro_operadora" class="div-show" style="display: block;">

                    <legend class="portugues"> Dados de Cadastro</legend>

                    <div class="cadastro_operador_show" id="cadastro_operador_show" style="display: block;">

                        <div class="input-block grid grid-tree-nome-documento">

                            <div class="input-block">
                                <label for="operador_documento">CPF</label>
                                <input type="text" class="form-control" name="operador_documento" id="operador_documento" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );"><span id="cpfResponse"></span>
                                <small id="operador_documento_msg" class="small-message form-text text-muted"></small>
                            </div>
                        </div>

                        <div class="input-block grid grid-tree-equal">
                            <div class="input-block">
                                <label class="portugues" for="operador_email">E-mail</label>
                                <input type="email" class="form-control" name="operador_email" id="operador_email" placeholder="email@email.com"><span id="emailresponse"></span>
                                <small id="operador_email_msg" class="small-message text-muted"></small>
                            </div>

                            <div class="input-block">
                                <label class="portugues" for="operador_email_rep">Confirmar E-mail</label>
                                <input type="email" class="form-control" name="operador_email_rep" id="operador_email_rep" placeholder="email@email.com">
                                <small id="operador_email_rep_msg" class="small-message text-muted"></small>
                            </div>
                        </div>
                        <div class="input-block grid grid-two">
                            <div class="input-block">
                                <label class="portugues" for="operador_senha">Senha</label>
                                <input type="password" name="operador_senha" id="operador_senha" class="form-control" aria-describedby="helpId_operador_senha">
                                <small id="operador_senha_msg" class="small-message text-muted"></small>
                            </div>
                            <div class="input-block">
                                <label class="portugues" for="operador_ddd">Repetir senha</label>
                                <input type="password" name="operador_rep_senha" id="operador_rep_senha" class="form-control" aria-describedby="helpId">
                                <small id="operador_rep_senha_msg" class="small-message text-muted"></small>
                            </div>
                            <div class="select-block" style="margin-bottom:15px">
                                <label for="pontos">Tipo do Cadastro</label>
                                <select class="form-control" name="tipo" id="tipo">
                                    <option disabled selected>Selecione o Tipo do Cadastro</option>
                                    <option value="escolar">Escolar</option>
                                    <option value="taxista">Taxista</option>
                                    <option value="embarcacoes">Turismo</option>
                                </select>
                                <small id="ponto_msg" class="small-message form-text text-muted"></small>

                            </div>

                        </div>

                    </div>

                </fieldset>



            </form>
            <footer>
                <p class="portugues">
                    Importante! <br>
                    Preencha todos os dados corretamente
                </p>

                <button id="button">
                    <div class="portugues">Salvar cadastro</div>


                </button>
            </footer>
            <!-- <footer class="footercadastro">
                <p class="portugues footer-text">
                    Já tem uma conta? <br>
                    Acesse no botão abaixo!
                </p>

                <button class="login-button" id="buttonnotlog">
                    <div class="portugues">Faça o login!</div>
                </button>
            </footer> -->
        </main>
        <div data-include="FOOTERlogos"></div>
    </div>

    <script>
        $(function() {
            var includes = $('[data-include]')
            $.each(includes, function() {
                var file = '../../general/public/views/' + $(this).data('include') + '.php'
                $(this).load(file)
            })
        })

        function is_cpf(c) {

            if ((c = c.replace(/[^\d]/g, "")).length != 11)
                return false

            if (c == "00000000000")
                return false;

            var r;
            var s = 0;

            for (i = 1; i <= 9; i++)
                s = s + parseInt(c[i - 1]) * (11 - i);

            r = (s * 10) % 11;

            if ((r == 10) || (r == 11))
                r = 0;

            if (r != parseInt(c[9]))
                return false;

            s = 0;

            for (i = 1; i <= 10; i++)
                s = s + parseInt(c[i - 1]) * (12 - i);

            r = (s * 10) % 11;

            if ((r == 10) || (r == 11))
                r = 0;

            if (r != parseInt(c[10]))
                return false;

            return true;
        }


        function fMasc(objeto, mascara) {
            obj = objeto
            masc = mascara
            setTimeout("fMascEx()", 1)
        }

        function fMascEx() {
            obj.value = masc(obj.value)
        }

        function mCPF(cpf) {
            cpf = cpf.replace(/\D/g, "")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
            return cpf
        }

        cpfCheck = function(el) {
            document.getElementById('cpfResponse').innerHTML = is_cpf(el.value) ? '<i class="fas fa-check" style="color:green;font-size:17px"></i>' : '<i class="fas fa-times" style="color:red;font-size:17px"></i>';
            if (el.value == '') document.getElementById('cpfResponse').innerHTML = '';
        }
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

        const validate = () => {
            const $operador_email_msg = $('#emailresponse');
            const email = $('#operador_email').val();
            $operador_email_msg.text('');

            if (validateEmail(email)) {
                $operador_email_msg.html('<i class="fas fa-check" style="color:green;font-size:17px"></i>');
            } else {
                $operador_email_msg.html('<i class="fas fa-times" style="color:red;font-size:17px"></i>');
            }
            return false;
        }

        $('#operador_email').on('input', validate);
    </script>
</body>

</html>