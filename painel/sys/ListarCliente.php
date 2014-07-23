<?php 
  include('sys/class/crud/CrudCliente.class.php');
  include('sys/include/redirecionar.php');				
?>  

<div id="geral">
<!-- Listar todos os administradores -->
 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir?')">
 <table id="rounded-corner" summary="Mostrar todos os clientes">
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
      $listarCliente = new CrudCliente();
	  if($listarCliente->listarClienteOrdenadoPorNome()==0){
		
		echo 'Nenhum cliente encontrado'; 
	  }else{
		  
		 $sql =  $listarCliente->listarClienteOrdenadoPorNome();
		 
		 while($qr = mysql_fetch_assoc($sql)){
			 
	     $listarCliente->setIdCliente($qr['id_cliente']);
		 $listarCliente->setNome($qr['nome']);
		 
		 
		 

  ?>
 <tr>
    <td><input type="checkbox" name="UIDL"/></td>
    <td><?php echo $listarCliente->getNome(); ?></td>

    <td><a href="?pag=EditarCliente&id_cliente=<?php echo $listarCliente->getIdCliente(); ?>"><img src="images/icones/editar-conteudo.png"></a> </td>
    <td> 
     <input type="hidden" name="excluirCliente" value="<?php echo $listarCliente->getIdCliente(); ?>" />
  	 <input type="image" src="images/icones/lixeira.png" />
    </td>
 </tr>
  <?php  $cont ++;
		}//fim do if
  	} //fim do while
  ?>
  <tfoot>
      <tr>
          <td colspan="3" class="rounded-foot-left"><em>Total de <?php echo $cont; ?> clientes cadastrados.</em></td>
          <td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>

  </tbody>

</table>
</form>

<!--<a href="?pag=CadastrarCliente" class="bt_green"><span class="bt_green_lft"></span><strong>Adicionar novo</strong><span class="bt_green_r"></span></a>-->
<a href="#" class="bt_blue" onclick="CheckAll()"><span class="bt_blue_lft"></span><strong>Selecionar todos</strong><span class="bt_blue_r"></span></a>
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Deletar selecionados</strong><span class="bt_red_r"></span></a> 
     
 <?php
 
  if(isset($_POST['excluirCliente'])){
	  
	 $idCliente =  $_POST['excluirCliente'];
	 
	$excluirCliente = new CrudCliente();
   if ($excluirCliente->excluirClientePorId($idCliente)==true){
	  
	  echo '<script> alert("Excluido com sucesso"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarCliente") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao excluir"); </script>'; 
   }
	  
 }

 ?>

</div><!--geral-->
