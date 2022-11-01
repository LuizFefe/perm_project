<?php
session_start();
require_once('../login/session_status.php');
require_once('../src/checkmotoristacadastrado.php');
include_once("../src/conexao.php");
$operador_email = $_SESSION['usuarioEmail'];
$cpf_usuario = $_SESSION['usuariocpf'];
$cpf_usuario = trim($cpf_usuario);
$query_44 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario'";
$resultado_44 = $conn->query($query_44);
$resultado_44_count = $resultado_44->rowCount();
if ($resultado_44_count == 0) {

?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Permissionário </title>
        <!-- CSS only -->
        <link rel="stylesheet" href="../public/styles/main.css">
        <link rel="stylesheet" href="../public/styles/partials/header.css">
        <link rel="stylesheet" href="../public/styles/partials/forms.css">
        <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">
        <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
        <link rel="stylesheet" href="../public/styles/partials/modal-passageiros.css">
        <!-- <link rel="stylesheet" href="../public/styles/partials/fichagestao.css"> -->
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
        <script src="../public/scripts/form.js" defer></script>
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

        /*  label {
            display: block;
        } */
    </style>

    <body id="page-cadastrar-viagens">

        <div id="container">
            <header class="page-header">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
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
                        <strong class="portugues">Cadastro de Permissionário</strong>
                        <p class="portugues">Preencha aqui com seus dados.</p>
                    </div>
                </div>
                <div id="stage1" style="display:none">
                </div>
            </header>

            <main>
                <!-- action="./src/cadastrar_viagem_db.php"   onsubmit="return validarmotorista()" -->
                <form method="post" id="cadastrar_permissionario" action="../src/motorista/cadastrar_motorista_db.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?> ">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações sobre o Permissionário</legend>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two" style="margin-bottom: -20px">
                                <div class="input-block">
                                    <label for="estado_origem">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome">
                                    <small id="nome_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Email</label>
                                    <input id="email" name="email" class="form-control" value="<?php echo $operador_email ?> " readonly />
                                    <h2 id="result"></h2>
                                    <small id="email_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">CPF</label>
                                    <input id="cpf" name="cpf" type="text" value="<?php echo $cpf_usuario ?> " readonly>
                                    <small id="cpf_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">CMC</label>
                                    <input type="text" class="form-control" name="cmc" id="cmc">
                                    <small id="cmc_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Nº Ordem do Permissionário</label>
                                    <input class="form-control" type="text" name="permcode" id="permcode" />
                                    <small id="tipo_codperm_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Telefone</label>
                                    <input type="text" class="telefone" id="telefone" name="telefone" />
                                    <small id="telefone_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="operador_cep">Código postal</label>
                                    <input name="cep" type="text" id="ceppf" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
                                    <small id="cep_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="operador_logradouro">
                                        Logradouro
                                    </label>
                                    <input name="rua" type="text" id="rua" size="60" />
                                    <small id="rua_msg" class="small-message form-text text-muted"></small>

                                </div>
                            </div>



                            <div class="input-block grid grid-four">

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Bairro</label>
                                    <input name="bairro" type="text" id="bairro" size="40" />
                                    <small id="bairro_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Cidade</label>
                                    <input name="cidade" type="text" id="cidadepf" size="40" />
                                    <small id="cidade_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Número</label>
                                    <input type="text" class="form-control" name="numero" id="numero" aria-describedby="operador_numero_endereco_helpId">
                                    <small id="numero_msg" class="form-text text-muted">
                                        <div class="portugues">Ex:43</div>
                                    </small>
                                    <small id="num_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complemento" aria-describedby="operador_complemento_endereco_helpId">
                                    <small id="operador_complemento_endereco_helpId" class="form-text text-muted">
                                        <div class="portugues">Ex:Bloco 1</div>
                                    </small>
                                    <small id="operador_complemento_endereco_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="select-block" style="margin-bottom:15px">
                                <label for="pontos">Local do Ponto</label>
                                <select class="form-control" name="pontos" id="pontos">
                                    <option disabled selected>Selecione o ponto</option>
                                    <option value="R. ARACY VAZ CALADO">R. ARACY VAZ CALADO</option>
                                    <option value="R. SANTOS SARAIVA">R. SANTOS SARAIVA</option>
                                    <option value="AV. SANTA CATARINA">AV. SANTA CATARINA</option>
                                    <option value="HOSPITAL FLORIANÓPOLIS">HOSPITAL FLORIANÓPOLIS</option>
                                    <option value="JARDIM ATLÂNTICO-ANGELONI">JARDIM ATLÂNTICO-ANGELONI</option>
                                    <option value="PRAÇA PAULO SCHLEMPER">PRAÇA PAULO SCHLEMPER</option>
                                    <option value="R.WALDEMAR OURIQUES">R.WALDEMAR OURIQUES</option>
                                    <option value="MONTE CRISTO/JARDIM PANORAMA">MONTE CRISTO/JARDIM PANORAMA</option>
                                    <option value="ABRAÃO-PRACINHA">ABRAÃO-PRACINHA</option>
                                    <option value="R. ABEL CAPELA">R. ABEL CAPELA</option>
                                    <option value="PRAÇA PRAIA DO MEIO-COQUEIROS">PRAÇA PRAIA DO MEIO-COQUEIROS</option>
                                    <option value="PRAÇA XV DE NOVEMBRO">PRAÇA XV DE NOVEMBRO</option>
                                    <option value="RODOVIÁRIA RITA MARIA">RODOVIÁRIA RITA MARIA</option>
                                    <option value="R. FRANCISO TOLENTINO">R. FRANCISO TOLENTINO</option>
                                    <option value="PRAÇA LAURO MULLER-MAJESTIC">PRAÇA LAURO MULLER-MAJESTIC</option>
                                    <option value="R.TENENTE SILVEIRA-BIBLIOTECA PÚBLICA">R.TENENTE SILVEIRA-BIBLIOTECA PÚBLICA</option>
                                    <option value="AV.BEIRA MAR-NOVOTEL">AV.BEIRA MAR-NOVOTEL</option>
                                    <option value="AV.PAULO FONTES-MERCADO PÚBLICO">AV.PAULO FONTES-MERCADO PÚBLICO</option>
                                    <option value="PRAÇA TANCREDO NEVES">PRAÇA TANCREDO NEVES</option>
                                    <option value="MATERNIDADE CARMELA DUTRA">MATERNIDADE CARMELA DUTRA</option>
                                    <option value="PRAÇA ESTEVES JÚNIOR">PRAÇA ESTEVES JÚNIOR</option>
                                    <option value="R. ESTEVES JÚNIOR">R. ESTEVES JÚNIOR</option>
                                    <option value="SHOPPING BEIRA MAR">SHOPPING BEIRA MAR</option>
                                    <option value="AV. RIO BRANCO">AV. RIO BRANCO</option>
                                    <option value="AV. HERCÍLIO LUZ-PÇ OLIVIO AMORIM">AV. HERCÍLIO LUZ-PÇ OLIVIO AMORIM</option>
                                    <option value="LARGO BENJ. CONSTANT-SUP.HIPPO">LARGO BENJ. CONSTANT-SUP.HIPPO</option>
                                    <option value="AV HERCÍLIO LUZ-CLUBE 12">AV HERCÍLIO LUZ-CLUBE 12</option>
                                    <option value="R. MAJOR COSTA">R. MAJOR COSTA</option>
                                    <option value="PRAÇA SANTOS DUMONT">PRAÇA SANTOS DUMONT</option>
                                    <option value="SHOPPING IGUATEMI">SHOPPING IGUATEMI</option>
                                    <option value="AGRONÔMICA-HOSPITAL INFANTIL">AGRONÔMICA-HOSPITAL INFANTIL</option>
                                    <option value="AV. BEIRA MAR-ANGELONI">AV. BEIRA MAR-ANGELONI</option>
                                    <option value="AV. MADRE BENVENUTA-UDESC">AV. MADRE BENVENUTA-UDESC</option>
                                    <option value="R. DEP. ANTONIO EDU VIEIRA">R. DEP. ANTONIO EDU VIEIRA</option>
                                    <option value="ROD. ADMAR GONZAGA-CEPON">ROD. ADMAR GONZAGA-CEPON</option>
                                    <option value="SANTA MÔNICA-ANGELONI">SANTA MÔNICA-ANGELONI</option>
                                    <option value="R. LAURO LINHARES-TRINDADE">R. LAURO LINHARES-TRINDADE</option>
                                    <option value="CÓRREGO GRANDE-SUPER IMPERATRIZ">CÓRREGO GRANDE-SUPER IMPERATRIZ</option>
                                    <option value="LAGOA DA CONCEIÇÃO">LAGOA DA CONCEIÇÃO</option>
                                    <option value="SHOPPING FLORIPA">SHOPPING FLORIPA</option>
                                    <option value="MONTE VERDE-BISTEK">MONTE VERDE-BISTEK</option>
                                    <option value="CANASVIEIRAS-AV. NAÇÔES">CANASVIEIRAS-AV. NAÇÔES</option>
                                    <option value="INGLESES-ANGELONI">INGLESES-ANGELONI</option>
                                    <option value="JURERE INTERN.-OPEN SHOPPING">JURERE INTERN.-OPEN SHOPPING</option>
                                    <option value="AEROPORTO HERCÍLIO LUZ">AEROPORTO HERCÍLIO LUZ</option>
                                    <option value="JARDIM CALIFÓRNIA-CARIANOS">JARDIM CALIFÓRNIA-CARIANOS</option>
                                    <option value="SACO DOS LIMÔES-PRAÇA">SACO DOS LIMÔES-PRAÇA</option>
                                    <option value="RIO TAVARES-UPA SUL">RIO TAVARES-UPA SUL</option>
                                    <option value="PRAÇA PEREIRA OLIVEIRA/DEODORO">PRAÇA PEREIRA OLIVEIRA/DEODORO</option>
                                </select>
                                <small id="ponto_msg" class="small-message form-text text-muted"></small>

                            </div>
                            <div class="form-check" hidden>
                                <div>
                                    <input type="radio" id="perm" name="tipomot" value="permissionario" class="form-check-input" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Sou um Motorista Permissionário
                                    </label>
                                </div>
                            </div>
                            <legend style="margin-top:40px">Documentações necessárias para cadastro</legend>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Álvara</label>
                                            <small id="alvara_msg" class="small-message form-text text-muted"></small>
                                            <div id="alvaradiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="alvara" class="alvara custom-file" id="alvara" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divalvara-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="alvara-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">CNH</label>
                                            <small id="cnh_msg" class="small-message form-text text-muted"></small>
                                            <div id="cnhdiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="cnh" class="contratosocial custom-file" id="cnh" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divcontratosocial-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="contratosocial-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Certidão Negativa Criminal</label>
                                            <small id="certpenal_msg" class="small-message form-text text-muted"></small>
                                            <div id="certpendiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="certpenal" class="socios custom-file" id="certpenal" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divsocios-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="socios-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Certificado de Negativa Municipal</label>
                                            <small id="certnum_msg" class="small-message form-text text-muted"></small>
                                            <div id="negmunidiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="certmun" class="certmun custom-file" id="certmun" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divcertmun-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="certmun-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Atestado de Sanidade Física e Mental:</label>
                                            <small id="sanidade_msg" class="small-message form-text text-muted"></small>
                                            <div id="sanidadediv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="sanidade" class="certestad custom-file" id="sanidade" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divcertestad-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="certestad-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                             <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Consulta de Pontuação CNH:</label>
                                            <small id="pontuacao_msg" class="small-message form-text text-muted"></small>
                                            <div id="pontuacaodiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="pontuacao" id="pontuacao" class="certfed custom-file" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divcertfed-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="certfed-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Cert. Neg. INSS:</label>
                                            <small id="inss_msg" class="small-message form-text text-muted"></small>
                                            <div id="inssdiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="inss" class="inss custom-file" id="inss" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divinss-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="inss-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Comprovante de Residência:</label>
                                            <small id="residencia_msg" class="small-message form-text text-muted"></small>
                                            <div id="residenciadiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="residencia" class="fgts custom-file" id="residencia" accept="application/pdf">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divfgts-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="fgts-cartmot"></span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Curso de Condutor:</label>
                                            <small id="curso_msg" class="small-message form-text text-muted"></small>
                                            <div id="cursodiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="curso" class="curso custom-file" id="curso" accept="application/pdf" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divcurso-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="curso-cartmot"></span>
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

                            <strong>Termo de Compromisso</strong>

                        </div>
                        <div>
                            <input type="checkbox" id="scales" name="scales">
                            <label for="scales">Declaro que as informações acima prestadas são verdadeiras, e assumo a inteira responsabilidade pelas mesmas.</label>
                            <small id="info_msg" class="small-message form-text text-muted"></small>
                        </div>
                    </div>


                    <button id="cadastrar-permissionario">
                        <div class="portugues">Cadastrar Permissionário</div>
                    </button>
                </footer>
            </main>


        </div>

        <script>
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
                const $result = $('#result');
                const email = $('#email').val();
                $result.text('');

                if (validateEmail(email)) {
                    $result.html('<i class="fas fa-check" style="color:green;font-size:17px"></i>');
                } else {
                    $result.html('<i class="fas fa-times" style="color:red;font-size:17px"></i>');
                }
                return false;
            }

            $('#email').on('input', validate);

            jQuery("input.telefone")
                .mask("(99) 9999-9999?9")
                .focusout(function(event) {
                    var target, phone, element;
                    target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                    phone = target.value.replace(/\D/g, '');
                    element = $(target);
                    element.unmask();
                    if (phone.length > 10) {
                        element.mask("(99) 99999-999?9");
                    } else {
                        element.mask("(99) 9999-9999?9");
                    }
                });

            function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value = ("");
                document.getElementById('bairro').value = ("");
                document.getElementById('cidadepf').value = ("");

            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value = (conteudo.logradouro);
                    document.getElementById('bairro').value = (conteudo.bairro);
                    document.getElementById('cidadepf').value = (conteudo.localidade);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }

            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value = "...";
                        document.getElementById('bairro').value = "...";
                        document.getElementById('cidadepf').value = "...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };
        </script>

    </body>

    </html><?php } ?>