<?php
session_start();

/* require('../login/session_valida.php'); */
require_once('../login/session_status_src.php');

include_once("../src/conexao.php");
// link geral do gerado de pdf - biblioteca mpdf

$cpf_usuario = $_SESSION['usuariocpf'];
$operador_email = $_SESSION['usuarioEmail']; //recebe da pagina anterior o numero do cadastro
$operador_nome = $_SESSION['usuarionome']; //recebe da pagina anterior o numero do cadastro


$query_02 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
$query_03 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();
$usuarioEmailSessao = $_SESSION['usuarioEmail'];



if (($resultado_02_count != 0)) {

    while ($row = $resultado_02->fetch()) {
        $nome = $row['nome'];
        $cmc = $row['cmc'];
        $cpf = $row['cpf'];
        $telefone = $row['telefone'];
        $datapart = json_decode(($row['endereco']));
        $endereco = ' ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' , ' . $datapart->bairro . ' , ' . $datapart->cidade . ' , ' . $datapart->CEP;
        $tipo = $row['tipo_motorista'];
        $status = $row['status'];
        $cnh = $row['cnh'];
        $cert_mun = $row['cert_mun'];
        $certpenal = $row['certpenal'];
        $atestadosanidade = $row['atestadosanidade'];
        $inss = $row['inss'];
        $residencia = $row['residencia'];
        $cursodecondutor = $row['cursodecondutor'];
        $quitacao = $row['quitacao'];
        $data_cadastro = date('d-m-Y', strtotime($row['data_cadastro']));
        $cnhs = $row['cnh_status'];
        $cert_muns = $row['certmun_status'];
        $certpenals = $row['certpenal_status'];
        $atestadosanidades = $row['atestado_sanidade_status'];
        $insss = $row['inss_status'];
        $residencias = $row['residencia_status'];
        $cursodecondutors = $row['curso_status'];
        $quitacaos = $row['quitacao_status'];
        $nota = $row['nota_analise'];
        $ponto = $row['ponto'];
        $nperm = $row['codigo_permissionario'];
        $alvara = $row['alvara'];
        $statalvara = $row['statalvara'];
        $pontcnh = $row['pontcnh'];
        $statpontcnh = $row['statpontcnh'];

?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <!-- lang é um atributo-->

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Permissionario</title>
            <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="../public/styles/main.css">
            <link rel="stylesheet" href="../public/styles/partials/header.css">
            <link rel="stylesheet" href="../public/styles/partials/forms.css">
            <link rel="stylesheet" href="../public/styles/partials/step-nav-bar.css">
            <link rel="stylesheet" href="../public/styles/footer.css">
            <link rel="stylesheet" href="../public/styles/partials/fichagestao.css">
            <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
            </link>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
            <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
            <link rel="stylesheet" href="../public/styles/partials/page-cadastrar-viagens.css">

            <link rel="preconnect" href="https://fonts.gstatic.com/">

            <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../public/styles/partials/fichagestao.css">


            <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->
            <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
            <script src="../src/autofill.js"></script>

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

            function onButtonClick() {
                document.getElementById('cad_mot_car').className = "table";
                document.getElementById('search_box').className = "form-control form-control-lg";
            }
            /* $(document).ready(function() {
                $("#search_box").autocomplete("process_data.php", {
                    selectFirst: true
                });
            }); */
        </script>

        <body id="page-cadastrar-viagens" style="margin-bottom:1000px">
            <button type="button" class="btn btn-floating btn-lg" id="myBtnn" onclick="topFunction()">
                <i class="fa fa-arrow-up"></i>
            </button>
            <!-- <button onclick="topFunction()" id="myBtnn" title="Go to top">Top</button> -->
            <div id="container">
                <header class="page-header">
                    <div class="top-bar-container">
                        <nav class="navbar">
                            <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
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

                    <fieldset id="cadastro_contratantes" class="div-show" style="display: block;">
                        <legend> Dados do <?php echo $tipo ?>
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
                        <br>CPF: <b><?php echo $cpf_usuario; ?></b>
                        <br> Telefone: <b><?php echo $telefone; ?></b>
                        <br>Endereço:<b><?php echo $endereco; ?></b>
                        <br>Email: <b><?php echo $operador_email; ?></b>
                        <br>Tipo de Motorista: <b><?php echo $tipo; ?></b>
                        <br>Ponto: <b><?php echo $ponto; ?></b>
                        <br>Nº Permissão: <b><?php echo $nperm; ?></b>
                        <?php if ($status == 2 || $status == 3) {
                        ?><br><br><br><strong style="">NOTA DE PENDENCIA:</strong> <b><?php echo $nota; ?></b><br>
                            <div id="documents"> <?php if ($cnhs == 2) {
                                                    ?> <div style="text-align:center;font-size:20px;"> <strong> CNH PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br> <?php }
                                                                    if ($cert_muns == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                </div>'; ?></b><br> <?php }
                                                                    if ($certpenals == 2) {
                                                                    ?><div style="text-align:center;font-size:20px;"> <strong> CERTIDÃO DE DITRIBUIÇÃO PENAL PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certpenalshow" aria-expanded="false" aria-controls="certpenalshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certpenalshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                    if ($atestadosanidades == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#sanidadeshow" aria-expanded="false" aria-controls="sanidadeshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="sanidadeshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                    if ($cursodecondutors == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#cursoshow" aria-expanded="false" aria-controls="cursoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="cursoshow">
                                                                        <div class="card card-body" style="border:0">
                                                                        <iframe  src="../public/docs_motorista/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                                        </div>
                                                                      </div>'; ?></b><br> <?php }
                                                                                        if ($residencias == 2) {
                                                                                            ?><div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESIDÊNCIA PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashow" aria-expanded="false" aria-controls="residenciashow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                                        if ($inss == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>INSS PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $inss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php }
                                                                                        if ($statpontcnh == 2) {
                                                                        ?><div style="text-align:center;font-size:20px;"><strong>CONSULTA DA CNH PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashowfd" aria-expanded="false" aria-controls="residenciashowfd">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashowfd">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $pontcnh . '" width="95%" height="500px"> </iframe>
                                </div>
                                </div>'; ?></b><br> <?php }
                                                                                        if ($statalvara == 2) {
                                                    ?><div style="text-align:center;font-size:20px;"><strong>ALVARA PENDENTE</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshowfdd" aria-expanded="false" aria-controls="inssshowfdd">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshowfdd">
                                <div class="card card-body" style="border:0">
                                <iframe src="../public/docs_motorista/' . $alvara . '" width="95%" height="500px"> </iframe>
                                </div>
                            </div>'; ?></b><br> <?php } ?>

                            </div>


                            <?php ?>
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
                                        <div class="modal-body">

                                            <form method="post" id="formreenvio" autocomplete="off" action="../src/motorista/resenddocumtospendentes.php" enctype='multipart/form-data'>
                                                <div class="form-row">
                                                    <?php if ($status == 2) {
                                                    ?><strong style="">NOTA DE PENDENCIA:</strong> <b><?php echo $nota; ?></b> <br><?php
                                                                                                                                    if ($cnhs == 2) {
                                                                                                                                    ?><br><strong style=""> CNH PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="cnhp" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $cnh . '" width="90%" height="500px"> </iframe>' */; ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                if ($cert_muns == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                    ?><br><strong style="">CERTIFICADO DE NEGATIVA MUNICIPAL:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="certmunp" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $cert_mun . '" width="90%" height="500px"> </iframe>' */; ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($certpenals == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?><br><strong style="">CERTIDÃO DE DITRIBUIÇÃO PENAL- CENTRO/CONTINENTE/NORTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="certpenalp" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $certpenal . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($atestadosanidades == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?><br><strong style="">ATESTADO DE SANIDADE FÍSICA E MENTAL:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="sanidadep" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="90%" height="500px"> </iframe>'; */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($insss == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">INSS:</strong>:<br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="inssp" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $inss . '" width="90%" height="500px"> </iframe>'; */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($residencias == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?><br><strong style="">COMPROVANTE DE RESIDÊNCIA:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="residenciap" required> <b><?php /* echo '<iframe src="../public/docs_motorista/' . $residencia . '" width="90%" height="500px"> </iframe>'; */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        if ($cursodecondutors == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?><br><strong style="">CURSO DE CONDUTOR:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="cursop" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $cursodecondutor . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            if ($statpontcnh == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?><br><strong style="">CONSULTA PONTUAÇÃO CNH:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="pontcnh" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                if ($statalvara == 2) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?><br><strong style="">ALVARÁ:</strong>:<br> <input type="file" class="form-control-file" id="exampleFormControlFile1" name="alvara" required><b><?php /* echo '<iframe src="../public/docs_motorista/' . $quitacao . '" width="90%" height="500px"> </iframe>';  */ ?></b><br> <?php }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        } ?>
                                                </div>
                                                <input name="cpf" type="hidden" value="<?php echo $row['cpf'] ?>">
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

                                <button class="allign-middle col-md-12 text-center btn-lg p-3 mr-2 mt-5 " data-toggle="modal" data-target="#MODAL_APROVADO" id="123aa" style="background-color:#003466;border:0;border-radius:25px">REENVIAR DOCUMENTOS</button> <?php }
                                                                                                                                                                                                                                                            } else { ?>
                            <div id="documents">
                                <?php if ($alvara != "") { ?>
                                    <div style="text-align:center;font-size:20px;"> <strong> ALVARÁ </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#qqqq" aria-expanded="false" aria-controls="qqqq">Mostrar Documento</button></div><?php echo '<div class="collapse" id="qqqq">
                                                        <div class="card card-body" style="border:0">
                                                        <iframe src="../public/docs_motorista/' . $alvara . '" width="95%" height="500px"> </iframe>
                                                        </div>
                                                        </div>'; ?></b><br>
                                <?php  } ?>
                                <div style="text-align:center;font-size:20px;"> <strong> CNH </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $cnh . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                    </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"> <strong> CERTIFICADO DE NEGATIVA MUNICIPAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certmunshow" aria-expanded="false" aria-controls="certmunshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certmunshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $cert_mun . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                </div>'; ?></b><br>
                                <div style="text-align:center;font-size:20px;"> <strong> CERTIDÃO DE DITRIBUIÇÃO PENAL </strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#certpenalshow" aria-expanded="false" aria-controls="certpenalshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="certpenalshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $certpenal . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br>
                                <?php if ($atestadosanidade != "naoenviado") { ?>
                                    <div style="text-align:center;font-size:20px;"><strong>ATESTADO DE SANIDADE FÍSICA E MENTAL</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#sanidadeshow" aria-expanded="false" aria-controls="sanidadeshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="sanidadeshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $atestadosanidade . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php } ?>
                                <?php if ($cursodecondutor != "naoenviou") { ?>
                                    <div style="text-align:center;font-size:20px;"><strong>CURSO DE CONDUTOR</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#cursoshow" aria-expanded="false" aria-controls="cursoshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="cursoshow">
                                                                        <div class="card card-body" style="border:0">
                                                                        <iframe  src="../public/docs_motorista/' . $cursodecondutor . '" width="95%" height="500px"> </iframe>
                                                                        </div>
                                                                      </div>'; ?></b><br> <?php } ?>
                                <div style="text-align:center;font-size:20px;"><strong>COMPROVANTE DE RESIDÊNCIA</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#residenciashow" aria-expanded="false" aria-controls="residenciashow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="residenciashow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $residencia . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br>
                                <?php if ($inss != "naoenviado") { ?>
                                    <div style="text-align:center;font-size:20px;"><strong>INSS</strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#inssshow" aria-expanded="false" aria-controls="inssshow">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="inssshow">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $inss . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br> <?php } ?>
                                <div style="text-align:center;font-size:20px;"><strong>PONTUAÇÃO CNH</strong></div>
                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0" type="button" data-toggle="collapse" data-target="#ss" aria-expanded="false" aria-controls="ss">Mostrar Documento</button></div> <b><?php echo '<div class="collapse" id="ss">
                                                    <div class="card card-body" style="border:0">
                                                    <iframe src="../public/docs_motorista/' . $pontcnh . '" width="95%" height="500px"> </iframe>
                                                    </div>
                                                  </div>'; ?></b><br>
                            <?php } ?>
                            <!-- </div> -->

                    </fieldset>

                    <fieldset id="cadastro_veiculo" class="div-show" style="display: block;text-align:center">
                        <?php if ($status == 1 && $tipo == "permissionario") { ?><div style="padding:20px"><button onclick="onButtonClick()" style="border:0;background-color: transparent;color:#003466;font-size:35px"><i class="uil uil-plus" style="display:inline;font-size:30px;color:#003466"></i>Cadastrar Motorista</button></div><?php } ?>
                        <input type="text" name="search_box" class="hide" placeholder="Digite aqui o CPF do motorista..." id="search_box" style="margin-bottom: 50px;" />
                        <form method="post" id="cad_mot_car" class="hide" action="../src/motorista/cadastramotoristanopermissionario.php">
                            <input type="hidden" id="placa_car" name="cpfperm" value="<?php echo $cpf; ?>">
                            <input type="hidden" id="placa_car" name="nomeperm" value="<?php echo $nome; ?>">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Tipo</th>
                                                <!-- <th>Status</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" id="nome_veic" name="nome_veic" style="border: none;background: transparent;"></td>
                                                <td><input type="text" id="cpf_veic" name="cpf_veic" style="border: none;background: transparent;"></td>
                                                <td><input type="text" id="telefone_veic" name="telefone_veic" style="border: none;background: transparent;"></td>
                                                <td><input type="text" id="tipo_veic" name="tipo_veic" style="border: none;background: transparent;"></td>
                                                <input type="text" id="status" name="status" style="border: none;background: transparent;" hidden>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <input type="text" id="cpfuser" name="cpfuser" style="border: none;background: transparent;" hidden value=<?php echo $cpf_usuario ?>>
                            <input type="text" id="nperm" name="nperm" style="border: none;background: transparent;" hidden value=<?php echo $nperm ?>>
                            <div style="padding:20px">
                                <button type="submit" class="btn btn-primary" id="add_motorista" style="border:0;background-color: transparent;color:#003466;font-size:35px"><i class="uil uil-user" style="display:inline;font-size:30px;"></i>Salvar Motorista no Carro</button>
                            </div>

                        </form>
                        <!--  </legend> -->
                        <legend></legend>
                        <?php
                        if (($resultado_03_count != 0)) {

                            while ($row = $resultado_03->fetch()) {
                                $mot_ondetrabalho = $row['permissionariosondetrabalho'];
                                $mot_trabalhapramim = $row['motoristasquetrabalhampramim'];
                                if ($mot_ondetrabalho == "") {
                                    echo '<div id="cadastro_veiculo_show" style="display:block;text-align:center">
                                    <legend align="center" style="text-align:center;display:block">Não estou cadastrado em nenhum Permissionário!</legend>
                                    </div>';
                                } else {
                                    $mot_data = $row['permissionariosondetrabalho'];
                                    $mot_data = json_decode(($row['permissionariosondetrabalho']));


                                    echo '<div class="table">
                                    <table class="table table-striped" style="caption-side: top;">
                                    <caption style="text-align:center;font-weight:bolder;font-size:1.8rem;color:#003466">Motoristas para quem trabalho!</caption>
                                        <thead >
                                            <tr style="text-align:left">
                                                <th>Status</th>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                                <th>Nº Permissionário</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            ';
                                    foreach ($mot_data as $item) {
                                        echo  '<tr>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->status . '</td>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->nome . '</td>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->cpf . '</td>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->nperm . '</td>
                                                </tr>'



                                            /* <div id="cadastro_veiculo_show" style="display:block">
                                    Nome: <b>' . $item->nome . '</b>&nbsp&nbsp&nbspCPF: <b>' .  $item->cpf . '</b>&nbsp&nbsp&nbspTelefone: <b>' .  $item->telefone . '</b>&nbsp&nbsp&nbspTipo do Operador: <b>' .  $item->tipo . '</b>
                                    </div>' */;
                                    }
                                    echo '
                                        </tbody>
                                    </table>
                                </div>';
                                }
                                if ($mot_trabalhapramim == "" && $tipo == "permissionario") {
                                    echo '<div id="cadastro_veiculo_show" style="display:block;text-align:center;">
                                    <legend align="center" style="text-align:center;display:block">Nenhum motorista trabalha para mim!</legend>
                                    </div>';
                                } elseif ($tipo == "permissionario") {
                                    $mot_datas = $row['motoristasquetrabalhampramim'];
                                    $mot_datas = json_decode(($row['motoristasquetrabalhampramim']));


                                    echo '
                                    
                                    <div class="table">
                                    
                                    <table class="table table-striped" style="caption-side: top;">
                                        <caption style="text-align:center;font-weight:bolder;font-size:1.8rem;color:#003466">Motoristas que trabalham para mim!</caption>
                                        <thead >
                                            <tr style="text-align:left">
                                                <th>Status</th>
                                                <th>Nome</th>
                                                <th>CPF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ';
                                    foreach ($mot_datas as $item) {
                                        echo  '<tr>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->status . '</td>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->nome . '</td>
                                                <td style="border: none;background: transparent;text-align:left">' . $item->cpf . '</td>
                                                </tr>'



                                            /* <div id="cadastro_veiculo_show" style="display:block">
                                    Nome: <b>' . $item->nome . '</b>&nbsp&nbsp&nbspCPF: <b>' .  $item->cpf . '</b>&nbsp&nbsp&nbspTelefone: <b>' .  $item->telefone . '</b>&nbsp&nbsp&nbspTipo do Operador: <b>' .  $item->tipo . '</b>
                                    </div>' */;
                                    }
                                    echo '
                                        </tbody>
                                    </table>
                                </div>';
                                }
                            }
                        }  ?>

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