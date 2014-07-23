<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

   if(!isset($_SESSION['admin'])){
	  header("Location:index.php?acao=erro&acesso=negado");
   }
   
 //Inclui a classe de conexão
 include('sys/class/conn/Conexao.class.php');
 include('sys/class/ValidarId.class.php');
 
 
$Conexao = new Conexao();
$Conexao->conectar();
$ValidarId = new ValidarId(); 

$idAdmin = $_SESSION['idAdmin'];
$nomeUsuario = $_SESSION['admin'];
 
   if(isset($_GET['pag'] ) && $_GET['pag'] == 'sair'){
	   
	    unset($_SESSION['admin']);
	    session_destroy();
		echo "<script> window.location.replace('login.html');</script>";
		//header("Location:index.php");  
   }
?>
<?php 
    //Inclui de classes
    include('sys/class/crud/CrudPagina.class.php');  
    include('sys/class/upload/MultiUpload.class.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <?php
                $sql = mysql_query("SELECT * FROM configuracao WHERE id_site='1' ");
        
                $qr  = mysql_fetch_assoc($sql);
        
                    $nome = $qr['nome'];
                    $URL = $qr['url'];
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
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<script type="text/javascript" src="js/clockp.js"></script>
<script type="text/javascript" src="js/clockh.js"></script> 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript" src="sys/ckeditor/ckeditor.js"></script>

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

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.png" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Bem-vindo(a) <?php echo $nomeUsuario; ?> , <a href="http://<?php echo $URL; ?>" target="_blank">Site</a> | <a href="http://host.tiagoabreu.com/etc/apps/webmail/">E-mail</a> | <a href="?pag=sair" class="logout">Sair</a></div>
    <div id="clock_a"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a class="current" href="painel.php">Inicio</a></li>
                   
                    <!--<li><a class="sub2" href="#">Páginas</a>
                        <ul>
                    <?php
                        $listarPagina = new CrudPagina();

                        if($listarPagina->listarPagina()==0){
        
                            echo 'Nenhuma página encontrada'; 
                        
                        }else{
          
                            $sql = $listarPagina->listarPagina();
         
                        while($qr = mysql_fetch_assoc($sql)){
             
                            $listarPagina->setIdPagina($qr['id_pagina']);
                            $listarPagina->setTitulo($qr['titulo']);
                    ?>
                        <li><a href="?pag=EditarPagina&id_pagina=<?php echo $listarPagina->getIdPagina(); ?>"><?php echo $listarPagina->getTitulo(); ?></a></li>
                    <?php
                        }//fim while
                        }//fim else
                    ?>
                        <li><a href="?pag=CadastrarPagina"><img src="images/icones/adicionar.png">Adicionar página</a></li>
                        </ul>
                    </li>-->
                    
                        <!-- <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]
                 <!-- </li> -->
                 
                    <!-- <li><a href="login.html">Manage Users<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                       <!--  <ul>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        <li><a class="sub1" href="" title="">sublevel2<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                         <!--    <ul>
                                <li><a href="" title="">sublevel link</a></li>
                                <li><a href="" title="">sulevel link</a></li>
                                <li><a class="sub2" href="#nogo">sublevel3<!--[if IE 7]><!--></a><!--<![endif]-->
                        
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                 <!--    <ul>
                                        <li><a href="#nogo">Third level-1</a></li>
                                        <li><a href="#nogo">Third level-2</a></li>
                                        <li><a href="#nogo">Third level-3</a></li>
                                        <li><a href="#nogo">Third level-4</a></li>
                                    </ul>
                        
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                              <!--   </li>
                                <li><a href="" title="">sulevel link</a></li>
                            </ul>
                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                      <!--   </li>
                    
                         <li><a href="" title="">Lorem ipsum dolor sit amet</a></li>
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]
                 <!-- </li> -->
                   
                    <!--<li><a href="?pag=EditarConfig">Configurações</a></li>
                    <li><a href="?pag=EditarTextAux&id_pagina=1">Auxiliar</a></li>-->
                   
                    </ul>
                    </div> 
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		<div class="sidebar_search">
            <form>
            <!-- <input type="text" name="" class="search_input" value="Digite algo pesquisar" onclick="this.value=''" /> -->
            <!-- <input type="image" class="search_submit" src="images/search.png" /> -->
            </form>            
            </div>
    
            <div class="sidebarmenu">
                <?php
               // $afiliado = $_SESSION['idAfiliado']; $sql = mysql_query("SELECT nivel_acesso FROM Afiliado WHERE id_afiliado = '$afiliado'");   
                // $qr = mysql_fetch_array($sql); 
               // $nivelAcesso = $qr['nivelAcesso'];

               
                $sql = mysql_query("SELECT nivel_acesso FROM administrador WHERE id_admin = '$idAdmin'");   
                $qr = mysql_fetch_array($sql); 
                $nivelAcesso = $qr['nivel_acesso']; ?>
                <?php
                if($nivelAcesso == "1"){ ?>
                
            
                <a class="menuitem submenuheader" href="">Usuario</a>
                <div class="submenu">
                    <ul>
                    <li><a href="?pag=ListarAdmin">Administrador</a></li>
					<li><a href="?pag=ListarAfiliado">Afiliado</a></li>
					<li><a href="?pag=ListarCliente">Cliente</a></li>
                    <!-- <li><a href="">Cliente</a></li> -->
                    <!-- <li><a href="">Membro</a></li> -->
                    <!-- <li><a href="">Parceiro</a></li> -->
                    </ul>
                </div>
               
                <?php 
                } else {
                ?>
                
                <a class="menuitem submenuheader" href="" >Conteudo</a>
                <div class="submenu">
                    <ul>
                    <!-- <li><a href="?pag=ListarBanner">Banner</a></li> -->
                   
                     <!--<li><a href="?pag=ListarAlbum">Galeria</a></li> -->
                    
                     <!--<li><a href="?pag=ListarAlbumVideo">Videos</a></li> -->
                     <!--<li><a href="?pag=ListarNoticia">Noticia</a></li>-->
                    <li><a href="?pag=ListarProduto">Produto</a></li>
                    </ul>
                </div>
                 <?php 
                } 
                ?>
                <!--<a class="menuitem submenuheader" href="">Contato</a>
                <div class="submenu">
                    <ul>
                    <li><a href="?pag=ListarContato">Contato</a></li> 
                    <li><a href="?pag=ListarContatoParceiro">Parceiro</a></li>
                    <!-- <li><a href="?pag=ListarContatoSugestao">Sugestão</a></li> 
                    </ul>
                </div>
                <a class="menuitem" href="">Referencia ao Usuario</a>-->
                
                <!-- <a class="menuitem" href="">Blue button</a> -->     
                <!-- <a class="menuitem_green" href="">Green button</a> -->
                <!-- <a class="menuitem_red" href="">Red button</a> -->
                    
            </div>
             
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>Ajuda ao usuario</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <p>
                Logo acima se encontra o "Referencia do Usuario" onde você pode solucionar erros apartir do Codigo de Erro disponivel nas mensagens mostradas a você.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            
             
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h5>Backup do site</h5>
                <img src="images/photo.png" alt="" title="" class="sidebar_icon_right" />
                <p>
                Faça backup completo do seu site (Codigo Fonte + Banco de Dados) sempre que for fazer manutenção em suas paginas.<br><a href="#">Iniciar backup automatico</a>
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div> 
            
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h4>Aviso importante</h4>
                <img src="images/notice.png" alt="" title="" class="sidebar_icon_right" />
                <p>
                Esse Painel Administrativo esta em fase de desenvolvimento, em caso de se encontrar algum erro por favor reportar o problema para: contato@tiagoabreu.com
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
           <!-- <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>Painel v1.0</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li>Você esta utilizando a versão 1.0 do painel criado especialmente para você</li>
                </ul>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div> -->
              
    
    </div>  
    
    <div class="right_content">            
        
  	<?php
		   
		     //inclui a classe que trata a url para incluir as páginas
			 include('sys/class/IncluiPagina.class.php');
			 
			 //isntância o objeto
			 $incluirPagia = new IncluiPagina();
			 
			 
			  if(isset($_GET['pag'])){
				  
				 $pag = $_GET['pag'];
				 
			     $incluirPagia->abrirPag($pag);
			   
			  }
 
		   ?>
   
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<div class="left_footer">Painel Administrativo do Sebos Online <?php echo $nome; ?></div>
    	<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

</div>		
</body>
</html>