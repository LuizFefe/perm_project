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
        <script src="../public/scripts/formauxiliar.js" defer></script>
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
                        <strong class="portugues">Cadastro de Auxiliar</strong>
                        <p class="portugues">Preencha aqui com seus dados.</p>
                    </div>
                </div>
                <div id="stage1" style="display:none">
                </div>
            </header>

            <main>
                <!-- action="./src/cadastrar_viagem_db.php"   onsubmit="return validarmotorista()" -->
                <form method="post" id="cadastrar_viagem" action="../src/motorista/cadastrar_motorista_db.php" onsubmit="return validarmotorista()" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?> ">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações Sobre o Auxiliar</legend>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two">
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
                                    <label class="portugues" for="cidade_origem">Telefone</label>
                                    <input type="text" class="telefone" id="telefone" name="telefone" />
                                    <small id="telefone_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="operador_cep">Código postal</label>
                                    <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
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
                                    <input name="cidade" type="text" id="cidade" size="40" />
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
                                    <option value="CO01 - R. ARACY VAZ CALADO">CO01 - R. ARACY VAZ CALADO</option>
                                    <option value="CO02 - R. SANTOS SARAIVA">CO02 - R. SANTOS SARAIVA</option>
                                    <option value="CO03 - AV. SANTA CATARINA">CO03 - AV. SANTA CATARINA</option>
                                    <option value="CO04 - HOSPITAL FLORIANÓPOLIS">CO04 - HOSPITAL FLORIANÓPOLIS</option>
                                    <option value="CO05 - JARDIM ATLÂNTICO-ANGELONI">CO05 - JARDIM ATLÂNTICO-ANGELONI</option>
                                    <option value="CO06 - PRAÇA PAULO SCHLEMPER">CO06 - PRAÇA PAULO SCHLEMPER</option>
                                    <option value="CO07 - R.WALDEMAR OURIQUES">CO07 - R.WALDEMAR OURIQUES</option>
                                    <option value="CO08 - MONTE CRISTO/JARDIM PANORAMA">CO08 - MONTE CRISTO/JARDIM PANORAMA</option>
                                    <option value="CO09 - ABRAÃO-PRACINHA">CO09 - ABRAÃO-PRACINHA</option>
                                    <option value="CO10 - R. ABEL CAPELA">CO10 - R. ABEL CAPELA</option>
                                    <option value="CO11 - PRAÇA PRAIA DO MEIO-COQUEIROS">CO11 - PRAÇA PRAIA DO MEIO-COQUEIROS</option>
                                    <option value="CE01 - PRAÇA XV DE NOVEMBRO">CE01 - PRAÇA XV DE NOVEMBRO</option>
                                    <option value="CE02 - RODOVIÁRIA RITA MARIA">CE02 - RODOVIÁRIA RITA MARIA</option>
                                    <option value="CE04 - R. FRANCISO TOLENTINO">CE04 - R. FRANCISO TOLENTINO</option>
                                    <option value="CE05 - PRAÇA LAURO MULLER-MAJESTIC">CE05 - PRAÇA LAURO MULLER-MAJESTIC</option>
                                    <option value="CE06 - R.TENENTE SILVEIRA-BIBLIOTECA PÚBLICA">CE06 - R.TENENTE SILVEIRA-BIBLIOTECA PÚBLICA</option>
                                    <option value="CE07 - AV.BEIRA MAR-NOVOTEL">CE07 - AV.BEIRA MAR-NOVOTEL</option>
                                    <option value="CE08 - AV.PAULO FONTES-MERCADO PÚBLICO">CE08 - AV.PAULO FONTES-MERCADO PÚBLICO</option>
                                    <option value="CE09 - PRAÇA TANCREDO NEVES">CE09 - PRAÇA TANCREDO NEVES</option>
                                    <option value="CE10 - MATERNIDADE CARMELA DUTRA">CE10 - MATERNIDADE CARMELA DUTRA</option>
                                    <option value="CE11 - PRAÇA ESTEVE JÚNIOR">CE11 - PRAÇA ESTEVE JÚNIOR</option>
                                    <option value="CE12 - R. ESTEVES JÚNIOR">CE12 - R. ESTEVES JÚNIOR</option>
                                    <option value="CE13 - SHOPPING BEIRA MAR">CE13 - SHOPPING BEIRA MAR</option>
                                    <option value="CE14 - AV. RIO BRANCO">CE14 - AV. RIO BRANCO</option>
                                    <option value="CE15 - AV. HERCÍLIO LUZ-PÇ OLIVIO AMORIM">CE15 - AV. HERCÍLIO LUZ-PÇ OLIVIO AMORIM</option>
                                    <option value="CE16 - LARGO BENJ. CONSTANT-SUP.HIPPO">CE16 - LARGO BENJ. CONSTANT-SUP.HIPPO</option>
                                    <option value="CE17 - AV HERCÍLIO LUZ-CLUBE 12">CE17 - AV HERCÍLIO LUZ-CLUBE 12</option>
                                    <option value="CE18 - R. MAJOR COSTA">CE18 - R. MAJOR COSTA</option>
                                    <option value="CE19 - PRAÇA SANTOS DUMONT">CE19 - PRAÇA SANTOS DUMONT</option>
                                    <option value="CE20 - SHOPPING IGUATEMI">CE20 - SHOPPING IGUATEMI</option>
                                    <option value="CE21 - AGRONÔMICA-HOSPITAL INFANTIL">CE21 - AGRONÔMICA-HOSPITAL INFANTIL</option>
                                    <option value="CE22 - AV. BEIRA MAR-ANGELONI">CE22 - AV. BEIRA MAR-ANGELONI</option>
                                    <option value="CE23 - AV. MADRE BENVENUTA-UDESC">CE23 - AV. MADRE BENVENUTA-UDESC</option>
                                    <option value="CE24 - R. DEP. ANTONIO EDU VIEIRA">CE24 - R. DEP. ANTONIO EDU VIEIRA</option>
                                    <option value="CE25 - ROD. ADMAR GONZAGA-CEPON">CE25 - ROD. ADMAR GONZAGA-CEPON</option>
                                    <option value="CE26 - SANTA MÔNICA-ANGELONI">CE26 - SANTA MÔNICA-ANGELONI</option>
                                    <option value="CE27 - R. LAURO LINHARES-TRINDADE">CE27 - R. LAURO LINHARES-TRINDADE</option>
                                    <option value="CE28 - CÓRREGO GRANDE-SUPER IMPERATRIZ">CE28 - CÓRREGO GRANDE-SUPER IMPERATRIZ</option>
                                    <option value="LE01 - LAGOA DA CONCEIÇÃO">LE01 - LAGOA DA CONCEIÇÃO</option>
                                    <option value="NO01 - SHOPPING FLORIPA">NO01 - SHOPPING FLORIPA</option>
                                    <option value="NO02 - MONTE VERDE-BISTEK">NO02 - MONTE VERDE-BISTEK</option>
                                    <option value="NO03 - CANASVIEIRAS-AV. NAÇÔES">NO03 - CANASVIEIRAS-AV. NAÇÔES</option>
                                    <option value="NO04 - INGLESES-ANGELONI">NO04 - INGLESES-ANGELONI</option>
                                    <option value="NO05 - JURERE INTERN.-OPEN SHOPPING">NO05 - JURERE INTERN.-OPEN SHOPPING</option>
                                    <option value="SU01 - AEROPORTO HERCÍLIO LUZ">SU01 - AEROPORTO HERCÍLIO LUZ</option>
                                    <option value="SU02 - JARDIM CALIFÓRNIA-CARIANOS">SU02 - JARDIM CALIFÓRNIA-CARIANOS</option>
                                    <option value="SU03 - SACO DOS LIMÔES-PRAÇA">SU03 - SACO DOS LIMÔES-PRAÇA</option>
                                    <option value="SU04 - RIO TAVARES-UPA SUL">SU04 - RIO TAVARES-UPA SUL</option>
                                </select>
                                <small id="ponto_msg" class="small-message form-text text-muted"></small>

                            </div>
                            <div class="form-check" hidden>
                                <input type="radio" id="aux" name="tipomot" value="auxiliar" class="form-check-input" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sou um Motorista Auxiliar
                                </label>
                                <small id="tipo_mot_msg" class="small-message form-text text-muted"></small>
                            </div>
                            <legend style="margin-top:40px">Documentações necessárias para cadastro</legend>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">CNH</label>
                                            <small id="cnh_msg" class="small-message form-text text-muted"></small>
                                            <div id="cnhdiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="cnh" class="contratosocial custom-file" id="file" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Certidão de Ditribuição Penal- Centro/Continente/Norte</label>
                                            <small id="certpenal_msg" class="small-message form-text text-muted"></small>
                                            <div id="certpendiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="certpenal" class="socios custom-file" id="file" accept="application/pdf">
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
                                                <input type="file" data-msg="cartmot" name="certmun" class="certmun custom-file" id="file" accept="application/pdf">
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
                                                <input type="file" data-msg="cartmot" name="sanidade" class="certestad custom-file" id="file" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Consulta da Pontuação CNH:</label>
                                            <small id="quitacao_msg" class="small-message form-text text-muted"></small>
                                            <div id="quitacaodiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="pontuacao" class="certfed custom-file" id="file" accept="application/pdf">
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
                                                <input type="file" data-msg="cartmot" name="inss" class="inss custom-file" id="file" accept="application/pdf">
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
                                                <input type="file" data-msg="cartmot" name="residencia" class="fgts custom-file" id="file" accept="application/pdf">
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
                                                <input type="file" data-msg="cartmot" name="curso" class="curso custom-file" id="file" accept="application/pdf" />
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


                        <button id="cadastrar-viagem-btn">
                            <div class="portugues">Cadastrar Auxiliar</div>
                        </button>
                    </footer>
                </form>
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
                document.getElementById('cidade').value = ("");

            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value = (conteudo.logradouro);
                    document.getElementById('bairro').value = (conteudo.bairro);
                    document.getElementById('cidade').value = (conteudo.localidade);
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
                        document.getElementById('cidade').value = "...";

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