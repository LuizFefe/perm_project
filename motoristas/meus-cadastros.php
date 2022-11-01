<?php
session_start();
require_once('../login/session_status.php');
include_once("../src/conexao.php");
$data_atual = date("d-m-Y");
$_SESSION['redirect_url'] = $_SERVER['PHP_SELF'];
$cpf_usuario = $_SESSION['usuariocpf'];
$cpf_usuario = trim($cpf_usuario);
$operador_email = $_SESSION['usuarioEmail']; //recebe da pagina anterior o numero do cadastro
$operador_nome = $_SESSION['usuarioNome']; //recebe da pagina anterior o numero do cadastro

// echo $operador_nome;

/* $query_02 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario' ORDER BY id_mot  ASC";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount(); */

$query_03 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();

$query_04 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario' ORDER BY id_veiculo  ASC";
$resultado_04 = $conn->query($query_04);
$resultado_04_count = $resultado_04->rowCount();

/* $query_05 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario'";
$resultado_05 = $conn->query($query_05);
$resultado_05_count = $resultado_05->rowCount(); */



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
    <link rel="stylesheet" href="../public/styles/partials/page-minhas-viagens.css">

    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/styles/footer.css">

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
            <header class="page-header">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
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
                        <strong class="portugues">Estes são os seus cadastros</strong>
                    </div>
                </div>
            </header>
            <main>
                <?php
                if (($resultado_03_count != 0)) {
                    while ($row = $resultado_03->fetch()) {
                        $nome = $row['nome'];
                        $cmc = $row['cmc'];
                        $cpf = $row['cpf'];
                        $tipo = $row['tipo_motorista'];
                        $status = $row['status'];
                        $boleto = $row['boleto_pagamento'];
                        $cadastronopoerm = ['auxiliarperm'];
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
                        $var = json_decode(($row['permissionariosondetrabalho']));
                        foreach ($var as $item) {
                            if ($item->status == 'Aguardando Confirmação') {
                                $query_08 = "SELECT * FROM permissionarios.motorista where cpf = '$item->cpf' ";
                                $resultado_08 = $conn->query($query_08);
                                $resultado_08_count = $resultado_08->rowCount();
                                if (($resultado_08_count != 0)) {
                                    while ($row = $resultado_08->fetch()) {
                                        $nomepermaux = $row['nome'];
                                        $cpfpermaux = $row['cpf'];
                                        $nomepermaux = $row['nome'];
                                        $npermaux = $row['codigo_permissionario'];
                                    }
                                }


                ?>
                                <form method="POST" id="cadastrar_viagem" action="../src/motorista/cadastradoafirma.php">
                                    <input type="text" name="cpfperm" value="<?php echo $cpfpermaux ?>" hidden>
                                    <input type="text" name="cpfaux" value='<?php echo $cpf ?>' hidden>
                                    <input type="text" name="nomeperm" value='<?php echo $nomepermaux ?>' hidden>
                                    <article class="minhas-viagens-item p-3" style="text-align:center">
                                        <div class="text-center mt-3 mb-5" ;>
                                            <strong style="font-size: 2rem;">Você foi cadastrado em um permissionário!</strong>
                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <div><strong class="portugues">Permissionario: </strong>
                                                <?php echo $nomepermaux; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-around">
                                            <div><strong class="portugues">CPF: </strong>
                                                <?php echo $cpfpermaux; ?><br>
                                            </div>
                                            <div><strong class="portugues">Nº Permissionário: </strong>
                                                <?php echo $npermaux; ?><br>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4 mb-3" ;>
                                            <strong style="font-size: 2rem;">Você concorda com esse cadastro?</strong>
                                        </div>

                                        <div class="d-flex" style="justify-content:space-evenly">
                                            <button class="button" type="submit" name="submit" value="sim">
                                                <div class="portugues">SIM</div>
                                            </button>
                                            <button class="button" type="submit" name="submit" value="nao" style="background-color:red">
                                                <div class="portugues">NÃO</div>
                                            </button>
                                        </div>
                                    </article>

                                </form>





                        <?php }
                        };
                        ?>
                        <article class="minhas-viagens-item p-3">
                            <header>
                                <div>
                                    <strong class="portugues" style="font-size: 2rem;">Status: <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></strong>
                                </div>
                            </header>
                            <p>
                                <strong class="portugues">Nome do Motorista:</strong>
                                <?php echo $nome; ?><br>
                                <strong class="portugues">CPF: </strong>
                                <?php echo $cpf; ?><br>

                                <strong class="portugues">CMC: </strong>
                                <?php echo $cmc; ?><br>

                                <strong class="portugues">Tipo do Motorista: </strong>
                                <?php echo $tipo; ?><br>

                                <strong class="portugues">Data de cadastro: </strong>
                                <?php echo $data_cadastro; ?><br>
                            </p>
                            <div class="d-flex p-3" style="justify-content:right">
                                </p>
                                <div class="footer-buttons">
                                    <a href="./ficha_mot.php" class="button">
                                        <div class="portugues">Ver detalhes</div>
                                    </a>
                                </div>

                            </div>
                        </article>
                <?php
                    }
                } else {
                    // Mensagem caso não tenha viagens cadastradas
                    echo '
                <p class="no-results portugues">Nenhum cadastro feito até agora! Cadastre um motorista <br><br>
                <strong><a style="color: black;" href="cadastrar-motorista.php">Cadastrar Motorista</a></strong><br>
                 ';
                }
                ?>
                <?php
                if (($resultado_04_count != 0)) {
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
                        <form method="get" id="cadastrar_viagem" action="./ficha_vei.php">
                            <input type="hidden" name="placa" id="placa" value="<?php echo $placa ?> ">
                            <article class="minhas-viagens-item p-3">
                                <header>
                                    <div>
                                        <strong class="portugues" style="font-size: 2rem;">Status: <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span>
                                        </strong>
                                        </strong>

                                    </div>
                                </header>
                                <p>
                                    <strong class="portugues">CPF Permissionário:</strong>
                                    <?php echo $cpf; ?><br>
                                    <strong class="portugues">Placa do Veiculo: </strong>
                                    <?php echo $placa; ?><br>

                                    <strong class="portugues">Modelo do Veiculo: </strong>
                                    <?php echo $modelo; ?><br>

                                    <strong class="portugues">Chassi do Veiculo: </strong>
                                    <?php echo $chassi; ?><br>

                                    <strong class="portugues">Data de cadastro: </strong>
                                    <?php echo $data_cadastro; ?><br>
                                </p>
                                <div class="d-flex p-3" style="justify-content:right">
                                    </p>

                                    <?php if ($status == 1) {
                                    ?>
                                        <div class="footer-buttons">
                                            <a href="../public/boletos_veiculo/<?php echo $boleto ?>" download="<?php echo $boleto ?>" class="button" style="background-color:#003466">Imprimir DAM</a>

                                        </div>
                                        <div class="footer-buttons" style="text-align:center">
                                            <a href="licencadetrafego.php" class="button" style="background-color:#003466">Imprimir Licença de Tráfego</a>
                                        </div>
                                        <!-- <div class="footer-buttons" style="text-align:center">
                                            <a href="selodevistoria.php" class="button" style="background-color:#003466">Imprimir Selo de Vistoria</a>
                                        </div> -->

                                    <?php } ?>
                                    <div class="footer-buttons" style="text-align:center">
                                        <a href="./ficha_vei.php?placa=<?php echo $placa ?>" class="button">
                                            <div class="portugues">Ver detalhes</div>
                                        </a>
                                    </div>
                                </div>
                        </form>

                        </article>
                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                        <!-- <div id="MODAL_APROVADO" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="MODAL_ficha" style="font-size:25px">Reenviar Documentos Pendentes</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-5">
                                        <div class="minhas-viagens-item" style="border:0">
                                            <div class="d-flex justify-content-around">
                                                <div class="footer-buttons">
                                                    <a href="./ficha_mot.php" class="button">
                                                        <div class="portugues">Se</div>
                                                    </a>
                                                </div>
                                                <div class="footer-buttons">
                                                    <a href="./ficha_mot.php" class="button">
                                                        <div class="portugues" style="font-size:16px">Ver detalhes</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="border:0;background-color:transparent;color:#003466">Fechar</button>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->

                    <?php
                    }
                }
                if (($resultado_04_count != 0)) {
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
                        <form method="get" id="cadastrar_viagem" action="./ficha_vei.php">
                            <input type="hidden" name="placa" id="placa" value="<?php echo $placa ?> ">
                            <article class="minhas-viagens-item p-3">
                                <header>
                                    <div>
                                        <strong class="portugues" style="font-size: 2rem;">Status: <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span>
                                        </strong>
                                        </strong>

                                    </div>
                                </header>
                                <p>
                                    <strong class="portugues">CPF Permissionário:</strong>
                                    <?php echo $cpf; ?><br>
                                    <strong class="portugues">Placa do Veiculo: </strong>
                                    <?php echo $placa; ?><br>

                                    <strong class="portugues">Modelo do Veiculo: </strong>
                                    <?php echo $modelo; ?><br>

                                    <strong class="portugues">Chassi do Veiculo: </strong>
                                    <?php echo $chassi; ?><br>

                                    <strong class="portugues">Data de cadastro: </strong>
                                    <?php echo $data_cadastro; ?><br>
                                </p>
                                <div class="d-flex p-3" style="justify-content:right">
                                    </p>

                                    <?php if ($status == 1) {
                                    ?>
                                        <div class="footer-buttons">
                                            <a href="../public/boletos_veiculo/<?php echo $boleto ?>" download="<?php echo $boleto ?>" class="button" style="background-color:#003466">Imprimir DAM</a>

                                        </div>
                                        <div class="footer-buttons" style="text-align:center">
                                            <a href="licencadetrafego.php" class="button" style="background-color:#003466">Imprimir Licença de Tráfego</a>
                                        </div>
                                        <div class="footer-buttons" style="text-align:center">
                                            <a href="selodevistoria.php" class="button" style="background-color:#003466">Imprimir Selo de Vistoria</a>
                                        </div>

                                    <?php } ?>
                                    <div class="footer-buttons" style="text-align:center">
                                        <a href="./ficha_vei.php?placa=<?php echo $placa ?>" class="button">
                                            <div class="portugues">Ver detalhes</div>
                                        </a>
                                    </div>
                                </div>
                        </form>

                        </article>
                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                        <!-- <div id="MODAL_APROVADO" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="MODAL_ficha" style="font-size:25px">Reenviar Documentos Pendentes</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body p-5">
                                        <div class="minhas-viagens-item" style="border:0">
                                            <div class="d-flex justify-content-around">
                                                <div class="footer-buttons">
                                                    <a href="./ficha_mot.php" class="button">
                                                        <div class="portugues">Se</div>
                                                    </a>
                                                </div>
                                                <div class="footer-buttons">
                                                    <a href="./ficha_mot.php" class="button">
                                                        <div class="portugues" style="font-size:16px">Ver detalhes</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="border:0;background-color:transparent;color:#003466">Fechar</button>
                                    </div>

                                </div>
                            </div>
                        </div> -->
                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->

                <?php
                    }
                } ?>
            </main>
        </div>
        <!-- <div class="footer">
            <footer>
                <div class="d-flex align-items-center flex-column">
                    <strong class="text-center">Secretaria Municipal de Planejamento Urbano</strong>
                    <br>
                    Contato:
                    <a class="portugues" href="#">smpu@pmf.sc.gov.br</a>
                </div>
            </footer>
        </div> -->
    </div>


</body>

</html>