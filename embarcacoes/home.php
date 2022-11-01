<?php
session_start();
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
require_once('../login/session_statusembarcacoes.php');
include_once("../src/conexao.php");
$data_atual = date("d-m-Y");
$cpf_usuario = $_SESSION['embarcacoescpf'];
$cpf_usuario = trim($cpf_usuario);
$tipo = $_SESSION['usuariotipo'];
$operador_email = $_SESSION['embarcacoesEmail'];
$query_02 = "SELECT * FROM permissionarios.turismo WHERE email = '$operador_email'";
$title = "Faça o seu Cadastro";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
if (($resultado_02_count != 0)) {
    while ($row = $resultado_02->fetch()) {
        $nome = $row['nome'];
        $cmc = $row['cmc'];
        $documento = $row['documento'];
        $tipodoescolar = $row['tipodocumento'];
        $statusm = $row['status'];
        $title = '<div>Painel de Gestão <div style="font-size:20px"> Nome: ' . $nome . ' <br> Documento: ' . $documento . '</div> </div>';
    }
}
$query_03 = "SELECT * FROM permissionarios.veiculoturismo WHERE doc_permissionario = '$documento'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();
?>


<!DOCTYPE html>
<html lang="pt-br">
<!-- lang é um atributo-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="../public/styles/partials/header.css"> -->
    <link rel="stylesheet" href="../public/styles/partials/page-home.css">
    <link rel="stylesheet" href="../public/styles/footer.css">
    <link rel="stylesheet" href="../public/styles/partials/newheader.css">
    <link rel="stylesheet" href="../public/styles/main.css">
    <link rel="stylesheet" href="../public/styles/footercadastros.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script>

</head>
<style>
    #footer {
        display: flex;
        flex-direction: row;
        height: 200px;
        position: relative;
        bottom: -85px;
    }

    .buttonhome {
        width: 300px;
        height: 4rem;
        background: #003466;
        color: white;
        border: 0;
        border-radius: 0.8rem;
        cursor: pointer;
        font: 700 1.6rem Montserrat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: 0.2s;
        margin-top: 3.2rem;
        text-decoration: none;
    }

    .buttonhome:hover {
        text-decoration: none;
        color: white;
        background: #4a7196;
    }
</style>
<script>
    function sendform() {
        document.getElementById("formuserer").submit();
    }
</script>

<body id="page-minhas-viagens">
    <div class="flex-wrapper">
        <div id="container">

            <header class="page-header">
                <div data-include="headermenu2logos"></div>
                <div data-include="headermenu_perms"></div>
                <div class="header-content">
                    <div class="top-bar-container">

                        <div><strong>Painel de Gestão</strong></div>
                        <div>
                            <blockquote>Turismo</blockquote>
                        </div>

                    </div>

                </div>
            </header>
            <?php if ($resultado_02_count != 0) {
                if ($statusm == 0) {
                    $cadastro_status = "Em Análise";
                    $alerta = "alerta3";
                } elseif ($statusm == 1) {
                    $cadastro_status = "Aprovada";
                    $alerta = "alerta2";
                } elseif ($statusm == 2) {
                    $cadastro_status = "Pendente de Informações";
                    $alerta = "alerta1";
                } elseif ($statusm == 3) {
                    $cadastro_status = "Aguarde a Reanálise";
                    $alerta = "alerta1";
                } ?>
                <main>
                    <article class="minhas-viagens-item p-3">
                        <div>
                            <div class="d-flex justify-content-left"> <strong style="font-size: 2.5rem;">Cadastro do Autorizado</strong></div>
                            <div id="asdaddsda"><b class="d-flex justify-content-left" style="font-size: 1.8rem;"><?php echo $nome ?></b>
                                <div><strong> Documento:</strong> <?php echo $documento ?> <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></div>
                                <!-- <div class="d-flex justify-content-around" style="text-align: center;"> -->
                                <div class="container" style="padding-left:0;text-align-last: left;">
                                    <div class="row">

                                        <?php
                                        if ($resultado_03_count != 0) { ?>
                                            <div class="col" style="text-align: left;padding-left:0;">
                                                <div><strong style="font-size: 2.5rem;">Cadastro de Veículos</strong></div>
                                                <?php
                                                while ($row = $resultado_03->fetch()) {
                                                    $cpf = $row['doc_permissionario'];
                                                    $placa = $row['placa'];
                                                    $modelo = $row['modelo'];
                                                    $chassi = $row['chassi'];
                                                    $status = $row['status'];
                                                    $boleto = $row['boleto'];

                                                    $data_cadastro = date('d-m-Y', strtotime($row['data_cadastro']));

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
                                                ?>
                                                    <div id="asdaddsda"><b class="portugues" style="font-size: 1.8rem;font-weight: 500;"><strong> Placa: </strong><?php echo $placa ?></b> <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></div>
                                            <?php }
                                            } ?>
                                            </div>
                                        <?php } ?>
                                        <!-- </div> -->
                    </article>
                    <?php if ($resultado_02_count >= 1) { ?>
                        <article class="minhas-viagens-item p-3">
                            <div class="groupbuttons">
                                <div class="mt-3 mb-3" style="text-align: -webkit-center">
                                    <a href="meus-cadastros.php" class="buttonhome" style="font-size:20px;text-align: -webkit-center">
                                        <div>Acessar Cadastros</div>
                                    </a>
                                </div>
                                <div class="mt-3 mb-3" style="text-align: -webkit-center;">
                                    <a href="cadastrar-carro.php" class="buttonhome" style="font-size:20px;">Cadastrar Veículo</a>
                                </div>
                                <div class="mt-3 mb-3" style="text-align: -webkit-center;">
                                    <a href="cadastrar-embarcacao.php" class="buttonhome" style="font-size:20px;">Cadastrar Embarcação</a>
                                </div>
                            </div>
                        </article>
                </main>

            <?php } else { ?>

                <main>
                    <article class=" minhas-viagens-item d-flex flex-column p-3">
                        <div class="d-flex align-items-left" style="flex-direction: column;">
                            <div style="align-self:center"><strong style="font-size:20px">Primeiro Acesso</strong></div><br>
                            <div class="mb-2"><b style="font-weight: 100;">É seu primeiro acesso na plataforma. Você precisa fazer seu cadastro como autorizado para poder cadastrar seu veículo.</b></div>
                        </div>
                        <div style="align-self: center;"><a href="cadastrar-embarcacoes.php" class="buttonhome" style="font-size:20px">Me Cadastrar</a></div>
                        <!-- <div class="box-detail">
                            <strong>*O CADASTRO DE VEÍCULOS PODE SER FEITO SOMENTE SE O CADASTRO DO MOTORISTA PERMISSIONÁRIO JÁ FOI APROVADO.</strong>
                        </div> -->
                    </article>
                </main>

            <?php } ?>

        </div>
        <div data-include="FOOTERlogos"></div>
    </div>
</body>
<script>
    // le arquivos externos da pagina


    $(function() {
        var includes = $('[data-include]')
        $.each(includes, function() {
            var file = '../../general/public/views/' + $(this).data('include') + '.php'
            $(this).load(file)
        })
    })


    // validar form 01 - pedido de incentivo e termo declaratorio
</script>

</html>