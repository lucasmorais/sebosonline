<?php
  if(isset($_POST['addImagem'])){
    
	$imagem = $_FILES['foto'];
	$idPagina = intval($_GET['id_pagina']);
	$MultiUpload = new MultiUpload($imagem);
	$MultiUpload->setIdPagina($idPagina);
	$MultiUpload->contar();

	if($MultiUpload->validarVazio()==true){
	  $MultiUpload->validarTipo();
	  $MultiUpload->receberImagens();
	  $MultiUpload->exibirMensagem();
	}
  }
?>

<?php  
  //editar página
  if(isset($_POST['submit'])){
	  
	   	$editarPagina = new CrudPagina();
  
		$idPagina = intval($_GET['id_pagina']);
		$editarPagina->setTitulo($_POST['titulo']); 
		$editarPagina->setResumo($_POST['resumo']); 
		$editarPagina->setConteudo($_POST['descricao']); 
	  
	  	$editarPagina->tratarDados();
	  	$editarPagina->editarPagina($idPagina);
  }
?>

    <script>
	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		if (f.titulo.value == '' )	
		{
			window.alert("Informe o titulo ");
			f.titulo.focus();
			return false;
		}		   
		
		if (f.descricao.value == '' )	
		{
			window.alert("Informe a descrição");
			f.descricao.focus();
			return false;
		}
		
			
	}
	</script>

<div id="geral">

<?php
	$idPagina = intval($_GET['id_pagina']);
   	$buscarPagina = new CrudPagina();

    if($buscarPagina->buscarPaginaPorId($idPagina)==0){
        
        echo 'Nenhuma página encontrada'; 
                        
    }else{
          
    	$sql = $buscarPagina->buscarPaginaPorId($idPagina);
    	$qr  = mysql_fetch_assoc($sql);
         
        $buscarPagina->setIdPagina($qr['id_pagina']);
      	$buscarPagina->setTitulo($qr['titulo']);
      	$buscarPagina->setResumo($qr['resumo']);
      	$buscarPagina->setConteudo($qr['conteudo']);
?>

   
   <form method="post" id="formulario" enctype="multipart/form-data" onSubmit="javascript:return validar(this);">
                    
            <label> Titulo: </label>
           <input type="text" name="titulo" value="<?php echo $buscarPagina->getTitulo(); ?>"/><br />

            <label> Resumo: </label>
           <input type="text" name="resumo" value="<?php echo $buscarPagina->getResumo(); ?>"/><br />
           
            <textarea name="descricao" cols="" rows="5"><?php echo $buscarPagina->getConteudo(); ?></textarea>
            <script type="text/javascript">CKEDITOR.replace('descricao');</script>
            
            <input type="submit" name="submit" id="button" class="botao azul" value="Salvar" />

  </form>

 <?php
 	}//fim else
 ?>









<div class="listarImagem">

<?php
 $listarImagem = new MultiUpload(""); 
 $idPagina = intval($_GET['id_pagina']);
 
 //verifica se existem imagens, relacionadas a esse id da página
 if($listarImagem->listarImagem($idPagina) == 0){
	 
	echo 'Essa página não possui imagens'; 
	
 }else{
 
	 $sql = $listarImagem->listarImagem($idPagina);
	 
	 while($qr = mysql_fetch_assoc($sql)){
		 
	 $listarImagem->setIdImagem($qr['id_imagem']);
	 $listarImagem->setImagem($qr['imagem']);
?>

 <form method='post' enctype='multipart/form-data' onSubmit="return confirm('Apagar essa Imagem?');">
 
 <input type="hidden" name="apagarImagem" value="<?php echo $listarImagem->getIdImagem(); ?>" />
	<div class="miniatura">
        <button  type="submit" name="apagaImagem">
            X 
        </button> 
       <img src="uploads/imagem/miniatura/<?php echo $listarImagem->getImagem();?>"  width="140" height="100" />
       
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
	  
	  $apagarImagem = new MultiUpload("");
	  
	  $idPagina = intval($_GET['id_pagina']);
	   if($apagarImagem->apagarImagem($idImagem,$idPagina) > 0){
		   
		  $sql = $apagarImagem->apagarImagem($idImagem,$idPagina);
	   } 
	} 
  ?>




<div class="add-fotos">
  
  <form method="post" enctype="multipart/form-data">
  
  <input type="file" title="enviar fotos" id="env-foto" name="foto[]" multiple="multiple">
  <input type="hidden" name="addImagem">
  <input type="submit" value="enviar"id="btn1">
  
  </form>

</div><!-- listar e adicionar imagens a uma página -->






 </div> <!-- fim da fiv geral -->