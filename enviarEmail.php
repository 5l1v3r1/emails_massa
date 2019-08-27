<?php
require 'autoload.php';
$sql = new Dados();
$emails = $sql->getEmails();

if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
	$mensagem = addslashes($_POST['mensagem']);

	try {
	    foreach ($emails as $value) {

	    	//EMAILS OU EMAILS QUE VÃO RECEBER
	    	$to      = $value['email'];
	    	//ASSUNTO DO E-MAIL
			$subject = 'E-mail em massa';
			//MENSAGEM
			$message = utf8_decode('
		    <div style="width: 100%; height: 100%; background-color: #87CEFA;">
			    <div style="width: 90%; margin: auto;">
			        <br>
			        <h1>Notificação</h1>
			        <hr>
			        <br>
			       	<div style="width: 100%; height: 300px; background-color: #fff; overflow: auto;">
			       		<span style="font-size: 18px;">
			       		'.$mensagem.'
			       		</span>
			       	</div> 
			       	<br>
			       	<center>
			       		<a style="font-size: 20px; text-decoration: none;" href="https://www.albicod.com/" target="_blank">WWW.ALBICOD.COM</a>
			       	</center>           
			        <br><br><br>
			    </div>
			</div>');

			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// Additional headers
			$headers .= 'To: Thiago <thiagoalves@albicod.com>, Thiago <thiagoalves@albicod.com>' . "\r\n";
			$headers .= 'From: Thiago Alves <thiagoalves@albicod.com>' . "\r\n";
			$headers .= 'Cc: thiagoalves@albicod.com' . "\r\n";
			$headers .= 'Bcc: thiagoalves@albicod.com' . "\r\n";
			
			mail($to, $subject, $message, $headers);

			
			echo '<script>alert("Enviado com sucesso!");</script>';
			echo '<script>window.location.href="index.php";</script>';
	    }
	} catch (Exception $e) {
	    echo '<script>alert("E-mails não foram enviados!");</script>';
		echo '<script>window.location.href="index.php";</script>';
	}

}
?>