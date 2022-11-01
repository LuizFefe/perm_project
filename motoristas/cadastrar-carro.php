<?php
session_start();
require_once('../login/session_status.php');
require_once('../src/checkveiculo.php');
require_once("../src/conexao.php");
$operador_email = $_SESSION['usuarioEmail'];
$data_atual = date("Y-m-d");
$cpf_usuario = $_SESSION['usuariocpf'];
$cpf_usuario = trim($cpf_usuario);
$query_44 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario'";
$resultado_44 = $conn->query($query_44);
$resultado_44_count = $resultado_44->rowCount();
if ($resultado_44_count != 0) {
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Permissionário</title>

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
        <script src="../public/scripts/validate-car.js"></script>
        <script src="../public/scripts/inputmask/dist/jquery.inputmask.js"></script>


    </head>
    <style>
        .termo input[type="checkbox"] {
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
                <form method="post" id="cadastrar_carro" action="../src/motorista/cadastrar_carro_db.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?> ">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações Sobre o Veiculo</legend>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="municipio">CPF Permissionário:</label>
                                    <input type="text" id="cpf" name="cpf" value="<?php echo $cpf_usuario ?> " readonly>
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
                                    <label class="portugues" for="crlv">CRLV</label>
                                    <input type="text" class="form-control" name="crlv" id="crlv">
                                    <small id="crlv_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block" style="margin-left: 100px;margin-top: 28px;">
                                    <div>

                                        <input type="checkbox" id="adaptado" name="adaptado" value="sim" style="height:2rem;width:5%">
                                        <label for="adaptado">Adaptado Deficiente</label>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <legend class="portugues" style="margin-top:40px">CRLV</legend>
                        <div class="modal-footer" id="divform_anexararquivo" style="margin-top:-15px">
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="custom-file">
                                            <input type="file" data-msg="cartmot" name="doccar" class="arquivoPDF custom-file" id="doccar" />

                                        </div>
                                        <small id="doccar_msg" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="form-row" id="divpdf-cartmot" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                        <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                        <span class="form-control" id="pdf-cartmot"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <legend class="portugues" style="margin-top:40px">Vistoria</legend>
                        <div class="modal-footer" id="divform_anexararquivo" style="margin-top:-15px">
                            <div class="row gx-3 gy-2 align-items-center">

                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <div class="custom-file">
                                            <input type="file" data-msg="licencavistoria" name="licencavistoria" class="arquivoPDF custom-file" id="licencavistoria" required />

                                        </div>
                                        <small id="vist_msg" class="small-message form-text text-muted"></small>
                                    </div>
                                </div>

                                <div class="form-row" id="divpdf-licencavistoria" style="display:none">
                                    <div class="col-12">
                                        <label data-msg="licencavistoria" class="col-form-label showhide" id="control-show-licencavistoria" style="display:block">Preview<b></b></label>
                                        <label data-msg="licencavistoria" class="col-form-label showhide" id="control-hide-licencavistoria" style="display:none">Preview<b>(+)</b></label>
                                        <span class="form-control" id="pdf-licencavistoria"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--     <select class="form-select" name="carrozero" id="carrozero">
                            <option selected>Seu carro é zero?</option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select> -->
                        <div class="select-block" style="margin-top:50px;width:100%">
                            <label for="tipodocumento" style="color:#003466;font-size:30px">Seu carro é zero?</label>
                            <div style="margin-top:18px">
                                <select class="form-control" name="carrozero" id="carrozero">
                                    <option disabled selected>Selecione uma opção</option>
                                    <option value="1">Sim</option>
                                    <option value="2">Não</option>
                                </select>
                                <small id="tipo_msg" class="small-message form-text text-muted"></small>
                            </div>
                        </div>
                        <div id="zero">
                            <legend class="portugues" style="margin-top:40px">4 Fotos Coloridas do Veículo já Caracterizado</legend>
                            <div class="modal-footer" id="divform_anexararquivo" style="margin-top:-15px">
                                <div class="row gx-3 gy-2 align-items-center">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="custom-file">
                                                <input type="file" data-msg="fotos" name="fotos" class="arquivoPDF custom-file" id="fotos"  />
                                            </div>
                                            <small id="vist_msg" class="small-message form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divpdf-fotos" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="fotos" class="col-form-label showhide" id="control-show-fotos" style="display:block">Preview<b></b></label>
                                            <label data-msg="fotos" class="col-form-label showhide" id="control-hide-fotos" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="pdf-fotos"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="naozero">
                            <legend class="portugues" style="margin-top:40px">Seguro APP</legend>
                            <div class="modal-footer" id="divform_anexararquivo" style="margin-top:-15px">
                                <div class="row gx-3 gy-2 align-items-center">
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <div class="custom-file">
                                                <input type="file" data-msg="app" name="app" class="arquivoPDF custom-file" id="app"  />
                                            </div>
                                            <small id="vist_msg" class="small-message form-text text-muted"></small>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divpdf-app" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="app" class="col-form-label showhide" id="control-show-app" style="display:block">Preview<b></b></label>
                                            <label data-msg="app" class="col-form-label showhide" id="control-hide-app" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="pdf-app"></span>
                                        </div>
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
                        <div class="termo">
                            <input type="checkbox" id="scales" name="scales">
                            <label for="scales">Declaro que as informações acima prestadas são verdadeiras, e assumo a inteira responsabilidade pelas mesmas.</label>
                            <small id="info_msg" class="small-message form-text text-muted"></small>
                        </div>
                    </div>


                    <button id="cadastrar-viagem-btn">
                        <div class="portugues">Cadastrar Carro</div>
                    </button>
                </footer>


            </main>
            <!--    <footer class="footer">
                <div class="div d-flex align-items-center flex-column">
                    <strong class="text-center">Secretaria Municipal de Mobilidade e Planejamento Urbano</strong>
                    <br>
                    Contato:
                    <a class="portugues" href="#">smpu@pmf.sc.gov.br</a>
                </div>

            </footer> -->


        </div>

        <script>
            // const cadastrarButton = document.querySelector('#cadastrar-viagem-btn');

            // cadastrarButton.addEventListener('click',()=>{
            //         const formInputs = $("#cadastrar_viagem").serializeArray();
            //         console.log(formInputs);

            // });
            $(".arquivoPDF").change(function() { //ou Id do input 
                var msg = $(this).data('msg');

                $msgbox = $("#msg-error-arquivo");
                $pdfview = $("#pdf-" + msg);


                var fileInput = $(this);
                var file = this.files[0];
                _OBJECT_URL = URL.createObjectURL(file)

                // var maxSize = $j(this).data('max-size');
                var maxSize = 4194304;
                // var extPermitidas = ['jpg', 'png', 'gif', 'pdf', 'txt', 'doc', 'docx'];
                var extPermitidas = ['pdf'];

                console.log(fileInput.get(0).files[0].size);

                //aqui a sua função normal
                if (fileInput.get(0).files.length) {
                    var fileSize = fileInput.get(0).files[0].size; // in bytes
                    if (fileSize > maxSize) {
                        $msgbox.html('<div class="alert alert-danger" role="alert"><h4>Arquivo excedeu o limite permitido, por favor escolha arquivos com no <b>maximo 4MB!</b></h4></div>');
                        $(this).val('');
                        $(this).focus();
                        document.querySelector("#divpdf-" + msg).style.display = 'none';


                        // $j('#validate').attr('disabled', 'disabled');
                    } else if (typeof extPermitidas.find(function(ext) {
                            return fileInput.val().split('.').pop() == ext;
                        }) == 'undefined') {
                        $msgbox.html('<div class="alert alert-danger" role="alert"><h4>Extensão inválida utlize <b>arquivos PDF!</b></h4></div>');
                        $(this).val('');
                        $(this).focus();

                        document.querySelector("#divpdf-" + msg).style.display = 'none';


                        //  $j('#validate').attr('disabled', 'disabled');
                    } else {
                        $msgbox.html('');
                        _OBJECT_URL = URL.createObjectURL(file)
                        document.querySelector("#divpdf-" + msg).style.display = 'block';
                        document.querySelector("#control-show-" + msg).style.display = 'block';
                        document.querySelector("#control-hide-" + msg).style.display = 'none';
                        document.querySelector("#pdf-" + msg).style.display = 'block';

                        // showPDF(_OBJECT_URL);
                        $pdfview.html('<iframe src="' + _OBJECT_URL + '" width="100%" height="850px"></iframe>');


                    }
                }
            });

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
            $('#naozero').hide();
            $('#zero').hide();
            var Privileges = jQuery('#carrozero');
            var select = this.value;
            Privileges.change(function() {
                if ($(this).val() == '1') {
                    $('#zero').show();
                    $("#fotos").prop('required',true);
                    $('#naozero').hide();
                } else if ($(this).val() == '2') {
                    $('#naozero').show();
                    $("#app").prop('required',true);
                    $('#zero').hide();
                } // hide div if value is not "custom"
            });
        </script>

    </body>

    </html><?php } ?>