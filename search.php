<?php include("header.php"); ?>

<div class="global">
    <div class="container">
        <div class="row">
            <section class="col-lg-3 col-md-3 col-sm-3">
            <div class="locationBox">
                <h3><span class="fa fa-map-marker"></span>Buscar nos Resultados</h3>
                <div class="combobox">
                    <select>
                        <option value="volvo">Todos</option>
                        <option value="volvo">Autor</option>
                        <option value="saab">Titulo</option>
                        <option value="mercedes">Editora</option>
                        <option value="audi">Descrição</option>
                    </select>
                </div>
            </div>
            <div class="locationBox">
                <h3><span class="fa fa-map-marker"></span>Ordenar por:</h3>
                <div class="combobox">
                    <select>
                        <option value="volvo">Menor Preço</option>
                        <option value="volvo">Maior Preço</option>
                        <option value="saab">Titulo (A-Z)</option>
                        <option value="mercedes">Autor (A-Z)</option>
                        <option value="audi">Ano Decre.</option>
                        <option value="audi">Ano Cresc.</option>
                        <option value="audi">Ultimo Cadas.</option>
                        <option value="audi">Vendedor</option>
                    </select>
                </div>
            </div>
                <div class="locationBox">
                    <h3><span class="fa fa-map-marker"></span>Filtrar por Preços</h3>
                    <li><a href="#">Até R$ 5,00</a></li>
                    <li><a href="#">Até R$ 10,00</a></li>
                    <li><a href="#">Até R$ 20,00</a></li>
                    <li><a href="#">Até R$ 40,00</a></li>
                </div>
                <div class="locationBox">
                    <h3><span class="fa fa-marker"></span>Filtrar por Cidade</h3>
                    <li><a href="#">Ourinhos</a></li>
                    <li><a href="#">São Paulo</a></li>
                    <li><a href="#">Outra</a></li>
                    <li><a href="#">Outra</a></li>
                </div>
                <div class="locationBox">
                    <h3><span class="fa fa-map-marker"></span>Filtrar por Frete Gratis</h3>
                   
                </div>
                <div class="locationBox">
                    <h3><span class="fa fa-map-marker"></span>Filtrar por Ultimos Adicionados</h3>
                   
                </div>
                <div class="locationBox">
                    <h3><span class="fa fa-map-marker"></span>Filtrar por Ano</h3>
                    
                </div>
                <div class="locationBox">
                    <h3><span class="fa fa-map-marker"></span>Filtrar por Vendedor</h3>
                  
                </div>
            </section>
            <article "col-lg-9 col-md-9 col-sm-9">
                <div class="row">
                <div>
                    <table class="tabela table-striped table-hover">
                    <?php
$busca = $_GET['s'];
$sql = mysql_query("SELECT * FROM produto where titulo like '%$busca%'  "); 
                    while($query = mysql_fetch_assoc($sql)){
                        $titulo = $query['titulo'];
                        $ano = $query['ano'];
                        $idEstante = $query['id_estante'];
                        $editora = $query['editora']
                        $preco = $query['preco'];
                        $idLivro = $query['id_produto']; 

                        $sql = mysql_query("SELECT * FROM estante where id_estante = '$idEstante'"); 
                    $query = mysql_fetch_assoc($sql);
                        $nomeEstante = $query['estante'];
?>
                        <tr><td><a href="detalhe.php?id=<?php echo $idLivro; ?>"><?php echo $titulo.' '.$ano.' '.$nomeEstante.' '.$preco.' '.$editora; ?><a></td></tr>
                        <?php } ?>
                    </table>
                </div>
                </div>
            </article>

            <div class="clearfix"></div>
            
        </div>
    </div>
</div>
<!--footer-->
<?php include("footer.php"); ?>
