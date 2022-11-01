<?php
session_start();
/* require_once('../login/session_statusembarcacoes.php'); */

/* require_once('../src/checkmotoristacadastrado.php'); */
include_once("../src/conexao.php");
/* require_once('../src/checkpermescolar.php'); */
$operador_email = $_SESSION['escolarEmail'];
$cpf_usuario = $_SESSION['escolarcpf'];
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
        <!-- CSS only -->
        <link rel="stylesheet" href="../public/styles/main.css">
        <link rel="stylesheet" href="../public/styles/partials/header.css">
        <link rel="stylesheet" href="../public/styles/partials/forms.css">
        <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">
        <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
        <link rel="stylesheet" href="../public/styles/partials/modal-passageiros.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script src="../public/scripts/on-off.js"></script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

        <script src="https://kit.fontawesome.com/46b9108a1b.js" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../public/scripts/formescolar.js" defer></script>
        <script src="../public/scripts/pdfpreview.js" defer></script>
        <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js"></script>

        <script>
            /* function checkEnter(e) {
            e = e || event;
            var txtArea = /textarea/i.test((e.target || e.srcElement).tagName);
            return txtArea || (e.keyCode || e.which || e.charCode || 0) !== 13;
        }
        document.querySelector('cadastrar_viagem').onkeypress = checkEnter; */
        </script>

    </head>
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
            <header class="page-header">
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
            </header>
                <main>
                    <form method="post" id="cadastrar_pj" action="../src/escolar/cadastrar_pf_db.php" enctype="multipart/form-data">
                        <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?> ">
                        <input type="hidden" name="tipocadastro" id="tipocadastro" value="CNPJ">

                        <fieldset id="informacoes_viagem" class="div-show">
                            <legend class="portugues">Informações Sobre o Autorizado</legend>

                            <div id="informacoes_viagem_show" style="display:block">
                                <div class="input-block grid grid-two" style="margin-bottom: -20px">
                                    <div class="input-block">
                                        <label for="estado_origem">Nome Fantasia</label>
                                        <input type="text" class="form-control" name="nomepj" id="nomepj">
                                        <small id="nome_msgpj" class="small-message form-text text-muted"></small>
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
                                        <label class="portugues" for="cidade_origem">CNPJ</label>
                                        <input type="text" class="form-control" name="cnpj" id="CNPJ">
                                        <small id="cnpj_msgpj" class="small-message form-text text-muted"></small>
                                    </div>
                                    <div class="input-block">
                                        <label class="portugues" for="cidade_origem">CMC</label>
                                        <input type="text" class="form-control" name="cmcpj" id="cmcpj">
                                        <small id="cmc_msgpj" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="input-block grid grid-two">
                                    <div class="input-block">
                                        <label class="portugues" for="cidade_origem">Nº Ordem do Autorizado</label>
                                        <input class="form-control" type="text" name="permcodepj" id="permcodepj" />
                                        <small id="tipo_codperm_msgpj" class="small-message form-text text-muted"></small>
                                    </div>
                                    <div class="input-block">
                                        <label class="portugues" for="cidade_origem">Telefone</label>
                                        <input type="text" class="telefone" id="telefonepj" name="telefonepj" />
                                        <small id="telefone_msgpj" class="small-message form-text text-muted"></small>
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
                                <div class="input-block grid grid-two">
                                    <div class="form-group">
                                        <label for="notapendencia" class="col-form-label" style="font-size:2.5rem"><strong>Bairro/Itinerário:</strong></label>
                                        <textarea width="50%" class="form-control" id="pontopj" style="height:155px;width:100%;border-radius:2px" name="pontopj"></textarea>
                                        <small id="pontopj_msgpj" class="small-message form-text text-muted"></small>
                                    </div>


                                    <div class="form-group">
                                        <label for="notapendencia" class="col-form-label" style="font-size:2.5rem"><strong>Colégio:</strong></label>
                                        <textarea rows="40" class="form-control" id="itinerariopj" style="height:155px;width:100%;border-radius:2px" name="itinerariopj"></textarea>
                                        <small id="itinerariopj_msgpj" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>
                                <div style="white-space: nowrap">
                                    <legend class="portugues" style="margin-top:45px;justify-content:normal">Documentos a serem enviados <b style="font-size: 20px;margin-left: 30px;"> (Serão aceitos somente formato pdf).</b>
                                    </legend>
                                </div>
                                <div class="modal-footer" id="divform_anexararquivo">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="col-form-label text-muted">Alvará</label>
                                                <small id="alvarapj_msg" class="small-message form-text text-muted"></small>
                                                <div id="alvarapjdiv" tabindex="0" class="custom-file">
                                                    <input type="file" data-msg="cartmot" name="alvarapj" class="alvarapj custom-file" id="alvarapj" accept="application/pdf">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row" id="divalvarapj-cartmot" style="display:none">
                                            <div class="col-12">
                                                <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                                <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                                <span class="form-control" id="alvarapj-cartmot"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="modal-footer" id="divform_anexararquivo">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="col-form-label text-muted">Certidão Negativa Municipal</label>
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
                                                <span class="form-control" id="negmunpj-cartmot"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="modal-footer" id="divform_anexararquivo">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="col-form-label text-muted">Certidão Negativa Estadual</label>
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
                                                <span class="form-control" id="negestpg-cartmot"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="modal-footer" id="divform_anexararquivo">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="col-form-label text-muted">Certidão Negativa Federal</label>
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
                                                <span class="form-control" id="negfedpj-cartmot"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="modal-footer" id="divform_anexararquivo">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="col-form-label text-muted">Certidao Negativa INSS</label>
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
                                                <span class="form-control" id="neginsspj-cartmot"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="modal-footer" id="divform_anexararquivo">
                                    <div class="row gx-3 gy-2 align-items-center">

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="col-form-label text-muted">Certidao Negativa FGTS</label>
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
                                                <span class="form-control" id="negfgtspj-cartmot"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

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
        $(document).ready(function() {
            $("#cnpj").mask("99.999.999/9999-99");
        });
        $('#CNPJJ').hide();
        $('#CPFF').hide();
        $('#CPFMEI').hide();
        $('#tipodocumento').change(function() {
            $('#CNPJJ').hide();
            $('#CPFF').hide();
            $('#CPFMEI').hide();
            /*  $('#' + $(this).val()).show();
             console.log('#' + $(this).val())
             if ($(this).val() == 'CPF') {


             }; */
            if ($(this).val() == 'CPF') {
                $('#CPFF').show()
            };
            if ($(this).val() == 'CNPJ') {
                $('#CNPJJ').show()
            };
            if ($(this).val() == 'MEI') {
                $('#CPFMEI').show()
            };
        });
    </script>

    </html><?php } ?>