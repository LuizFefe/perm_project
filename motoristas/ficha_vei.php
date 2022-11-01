<?php
session_start();

/* require('../login/session_valida.php'); */
require_once('../login/session_status.php');
include_once("../src/conexao.php");
// link geral do gerado de pdf - biblioteca mpdf
$placafilter = $_GET['placa'];
$placafilter = trim($placafilter);
$cpf_usuario = $_SESSION['usuariocpf'];
$operador_email = $_SESSION['usuarioEmail']; //recebe da pagina anterior o numero do cadastro
$operador_nome = $_SESSION['usuarionome']; //recebe da pagina anterior o numero do cadastro


$query_03 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario' AND placa = '$placafilter' ";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();

$query_04 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario' AND placa = '$placafilter' ";
$resultado_04 = $conn->query($query_04);
$resultado_04_count = $resultado_04->rowCount();
$usuarioEmailSessao = $_SESSION['usuarioEmail'];


if (($resultado_03_count != 0)) {

    while ($row = $resultado_03->fetch()) {
        $placa = $row['placa'];
        $marca = $row['marca'];
        $modelo = $row['modelo'];
        $combustivel = $row['combustivel'];
        $ano_fabricacao = $row['ano_fabricacao'];
        $ano_modelo = $row['ano_modelo'];
        $categoria = $row['categoria'];
        $lotacao = $row['lotacao'];
        $municipio_floripa = $row['municipio_floripa'];
        $chassi = $row['chassi'];
        $renavam = $row['renavam'];
        $app = $row['app'];
        $crlv = $row['crlv'];
        $apapdeficiente = $row['apapdeficient'];
        $cpf_motorista = $row['cpf_permissionario'];
        $status = $row['status'];
        $doccarstat = $row['doc_car_stat'];
        $doccar = $row['docs_car'];
        $selovistoria = $row['selodevistoria'];
        $selovistoriastat = $row['selodevistoriastat'];
        $nota = $row['nota_analise'];
        $data_cadastro = date('d-m-Y', strtotime($row['data_cadastro']));
        $boleto = $row['boleto'];
        $seguroapp = $row['seguroapp'];
        $statapp = $row['statapp'];
        $fotoveic = $row['fotoveic'];
        $statfotoveic = $row['statfotoveic'];
        $carrozero = $row['carrozero'];



?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <!-- lang é um atributo-->

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Permissionário</title>
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

            <!-- <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js" integrity="sha256-hlKLmzaRlE8SCJC1Kw8zoUbU8BxA+8kR3gseuKfMjxA=" crossorigin="anonymous"></script> -->
            <script src="../public/scripts/on-off.js"></script>
            <script>
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

        </head>
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

        <body id="page-cadastrar-viagens">
            <button type="button" class="btn btn-floating btn-lg" id="myBtnn" onclick="topFunction()" style="width:46.72px;height:48px;text-align:center">
                <i style="position: fixed;bottom: 34px;right: 44.5px;" class="fa fa-arrow-up"></i>
            </button>
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
                            <strong>Ficha de Cadastro de Veiculo</strong>
                            <p>Aqui estão os dados do veiculo</p>
                        </div>
                    </div>

                </header>

                <main style="margin-bottom:100px;padding-bottom:50px">

                    <fieldset id="cadastro_contratantes" class="div-show" style="display: block;">
                        <legend> Dados do Veiculo <?php
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
                                                    } elseif ($status == 4) {
                                                        $cadastro_status = "Pagamento Pendente";
                                                        $alerta = "alerta1";
                                                    } elseif ($status == 5) {
                                                        $cadastro_status = "Comprovante Enviado, Aguarde a Analise";
                                                        $alerta = "alerta1";
                                                    }


                                                    ?> <div>
                                <strong class="portugues" style="font-size: 2rem;">Status: <span class="<?php echo $alerta ?>"> <?php echo $cadastro_status ?></span></strong>
                            </div>
                        </legend>
                        CPF do Permissionário:<b><?php echo $cpf_motorista; ?></b>
                        <br>Placa: <b><?php echo $placa; ?></b>
                        <br>Marca: <b><?php echo $marca; ?></b>
                        <br> Modelo: <b><?php echo $modelo; ?></b>
                        <br>Combustivel:<b><?php echo $combustivel; ?></b>
                        <br>Ano de Fabricaçao: <b><?php echo $ano_fabricacao; ?></b>
                        <br>Ano do Modelo: <b><?php echo $ano_modelo; ?></b>
                        <br>Categoria:<b><?php echo $categoria; ?></b>
                        <br>Lotação:<b><?php echo $lotacao; ?></b>
                        <br>Municipio de Registro:<b><?php echo $municipio_floripa; ?></b>
                        <br>Chassi:<b><?php echo $chassi; ?></b>
                        <br>Renavam:<b><?php echo $renavam; ?></b>
                        <br>Data de Validade do APP:<b><?php echo $app; ?></b>
                        <br>CRLV:<b><?php echo $crlv; ?></b>
                        <?php if ($status == 2 || $status == 3) {
                        ?><br><br><br><strong style="color:#003466">NOTA DE PENDENCIA:</strong> <b><?php echo $nota; ?></b><br><?php

                                                                                                                                if ($doccarstat == 2) { ?>
                                <div id="documents">
                                    <div style="text-align:center;font-size:20px;"> <strong> DOCUMENTO DO CARRO PENDENTE </strong></div>
                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#doccar" aria-expanded="false" aria-controls="doccar">Mostrar Documento</button></div><?php echo '<div class="collapse" id="doccar">
                                            <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_veiculo/' . $doccar . '" width="95%" height="500px"> </iframe>
                                            </div>
                                        </div></b><br>
                                </div>';
                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                        if ($selovistoriastat == 2) { ?>
                                    <div id="documents">
                                        <div style="text-align:center;font-size:20px;"> <strong> SELO DE VISTORIA PENDENTE </strong></div>
                                        <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#selo" aria-expanded="false" aria-controls="selo">Mostrar Documento</button></div><?php echo '<div class="collapse" id="selo">
                                            <div class="card card-body" style="border:0">
                                                <iframe src="../public/docs_veiculo/' . $selovistoria . '" width="95%" height="500px"> </iframe>
                                            </div>
                                        </div></b><br>
                                </div>';
                                                                                                                                                                                                                                                                        } ?>
                                    <?php if ($seguroapp == "") {
                                        if ($statfotoveic == 2) ?>
                                        <div id="documents">
                                            <div style="text-align:center;font-size:20px"> <strong> FOTOS DO VEÍCULO</strong></div>
                                            <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencatrafego" aria-expanded="false" aria-controls="licencatrafego">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencatrafego">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $fotoveic . '" width="95%" height="850px"> </iframe>
                                    </div>
                                    </div></b><br>
                                </div>'; ?>
                                            <?php  } else {
                                            if ($statapp == 2) { ?>
                                                <div id="documents">
                                                    <div style="text-align:center;font-size:20px"> <strong> SEGURO APP</strong></div>
                                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencatrafego" aria-expanded="false" aria-controls="licencatrafego">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencatrafego">
                                    <div class="card card-body" style="border:0">
                                        <iframe src="../public/docs_veiculo/' . $seguroapp . '" width="95%" height="850px"> </iframe>
                                    </div>
                                </div></b><br>
                                </div>'; ?>
                                        <?php }
                                        }
                                    } ?>
                                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                                        <div id="MODAL_APROVADO" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="MODAL_ficha" style="font-size:25px">Reenviar Documentos Pendentes</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="margin-left:20px">

                                                        <form method="post" id="formreenvio" autocomplete="off" action="../src/motorista/resenddocumtospendentescar.php" enctype='multipart/form-data'>
                                                            <div class="form-row">
                                                                <?php if ($status == 2) {
                                                                ?><strong>NOTA DE PENDENCIA:</strong> <b><?php echo $nota; ?></b> <br><?php
                                                                                                                                    if ($doccarstat == 2) {
                                                                                                                                    ?><br><strong>DOCUMENTO DO CARRO PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="doccarp" style="background-color:white" required> <b> </b><br> <?php }
                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                    if ($selovistoriastat == 2) { ?> <br><strong>SELO DE VISTORIA PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="vistoriap" style="background-color:white" required> <b> </b><br>
                                                                <?php  }
                                                                                                                                                                                                                                                                                                                                    if ($statapp == 2) {
                                                                ?><br><strong>SEGURO APP PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="app" style="background-color:white" required> <b> </b><br> <?php } if ($statfotoveic == 2) {
                                                                    ?><br><strong>FOTOS DE VEÍCULO PENDENTE:</strong><br><input type="file" class="form-control-file" id="exampleFormControlFile1" name="fotovei" style="background-color:white" required> <b> </b><br> <?php } ?>
                                                            </div>
                                                            <input name="placa" type="hidden" value="<?php echo $placa ?>">
                                                            <input type="hidden" id="cpf_permissionario" name="cpf_permissionario" value="<?php echo $cpf_usuario; ?>">


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal" style="border:0;background-color:transparent;color:#003466">Fechar</button>
                                                        <button type="button submit" class="btn btn-primary" onclick="form_submit()" style="border:0;background-color:transparent;color:#003466">Reenviar Documentos</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
                                        <?php if ($status == 2) { ?>
                                            <div class="mt-5" id="documents" style="display:flex;align-items:center;justify-content:center;">
                                                <button data-toggle="modal" data-target="#MODAL_APROVADO" id="123aa" style="background-color:#0275d8;color:white; width:800px;border-radius:15px">REENVIAR DOCUMENTOS</button>
                                            </div>
                                        <?php } ?>

                                        <?php

                                        if ($status == 4) { ?>
                                            <div class="d-flex justify-content-around">
                                                <form method="get" action="../public/boletos_veiculo/<?php echo $boleto ?>" target="_blank">
                                                    <button class=" text-center bg-success btn-lg p-3 mr-2 mt-5 " data-toggle="modal" data-target="#MODAL_APROVADO" id="123aa" style="color:white;">Baixar Boleto</button>
                                                </form>
                                                <button class=" text-center bg-primary btn-lg p-3 mr-2 mt-5 " data-toggle="modal" data-target="#MODAL_BOLETO" id="123aa" style="color:white;">Enviar Comprovante</button>
                                            </div>

                                        <?php } else if ($status == 4 || $status == 0 || $status == 1 || $status == 5) { ?>

                                            <div id="documents">
                                                <div style="text-align:center;font-size:20px;"> <strong> Documento do Carro </strong></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#cnhshow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="cnhshow">
                                            <div class="card card-body" style="border:0">
                                            <iframe src="../public/docs_veiculo/' . $doccar . '" width="95%" height="500px"> </iframe>
                                            </div>
                                            </div></b><br>'; ?> <div style="text-align:center;font-size:20px;"> <strong> Vistoria</strong></div>
                                                <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#vistoriashow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="vistoriashow">
                                            <div class="card card-body" style="border:0">
                                            <iframe src="../public/docs_veiculo/' . $selovistoria . '" width="95%" height="500px"> </iframe>
                                            </div>
                                            </div></b><br>';
                                                                                                                                                                                                                                                                                                if ($carrozero == 'sim') { ?><div style="text-align:center;font-size:20px;"> <strong> Fotos do Veículo </strong></div>
                                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencashow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencashow">
                                            <div class="card card-body" style="border:0">
                                            <iframe src="../public/docs_veiculo/' . $fotoveic . '" width="95%" height="500px"> </iframe>
                                            </div>
                                            </div></b><br></div>';
                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                if ($carrozero == 'nao') { ?><div style="text-align:center;font-size:20px;"> <strong> Seguro App </strong></div>
                                                    <div style="display:flex;align-items:center;justify-content:center;"><button style="border:0;" type="button" data-toggle="collapse" data-target="#licencashow" aria-expanded="false" aria-controls="cnhshow">Mostrar Documento</button></div><?php echo '<div class="collapse" id="licencashow">
                                                                                                                                                                                                                                                                                            <div class="card card-body" style="border:0">
                                                                                                                                                                                                                                                                                            <iframe src="../public/docs_veiculo/' . $seguroapp . '" width="95%" height="500px"> </iframe>
                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                            </div></b><br></div>';
                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                            } ?>


                    </fieldset>
                </main>


            </div>
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