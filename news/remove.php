<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
include "config.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmar cadastro</title>
</head>


<body>
<?php
$email = $_GET['email'];
$codigo = $_GET['codigo'];

$confirma = mysql_query("DELETE FROM ns_cadastro WHERE codigo = '$codigo'")
            or die(mysql_error());
			
if($confirma <= '0'){
	echo "erro ao remover seu cadastro tente novamente!";
}else{
	echo "Seu email foi removido com sucesso :(";


        $data = date('d/m/Y H:i');
        $msn = "
		
		<strong>Recebemos a solicitação de exclusão do seu cadastro!</strong>
		<br />
        <br /> 
        Estamos informando que a mesma foi realizada com sucesse. a equipe UpInside agradece!
		<br />
        <br />
        Removido em: $data
		
		
		";

        $para = 'contato@upinside.com.br';
		$assunto = 'Cancelamento de boletim concluido';
		
		$headers = "From: $para\n";
		$headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
		
		mail($email,$assunto,$msn,$headers);

}

?>


</body>
</html>