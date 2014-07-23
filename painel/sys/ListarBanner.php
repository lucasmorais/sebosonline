<?php 
  include('sys/class/crud/CrudBanner.class.php');
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
           <!--  <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded">Deletar</th> -->
            <th scope="col" class="rounded-q4">Visualizar</th>
        </tr>
    </thead>
       
    <tbody>
 
 <?php 
  
    $listarBanner = new CrudBanner();
    $cont = '0';
	  if($listarBanner->listarBanner()==0){
		
		echo 'Nenhum Banner encontrado'; 
	  }else{
		  
		 $sql = $listarBanner->listarBanner();
		 
		 while($qr = mysql_fetch_assoc($sql)){

	  $listarBanner->setIdBanner($qr['id_banner']);
		$listarBanner->setTitulo($qr['titulo']);

  ?>
 <tr>
    <td><input type="checkbox" name="UIDL"/></td>
    <td><?php echo $listarBanner->getTitulo(); ?></td>

    <!--<td><a href="?pag=EditarBanner&id_Banner=<?php echo $listarBanner->getIdBanner(); ?>"><img src="images/icones/editar-usuario.png"></a> </td>
    <td> 
     <input type="hidden" name="excluirBanner" value="<?php echo $listarBanner->getIdBanner(); ?>" />
  	 <input type="image" src="images/icones/lixeira.png" />
    </td> -->

    <td><a href="?pag=EditarBannerGaleria&id_banner=<?php echo $listarBanner->getIdBanner(); ?>"><img src="images/icones/visualizar.png"></a> </td>
 </tr>
  <?php 
      $cont++; 
		}//fim do if
  	} //fim do while
  ?>
  </tbody>

    <tfoot>
      <tr>
          <td colspan="2" class="rounded-foot-left"><em>Total de <?php echo $cont; ?> albuns.</em></td>
          <td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
</table>
</form>

<!-- <a href="?pag=CadastrarBanner" class="bt_green"><span class="bt_green_lft"></span><strong>Adicionar novo</strong><span class="bt_green_r"></span></a>
<a href="#" class="bt_blue" onclick="CheckAll()"><span class="bt_blue_lft"></span><strong>Selecionar todos</strong><span class="bt_blue_r"></span></a>
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Deletar selecionados</strong><span class="bt_red_r"></span></a> --> 
     
 <?php
 
  if(isset($_POST['excluirBanner'])){
	  
	 $idBanner =  $_POST['excluirBanner'];
	 
	$excluirBanner = new CrudBanner();
   if ($excluirBanner->excluirBannerPorId($idBanner)==true){
	  
	  echo '<script> alert("Excluido com sucesso"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarBanner") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao excluir"); </script>'; 
   }
	  
 }

 ?>

</div><!--geral-->
