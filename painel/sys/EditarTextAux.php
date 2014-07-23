<?php
    include('include/redirecionar.php');	
	
  $listarPagina = new CrudPagina();
  $idPagina     = intval($_GET['id_pagina']);
  
  if($listarPagina->listarTextAuxPorId($idPagina)==0){
	 
	 echo 'Essa pagina não existe'; 
	 
  }else{
	  $sql = $listarPagina->listarTextAuxPorId($idPagina);
	  
	  $qr  = mysql_fetch_assoc($sql);
	  
		$listarPagina->setTextAux1($qr['text_aux1']);
		$listarPagina->setTextAux2($qr['text_aux2']);
		$listarPagina->setTextAux3($qr['text_aux3']);
		$listarPagina->setTextAux4($qr['text_aux4']);	  
  }
 
?>


    <script>

	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		
	
	}


</script>

<div id="geral">

<form method="post" id="formulario" enctype="multipart/form-data" onSubmit="javascript:return validar(this);">
  <fieldset>
  <legend>Texto auxiliar da pagina inicial</legend>
  <label for="text_aux1">Produtos</label>
  <input type="text" name="text_aux1" id="text_aux1" value="<?php echo $listarPagina->getTextAux1(); ?>"/><br />
  
  <label for="text_aux2">Novidades</label>
  <input type="text" id="text_aux2" name="text_aux2" value="<?php echo $listarPagina->getTextAux2(); ?>"/><br />
  
  <label foer="text_aux3">Galeria</label>
  <input type="text" id="text_aux3" name="text_aux3" value="<?php echo $listarPagina->getTextAux3(); ?>"/><br />
  
  <label for="text_aux4">Contato</label>
  <input type="text" id="text_aux4" name="text_aux4" value="<?php echo $listarPagina->getTextAux4(); ?>"/><br />
  
  </fieldset>
  
  <input type="hidden" name="acao" />
  <input type="submit" id="button" class="botao azul" value="Editar"> 
</form>

     <?php
	if(isset($_POST['acao'])){
	
 	$editarPagina = new CrudPagina();
 
			$idPagina    = intval($_GET['id_pagina']);
			$editarPagina->setTextAux1($_POST['text_aux1']);
			$editarPagina->setTextAux2($_POST['text_aux2']);
			$editarPagina->setTextAux3($_POST['text_aux3']);
			$editarPagina->setTextAux4($_POST['text_aux4']);	
					
			$editarPagina->editarTextoAuxPorId($idPagina);	
		}	
	?>

</div>