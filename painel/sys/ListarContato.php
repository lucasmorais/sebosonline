<?php 
  include('sys/class/crud/CrudContato.class.php');
  include('sys/include/redirecionar.php');				
?>  

<div id="geral">
<!-- Listar todos os administradores -->
 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir?')">
 <table id="rounded-corner" summary="Mostrar todos os administradores">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Email</th>
            <th scope="col" class="rounded">Assunto</th>
            <th scope="col" class="rounded">Data</th>
            <th scope="col" class="rounded-q4">Deletar</th>
        </tr>
    </thead>
         <tfoot>
    	<tr>
        	<td colspan="4" class="rounded-foot-left"><em>Total de 0 contatos feito pelo site.</em></td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
 
 <?php 
  
  //include('class/crud/ConsultaAdmin.class.php');
      $listarContato = new CrudContato();
	  if( $listarContato->listarContato()==0){
		
		echo 'Nenhum contato encontrado'; 
	  }else{
		  
		 $sql =  $listarContato->listarContato();
		 
		 while($qr = mysql_fetch_assoc($sql)){
			 
	   $listarContato->setIdContato($qr['id_contato']);
		 $listarContato->setEmail($qr['email']);
		 $listarContato->setAssunto($qr['assunto']);
		 $listarContato->setMensagem($qr['mensagem']);

  ?>
 <tr>
    <td><input type="checkbox" name="UIDL"/></td>
    <td><?php echo $listarContato->getEmail(); ?></td>
    <td><?php echo $listarContato->getAssunto(); ?></td>
    <td>00/00/0000</td>

    <td> 
     <input type="hidden" name="excluirContato" value="<?php echo $listarContato->getIdContato(); ?>" />
  	 <input type="image" src="images/icones/lixeira.png" />
    </td>
 </tr>
  <?php  
		}//fim do if
  	} //fim do while
  ?>
</table>
</form>

<a href="sys/tools/exportarcsv/exporta_contato_csv.php" class="bt_green"><span class="bt_green_lft"></span><strong>Exportar para CSV</strong><span class="bt_green_r"></span></a>
<a href="#" class="bt_blue" onclick="CheckAll()"><span class="bt_blue_lft"></span><strong>Selecionar todos</strong><span class="bt_blue_r"></span></a>
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Deletar selecionados</strong><span class="bt_red_r"></span></a> 
     
 <?php
 
  if(isset($_POST['excluirContato'])){
	  
	 $idContato =  $_POST['excluirContato'];
	 
	$excluirContato = new CrudContato();
   if ($excluirContato->apagarContatoPorId($idContato)==true){
	  
	  echo '<script> alert("Apagado com sucesso"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarContato") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao excluir"); </script>'; 
   }
	  
 }

 ?>

</div><!--geral-->
