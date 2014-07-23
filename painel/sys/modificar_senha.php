<?php session_start();
/*
	 if(!isset($_GET['pag'])){
		if(!isset($_SESSION['admin'])){
	   	   header("Location:index.php?acao=erro&acesso=negado");
		}
     }*/

	if(isset($_POST['acao'])){
		
		include('class/AlterarSenha.class.php');
	
		$alterar = new AlterarSenha($_POST['senha'], $_POST['re_senha'], $_SESSION['admin']);
		$alterar->validar();
	
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=latin1" />

<title>- MR IMPERMEABILIZA&Ccedil;&Otilde;ES -</title>
<link href="estilos/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="300" align="center" valign="middle" bgcolor="#E5E5E5">
    <form id="form1" name="form1" method="post" action="">
      <p>
        <label>Redefina sua Senha</label>
      </p>
      <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" class="border-login">
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td width="74" height="30" align="left" valign="middle" style="padding-left:6px;">Senha:</td>
          <td width="276" height="30" align="left" valign="middle"><label for="login"></label>
            <input name="re_senha" type="password" class="campo_fomrs" id="re_senha" maxlength="20" style="width:220px;"/></td>
        </tr>
        <tr>
          <td height="30" align="left" valign="middle" style="padding-left:6px;">Repita a Senha:</td>
          <td height="30" align="left" valign="middle">
          	<input name="senha" type="password" class="campo_fomrs" id="senha" maxlength="12" style="width:220px;"/></td>
        </tr>
        <tr>
          <td height="30">&nbsp;</td>
          <td height="30" align="left" valign="bottom">
          <input type="hidden"  name="acao" />
          <input type="submit" name="button" id="button" value="Enviar" style="background-color:#FF0; color:#333; font-weight:bold; border:dotted 1px #333; height:25px; width:60px; line-height:25px; font-size:12px; font-family:Arial, Helvetica, sans-serif;"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="left" valign="middle">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="center" bgcolor="#CCCCCC"><a href="#" style="color:#333; text-decoration:none;">Desenvolvimento de Sites &amp; Sistemas: LISTAC</a></td>
  </tr>
</table>
</body>
</html>
