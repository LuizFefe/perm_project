<?php

session_start();
include_once '../src/conexao.php';

//operador
header('Content-type: text/html; charset=UTF-8');
require_once("../email/emailfunc.php");
if (isset($_POST['email'])) {
  $email = $_POST['email'];
  $token = md5($email);
  $sql = "UPDATE permissionarios.login_mot SET resetpasswordtoken='$token' WHERE email = '$email'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $count = $stmt->rowCount();
  $query_03 = "SELECT * FROM permissionarios.login_mot WHERE email = '$email'";
  $resultado_03 = $conn->query($query_03);
  $resultado_03_count = $resultado_03->rowCount();
  if (($resultado_03_count != 0)) {
    while ($row = $resultado_03->fetch()) {
      $cpf = $row['cpf'];
      $email = $row['email'];
    }
  }
  $link = "<a href='http://redemobilidade.pmf.sc.gov.br/cadastro/loginmain/redefinepassword.php?key=" . $email . "&token=" . $token . "'>Clique Aqui</a>";
  $msg = '<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }
  
    body {
      font-family: Montserrat;
    }
  
    header {
      background-color: #003466;
      padding: 1px;
      text-align: center;
      font-size: 35px;
      color: white;
    }
  
    article {
      float: left;
      padding: 20px;
      width: 70%;
      background-color: #f1f1f1;
    }
  
    footer {
      background-color: #4B7AAA;
      padding: 10px;
      text-align: center;
      color: white;
    }
  
    a {
      /* font: 500 1.6rem Poppins; */
      text-decoration: none;
      font-weight: 500;
      font-size: 1rem;
      color: #4B7AAA;
      ;
      background: none;
      cursor: pointer;
      transition: 0.2s;
      border: 0;
    }
  
    @media (max-width: 600px) {
  
      nav,
      article {
        width: 100%;
        height: auto;
      }
    }
  </style>
  </head>
  
  <body>
  <header>
    <div style="display: inline-flex;"><img src="http://redemobilidade.pmf.sc.gov.br/cadastro/public/images/REMOB_2020_LOGO_SITE_REMOB_BRANCO.png" width="100%" height="100px"></div>
  </header>
  
  <section>
    <h1>Redefinindo sua senha.</h1>
    <form method="post" action="http://redemobilidade.pmf.sc.gov.br/cadastro/loginmain/sendemailsenha.php">
      <input type="hidden" name="emailuser" value=' . $email . ' ">
      <p>Para redefinir a sua senha e continuar navegando na plataforma ' . $link . '.</p>
    </form>
  </section>
  
  <section>
    <p style="font-size:10px"><strong>Caso não tenha sido você que tenha solicitado a mudança da senha, desconsidere esse email.</strong> </p>
  </section>
  
  <footer>
    <p>Secretaria Municipal de Mobilidade e Planejamento Urbano</p>
  </footer>
  
  </body>';
  smtpmailer($email, 'dpft.smpu@pmf.sc.gov.br', 'SMPU', 'Redefina Sua Senha', $msg);
}

/* ---------------------------------------- SQL REGISTRAR ALTERACOES ---------------------------------------- */

/* $data_alteracao = date("Y-m-d H:i:s");
$alteracao =   array(
  'DataAlteracao' => $data_alteracao,
  'TipodeAlteracao' => 'Login Criado',
);


$array_alteracoes[] = $alteracao;
$selectalteracoes = "SELECT alteracoesfeitas FROM permissionarios.login_mot WHERE cpf = '$cpf'";
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
$count = $stmt->rowCount();
 */

/* ---------------------------------------- SQL REGISTRAR ALTERACOES ---------------------------------------- */
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
</head>

<body> <?php
        if ($resultado_03_count != 0) {

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
            title: 'Email Enviado!',
            text: 'Acesse seu e-mail para redefinir sua senha!',
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
          /* echo " 
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=index.php'>
            <script type=\"text/javascript\">
              alert(\"Erro ao cadastrar.\");
            </script>			
          "; */
        } ?>
</body>

</html>