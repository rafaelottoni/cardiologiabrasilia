<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

echo 'Carregando';
  
try {
  if(isset($_POST['email'])) {

    echo 'entrou no if';

    // Mudar Aqui o e-mail
    $email_envio = 'consulta@cardiologiabrasilia.com'; // E-mail do site (ex: contato@seusite.com)
    $email_pass = 'CcSr5324'; // Senha do e-mail

    $site_name = 'Cardiologia Brasilia'; // Nome do Site
    $site_url = 'www.cardiologiabrasilia.com'; // URL do Site

    $host_smtp = 'smtps.uhserver.com'; // HOST SMTP Ex: smtp.domain.com.br
    $host_port = '465'; // Porta do Host, geralmente 465 ou 587


    $result_form = 'Formulário não enviado';
    $hasErrors = false;
    // Não mudar abaixo:
    $email = $_POST['email'];
    $nome = $_POST['nome'];

    // Loop por cada field do formulário
    $body_content = 'Nome: '.$nome.'<br/>';
    $body_content .= 'E-mail: '.$email.'<br/>';
    $body_content .= 'Telefone: '.$_POST['telefone'].'<br/>';
    $body_content .= 'Mensagem: '.$_POST['mensagem'].'<br/>';

    // Inicia o objeto PHPMailer
    $mail = new PHPMailer(true);
    
    $mail->CharSet = 'UTF-8';
    
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Tire do comentário para debugar
    $mail->isSMTP();
    $mail->Host = $host_smtp;
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;
    $mail->Username = $email_envio;
    $mail->Password = $email_pass;
    $mail->Port = $host_port; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Se não tiver SSL use assim, com SSL coloque no SMTPSecure
    
    $mail->setFrom($email_envio, 'Formulário - '. $nome);
    $mail->addAddress($email_envio, $site_name);
    $mail->addReplyTo($email, $nome);
    $mail->isHTML(true);
    
    $mail->WordWrap = 70;
    $mail->Subject = 'Formulário - ' . $site_name . ' - ' . $nome;
    $mail->Body = $body_content;
  
    if(!$mail->send()) {
      echo $mail->ErrorInfo;
    }
    echo 'Formulário enviado!!!';
  }  
 } 
 catch (Exception $e) {  echo $e->errorMessage(); }
?>