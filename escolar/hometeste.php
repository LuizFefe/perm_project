<?php
session_start();
require_once('../login/session_statusescolar.php');
include_once("../src/conexao.php");
$data_atual = date("d-m-Y");
$cpf_usuario = $_SESSION['escolarcpf'];
$cpf_usuario = trim($cpf_usuario);
$tipo = $_SESSION['usuariotipo'];
$operador_email = $_SESSION['escolarEmail'];
$query_02 = "SELECT * FROM permissionarios.motoristaescolar WHERE email = '$operador_email'";
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
    }
}
$query_05 = "SELECT * FROM permissionarios.escolarmotmoni WHERE docpermissionario = '$documento' and tipo = 'Motorista' and status = '1' ";
$resultado_05 = $conn->query($query_05);
$resultado_05_count = $resultado_05->rowCount();
$query_06 = "SELECT * FROM permissionarios.escolarmotmoni WHERE docpermissionario = '$documento' and tipo = 'Monitor' and status = '1'";
$resultado_06 = $conn->query($query_06);
$resultado_06_count = $resultado_06->rowCount();
$query_03 = "SELECT * FROM permissionarios.veiculoescolar WHERE doc_permissionario = '$documento'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();
?>

<!DOCTYPE html>
<html lang="pt-br">
<!-- lang é um atributo-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permissionário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../public/styles/main.css">
    <link rel="stylesheet" href="../public/styles/partials/header.css">
    <link rel="stylesheet" href="../public/styles/partials/page-home.css">
    <link rel="stylesheet" href="../public/styles/footer.css">
    <link rel="stylesheet" href="../public/styles/sidebar.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->

</head>

