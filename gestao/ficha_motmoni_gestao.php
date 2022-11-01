<?php
session_start();
include_once("../src/conexao.php");
require_once('../login/session_statusgestao.php');
$nivelacesso = $_SESSION['gestorNivelacesso'];
$cpf_permissionario = $_GET['cpf']; //recebe da pagina anterior o numero do cadastro 
$query_02 = "SELECT * FROM permissionarios.motorista where cpf  = '$cpf_permissionario'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
while ($row = $resultado_02->fetch()) {
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
        <div class="container" role="main" style="font-family:montserrat;max-width:1500px;">
            <!-- TOPO -->
            <div id="smpu_topo"></div>
            <!-- TOPO -->
            <?php
            if (($resultado_02_count != 0)) {
                if (($stat) == 0) {
                    $status = "Em Análise";
                    $classstatus = "shadow p-3 mb-3 d-flex p-2 bg-primary text-black justify-content-center text-center align-middle m-3 rounded-top ";
                    $permclass = "shadow p-3 mb-3 d-flex p-2 justify-content-center text-center align-middle m-3 rounded-bottom ";
                    $permstyle = "border-color:#007bff;background-color:rgba(0, 52, 102);color:white";
                    $infostyle = "border: 5px solid;border-color:#003466;width:90%;padding:10px;border-radius:25px;margin:auto";
                }
                if (($stat) == 1) {
                    $status = "Permissionário Aprovado";
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
                            <?php if ($tipo_motorista == "permissionario") {
                                echo  'Nº do Permissionário - ' . $nperm;
                            } else {
                                echo 'Motorista Auxiliar';
                            } ?>
                        </div>
                    </h3>
                    <div>
                        <!-- ---------------------------- INFOS MOTORISTA ---------------------------- -->
                        <div class="justify-content-between h5 mt-5 mb-5 font-weight-bold" style="<?php echo $infostyle ?>" id="containterinfo">
                            <div>
                                <b class="text-muted">Nome: </b><?php echo $nome; ?><br>
                                <b class="text-muted">CPF: </b><?php echo $cpfshow; ?><br>
                                <b class="text-muted">Endereço: </b><?php echo $enderecofinal; ?><br>
                                <b class="text-muted">Telefone: </b><?php echo $telefone; ?><br>
                                <b class="text-muted">Email: </b><?php echo $email; ?><br>
                                <b class="text-muted">CMC: </b><?php echo $cmc; ?><br>
                                <b class="text-muted">Ponto: </b><?php echo $ponto; ?><br>
                                <b class="text-muted">Data de Cadastro: </b><?php echo $data_cadastro; ?>
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
                                <div style="text-align:center;font-size:30px"> <strong> CNH </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $cnh . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $cert_mun . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"> <strong> CERTIDÃO DE DITRIBUIÇÃO PENAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certpenalshow" aria-expanded="false" aria-controls="certpenalshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certpenalshow">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $certpenal . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#sanidadeshow" aria-expanded="false" aria-controls="sanidadeshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="sanidadeshow">
                                <div class="card card-body" style="border:0;">
                                <iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"><strong>COMPROVANTE DE RESIDÊNCIA</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashow" aria-expanded="false" aria-controls="residenciashow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashow">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $residencia . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"><strong>CURSO DE CONDUTOR</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#cursoshow" aria-expanded="false" aria-controls="cursoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="cursoshow">
                                <div class="card card-body" style="border:0">
                                <iframe  src="../public/docs_motorista/' . $cursodecondutor . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                                <br>
                                <div style="text-align:center;font-size:30px"><strong>INSS</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $inss . '" width="95%" height="850px"> </iframe>
                                </div>
                              </div>'; ?></b><br>
                            </div>
                    </div><?php }
                        if ($stat == 2 || $stat == 3) {
                            ?><div id="documents" class="mx-auto"> <br><br><br>
                        <div style="margin-left: 55px;"><strong style="font-size:25px">NOTA DE PENDENCIA:</strong> <b class="font-weight-bold" style="font-size:25px"><?php echo $nota_analise; ?></b></div><br><br><br>
                        <?php if ($cnhstat == 2) {
                        ?> <div style="text-align:center;font-size:20px;"> <strong> CNH PENDENTE </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($certmunstat == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL PENDENTE </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                </div>'; ?></b><br> <?php }
                                                                    if ($certpenalstat == 2) {
                                                                    ?><div style="text-align:center;font-size:20px;"> <strong> CERTIDÃO DE DITRIBUIÇÃO PENAL PENDENTE </strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certpenalshow" aria-expanded="false" aria-controls="certpenalshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certpenalshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                    if ($atestadosanidadestat == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL PENDENTE</strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#sanidadeshow" aria-expanded="false" aria-controls="sanidadeshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="sanidadeshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                    if ($cursodecondutorstat == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR PENDENTE</strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#cursoshow" aria-expanded="false" aria-controls="cursoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="cursoshow">
                                                                        <div class="card card-body" style="border:0">
                                                                        <iframe  src="../public/docs_motorista/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                                        </div>
                                                                      </div>'; ?></b><br> <?php }
                                                                                        if ($residenciastat == 2) {
                                                                                            ?><div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESIDÊNCIA PENDENTE</strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashow" aria-expanded="false" aria-controls="residenciashow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                                        if ($inssstat == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>INSS PENDENTE</strong></div>
                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $inss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php } ?>
                    </div>
                <?php }
                        if ($stat == 0 && $nivelacesso > 1 ||  $stat == 3 && $nivelacesso > 1) { ?>
                    <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                    <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA---------------------------- -->
                    <div class=" text-center m-3">
                        <div>
                            <button class="d-block p-2 btn btn-warning w-100" data-toggle="modal" data-target="#PENDENTE" role="button" id="buttoncontrol" style="font-size:33px"><i class="uil uil-file-times-alt"></i>Documentação Pendente</button>
                        </div>
                    </div>

                    <!-- ---------------------------- BOTAO PARA APROVAR MOTORISTA ---------------------------- -->
                    <!-- ---------------------------- BOTAO PARA ENVIAR DOCUMENTAÇÃO PENDENTE---------------------------- -->
                    <div class=" text-center m-3">
                        <div>
                            <button class="d-block p-2 btn btn-primary w-100 " data-toggle="modal" data-target="#APROVA" role="button" id="buttoncontrol" style="font-size:33px;background-color:#003466"><i class="uil uil-file-check-alt"></i>Aprovar <?php echo $tipo ?></button>
                        </div>
                    </div>
                    <!-- ---------------------------- BOTAO PARA DOCUMENTAÇÃO PENDENTE ---------------------------- -->
                <?php }
                        /* if ($row['status'] == 1) {

                    ?>
                        <!-- ---------------------------- PDF DOCUMENTOS ---------------------------- -->
                        <div class="mb-3">
                            <strong> CNH:</strong> <br> <b><?php echo '<iframe src="../public/docs_motorista/' . $cnh . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>CERTIDÃO DE DITRIBUIÇÃO PENAL- CENTRO/CONTINENTE/NORTE:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $certpenal . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>CERTIFICADO DE NEGATIVA MUNICIPAL:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $cert_mun . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL:</strong> <b><?php echo '<iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>COMPROVANTE DE RESIDÊNCIA:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $residencia . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>CURSO DE CONDUTOR:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $cursodecondutor . '" width="90%" height="500px"> </iframe>'; ?></b><br>
                            <br><strong>QUITAÇÃO SINDICAL:</strong><br> <b><?php echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>'; ?></b><br>
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
                                <form action="../src/partegestao/aprovarmotorista.php" method="POST">
                                    <div class="container">
                                        <div class="row text-uppercase font-weight-bold h4 mx-auto">
                                            Aprovar <?php echo $tipo_motorista . ' ' . $nome  ?>
                                        </div>
                                        <div class="row mx-auto justify-content-center">
                                            <div class="col d-flex justify-content-center font-weight-bold h5">
                                                Nº do Permissionário: <?php echo $nperm ?>
                                            </div>
                                            <div class="col d-flex justify-content-center font-weight-bold h5">
                                                CPF: <?php echo $cpf ?>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                            <input type="text" name="cpf" hidden value="<?php echo $cpf ?>">
                            <input type="text" name="email" hidden value="<?php echo $email ?>">
                            <input type="text" name="nome" hidden value="<?php echo $nome ?>">
                            <input type="text" name="tipo" hidden value="<?php echo $tipo_motorista ?>">
                            <input type="text" name="cmc" hidden value="<?php echo $cmc ?>">
                            <input type="text" name="telefone" hidden value="<?php echo $telefone ?>">


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
                                <form action="../src/partegestao/pendencia.php" method="POST">
                                    <div id="documentsform">
                                        <div style="text-align:center"> <label for="cnh"><input id="cnh" name="cnh" type="checkbox" value="1" /><strong>CNH</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshowmodal" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_motorista/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                        <br>
                                        <div style="text-align:center"><label for="negmun"><input id="negmun" name="negmun" type="checkbox" value="1" /><strong>CERTIDÃO NEGATIVA MUNICIPAL</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshowmodal" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_motorista/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                        <br>
                                        <div style="text-align:center"><label for="certpenal"><input id="certpenal" name="certpenal" type="checkbox" value="1" /><strong>CERTIDÃO NEGATIVA CRIMINAL</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certpenalshowmodal" aria-expanded="false" aria-controls="certpenalshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certpenalshowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_motorista/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                        <br>
                                        <div style="text-align:center"><label for="sanidade"><input id="sanidade" name="sanidade" type="checkbox" value="1" /><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#sanidadeshowmodal" aria-expanded="false" aria-controls="sanidadeshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="sanidadeshowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                        <br>
                                        <div style="text-align:center"><label for="residencia"><input id="residencia" name="residencia" type="checkbox" value="1" /><strong>COMPROVANTE DE RESIDÊNCIA</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashowmodal" aria-expanded="false" aria-controls="residenciashow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_motorista/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                        <br>
                                        <div style="text-align:center"><label for="condutor"><input id="condutor" name="condutor" type="checkbox" value="1" /><strong>CURSO DE CONDUTOR</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#cursoshowmodal" aria-expanded="false" aria-controls="cursoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="cursoshowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe  src="../public/docs_motorista/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                        <br>
                                        <div style="text-align:center"><label for="inss"><input id="inss" name="inss" type="checkbox" value="1" /><strong>INSS</strong></label></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshowmodal" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshowmodal">
                                                <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_motorista/' . $inss . '" width="95%" height="500px"> </iframe>
                                                </div>
                                            </div>'; ?></b><br>
                                    </div>
                                    <div class="form-group">
                                        <label for="notapendencia" class="col-form-label" style="font-size:1.5rem;"><strong>Nota de Observação:</strong></label>
                                        <textarea class="form-control" id="notapendencia" style="height:115px;background-color: rgb(207, 223, 239);font-size:1.3rem" name="notapendencia"></textarea>
                                    </div>
                                    <input type="text" name="cpfgestor" hidden value="<?php echo $_SESSION['gestorcpf'] ?>">
                                    <input type="text" name="cpf" hidden value="<?php echo $cpf ?>">
                                    <input type="text" name="email" hidden value="<?php echo $email ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Fechar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    Enviar Documentação Pendente
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                        </form>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- ----------------------------MODAL DOCUMENTO PENDENTE  ---------------------------- -->
                <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL AÇOES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="background-image:<?php echo $buttonstyle ?>">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold" id="MODAL_ficha">Ações do Motorista no Site</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                $selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_mot WHERE cpf = '$cpf'";
                                $resultado_selectalteracoes = $conn->query($selectalteracoes);
                                $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                                while ($row = $resultado_selectalteracoes->fetch()) {
                                    $var = json_decode(($row['alteracoesfeitas']));
                                    echo '<table id="dtBasicExample4" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm">
                                            <thead>
                                              <tr>
                                                <th scope="col">Data Alteração</th>
                                                <th scope="col">Alteração Feita</th>
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
                <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL AÇOES *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->

                </div>
                <div align=center class="m-3"><a href="gestao.php" class="btn btn-warning" align=center>Fechar | Voltar</a></div>
            <?php

            } else {
                echo "<div class='alert alert-danger' role='alert'>Não foi possível achar o cadastro!</div>";
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

</html>