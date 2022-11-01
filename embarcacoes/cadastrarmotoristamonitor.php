<?php
session_start();
require_once('../login/session_statusescolar.php');
/* require_once('../src/checkmotoristacadastrado.php'); */
include_once("../src/conexao.php");
$operador_email = $_SESSION['escolarEmail'];
$cpf_usuario = $_SESSION['escolarcpf'];
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
    <script src="../public/scripts/formescolarmonimot.js" defer></script>
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

    #tipodocumento {
        font-size: 25px;
        height: 35px;
        font-family: "montserrat";
    }

    /*   .page-header .top-bar-container .navbar .navbar-links li a {
        font-size: 20px
    } */
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
                            <a class="portugues" href="../login/sair.php">Sair</a>
                        </li>

                    </ul>
                </nav>
            </div>

            <div class="header-content">
                <div>
                    <strong class="portugues">Cadastro de Motorista/Monitor</strong>
                    <p class="portugues">Preencha aqui com seus dados.</p>
                </div>
                <div class="select-block" style="margin-top:50px;width:100%">
                    <label for="tipodocumento" style="color:white;font-size:30px">Tipo de Cadastro</label>
                    <select class="form-control" name="tipodocumento" id="tipodocumento">
                        <option disabled selected>Selecione o tipo de cadastro</option>
                        <option value="Monitor">Monitor</option>
                        <option value="Motorista">Motorista</option>
                    </select>
                    <small id="tipo_msg" class="small-message form-text text-muted"></small>
                </div>
            </div>

        </header>
        <div class="cadastrocnpj" id="Monitor">
            <main>

                <form method="post" id="cadastrar_monitor" action="../src/escolar/cadastrarmotmoni.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?>">
                    <input type="hidden" name="emailperm" id="data_atual" value="<?php echo $operador_email ?>">
                    <input type="hidden" name="tipocadastro" id="tipocadastromoni" value="Monitor">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações Sobre o Monitor</legend>
                        <div class="input-block grid grid-two">
                            <div class="input-block">
                                <label for="municipio">Documento do Autorizado:</label>
                                <input type="text" id="cpf" name="permmonitor" value="<?php echo $documento ?>" readonly>
                                <small id="" class="small-message form-text text-muted"></small>
                            </div>
                        </div>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two" style="margin-bottom: -20px">

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">CPF</label>
                                    <input type="text" class="form-control" name="cpfmonitor" id="cpfmonitor" onkeyup=" cpfCheckmoni(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );"><span id="cpfResponsemoni"></span>
                                    <small id="cnpj_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">

                            </div>

                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Nome</label>
                                    <input type="text" class="form-control" name="nomemonitor" id="nomemonitor">
                                    <small id="nome_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Telefone</label>
                                    <input type="text" class="telefone" id="telefonemonitor" name="telefonemonitor" />
                                    <small id="telefone_msgpj" class="small-message form-text text-muted"></small>
                                </div>

                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="operador_cep">Código postal</label>
                                    <input name="cepmonitor" type="text" id="cepmonitor" value="" size="10" maxlength="9" onblur="pesquisaceppj(this.value);" />
                                    <small id="cep_msgpj" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="operador_logradouro">
                                        Logradouro
                                    </label>
                                    <input name="ruamonitor" type="text" id="ruamonitor" size="60" />
                                    <small id="rua_msgpj" class="small-message form-text text-muted"></small>

                                </div>
                            </div>



                            <div class="input-block grid grid-four">

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Bairro</label>
                                    <input name="bairromonitor" type="text" id="bairromonitor" size="40" />
                                    <small id="bairro_msgpj" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Cidade</label>
                                    <input name="cidademonitor" type="text" id="cidademonitor" size="40" />
                                    <small id="cidade_msgpj" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Número</label>
                                    <input type="text" class="form-control" name="numeromonitor" id="numeropj" aria-describedby="operador_numero_endereco_helpId">
                                    <small id="numero_msgpj" class="form-text text-muted">
                                        <div class="portugues">Ex:43</div>
                                    </small>
                                    <small id="numpj_msg" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Complemento</label>
                                    <input type="text" class="form-control" name="complementomonitor" id="complementopj" aria-describedby="operador_complemento_endereco_helpId">
                                    <small id="operador_complemento_endereco_helpId" class="form-text text-muted">
                                        <div class="portugues">Ex:Bloco 1</div>
                                    </small>
                                    <small id="operador_complemento_endereco_msgpj" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <legend class="portugues" style="margin-top:45px;justify-content:normal">Documentos a serem enviados<b style="font-size: 20px;margin-left: 30px;"> (Serão aceitos somente formato pdf).</b></legend>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">CPF - RG</label>
                                            <small id="alvarapj_msg" class="small-message form-text text-muted"></small>
                                            <div id="alvarapjdiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="cpfrgmonitor" class="alvarapj custom-file" id="cpfrgmonitor" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Curso de Monitor</label>
                                            <small id="negmunpj_msg" class="small-message form-text text-muted"></small>
                                            <div id="negmunpjdiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="cursomonitor" class="negmunpj custom-file" id="cursomonitor" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Comprovante de residência</label>
                                            <small id="negestpg_msg" class="small-message form-text text-muted"></small>
                                            <div id="negestpgdiv" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="residenciamonitor" class="negestpg custom-file" id="residenciamonitor" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Atestado de Sanidade Física e Mental</label>
                                            <small id="sanidademoni_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="sanidadendivmoni" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="sanidademonitor" class="inss custom-file" id="sanidademonitor" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Certidão de Negativa Penal</label>
                                            <small id="certpenalmoni_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="certpendivmoni" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="penalmonitor" class=" certfed custom-file" id="penalmonitor" accept="application/pdf">
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
                            <input type="checkbox" id="scalespj" name="scalespj">
                            <label for="scalespj">Afirmo ser verdadeiras as informações aqui fornecidas.</label>
                            <small id="info_msg" class="small-message form-text text-muted"></small>
                        </div>
                    </div>


                    <button id="cadastrar-monitor">
                        <div class="portugues">Cadastrar Monitor</div>
                    </button>
                </footer>
            </main>
        </div>
        <div class="documento" id="Motorista">

            <main>

                <form method="post" id="cadastrar_motorista" action="../src/escolar/cadastrarmotmoni.php" enctype="multipart/form-data">
                    <input type="hidden" name="data_atual" id="data_atual" value="<?php echo $data_atual ?>">
                    <input type="hidden" name="emailperm" id="data_atual" value="<?php echo $operador_email ?>">
                    <input type="hidden" name="tipocadastro" id="tipocadastromot" value="Motorista">

                    <fieldset id="informacoes_viagem" class="div-show">
                        <legend class="portugues">Informações Sobre o Motorista</legend>
                        <div class="input-block grid grid-two">
                            <div class="input-block">
                                <label for="municipio">Documento do Autorizado:</label>
                                <input type="text" id="cpf" name="permmotorista" value="<?php echo $documento ?>" readonly>
                                <small id="" class="small-message form-text text-muted"></small>
                            </div>
                        </div>

                        <div id="informacoes_viagem_show" style="display:block">
                            <div class="input-block grid grid-two" style="margin-bottom: -20px">

                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">CPF</label>
                                    <input id="CPFpf" name="cpfmotorista" class="form-control" onkeyup="cpfCheckmot(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );"><span id="cpfResponsemot"></span>
                                    <!--  <input type="text" class="form-control" name="cpfpf" id="CPFpf" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );"><span id="cpfResponse"></span> -->
                                    <small id="cpf_msgpf" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <div class="input-block grid grid-two">

                                <!-- <div class="input-block">
                                        <div class="documento" id="CNPJJ">
                                            <label class="portugues" for="cidade_origem">CNPJ</label>
                                            <input type="text" class="form-control" name="documento" id="CNPJ">
                                            <small id="cnpj_msgpf" class="small-message form-text text-muted"></small>
                                        </div>
                                        <div class="documento" id="CPFF">
                                            <label for="operador_documento">CPF</label>
                                            <input type="text" class="form-control" name="documento" id="CPF" onkeyup="cpfCheck(this)" maxlength="18" onkeydown="javascript: fMasc( this, mCPF );"><span id="cpfResponse"></span>
                                            <small id="cpf_msgpf" class="small-message form-text text-muted"></small>
                                        </div>
                                        <small id="doc_msgpf" class="small-message form-text text-muted"></small>
                                    </div> -->
                            </div>

                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="estado_origem">Nome</label>
                                    <input type="text" class="form-control" name="nomemotorista" id="nomepf">
                                    <small id="nome_msgpf" class="small-message form-text text-muted"></small>
                                </div>
                                <div class="input-block">
                                    <label class="portugues" for="cidade_origem">Telefone</label>
                                    <input type="text" class="telefone" id="telefonepf" name="telefone" />
                                    <small id="telefone_msgpf" class="small-message form-text text-muted"></small>
                                </div>


                            </div>
                            <div class="input-block grid grid-two">
                                <div class="input-block">
                                    <label for="operador_cep">Código postal</label>
                                    <input name="cep" type="text" id="ceppf" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);" />
                                    <small id="cep_msgpf" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label class="portugues" for="operador_logradouro">
                                        Logradouro
                                    </label>
                                    <input name="rua" type="text" id="ruapf" size="60" />
                                    <small id="rua_msgpf" class="small-message form-text text-muted"></small>

                                </div>
                            </div>



                            <div class="input-block grid grid-four">

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Bairro</label>
                                    <input name="bairro" type="text" id="bairropf" size="40" />
                                    <small id="bairro_msgpf" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Cidade</label>
                                    <input name="cidade" type="text" id="cidadepf" size="40" />
                                    <small id="cidade_msgpf" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_numero_endereco">Número</label>
                                    <input type="text" class="form-control" name="numero" id="numeropf" aria-describedby="operador_numero_endereco_helpId">
                                    <small id="numero_msgpf" class="form-text text-muted">
                                        <div class="portugues">Ex:43</div>
                                    </small>
                                    <small id="num_msgpf" class="small-message form-text text-muted"></small>
                                </div>

                                <div class="input-block">
                                    <label for="operador_complemento_endereco">Complemento</label>
                                    <input type="text" class="form-control" name="complemento" id="complementopf" aria-describedby="operador_complemento_endereco_helpId">
                                    <small id="operador_complemento_endereco_helpId" class="form-text text-muted">
                                        <div class="portugues">Ex:Bloco 1</div>
                                    </small>
                                    <small id="operador_complemento_endereco_msgpf" class="small-message form-text text-muted"></small>
                                </div>
                            </div>
                            <legend class="portugues" style="margin-top:45px;justify-content:normal">Documentos a serem enviados<b style="font-size: 20px;margin-left: 30px;"> (Serão aceitos somente formato pdf).</b></legend>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">CNH</label>
                                            <small id="cnh_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="cnhdivpf" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="cnhmotorista" class="contratosocial custom-file" id="cnhmotorista" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Certidão Negativa Penal</label>
                                            <small id="certpenal_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="certpendivpf" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="forummotorista" class="socios custom-file" id="forummotorista" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Atestado de Sanidade Física e Mental:</label>
                                            <small id="sanidade_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="sanidadedivpf" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="sanidademotorista" class="certestad custom-file" id="sanidademotorista" accept="application/pdf">
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
                                            <label class="col-form-label text-muted">Comprovante de Residência:</label>
                                            <small id="residencia_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="residenciadivpf" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="residenciamotorista" class="fgts custom-file" id="residenciamotorista" accept="application/pdf">
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
                                            <small id="curso_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="cursodivpf" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="cursomotorista" class="curso custom-file" id="cursomotorista" accept="application/pdf" />
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
                            </div><br>
                            <div class="modal-footer" id="divform_anexararquivo">
                                <div class="row gx-3 gy-2 align-items-center">

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label class="col-form-label text-muted">Negativa de Multas(DETRAN):</label>
                                            <small id="negativamultaspf_msgpf" class="small-message form-text text-muted"></small>
                                            <div id="multas" tabindex="0" class="custom-file">
                                                <input type="file" data-msg="cartmot" name="multasmotorista" class="multas custom-file" id="multasmotorista" accept="application/pdf" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row" id="divmultas-cartmot" style="display:none">
                                        <div class="col-12">
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-show-cartmot" style="display:block">Preview<b></b></label>
                                            <label data-msg="cartmot" class="col-form-label showhide" id="control-hide-cartmot" style="display:none">Preview<b>(+)</b></label>
                                            <span class="form-control" id="multas-cartmot"></span>
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

                            Importante! <br>
                            Preencha todos os dados corretamente

                        </div>
                        <div class="termo">
                            <input type="checkbox" id="scalespf" name="scalespf">
                            <label for="scalespf">Afirmo ser verdadeiras as informações aqui fornecidas.</label>
                            <small id="info_msgpf" class="small-message form-text text-muted"></small>
                        </div>
                    </div>


                    <button id="cadastrar-motorista">
                        <div class="portugues">Cadastrar Motorista</div>
                    </button>
                </footer>
            </main>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#cnpj").mask("99.999.999/9999-99");
    });
    $('#Monitor').hide();
    $('#Motorista').hide();
    $('#tipodocumento').change(function() {
        $('#Monitor').hide();
        $('#Motorista').hide();
        /*  $('#' + $(this).val()).show();
         console.log('#' + $(this).val())
         if ($(this).val() == 'CPF') {


         }; */
        if ($(this).val() == 'Motorista') {
            $('#Motorista').show()
        };
        if ($(this).val() == 'Monitor') {
            $('#Monitor').show()
        };
    });
</script>

</html><?php /* } */ ?>