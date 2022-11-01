<?php
session_start();

/* require('../login/session_valida.php'); */
require_once('../login/session_statusembarcacoes.php');

include_once("../src/conexao.php");
// link geral do gerado de pdf - biblioteca mpdf

$cpf_usuario = $_SESSION['embarcacoescpf'];
$cpf_usuario = trim($cpf_usuario);
$tipo = $_SESSION['usuariotipo'];
$operador_email = $_SESSION['embarcacoesEmail']; //recebe da pagina anterior o numero do cadastro


$query_02 = "SELECT * FROM permissionarios.turismo WHERE email = '$operador_email'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
/* $query_03 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();
$usuarioEmailSessao = $_SESSION['usuarioEmail']; */



if (($resultado_02_count != 0)) {

    while ($row = $resultado_02->fetch()) {
        $nome = $row['nome'];
        $documento = $row['documento'];
        $telefone = $row['telefone'];
        $status = $row['status'];

        $cnpj = $row['cnpj'];
        $statcnpj = $row['statcnpj'];

        $alvara = $row['alvara'];
        $alvarastatus = $row['alvarastatus'];

        $certpenal = $row['certpenal'];
        $certpenal_status = $row['certpenal_status'];


        $inss = $row['negativainss'];
        $inssstatus = $row['negativainssstatus'];

        $cert_mun = $row['cert_mun'];
        $certmun_status = $row['certmun_status'];

        $negativaestadual = $row['negativaestadual'];
        $negativaestadualstatus = $row['negativaestadualstatus'];

        $negativafederal = $row['negativafederal'];
        $negativafederalstatus = $row['negativafederalstatus'];

        $negativafgts = $row['negativafgts'];
        $negativafgtsstatus = $row['negativafgtsstatus'];

        $contratosocial = $row['contratosocial'];
        $contratosocialstatus = $row['contratosocialstatus'];

        $cadastrur = $row['cadastrur'];
        $statcadastrur = $row['statcadastrur'];

        $renovacao = $row['renovacao'];
        $statrenovacao = $row['statrenovacao'];

        $app = $row['app'];
        $statapp = $row['statapp'];

        $dam = $row['dam'];
        $statdam = $row['statdam'];


        $nota = $row['nota_analise'];
        $data_cadastro = date('d-m-Y', strtotime($row['data_cadastro']));
        /* $cnhs = $row['cnh_status'];
        $cert_muns = $row['certmun_status'];
        $certpenals = $row['certpenal_status'];
        $atestadosanidades = $row['atestado_sanidade_status'];
        $insss = $row['inss_status'];
        $residencias = $row['residencia_status'];
        $cursodecondutors = $row['curso_status'];
        $quitacaos = $row['quitacao_status'];
        $nota = $row['nota_analise'] */

?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <!-- lang é um atributo-->

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Autorizado</title>
            <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


            <link rel="stylesheet" href="../public/styles/main.css">
            <link rel="stylesheet" href="../public/styles/partials/header.css">
            <link rel="stylesheet" href="../public/styles/partials/forms.css">
            <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
            <link rel="stylesheet" href="../public/styles/footer.css">
            <link rel="stylesheet" href="../public/styles/partials/fichagestao.css">

            <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">

            <link rel="preconnect" href="https://fonts.gstatic.com/">

            <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

            <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->



            <!--  <script src="../public/scripts/on-off.js"></script> -->

        </head>
        <!-- <script type="text/javascript">
        function form_submit() {
            document.getElementById("formreenvio").submit();
            }
        </script> -->
        <style>
            .alerta1 {
                color: #e7a414;
                border: 1px solid #e7a414;
                border-radius: .4rem;
                padding: .1rem 1rem;
            }

            .alerta2 {
                color: var(--color-secondary-dark);
                border: 1px solid var(--color-secondary-dark);
                border-radius: .4rem;
                padding: .1rem 1rem;
            }

            .alerta3 {
                color: var(--color-primary-lighter);
                border: 1px solid var(--color-primary-lighter);
                border-radius: .4rem;
                padding: .1rem 1rem;
            }

            #myBtnn {
                display: none;
                position: fixed;
                bottom: 20px;
                right: 30px;
                z-index: 99;
                font-size: 18px;
                border: none;
                outline: none;
                background-color: #4B7AAA;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 30px;
            }

            #myBtnn:hover {
                background-color: #003466;
            }
        </style>
        <script>
            $("#123aa").click(function() {
                var a = 5;
                if (a == 5) {
                    alert("if");
                    $('#MODAL_APROVADO').modal('show');
                } else {
                    alert("else");
                    $('#MODAL_APROVADO').modal('hide');
                }
            });
        </script>

        <body id="page-cadastrar-viagens">
            <button type="button" class="btn btn-floating btn-lg" id="myBtnn" onclick="topFunction()">
                <i class="fa fa-arrow-up"></i>
            </button>
            <!-- <button onclick="topFunction()" id="myBtnn" title="Go to top">Top</button> -->
            <div id="container">
                <header class="page-header">
                    <div class="top-bar-container">
                        <nav class="navbar">
                            <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                            <div style="color:white;font-size:40px;margin-right: 3%;">Turismo</div>
                            <a href="#" class="toggle-button">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </a>
                            <ul class="navbar-links">
                                <li>
                                    <a href="home.php">Inicio</a>
                                </li>
                                <li>
                                    <a href="../login/sair.php">Sair</a>
                                </li>

                            </ul>
                        </nav>
                    </div>

                    <div class="header-content">
                        <div>
                            <strong>
                                Ficha de Cadastro</strong>
                            <p>Aqui estão os seus dados</p>
                        </div>
                    </div>

                </header>

                <main>

                    <fieldset id="cadastro_contratantes" class="div-show" style="display: block;padding-bottom:50px;margin-bottom:100px">
                        <legend> Dados do Autorizado
                            <?php
                            if ($status == 0) {
                                $cadastro_status = "Em Análise";
                                $alerta = "alerta3";
                            } elseif ($status == 1) {
                                $cadastro_status = "Aprovada";
                                $alerta = "alerta2";
                            } elseif ($status == 2) {
                                $cadastro_status = "Pendente de Informações";
                                $alerta = "alerta1";
                            } elseif ($status == 3) {
                                $cadastro_status = "Aguarde a Reanálise";
                                $alerta = "alerta1";
                            }


                            ?> <div>
                                <strong class="portugues" style="font-size: 2rem;">Status: <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></strong>
                            </div>
                        </legend>
                        Nome: <b><?php echo $nome; ?></b>
                        <br>Documento: <b><?php echo $documento; ?></b>
                        <br> Telefone: <b><?php echo $telefone; ?></b>
                        <br>Email: <b><?php echo $operador_email; ?></b>
                        <?php if ($status == 2 || $status == 3) {
                        ?><br><br><br><strong style="">NOTA DE PENDENCIA:</strong> <b><?php echo $nota; ?></b><br>
                            <div id="documents"> <?php if ($statcnpj == 2) {
                                                    ?> <div style="text-align:center;font-size:20px;"> <strong> CNPJ PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnpjshow" aria-expanded="false" aria-controls="cnpjshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnpjshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $cnpj . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($certmun_status == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($certpenal_status == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"> <strong> CERTIDÃO DE NEGATIVA PENAL PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certpenalshow" aria-expanded="false" aria-controls="certpenalshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certpenalshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($atestadosanidadestatus == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#sanidadeshow" aria-expanded="false" aria-controls="sanidadeshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="sanidadeshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($cursodecondutorstatus == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#cursoshow" aria-expanded="false" aria-controls="cursoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="cursoshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe  src="../public/docs_motorista/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($residenciastatus == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESIDÊNCIA PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashow" aria-expanded="false" aria-controls="residenciashow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($inssstatus == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>INSS PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $inss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($alvarastatus == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>ALVARÁ PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($multasstatus == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>NEGATIVA DE MULTAS PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $multas . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($negativaestadualstatus == 2) { ?><div style="text-align:center;font-size:20px;"><strong>NEGATIVA ESTADUAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#estadual" aria-expanded="false" aria-controls="estadual">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="estadual">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $negativaestadual . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br><?php }
                                                                    if ($negativafederalstatus == 2) { ?><div style="text-align:center;font-size:20px;"><strong>NEGATIVA FEDERAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#FEDERAL" aria-expanded="false" aria-controls="FEDERAL">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="FEDERAL">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $negativafederal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($negativafgtsstatus == 2) { ?> <div style="text-align:center;font-size:20px;"><strong>NEGATIVA FGTS PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#FGTS" aria-expanded="false" aria-controls="FGTS">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="FGTS">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $negativafgts . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <?php }
                                                                    if ($statcadastrur == 2) { ?><div style="text-align:center;font-size:20px;"><strong>CADASTRUR PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#CADASTRUR" aria-expanded="false" aria-controls="CADASTRUR">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="CADASTRUR">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $cadastrur . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <?php }
                                                                    if ($statrenovacao == 2) { ?><div style="text-align:center;font-size:20px;"><strong>RENOVÇÃO DO CADASTRO DE EMPRESA PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#CADASTRO" aria-expanded="false" aria-controls="CADASTRO">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="CADASTRO">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $renovacao . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>




                                <?php } ?>


                                <?php if ($contratosocialstatus == 2) { ?> <div style="text-align:center;font-size:20px;"><strong>CONTRATO SOCIAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashowss" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashowss">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $contratosocial . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                           

            </div>


        <?php } ?>
        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
        <div id="MODAL_APROVADO" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MODAL_ficha" style="font-size:25px;">Reenviar Documentos Pendentes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="margin-left:20px">

                        <form method="post" id="formreenvio" autocomplete="off" action="../src/embarcacoes/resenddocumtospendentesturismo.php" enctype='multipart/form-data'>
                            <div class="form-row">
                                <?php if ($status == 2) {
                                ?><strong style="">NOTA DE PENDENCIA:</strong> <b><?php echo $nota; ?></b> <br><?php
                                                                                                                if ($alvarastatus == 2) {
                                                                                                                ?><br><strong style=""> ALVARÁ PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="alvara" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $cnh . '" width="90%" height="500px"> </iframe>' */; ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                if ($multasstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                    ?><br><strong style="">NEGATIVA DE MULTAS PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="multas" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $cert_mun . '" width="90%" height="500px"> </iframe>' */; ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($cnhstatus == 2) { ?>
                                        <br><strong style="">CNH PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="CNHP" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $certpenal . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($certmun_status == 2) {
                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">NEGATIVA MUNICIPAL PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="negturismo" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="90%" height="500px"> </iframe>'; */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($certpenalstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">NEGATIVA PENAL PENDENTE:</strong>:<br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="certpenal" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $inss . '" width="90%" height="500px"> </iframe>'; */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($atestadosanidadestatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">ATESTADO DE SANIDADE PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="sanidade" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $residencia . '" width="90%" height="500px"> </iframe>'; */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($inssstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><br><strong style="">INSS PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="neginsspj" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $cursodecondutor . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($residenciastatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">COMPROVANTE DE RESIDENCIA PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="residencia" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($cursodecondutorstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">CURSO DE CONDUTOR PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="curso" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($negativaestadualstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?><br><strong style="">NEGATIVA ESTADUAL PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="negestpg" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($negativafederalstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><br><strong style="">NEGATIVA FEDERAL PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="negfedpj" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($negativafgtsstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?> <br><strong style="">NEGATIVA DO FGTS PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="negfgtspj" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    if ($contratosocialstatus == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ?><br><strong style="">CONTRATO SOCIAL PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="contratosocial" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($statcnpj == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?><br><strong style="">CNPJ PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cnpj" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($certpenal_status == 2) { ?>
                                    <br><strong style="">NEGATIVA PENAL PENDENTE:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="certpenal" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php } ?>
                            </div>
                            <input name="documento" type="hidden" value="<?php echo $documento ?>">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" style="border:0;background:none;color:#003466">Fechar</button>
                                <button type="button submit" class="btn btn-primary" style="border:0;background:none;color:#003466" onclick="form_submit()">Reenviar Documentos</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
        <?php if ($status == 2) { ?>
            <div id="documents" style="text-align:center">
                <button class="allign-middle col-md-12 text-center btn-lg p-3 mr-2 mt-5 " data-toggle="modal" data-target="#MODAL_APROVADO" id="123aa" style="border:0;background-color:#0275d8;color:white; width:800px;border-radius:15px">REENVIAR DOCUMENTOS</button>
            </div> <?php }
                        }
                        if ($status != 2 && $status != 3) { ?>
        <div id="documents">
            <div style="text-align:center;font-size:20px;"><strong>ALVARÁ</strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#quitacaoshow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="quitacaoshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                    </div>.n
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>CARTÃO CNPJ</strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#qwe" aria-expanded="false" aria-controls="qwe">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="qwe">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $cnpj . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"> <strong>NEGATIVA MUNICIPAL </strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>NEGATIVA ESTADUAL </strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#estadual" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="estadual">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $negativaestadual . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>NEGATIVA FEDERAL </strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#federal" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="federal">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $negativafederal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>NEGATIVA FGTS </strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashow" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $negativafgts . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>INSS </strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $inss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>CONTRATO SOCIAL</strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#multashowss" aria-expanded="false" aria-controls="quitacaoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="multashowss">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $contratosocial . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>NEGATIVA PENAL</strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#penal" aria-expanded="false" aria-controls="penal">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="penal">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>SEGURO APP</strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#APP" aria-expanded="false" aria-controls="APP">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="APP">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
            <div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE PAGAMENTO DA DAM</strong></div>
            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#DAM" aria-expanded="false" aria-controls="DAM">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="DAM">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_turismo/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>';
                                                                                                                                                                                                                                            } ?></b><br>

            </fieldset>
            <!-- HTML !-->

            </main>
            <!-- <footer>
                <div class="d-flex align-items-center flex-column">
                    <strong class="text-center">Secretaria Municipal de Planejamento Urbano</strong>
                    <br>
                    Contato:
                    <a class="portugues" href="#">smpu@pmf.sc.gov.br</a>
                </div>
                <div class="vl"></div>
                    <div>
                        <ul>
                            <li>
                                <a class="portugues" href="./cadastrar-login.php">Primeiro acesso</a>
                            </li>
                            <li>
                                <a class="portugues" href="./login.php">Entrar</a>
                            </li>
                        </ul>

                    </div>
                </footer> -->
            <!--  <button class="button-56" role="button">Button 56</button>   -->

            <!-- </div> -->

            <script>
                //Get the button
                var mybutton = document.getElementById("myBtnn");
                console.log(mybutton)
                // When the user scrolls down 20px from the top of the document, show the button
                window.onscroll = function() {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        mybutton.style.display = "block";
                    } else {
                        mybutton.style.display = "none";
                    }
                }

                // When the user clicks on the button, scroll to the top of the document
                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>

        </body>

        </html>

<?php
    }
}

// }

else {
    echo "<div class='alert alert-danger' role='alert'>Não foi possível encontrar o cadastro!</div>";
}
?>