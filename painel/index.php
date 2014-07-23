<?php session_start();
    date_default_timezone_set('America/Sao_Paulo');
    include('sys/class/conn/Conexao.class.php');
    
    include('sys/class/Login2.class.php');
    
    $Conexao = new Conexao();
    $Conexao->conectar();
    
    $longin2 = new Login2();
    if(isset($_POST['acao'])){
        
     $longin2->setUsuario($_POST['usuario']);
     $longin2->setSenha($_POST['senha']);
     
     if($longin2->validar()==false){
      echo "<h2 align='center' style='color:red'> Digite o login e a senha </h2>";
      
     }else{
         
         $longin2->tratarDados(); 
         
         /*é preciso verificar o status do usuário, pois a senha gerada quando
          ele é cadastrado, não é md5, só criptografa após o mesmo 
          mudar a senha
         */
         
         if($longin2->verificarStatus()==0){
          //redireciiona para mudar a senha
         echo "<script> window.location.replace('painel.php'); </script>";
         }else{
             
             //criptografa para pesquisar novamente
             $longin2->criptografarSenha();
         }
         
         if($longin2->pesquisarUsuario()==0){
             
          echo "<script> window.location.replace('index.php?acao=erro&acesso=negado'); </script>";
          
         }else{
             
             $sql = $longin2->pesquisarUsuario();
             $qr = mysql_fetch_assoc($sql);	 
             $_SESSION['admin']        = $longin2->getUsuario();
             $_SESSION['idAdmin']        = $qr['id_admin'];
             //$_SESSION['nivel_acesso'] = $qr['nivel_acesso'];
            echo "<script> window.location.replace('painel.php?pag=ListarAdmin'); </script>"; 
             }

     } 
        
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php
                $sql = mysql_query("SELECT nome FROM configuracao WHERE id_site='1' ");
        
                $qr  = mysql_fetch_assoc($sql);
        
                    $nome = $qr['nome'];
                ?>
<title>Painel <?php echo $nome; ?></title>

  <meta name="description" content="Painel administrativo privado">
  <meta name="abstract" content="">
  <meta name="keywords" content="Painel, Administrativo, Site">
  <meta name="author" content="Tiago Matos de Abreu">
  
  <meta name="robot" content="all">
  <meta name="rating" content="general">
  <meta name="distribution" content="global">
  <meta name="language" content="pt">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=divice=widht, initial=scale=1.0">

<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>

<script type="text/javascript" src="js/jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />

</head>
<body>
<?php 

 
    if(isset($_GET['acesso'])){
        
        echo '<h2 align="center" style="color:red">';
        echo'Acesso negado ip da origem:'.$_SERVER['REMOTE_ADDR'];
        echo '</h2>';
        
    }


?>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         <!-- pode ser exibido uma mensagem na box de login digitando o texto aqui -->
         <h3> Faça o Login para acessar o Painel</br></br></h3>
         
         <a href="#" class="forgot_pass">Esqueceu sua senha?</a> 
         
         <form action="index.php" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="email">Usuario:</label></dt>
                        <dd><input type="text" name="usuario" id="" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Senha:</label></dt>
                        <dd><input type="password" name="senha" id="" size="54" /></dd>
                    </dl>
                    
                    <dl>
                        <dt><label></label></dt>
                        <dd>
                    <!-- <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Remember me</label> -->
                        </dd>
                    </dl>
                    
                     <dl class="submit">
                    <input type="hidden" name="acao" />
                    <input type="submit" name="submit" id="submit" value="Entrar" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login">Painel Administrativo do Sebos Online<?php echo $nome; ?></div>
    	<div class="right_footer_login"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>
<?php
  
  $Conexao->fecharConexao();

?>