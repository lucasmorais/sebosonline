<?php 
    date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ativação</title>

  <meta name="description" content="">
  <meta name="abstract" content="">
  <meta name="keywords" content="">
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

<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3><!-- pode ser exibido uma mensagem na box de login digitando o texto aqui --></h3>
         
         Ativação do Painel<br>
         O desenvolvedor requer a ativação deste produto para verificar se sua instalação foi feita utilizando metodos genuíno.<br>
         A ativação é totalmente necessario para a utilização do sistema em questão, verifique seu e-mail em busca da chave de ativação<br>
         e se você não possui uma chave de ativação a mesma pode ser comprada utilizando o botão "comprar" logo abaixo.

         <form action="#" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="key">Chave:</label></dt>
                        <dd><input type="text" name="key" id="" size="54" /></dd>
                    </dl>
                   
                    
                     <dl class="submit">
                        <input type="hidden" name="acao" />
                    <input type="submit" name="submit" id="submit" value="Comprar" />


                    <input type="hidden" name="acao" />
                    <input type="submit" name="submit" id="submit" value="Ativar" />
                     </dl>
                    
                </fieldset>

         </form>
         </div>  
          
	
    
    <div class="footer_login">
    
    	<div class="left_footer_login">Painel Administrativo Versão 0.2</div>
    	<div class="right_footer_login"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>