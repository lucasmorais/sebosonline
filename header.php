<?php 
          //Faz a conexão com o banco de dados 
           mysql_connect('172.31.43.93', 'teste', '123') or die("Erro ao Conectar");
           mysql_select_db('zadmin_alcir') or die("Erro ao Selecionar Banco");
?>
<html lang="en">
<head>
<title>Sebos Online</title>
<meta charset="utf-8">    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
<meta name="description" content="Varios livros, e livrarias disponiveis online.">
<meta name="keywords" content="Sebos Online, livros, livrarias">
<meta name="author" content="SegCloud">
<meta name = "format-detection" content = "telephone=no" />
<!--CSS-->
<link rel="stylesheet" href="css/bootstrap.css" >
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="fonts/font-awesome.css">
<!--JS-->
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="js/jquery.mousewheel.min.js"></script>
<script src="js/jquery.touchSwipe.min.js"></script>
<script>
$(window).load(function() {
    $(function() {
            $('#foo1').carouFredSel({
				auto: false,
				responsive: true,
				width: '100%',
				scroll: 1,
                pagination  : "#foo2_pag",
				items: {
					height: 'auto',
					width:370,
					visible: {
						min: 1,
						max: 1
					}
				},
				mousewheel: true,
				swipe: {
					onMouse: true,
					onTouch: true
				}
			});
		}); 	 				
    });
</script> 
<!--[if lt IE 9]>
    <div style='text-align:center'><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>  
  <![endif]-->
  <!--[if lt IE 9]><script src="../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<!-- facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=380991862023064&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--header-->
<div>
<div class="faixatop">
</div>
<div class="menutop">
  <ul>
  <li><a href="quemsomos.php">Quem Somos</a></li>
  <li><a href="#">Sebos & Livreiros</a></li>
  <li><a href="/painel/">Área do Lojista</a></li>
  <li><a href="vacervos.php">Venda de Acervo</a></li>
  <li><a href="#">Fale Conosco</a></li>
  <li><a href="index.php">Home</a></li>
</ul>
</div>
<!-- <div class="container">
    <div class="row">
        <article class="col-lg-12 col-md-12 col-sm-12"> -->
            <header class="clearfix fundo3">
                <h1 class="navbar-brand navbar-brand_"><a href="index.php"><span style="font-family: 'logo';">Sebos<span style="font-family: 'logo';">Online.com</span></span></a></h1>
                <article class="col-lg-6 col-md-6">
                  <form id="search" class="search" action="search.php" method="GET" accept-charset="utf-8">
                  <input type="text" name="s" value="Pesquisa" onfocus="if (this.value == 'Pesquisa') {this.value=''}" onblur="if (this.value == '') {this.value='Pesquisa'}">
                  <a href="#" onClick="document.getElementById('search').submit()"><img src="img/magnify.png" alt=""></a>
            </form>
            </article>
               <ul class="head_list">
                    <li><a href="#openModal">Login</a></li>
                    <li><a href="carrinho.php">Carrinho de compras</a></li>
                </ul>
            </header>
            <div class="clearfix filtro">
            </div>
 <!--        </article>
    </div> -->
  <div id="openModal" class="modalDialog">
    <div>
      <a href="#close" title="Close" class="close">X</a>
        <form class="form-signin" role="form">
        <h2 class="form-signin-heading">Entrar no Sebos Online</h2>
        <input type="email" class="form-control" placeholder="Usuario" required autofocus>
        <input type="password" class="form-control" placeholder="Senha" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <button class="btn btn-lg btn-success btn-block" type="submit"><a href="cadcliente.php">Cadastrar</a></button>
      </form>
    </div>
</div>
</div>