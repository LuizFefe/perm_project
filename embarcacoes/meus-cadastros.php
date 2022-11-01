<?php
session_start();
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
require_once('../login/session_statusembarcacoes.php');
include_once("../src/conexao.php");
$data_atual = date("d-m-Y");
$_SESSION['redirect_url'] = $_SERVER['PHP_SELF'];
$cpf_usuario = $_SESSION['embarcacoescpf'];
$cpf_usuario = trim($cpf_usuario);
$tipo = $_SESSION['usuariotipo'];
$operador_email = $_SESSION['embarcacoesEmail']; //recebe da pagina anterior o numero do cadastro

// echo $operador_nome;
$query_44 = "SELECT * FROM permissionarios.turismo WHERE email = '$operador_email'";
$resultado_44 = $conn->query($query_44);
$resultado_44_count = $resultado_44->rowCount();
if ($resultado_44_count != 0) {
    while ($row = $resultado_44->fetch()) {
        $nome = $row['nome'];
        $documento = $row['documento'];
        $statusm = $row['status'];
        $tipodocumento = $row['documento'];
    }
}



$query_02 = "SELECT * FROM permissionarios.turismo WHERE documento = '$tipodocumento'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();

$query_03 = "SELECT * FROM permissionarios.veiculoturismo WHERE doc_permissionario = '$tipodocumento'";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();



/* $query_04 = "SELECT * FROM permissionarios.veiculoescolar WHERE cpf_permissionario = '$cpf_usuario' ORDER BY id_veiculo  ASC";
$resultado_04 = $conn->query($query_04);
$resultado_04_count = $resultado_04->rowCount(); */



?>


<!DOCTYPE html>
<html lang="pt-br">
<!-- lang é um atributo-->

<!-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorizado</title>


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

    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script> 

</head> -->

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
    <link rel="stylesheet" href="../public/styles/partials/page-minhas-viagens.css">
    <link rel="stylesheet" href="../public/styles/footercadastros.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <script src="../public/scripts/mobile-nav-bar-active.js" defer></script>

</head>
<script>
    function sendform() {
        document.getElementById("formuserer").submit();
    }
</script>

