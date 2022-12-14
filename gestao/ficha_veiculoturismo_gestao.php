<?php
session_start();
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
include_once("../src/conexao.php");
require_once('../login/session_statusgestao.php');
$nivelacesso = $_SESSION['gestorNivelacesso'];
$gestoMatricula = $_SESSION['gestormatricula'];
$placa = $_GET['placa'];
$cpf_permissionario = $_GET['cpfperm'];  //recebe da pagina anterior o numero do cadastro 
$query_02 = "SELECT * FROM permissionarios.turismo where documento  = '$cpf_permissionario'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
while ($row = $resultado_02->fetch()) {
    $email = $row['email'];
}
$query_02 = "SELECT * FROM permissionarios.veiculoturismo where placa  = '$placa'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
while ($row = $resultado_02->fetch()) {
    $marca = $row['marca'];
    $modelo = $row['modelo'];
    $ano_fabricacao = $row['ano_fabricacao'];
    $ano_modelo = $row['ano_modelo'];
    $categoria = $row['categoria'];
    $lotacao = $row['lotacao'];
    $municipio_floripa = $row['municipio_floripa'];
    $chassi = $row['chassi'];
    $stat = $row['status'];
    $data_cadastro = $row['data_cadastro'];
    $nperm = $row['nperm'];
    $seguroapp = $row['seguroapp'];
    $seguroappstatus = $row['seguroappstatus'];

    $termodevistoria = $row['termodevistoria'];
    $termodevistoriastatus = $row['termodevistoriastatus'];

    $licenciamentoveiculo = $row['licenciamentoveiculo'];
    $licenciamentoveiculostatus = $row['licenciamentoveiculostatus'];

    $fotoveiculo = $row['fotoveiculo'];
    $statfotoveiculo = $row['statfotoveiculo'];

    $statuscomissao = $row['statuscomissao'];

    $doc_permissionario = $row['doc_permissionario'];
    $nota_analise = $row['nota_analise'];

    $statcomissao=$row['statuscomissao'];
    if($statcomissao != 1 && $statcomissao != 2 && $statcomissao != 3){
        $statcomissao=0;
    }

    $today = date("d-m-Y");
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
                    $status = "Em An??lise";
                    $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-primary text-white justify-content-center text-center align-middle m-3 rounded-top ";
                    $permclass = "shadow p-3 mb-3 p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                    $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                    $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                }
                if (($stat) == 1) {
                    $status = "Ve??culo Aprovado";
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
                            <?php echo 'DOCUMENTO DO PERMISSION??RIO : ' . $doc_permissionario . '<br> PLACA DO CARRO: ' . $placa . '<br> N?? DE PERMISS??O: ' . $nperm  ?>
                        </div>
                    </h3>
                    <div style="margin:0 auto">
                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->
                        <div class="justify-content-between h5 mt-5 mb-5 font-weight-bold" style="<?php echo $infostyle ?>" id="containterinfo">
                            <div>
                                <b class="text-muted">Marca: </b><?php echo $marca; ?><br>
                                <b class="text-muted">Modelo: </b><?php echo $modelo; ?><br>
                                <b class="text-muted">Ano Fabrica????o: </b><?php echo $ano_fabricacao; ?><br>
                                <b class="text-muted">Ano Modelo: </b><?php echo $ano_modelo; ?><br>
                                <b class="text-muted">Categoria: </b><?php echo $categoria; ?><br>
                                <b class="text-muted">Lota????o: </b><?php echo $lotacao; ?><br>
                                <b class="text-muted">Municipio de Cadastro do Carro: </b><?php echo $municipio_floripa; ?><br>
                                <b class="text-muted">Numero do Chassi: </b><?php echo $chassi; ?><br>
                                <b class="text-muted">Data de Cadastro do Carro: </b><?php echo $data_cadastro; ?>
                            </div>
                            <div class="" id="actionbutton">
                                <button class="<?php echo $actionbutton ?>" data-toggle="modal" data-target="#MODAL_ACOES" style="white-space: nowrap;margin-top:140px;margin-right:50px">A????es do Usu??rio</button>
                            </div>
                        </div>
                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->

                        <?php
                        if ($stat == 0 || $stat == 1) {

                        ?>
                            <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                            <div id="documents" class="mx-auto">
                                <div style="text-align:center;font-size:30px"> <strong> SEGURO APP </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_turismo/' . $seguroapp . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"> <strong> TERMO DE VISTORIA </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoria" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoria">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $termodevistoria . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"> <strong> LICENCIAMENTO DO VE??CULO </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#ee" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="ee">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $licenciamentoveiculo . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"> <strong> FOTO VEICULO </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#FORMESPEC" aria-expanded="false" aria-controls="FORMESPEC">Mostrar Documento</button></div><?php echo '<div class="collapse" id="FORMESPEC">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $fotoveiculo . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>


                            </div>
                    </div><?php }
                        if ($stat == 2 || $stat == 3) {
                            ?><div id="documents" class="mx-auto"> <br><br><br>
                        <div style="margin-left: 55px;"><strong style="font-size:25px">NOTA DE PENDENCIA:</strong> <b class="font-weight-bold" style="font-size:25px"><?php echo $nota_analise; ?></b></div><br><br><br>
                        <?php if ($seguroappstatus == 2) {
                        ?> <div style="text-align:center;font-size:30px"> <strong> SEGURO APP </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                        <div class="card card-body" style="border:0">
                        <iframe src="../public/docs_turismo/' . $seguroapp . '" width="95%" height="850px"> </iframe>
                        </div>
                      </div>'; ?></b><br>
                            <br> <?php } ?>
                        <?php if ($termodevistoriastatus == 2) {
                        ?> <div style="text-align:center;font-size:30px"> <strong> TERMO DE VISTORIA </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoria" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoria">
                        <div class="card card-body" style="border:0">
                        <iframe src="../public/docs_veiculoturismo/' . $termodevistoria . '" width="95%" height="850px"> </iframe>
                        </div>
                      </div>'; ?></b><br>
                            <br> <?php }
                                if ($licenciamentoveiculostatus == 2) { ?>
                            <div style="text-align:center;font-size:30px"> <strong> LICENCIAMENTO DO VE??CULO </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#ee" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="ee">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $licenciamentoveiculo . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                            <br> <?php }
                                if ($statfotoveiculo == 2) { ?>
                            <div style="text-align:center;font-size:30px"> <strong> FOTO VE??CULO </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#formespec" aria-expanded="false" aria-controls="formespec">Mostrar Documento</button></div><?php echo '<div class="collapse" id="formespec">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $fotoveiculo . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                            <br> <?php } ?>

                    </div>
                <?php }
                        if ($stat == 0 && $nivelacesso > 1 ||  $stat == 3 && $nivelacesso > 1 || $statuscomissao == 4) { ?>
                    <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                    <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA---------------------------- -->
                    <div class=" text-center m-3">
                        <div>
                            <button class="d-block p-2 btn btn-warning w-100" data-toggle="modal" data-target="#PENDENTE" role="button" id="buttoncontrol" style="font-size:33px"><i class="uil uil-file-times-alt"></i>Documenta????o Pendente</button>
                        </div>
                    </div>

                    <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA ---------------------------- -->
                    <!-- ---------------------------- BOTAO PARA ENVIAR DOCUMENTA????O PENDENTE---------------------------- -->
                    <?php if ($statuscomissao == 4) { ?>
                        <div class=" text-center m-3">
                            <div>
                                <button class="d-block p-2 btn  w-100 " data-toggle="modal" data-target="#APROVA" role="button" id="buttoncontrol" style="font-size:33px;"><i class="uil uil-file-check-alt"></i>Aprovar Ve??culo</button>
                            </div>
                        </div>
                        <!-- ---------------------------- BOTAO PARA DOCUMENTA????O PENDENTE ---------------------------- -->
                    <?php } ?>
                    <?php if ($nivelacesso == 15 && $statuscomissao != 4) { ?>
                        <div class=" text-center m-3">
                            <div>
                                <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVACOMISSAO" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Ve??culo <?php echo $statcomissao ?>/3</button>
                            </div>
                        </div>
                        <!-- ---------------------------- BOTAO PARA DOCUMENTA????O PENDENTE ---------------------------- -->
                <?php }
                        } ?>
                <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                <div class="modal fade bd-example-modal-lg" id="APROVA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                    Aprovar Ve??culo
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body mx-auto">
                                <form action="../src/partegestao/boletoturismo.php" method="POST" enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row text-align-center text-uppercase font-weight-bold h4 mx-auto">
                                            Aprovar Ve??culo com Placa: <?php echo $placa ?>
                                        </div>
                                        <div class="row mx-auto justify-content-center">
                                            <div class="d-flex justify-content-center font-weight-bold h5">
                                                Documento do Permission??rio: <?php echo $cpf_permissionario ?>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col d-flex justify-content-center font-weight-bold">
                                                    <label for="datalicenca"><input id="datalicenca" name="datalicenca" type="checkbox" onchange="valueChangedlicenca()" /> Vigencia da Licen??a</label>
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
                                                            <option value="FLORIPA INSPE????ES">FLORIPA INSPE????ES</option>
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
                            <input type="text" name="docperm" hidden value="<?php echo $doc_permissionario ?>">
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
                <div class="modal fade bd-example-modal-lg" id="APROVACOMISSAO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                    Aprovar Ve??culo
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body mx-auto">
                                <form action="../src/partegestao/aprovacomissaoveiculoturismo.php" method="POST">
                                    <div class="container">
                                        <div class="row text-align-center text-uppercase font-weight-bold h4 mx-auto">
                                            Aprovar Ve??culo com Placa: <?php echo $placa ?>
                                        </div>
                                        <div class="row mx-auto justify-content-center">
                                            <div class="d-flex justify-content-center font-weight-bold h5">
                                                Documento do Permission??rio: <?php echo $cpf_permissionario ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                            <input type="text" name="docperm" hidden value="<?php echo $cpf_permissionario ?>">
                            <input type="text" name="placa" hidden value="<?php echo $placa ?>">
                            <input type="text" name="gestoMatricula" hidden value="<?php echo $gestoMatricula ?>">



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
                </div>
                <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                <div class="modal fade bd-example-modal-lg" id="PENDENTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                    Selecione a Documenta????o Pendente
                                </h2>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="../src/partegestao/pendencia_carturismo.php" method="POST">
                                    <div id="documentsform">
                                        <div style="text-align:center;font-size:20px;"> <label for="seguroapp"><input id="seguroapp" name="seguroapp" type="checkbox" value="1" /><strong>SEGURO APP PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshowm" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshowm">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_turismo/' . $seguroapp . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                        <div style="text-align:center;font-size:20px;"> <label for="termodevistoria"><input id="termodevistoria" name="termodevistoria" type="checkbox" value="1" /><strong>TERMO DE VISTORIA PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoriam" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoriam">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $termodevistoria . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                        <div style="text-align:center;font-size:20px;"> <label for="licenciamento"><input id="licenciamento" name="licenciamento" type="checkbox" value="1" /><strong>LICENCIAMENTO DO VE??CULO PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#eem" aria-expanded="false" aria-controls="vistoria">Mostrar Documento</button></div><?php echo '<div class="collapse" id="eem">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $licenciamentoveiculo . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                        <div style="text-align:center;font-size:20px;"> <label for="formespec"><input id="formespec" name="formespec" type="checkbox" value="1" /><strong>FOTO VE??CULO PENDENTE</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form">Mostrar Documento</button></div><?php echo '<div class="collapse" id="form">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_veiculoturismo/' . $fotoveiculo . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                        <br>
                                        <div class="form-group">
                                            <label for="notapendencia" class="col-form-label" style="font-size:1.5rem"><strong>Nota de Observa????o:</strong></label>
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
                                    Enviar Documenta????o Pendente
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL A??OES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background-image:<?php echo $buttonstyle ?>">
                            <div class="modal-header ">
                                <h3 class="modal-title font-weight-bold" id="MODAL_ficha"><strong>A????es do Motorista no Site</strong></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_mot WHERE email = '$email'";
                                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                                while ($row = $resultado_selectalteracoes->fetch()) {
                                    $var = json_decode(($row['alteracoesfeitas']));
                                    echo '<table id="dtBasicExample4" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm">
                                            <thead>
                                              <tr>
                                                <th scope="col" style="font-size:20px">Data Altera????o</th>
                                                <th scope="col" style="font-size:20px">Altera????o Feita</th>
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
                <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL A??OES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                </div>
        </div>
        <div align=center class="m-3"><a href="gestao.php" class="btn btn-warning" align=center>Fechar | Voltar</a></div>
    <?php

            } else {
                echo '<div class="alert alert-danger" role="alert">N??o foi poss??vel achar o cadastro!</div>' . $query_02;
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