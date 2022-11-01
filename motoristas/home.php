<?php
session_start();
require_once('../login/session_status.php');
include_once("../src/conexao.php");
$data_atual = date("d-m-Y");
$cpf_usuario = $_SESSION['usuariocpf'];
$cpf_usuario = trim($cpf_usuario);
$operador_email = $_SESSION['usuarioEmail']; //recebe da pagina anterior o numero do cadastro
$operador_nome = $_SESSION['usuarioNome'];
$query_22 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario'";
$resultado_22 = $conn->query($query_22);
$resultado_22_count = $resultado_22->rowCount();
$query_02 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario' ORDER BY id_mot  ASC";
$title = "Escolha seu Tipo de Cadastro";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();
if (($resultado_02_count != 0)) {
    while ($row = $resultado_02->fetch()) {
        $nome = $row['nome'];
        $cmc = $row['cmc'];
        $cpf = $row['cpf'];
        $tipo = $row['tipo_motorista'];
        $statusm = $row['status'];
        $boleto = $row['boleto_pagamento'];

        $data_cadastro = date('d-m-Y', strtotime($row['data_cadastro']));
        if ($statusm == 0) {
            $cadastro_status = "Em Analise";
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
        }
        if ($tipo == "permissionario") {
            $title = "Painel de Gestão do Permissionário";
        } elseif ($tipo == "auxiliar") {
            $title = "Cadastros de Auxiliar";
        }
    }
}
/* $query_04 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario' ORDER BY id_veiculo  ASC";
$resultado_04 = $conn->query($query_04);
$resultado_04_count = $resultado_04->rowCount(); */

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
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->

</head>
<script>
    function sendform() {
        document.getElementById("formuserer").submit();
    }
</script>

<body id="page-minhas-viagens">
    <div class="flex-wrapper">
        <div id="container">
            <header class="page-header" style="padding-bottom: 40px;">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                        <ul class="navbar-links">

                            <li>
                                <a class="portugues" href="../login/sair.php">Sair</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-content">

                    <div>
                        <strong><?php echo $title  ?></strong>
                    </div>
                </div>
            </header>
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
                                        } elseif ($status == 4) {
                                            $cadastro_status = "Pagamento Pendente";
                                            $alerta = "alerta1";
                                        } elseif ($status == 5) {
                                            $cadastro_status = "Comprovante Enviado, Aguarde a Analise";
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
                    <div class="mt-3 mb-3">
                        <a href="meus-cadastros.php" class="btn btn-primary btn-lg btn-block" style="font-size:30px">
                            <div>Acessar Cadastros</div>
                        </a>
                    </div>
                    <div class="mt-3 mb-3">
                        <?php if ($tipo == 'permissionario' && $resultado_22_count < 1) { ?>
                            <a href="cadastrar-carro.php" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Cadastrar Veículos</a>
                        <?php } ?>
                    </div>
                    <!-- <div class="mt-3 mb-3">
                        <?php if ($tipo == 'permissionario' && $statusm == 1) { ?>
                            <a href="trocadeponto.php" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Troca de Ponto (Fora do Ar)</a>
                        <?php } ?>
                    </div>
                    <div class="mt-3 mb-3">
                        <?php if ($tipo == 'permissionario' && $statusm == 1) { ?>
                            <a href="" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Transferir Licença (Fora do Ar)</a>
                        <?php } ?>
                    </div> -->
                    <!--  <div class="mt-3 mb-3">
                        <?php if ($tipo == 'permissionario' && $statusm == 1) { ?>
                            <a href="" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Renovar Selo (Fora do Ar)</a>
                        <?php } ?>
                    </div>
                    <div class="mt-3 mb-3">
                        <?php if ($tipo == 'permissionario' && $statusm == 1) { ?>
                            <a href="" class="btn btn-primary btn-lg btn-block" style="font-size:30px">Renovar Licença (Fora do Ar)</a>
                        <?php } ?>
                    </div> -->
                </main>

            <?php } else { ?>

                <main>
                    <article class="minhas-viagens-item d-flex align-items-center flex-column p-3">
                        <div><strong style="font-size:20px">Primeiro Acesso</strong></div><br>
                        <div class="mb-2"><strong>É seu primeiro acesso na plataforma. Escolha uma das opções abaixo para continuar navegando.</strong></div>
                        <a href="cadastrar-motoristapermissionario.php" class="btn btn-primary btn-lg btn-block" style="font-size:20px">Sou um Permissionário</a>
                        <a href="cadastrar-motoristaauxiliar.php" class="btn btn-primary btn-lg btn-block" style="font-size:20px">Sou um Motorista Auxiliar</a>
                        <div class="box-detail">
                            <strong>LEMBRETE!</strong><br>
                            <strong>Apenas motoristas permissionários com cadastro aprovado podem realizar cadastro de veículo.</strong><br>
                            <!-- <strong>CADASTRO DE VEÍCULOS PODE SER FEITOS SOMENTE SE O CADASTRO DO MOTORISTA PERMISSIONÁRIO JA FOI APROVADO</strong> -->
                        </div>
                    </article>
                </main>
            <?php } ?>
        </div>
        <!-- <div class="footer">
            <footer>
                <div class="d-flex align-items-center flex-column">
                    <strong class="text-center">Secretaria Municipal de Mobilidade e Planejamento Urbano</strong>
                    <br>
                    Contato:
                    <a class="portugues" href="#">smpu@pmf.sc.gov.br</a>
                </div>
            </footer>
        </div> -->

    </div>



</body>

</html>