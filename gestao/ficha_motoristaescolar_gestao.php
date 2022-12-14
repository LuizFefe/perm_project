<?php
session_start();
include_once("../src/conexao.php");
require_once('../login/session_statusgestao.php');
$nivelacesso = $_SESSION['gestorNivelacesso'];
$tipoescolar = $_GET['tipo'];
$docperm = $_GET['doc'];
$gestoMatricula = $_SESSION['gestormatricula'];
$query_02 = "SELECT * FROM permissionarios.motoristaescolar where documento  = '$docperm'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
if ($tipoescolar == 'CNPJ') {
    while ($row = $resultado_02->fetch()) {
        $nome = $row['nome'];
        $email = $row['email'];
        $documento = $row['documento'];
        $cmc = $row['cmc'];
        $endereco = json_decode($row['endereco']);
        $enderecofinal = $endereco->logradouro . ', Bairro ' . $endereco->bairro . ' , ' . $endereco->numero . ' ' . $endereco->complemento . ' , Cidade ' . $endereco->cidade . ' , CEP ' . $endereco->CEP;
        $data_cadastro = $row['data_cadastro'];
        $stat = $row['status'];
        $nota_analise = $row['nota_analise'];
        $telefone = $row['telefone'];
        $colegiolocalponto = $row['colegio_localdeponto'];
        $itinerario = $row['itinerario'];

        $cert_mun = $row['cert_mun'];
        $certmunstat = $row['certmun_status'];

        $alvara = $row['alvara'];
        $alvarastatus = $row['alvarastatus'];

        $negativaestadual = $row['negativaestadual'];
        $negativaestadualstatus = $row['negativaestadualstatus'];

        $negativafederal = $row['negativafederal'];
        $negativafederalstatus = $row['negativafederalstatus'];

        $negativainss = $row['negativainss'];
        $negativainssstatus = $row['negativainssstatus'];

        $negativafgts = $row['negativafgts'];
        $negativafgtsstatus = $row['negativafgtsstatus'];

        $statcomissao = $row['statuscomissao'];
        if ($statcomissao != 1 && $statcomissao != 2 && $statcomissao != 3) {
            $statcomissao = 0;
        }

        $boleto_pagamento = $row['boleto_pagamento'];
        $nperm = $row['codigo_permissionario'];
        $cpf_view1 = substr($row['cpf'], -11, 3);
        $cpf_view2 = substr($row['cpf'], -8, 3);
        $cpf_view3 = substr($row['cpf'], -5, 3);
        $cpf_view4 = substr($row['cpf'], -2);
        $cpfshow =  $cpf_view1 . "." . $cpf_view2 . "." . $cpf_view3 . "-" . $cpf_view4;
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

    <body style="<?php echo $bodybg ?>">
        <div role="main">
            <div class="container" role="main" style="font-family:montserrat;">
                <!-- TOPO -->
                <div id="smpu_topo"></div>
                <!-- TOPO -->
                <?php
                if (($resultado_02_count != 0)) {
                    if (($stat) == 0) {
                        $status = "Em An??lise";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-primary text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 1) {
                        $status = "Permission??rio Aprovado";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-success text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 2) {
                        $status = "Documento Pendente";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color#f0ad4e;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 3) {
                        $status = "Documentos Reenviados";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#f0ad4e;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    } ?>
                    <div class="containerborder" role="main">

                        <h3 class="text-uppercase font-weight-bold">
                            <div class="<?php echo $classstatus ?>"><br>
                                <p style="text-align: center; margin-top:13px;font-size:30px"><?php echo $status ?></p>
                            </div>

                            <div class="<?php echo $permclass ?>" style="<?php echo $permstyle ?>">
                                <?php
                                echo  'N?? do Permission??rio - ' . $nperm;
                                ?>
                            </div>
                        </h3>
                        <div>
                            <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->
                            <div class="justify-content-between h5 mt-5 mb-5 font-weight-bold" style="<?php echo $infostyle ?>" id="containterinfo">
                                <div>
                                    <b class="text-muted">Nome: </b><?php echo $nome; ?><br>
                                    <b class="text-muted">Documento: </b><?php echo $documento; ?><br>
                                    <b class="text-muted">Endere??o: </b><?php echo $enderecofinal; ?><br>
                                    <b class="text-muted">Telefone: </b><?php echo $telefone; ?><br>
                                    <b class="text-muted">Email: </b><?php echo $email; ?><br>
                                    <b class="text-muted">CMC: </b><?php echo $cmc; ?><br>
                                    <b class="text-muted">Col??gio/Local de Ponto: </b><?php echo $colegiolocalponto; ?><br>
                                    <b class="text-muted">Itiner??rio: </b><?php echo $itinerario; ?><br>
                                    <b class="text-muted">Data de Cadastro: </b><?php echo $data_cadastro; ?>
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
                                    <div style="text-align:center;font-size:20px;"><strong>ALVAR??</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                    <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                    <div style="text-align:center;font-size:20px;"><strong>NEGATIVA ESTADUAL </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUAL" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativaestadual . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                    <div style="text-align:center;font-size:20px;"><strong>NEGATIVA FEDERAL </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativafederal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                    <div style="text-align:center;font-size:20px;"><strong>NEGATIVA FGTS </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativafgts . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                    <div style="text-align:center;font-size:20px;"><strong>NEGATIVA INSS </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativainss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    '; ?></b><br>
                                </div>
                        </div><?php }
                            if ($stat == 2 || $stat == 3) {
                                ?><div id="documents" class="mx-auto"> <br><br><br>
                            <div style="margin-left: 55px;"><strong style="font-size:25px">NOTA DE PENDENCIA:</strong> <b class="font-weight-bold" style="font-size:25px"><?php echo $nota_analise; ?></b></div><br><br><br>
                            <?php if ($alvarastatus == 2) {
                            ?> <div style="text-align:center;font-size:20px;"><strong>ALVAR?? PENDENTE</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                    </div>
                                    </div>'; ?></b><br> <?php }
                                                    if ($negativaestadualstatus == 2) {
                                                        ?> <div style="text-align:center;font-size:20px;"><strong>NEGATIVA ESTADUAL PENDENTE</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUAL" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUAL">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_escolar/' . $negativaestadual . '" width="95%" height="500px"> </iframe>
                                    </div>
                                    </div>'; ?></b><br> <?php }
                                                    if ($negativafederalstatus == 2) {
                                                        ?><div style="text-align:center;font-size:20px;"><strong>NEGATIVA FEDERAL PENDENTE</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_escolar/' . $negativafederal . '" width="95%" height="500px"> </iframe>
                                    </div>
                                    </div>'; ?></b><br> <?php }
                                                    if ($negativainssstatus == 2) {
                                                        ?> <div style="text-align:center;font-size:20px;"><strong>NEGATIVA INSS PENDENTE</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_escolar/' . $negativainss . '" width="95%" height="500px"> </iframe>
                                    </div>
                                    </div>
                                    '; ?></b><br> <?php }
                                                    if ($negativafgtsstatus == 2) {
                                                    ?> <div style="text-align:center;font-size:20px;"><strong>NEGATIVA FGTS PENDENTE</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_escolar/' . $negativafgts . '" width="95%" height="500px"> </iframe>
                                    </div>
                                    </div>'; ?></b><br> <?php }
                                                    if ($certmunstat == 2) {
                                                        ?> <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL PENDENTE</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                    <div class="card card-body" style="border:0">
                                    <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                    </div></div>
                                    '; ?></b><br> <?php } ?>
                        </div>
                    <?php }
                            if ($stat == 0 && $nivelacesso > 1 ||  $stat == 3 && $nivelacesso > 1) { ?>
                        <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                        <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA---------------------------- -->
                        <div class=" text-center m-3">
                            <div>
                                <button class="d-block p-2 btn btn-warning w-100" data-toggle="modal" data-target="#PENDENTEpj" role="button" id="buttoncontrol" style="font-size:33px"><i class="uil uil-file-times-alt"></i>Documenta????o Pendente</button>
                            </div>
                        </div>

                        <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA ---------------------------- -->
                        <!-- ---------------------------- BOTAO PARA ENVIAR DOCUMENTA????O PENDENTE---------------------------- -->
                        <?php if ($nivelacesso == 15) { ?>
                            <div class=" text-center m-3">
                                <div>
                                    <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVACOMISSAO" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Motorista <?php echo $statcomissao ?>/3</button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class=" text-center m-3">
                                <div>
                                    <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVA" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Motorista</button>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- ---------------------------- BOTAO PARA DOCUMENTA????O PENDENTE ---------------------------- -->
                    <?php } ?>
                    <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                    <div class="modal fade bd-example-modal-lg" id="APROVA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                        Aprovar Motorista
                                    </h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body mx-auto">
                                    <form action="../src/partegestao/aprovarpermescolar.php" method="POST">
                                        <div class="container">
                                            <div class="row text-uppercase font-weight-bold h4 mx-auto" style="justify-content:center">
                                                Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                            </div>
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col d-flex justify-content-center font-weight-bold h5" style="white-space: nowrap;">
                                                    N?? do Permission??rio: <?php echo $nperm ?>
                                                </div>
                                                <div class="col d-flex justify-content-center font-weight-bold h5">
                                                    CNPJ: <?php echo $documento ?>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                <input type="text" name="documento" hidden value="<?php echo $documento ?>">
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
                    <!-- ----------------------------MODAL APROVAR MOTORISTA COMISSAO ---------------------------- -->
                    <div class="modal fade bd-example-modal-lg" id="APROVACOMISSAO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                        Aprovar Motorista
                                    </h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-body mx-auto">
                                    <form action="../src/partegestao/aprovacomissaoescolar.php" method="POST">
                                        <div class="container">
                                            <div class="row text-uppercase font-weight-bold h4 mx-auto" style="justify-content:center">
                                                Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                            </div>
                                            <div class="row mx-auto justify-content-center">
                                                <div class="col d-flex justify-content-center font-weight-bold h5" style="white-space: nowrap;">
                                                    N?? do Permission??rio: <?php echo $nperm ?>
                                                </div>
                                                <div class="col d-flex justify-content-center font-weight-bold h5">
                                                    CNPJ: <?php echo $documento ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($nivelacesso == 15) { ?>

                                            <label for="editDocuments" style="text-align:center"><input type="checkbox" name="editDocument" id="editDocuments" value="1">Editar Documenta????o</label>
                                            <div style="display:flex;flex-direction:column">
                                                <label for="nameperm" class="doccumenteditable">Nome</label>
                                                <input type="text" name="nameperm" id="nameperm" class="doccumenteditable" value="<?php echo $nome; ?>">
                                                <label for="cpfperm" class="doccumenteditable">Documento</label>
                                                <input type="text" name="cpfperm" id="cpfperm" class="doccumenteditable" value="<?php echo $docperm; ?>">
                                                <label for="telefoneperm" class="doccumenteditable">Telefone</label>
                                                <input type="text" name="telefoneperm" id="telefoneperm" class="doccumenteditable" value="<?php echo $telefone; ?>">
                                                <label for="emailperm" class="doccumenteditable">Email</label>
                                                <input type="text" name="emailperm" id="emailperm" class="doccumenteditable" value="<?php echo $email; ?>">
                                                <label for="cmcperm" class="doccumenteditable">CMC</label>
                                                <input type="text" name="cmcperm" id="cmcperm" class="doccumenteditable" value="<?php echo $cmc; ?>">
                                                <label for="cmcperm" class="doccumenteditable">Col??gio/Local do Ponto</label>
                                                <input type="text" name="colegiolocalponto" id="colegiolocalponto" class="doccumenteditable" value="<?php echo $colegiolocalponto; ?>">

                                                <!-- </div> -->
                                            </div>
                                        <?php } ?>
                                </div>

                                <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                <input type="text" name="documento" hidden value="<?php echo $documento ?>">
                                <input type="text" name="email" hidden value="<?php echo $email ?>">
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
                    </div><!-- /.modal -->
                    <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                    <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                    <div class="modal fade bd-example-modal-lg" id="PENDENTEpj" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <form action="../src/partegestao/pendenciapermescolar.php" method="POST">
                                        <div id="documentsform">
                                            <div style="text-align:center"> <label for="cnh"><input id="cnh" name="alvara" type="checkbox" value="1" /><strong>ALVAR??</strong></label></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ALVARAMODAL" aria-expanded="false" aria-controls="quitacaoshowMODAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ALVARAMODAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                            <br>
                                            <div style="text-align:center"><label for="certpenal"><input id="certpenal" name="cert_mun" type="checkbox" value="1" /><strong>NEGATIVA MUNICIPAL</strong></label></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshowMODAL" aria-expanded="false" aria-controls="certmunshowMODAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshowMODAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                            <br>
                                            <div style="text-align:center"><label for="sanidade"><input id="sanidade" name="negativaestadual" type="checkbox" value="1" /><strong>NEGATIVA ESTADUAL</strong></label></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUALMODAL" aria-expanded="false" aria-controls="ESTADUALMODAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUALMODAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativaestadual . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                            <br>
                                            <div style="text-align:center"><label for="residencia"><input id="residencia" name="negativafederal" type="checkbox" value="1" /><strong>NEGATIVA FEDERAL</strong></label></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#FEDERALhowMODAL" aria-expanded="false" aria-controls="quitacaoshowMODAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="FEDERALhowMODAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativafederal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                            <br>
                                            <div style="text-align:center"><label for="condutor"><input id="condutor" name="negativafgts" type="checkbox" value="1" /><strong>NEGATIVA FGTS</strong></label></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowMODAL" aria-expanded="false" aria-controls="quitacaoshowMODAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowMODAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativafgts . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                            <br>
                                            <div style="text-align:center"><label for="inss"><input id="inss" name="negativainss" type="checkbox" value="1" /><strong>NEGATIVA INSS</strong></label></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshowMODAL" aria-expanded="false" aria-controls="inssshowMODAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshowMODAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $negativainss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>
                                                    '; ?></b><br>
                                        </div>
                                        <div class="form-group">
                                            <label for="notapendencia" class="col-form-label" style="font-size:1.5rem;"><strong>Nota de Observa????o:</strong></label>
                                            <textarea class="form-control" id="notapendencia" style="height:115px;background-color: rgb(207, 223, 239);font-size:1.3rem" name="notapendencia"></textarea>
                                        </div>
                                        <input type="text" name="documento" hidden value="<?php echo $documento ?>">
                                        <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                        <input type="text" name="email" hidden value="<?php echo $email ?>">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Fechar
                                    </button>
                                    <button type="submit" class="btn btn-success">
                                        Enviar Documenta????o Pendente
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                            </form>
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                    <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL A??OES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                    <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" style="background-image:<?php echo $buttonstyle ?>">
                                <div class="modal-header">
                                    <h3 class="modal-title font-weight-bold" id="MODAL_ficha">A????es do Motorista no Site</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_mot WHERE email = '$email' limit 1";
                                    $resultado_selectalteracoes = $conn->query($selectalteracoes);
                                    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                                    while ($row = $resultado_selectalteracoes->fetch()) {
                                        $var = json_decode(($row['alteracoesfeitas']));
                                        echo '<table id="dtBasicExample4" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm">
                                            <thead>
                                              <tr>
                                                <th scope="col">Data Altera????o</th>
                                                <th scope="col">Altera????o Feita</th>
                                              </tr>
                                            </thead>
                                            <tbody>';
                                        foreach ($var as $item) {
                                            echo '    <tr>
                                                <td>' . $item->DataAlteracao . '</td>
                                                <td>' . $item->TipodeAlteracao . '</td></tr>';
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
                    </DIV>
            </DIV>
        </div>
        <div align=center class="m-3"><a href="gestao.php" class="btn btn-warning" align=center>Fechar | Voltar</a></div>
    <?php

                } else {
                    echo "<div class='alert alert-danger' role='alert'>N??o foi poss??vel achar o cadastro!</div>";
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

        function valueChangedselo() {
            if ($('#dataselo').is(":checked"))
                $("#vigselo").show();
            else
                $("#vigselo").hide();
        }

        function valueChangedlicenca() {
            if ($('#datalicenca').is(":checked"))
                $("#viglicenca").show();
            else
                $("#viglicenca").hide();
        }
        $(function() {
            $(".doccumenteditable").hide();

            //show it when the checkbox is clicked
            $("#editDocuments").on("click", function() {
                console.log("ClickBUTTON");
                if ($(".doccumenteditable").is(":hidden")) {
                    console.log("Show");
                    $(".doccumenteditable").fadeIn();
                    $("select option[value*='<?php echo $ponto ?>']").prop("selected", true);
                } else {
                    console.log("Hide");
                    $(".doccumenteditable").hide();
                }
            });
        });
    </script>



    </body>

    </html> <?PHP }











        if ($tipoescolar == 'CPF') {
            while ($row = $resultado_02->fetch()) {
                $nome = $row['nome'];
                $email = $row['email'];
                $documento = $row['documento'];
                $cmc = $row['cmc'];
                $endereco = json_decode($row['endereco']);
                $enderecofinal = $endereco->logradouro . ', Bairro ' . $endereco->bairro . ' , ' . $endereco->numero . ' ' . $endereco->complemento . ' , Cidade ' . $endereco->cidade . ' , CEP ' . $endereco->CEP;
                $data_cadastro = $row['data_cadastro'];
                $stat = $row['status'];
                $nota_analise = $row['nota_analise'];
                $telefone = $row['telefone'];
                $colegiolocalponto = $row['colegio_localdeponto'];
                $itinerario = $row['itinerario'];





                $cnh = $row['cnh'];
                $cnhstat = $row['cnh_status'];

                $cert_mun = $row['cert_mun'];
                $certmunstat = $row['certmun_status'];

                $certpenal = $row['certpenal'];
                $certpenalstat = $row['certpenal_status'];

                $atestadosanidade = $row['atestadosanidade'];
                $atestadosanidadestat = $row['atestado_sanidade_status'];

                $cursodecondutor = $row['cursodecondutor'];
                $cursodecondutorstat = $row['curso_status'];

                $residencia = $row['residencia'];
                $residenciastat = $row['residencia_status'];

                $alvara = $row['alvara'];
                $alvarastatus = $row['alvarastatus'];

                $multa = $row['multas'];
                $multastatus = $row['multasstatus'];

                $statcomissao = $row['statuscomissao'];
                if ($statcomissao != 1 && $statcomissao != 2 && $statcomissao != 3) {
                    $statcomissao = 0;
                }
                $boleto_pagamento = $row['boleto_pagamento'];
                $nperm = $row['codigo_permissionario'];
                $cpf_view1 = substr($row['cpf'], -11, 3);
                $cpf_view2 = substr($row['cpf'], -8, 3);
                $cpf_view3 = substr($row['cpf'], -5, 3);
                $cpf_view4 = substr($row['cpf'], -2);
                $cpfshow =  $cpf_view1 . "." . $cpf_view2 . "." . $cpf_view3 . "-" . $cpf_view4;
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



    <body style="<?php echo $bodybg ?>">
        <div role="main">
            <div class="container" role="main" style="font-family:montserrat;">
                <!-- TOPO -->
                <div id="smpu_topo"></div>
                <!-- TOPO -->
                <?php
                if (($resultado_02_count != 0)) {
                    if (($stat) == 0) {
                        $status = "Em An??lise";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-primary text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 1) {
                        $status = "Permission??rio Aprovado";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-success text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 2) {
                        $status = "Documento Pendente";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color#f0ad4e;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 3) {
                        $status = "Documentos Reenviados";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#f0ad4e;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    } ?>
                    <div class="containerborder" role="main">

                        <h3 class="text-uppercase font-weight-bold">
                            <div class="<?php echo $classstatus ?>"><br>
                                <p style="text-align: center; margin-top:13px;font-size:30px"><?php echo $status ?></p>
                            </div>

                            <div class="<?php echo $permclass ?>" style="<?php echo $permstyle ?>">
                                <?php
                                echo  'N?? do Permission??rio - ' . $nperm;
                                ?>
                            </div>
                        </h3>

                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->
                        <div class="d-flex justify-content-between h5 mt-5 mb-5 font-weight-bold" style="<?php echo $infostyle ?>">
                            <div>
                                <b class="text-muted">Nome: </b><?php echo $nome; ?><br>
                                <b class="text-muted">Documento: </b><?php echo $documento; ?><br>
                                <b class="text-muted">Endere??o: </b><?php echo $enderecofinal; ?><br>
                                <b class="text-muted">Telefone: </b><?php echo $telefone; ?><br>
                                <b class="text-muted">Email: </b><?php echo $email; ?><br>
                                <b class="text-muted">CMC: </b><?php echo $cmc; ?><br>
                                <b class="text-muted">Col??gio/Local de Ponto: </b><?php echo $colegiolocalponto; ?><br>
                                <b class="text-muted">Itiner??rio: </b><?php echo $itinerario; ?><br>
                                <b class="text-muted">Data de Cadastro: </b><?php echo $data_cadastro; ?>
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
                                <div style="text-align:center;font-size:20px;"><strong>CNH</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>NEGATIVA PENAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUAL" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE F??SICA E MENTAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESID??NCIA </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div></div>
                                                    '; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>ALVAR??</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshows" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshows">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>NEGATIVA DE MULTAS</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $multa . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                            </div>
                        <?php }
                        if ($stat == 2 || $stat == 3) { ?>
                            <div id="documents" class="mx-auto"> <br><br><br>
                                <div style="margin-left: 55px;"><strong style="font-size:25px">NOTA DE PENDENCIA:</strong> <b class="font-weight-bold" style="font-size:25px"><?php echo $nota_analise; ?></b></div><br><br><br>
                                <?php if ($cnhstat == 2) {
                                ?> <div style="text-align:center;font-size:20px;"><strong>CNH PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                            <div class="card card-body" style="border:0">
                                            <iframe src="../public/docs_escolar/' . $cnh . '" width="95%" height="500px"> </iframe>
                                            </div>
                                            </div>'; ?></b><br> <?php }
                                                            if ($certmunstat == 2) {
                                                                ?> <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($certpenalstat == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>NEGATIVA PENAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUAL" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($atestadosanidadestat == 2) {
                                                                        ?> <div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE F??SICA E MENTAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($cursodecondutorstat == 2) {
                                                                        ?> <div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($residenciastat == 2) {
                                                                        ?> <div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESID??NCIA PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div></div>
                                                    '; ?></b><br> <?php }
                                                                    if ($alvarastatus == 2) {
                                                                    ?> <div style="text-align:center;font-size:20px;"><strong>ALVAR?? PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowe" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowe">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br> <?php }
                                                                    if ($multastatus == 2) {
                                                                    ?> <div style="text-align:center;font-size:20px;"><strong>NEGATIVA DE MULTAS PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshoww" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshoww">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $multa . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br> <?php } ?>

                            </div>
                            <?php }
                        if ($stat == 0 && $nivelacesso > 1 ||  $stat == 3 && $nivelacesso > 1) {

                            if ($tipoescolar == 'CPF') { ?>
                                <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                                <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA---------------------------- -->
                                <div class=" text-center m-3">
                                    <div>
                                        <button class="d-block p-2 btn btn-warning w-100" data-toggle="modal" data-target="#PENDENTEpf" role="button" id="buttoncontrol" style="font-size:33px"><i class="uil uil-file-times-alt"></i> Documenta????o Pendente</button>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA ---------------------------- -->
                            <!-- ---------------------------- BOTAO PARA ENVIAR DOCUMENTA????O PENDENTE---------------------------- -->
                            <?php if ($nivelacesso == 15) { ?>
                                <div class=" text-center m-3">
                                    <div>
                                        <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVACOMISSAO" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Motorista <?php echo $statcomissao ?>/3</button>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class=" text-center m-3">
                                    <div>
                                        <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVA" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Motorista</button>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ---------------------------- BOTAO PARA DOCUMENTA????O PENDENTE ---------------------------- -->
                        <?php }
                        /* if ($row['status'] == 1) {

                    ?>
                        <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                        <div class="mb-3">
                            <strong> CNH:</strong> <br> <b><?php echo '<iframe src="../public/docs_motorista/' . $cnh . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>CERTID??O DE DITRIBUI????O PENAL- CENTRO/CONTINENTE/NORTE:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $certpenal . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>CERTIFICADO DE NEGATIVA MUNICIPAL:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $cert_mun . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>ATESTADO DE SANIDADE F??SICA E MENTAL:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>COMPROVANTE DE RESID??NCIA:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $residencia . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>CURSO DE CONDUTOR:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $cursodecondutor . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>QUITA????O SINDICAL:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>INSS:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $inss . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        </div>
                    
                    <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                <?php } */ ?>
                        <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                        <div class="modal fade bd-example-modal-lg" id="APROVA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                            Aprovar Motorista
                                        </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <form action="../src/partegestao/aprovarpermescolar.php" method="POST">
                                            <div class="container">
                                                <div class="row text-uppercase font-weight-bold h4 mx-auto" style="justify-content:center">
                                                    Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                                </div>
                                                <div class="row mx-auto justify-content-center">
                                                    <div class="col d-flex justify-content-center font-weight-bold h5" style="white-space: nowrap;">
                                                        N?? do Permission??rio: <?php echo $nperm ?>
                                                    </div>
                                                    <div class="col d-flex justify-content-center font-weight-bold h5">
                                                        Documento: <?php echo $documento ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                    <input type="text" name="documento" hidden value="<?php echo $documento ?>">
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
                        <!-- ----------------------------MODAL APROVAR MOTORISTA COMISSAO ---------------------------- -->
                        <div class="modal fade bd-example-modal-lg" id="APROVACOMISSAO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                            Aprovar Motorista
                                        </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <form action="../src/partegestao/aprovacomissaoescolar.php" method="POST">
                                            <div class="container">
                                                <div class="row text-uppercase font-weight-bold h4 mx-auto" style="justify-content:center">
                                                    Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                                </div>
                                                <div class="row mx-auto justify-content-center">
                                                    <div class="col d-flex justify-content-center font-weight-bold h5" style="white-space: nowrap;">
                                                        N?? do Permission??rio: <?php echo $nperm ?>
                                                    </div>
                                                    <div class="col d-flex justify-content-center font-weight-bold h5">
                                                        CNPJ: <?php echo $documento ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($nivelacesso == 15) { ?>

                                                <label for="editDocuments" style="text-align:center"><input type="checkbox" name="editDocument" id="editDocuments" value="1">Editar Documenta????o</label>
                                                <div style="display:flex;flex-direction:column">
                                                    <label for="nameperm" class="doccumenteditable">Nome</label>
                                                    <input type="text" name="nameperm" id="nameperm" class="doccumenteditable" value="<?php echo $nome; ?>">
                                                    <label for="cpfperm" class="doccumenteditable">Documento</label>
                                                    <input type="text" name="cpfperm" id="cpfperm" class="doccumenteditable" value="<?php echo $docperm; ?>">
                                                    <label for="telefoneperm" class="doccumenteditable">Telefone</label>
                                                    <input type="text" name="telefoneperm" id="telefoneperm" class="doccumenteditable" value="<?php echo $telefone; ?>">
                                                    <label for="emailperm" class="doccumenteditable">Email</label>
                                                    <input type="text" name="emailperm" id="emailperm" class="doccumenteditable" value="<?php echo $email; ?>">
                                                    <label for="cmcperm" class="doccumenteditable">CMC</label>
                                                    <input type="text" name="cmcperm" id="cmcperm" class="doccumenteditable" value="<?php echo $cmc; ?>">
                                                    <label for="cmcperm" class="doccumenteditable">Col??gio/Local do Ponto</label>
                                                    <input type="text" name="colegiolocalponto" id="colegiolocalponto" class="doccumenteditable" value="<?php echo $colegiolocalponto; ?>">

                                                    <!-- </div> -->
                                                </div>
                                            <?php } ?>
                                    </div>

                                    <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                    <input type="text" name="documento" hidden value="<?php echo $documento ?>">
                                    <input type="text" name="email" hidden value="<?php echo $email ?>">
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
                        </div><!-- /.modal -->
                        <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                        <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                        <div class="modal fade bd-example-modal-lg" id="PENDENTEpf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <form action="../src/partegestao/pendenciapermescolar.php" method="POST">
                                            <div id="documentsform">
                                                <div style="text-align:center"> <label for="cnh"><input id="cnh" name="cnh" type="checkbox" value="1" /><strong>CNH</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="cert_mun"><input id="cert_mun" name="cert_mun" type="checkbox" value="1" /><strong> CERTIFICADO DE NEGATIVA MUNICIPAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshowS" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshowS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="negpen"><input id="negpen" name="negpen" type="checkbox" value="1" /><strong>NEGATIVA PENAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUALS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUALS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="sanidade"><input id="sanidade" name="sanidade" type="checkbox" value="1" /><strong>ATESTADO DE SANIDADE F??SICA E MENTAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federalS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federalS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="curso"><input id="curso" name="curso" type="checkbox" value="1" /><strong>CURSO DE CONDUTOR</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashowS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashowS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="residencia"><input id="residencia" name="residencia" type="checkbox" value="1" /><strong>COMPROVANTE DE RESID??NCIA</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshowS" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshowS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>
                                                    '; ?></b><br>
                                                <div style="text-align:center"> <label for="alvara"><input id="alvara" name="alvara" type="checkbox" value="1" /><strong>ALVAR??</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $multa . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="multas"><input id="multas" name="multas" type="checkbox" value="1" /><strong>NEGATIVA DE MULTAS</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="notapendencia" class="col-form-label" style="font-size:1.5rem;"><strong>Nota de Observa????o:</strong></label>
                                                <textarea class="form-control" id="notapendencia" style="height:115px;background-color: rgb(207, 223, 239);font-size:1.3rem" name="notapendencia"></textarea>
                                            </div>
                                            <input type="text" name="documento" hidden value="<?php echo $documento ?>">
                                            <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                            <input type="text" name="email" hidden value="<?php echo $email ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Fechar
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            Enviar Documenta????o Pendente
                                        </button>
                                    </div>
                                </div><!-- /.modal-content -->
                                </form>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL A??OES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                        <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="background-image:<?php echo $buttonstyle ?>">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="MODAL_ficha">A????es do Motorista no Site</h3>
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
                                                <th scope="col">Data Altera????o</th>
                                                <th scope="col">Altera????o Feita</th>
                                              </tr>
                                            </thead>
                                            <tbody>';
                                            foreach ($var as $item) {
                                                echo '    <tr>
                                                <td>' . $item->DataAlteracao . '</td>
                                                <td>' . $item->TipodeAlteracao . '</td></tr>';
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
                    <div align=center class="m-3"><a href="gestao.php" class="btn btn-warning" align=center>Fechar | Voltar</a></div>
                <?php

                } else {
                    echo "<div class='alert alert-danger' role='alert'>N??o foi poss??vel achar o cadastro!</div>";
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

            function valueChangedselo() {
                if ($('#dataselo').is(":checked"))
                    $("#vigselo").show();
                else
                    $("#vigselo").hide();
            }

            function valueChangedlicenca() {
                if ($('#datalicenca').is(":checked"))
                    $("#viglicenca").show();
                else
                    $("#viglicenca").hide();
            }
            $(function() {
                $(".doccumenteditable").hide();

                //show it when the checkbox is clicked
                $("#editDocuments").on("click", function() {
                    console.log("ClickBUTTON");
                    if ($(".doccumenteditable").is(":hidden")) {
                        console.log("Show");
                        $(".doccumenteditable").fadeIn();
                        $("select option[value*='<?php echo $ponto ?>']").prop("selected", true);
                    } else {
                        console.log("Hide");
                        $(".doccumenteditable").hide();
                    }
                });
            });
        </script>



    </body>

    </html> <?PHP }

























        if ($tipoescolar == 'MEI') {
            while ($row = $resultado_02->fetch()) {
                $nome = $row['nome'];
                $email = $row['email'];
                $documento = $row['documento'];
                $cmc = $row['cmc'];
                $endereco = json_decode($row['endereco']);
                $enderecofinal = $endereco->logradouro . ', Bairro ' . $endereco->bairro . ' , ' . $endereco->numero . ' ' . $endereco->complemento . ' , Cidade ' . $endereco->cidade . ' , CEP ' . $endereco->CEP;
                $data_cadastro = $row['data_cadastro'];
                $stat = $row['status'];
                $nota_analise = $row['nota_analise'];
                $telefone = $row['telefone'];
                $colegiolocalponto = $row['colegio_localdeponto'];
                $itinerario = $row['itinerario'];





                $cnh = $row['cnh'];
                $cnhstat = $row['cnh_status'];

                $cert_mun = $row['cert_mun'];
                $certmunstat = $row['certmun_status'];

                $certpenal = $row['certpenal'];
                $certpenalstat = $row['certpenal_status'];

                $atestadosanidade = $row['atestadosanidade'];
                $atestadosanidadestat = $row['atestado_sanidade_status'];

                $cursodecondutor = $row['cursodecondutor'];
                $cursodecondutorstat = $row['curso_status'];

                $residencia = $row['residencia'];
                $residenciastat = $row['residencia_status'];

                $alvara = $row['alvara'];
                $alvarastatus = $row['alvarastatus'];

                $multa = $row['multas'];
                $multastatus = $row['multasstatus'];

                $contratosocial = $row['contratosocial'];
                $contratosocialstatus = $row['contratosocialstatus'];

                $statcomissao = $row['statuscomissao'];
                if ($statcomissao != 1 && $statcomissao != 2 && $statcomissao != 3) {
                    $statcomissao = 0;
                }

                $boleto_pagamento = $row['boleto_pagamento'];
                $nperm = $row['codigo_permissionario'];
                $cpf_view1 = substr($row['cpf'], -11, 3);
                $cpf_view2 = substr($row['cpf'], -8, 3);
                $cpf_view3 = substr($row['cpf'], -5, 3);
                $cpf_view4 = substr($row['cpf'], -2);
                $cpfshow =  $cpf_view1 . "." . $cpf_view2 . "." . $cpf_view3 . "-" . $cpf_view4;
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



    <body style="<?php echo $bodybg ?>">
        <div role="main">
            <div class="container" role="main" style="font-family:montserrat;">
                <!-- TOPO -->
                <div id="smpu_topo"></div>
                <!-- TOPO -->
                <?php
                if (($resultado_02_count != 0)) {
                    if (($stat) == 0) {
                        $status = "Em An??lise";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-primary text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 1) {
                        $status = "Permission??rio Aprovado";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-success text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 2) {
                        $status = "Documento Pendente";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color#f0ad4e;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    }
                    if (($stat) == 3) {
                        $status = "Documentos Reenviados";
                        $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-warning text-black justify-content-center text-center align-middle m-3 rounded-top ";
                        $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                        $permstyle = "border-color:#f0ad4e;background-color:rgba(0, 52, 102);color:white";
                        $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                    } ?>
                    <div class="containerborder" role="main">

                        <h3 class="text-uppercase font-weight-bold">
                            <div class="<?php echo $classstatus ?>"><br>
                                <p style="text-align: center; margin-top:13px;font-size:30px"><?php echo $status ?></p>
                            </div>

                            <div class="<?php echo $permclass ?>" style="<?php echo $permstyle ?>">
                                <?php
                                echo  'N?? do Permission??rio - ' . $nperm;
                                ?>
                            </div>
                        </h3>

                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->
                        <div class="d-flex justify-content-between h5 mt-5 mb-5 font-weight-bold" style="<?php echo $infostyle ?>">
                            <div>
                                <b class="text-muted">Nome: </b><?php echo $nome; ?><br>
                                <b class="text-muted">Documento: </b><?php echo $documento; ?><br>
                                <b class="text-muted">Endere??o: </b><?php echo $enderecofinal; ?><br>
                                <b class="text-muted">Telefone: </b><?php echo $telefone; ?><br>
                                <b class="text-muted">Email: </b><?php echo $email; ?><br>
                                <b class="text-muted">CMC: </b><?php echo $cmc; ?><br>
                                <b class="text-muted">Col??gio/Local de Ponto: </b><?php echo $colegiolocalponto; ?><br>
                                <b class="text-muted">Itiner??rio: </b><?php echo $itinerario; ?><br>
                                <b class="text-muted">Data de Cadastro: </b><?php echo $data_cadastro; ?>
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
                                <div style="text-align:center;font-size:20px;"><strong>CNH</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>NEGATIVA PENAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUAL" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUAL">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE F??SICA E MENTAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESID??NCIA </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                </div></div>
                                                '; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>ALVAR??</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshows" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshows">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>NEGATIVA DE MULTAS</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowa" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowa">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $multa . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"><strong>CONTRATO SOCIAL</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshoww" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshoww">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $contratosocial . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                            </div>
                        <?php }
                        if ($stat == 2 || $stat == 3) { ?>
                            <div id="documents" class="mx-auto"> <br><br><br>
                                <div style="margin-left: 55px;"><strong style="font-size:25px">NOTA DE PENDENCIA:</strong> <b class="font-weight-bold" style="font-size:25px"><?php echo $nota_analise; ?></b></div><br><br><br>
                                <?php if ($cnhstat == 2) {
                                ?> <div style="text-align:center;font-size:20px;"><strong>CNH PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                        <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_escolar/' . $cnh . '" width="95%" height="500px"> </iframe>
                                        </div>
                                        </div>'; ?></b><br> <?php }
                                                        if ($certmunstat == 2) {
                                                            ?> <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br> <?php }
                                                                if ($certpenalstat == 2) {
                                                                    ?><div style="text-align:center;font-size:20px;"><strong>NEGATIVA PENAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUAL" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUAL">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br> <?php }
                                                                if ($atestadosanidadestat == 2) {
                                                                    ?> <div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE F??SICA E MENTAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br> <?php }
                                                                if ($cursodecondutorstat == 2) {
                                                                    ?> <div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br> <?php }
                                                                if ($residenciastat == 2) {
                                                                    ?> <div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESID??NCIA PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                </div></div>
                                                '; ?></b><br> <?php }
                                                                if ($alvarastatus == 2) {
                                                                ?> <div style="text-align:center;font-size:20px;"><strong>ALVAR?? PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowe" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowe">
                                            <div class="card card-body" style="border:0">
                                            <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                            </div>
                                            </div>'; ?></b><br> <?php }
                                                                if ($multastatus == 2) {
                                                                ?> <div style="text-align:center;font-size:20px;"><strong>NEGATIVA DE MULTAS PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshoww" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshoww">
                                            <div class="card card-body" style="border:0">
                                            <iframe src="../public/docs_escolar/' . $multa . '" width="95%" height="500px"> </iframe>
                                            </div>
                                            </div>'; ?></b><br> <?php }
                                                                if ($contratosocialstatus == 2) {
                                                                ?> <div style="text-align:center;font-size:20px;"><strong>CONTRATO SOCIAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowww" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowww">
                            <div class="card card-body" style="border:0">
                            <iframe src="../public/docs_escolar/' . $contratosocial . '" width="95%" height="500px"> </iframe>
                            </div>
                            </div>'; ?></b><br> <?php }  ?>

                            </div>
                            <?php }
                        if ($stat == 0 && $nivelacesso > 1 ||  $stat == 3 && $nivelacesso > 1) {

                            if ($tipoescolar == 'MEI') { ?>
                                <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                                <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA---------------------------- -->
                                <div class=" text-center m-3">
                                    <div>
                                        <button class="d-block p-2 btn btn-warning w-100" data-toggle="modal" data-target="#PENDENTEpf" role="button" id="buttoncontrol" style="font-size:33px"><i class="uil uil-file-times-alt"></i> Documenta????o Pendente</button>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA ---------------------------- -->
                            <!-- ---------------------------- BOTAO PARA ENVIAR DOCUMENTA????O PENDENTE---------------------------- -->
                            <?php if ($nivelacesso == 15) { ?>
                                <div class=" text-center m-3">
                                    <div>
                                        <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVACOMISSAO" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Motorista <?php echo $statcomissao ?>/3</button>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class=" text-center m-3">
                                    <div>
                                        <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVA" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar Motorista</button>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- ---------------------------- BOTAO PARA DOCUMENTA????O PENDENTE ---------------------------- -->
                        <?php }
                        /* if ($row['status'] == 1) {

                ?>
                    <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                    <div class="mb-3">
                        <strong> CNH:</strong> <br> <b><?php echo '<iframe src="../public/docs_motorista/' . $cnh . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>CERTID??O DE DITRIBUI????O PENAL- CENTRO/CONTINENTE/NORTE:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $certpenal . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>CERTIFICADO DE NEGATIVA MUNICIPAL:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $cert_mun . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>ATESTADO DE SANIDADE F??SICA E MENTAL:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>COMPROVANTE DE RESID??NCIA:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $residencia . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>CURSO DE CONDUTOR:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $cursodecondutor . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>QUITA????O SINDICAL:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                        <br><strong>INSS:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $inss . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                    </div>
                
                <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
            <?php } */ ?>
                        <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                        <div class="modal fade bd-example-modal-lg" id="APROVA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                            Aprovar Motorista
                                        </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <form action="../src/partegestao/aprovarpermescolar.php" method="POST">
                                            <div class="container">
                                                <div class="row text-uppercase font-weight-bold h4 mx-auto" style="justify-content:center">
                                                    Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                                </div>
                                                <div class="row mx-auto justify-content-center">
                                                    <div class="col d-flex justify-content-center font-weight-bold h5" style="white-space: nowrap;">
                                                        N?? do Permission??rio: <?php echo $nperm ?>
                                                    </div>
                                                    <div class="col d-flex justify-content-center font-weight-bold h5">
                                                        Documento: <?php echo $documento ?>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                    <input type="text" name="documento" hidden value="<?php echo $documento ?>">
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
                        <!-- ----------------------------MODAL APROVAR MOTORISTA COMISSAO ---------------------------- -->
                        <div class="modal fade bd-example-modal-lg" id="APROVACOMISSAO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title font-weight-bold" id="myModalLabel">
                                            Aprovar Motorista
                                        </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <form action="../src/partegestao/aprovacomissaoescolar.php" method="POST">
                                            <div class="container">
                                                <div class="row text-uppercase font-weight-bold h4 mx-auto" style="justify-content:center">
                                                    Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                                </div>
                                                <div class="row mx-auto justify-content-center">
                                                    <div class="col d-flex justify-content-center font-weight-bold h5" style="white-space: nowrap;">
                                                        N?? do Permission??rio: <?php echo $nperm ?>
                                                    </div>
                                                    <div class="col d-flex justify-content-center font-weight-bold h5">
                                                        CNPJ: <?php echo $documento ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($nivelacesso == 15) { ?>

                                                <label for="editDocuments" style="text-align:center"><input type="checkbox" name="editDocument" id="editDocuments" value="1">Editar Documenta????o</label>
                                                <div style="display:flex;flex-direction:column">
                                                    <label for="nameperm" class="doccumenteditable">Nome</label>
                                                    <input type="text" name="nameperm" id="nameperm" class="doccumenteditable" value="<?php echo $nome; ?>">
                                                    <label for="cpfperm" class="doccumenteditable">Documento</label>
                                                    <input type="text" name="cpfperm" id="cpfperm" class="doccumenteditable" value="<?php echo $docperm; ?>">
                                                    <label for="telefoneperm" class="doccumenteditable">Telefone</label>
                                                    <input type="text" name="telefoneperm" id="telefoneperm" class="doccumenteditable" value="<?php echo $telefone; ?>">
                                                    <label for="emailperm" class="doccumenteditable">Email</label>
                                                    <input type="text" name="emailperm" id="emailperm" class="doccumenteditable" value="<?php echo $email; ?>">
                                                    <label for="cmcperm" class="doccumenteditable">CMC</label>
                                                    <input type="text" name="cmcperm" id="cmcperm" class="doccumenteditable" value="<?php echo $cmc; ?>">
                                                    <label for="cmcperm" class="doccumenteditable">Col??gio/Local do Ponto</label>
                                                    <input type="text" name="colegiolocalponto" id="colegiolocalponto" class="doccumenteditable" value="<?php echo $colegiolocalponto; ?>">

                                                    <!-- </div> -->
                                                </div>
                                            <?php } ?>
                                    </div>

                                    <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                    <input type="text" name="documento" hidden value="<?php echo $documento ?>">
                                    <input type="text" name="email" hidden value="<?php echo $email ?>">
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
                        </div><!-- /.modal -->
                        <!-- ----------------------------MODAL APROVAR MOTORISTA  ---------------------------- -->
                        <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                        <div class="modal fade bd-example-modal-lg" id="PENDENTEpf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        <form action="../src/partegestao/pendenciapermescolar.php" method="POST">
                                            <div id="documentsform">
                                                <div style="text-align:center"> <label for="cnh"><input id="cnh" name="cnh" type="checkbox" value="1" /><strong>CNH</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowScnh" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowScnh">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="cert_mun"><input id="cert_mun" name="cert_mun" type="checkbox" value="1" /><strong> CERTIFICADO DE NEGATIVA MUNICIPAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshowS" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshowS">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="negpen"><input id="negpen" name="negpen" type="checkbox" value="1" /><strong>NEGATIVA PENAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ESTADUALS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ESTADUALS">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="sanidade"><input id="sanidade" name="sanidade" type="checkbox" value="1" /><strong>ATESTADO DE SANIDADE F??SICA E MENTAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federalS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federalS">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="curso"><input id="curso" name="curso" type="checkbox" value="1" /><strong>CURSO DE CONDUTOR</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashowS" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashowS">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="residencia"><input id="residencia" name="residencia" type="checkbox" value="1" /><strong>COMPROVANTE DE RESID??NCIA</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshowS" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshowS">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>
                                                '; ?></b><br>
                                                <div style="text-align:center"> <label for="alvara"><input id="alvara" name="alvara" type="checkbox" value="1" /><strong>ALVAR??</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowalvara" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowalvara">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $multa . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="multas"><input id="multas" name="multas" type="checkbox" value="1" /><strong>NEGATIVA DE MULTAS</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshown" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshown">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                                <div style="text-align:center"> <label for="contratosocial"><input id="contratosocial" name="contratosocial" type="checkbox" value="1" /><strong>CONTRATO SOCIAL</strong></label></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshowsss" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshowsss">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_escolar/' . $contratosocial . '" width="95%" height="500px"> </iframe>
                                                </div>
                                                </div>'; ?></b><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="notapendencia" class="col-form-label" style="font-size:1.5rem;"><strong>Nota de Observa????o:</strong></label>
                                                <textarea class="form-control" id="notapendencia" style="height:115px;background-color: rgb(207, 223, 239);font-size:1.3rem" name="notapendencia"></textarea>
                                            </div>
                                            <input type="text" name="documento" hidden value="<?php echo $documento ?>">
                                            <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                            <input type="text" name="email" hidden value="<?php echo $email ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            Fechar
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            Enviar Documenta????o Pendente
                                        </button>
                                    </div>
                                </div><!-- /.modal-content -->
                                </form>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL A??OES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                        <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="background-image:<?php echo $buttonstyle ?>">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="MODAL_ficha">A????es do Motorista no Site</h3>
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
                                            <th scope="col">Data Altera????o</th>
                                            <th scope="col">Altera????o Feita</th>
                                          </tr>
                                        </thead>
                                        <tbody>';
                                            foreach ($var as $item) {
                                                echo '    <tr>
                                            <td>' . $item->DataAlteracao . '</td>
                                            <td>' . $item->TipodeAlteracao . '</td></tr>';
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
                    <div align=center class="m-3"><a href="gestao.php" class="btn btn-warning" align=center>Fechar | Voltar</a></div>
                <?php

                } else {
                    echo "<div class='alert alert-danger' role='alert'>N??o foi poss??vel achar o cadastro!</div>";
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

            function valueChangedselo() {
                if ($('#dataselo').is(":checked"))
                    $("#vigselo").show();
                else
                    $("#vigselo").hide();
            }

            function valueChangedlicenca() {
                if ($('#datalicenca').is(":checked"))
                    $("#viglicenca").show();
                else
                    $("#viglicenca").hide();
            }
            $(function() {
                $(".doccumenteditable").hide();

                //show it when the checkbox is clicked
                $("#editDocuments").on("click", function() {
                    console.log("ClickBUTTON");
                    if ($(".doccumenteditable").is(":hidden")) {
                        console.log("Show");
                        $(".doccumenteditable").fadeIn();
                        $("select option[value*='<?php echo $ponto ?>']").prop("selected", true);
                    } else {
                        console.log("Hide");
                        $(".doccumenteditable").hide();
                    }
                });
            });
        </script>



    </body>

    </html> <?PHP } ?>?>