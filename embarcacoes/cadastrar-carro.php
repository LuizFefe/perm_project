<?php
session_start();
require_once('../login/session_statusembarcacoes.php');
require_once("../src/conexao.php");
$data_atual = date("Y-m-d");
$cpf_usuario = $_SESSION['embarcacoescpf'];
$cpf_usuario = trim($cpf_usuario);
$tipo = $_SESSION['usuariotipo'];
$operador_email = $_SESSION['embarcacoesEmail'];
$query_44 = "SELECT * FROM permissionarios.turismo WHERE email = '$operador_email'";
$resultado_44 = $conn->query($query_44);
$resultado_44_count = $resultado_44->rowCount();
if ($resultado_44_count != 0) {
    while ($row = $resultado_44->fetch()) {
        $nome = $row['nome'];
        $documento = $row['documento'];
        $statusm = $row['status'];
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
        <script src="../public/scripts/formturismoveiculo.js" defer></script>
        <script>
            if (screen && screen.width > 480) {
                document.write('<script src="../public/scripts/pdfpreview.js" defer><\/script>');
            }
        </script>
        <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->
    </head>
    <style>
        input,
        textarea {
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
            <header class="page-header" style="padding-bottom: 40px;">
                <div data-include="headermenu_ipuf"></div>
                <div data-include="headermenu_perms"></div>
                <div class="header-content">
                    <div class="top-bar-container">
                        <nav class="navbar navheader">
                            <strong>Cadastre seu veículo</strong>
                            <blockquote>Preencha aqui com os dados do seu veículo.</blockquote>
                        </nav>
                    </div>
                </div>
            </header>
            <!-- <header class="page-header">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                        <div style="color:white;font-size:40px;margin-right: 3%;">Turismo</div>
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

                        <strong class="portugues"></strong>
                        <p class="portugues">.</p>
                    </div>
                </div>
                <div id="stage1" style="display:none">
                </div>
            </header> -->

            <main>
                <form method="post" id="cadastrar_carro" action="../src/embarcacoes/cadastrar_carroturismo_db.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?>">
                    <input type="hidden" name="tipo" id="tipo" value="veiculo">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues" style="font-family: 'Montserrat';">Informações sobre o Veículo</legend>

                        <div id="informacoes_viagem_show" style="display:block">
                            <input type="text" id="cpf" name="documento" value="<?php echo $documento ?>" readonly hidden>
                            <div class="input-block">
                                <div class="input-block">
                                    <label for="estado_origem">Placa</label>
                                    <input type="text" class="form-control" name="placa" id="placa">
                                    <small id="placa_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid">
                                <div class="input-block">
                                    <label class="portugues" for="chassi">Chassi</label>
                                    <input type="text" class="form-control" name="chassi" id="chassi">
                                    <small id="chassi_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid">
                                <div class="input-block">
                                    <label class="portugues" for="renavam">Renavam</label>
                                    <input type="text" class="form-control" name="renavam" id="renavam">
                                    <small id="renavam_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Modelo</label>
                                    <input type="text" class="form-control" name="modelo" id="modelo">
                                    <small id="modelo_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Fabricante</label>
                                    <input type="text" class="form-control" name="marca" id="marca">
                                    <small id="marca_msg" class="small-message form-text text-muted"></small>
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
                                <div class="select-block" style="margin-bottom:15px">
                                    <label for="categoria">Categoria</label>
                                    <select class="form-control" name="categoria" id="categoria">
                                        <option disabled selected value="">Categoria</option>
                                        <option value="particular">Particular</option>
                                        <option value="aluguel">Aluguel</option>
                                    </select>
                                    <small id="categoria_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="select-block" style="margin-bottom:15px">
                                    <label for="tipocarro">Tipo Veículo</label>
                                    <select class="form-control" name="tipocarro" id="tipocarro">
                                        <option disabled selected value="">Tipo</option>
                                        <option value="onibus">Ônibus</option>
                                        <option value="microonibus">Microonibus</option>
                                        <option value="automovel">Automóvel</option>
                                        <option value="camioneta">Camioneta</option>
                                    </select>
                                    <small id="veiculo_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Lotação de Passageiros</label>
                                    <input type="text" class="form-control" name="lotacao" id="lotacao">
                                    <small id="lotacao_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label for="estado_origem">Combústivel</label>
                                    <input type="text" class="form-control" name="combustivel" id="combustivel">
                                    <small id="combustivel_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Nº de Permissão(Não digite nada caso não possua.)</label>
                                    <input type="text" class="form-control" name="nperm" id="nperm">
                                    <small id="nperm_msg" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="validadeapp">Validade APP</label>
                                    <input type="date" class="form-control" name="validadeapp" id="validadeapp">
                                    <small id="validadeapp_msg" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                        </div>
                        <legend class="portugues" style="margin-top:45px;justify-content:normal;font-family:'Montserrat'">Documentos a serem enviados<b style="font-size: 20px;margin-left: 30px;font-weight:100;font-family:'Montserrat'"> (Serão aceitos somente formato pdf)</b></legend>
                        <div id="divform_anexararquivo">
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Certificado de licenciamento do veiculo</label>
                                        <div id="divlicenciamento" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="licenciamento" name="licenciamento" class="arquivoPDF custom-file" id="licenciamento" accept="application/pdf" />
                                        </div>
                                        <small id="licenciamento_msg" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-row" id="divpdf-licenciamento" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="licenciamento" class="col-form-label showhide" id="control-show-licenciamento" style="display:block">Preview<b></b></label>
                                        <label data-msg="licenciamento" class="col-form-label showhide" id="control-hide-licenciamento" style="display:none">Preview<b>(+)</b></label>
                                        <span id="pdf-licenciamento"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Termo de vistoria</label>
                                        <div id="divvistoria" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="termodevistoria" name="termodevistoria" class="arquivoPDF custom-file" id="termodevistoria" accept="application/pdf" />

                                        </div>
                                        <small id="vistoria_msg" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-row" id="divpdf-termodevistoria" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="termodevistoria" class="col-form-label showhide" id="control-show-termodevistoria" style="display:block">Preview<b></b></label>
                                        <label data-msg="termodevistoria" class="col-form-label showhide" id="control-hide-termodevistoria" style="display:none">Preview<b>(+)</b></label>
                                        <span id="pdf-termodevistoria"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Seguro APP
                                            <!-- <a href="#" title="Atestado de antecedentes criminais emitida pela "><i class="fa-solid fa-circle-question"></i></a> -->
                                        </label>
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
                            <div class="row gx-3 gy-2 align-items-center">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="col-form-label text-muted">Fotos do Veículo</label><b style="font-size: 15px;margin-left: 15px;"> (Salvar em pdf 4 fotos do veículo: parte frontal, parte traseira e ambos os lados.).</b>
                                        <div id="divfotoveiculo" tabindex="0" class="custom-file">
                                            <input type="file" data-msg="fotoveiculo" name="fotoveiculo" class="arquivoPDF custom-file" id="fotoveiculo" accept="application/pdf" />
                                        </div>
                                        <small id="fotoveiculo_msg" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>
                                <div class="form-row" id="divpdf-fotoveiculo" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="fotoveiculo" class="col-form-label showhide" id="control-show-fotoveiculo" style="display:block">Preview<b></b></label>
                                        <label data-msg="fotoveiculo" class="col-form-label showhide" id="control-hide-fotoveiculo" style="display:none">Preview<b>(+)</b></label>
                                        <span id="pdf-fotoveiculo"></span>
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

            <div data-include="FOOTER"></div>
        </div>

        <script>
            // const cadastrarButton = document.querySelector('#cadastrar-viagem-btn');

            // cadastrarButton.addEventListener('click',()=>{
            //         const formInputs = $("#cadastrar_viagem").serializeArray();
            //         console.log(formInputs);

            // });
            $(function() {
                var includes = $('[data-include]')
                $.each(includes, function() {
                    var file = '../../general/public/views/' + $(this).data('include') + '.php'
                    $(this).load(file)
                })
            })

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