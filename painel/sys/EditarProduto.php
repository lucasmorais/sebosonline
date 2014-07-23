<?php
 include('class/crud/CrudProduto.class.php');
 include('class/upload/MultiploadProduto.class.php');
 include('class/upload/Upload.class.php');
 include('include/redirecionar.php'); 
?>

<?php
  if(isset($_POST['addImagem'])){
    
	$imagem = $_FILES['foto'];
	$idProduto = intval($_GET['id_produto']);
	$MultiUpload = new MultiuploadProduto($imagem);
	$MultiUpload->setIdProduto($idProduto);
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
	  
	   	$editarProduto = new CrudProduto();
  
		$idProduto = intval($_GET['id_produto']);
		$editarProduto->setEstante($_POST['Estante']); 
		$editarProduto->setTitulo($_POST['titulo']);
		$editarProduto->setAutor($_POST['autor']);
		$editarProduto->setEditora($_POST['editora']);
		$editarProduto->setAno($_POST['ano']);
		$editarProduto->setDescricao($_POST['descricao']);  
		$editarProduto->setIdioma($_POST['idioma']); 
		$editarProduto->setPreco($_POST['preco']); 
		 
	  
	  	$editarProduto->tratarDados();
	  	$editarProduto->editarProdutoPorId($idProduto);
  }
?>

<?php
  $listarProduto = new CrudProduto();
  $idProduto     = intval($_GET['id_produto']);
  
  if($listarProduto->listarProdutoPorId($idProduto)==0){
	 
	 echo 'Esse produto não existe!!'; 
	 
  }else{
	  $sql = $listarProduto->listarProdutoPorId($idProduto);
	  
	  $qr  = mysql_fetch_assoc($sql);
	  
	    $estante =  $qr['estante'];
	    $titulo = $qr['titulo'];
		$autor = $qr['autor'];
		$editora = $qr['editora'];
		$ano = $qr['ano'];
		$descricao = $qr['descricao'];
		$idioma = $qr['idioma'];
		$preco = $qr['preco'];		
		
		
		
		 
  }
?>

<script>

	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		
		if (f.img.value == '')	/*Passa o nome do campo como parametro*/
		{
			window.alert("Selecione uma imagem");
			f.img.focus();
			return false;
		}	
	}
	
	
         /*Funcao para validar imagens nos formatos jpg, gif e jpeg*/	
	function validarImagem(img){
		img = img.toLowerCase();
		var arrExt = new Array();
		arrExt     = img.split(".");
		var ext    = arrExt[ arrExt.length - 1 ]
		if ((ext != 'jpg')&&(ext != 'gif')&&(ext != 'jpeg')){
			
			window.alert('Selecione uma imagem válida!!');
			return false;
		}else{
			return true;
		}
	}

</script>





<div id="geral">

     <form id="formulario" name="form1" method="post" enctype="multipart/form-data">
                    
            <label> Titulo: </label>
           <input type="text" name="titulo" value="<?php echo $titulo; ?>"/><br />
		   
		    <label> Autor: </label>
           <input type="text" name="autor" value="<?php echo $autor; ?>"/><br />
           
            <label> Estante: </label>
           <input type="text" name="estante" value="<?php echo $estante; ?>"/><br />
		   
		    <label> Editora: </label>
           <input type="text" name="editora" value="<?php echo $editora; ?>"/><br />
		   
		    <label> Idioma: </label>
           <input type="text" name="idioma" value="<?php echo $idioma; ?>"/><br />
           
           <label> Preço: </label>
           <input type="text" name="preco" value="<?php echo $preco; ?>"/><br /<br /><br />
           
		    <label> Descrição: </label><br/>
            <textarea name="descricao" cols="" rows="5"><?php echo $descricao; ?></textarea>
            <script type="text/javascript">CKEDITOR.replace('descricao');</script><br /><br /><br />
			
			
			
            <fieldset>
  			<legend>Editar perfil do produto</legend>
            <label> Imagem: </label>
           <input type="file" name="img" />
           <input type="hidden"  name="acao" /><br />
           </fieldset>

            <input type="submit" name="submit" id="button" class="botao azul" value="Cadastrar" />

  </form>

  















 
 <?php
    
	if(isset($_POST['apagarImagem'])){
		
	  $idImagem = intval($_POST['apagarImagem']);
	  
	  $apagarImagem = new MultiuploadProduto("");
	  
	  $idProduto = intval($_GET['id_produto']);
	   if($apagarImagem->apagarImagem($idImagem,$idProduto) > 0){
		   
		  $sql = $apagarImagem->apagarImagem($idImagem,$idProduto);
	   } 
	} 
  ?>









 </div> <!-- fim da fiv geral -->

	