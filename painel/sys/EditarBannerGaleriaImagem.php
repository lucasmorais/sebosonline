<?php
include('class/crud/CrudBanner.class.php');
include('include/redirecionar.php');
	
  $listarBanner = new CrudBanner();
  $idImagem     = intval($_GET['id_imagem']);
  
  if($listarBanner->listarImagemPorId($idImagem)==0){
	 
	 echo 'Nenhuma imagem encontrada'; 
	 
  }else{
	  $sql = $listarBanner->listarImagemPorId($idImagem);
	  
	  $qr  = mysql_fetch_assoc($sql);
	  
		$listarBanner->setImagem($qr['imagem']);
    $listarBanner->setLink($qr['link']);
  }
?>

  <script>
	/*Funcao para validar campos vazios*/
	function validar(f)
	{

	}
</script>
  
 
 <form method="post" id="formulario" enctype="multipart/form-data" onSubmit="javascript:return validar(this);">
 
 <label> </label>
 <img src="uploads/banner/miniatura/<?php echo $listarBanner->getImagem(); ?>" width="100" height="100" /> 
 <br>

   <label> Link: </label>
   <input type="text" name="link" maxlength="300" value="<?php echo $listarBanner->getLink(); ?>"/>
   <br>

  <input type="hidden" name="acao">
  <input type="submit" class="botao azul" value="atualizar">
 </form>


<!-- Faz a alteração apenas se o usuario quizer mudar o titulo e a descricao -->
 <?php

  if(isset($_POST['acao'])){
  
 $editarBanner = new CrudBanner();
 
      $idImagem    = intval($_GET['id_imagem']);
      $editarBanner->setLink($_POST['link']);
          
      $editarBanner->editarImagemPorId($idImagem);  
    } 
       ?>