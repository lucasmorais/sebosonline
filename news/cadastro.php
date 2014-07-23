<?php
include "config.php";
?>

<?php 
	
$email = strip_tags(trim($_POST['email']));

  if(empty($email)){
	 echo 'Informe seu email<br />';
	 echo "<button id=\"voltar\">Voltar</buttom>";
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	 echo 'Informe um email v&aacute;lido<br />';
	 echo "<button id=\"voltar\">Voltar</buttom>";
  }elseif(empty($erro)){
	  
	  
   echo "Cadastro com sucesso! confirme em seu email";
	 
	 $codigo = md5($email);
	 
	 $verifica = mysql_query("SELECT email FROM ns_cadastro WHERE email = '$email'") or die(mysql_error());
	 $contar_verifica = mysql_num_rows($verifica);
	 if($contar_verifica <= '0'){
	 
	 $cadastra = mysql_query("INSERT INTO ns_cadastro (email, codigo, status) VALUES ('$email','$codigo','inativo')")
	            or die(mysql_error());
				
	 $para = 'bb@upinside.com.br';
	 $assunto = 'Up - Nova Assinatura de boletim';
	 $data = date('d/m/Y H:i');
	 
	 $msn = "
		Olá <strong>$nome</strong>. Recebemos um pedido de cadastro do seu email em nosso boletim!
		<br />
        Para confirmar seu cadastro, por favor clique no link abaixo.
		<br />
        <br />
		<a href=\"http://www.upinside.com.br/newsletter/confirma.php?email=$email&amp;codigo=$codigo\">Confirmar Cadastro</a>
		<br />
        <br />
        Se você não cadastrou este pedido em nosso site, por favor ignore este email!
		<br />
		Atenciosamente <strong>UpInside Tecnologia</strong>
		<br />
        <br />
        Enviado em: $data
	 ";
	 
	 $headers = "From: $para\n";
	 $headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
	 
	 mail($email,$assunto,$msn,$headers);	
				
	 }else{	 
	 
	 $para = 'bb@upinside.com.br';
	 $assunto = 'Up - Nova Assinatura de boletim';
	 $data = date('d/m/Y H:i');
	 
	 $msn = "
		Olá <strong>$nome</strong>. Recebemos um pedido de cadastro do seu email em nosso boletim!
		<br />
        Para confirmar seu cadastro, por favor clique no link abaixo.
		<br />
        <br />
		<a href=\"http://www.upinside.com.br/newsletter/confirma.php?email=$email&amp;codigo=$codigo\">Confirmar Cadastro</a>
		<br />
        <br />
        Se você não cadastrou este pedido em nosso site, por favor ignore este email!
		<br />
		Atenciosamente <strong>UpInside Tecnologia</strong>
		<br />
        <br />
        Enviado em: $data
	 ";
	 
	 $headers = "From: $para\n";
	 $headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
	 
	 mail($email,$assunto,$msn,$headers);	

   }
 }
?>