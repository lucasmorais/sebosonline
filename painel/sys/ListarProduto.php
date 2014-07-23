<?php 
  include('sys/class/crud/CrudProduto.class.php');
  include('sys/include/redirecionar.php');				
?>  

<div id="geral">
<!-- Listar todos os administradores -->
 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir?')">
 <table id="rounded-corner" summary="Mostrar todos os administradores">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Titulo</th>
            <th scope="col" class="rounded">Estante</th>
            <th scope="col" class="rounded">Preço</th>
            
        </tr>
    </thead>
        <!-- <tfoot>
    	<tr>
        	<td colspan="5" class="rounded-foot-left"><em>Total de 0 produtos cadastrados.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>-->
    <tbody>
 
 <?php 
  
  //include('class/crud/ConsultaAdmin.class.php');
  	  $cont = '0';
      $listarProduto = new CrudProduto();
	  if( $listarProduto->listarProduto()==0){
		
		echo 'Nenhum produto encontrado!!'; 
	  }else{
		  
		 $sql =  $listarProduto->listarProduto();
		 
		 while($qr = mysql_fetch_assoc($sql)){
			 
	     $listarProduto->setIdProduto($qr['id_produto']);
		 $listarProduto->setTitulo($qr['titulo']);
		 $listarProduto->setEstante($qr['estante']);
		 $listarProduto->setPreco($qr['preco']);

  ?>
 <tr>
    <td><input type="checkbox" name="UIDL"/></td>
    <td><?php echo $listarProduto->getTitulo(); ?></td>
    <td><?php echo $listarProduto->getEstante(); ?></td>
    <td><?php echo $listarProduto->getPreco(); ?></td>

    <td><a href="?pag=EditarProduto&id_produto=<?php echo $listarProduto->getIdProduto(); ?>"><img src="images/icones/editar-conteudo.png"></a> </td>
    <td> 
     <input type="hidden" name="excluirProduto" value="<?php echo $listarProduto->getIdProduto(); ?>" />
  	 <input type="image" src="images/icones/lixeira.png" />
    </td>
 </tr>
  <?php  
  	$cont++;
		}//fim do if
  	} //fim do while
  ?>
   <tfoot>
      <tr>
          <td colspan="5" class="rounded-foot-left"><em>Total de <?php echo $cont; ?> produtos cadastrados.</em></td>
          <td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>

  </tbody>
</table>
</form>

<a href="?pag=CadastrarProduto" class="bt_green"><span class="bt_green_lft"></span><strong>Adicionar novo</strong><span class="bt_green_r"></span></a>
<a href="#" class="bt_blue" onclick="CheckAll()"><span class="bt_blue_lft"></span><strong>Selecionar todos</strong><span class="bt_blue_r"></span></a>
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Deletar selecionados</strong><span class="bt_red_r"></span></a> 
     
 <?php
 
  if(isset($_POST['excluirProduto'])){
	  
	 $idProduto =  $_POST['excluirProduto'];
	 
	$excluirProduto = new CrudProduto();
   if ($excluirProduto->excluirProdutoPorId($idProduto)==true){
	  
	  echo '<script> alert("Excluido com sucesso!!"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarProduto") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao excluir!"); </script>'; 
   }
	  
 }

 ?>

</div><!--geral-->
