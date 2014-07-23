<?php include("header.php"); ?>
<div class="global">
    <div class="container">
    <!-- <div style="margin-left: 30%; margin-bottom: 10px"><img src="banner.png"></div> -->
        <div class="row">
            <section class="col-lg-8 col-md-8 col-sm-98 libBox">
                <!-- <h2>RECOMMENDED BY OUR LIBRARIANS</h2>
                <a href="#">View more</a> -->
                <div class="row">


<?php
$sql = mysql_query("SELECT * FROM .produto  "); 
                    while($query = mysql_fetch_assoc($sql)){
                        $titulo = $query['titulo'];
                        $descricao = $query['descricao'];   
                        $preco = $query['preco'];   
                        $foto = $query['imagem'];
                        $idLivro = $query['id_produto'];         
                    
                    ?>

                    <article class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="thumb-pad2">
                            <div class="thumbnail">
                                <figure><img src="painel/uploads/produto/<?php echo $foto; ?>" alt=""></figure>
                                <div class="caption">
                                    <a href="detalhe.php?id=<?php echo $idLivro; ?>"><?php echo $titulo; ?></a>
                                    <br>
                                    <?php echo $descricao; ?></p>
                                    <p><strong> Valor : <?php echo 'R$'.money_format('%n', $preco); ?> </strong></p>
                                    <div class="botao" ><a href="detalhe.php?id=<?php echo $idLivro; ?>">Comprar</a></div>
                                </div>
                            </div>
                        </div>
                    </article>

<?php } ?>





                    
                </div>
            </section>
            <article class="col-lg-4 col-md-4 col-sm-4">
            <div class="lateralazul">
            <strong>Novos livros cadastrados </strong> 
            </div>
            <div class="lateral">
            <div>
                <table class="tabela2 table-striped table-hover">
                <?php
                $sql_aux_01 = mysql_query("SELECT * FROM produto LIMIT 10"); 
                while ($query_aux_01 = mysql_fetch_array($sql_aux_01)){
                    $idLivro = $query_aux_01['id_produto'];
                    $titulo = $query_aux_01['titulo'];
                ?>
                    <tr><td><a href="detalhe.php?id=<?php echo $idLivro; ?>"><?php echo $titulo; ?></a></td></tr>
                <?php
                }
                ?>
                </table>
            </div>
            </div>
            <div class="lateralcinza">
            <strong>Newsletter</strong>
            </div>
            <div class="lateral">
            <div class="input-group">
            <strong>Receba as Novidades em seu email</strong>
                <input type="text" class="form-control" placeholder="Nome">
                <input type="text" class="form-control" placeholder="Email">
            </div>
            </div>
            </article>
        </div>
    </div>
</div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>