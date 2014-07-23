<?php

 include('class/upload/MultiploadGaleriaBanner.class.php');
 include('class/upload/Upload.class.php');
 include('include/redirecionar.php'); 
?>

<?php
  if(isset($_POST['addImagem'])){
    
	$imagem = $_FILES['foto'];
	$idBanner = intval($_GET['id_banner']);
	$MultiUpload = new MultiuploadGaleriaBanner($imagem);
	$MultiUpload->setIdBanner($idBanner);
	$MultiUpload->contar();

	if($MultiUpload->validarVazio()==true){
	  $MultiUpload->validarTipo();
	  $MultiUpload->receberImagens();
	  $MultiUpload->exibirMensagem();
	}
  }
?>

    <script>
	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		
		
			
	}
	</script>

<div id="geral">


<div class="add-fotos">
  
  <form method="post" enctype="multipart/form-data">
  
  <input type="file" title="enviar fotos" id="env-foto" name="foto[]" multiple="multiple">
  <input type="hidden" name="addImagem">
  <input type="submit" value="enviar"id="btn1">
  
  </form>

</div><!-- listar e adicionar imagens a uma página -->










<div class="listarImagem">

<?php
 $idBanner = intval($_GET['id_banner']);
 $listarImagem = new MultiuploadGaleriaBanner(""); 
 
 if($listarImagem->listarImagem($idBanner) == 0){
	 
	echo 'Esse banner não possui imagens'; 
	
 }else{
 
	 $sql = $listarImagem->listarImagem($idBanner);
	 
	 while($qr = mysql_fetch_assoc($sql)){
		 
	 $listarImagem->setIdImagem($qr['id_imagem']);
	 $listarImagem->setImagem($qr['imagem']);
?>

 <form method='post' enctype='multipart/form-data' onSubmit="return confirm('Apagar essa Imagem?');">
 
 <input type="hidden" name="apagarImagem" value="<?php echo $listarImagem->getIdImagem(); ?>" />
	<div class="miniatura">

		<button  type="button" name="editarImagem" onclick="window.location.href='?pag=EditarBannerGaleriaImagem&id_imagem=<?php echo $listarImagem->getIdImagem();?>'" style="margin-left: 75px;">
         Editar
        </button>

        <button  type="submit" name="apagaImagem">
            X 
        </button> 
       <img src="uploads/banner/miniatura/<?php echo $listarImagem->getImagem();?>"  width="140" height="100" />
       
      </div><!--miniatura-->
         
   </form>

 <?php
	 }//fim while
 	}//fim else
 ?>
</div><!--listar-fotos-->  
 
 
 <?php
    
	if(isset($_POST['apagarImagem'])){
		
	  $idImagem = intval($_POST['apagarImagem']);
	  
	  $apagarImagem = new MultiuploadGaleriaBanner("");
	  
	  $idBanner = intval($_GET['id_banner']);
	   if($apagarImagem->apagarImagem($idImagem,$idBanner) > 0){
		   
		  $sql = $apagarImagem->apagarImagem($idImagem,$idBanner);
	   } 
	} 
  ?>






 </div> <!-- fim da fiv geral -->