<?php
session_start();
require_once('../login/session_statusescolar.php');
require_once('../src/checkcarescolar.php');
require_once("../src/conexao.php");
$operador_email = $_SESSION['escolarEmail'];
$data_atual = date("Y-m-d");
$cpf_usuario = $_SESSION['usuariocpf'];
$cpf_usuario = trim($cpf_usuario);
$query_44 = "SELECT * FROM permissionarios.motoristaescolar WHERE email = '$operador_email'";
$resultado_44 = $conn->query($query_44);
$resultado_44_count = $resultado_44->rowCount();
if ($resultado_44_count != 0) {
    while ($row = $resultado_44->fetch()) {
        $nome = $row['nome'];
        $documento = $row['documento'];
        $statusm = $row['status'];
        $tipodocumento = $row['tipodocumento'];
    }
}
/* $query_05 = "SELECT * FROM permissionarios.escolarmotmoni WHERE docpermissionario = '$documento' and tipo = 'Motorista' and status = '1' ";
$resultado_05 = $conn->query($query_05);
$resultado_05_count = $resultado_05->rowCount();
$query_06 = "SELECT * FROM permissionarios.escolarmotmoni WHERE docpermissionario = '$documento' and tipo = 'Monitor' and status = '1'";
$resultado_06 = $conn->query($query_06);
$resultado_06_count = $resultado_06->rowCount();
if (($resultado_06_count >= 1 && $resultado_05_count >= 1) && $statusm == 1) { ?> */
if ($resultado_44 == 1) { ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Autorizado</title>

        <link rel="stylesheet" href="../public/styles/main.css">
        <link rel="stylesheet" href="../public/styles/partials/header.css">
        <link rel="stylesheet" href="../public/styles/partials/forms.css">
        <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">
        <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
        <link rel="stylesheet" href="../public/styles/footercadastros.css">
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <script src="../public/scripts/on-off.js"></script>
        <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../public/scripts/formescolarveiculo.js"></script>
        <script src="../public/scripts/inputmask/dist/jquery.inputmask.js"></script>
        <script src="../public/scripts/pdfpreview.js" defer></script>

    </head>
    <style>
        input,textarea{
            padding: 8px;
        }
        input[type="file"] {
            padding: 0px;
}
        .termo input[type="checkbox"] {
            zoom: 1.7;
        }

        .swal2-popup {
            font-size: 20px !important;
            border-radius: 25px;
        }

        input[type=checkbox] {
            vertical-align: middle;
            position: relative;
            bottom: 1px;
        }

        div:focus {
            background-color: rgba(255, 0, 0, .3);
            border-radius: 25px;
        }
    </style>

    <body id="page-cadastrar-viagens">

        <div id="container">
            <header class="page-header">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                        <div style="color:white;font-size:40px;margin-right: 3%;">Escolar</div>
                        <ul class="navbar-links">
                            <li>
                                <a class="portugues" href="./home.php">Inicio</a>
                            </li>
                            <li>
                                <a class="portugues" href="./login/sair.php">Sair</a>
                            </li>

                        </ul>
                    </nav>
                </div>

                <div class="header-content">
                    <div>

                        <strong class="portugues">Cadastre seu veículo</strong>
                        <p class="portugues">Preencha aqui com os dados do seu veiculo.</p>
                    </div>
                </div>
                <div id="stage1" style="display:none">
                </div>
            </header>

            <main>
                <form method="post" id="cadastrar_carro" action="../src/escolar/cadastrar_carroescolar_db.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?>">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações Sobre o Veiculo</legend>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="municipio">Documento Autorizado:</label>
                                    <input type="text" id="cpf" name="documento" value="<?php echo $documento ?>" readonly>
                                    <small id="" class="small-message form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Placa</label>
                                    <input type="text" class="form-control" name="placa" id="placa">
                                    <small id="placa_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Marca</label>
                                    <input type="text" class="form-control" name="marca" id="marca">
                                    <small id="marca_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>

                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" id="modelo">
                                    <small id="modelo_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="select-block" style="margin-bottom:15px">
                                    <label for="combustivel">Tipo de Combustível</label>
                                    <select class="form-control" name="combustivel" id="combustivel">
                                        <option disabled selected>Selecione o tipo</option>
                                        <option value="Gasolina/Etanol">Gasolina/Etanol</option>
                                        <option value="Gás Natural Veicular (GNV)">Gás Natural Veicular (GNV)</option>
                                        <option value="Diesel">Diesel</option>
                                    </select>
                                    <small id="ponto_msg" class="small-message form-text text-muted"></small>

                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Ano de Fabricação</label>
                                    <input type="text" class="form-control" name="anofab" id="anofab">
                                    <small id="anofab_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Ano do Modelo</label>
                                    <input type="text" class="form-control" name="anomod" id="anomod">
                                    <small id="anomod_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Categoria</label>
                                    <input type="text" class="form-control" name="categoria" id="categoria">
                                    <small id="categoria_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Lotação de Passageiros</label>
                                    <input type="text" class="form-control" name="lotacao" id="lotacao">
                                    <small id="lotacao_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="municipio">Municipio</label>
                                    <input type="text" id="municipio" name="municipio" value="Florianópolis" readonly>
                                    <small id="estado_origem_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="chassi">Chassi</label>
                                    <input type="text" class="form-control" name="chassi" id="chassi">
                                    <small id="chassi_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label class="portugues" for="renavam">Renavam</label>
                                    <input type="text" class="form-control" name="renavam" id="renavam">
                                    <small id="renavam_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="validadeapp">Validade APP</label>
                                    <input type="date" class="form-control" name="validadeapp" id="validadeapp">
                                    <small id="validadeapp_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                </div>
                                <div class="input-block">
                                    <div style="margin-top:20px;">
                                        <input type="checkbox" id="adaptado" name="adaptado" value="sim" style="height:2rem;width:5%">
                                        <label for="adaptado">Adaptado Deficiente</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <legend class="portugues" style="margin-top:45px;justify-content:normal">Documentos a serem enviados<b style="font-size: 20px;margin-left: 30px;"> (Serão aceitos somente formato pdf).</b></legend>
                        <div class="modal-footer" id="divform_anexararquivo">
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Seguro APP</label>
                                        <div id="divapp" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="validadeapp" class="socios custom-file" id="seguroapp" />

                                        </div>
                                        <small id="seguroapp_msg" class="small-message form-text text-muted"></small>
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
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Termo de vistoria</label>
                                        <div id="divvistoria" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="termodevistoria" class="certmun custom-file" id="vistoria" />

                                        </div>
                                        <small id="vistoria_msg" class="small-message form-text text-muted"></small>
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
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certificado de licenciamento do veiculo</label>
                                        <div id="divlicenciamento" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="cartmot" name="licenciamento" class="certestad custom-file" id="licenciamento" />

                                        </div>
                                        <small id="licenciamento_msg" class="small-message form-text text-muted"></small>
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
                        <div class="termo">
                            <input type="checkbox" id="scales" name="scales">
                            <label for="scales">Afirmo ser verdadeiras as informações aqui fornecidas.</label>
                            <small id="info_msg" class="small-message form-text text-muted"></small>
                        </div>
                    </div>


                    <button id="cadastrar-carro-btn">
                        <div class="portugues">Cadastrar Veículo</div>
                    </button>
                </footer>



            </main>


        </div>

        <script>
            // const cadastrarButton = document.querySelector('#cadastrar-viagem-btn');

            // cadastrarButton.addEventListener('click',()=>{
            //         const formInputs = $("#cadastrar_viagem").serializeArray();
            //         console.log(formInputs);

            // });

            function ValidaCPF() {
                var RegraValida = document.getElementById("RegraValida").value;
                var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;
                if (cpfValido.test(RegraValida) == true) {
                    console.log("CPF Válido");
                } else {
                    console.log("CPF Inválido");
                }
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
        </script>

    </body>

    </html><?php  } ?>