<body>



    <div id="main">
        <header id="page-header" class="page-header" style="padding-bottom: 40px;">
            <div class="top-bar-container">

                <nav class="navbar">
                    <button class="openbtn" onclick="openNav();resetclose()">☰ Abrir Menu</button>
                    <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                    <ul class="navbar-links">
                        <li>
                            <a class="portugues" href="../login/sair.php">Sair</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="header-content" class="header-content">

                <div>
                    <strong><?php echo $title; ?></strong>
                    <?php if ($resultado_02_count != 0) { ?>
                        <p>
                            <strong>* O CADASTRO DE VEÍCULO PODE SER FEITO APENAS POR MOTORISTAS PERMISSIONÁRIOS COM CADASTRO APROVADO</strong> <br>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </header>
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav();resetclose()" style="padding:0px">×</a>
            <div class="d-flex justify-content-center">
                <form id="qsform">
                    <input type="text" id="search" placeholder="BUSCAR">
                </form>
            </div>
            <a href="#" class="dropdown-btn" id="taxidropdown" onclick="selecttaxista()">Taxistas
                <i class="uil uil-angle-down fa-rotate-45" id="downesc"></i>
            </a>
            <div class="dropdown-container">
                <a href="#" class="dropdownitem" id="permtaxi" onclick="selectpermissionario()">Permissionários</a>
                <a href="#" class="dropdownitem" id="auxtaxi" onclick="selectauxiliar()">Auxiliares</a>
                <a href="#" class="dropdownitem" id="veitaxi" onclick="selectveiculo()">Veículos</a>
            </div>
            <a href="#" class="dropdown-btn" id="escdropdown" onclick="selectescolares()">Escolares
                <i class="uil uil-angle-down" id="downesc"></i>
            </a>
            <div class="dropdown-container">
                <a href="#" class="dropdownitem" id="permissionarioescolar" onclick="permescolar()">Permissionários</a>
                <a href="#" class="dropdownitem" id="auxiliarescolar" onclick="motmoniescolarr()">Motoristas/Monitores</a>
                <a href="#" class="dropdownitem" id="veiculosescolar" onclick="veiculoescolar()">Veículos</a>
            </div>
            <!-- <a href="#" class="sidebaritem">About</a> -->
            <a href="#" class="sidebaritem" id="analise">Em Análise</a>
            <a href="#" class="sidebaritem" id="pendente">Pendentes</a>
            <a href="#" class="sidebaritem" id="rever">Rever Documentação</a>
            <a href="#" class="sidebaritem" id="aprovado">Aprovados</a>
        </div>

        <div id="cont">

            <?php if ($resultado_02_count != 0) { ?>
                <main>
                    <!-- <article class="minhas-viagens-item p-3">
                        <div class="d-flex justify-content-center">
                            <h1><strong>Status dos Cadastros</strong></h1>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div>
                                <div> <strong>Cadastro do Motorista:</strong></div>
                                <div id="asdaddsda"><strong class="portugues" style="font-size: 2rem;">CPF: <a href="ficha_mot.php"> <?php echo $cpf ?></a> <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></strong></div>
                            </div>

                            <?php
                            if (($resultado_04_count != 0)) { ?>
                                <div><strong>Cadastro de Veículos</strong>
                                    <?php
                                    while ($row = $resultado_04->fetch()) {
                                        $cpf = $row['cpf_permissionario'];
                                        $placa = $row['placa'];
                                        $modelo = $row['modelo'];
                                        $chassi = $row['chassi'];
                                        $status = $row['status'];
                                        $boleto = $row['boleto'];

                                        $data_cadastro = date('d-m-Y', strtotime($row['data_cadastro']));

                                        if ($status == 0) {
                                            $cadastro_status = "Em Analise";
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
                                        <?php
                                        ?>
                                        <div id="asdaddsda"><strong class="portugues" style="font-size: 2rem;">Placa: <a href="ficha_vei.php?placa=<?php echo $placa ?>"> <?php echo $placa ?></a> <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></strong></div>
                                <?php }
                                } ?>
                                </div>
                    </article> -->
                    <article class="minhas-viagens-item p-3">
                        <div>
                            <div class="mt-3 mb-3">
                                <a href="meus-cadastros.php" class="btn btn-primary btn-lg btn-block" style="font-size:30px">
                                    <div>Acessar Cadastros</div>
                                </a>
                            </div>
                            <div class="mt-3 mb-3">
                                <?php if ($tipo == 'escolar'  && $statusm == 1) { ?>
                                    <a href="cadastrarmotoristamonitor.php" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Cadastrar Motorista/Auxiliar</a>
                                <?php }  ?>
                            </div>
                            <div class="mt-3 mb-3" style="text-align: -webkit-center;">
                                <?php if ($tipodoescolar == 'CPF' && $resultado_03_count >= 1) { ?>
                                    <div class="box-detail">
                                        <strong style="font-size:20px">Cadastros com CPF podem cadastrar apenas um veículo, você ja cadastrou o seu veículo.</strong>
                                    </div>

                                <?php } elseif ($statusm != 1) { ?>
                                    <div class="box-detail">
                                        <strong style="font-size:20px">Seu cadastro de permissionário ainda não foi aprovado.</strong>
                                    </div>

                                <?php } elseif ($tipo == 'escolar' && $resultado_05_count < 1 || $resultado_06_count < 1) { ?>
                                    <div class="box-detail">
                                        <strong style="font-size:20px">Cadastros de veículo só pode ser feito após cadastro do motorista e monitor ser aprovado.</strong>
                                    </div>
                                <?php } else { ?>
                                    <a href="cadastrar-carro.php" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Cadastrar Veículos</a> <?php } ?>
                            </div>
                    </article>
                </main>

            <?php } else { ?>

                <main>
                    <article class="minhas-viagens-item d-flex align-items-center flex-column p-3">
                        <div><strong style="font-size:20px">Primeiro Acesso</strong></div><br>
                        <div class="mb-2"><strong>É seu primeiro acesso na plataforma. Você precisa fazer seu cadastro como permissionário para poder cadastrar seu veículo.</strong></div>
                        <a href="cadastrar-escolar.php" class="btn btn-primary btn-lg btn-block" style="font-size:20px">Me Cadastrar</a>
                        <div class="box-detail">
                            <strong>*O CADASTRO DE VEÍCULOS PODE SER FEITO SOMENTE SE O CADASTRO DO MOTORISTA PERMISSIONÁRIO JÁ FOI APROVADO.</strong>
                        </div>
                    </article>
                </main>
            <?php } ?>
        </div>
        <!-- <div class="footer">
            <footer>
                <div class="d-flex align-items-center flex-column">
                    <strong class="text-center">Secretaria Municipal de Planejamento de Mobilidade Urbana</strong>
                    <br>
                    Contato:
                    <a class="portugues" href="#">smpu@pmf.sc.gov.br</a>
                </div>
            </footer>
        </div> -->

    </div>
</body>
<script src="../public/scripts/hometeste.js"></script>

</html>