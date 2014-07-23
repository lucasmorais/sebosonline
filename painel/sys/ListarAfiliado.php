<?php 
  include('sys/class/crud/CrudAfiliado.class.php');
  include('sys/include/redirecionar.php');				
?>  

<div id="geral">
<!-- Listar todos os administradores -->
 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir?')">
 <table id="rounded-corner" summary="Mostrar todos os Afiliados">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Nome</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded-q4">Deletar</th>
        </tr>
    </thead>
         
    <tbody>
 
 <?php 
  
  //include('class/crud/ConsultaAdmin.class.php');
      $cont = '0';
      $listarAfiliado = new CrudAfiliado();
	  if($listarAfiliado->listarAfiliadoOrdenadoPorNome()==0){
		
		echo 'Nenhum Afiliado encontrado'; 
	  }else{
		  
		 $sql =  $listarAfiliado->listarAfiliadoOrdenadoPorNome();
		 
		 while($qr = mysql_fetch_assoc($sql)){
			 
	     //$listarAfiliado->setIdAdmin($qr['id_admin']);
		   $listarAfiliado->setNome($qr['nome']);

  ?>
 <tr>
    <td><input type="checkbox" name="UIDL"/></td>
    <td><?php echo $listarAfiliado->getNome(); ?></td>

    <td><a href="?pag=EditarAfiliado&id_afiliado=<?php echo $listarAfiliado->getIdAdmin(); ?>"><img src="images/icones/editar-conteudo.png"></a> </td>
    <td> 
     <input type="hidden" name="excluirAfiliado" value="<?php echo $listarAfiliado->getIdAdmin(); ?>" />
  	 <input type="image" src="images/icones/lixeira.png" />
    </td>
 </tr>
  <?php  $cont ++;
		}//fim do if
  	} //fim do while
  ?>
  <tfoot>
      <tr>
          <td colspan="3" class="rounded-foot-left"><em>Total de <?php echo $cont; ?> Afiliados cadastrados.</em></td>
          <td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>

  </tbody>

</table>
</form>

<a href="?pag=CadastrarAfiliado" class="bt_green"><span class="bt_green_lft"></span><strong>Adicionar novo</strong><span class="bt_green_r"></span></a>
<a href="#" class="bt_blue" onclick="CheckAll()"><span class="bt_blue_lft"></span><strong>Selecionar todos</strong><span class="bt_blue_r"></span></a>
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Deletar selecionados</strong><span class="bt_red_r"></span></a> 
     
 <?php
 
  if(isset($_POST['excluirAfiliado'])){
	  
	 $idAdmin =  $_POST['excluirAfiliado'];
	 
	$excluirAfiliado = new CrudAfiliado();
   if ($excluirAfiliado->excluirAfiliadoPorId($idAdmin)==true){
	  
	  echo '<script> alert("Afiliado excluido com sucesso!!"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarAfiliado") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao excluir afiliado!!"); </script>'; 
   }
	  
 }

 ?>

</div><!--geral-->
