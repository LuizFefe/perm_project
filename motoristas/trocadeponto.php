<?php
session_start();

/* require('../login/session_valida.php'); */
require_once('login/session_status_src.php');

include_once("src/conexao.php");
include_once("./calculaidade.php");
// link geral do gerado de pdf - biblioteca mpdf

$cpf_usuario = $_SESSION['usuariocpf'];
$operador_email = $_SESSION['usuarioEmail']; //recebe da pagina anterior o numero do cadastro
$operador_nome = $_SESSION['usuarionome']; //recebe da pagina anterior o numero do cadastro


$query_02 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario'";
$resultado_02 = $conn->query($query_02);
$resultado_02_count = $resultado_02->rowCount();



if (($resultado_02_count != 0)) {

    while ($row = $resultado_02->fetch()) {
        $nome = $row['nome'];
        $cmc = $row['cmc'];
        $cpf = $row['cpf'];
        $telefone = $row['telefone'];
        $datapart = json_decode(($row['endereco']));
        $endereco = ' <strong>Rua: </strong> ' . $datapart->logradouro . ' , ' . $datapart->numero . ' , ' . $datapart->complemento . ' <strong> Bairro: </strong> ' . $datapart->bairro . ' <strong> Cidade: </strong> ' . $datapart->cidade . '<strong> CEP: </strong> ' . $datapart->CEP;
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

?>

        <!DOCTYPE html>
        <html lang="pt-br">
        <!-- lang é um atributo-->

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Permissionario</title>
            <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


            <link rel="stylesheet" href="public/styles/main.css">
            <link rel="stylesheet" href="public/styles/partials/header.css">
            <link rel="stylesheet" href="public/styles/partials/forms.css">
            <link rel="stylesheet" href="public/styles/partials/step-nav-bar.css">
            <link rel="stylesheet" href="public/styles/footer.css">

            <link rel="stylesheet" href="public/styles/partials/page-cadastrar-viagens.css">

            <link rel="preconnect" href="https://fonts.gstatic.com/">

            <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

            <script src="public/scripts/mobile-nav-bar-active.js" defer></script> <!-- Script for mobile nav-bar links-->



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

            .button-56 {
                align-items: center;
                background-color: #fee6e3;
                border: 2px solid #111;
                border-radius: 8px;
                box-sizing: border-box;
                color: #111;
                cursor: pointer;
                display: flex;
                font-family: Inter, sans-serif;
                font-size: 16px;
                height: 48px;
                justify-content: center;
                line-height: 24px;
                max-width: 100%;
                padding: 0 25px;
                position: relative;
                text-align: center;
                text-decoration: none;
                user-select: none;
                -webkit-user-select: none;
                touch-action: manipulation;
            }

            .button-56:after {
                background-color: #111;
                border-radius: 8px;
                content: "";
                display: block;
                height: 48px;
                left: 0;
                width: 100%;
                position: absolute;
                top: -2px;
                transform: translate(8px, 8px);
                transition: transform .2s ease-out;
                z-index: -1;
            }

            .button-56:hover:after {
                transform: translate(0, 0);
            }

            .button-56:active {
                background-color: #ffdeda;
                outline: 0;
            }

            .button-56:hover {
                outline: 0;
            }

            @media (min-width: 768px) {
                .button-56 {
                    padding: 0 40px;
                }
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
                            <div class="logo-title">
                                <!--  <a href="../">
                                <img class="logo_selo_horizontal" src="../public/images/icons/logo/logo_horizontal_branca_azul.svg" alt="">
                            </a>  -->
                            </div>
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
                                    <a href="login/sair.php">Sair</a>
                                </li>

                            </ul>
                        </nav>
                    </div>

                    <div class="header-content">
                        <img src="public/images/logo.svg" alt="PMF">
                        <strong>Troca de Pontos</strong>
                    </div>

                </header>

                <main style="margin-bottom:100px">

                    <fieldset id="cadastro_contratantes" class="div-show gap-3" style="display: block;">
                        <div class="d-grid gap-3 p-5">
                            <legend style="font-size: 40px">Troca de Pontos</legend>
                            <div class="box-detail">
                                <strong>Seu Ponto Atual é: <?php echo $ponto ?></strong>
                            </div>
                            <form action="" method="post">
                                <div class="select-block mt-5" style="margin-bottom:15px">
                                    <h2>Para qual ponto você deseja se transferir:</h2>
                                    <select class="form-control" name="pontos" id="pontos">
                                        <option disabled selected>Selecione o ponto</option>
                                        <option value="CO01 - R. ARACY VAZ CALADO">CO01 - R. ARACY VAZ CALADO</option>
                                        <option value="CO02 - R. SANTOS SARAIVA">CO02 - R. SANTOS SARAIVA</option>
                                        <option value="CO03 - AV. SANTA CATARINA">CO03 - AV. SANTA CATARINA</option>
                                        <option value="CO04 - HOSPITAL FLORIANÓPOLIS">CO04 - HOSPITAL FLORIANÓPOLIS</option>
                                        <option value="CO05 - JARDIM ATLÂNTICO-ANGELONI">CO05 - JARDIM ATLÂNTICO-ANGELONI</option>
                                        <option value="CO06 - PRAÇA PAULO SCHLEMPER">CO06 - PRAÇA PAULO SCHLEMPER</option>
                                        <option value="CO07 - R.WALDEMAR OURIQUES">CO07 - R.WALDEMAR OURIQUES</option>
                                        <option value="CO08 - MONTE CRISTO/JARDIM PANORAMA">CO08 - MONTE CRISTO/JARDIM PANORAMA</option>
                                        <option value="CO09 - ABRAÃO-PRACINHA">CO09 - ABRAÃO-PRACINHA</option>
                                        <option value="CO10 - R. ABEL CAPELA">CO10 - R. ABEL CAPELA</option>
                                        <option value="CO11 - PRAÇA PRAIA DO MEIO-COQUEIROS">CO11 - PRAÇA PRAIA DO MEIO-COQUEIROS</option>
                                        <option value="CE01 - PRAÇA XV DE NOVEMBRO">CE01 - PRAÇA XV DE NOVEMBRO</option>
                                        <option value="CE02 - RODOVIÁRIA RITA MARIA">CE02 - RODOVIÁRIA RITA MARIA</option>
                                        <option value="CE04 - R. FRANCISO TOLENTINO">CE04 - R. FRANCISO TOLENTINO</option>
                                        <option value="CE05 - PRAÇA LAURO MULLER-MAJESTIC">CE05 - PRAÇA LAURO MULLER-MAJESTIC</option>
                                        <option value="CE06 - R.TENENTE SILVEIRA-BIBLIOTECA PÚBLICA">CE06 - R.TENENTE SILVEIRA-BIBLIOTECA PÚBLICA</option>
                                        <option value="CE07 - AV.BEIRA MAR-NOVOTEL">CE07 - AV.BEIRA MAR-NOVOTEL</option>
                                        <option value="CE08 - AV.PAULO FONTES-MERCADO PÚBLICO">CE08 - AV.PAULO FONTES-MERCADO PÚBLICO</option>
                                        <option value="CE09 - PRAÇA TANCREDO NEVES">CE09 - PRAÇA TANCREDO NEVES</option>
                                        <option value="CE10 - MATERNIDADE CARMELA DUTRA">CE10 - MATERNIDADE CARMELA DUTRA</option>
                                        <option value="CE11 - PRAÇA ESTEVE JÚNIOR">CE11 - PRAÇA ESTEVE JÚNIOR</option>
                                        <option value="CE12 - R. ESTEVES JÚNIOR">CE12 - R. ESTEVES JÚNIOR</option>
                                        <option value="CE13 - SHOPPING BEIRA MAR">CE13 - SHOPPING BEIRA MAR</option>
                                        <option value="CE14 - AV. RIO BRANCO">CE14 - AV. RIO BRANCO</option>
                                        <option value="CE15 - AV. HERCÍLIO LUZ-PÇ OLIVIO AMORIM">CE15 - AV. HERCÍLIO LUZ-PÇ OLIVIO AMORIM</option>
                                        <option value="CE16 - LARGO BENJ. CONSTANT-SUP.HIPPO">CE16 - LARGO BENJ. CONSTANT-SUP.HIPPO</option>
                                        <option value="CE17 - AV HERCÍLIO LUZ-CLUBE 12">CE17 - AV HERCÍLIO LUZ-CLUBE 12</option>
                                        <option value="CE18 - R. MAJOR COSTA">CE18 - R. MAJOR COSTA</option>
                                        <option value="CE19 - PRAÇA SANTOS DUMONT">CE19 - PRAÇA SANTOS DUMONT</option>
                                        <option value="CE20 - SHOPPING IGUATEMI">CE20 - SHOPPING IGUATEMI</option>
                                        <option value="CE21 - AGRONÔMICA-HOSPITAL INFANTIL">CE21 - AGRONÔMICA-HOSPITAL INFANTIL</option>
                                        <option value="CE22 - AV. BEIRA MAR-ANGELONI">CE22 - AV. BEIRA MAR-ANGELONI</option>
                                        <option value="CE23 - AV. MADRE BENVENUTA-UDESC">CE23 - AV. MADRE BENVENUTA-UDESC</option>
                                        <option value="CE24 - R. DEP. ANTONIO EDU VIEIRA">CE24 - R. DEP. ANTONIO EDU VIEIRA</option>
                                        <option value="CE25 - ROD. ADMAR GONZAGA-CEPON">CE25 - ROD. ADMAR GONZAGA-CEPON</option>
                                        <option value="CE26 - SANTA MÔNICA-ANGELONI">CE26 - SANTA MÔNICA-ANGELONI</option>
                                        <option value="CE27 - R. LAURO LINHARES-TRINDADE">CE27 - R. LAURO LINHARES-TRINDADE</option>
                                        <option value="CE28 - CÓRREGO GRANDE-SUPER IMPERATRIZ">CE28 - CÓRREGO GRANDE-SUPER IMPERATRIZ</option>
                                        <option value="LE01 - LAGOA DA CONCEIÇÃO">LE01 - LAGOA DA CONCEIÇÃO</option>
                                        <option value="NO01 - SHOPPING FLORIPA">NO01 - SHOPPING FLORIPA</option>
                                        <option value="NO02 - MONTE VERDE-BISTEK">NO02 - MONTE VERDE-BISTEK</option>
                                        <option value="NO03 - CANASVIEIRAS-AV. NAÇÔES">NO03 - CANASVIEIRAS-AV. NAÇÔES</option>
                                        <option value="NO04 - INGLESES-ANGELONI">NO04 - INGLESES-ANGELONI</option>
                                        <option value="NO05 - JURERE INTERN.-OPEN SHOPPING">NO05 - JURERE INTERN.-OPEN SHOPPING</option>
                                        <option value="SU01 - AEROPORTO HERCÍLIO LUZ">SU01 - AEROPORTO HERCÍLIO LUZ</option>
                                        <option value="SU02 - JARDIM CALIFÓRNIA-CARIANOS">SU02 - JARDIM CALIFÓRNIA-CARIANOS</option>
                                        <option value="SU03 - SACO DOS LIMÔES-PRAÇA">SU03 - SACO DOS LIMÔES-PRAÇA</option>
                                        <option value="SU04 - RIO TAVARES-UPA SUL">SU04 - RIO TAVARES-UPA SUL</option>
                                    </select>
                                    <small id="ponto_msg" class="small-message form-text text-muted"></small>

                                </div>
                                <button type="submit" style="border:0">Fazer Transferência</button>
                            </form>

                        </div>
                    </fieldset>

                </main>
                <!--  <button class="button-56" role="button">Button 56</button>   -->
                <footer>
                    <div class="d-flex align-items-center flex-column">
                        <strong class="text-center">Secretaria Municipal de Planejamento Urbano</strong>
                        <br>
                        Contato:
                        <a class="portugues" href="#">smpu@pmf.sc.gov.br</a>
                    </div>
                </footer>
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