<body id="page-minhas-viagens">
    <div class="flex-wrapper">
        <div id="container">
            <!--  <header class="page-header">
                <div class="top-bar-container">
                    <nav class="navbar">
                        <img src="../public/images/logo.svg" alt="PMF" class="logopmf">
                        <div style="color:white;font-size:40px;margin-right: 3%;">Turismo</div>
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
                        <strong class="portugues"><?php echo 'Aqui estão os seus cadastros' ?></strong>
                    </div>
                </div>
            </header> -->
            <header class="page-header">
                <div data-include="headermenu_ipuf"></div>
                <div data-include="headermenu_perms"></div>
                <div class="header-content">
                    <div class="top-bar-container">
                        <nav class="navbar navheader">
                            <strong>Painel de Gestão</strong>
                            <blockquote>Aqui estão os seus cadastros</blockquote>
                        </nav>
                    </div>

                </div>
            </header>
            <main>
                <?php
                if (($resultado_02_count != 0)) {
                    while ($row = $resultado_02->fetch()) {
                        $nomeperm = $row['nome'];
                        /* $cmcperm = $row['cmc']; */
                        $documentoperm = $row['documento'];
                        /* $tipoperm = $row['tipodocumento']; */
                        $statusperm = $row['status'];


                        $data_cadastroperm = date('d-m-Y', strtotime($row['data_cadastro']));
                        if ($statusperm == 0) {
                            $cadastro_status = "Em Análise";
                            $alerta = "alerta3";
                        } elseif ($statusperm == 1) {
                            $cadastro_status = "Aprovada";
                            $alerta = "alerta2";
                        } elseif ($statusperm == 2) {
                            $cadastro_status = "Pendente de Informações";
                            $alerta = "alerta1";
                        } elseif ($statusperm == 3) {
                            $cadastro_status = "Aguarde a Reanálise";
                            $alerta = "alerta1";
                        }
                ?>
                        <article class="minhas-viagens-item p-3">
                            <header>
                                <div>
                                    <strong class="portugues" style="font-size: 2rem;">Status: <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></strong>
                                </div>
                            </header>
                            <p>
                                <strong class="portugues">Nome do Autorizado:</strong>
                                <?php echo $nomeperm; ?><br>
                                <strong class="portugues">Documento: </strong>
                                <?php echo $documentoperm; ?><br>

                                <!-- <strong class="portugues">CMC: </strong>
                                <?php echo $cmcperm; ?><br>

                                <strong class="portugues">Tipo do Cadastro: </strong>
                                <?php echo $tipoperm; ?><br> -->

                                <strong class="portugues">Data de cadastro: </strong>
                                <?php echo $data_cadastroperm; ?><br>
                            </p>
                            <div class="d-flex p-3" style="justify-content:right">
                                </p>
                                <div class="footer-buttons">
                                    <a href="./ficha_perm.php" class="button">
                                        <div class="portugues">Ver detalhes</div>
                                    </a>
                                </div>

                            </div>
                        </article>
                <?php
                    }
                }
                ?>
                <?php
                if (($resultado_03_count != 0)) {
                    while ($row = $resultado_03->fetch()) {
                        $documentoveic = $row['doc_permissionario'];
                        $placaveic = $row['placa'];
                        $modeloveic = $row['modelo'];
                        $chassiveic = $row['chassi'];
                        $statusveic = $row['status'];
                        $boleto = $row['boleto'];
                        $data_cadastroveic = date('d-m-Y', strtotime($row['data_cadastro']));

                        if ($statusveic == 0) {
                            $cadastro_status = "Em Análise";
                            $alerta = "alerta3";
                        } elseif ($statusveic == 1) {
                            $cadastro_status = "Aprovada";
                            $alerta = "alerta2";
                        } elseif ($statusveic == 2) {
                            $cadastro_status = "Pendente de Informações";
                            $alerta = "alerta1";
                        } elseif ($statusveic == 3) {
                            $cadastro_status = "Aguarde a Reanálise";
                            $alerta = "alerta1";
                        } elseif ($statusveic == 4) {
                            $cadastro_status = "Pagamento Pendente";
                            $alerta = "alerta1";
                        } elseif ($statusveic == 5) {
                            $cadastro_status = "Comprovante Enviado, Aguarde a Análise";
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
                                    <strong class="portugues">Documento Autorizado:</strong>
                                    <?php echo $documentoveic; ?><br>
                                    <strong class="portugues">Placa do Veiculo: </strong>
                                    <?php echo $placaveic; ?><br>

                                    <strong class="portugues">Modelo do Veiculo: </strong>
                                    <?php echo $modeloveic; ?><br>

                                    <strong class="portugues">Chassi do Veiculo: </strong>
                                    <?php echo $chassiveic; ?><br>

                                    <strong class="portugues">Data de cadastro: </strong>
                                    <?php echo $data_cadastroveic; ?><br>
                                </p>
                                <div class="d-flex p-3" style="justify-content:right">
                                    </p>

                                    <?php if ($statusveic == 1) {
                                    ?>
                                        <div class="footer-buttons">
                                            <a href="../public/boletos_veiculoturismo/<?php echo $boleto ?>" download="<?php echo $boleto ?>" class="button" style="background-color:#003466">Imprimir DAM</a>

                                        </div>
                                        <div class="footer-buttons" style="text-align:center">
                                            <a href="licencadetrafegoescolar.php" class="button" style="background-color:#003466">Imprimir Licença de Tráfego</a>
                                        </div>
                                        <div class="footer-buttons" style="text-align:center">
                                            <a href="selodevistoriaescolar.php" class="button" style="background-color:#003466">Imprimir Selo de Vistoria</a>
                                        </div>

                                    <?php } ?>
                                    <div class="footer-buttons">
                                        <a href="./ficha_vei.php?docperm=<?php echo $documentoveic ?>&&placa=<?php echo $placaveic ?>" class="button">
                                            <div class="portugues">Ver detalhes</div>
                                        </a>
                                    </div>
                                </div>
                        </form>

                        </article>
                    <?php } ?>


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
                } else /* {
                // Mensagem caso não tenha viagens cadastradas
                echo '
                <p class="no-results portugues">Nenhum cadastro feito até agora! Cadastre um motorista <br><br>
                <strong><a style="color: black;" href="./cadastrar-motorista.php">Cadastrar Motorista</a></strong><br>
                 ';
            } */
                ?>
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

</body>

</html>