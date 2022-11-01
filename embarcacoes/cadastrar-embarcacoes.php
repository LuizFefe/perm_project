<?php
session_start();
require_once('../login/session_statusembarcacoes.php');

/* require_once('../src/checkmotoristacadastrado.php'); */
include_once("../src/conexao.php");

$operador_email = $_SESSION['embarcacoesEmail'];
$cpf_usuario = $_SESSION['embarcacoescpf'];
$cpf_usuario = trim($cpf_usuario);
$query_44 = "SELECT * FROM permissionarios.motoristaescolar WHERE email = '$operador_email'";
$resultado_44 = $conn->query($query_44);
$resultado_44_count = $resultado_44->rowCount();
if ($resultado_44_count == 0) {

?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Autorizado</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <script src="../public/scripts/on-off.js"></script>
        <link rel="stylesheet" href="/code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/ea90353efe.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../public/styles/partials/forms.css">
        <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">
        <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
        <link rel="stylesheet" href="../public/styles/partials/modal-passageiros.css">
        <link rel="stylesheet" href="../public/styles/partials/newheader.css">
        <link rel="stylesheet" href="../public/styles/main.css">
        <link rel="stylesheet" href="../public/styles/footercadastros.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="../public/scripts/formturismo.js" defer></script>

        <script src="../public/scripts/mobile-nav-bar-active.js" defer></script>
        <script>
            if (screen && screen.width > 480) {
                document.write('<script src="../public/scripts/pdfpreview.js" defer><\/script>');
            }
        </script>
        <!--  <link rel="stylesheet" href="../public/styles/main.css">
        <link rel="stylesheet" href="../public/styles/partials/header.css">
        <link rel="stylesheet" href="../public/styles/partials/forms.css">
        <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">
        <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
        <link rel="stylesheet" href="../public/styles/partials/modal-passageiros.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <script src="../public/scripts/on-off.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://kit.fontawesome.com/ea90353efe.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../public/scripts/formturismo.js" defer></script>
        <script src="../public/scripts/pdfpreview.js" defer></script>
        <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script> -->

    </head>
    <script>
        $(function() {
            $(document).tooltip();
        });
    </script>
    <style>
        input,
        textarea {
            padding: 8px;
        }

        input[type="file"] {
            padding: 0px;
        }

        div:focus {
            background-color: rgba(255, 0, 0, .3);
            border-radius: 25px;
        }

        input[type="checkbox"] {
            zoom: 1.7;
        }

        input[type=checkbox] {
            vertical-align: middle;
            position: relative;
            bottom: 1px;
        }

        .swal2-popup {
            font-size: 20px !important;
            border-radius: 25px;
        }

        #tipodocumento {
            font-size: 25px;
            height: 35px;
            font-family: "montserrat";
        }
    </style>

    <body id="page-cadastrar-viagens">

        <div id="container">
            <!--  <header class="page-header">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                        <div style="color:white;font-size:40px;margin-right: 3%;">Turismo</div>
                        <ul class="navbar-links">
                            <li>
                                <a class="portugues" href="./home.php">Inicio</a>
                            </li>
                            <li>
                                <a class="portugues" href="../login/sair.php">Sair</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <div class="header-content">
                    <div>
                        <strong class="portugues">Cadastro de Autorizado</strong>
                        <p class="portugues">Preencha aqui com seus dados.</p>
                    </div>
                </div>
            </header> -->
            <header class="page-header" style="padding-bottom: 40px;">
                <div data-include="headermenu_ipuf"></div>
                <div data-include="headermenu_perms"></div>
                <div class="header-content">
                    <div class="top-bar-container">
                        <nav class="navbar navheader">
                            <strong style="font-size: 60px;">Cadastro de Autorizado</strong>
                            <blockquote>Preencha aqui com seus dados</blockquote>
                        </nav>
                    </div>

                </div>
            </header>
            <main>
                <form method="post" id="cadastrar_pj" action="../src/embarcacoes/cadastrar_turismo_db.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?> ">
                    <input type="hidden" name="tipocadastro" id="tipocadastro" value="CNPJ">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações sobre o Autorizado</legend>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Razão Social</label>
                                    <input type="text" class="form-control" name="razaosocial" id="razaosocial">
                                    <small id="razaosocial_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label for="estado_origem">Nome Fantasia</label>
                                    <input type="text" class="form-control" name="nomepj" id="nomepj">
                                    <small id="nome_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">CNPJ<a href="#" title="Cadastro Nacional de Pessoa Jurídica"><i class="fa-solid fa-circle-question"></i></a><!--  --></label>
                                    <input type="number" class="form-control" name="cnpj" id="CNPJ">
                                    <small id="cnpj_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Telefone</label>
                                    <input type="text" class="telefone" id="telefonepj" name="telefonepj" />
                                    <small id="telefone_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">CMC<a href="#" title="Cadastro Municipal de Contribuentes"><i class="fa-solid fa-circle-question"></i></a></label>
                                    <input type="number" class="form-control" name="cmc" id="cmc">
                                    <small id="cmc_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Email</label>
                                    <input id="emailpj" name="emailpj" class="form-control" value="<?php echo $operador_email ?>" readonly />
                                    <h2 id="result"></h2>
                                    <small id="email_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="operador_cep">Código postal</label>
                                    <input name="ceppj" type="text" id="ceppj" value="" size="10" maxlength="9" onblur="pesquisaceppj(this.value);" />
                                    <small id="cep_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="operador_logradouro">
                                        Logradouro
                                    </label>
                                    <input name="ruapj" type="text" id="ruapj" size="60" />
                                    <small id="rua_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-four">

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Bairro</label>
                                    <input name="bairropj" type="text" id="bairropj" size="40" />
                                    <small id="bairro_msgpj" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Cidade</label>
                                    <input name="cidadepj" type="text" id="testepj" size="40" />
                                    <small id="cidade_msgpj" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Número</label>
                                    <input type="text" class="form-control" name="numeropj" id="numeropj" aria-describedby="operador_numero_endereco_helpId">
                                    <small id="numero_msgpj" class="form-text text-muted">
                                        <div class="portugues">Ex:43</div>
                                    </small>
                                    <small id="numpj_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Complemento</label>
                                    <input type="text" class="form-control" name="complementopj" id="complementopj" aria-describedby="operador_complemento_endereco_helpId">
                                    <small id="operador_complemento_endereco_helpId" class="form-text text-muted">
                                        <div class="portugues">Ex:Bloco 1</div>
                                    </small>
                                    <small id="operador_complemento_endereco_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div style="white-space: nowrap">
                                <legend class="portugues" style="margin-top:45px;justify-content:normal">Documentos a serem enviados <b style="font-size: 20px;margin-left: 30px;"> (Serão aceitos somente formato pdf)</b>
                                </legend>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Alvará<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="alvarapj_msg" class="small-message form-text text-muted"></small>
                                        <div id="alvarapjdiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="alvarapj" class="alvarapj custom-file" id="alvarapj" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divalvarapj-cartmot" style="display: none;">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="alvarapj-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Cartão CNPJ<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="cnpjcard_msg" class="small-message form-text text-muted"></small>
                                        <div id="cnpjcarddiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cnpjcard" name="cnpjcard" class="arquivoPDF custom-file" id="cnpjcard" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divpdf-cnpjcard" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cnpjcard" class="col-form-label showhide" id="control-show-cnpjcard" style="display:block">Preview<b></b></label>
                                        <label data-msg="cnpjcard" class="col-form-label showhide" id="control-hide-cnpjcard" style="display:none">Preview<b>(+)</b></label>
                                        <span id="pdf-cnpjcard"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certidão Negativa Municipal<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="negmunpj_msg" class="small-message form-text text-muted"></small>
                                        <div id="negmunpjdiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="negmunpj" class="negmunpj custom-file" id="negmunpj" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divnegmunpj-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="negmunpj-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certidão Negativa Estadual<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="negestpg_msg" class="small-message form-text text-muted"></small>
                                        <div id="negestpgdiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="negestpg" class="negestpg custom-file" id="negestpg" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divnegestpg-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="negestpg-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certidão Negativa Federal<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="negfedpj_msg" class="small-message form-text text-muted"></small>
                                        <div id="negfedpjediv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="negfedpj" class="negfedpj custom-file" id="negfedpj" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divnegfedpj-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="negfedpj-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certidao Negativa INSS<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="neginsspj_msg" class="small-message form-text text-muted"></small>
                                        <div id="neginsspjdiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="neginsspj" class="neginsspj custom-file" id="neginsspj" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divneginsspj-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="neginsspj-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certidao Negativa FGTS<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="fgtspj_msg" class="small-message form-text text-muted"></small>
                                        <div id="negfgtspjdiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="negfgtspj" class="negfgtspj custom-file" id="negfgtspj" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divnegfgtspj-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="negfgtspj-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Contrato Social</label>
                                        <small id="contratosocial_msgpfmei" class="small-message form-text text-muted"></small>
                                        <div id="contsocialdiv" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="contsocial" name="contsocial" class="arquivoPDF custom-file" id="contsocial" accept="application/pdf" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divpdf-contsocial" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="contsocial" class="col-form-label showhide" id="control-show-contsocial" style="display:block">Preview<b></b></label>
                                        <label data-msg="contsocial" class="col-form-label showhide" id="control-hide-contsocial" style="display:none">Preview<b>(+)</b></label>
                                        <span id="pdf-contsocial"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certidão de Antecedentes Criminais<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="certpenal_msgpf" class="small-message form-text text-muted"></small>
                                        <div id="certpendivpf" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="negpen" class="negpen custom-file" id="negpen" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divnegpen-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span id="negpen-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                            <!--  <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Seguro APP<a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label>
                                            <small id="app_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="appdivpf" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="app" name="app" class="arquivoPDF custom-file" id="app" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divpdf-app" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="app" class="col-form-label showhide" id="control-show-app" style="display:block">Preview<b></b></label>
                                            <label data-msg="app" class="col-form-label showhide" id="control-hide-app" style="display:none">Preview<b>(+)</b></label>
                                            <span id="pdf-app"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br> -->
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Comprovante de pagamento DAM (ano anterior)<!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a></label> -->
                                        <small id="dam_msgpf" class="small-message form-text text-muted"></small>
                                        <div id="damdivpf" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="dam" name="dam" class="arquivoPDF custom-file" id="dam" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" id="divpdf-dam" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="dam" class="col-form-label showhide" id="control-show-dam" style="display:block">Preview<b></b></label>
                                        <label data-msg="dam" class="col-form-label showhide" id="control-hide-dam" style="display:none">Preview<b>(+)</b></label>
                                        <span id="pdf-dam"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="operador_email" value="<?php echo $operador_email ?>">
                </form>
                <footer>
                    <div>
                        <div style="margin-bottom:5px">

                            Importante! <br>
                            Preencha todos os dados corretamente

                        </div>
                        <div>
                            <input type="checkbox" id="scalespj" name="scalespj">
                            <label for="scalespj">Afirmo ser verdadeiras as informações aqui fornecidas.</label>
                            <small id="info_msg" class="small-message form-text text-muted"></small>
                        </div>
                    </div>


                    <button id="cadastrar-cnpj">
                        <div class="portugues">Cadastrar Autorizado</div>
                    </button>
                </footer>
            </main>
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

    </html><?php } ?>