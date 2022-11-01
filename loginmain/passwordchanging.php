<?php

session_start();
include_once '../src/conexao.php';

//operador
header('Content-type: text/html; charset=UTF-8');
include_once '../conexao.php';
require '../public/scripts/PHPMailer-master/src/Exception.php';
require '../public/scripts/PHPMailer-master/src/PHPMailer.php';
require '../public/scripts/PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['senha']) && $_POST['email']) {
  $email = $_POST['email'];
  $senha = MD5($_POST['senha']);
  $sql = "UPDATE permissionarios.login_mot SET resetpasswordtoken='', senha='$senha' WHERE email = '$email'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $count = $stmt->rowCount();
}
/* ---------------------------------------- SQL REGISTRAR ALTERACOES ---------------------------------------- */

$data_alteracao = date("Y-m-d H:i:s");
$alteracao =   array(
  'DataAlteracao' => $data_alteracao,
  'TipodeAlteracao' => 'Redefiniu uma Nova Senha',
);


$array_alteracoes[] = $alteracao;
$selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_mot WHERE email = '$email'";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
$resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
while ($row = $resultado_selectalteracoes->fetch()) {
  $var = json_decode(($row['alteracoesfeitas']));
  foreach ($var as $item) {
    $var2 =   array(
      'DataAlteracao' => $item->DataAlteracao,
      'TipodeAlteracao' => $item->TipodeAlteracao,
    );
    $array_alteracoes[] = $var2;
  };
}

$array_alteracoes = json_encode($array_alteracoes);



$sqlalteracoes = "UPDATE permissionarios.login_mot SET  alteracoesfeitas='$array_alteracoes' WHERE cpf = '$cpf'";
$stmt = $conn->prepare($sqlalteracoes);
$stmt->execute();
$counts = $stmt->rowCount();


/* ---------------------------------------- SQL REGISTRAR ALTERACOES ---------------------------------------- */
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
</head>

<body> <?php
        if ($count != 0) {

          echo "
          <html>
          <head>    
          <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>      
          <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <style>
          .swal2-popup {
            font-size: 20px !important;
            border-radius: 25px;
            } 
        </style>
          <script>Swal.fire({
            title: 'Senha Alterada!',
            text: 'Você ja pode acessar o portal com a nova senha!',
            icon: 'success',
            confirmButtonText: 'Ok'
          })
          console.log(SweetAlertResult)
          </script>
          </head>
          <body style='background-color:#4A79A7';>
          <img src='../public/images/REMOB_2020_LOGO_SITE_REMOB_BRANCO.png' height='100%' width='100%'>
          

          </body>
          </html>
          <META HTTP-EQUIV=REFRESH CONTENT = '5;URL=../loginmain/login.php'>";
        } else {
          echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
            <script type=\"text/javascript\">
              alert(\"Erro ao cadastrar.\");
            </script>			
          ";
        } ?>
</body>

</html>