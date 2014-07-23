<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index2.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UpInside Ns-Newsletter</title>
<style type="text/css">
#box{width:750px; height:520px; margin:20px auto;;}
#painel{width:750px; height:500px; background:#f8f8f8; border:1px solid #666; padding:10px; overflow:auto; overflow-x:hidden;}
#painel ul{list-style:none; margin:0; padding:0;}
#painel ul li{margin:3px 0;}
.copy{font:12px "Trebuchet MS", Arial, Helvetica, sans-serif; font-variant:small-caps; color:#ccc; float:right;}
#nav{height:40px;}
#nav a{text-decoration:none; color:#005789; font-variant:small-caps; padding:5px; border:1px solid #666; background:#fff;}
#nav a:hover{background:#FFDBB7;}
fieldset{margin:0 10px; padding:10px; font-weight:bold; text-transform:uppercase; color:#F90;}
label{display:block; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#666; font-variant:small-caps; text-transform:none;}
span{display:block; margin:5px 0;}
input{padding:5px; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#666; width:700px;}
textarea{padding:5px; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#666; width:700px;}
.btn{color:#333; font-variant:small-caps; width:100px; display:block; margin:5px auto; border:1px solid #666; cursor:pointer; text-align:center;}
</style>

<script type="text/javascript" src="js/jquery.js"/></script>
<script type="text/javascript">

  $(function(){
	$("#enviar").click(function(){
	   $("#pacotes").fadeOut("slow");
	   beforeSend:$("#carregando").fadeIn("slow");
	   
	     var assunto  = $("#assunto").val();
		 var mensagem = $("#mensagem").val();
		 $.post("nscript/enviar.php",{assunto: assunto, mensagem: mensagem}, function(resposta){
			
			complete:$("#carregando").fadeOut("slow");
			$("#retorno").fadeIn("slow").html(resposta);
			
			  $("#voltar").click(function(){
					
					$("#retorno").fadeOut("slow").html(resposta);
					$("#pacotes").fadeIn("slow");
										
			  });  
		 });
    });
  });
</script>

</head>
<body>
<div id="box">
  <div id="painel">
    
    <div id="nav"><a href="painel.php">Enviar Pacotes</a> | <a href="g_email.php">Gerenciar</a> | <a href="<?php echo $logoutAction ?>">Deslogar</a></div>
    
    <div id="carregando" style="display:none; font-variant:small-caps;">
    <img src="imgs/ajax-loader.gif" /> Aguarde: As Mensagems estão sendo enviadas!
    <span style="color:#900; font-weight:bold; font-size:20px;">&raquo; Não feche a página!</span></div><!--carregando-->
    <div id="retorno"></div>
    
      <div id="pacotes">
      <fieldset><legend>Enviar Pacotes</legend>
      <label>
        <span>Assunto:</span>
        <input type="text" id="assunto"/>
      </label>
      
      <label>
        <span>Mensagem (HTML):</span>
        <textarea id="mensagem" rows=13"></textarea>
      </label>
      <input type="submit" id="enviar" value="Enviar Pacote" class="btn" />
      
      </fieldset>      
      </div><!--pacotes-->
      
  
  </div><!--painel-->
<span class="copy">Up-NsNewsletter</span>
</div><!--box-->

</body>
</html>








