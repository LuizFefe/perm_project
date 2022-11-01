<?php
session_start();
include_once("../src/conexao.php");
require_once('../login/session_statusgestao.php');
$nivelacesso = $_SESSION['gestorNivelacesso'];
$matriculagestor = $_SESSION['gestormatricula'];
$placa = $_GET['placa'];
$cpf_permissionario = $_GET['cpfperm'];  //recebe da pagina anterior o numero do cadastro 
$query_03 = "SELECT * FROM permissionarios.motorista where cpf  = '$cpf_permissionario'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();
while ($row = $resultado_03->fetch()) {
    $nome = $row['nome'];
    $email = $row['email'];
    $cpf = $row['cpf'];
    $cmc = $row['cmc'];
    $endereco = json_decode($row['endereco']);
    $enderecofinal = $endereco->logradouro . ', Bairro ' . $endereco->bairro . ' , ' . $endereco->numero . ' ' . $endereco->complemento . ' , Cidade ' . $endereco->cidade . ' , CEP ' . $endereco->CEP;
    $data_cadastro = $row['data_cadastro'];
    $ponto = $row['ponto'];
    $stat = $row['status'];
    $tipo_motorista = $row['tipo_motorista'];
    $nota_analise = $row['nota_analise'];
    $telefone = $row['telefone'];
    $cnh = $row['cnh'];
    $cnhstat = $row['cnh_status'];
    $cert_mun = $row['cert_mun'];
    $certmunstat = $row['certmun_status'];
    $certpenal = $row['certpenal'];
    $certpenalstat = $row['certpenal_status'];
    $atestadosanidade = $row['atestadosanidade'];
    $atestadosanidadestat = $row['atestado_sanidade_status'];
    $residencia = $row['residencia'];
    $residenciastat = $row['residencia_status'];
    $inss = $row['inss'];
    $inssstat = $row['inss_status'];
    $cursodecondutor = $row['cursodecondutor'];
    $cursodecondutorstat = $row['curso_status'];
    $boleto_pagamento = $row['boleto_pagamento'];
    $statuscomissao = $row['statuscomissao'];
    $nperm = $row['codigo_permissionario'];
    $cpf_view1 = substr($row['cpf'], -11, 3);
    $cpf_view2 = substr($row['cpf'], -8, 3);
    $cpf_view3 = substr($row['cpf'], -5, 3);
    $cpf_view4 = substr($row['cpf'], -2);
    $cpfshow =  $cpf_view1 . "." . $cpf_view2 . "." . $cpf_view3 . "-" . $cpf_view4;
    $today = date("d-m-Y");
}
$query_02 = "SELECT * FROM permissionarios.veiculo where placa  = '$placa'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
while ($row = $resultado_02->fetch()) {
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $combustivel = $row['combustivel'];
    $ano_fabricacao = $row['ano_fabricacao'];
    $ano_modelo = $row['ano_modelo'];
    $categoria = $row['categoria'];
    $lotacao = $row['lotacao'];
    $municipio_floripa = $row['municipio_floripa'];
    $chassi = $row['chassi'];
    if ($row['apapdeficient'] == "sim") {
        $apapdeficient = "Sim";
    } else {
        $apapdeficient = "Não";
    }
    $stat = $row['status'];
    $data_cadastro = $row['data_cadastro'];
    $docs_car = $row['docs_car'];
    $selodevistoria = $row['selodevistoria'];
    $docs_car_stat = $row['doc_car_stat'];
    $selodevistoriastat = $row['selodevistoriastat'];
    $nota_analise = $row['nota_analise'];
    $statuscomissao = $row['statuscomissao'];
    if ($statuscomissao != '1' && $statuscomissao != '2' && $statuscomissao != '3') {
        $statuscomissao = 0;
    }
    $cpf_view1 = substr($row['cpf_permissionario'], -11, 3);
    $cpf_view2 = substr($row['cpf_permissionario'], -8, 3);
    $cpf_view3 = substr($row['cpf_permissionario'], -5, 3);
    $cpf_view4 = substr($row['cpf_permissionario'], -2);
    $cpfshow =  $cpf_view1 . "." . $cpf_view2 . "." . $cpf_view3 . "-" . $cpf_view4;
    $today = date("d-m-Y");
    $seguroapp = $row['seguroapp'];
    $statapp = $row['statapp'];
    $fotoveic = $row['fotoveic'];
    $statfotoveic = $row['statfotoveic'];
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../public/styles/partials/fichagestao.css">

    <script>
        $(document).ready(function() {
            $("#smpu_topo").load("/bas/smpu_topo.php");
            $("#smpu_rodape").load("/bas/smpu_rodape.php");
        });
    </script>

</head>

</style>


<body style="<?php echo $bodybg ?>">
    <div role="main">
        <div class="container" role="main" style="font-family:montserrat;max-width:1500px">
            <!-- TOPO -->
            <div id="smpu_topo"></div>
            <!-- TOPO -->
            <?php
            if (($resultado_02_count != 0)) {
                if (($stat) == 0) {
                    $status = "Em Análise";
                    $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-primary text-white justify-content-center text-center align-middle m-3 rounded-top ";
                    $permclass = "shadow p-3 mb-3 p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                    $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                    $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                }
                if (($stat) == 1) {
                    $status = "Veículo Aprovado";
                    $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-success text-white justify-content-center text-center align-middle m-3 rounded-top ";
                    $permclass = "shadow p-3 mb-3 p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                    $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                    $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                }
                if (($stat) == 2) {
                    $status = "Documento Pendente";
                    $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-white justify-content-center text-center align-middle m-3 rounded-top ";
                    $permclass = "shadow p-3 mb-3 p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                    $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                    $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                }
                if (($stat) == 3) {
                    $status = "Documentos Reenviados";
                    $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-white justify-content-center text-center align-middle m-3 rounded-top ";
                    $permclass = "shadow p-3 mb-3 p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                    $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                    $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                } ?>
                <div class="containerborder" role="main">

                    <h3 class="text-uppercase font-weight-bold">
                        <div class="<?php echo $classstatus ?>"><br>
                            <p style="text-align: center; margin-top:13px;font-size:30px"><?php echo $status ?></p>
                        </div>

                        <div class="<?php echo $permclass ?>" style="<?php echo $permstyle ?>" id="headerlink">
                            <?php echo 'Nº DO PERMISSIONÁRIO : ' . $nperm . '<br> PLACA DO CARRO: ' . $placa  ?>
                        </div>
                    </h3>
                    <div style="margin:0 auto">
                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->
                        <div class="justify-content-between h5 mt-5 mb-5 font-weight-bold" style="<?php echo $infostyle ?>" id="containterinfo">
                            <div>
                                <b class="text-muted">Marca: </b><?php echo $marca; ?><br>
                                <b class="text-muted">Modelo: </b><?php echo $modelo; ?><br>
                                <b class="text-muted">Tipo de Combustível: </b><?php echo $combustivel; ?><br>
                                <b class="text-muted">Ano Fabricação: </b><?php echo $ano_fabricacao; ?><br>
                                <b class="text-muted">Ano Modelo: </b><?php echo $ano_modelo; ?><br>
                                <b class="text-muted">Categoria: </b><?php echo $categoria; ?><br>
                                <b class="text-muted">Lotação: </b><?php echo $lotacao; ?><br>
                                <b class="text-muted">Municipio de Cadastro do Carro: </b><?php echo $municipio_floripa; ?><br>
                                <b class="text-muted">Numero do Chassi: </b><?php echo $chassi; ?><br>
                                <b class="text-muted">Adaptado a Deficientes: </b><?php echo $apapdeficient; ?><br>
                                <b class="text-muted">Data de Cadastro do Carro: </b><?php echo $data_cadastro; ?>
                            </div>
                            <div class="" id="actionbutton">
                                <button class="<?php echo $actionbutton ?>" data-toggle="modal" data-target="#MODAL_ACOES" style="white-space: nowrap;margin-top:140px;margin-right:50px">Ações do Usuário</button>
                            </div>
                        </div>
                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->

                        <?php
                        if ($stat == 0 || $stat == 1) {

                        ?>
                            <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                            <div id="documents" class="mx-auto">
                                <div style="text-align:center;font-size:30px"> <strong> DOCUMENTO DO CARRO </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $docs_car . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"> <strong> SELO DE VISTORIA </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoria" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoria">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $selodevistoria . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; ?></b><br>
                                <br>
                                <?php if ($seguroapp == "") { ?>
                                    <div style="text-align:center;font-size:30px"> <strong> FOTOS DO VEÍCULO</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencatrafego" aria-expanded="false" aria-controls="licencatrafego">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencatrafego">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $fotoveic . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; ?></b><br>
                                    <br>
                                <?php } else { ?>
                                    <div style="text-align:center;font-size:30px"> <strong> SEGURO APP</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencatrafego" aria-expanded="false" aria-controls="licencatrafego">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencatrafego">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $seguroapp . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; ?></b><br>
                                <?php } ?>
                            </div>
                    </div><?php }
                        if ($stat == 2 || $stat == 3) {
                            ?><div id="documents" class="mx-auto"> <br><br><br>
                        <div style="margin-left: 55px;"><strong style="font-size:25px">NOTA DE PENDENCIA:</strong> <b class="font-weight-bold" style="font-size:25px"><?php echo $nota_analise; ?></b></div><br><br><br>
                        <?php if ($docs_car_stat == 2) {
                        ?> <div style="text-align:center;font-size:30px"> <strong> DOCUMENTO DO CARRO </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                        <div class="card card-body" style="border:0">
                        <iframe src="../public/docs_veiculo/' . $docs_car . '" width="95%" height="850px"> </iframe>
                        </div>
                      </div>'; ?></b><br>
                            <br> <?php } ?>
                        <?php if ($selodevistoriastat == 2) {
                        ?> <div style="text-align:center;font-size:30px"> <strong> SELO DE VISTORIA </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoria" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoria">
                        <div class="card card-body" style="border:0">
                        <iframe src="../public/docs_veiculo/' . $selodevistoria . '" width="95%" height="850px"> </iframe>
                        </div>
                      </div>'; ?></b><br>
                            <br> <?php } ?>
                        <?php if ($seguroapp == "") {
                            if ($statfotoveic == 2) ?>
                            <div style="text-align:center;font-size:30px"> <strong> FOTOS DO VEÍCULO</strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencatrafego" aria-expanded="false" aria-controls="licencatrafego">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencatrafego">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $fotoveic . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; ?></b><br>
                            <br>
                        <?php  } else { if ($statapp == 2) { ?>
                            <div style="text-align:center;font-size:30px"> <strong> SEGURO APP</strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencatrafego" aria-expanded="false" aria-controls="licencatrafego">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencatrafego">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $seguroapp . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; ?></b><br>
                        <?php } } ?>

                    </div>
                <?php }
                        if ($stat == 0 && $nivelacesso > 1 ||  $stat == 3 && $nivelacesso > 1 || $nivelacesso == 15) { ?>
                    <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                    <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA---------------------------- -->
                    <div class=" text-center m-3">
                        <div>
                            <button class="d-block p-2 btn btn-warning w-100" data-toggle="modal" data-target="#PENDENTE" role="button" id="buttoncontrol" style="font-size:33px"><i class="uil uil-file-times-alt"></i>Documentação Pendente</button>
                        </div>
                    </div>

                    <?php if ($nivelacesso == 15 && $statuscomissao == 3) { ?>
                        <div class=" text-center m-3">
                            <div>
                                <button class="d-block p-2 btn  w-100 " data-toggle="modal" data-target="#APROVA" role="button" id="buttoncontrol" style="font-size:33px;"><i class="uil uil-file-check-alt"></i>Enviar DAM</button>
                            </div>
                        </div>
                        <!-- ---------------------------- BOTAO PARA DOCUMENTAÇÃO PENDENTE ---------------------------- -->
                    <?php } ?>
                    <?php if ($nivelacesso == 15) { ?>
                        <div class=" text-center m-3">
                            <div>
                                <form action="../src/partegestao/aprovacomissao.php" method="post">
                                    <input type="text" value="<?php echo $placa; ?>" name="placa" hidden>
                                    <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>" hidden>
                                    <input type="text" name="matriculagestor" hidden value="<?php echo $_SESSION['gestormatricula'] ?>" hidden>
                                    <button class="d-block p-2 btn  w-100 " role="button" id="buttoncontrol" style="font-size:33px;"><i class="uil uil-file-check-alt"></i>Aprovar Veículo <?php echo $statuscomissao . '/3'; ?></button>
                                </form>
                            </div>
                        </div>
                        <!-- ---------------------------- BOTAO PARA DOCUMENTAÇÃO PENDENTE ---------------------------- -->
                <?php }
                        } ?>
                <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                <div class="modal fade bd-example-modal-lg" id="APROVA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                    Aprovar Veículo
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body mx-auto">
                                <form action="../src/partegestao/boleto.php" method="POST" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row text-align-center text-uppercase font-weight-bold h4 mx-auto">
                                            Aprovar Veículo com Placa: <?php echo $placa ?>
                                        </div>
                                        <div class="row mx-auto justify-content-center">
                                            <div class="d-flex justify-content-center font-weight-bold h5">
                                                CPF do Permissionário: <?php echo $cpf_permissionario ?>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col d-flex justify-content-center font-weight-bold">
                                                    <label for="datalicenca"><input id="datalicenca" name="datalicenca" type="checkbox" onchange="valueChangedlicenca()" /> Vigencia da Licença</label>
                                                </div>
                                                <div class="col d-flex justify-content-center font-weight-bold">
                                                    <label for="dataselo"><input id="dataselo" type="checkbox" name="dataselo" value="1" onchange="valueChangedselo()" /> Vigencia do Selo</label>
                                                </div>
                                            </div>
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col d-flex justify-content-center">
                                                    <input type="date" name="viglicenca" id="viglicenca" />
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <input type="date" name="vigselo" id="vigselo" />
                                                </div>
                                            </div>
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col d-flex justify-content-center">
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <div class="select-block" style="margin-bottom:15px" id="empresavistoria">
                                                        <label style="text-align:center;margin-top:15px" for="pontos">Vistoria feita por:</label>
                                                        <select class="form-control" name="empvistoria" id="empvistoria">
                                                            <option disabled selected>Selecione a empresa</option>
                                                            <option value="GAVA">GAVA</option>
                                                            <option value="SIVIC">SIVIC</option>
                                                            <option value="FORMULA 3">FORMULA 3</option>
                                                            <option value="SISTEV">SISTEV</option>
                                                            <option value="SEVEL">SEVEL</option>
                                                            <option value="FLORIPA INSPEÇÕES">FLORIPA INSPEÇÕES</option>
                                                        </select>
                                                        <small id="ponto_msg" class="small-message form-text text-muted"></small>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mx-auto justify-content-center">
                                            <div class="file-input mt-3">
                                                <input type="file" id="file" class="file" name="boleto" required>
                                                <label for="file">
                                                    ANEXE A DAM
                                                    <p class="file-name"></p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                            <input type="text" name="cpf" hidden value="<?php echo $cpf_permissionario ?>">
                            <input type="text" name="placa" hidden value="<?php echo $placa ?>">
                            <input type="text" name="email" hidden value="<?php echo $email ?>">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Fechar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Aprovar
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                        </form>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                <div class="modal fade bd-example-modal-lg" id="PENDENTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                    Selecione a Documentação Pendente
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../src/partegestao/pendencia_car.php" method="POST">
                                    <div id="documentsform">
                                        <div style="text-align:center;font-size:20px;"> <label for="doccar"><input id="doccar" name="doccar" type="checkbox" value="1" /><strong>DOCUMENTO DO CARRO PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshowS" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshowS">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculo/' . $docs_car . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                        <div style="text-align:center;font-size:20px;"> <label for="selodevistoria"><input id="selodevistoria" name="selodevistoria" type="checkbox" value="1" /><strong>SELO DE VISTORIA PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoriaS" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoriaS">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculo/' . $selodevistoria . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                              <?php if ($seguroapp != "") { ?>
                                        <div style="text-align:center;font-size:20px;"> <label for="app"><input id="app" name="app" type="checkbox" value="1" /><strong>SEGURO APP PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#apps" aria-expanded="false" aria-controls="apps">Mostrar Documento</button></div><?php echo '<div class="collapse" id="apps">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_veiculo/' . $seguroapp  . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>';} else{ ?></b><br>
                                
                                <div style="text-align:center;font-size:20px;"> <label for="fotoveic"><input id="fotoveic" name="fotoveic" type="checkbox" value="1" /><strong>FOTOS DO VEÍCULO PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#fotoveics" aria-expanded="false" aria-controls="fotoveics">Mostrar Documento</button></div><?php echo '<div class="collapse" id="fotoveics">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_veiculo/' . $fotoveic . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div>'; }?></b><br>
                                        <br>
                                        <div class="form-group">
                                            <label for="notapendencia" class="col-form-label" style="font-size:1.5rem"><strong>Nota de Observação:</strong></label>
                                            <textarea class="form-control" id="notapendencia" style="height:115px" name="notapendencia"></textarea>
                                        </div>
                                        <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                        <input type="text" name="cpf" hidden value="<?php echo $cpf ?>">
                                        <input type="text" name="placa" hidden value="<?php echo $placa ?>">
                                        <input type="text" name="email" hidden value="<?php echo $email ?>">
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Fechar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Enviar Documentação Pendente
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL AÇOES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background-image:<?php echo $buttonstyle ?>">
                            <div class="modal-header ">
                                <h3 class="modal-title font-weight-bold" id="MODAL_ficha"><strong>Ações do Motorista no Site</strong></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_mot WHERE cpf = '$cpf_permissionario'";
                                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                                while ($row = $resultado_selectalteracoes->fetch()) {
                                    $var = json_decode(($row['alteracoesfeitas']));
                                    echo '<table id="dtBasicExample4" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm">
                                            <thead>
                                              <tr>
                                                <th scope="col" style="font-size:20px">Data Alteração</th>
                                                <th scope="col" style="font-size:20px">Alteração Feita</th>
                                              </tr>
                                            </thead>
                                            <tbody>';
                                    foreach ($var as $item) {
                                        echo '    <tr>
                                                <td><strong>' . $item->DataAlteracao . '</strong></td>
                                                <td><strong>' . $item->TipodeAlteracao . '</strong></td></tr>';
                                    };
                                    echo '  </tbody>
                                            </table>';
                                } ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL AÇOES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                </div>
        </div>
        <div align=center class="m-3"><a href="gestao.php" class="btn btn-warning" align=center>Fechar | Voltar</a></div>
    <?php

            } else {
                echo '<div class="alert alert-danger" role="alert">Não foi possível achar o cadastro!</div>' . $query_02;
            } ?>
    </div>

    <!-- RODAPE-->
    <div id="smpu_rodape"></div><!-- RODAPE-->

    </div>
    <script>
        document.querySelector('.containerborder').onmousemove = (e) => {

            const x = e.pageX - e.target.offsetLeft
            const y = e.pageY - e.target.offsetTop

            e.target.style.setProperty('--x', `${ x }px`)
            e.target.style.setProperty('--y', `${ y }px`)

        }
    </script>
    <script type="text/javascript">
        $("#vigselo").hide()
        $("#viglicenca").hide()
        $("#empresavistoria").hide()

        function valueChangedselo() {
            if (($('#dataselo').is(":checked"))) {
                $("#vigselo").show();
                $("#empresavistoria").show();
            } else {
                $("#vigselo").hide()
                $("#empresavistoria").hide();;
            }
        }

        function valueChangedlicenca() {
            if ($('#datalicenca').is(":checked"))
                $("#viglicenca").show();
            else
                $("#viglicenca").hide();
        }
        const file = document.querySelector('#file');
        file.addEventListener('change', (e) => {
            // Get the selected file
            const [file] = e.target.files;
            // Get the file name and size
            const {
                name: fileName,
                size
            } = file;
            // Convert size in bytes to kilo bytes
            const fileSize = (size / 1000).toFixed(2);
            // Set the text content
            const fileNameAndSize = `${fileName} - ${fileSize}KB`;
            document.querySelector('.file-name').textContent = fileNameAndSize;
        });
    </script>



</body>

</html>