 <!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
<?php
  require('class/crud/CrudPaginas2.class.php');
  require('class/crud/CrudSubPaginas2.class.php');
 ?>
 
 <div id="geral">
 <!--menu titulação-->  
  <div > 
  <div id="listar" style="min-width: 270px;" >
  Nome da Pagina
  </div>
  <div  id="listar" style="min-width: 200px;">
  Ação
  </div>  <!--fim menu titulação-->  
  
  
  <!--listar-videos-->  
  <div id="clear"></div>
</div> 

<?php
$listarPagina = new CrudPaginas2();
 
 if($listarPagina->listarPaginas()==0){
	
	echo 'Nenhuma pagina encontrada'; 
	
 }else{
	 
	 $sql = $listarPagina->listarPaginas();
	 
	 while($qr = mysql_fetch_assoc($sql)){
      
	 $listarPagina->setId($qr['id']);
	 $listarPagina->setTitulo($qr['titulo']);
	 $idPagina =  $listarPagina->setId($qr['id']);
	 
?>

 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir esse video?')">
  
  <div id="listar" style="min-width: 270px;" >
  <input style="min-width: 250px;" name="video" disabled="disabled" value="<?php echo $listarPagina->getTitulo(); ?>" type="text" />
  </div>
  
  <div id="listar" style="min-width: 60px;"> 
  <a href="?pag=edit-pagina&id=<?php echo $listarPagina->getId(); ?>">Editar</a>
  </div>
   <div id="listar" >
   <input type="hidden" name="excluirPagina" value="<?php echo $listarPagina->getId(); ?>" />
  <input style="float: left;" type="image" src="icones/error2.png" />
  </div>
  
<!-- fim listar-videos-->  
<div id="clear"></div>
</form>

<?php
	
 }//fim ultimo while
 }//fim else
?>




<?php
$listarSubPagina = new CrudSubPaginas2();
 
 if($listarSubPagina->listarSubPaginas()==0){
	
	echo 'Nenhuma sub pagina encontrada'; 
	
 }else{
	 
	 $sql = $listarSubPagina->listarSubPaginas();
	 
	 while($qr = mysql_fetch_assoc($sql)){
      
	 $listarSubPagina->setId($qr['id']);
	 $listarSubPagina->setTitulo($qr['titulo']);
	 $idSubPagina =  $listarSubPagina->setId($qr['id']);
	 
?>

 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir esse video?')">
  
  <div id="listar" style="min-width: 270px;" >
  <input style="min-width: 250px;" name="video" disabled="disabled" value="<?php echo $listarSubPagina->getTitulo(); ?>" type="text" />
  </div>
  
  <div id="listar" style="min-width: 60px;"> 
  <a href="?pag=EditSubPagina&id=<?php echo $listarSubPagina->getId(); ?>">Editar</a>
  </div>
   <div id="listar" >
   <input type="hidden" name="excluirSubPagina" value="<?php echo $listarSubPagina->getId(); ?>" />
  <input style="float: left;" type="image" src="icones/error2.png" />
  </div>
  
<!-- fim listar-videos-->  
</form>

<?php
	
 }//fim ultimo while
 }//fim else
?>

  
 </div><!--geral-->
 
 <?php
 
  //apagar videos por id
  
  if(isset($_POST['excluirSubPagina'])){
	  
	 $idSubPagina =  $_POST['excluirSubPagina'];
	 
	$apaga2 = new CrudSubPaginas2();
   if ($apaga2->apagarSubPagina($idSubPagina)==true){
	  
	  echo '<script> alert("Pagina apagado com sucesso"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarPagina") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao apagar pagina"); </script>'; 
   }
	  
 }

 ?>
 <!-- -->
 <?php
 
  //apagar videos por id
  
  if(isset($_POST['excluirPagina'])){
	  
	 $idPagina =  $_POST['excluirPagina'];
	 
	$apaga = new CrudPaginas2();
   if ($apaga->apagarPagina($idPagina)==true){
	  
	  echo '<script> alert("Pagina apagado com sucesso"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarPagina") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao apagar pagina"); </script>'; 
   }
	  
 }

 ?>
 
 
 
 
 
 
 


 
 
 
 
 