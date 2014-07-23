<?php require_once('Connections/config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "painel.php";
  $MM_redirectLoginFailed = "index2.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_config, $config);
  
  $LoginRS__query=sprintf("SELECT login, senha FROM ns_usuarios WHERE login=%s AND senha=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UpInside Ns-Newsletter</title>
<style type="text/css">
#box{width:300px; height:150px; margin:150px auto; background:#f8f8f8; border:1px solid #666; padding:10px;}
form{padding:5px 10px; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; font-variant:small-caps;}
label{display:block;}
span{display:block; margin:5px 0; font:14px "Trebuchet MS", Arial, Helvetica, sans-serif; color:#005789; font-weight:bold; font-variant:small-caps;}
input{padding:5px; border:1px solid #666; width:270px;}
.btn{width:100px; display:block; margin:5px auto; cursor:pointer; font-variant:small-caps;}
.copy{font:12px "Trebuchet MS", Arial, Helvetica, sans-serif; font-variant:small-caps; color:#ccc; float:right;}
</style>
</head>

<body>
<div id="box">
<form name="login" action="<?php echo $loginFormAction; ?>" method="POST">
    <label>
      <span>Usuário:</span>
      <input type="text" name="usuario" />
    </label>
    
    <label>
      <span>Senha:</span>
      <input type="password" name="senha" />
    </label>
    
    <input type="submit" name="logar" value="Logar" class="btn"/>
    
    </form>
    <span class="copy">Up-NsNewsletter</span>
  

</div><!--box-->
</body>
</html>