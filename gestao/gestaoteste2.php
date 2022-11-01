<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../login/session_statusgestao.php');
$cpfgestor = $_SESSION['gestorcpf'];
?>

<?php
include_once("../src/conexao.php");
header('Content-type: text/html; charset=UTF-8');
setlocale(LC_ALL, 'pt_BR.UTF8');

?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permissionário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/styles/csstablesorter/theme.blue.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- <script src="../public/scripts/jquery.quick.search.js"></script> -->
    <script src="../public/scripts/quicksearch-master/dist/jquery.quicksearch.js"></script>
    <script src="../public/scripts/selecttables.js"></script>
    <script src="../public/scripts/tablesorter.js"></script>
    <script src="../public/scripts/tablesortertheme.js"></script>

    <script>
        $(document).ready(function() {
            $("#smpu_topo").load("/bas/smpu_topo.php");
            $("#smpu_rodape").load("/bas/smpu_rodape.php");
        });
    </script>


</head>

<body style="margin-bottom: 100px;">
    <style>
        * {
            font-family: montserrat;
        }

        p {
            color: black;
            font-size: 40px;
            text-shadow:
                0.05em 0 black,
                0 0.05em black,
                -0.05em 0 black,
                0 -0.05em black,
                -0.05em -0.05em black,
                -0.05em 0.05em black,
                0.05em -0.05em black,
                0.05em 0.05em black;
        }

        .container {
            max-width: 80vw;
            font-weight: bolder;
        }

        td {
            font-weight: bolder;
        }
    </style>

    <!--CABECALHO -->
    <nav class="navbar navbar-expand-lg" style="background-color: #003466;">
        <a class="navbar-brand" href="#">
            <img src="../public/images/REMOB_2020_LOGO_SITE_REMOB_BRANCO.png" width="250" height="100" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <button class="p-2 btn btn-primary ml-2" data-toggle="modal" data-target="#MODAL_ACOES" style="white-space: nowrap">Minhas Ações</button>
            </ul>
            <a class="btn btn-info btn-lg" href="../login/sairgestao.php">Sair</a>

        </div>
    </nav>
    <div class="container" role="main">
        <br>
        <div class="page-header rounded">
            <img src="../public/images/cabecalho_01.jpg" class="img-fluid rounded" alt="Imagem responsiva" style="width:1800px">
        </div>

    </div>
    <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
    <div id="MODAL_ACOES" class="modal fade bd-example-modal-lg" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="MODAL_ficha" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MODAL_ficha">Ações do Motorista no Site</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_gestao WHERE cpf = '$cpfgestor'";
                    $resultado_selectalteracoes = $conn->query($selectalteracoes);
                    $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
                    while ($row = $resultado_selectalteracoes->fetch()) {
                        $var = json_decode(($row['alteracoesfeitas']));
                        if (empty($var)) {
                            echo '<strong> Nenhuma Ação Foi Feita Ainda</strong>';
                        } else {
                            echo '<table id="dtBasicExample4" class="tablesorter-blue sortable table table-striped table-hover table-sm">
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
                        }
                    } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--*_*__*_*_*_*_*_*__*__*_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_ FINAL MODAL APROVACAO *_*__*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*_*__*_**__**__*_*_**__*_*_*_**_*_-->
    <div class="container" role="main">
        <br>
        <div role="group" style="margin-block-end: 1em;text-align:center">
            <div class="m-3" id="firstselect">
                <button class="btn btn-lg m-3 btn-success" id="taxista" onclick="selecttaxista()">Ver Taxistas</button>
                <button class="btn btn-lg m-3 btn-success" id="escolar" onclick="selectescolares()">Ver Escolares</button>
            </div>
            <div class="m-3 d-none" id="taxistabuttons">
                <button class="btn btn-lg m-3 btn-success" id="permissionariotaxi" onclick="selectpermissionario()">Ver Permissionários Taxistas</button>
                <button class="btn btn-lg m-3 btn-success" id="auxiliartaxi" onclick="selectauxiliar()">Ver Auxiliares Taxistas</button>
                <button class="btn btn-lg m-3 btn-success" id="veiculostaxi" onclick="selectveiculo()">Ver Veículos Taxistas</button>
            </div>
            <div class="m-3 d-none" id="escolarbuttons">
                <button class="btn btn-lg m-3 btn-success" id="permissionarioescolar" onclick="permescolar()">Ver Permissionários Escolares</button>
                <button class="btn btn-lg m-3 btn-success" id="auxiliarescolar" onclick="motmoniescolarr()">Ver Motoristas/Monitores</button>
                <button class="btn btn-lg m-3 btn-success" id="veiculosescolar" onclick="veiculoescolar()">Ver Veículos Escolares</button>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <form>
                <input type="text" id="search" placeholder="BUSCAR">
            </form>
        </div>

        <br>

    </div>
    <div id="taxistas">
        <?php

        $query_02 = "SELECT * FROM permissionarios.motorista where tipo_motorista ='permissionario' ORDER BY data_cadastro  ASC";
        $resultado_02 = $conn->query($query_02);
        $resultado_02_count = $resultado_02->rowCount();

        if (($resultado_02_count != 0)) { ?>

            <div class="container" theme-showcase" role="main" id="divpermissionario">

                <!-- <p class="text-center font-weight-bolder">PERMISSIONÁRIOS TAXISTAS</p> -->
                <table id="dtBasicExample1" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm" cellspacing="0" width="100%">
                <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">PERMISSIONÁRIOS TAXISTAS</caption>
                    <thead>
                        <tr class="tablesorter-headerRow table-primary">
                            <th><b><a class="text-default">Nº Ordem</a></b></th>
                            <th><b><a class="text-default">Nome</th>
                            <th><b><a class="text-default">CPF<br></th>
                            <th><b><a class="text-default">Endereço</a></b></th>
                            <th><b><a class="text-default">Email</a></b></th>
                            <th><b><a class="text-default">Telefone</a></b></th>
                            <th><b><a class="text-default">Cadastro</a><br></th>
                            <th><b><a class="text-default">Status</a></th>
                            <th><b><a class="text-default">Ação</a></b></th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultado_02->fetch()) {
                        $data_criado = $row['data_cadastro'];
                        $cpf =  $row['cpf'];
                        $datapart = json_decode(($row['endereco']));
                        $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP;
                        $tipo = $row['tipo_motorista'];
                        $id_mot = $row['id_mot'];
                        $nome = $row['nome'];
                        $email = $row['email'];
                        $telefone = $row['telefone'];
                        $stat = $row['status'];
                        $nordem = $row['codigo_permissionario'];


                    ?>
                        <tr>
                            <td width=10%><?php echo $nordem  ?></td>
                            <td width=10%><?php echo $nome  ?></td>
                            <td width=10%><?php echo $cpf  ?></td>
                            <td width=15%><?php echo $endereco ?><br></td>
                            <td width=15%><?php echo $email ?><br></td>
                            <td width=15%><?php echo $telefone ?><br></td>
                            <td width=10%><?php echo $data_criado; ?></td>
                            <td width=10%>
                                <?php
                                if ($stat == '0') {
                                    $status = "Em análise";
                                ?>
                                    <a class="btn btn-primary btn-sm" role="button"><?php echo $status ?></a>
                                <?php } elseif ($stat == '1') {
                                    $status = "Aprovado";
                                ?>
                                    <a class="btn btn-success btn-sm" role="button"><?php echo $status ?></a>

                                <?php  } elseif ($stat == '2') {
                                    $status = "Pendente de Documentação";
                                ?><a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '3') {
                                    $status = "Aguardando a Reanálise"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } ?>



                            </td>
                            <td width=20%>
                                <!--<a type="button" class="btn btn-outline-danger btn-sm fa fa-print pequeno" href="print_conferir.php?id_cadastro=<?php echo $row['id_cadastro'] ?>" role="button"></a> !-->
                                <a type="button" class="btn btn-primary" href="ficha_motorista_gestao.php?cpf=<?php echo $row['cpf'] ?>" role="button" style="margin-top:auto;display:block;">ACESSAR</a>
                            </td>
                        </tr>

                    <?php } ?>


                </table>
            </div>
        <?php
        } else {
            echo '<div style="text-align: -webkit-center;"><table width="80%" id="divpermissionario">
                        <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">PERMISSIONÁRIO</caption>
                        <thead>
                        <tr style="background-color: #f8d7da;border-color: #f5c6cb;position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 2px solid #f5c6cb;border-radius: 0.25rem;height: 50px;">
                            <th style="    text-align: center;"><b><a class="text-default">Nenhum permissionário encontrado!<br></a></b></th>
                        </tr>
                        </thead>
                  </table></div>
            ';
        }
        ?>
        <?php

        $query_02 = "SELECT * FROM permissionarios.motorista WHERE tipo_motorista = 'auxiliar' ORDER BY id_mot  ASC";
        $resultado_02 = $conn->query($query_02);
        $resultado_02_count = $resultado_02->rowCount();

        if (($resultado_02_count != 0)) { ?>

            <div class="container" theme-showcase" role="main" id="divauxiliar">
                <!-- <p class="text-center font-weight-bolder">AUXILIARES TAXISTAS</p> -->
                <table id="dtBasicExample2" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm" cellspacing="0" width="100%">
                <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">AUXILIARES TAXISTAS</caption>

                    <thead>

                        <tr class="table-primary">
                            <th><b><a class="text-default">Nome</th>
                            <th><b><a class="text-default">CPF<br></th>
                            <th><b><a class="text-default">Endereço</a></b></th>
                            <th><b><a class="text-default">Email</a></b></th>
                            <th><b><a class="text-default">Telefone</a></b></th>
                            <th><b><a class="text-default">Cadastro</a><br></th>
                            <th><b><a class="text-default">Status</a></th>
                            <th><b><a class="text-default">Ação</a></b></th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultado_02->fetch()) {
                        $data_criado = $row['data_cadastro'];
                        $cpf =  $row['cpf'];
                        $datapart = json_decode(($row['endereco']));
                        $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP;
                        $tipo = $row['tipo_motorista'];
                        $id_mot = $row['id_mot'];
                        $nome = $row['nome'];
                        $email = $row['email'];
                        $telefone = $row['telefone'];
                        $stat = $row['status'];

                    ?>
                        <tr>
                            <td width=10%><?php echo $nome  ?></td>
                            <td width=10%><?php echo $cpf  ?></td>
                            <td width=15%><?php echo $endereco ?><br></td>
                            <td width=15%><?php echo $email ?><br></td>
                            <td width=15%><?php echo $telefone ?><br></td>
                            <td width=10%><?php echo $data_criado; ?></td>
                            <td width=10%>
                                <?php
                                if ($stat == '0') {
                                    $status = "Em análise";
                                ?>
                                    <a class="btn btn-primary btn-sm" role="button"><?php echo $status ?></a>
                                <?php } elseif ($stat == '1') {
                                    $status = "Aprovado";
                                ?>
                                    <a class="btn btn-success btn-sm" role="button"><?php echo $status ?></a>

                                <?php  } elseif ($stat == '2') {
                                    $status = "Pendente de Documentação";
                                ?><a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '3') {
                                    $status = "Aguardando a Reanálise"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php } ?>

                            </td>
                            <td width=20%>
                                <a type="button" class="btn btn-primary" href="ficha_motorista_gestao.php?cpf=<?php echo $row['cpf'] ?>" role="button" style="margin:auto;display:block;">ACESSAR</a>
                            </td>
                        </tr>

                    <?php } ?>
                </table>
            </div>
        <?php
        } else {
            echo '<div style="text-align: -webkit-center;"><table width="80%" id="divauxiliar">
                        <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">AUXILIARES</caption>
                        <thead>
                        <tr style="background-color: #f8d7da;border-color: #f5c6cb;position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 2px solid #f5c6cb;border-radius: 0.25rem;height: 50px;">
                            <th style="    text-align: center;"><b><a class="text-default">NENHUM MOTORISTA AUXILIAR ENCONTRADO<br></a></b></th>
                        </tr>
                        </thead>
                  </table></div>
            ';
        }
        ?>
        <?php

        $query_03 = "SELECT * FROM permissionarios.veiculo ORDER BY id_veiculo  ASC";
        $resultado_03 = $conn->query($query_03);
        $resultado_03_count = $resultado_03->rowCount();

        if (($resultado_03_count != 0)) { ?>
            <div class="container" theme-showcase" role="main" id="divveiculo">
                <!-- <p class="text-center font-weight-bolder">VEÍCULOS TAXISTAS</p> -->
                <table id="dtBasicExample3" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm" cellspacing="0" width="100%">
                <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">VEÍCULOS TAXISTAS</caption>
                    <thead>
                        <tr class="table-primary">
                            <th style="width:5%"><b><a class="text-default">ID Veiculo<br></a></b></th>
                            <th><b><a class="text-default">Placa<br></th>
                            <th><b><a class="text-default">CPF Permissionario</a></b></th>
                            <th><b><a class="text-default">Crlv</a></b></th>
                            <th><b><a class="text-default">Renavam</a></b></th>
                            <th><b><a class="text-default">Status</a></th>
                            <th><b><a class="text-default">Ação</a></b></th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultado_03->fetch()) {
                        $data_criado = date('d-m-Y', strtotime($row['data_cadastro']));
                        $id_veiculo = $row['id_veiculo'];
                        $placa = $row['placa'];
                        $cpf_permissionario = $row['cpf_permissionario'];
                        $crlv = $row['crlv'];
                        $renavam = $row['renavam'];
                        $stat = $row['status'];
                        /* $datapart = json_decode(($row['endereco']));
                            $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP; */

                    ?>
                        <tr>
                            <td><?php echo $id_veiculo; ?><br></td>
                            <td> <?php echo $placa ?><br></td>
                            <td><?php echo $cpf_permissionario ?><br></td>
                            <td><?php echo $crlv ?></td>
                            <td><?php echo $renavam ?></td>
                            </td>
                            <td width=10%>
                                <?php
                                if ($stat == '0') {
                                    $status = "Em análise";
                                ?>
                                    <a class="btn btn-primary btn-sm" role="button"><?php echo $status ?></a>
                                <?php } elseif ($stat == '1') {
                                    $status = "Aprovado";
                                ?>
                                    <a class="btn btn-success btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '2') {
                                    $status = "Pendente de Documentação";
                                ?><a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '3') {
                                    $status = "Aguardando a Reanálise"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '4') {
                                    $status = "Documentação Aprovada, Pendente de Pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '5') {
                                    $status = "Aguardando analise do comprovante de pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } ?>

                            </td>
                            <td width=20%>
                                <a type="button" class="btn btn-primary" href="ficha_veiculo_gestao.php?placa=<?php echo $placa ?>&cpfperm=<?php echo $cpf_permissionario ?>" role="button" style="margin:auto;display:block;">ACESSAR</a>
                            </td>
                        </tr>

                    <?php } ?>




                </table>
            </div>
        <?php
        } else {
            echo '<div style="text-align: -webkit-center;"><table width="80%" id="divveiculo">
                        <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">VEICULOS</caption>
                        <thead>
                        <tr style="background-color: #f8d7da;border-color: #f5c6cb;position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 2px solid #f5c6cb;border-radius: 0.25rem;height: 50px;">
                            <th style="    text-align: center;"><b><a class="text-default">Nenhum veículo de taxi encontrado!<br></a></b></th>
                        </tr>
                        </thead>
                  </table></div>
            ';
        } ?>
    </div>
    <div id="escolares"> <?php
                            $query_03 = "SELECT * FROM permissionarios.motoristaescolar";
                            $resultado_03 = $conn->query($query_03);
                            $resultado_03_count = $resultado_03->rowCount();

                            if (($resultado_03_count != 0)) { ?>
            <div class="container" theme-showcase" role="main" id="divpermescolar">
                <!-- <p class="text-center font-weight-bolder">PERMISSIONÁRIO ESCOLARES</p> -->
                <table id="dtBasicExample5" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm" cellspacing="0" width="100%">
                <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">PERMISSIONÁRIO ESCOLARES</caption>
                    <thead>
                        <tr class="tablesorter-headerRow table-primary">
                            <th><b><a class="text-default">Nº Ordem</a></b></th>
                            <th><b><a class="text-default">Nome</th>
                            <th><b><a class="text-default">Documento<br></th>
                            <th><b><a class="text-default">Endereço</a></b></th>
                            <th><b><a class="text-default">Email</a></b></th>
                            <th><b><a class="text-default">Telefone</a></b></th>
                            <th><b><a class="text-default">Cadastro</a><br></th>
                            <th><b><a class="text-default">Status</a></th>
                            <th><b><a class="text-default">Ação</a></b></th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultado_03->fetch()) {
                                    $data_criado = $row['data_cadastro'];
                                    $documento =  $row['documento'];
                                    $datapart = json_decode(($row['endereco']));
                                    $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP;
                                    $tipo = $row['tipodocumento'];
                                    $nome = $row['nome'];
                                    $email = $row['email'];
                                    $telefone = $row['telefone'];
                                    $stat = $row['status'];
                                    $nordem = $row['codigo_permissionario'];
                                    /* $datapart = json_decode(($row['endereco']));
                            $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP; */

                    ?>
                        <tr>
                            <td><?php echo $nordem; ?><br></td>
                            <td> <?php echo $nome ?><br></td>
                            <td><?php echo $documento ?><br></td>
                            <td><?php echo $endereco ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $telefone ?></td>
                            <td><?php echo $data_criado ?></td>
                            </td>
                            <td width=10%>
                                <?php
                                    if ($stat == '0') {
                                        $status = "Em análise";
                                ?>
                                    <a class="btn btn-primary btn-sm" role="button"><?php echo $status ?></a>
                                <?php } elseif ($stat == '1') {
                                        $status = "Aprovado";
                                ?>
                                    <a class="btn btn-success btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '2') {
                                        $status = "Pendente de Documentação";
                                ?><a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '3') {
                                        $status = "Aguardando a Reanálise"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '4') {
                                        $status = "Documentação Aprovada, Pendente de Pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '5') {
                                        $status = "Aguardando analise do comprovante de pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } ?>

                            </td>
                            <td width=20%>
                                <a type="button" class="btn btn-primary" href="ficha_motoristaescolar_gestao.php?doc=<?php echo $documento ?>&tipo=<?php echo $tipo ?>" role="button" style="margin:auto;display:block;">ACESSAR</a>
                            </td>
                        </tr>

                    <?php } ?>




                </table>
            </div>
        <?php
                            } else {
                                echo '<div style="text-align: -webkit-center;"><table width="80%" id="divpermescolar">
                        <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">PERMISSIONÁRIO ESCOLAR</caption>
                        <thead>
                        <tr style="background-color: #f8d7da;border-color: #f5c6cb;position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 2px solid #f5c6cb;border-radius: 0.25rem;height: 50px;">
                            <th style="    text-align: center;"><b><a class="text-default">Nenhum permissionário escolar encontrado!<br></a></b></th>
                        </tr>
                        </thead>
                  </table></div>
            ';
                            }
                            $query_03 = "SELECT * FROM permissionarios.escolarmotmoni";
                            $resultado_03 = $conn->query($query_03);
                            $resultado_03_count = $resultado_03->rowCount();

                            if (($resultado_03_count != 0)) { ?>
            <div class="container" theme-showcase" role="main" id="divmotmoniescolar">
                <!-- p class="text-center font-weight-bolder">MOTORISTAS/MONITORES ESCOLARES</p> -->
                <table id="dtBasicExample6" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm" cellspacing="0" width="100%">
                    <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">MOTORISTAS/MONITORES ESCOLARES</caption>
                    <thead>
                        <tr class="tablesorter-headerRow table-primary">
                            <th><b><a class="text-default">Nome</th>
                            <th><b><a class="text-default">Documento<br></th>
                            <th><b><a class="text-default">Endereço</a></b></th>
                            <th><b><a class="text-default">Tipo do Cadastro</a></b></th>
                            <th><b><a class="text-default">Documento do Permissionário</a></b></th>
                            <th><b><a class="text-default">Cadastro</a><br></th>
                            <th><b><a class="text-default">Status</a></th>
                            <th><b><a class="text-default">Ação</a></b></th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultado_03->fetch()) {
                                    $data_criado = $row['data_cadastro'];
                                    $cpf =  $row['cpf'];
                                    $datapart = json_decode(($row['endereco']));
                                    $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP;
                                    $tipo = $row['tipo'];
                                    $nome = $row['nome'];
                                    $telefone = $row['telefone'];
                                    $stat = $row['status'];
                                    $docpermissionario = $row['docpermissionario'];
                                    /* $datapart = json_decode(($row['endereco']));
                            $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP; */

                    ?>
                        <tr>
                            <td> <?php echo $nome ?><br></td>
                            <td><?php echo $documento ?><br></td>
                            <td><?php echo $endereco ?></td>
                            <td><?php echo $tipo ?></td>
                            <td><?php echo $docpermissionario ?></td>
                            <td><?php echo $data_criado ?></td>
                            </td>
                            <td width=10%>
                                <?php
                                    if ($stat == '0') {
                                        $status = "Em análise";
                                ?>
                                    <a class="btn btn-primary btn-sm" role="button"><?php echo $status ?></a>
                                <?php } elseif ($stat == '1') {
                                        $status = "Aprovado";
                                ?>
                                    <a class="btn btn-success btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '2') {
                                        $status = "Pendente de Documentação";
                                ?><a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '3') {
                                        $status = "Aguardando a Reanálise"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '4') {
                                        $status = "Documentação Aprovada, Pendente de Pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '5') {
                                        $status = "Aguardando analise do comprovante de pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } ?>

                            </td>
                            <td width=20%>
                                <a type="button" class="btn btn-primary" href="ficha_motoristamoniescolar_gestao.php?cpf=<?php echo $cpf ?>&tipo=<?php echo $tipo ?>&&docperm=<?php echo $docpermissionario  ?>" role="button" style="margin:auto;display:block;">ACESSAR</a>
                            </td>
                        </tr>

                    <?php } ?>




                </table>
            </div>
        <?php
                            } else {
                                echo '<div style="text-align: -webkit-center;"><table width="80%" id="divmotmoniescolar">
                        <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">MOTORISTAS/MONITORES ESCOLARES</caption>
                        <thead>
                        <tr style="background-color: #f8d7da;border-color: #f5c6cb;position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 2px solid #f5c6cb;border-radius: 0.25rem;height: 50px;">
                            <th style="    text-align: center;"><b><a class="text-default">Nenhum Motorista/Monitor escolares encontrado!<br></a></b></th>
                        </tr>
                        </thead>
                  </table></div>
            ';
                            }




                            $query_03 = "SELECT * FROM permissionarios.veiculoescolar ";
                            $resultado_03 = $conn->query($query_03);
                            $resultado_03_count = $resultado_03->rowCount();

                            if (($resultado_03_count != 0)) { ?>
            <div class="container" theme-showcase" role="main" id="divveiculoescolar">
                <!-- p class="text-center font-weight-bolder">VEÍCULOS ESCOLARES</p> -->
                <table id="dtBasicExample7" class="tablesorter-blue sortable lista-clientes table table-striped table-hover table-sm" cellspacing="0" width="100%">
                <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">VEÍCULOS ESCOLARES</caption>
                    <thead>
                        <tr class="table-primary">
                            <th style="width:5%"><b><a class="text-default">ID Veiculo<br></a></b></th>
                            <th><b><a class="text-default">Placa<br></th>
                            <th><b><a class="text-default">Documento Permissionario</a></b></th>
                            <th><b><a class="text-default">Modelo</a></b></th>
                            <th><b><a class="text-default">Renavam</a></b></th>
                            <th><b><a class="text-default">Status</a></th>
                            <th><b><a class="text-default">Ação</a></b></th>
                        </tr>
                    </thead>
                    <?php while ($row = $resultado_03->fetch()) {
                                    $data_criado = date('d-m-Y', strtotime($row['data_cadastro']));
                                    $id_veicescolar = $row['id_veic_escolar'];
                                    $placa = $row['placa'];
                                    $doc_permissionario = $row['doc_permissionario'];
                                    $renavam = $row['renavam'];
                                    $modelo = $row['modelo'];
                                    $stat = $row['status'];
                                    /* $datapart = json_decode(($row['endereco']));
                            $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP; */

                    ?>
                        <tr>
                            <td> <?php echo $id_veicescolar ?><br></td>
                            <td> <?php echo $placa ?><br></td>
                            <td><?php echo $doc_permissionario ?><br></td>
                            <td><?php echo $modelo ?></td>
                            <td><?php echo $renavam ?></td>
                            </td>
                            <td width=10%>
                                <?php
                                    if ($stat == '0') {
                                        $status = "Em análise";
                                ?>
                                    <a class="btn btn-primary btn-sm" role="button"><?php echo $status ?></a>
                                <?php } elseif ($stat == '1') {
                                        $status = "Aprovado";
                                ?>
                                    <a class="btn btn-success btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '2') {
                                        $status = "Pendente de Documentação";
                                ?><a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '3') {
                                        $status = "Aguardando a Reanálise"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '4') {
                                        $status = "Documentação Aprovada, Pendente de Pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } elseif ($stat == '5') {
                                        $status = "Aguardando analise do comprovante de pagamento"; ?>
                                    <a class="btn btn-warning btn-sm" role="button"><?php echo $status ?></a>
                                <?php  } ?>

                            </td>
                            <td width=20%>
                                <a type="button" class="btn btn-primary" href="ficha_veiculoescolar_gestao.php?placa=<?php echo $placa ?>&cpfperm=<?php echo $doc_permissionario ?>" role="button" style="margin:auto;display:block;">ACESSAR</a>
                            </td>
                        </tr>

                    <?php } ?>




                </table>
            </div>
        <?php
                            } else {
                                echo '<div style="text-align: -webkit-center;"><table width="80%" id="divveiculoescolar">
                        <caption class="text-center font-weight-bolder" style="caption-side:top;font-size:40px;font-weight:bolder;color:black">VEICULOS ESCOLARES</caption>
                        <thead>
                        <tr style="background-color: #f8d7da;border-color: #f5c6cb;position: relative;padding: 0.75rem 1.25rem;margin-bottom: 1rem;border: 2px solid #f5c6cb;border-radius: 0.25rem;height: 50px;">
                            <th style="    text-align: center;"><b><a class="text-default">Nenhum veiculo escolar encontrado!<br></a></b></th>
                        </tr>
                        </thead>
                  </table></div>
            '; }
        ?>
    </div>
    <script>
        $('input#search').quicksearch('table')
        $('input#search').quicksearch('table tbody tr')
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
<footer>
    
</footer>
</html>