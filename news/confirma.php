<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmar UP Newsletter</title>
<?php include "config.php";?>
</head>

<body>
<?php
$email = $_GET['email'];
$codigo = $_GET['codigo'];

$verifica_codigo = mysql_query("SELECT email FROM ns_cadastro WHERE codigo = '$codigo'");
$contar_codigo = mysql_num_rows($verifica_codigo);

if($contar_codigo <= '0'){
	$erro = "<h1 style=\"text-align:center; color:#900; padding:10px; font-variant:small-caps;\">ERRO - Código e ou email não cadastrados!</h1>";
}else{
	
	   $confirma = mysql_query("UPDATE ns_cadastro SET status = 'ativo' WHERE codigo = '$codigo'")
                  or die(mysql_error());
			
if ($confirma >= '1'){
	$erro = "<h1 style=\"text-align:center; color:#369; padding:10px; font-variant:small-caps;\">
         Seu E-mail foi confirmado com sucesso! Bem vindo(a) ao nosso boletim!
          </h1>";


        $data = date('d/m/Y H:i');
        $msn = "
		
		<strong>Parabéns, seu cadastro foi realizado com sucesso!</strong>
		<br />
        <br /> 
        Obrigado por se cadastrar em nosso boletim. a equipe <strong>UpInside agradece!</strong>
		<br />
        <br />
        Enviado em: $data
		
		
		";

        $para = 'bb@upinside.com.br';
		$assunto = 'Assinatura de Up boletim concluida';
		
		$headers = "From: $para\n";
		$headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
		
		mail($email,$assunto,$msn,$headers);

  }
 }

?>
<?php echo $erro; ?>
<h2 style="color:#F60; font-variant:small-caps; text-align:center;">UpInside Tecnologia - Todos os Direitos Reservados!</h2>
<div style="text-align:center;">
<a href="http://www.upinside.com.br" style="color:#005789; font-variant:small-caps;">VOLTE AO SITE!</a>
</span>
</body>
</html>