<?php include("header.php"); ?>
<?php
$idLivro = $_GET['id'];
$sql = mysql_query("SELECT * FROM .produto where id_produto = '$idLivro'  "); 
                    $query = mysql_fetch_assoc($sql);
                        $titulo = $query['titulo'];
                        $descricao = $query['descricao'];   
                        $preco = $query['preco'];   
                        $foto = $query['imagem'];       
?>
<div class="global">
    <div class="container">
        <div class="row">
            <article class="col-lg-8 col-md-8 col-sm-8 libBox">
                <div class="thumb-pad3 maxheight">
                            <div class="thumbnail">
                                <figure><img src="painel/uploads/produto/<?php echo $foto; ?>" alt=""></figure>
                                <div class="caption">
                                    <?php echo $titulo; ?>
                                    <br>
                                    <hr>
                                    <p><?php echo $descricao; ?><br><br></p>
                                </div>
                            </div>
                        </div>
            </article>
            <article class="col-lg-4">
                <div class="thumb-pad4">
                    <div class="thumbnail">
                        <div class="caption">
                            <strong><h1><?php echo 'R$'.money_format('%n', $preco); ?></h1></strong>
                            <br>
                            <div class="btn-default btn2"><a href="carrinho.php">Comprar</a></div>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="thumb-pad4">
                <div class="thumbnail">
                        <div class="caption">
                    <p>Dados da livraria</p>
                    </div>
                    </div>
                </div>
            </article>
            <div class="clearfix"></div>
            <article class="col-lg-12 col-md-12 col-sm-12">
            <h2>Outros Livros Indicados <a href="#"> Veja mais Livros</a></h2>
            </article>
        </div>
    </div>
</div>
<!--footer-->
<?php include("footer.php"); ?>