<!--
  Cortesia: Michel Mittmann, Matdeus Ferreira
-->

<?php
session_start();
include_once("../src/conexao.php");
$today = date("d/m/Y H:i:s");
$cpf_usuario = $_SESSION['usuariocpf'];
include("../mpdf60/mpdf.php");
//GERANDO DADOS
$query_03 = "SELECT * FROM permissionarios.motorista WHERE cpf = '$cpf_usuario' ";
$resultado_03 = $conn->query($query_03);
$resultado_03_count = $resultado_03->rowCount();
if (($resultado_03_count != 0)) {
    while ($row = $resultado_03->fetch()) {
        $nome = $row['nome'];
        $nperm = $row['codigo_permissionario'];
        $cpf = $row['cpf'];
        $ponto = $row['ponto'];
    }
}
$query_04 = "SELECT * FROM permissionarios.veiculo WHERE cpf_permissionario = '$cpf_usuario' ";
$resultado_04 = $conn->query($query_04);
$resultado_04_count = $resultado_04->rowCount();
if (($resultado_04_count != 0)) {
    while ($row = $resultado_04->fetch()) {
        $viglicenca = $row['vigencia_licenca'];
        $newDate = date("d-m-Y", strtotime($viglicenca));
        $placa = $row['placa'];
        $veiculo = $row['marca'] . ' ' . $row['modelo'];
    }
}

// GERANDO OS ELEMENTOS DA FICHA .pdf 
// 1. GERA cabeçalho da ficha 




$mpdf = new mPDF;
$h = $mpdf->hPt;
$w = $mpdf->wPt;

$documentacao = ' 

            <style>
          
                td {
                  /* border: 1px solid black;
                  border-collapse: collapse; */
                  padding: 5px;
                  
                }
            </style>
        <table style="overflow-x: auto;white-space: nowrap;font-family:montserrat;page-break-inside:avoid;border:1px solid black;border-collapse: collapse;font-size:15px;width:100%" >
        
            <tr style="width:100%">
                <td colspan="1" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff;width:1px"><strong><img src="../public/images/Imagem1.jpg" height="70px"  alt=""></td>
                <td colspan="5" scope="colgroup" style="text-align: right;font-family:montserrat;font-size:11px;border:0" >PREFEITURA MUNICIPAL DE FLORIANÓPOLIS<br>SECRETARIA MUNICIPAL DE MOBILIDADE E PLANEJAMENTO URBANO<br>DIRETORIA DE PLANEJAMENTO E FISCALIZAÇÃO DE TRANSPORTE</td>
            </tr>
            <tr>
                <td colspan="6" scope="colgroup" style="text-align: center;vertical-align: middle;background-color:#dbdbdb">
                    <div style="text-align:center"><strong>LICENÇA DE OPERAÇÃO</strong></div>
                </td>
            </tr>
            <tr>
                <td colspan="6" scope="colgroup" style="text-align: center;vertical-align: middle;background-color:#fff"><strong><img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fredemobilidade.pmf.sc.gov.br%2Fcadastro%2Fgestao%2Fficha_motorista_gestao.php%3Fcpf%3D' . $cpf . '" title="Link to" height="100px" /></td>
            </tr>
            <tr style="width:50%">
                <td colspan="6" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff"><strong>RAZÃO SOCIAL : </strong>' . $nome . '</td>
            </tr>
            <tr height="10%">
                <td colspan="6" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff"><strong>PLACA : </strong>' . $placa . '</td>

            </tr>
            <tr>
                <td colspan="3" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff"><strong>Nº ORDEM : </strong>' . $nperm . '</td>
               
                
            </tr>
            <tr >
                <td colspan="6" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff"><strong>VEICULO/TIPO/MARCA : </strong>' . $veiculo . '</td>
            </tr>
            <tr >
                <td colspan="6" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff"><strong>VALIDADE DA LICENÇA : </strong>' . $newDate . '</td>
            </tr>
            <tr >
                <td colspan="6" scope="colgroup" style="text-align: left;vertical-align: middle;background-color:#fff"><strong>PONTO: </strong>' . $ponto . '</td>
            </tr>
            <tr >
                <td colspan="6" scope="colgroup" style="text-align: center;vertical-align: middle;background-color:#fff;font-size:12px"><strong>VEÍCULO AUTORIZADO PARA REALIZAR O SERVIÇO DE TAXI NO MUNICIPIO DE FLORIANÓPOLIS</td>
            </tr>
            
            
            <tr >
                <td colspan="1" scope="colgroup" style="text-align: center;vertical-align: middle;background-color:#fff"><div style="text-align:center"><strong>   EMITIDO EM</strong><br>' . $today . '</div></td>
                <td colspan="5" scope="colgroup" style="text-align: right;vertical-align: middle;background-color:#fff;margin-top:5px"><strong style="font-size:13px;"><div style="text-align:center"><strong></strong><br>Diretor de Planejamento e Fiscalização de Transporte</div></strong></td>
            </tr>
        </table>

        

                ';

// 4. GERA o arquivo PDF encadeando as partes definidas




// Define tde Header/Footer before writing anytding so tdey appear on tde first page
/* $mpdf->SetdTMLHeader('
<table widtd="100%">
<tr>
    <td widtd="33%">
    <img src="Imagem1.jpg" alt="">

    
    </td>
    
    <td widtd="66%" style="text-align: right;">

    DEPARTAMENTO DE CONTROLE DE TARIFAS E SUBSÍDIOS </strong><br>RUA FELIPE SCHMIDT, N° 1320 | 7º ANDAR<br>CENTRO| FLORIANÓPOLIS-SC | CEP 88.010-002<br>(48) 3212-5753
    
    </td>
</tr>
</table>'); */
/* $mpdf->SetdTMLFooter('
<table widtd="100%">
    <tr>
        <td widtd="33%">{DATE j-m-Y}</td>
        <td widtd="33%" align="center">{PAGENO}/{nbpg}</td>
        <td widtd="33%" style="text-align: right;">RELATÓRIO DE SUBSÍDIOS</td>
    </tr>
</table>'); */
$html = $documentacao;
$mpdf->WriteHTML($documentacao);



$today = date("m/d/y");
$pass = substr(md5(uniqid(mt_rand(), true)), 0, 8);

$mpdf->Output('LICENCADETRAFEGO_' . mb_strtoupper($nome) . '_' . mb_strtoupper($placa) . '_' . $today . '.pdf', 'D');


exit;


?>