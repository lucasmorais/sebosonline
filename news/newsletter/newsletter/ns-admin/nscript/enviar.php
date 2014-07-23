<?php

include "../Connections/config.php";

$conexao = mysql_connect($hostname_config, $username_config, $password_config)
           or die(mysql_error());
$db = mysql_select_db($database_config)
           or die(mysql_error());

?>
<ul>
<span style="font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#005789; font-weight:bold; font-variant:small-caps;">
Pacotes enviados para:
</span>
<?php
$assunto   = $_POST['assunto'];
$mensagem  = $_POST['mensagem'];

if(empty($assunto)){
	$msn_erro = 'Digite o assunto!<br />';
}elseif(empty($mensagem)){
	$msn_erro = 'Faltou a mensagem!<br />';
}if(empty($msn_erro)){


$get_email = mysql_query("SELECT email FROM ns_cadastro WHERE status = 'ativo' GROUP BY email");
$contar_email = mysql_num_rows($get_email);

if($contar_email <= '0'){
	$msn_erro = 'Erro ao selecionar emails! Tente mais tarde...';
}else{
	
	while($res_email = mysql_fetch_array($get_email)){
		
		$email = $res_email[0];
?>




<li>
<?php
        $codigo = md5($email);
		$data = date('d/m/Y H:i');
		$msn = $mensagem;
		$msn .= "
		<br />
        <br />
        <table width=\"500\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">
        <tr>
        <td style=\"font:14px Georgia, 'Times New Roman', Times, serif; color:#333; text-align:center;\">
        Este e-mail foi enviado pelo sistema de newsletter da <strong>UpInside</strong><br />
        Se não deseja mais receber nosso emails de boletim 
		<a href=\"http://www.upinside.com.br/newsletter/remove.php?email=$email&amp;codigo=$codigo\">Clique Aqui</a>
		<br />
        <br />
        Enviado em: $data
        </td>
        </tr>
        </table>
		";
		
		$para = 'bb@upinside.com.br';
		
		$headers = "From: $para\n";
		$headers .= "Content-Type: text/html; charset=\"utf-8\"\n\n";
		
		mail($email,$assunto,$msn,$headers);
		
		echo "&raquo; $email";

?>
</li>

<?php } } } ?>

<?php if(isset($msn_erro)){
	echo "<li style=\"color:#900;\">$msn_erro</li>";
	echo "<button id=\"voltar\" style=\"cursor:pointer;\">Voltar</button>";
}else{
    echo "<li style=\"font-size:20px; font-variant:small-caps; color:#093;\">Envio com Sucesso!</li>";
	echo "<br /><table width=\"500\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\"><tr><td style=\"font:14px Georgia, 'Times New Roman', Times, serif;
	      color:#333; text-align:center;\">Seus pacotes foram entregues com sucesso! em: $data</td></tr></table>";
} ?>
</ul>


