<?php

include "../Connections/config.php";

$conexao = mysql_connect($hostname_config, $username_config, $password_config)
           or die(mysql_error());
$db = mysql_select_db($database_config)
           or die(mysql_error());

?>
<span style="font-size:18px; font-variant:small-caps; text-align:center; margin:10px 0; color:#0C0;">

<?php
$email   = $_POST['email'];

$limpar = mysql_query("DELETE FROM ns_cadastro WHERE email = '$email'");

echo "O Email <strong>";
print $email;
echo "</strong> foi excluido com sucesso do sistema!";
echo "<a href=\"g_email.php\" style=\"text-align:center; padding:5px; margin:30px auto; display:block; width:150px; text-decoration:none; border:1px solid #ccc; color:#005789; font-variant:small-caps;\">Voltar</a>";
?>
</span>




