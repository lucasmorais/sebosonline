<?php
 include('class/crud/CrudProduto.class.php');
 include('class/upload/Upload.class.php');
 include('include/redirecionar.php');
 
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
			
			window.alert('Selecione uma imagem válida');
			return false;
		}else{
			return true;
		}
	}

</script>





<div id="geral">

     <form id="formulario" name="form1" method="post" enctype="multipart/form-data">
         
		   
		   <label> Grupo: </label>
           <!--<input type="text" name="id_tipo" /><br />-->
		   <select name = "estante"> 
		   <option value="1">Livro</option>
		   <option value="2">Revista</option>
		   <option value="3">Gibi</option>
		   <option value="4">DVD</option> 
		   <option value="5">CD</option> 			
		   <option value="6">VHS</option>
		   <option value="7">Disco de Vinil</option>
 		   </select><br />
	
	       <label> Codigo de Barra: </label>
           <input type="text" name="cod_barra" /><br />
		   
		    <label> Quantidade: </label>
           <input type="text" name="quantidade" /><br />
		   
		   <label> Autor: </label>
           <input type="text" name="autor" /><br />
		   
		   <label> Editora: </label>
           <input type="text" name="editora" /><br />
		   
		   <label> Ano: </label>
           <input type="text" name="ano" /><br />
		   
		   <label> Preço: </label>
           <input type="text" name="preco" /><br />
		   
		   
		   <label> Titulo: </label>
           <input type="text" name="titulo" /><br />
		 
           <label> Descrição: </label><br />	
           <textarea name="descricao" cols="" rows="5"></textarea>
           <script type="text/javascript">CKEDITOR.replace('descricao');</script><br />
		   
           <label> Peso: </label>
           <input type="text" name="peso" /><br />
		   
		   <label> idioma: </label>
		   <select name = "idioma">
		   <option value="vazio"></option>
		   <option value="1">Alemão</option>
		   <option value="2">Chinês</option>
		   <option value="3">Coreano</option>
		   <option value="4">Espanhol</option> 
		   <option value="5">Francês</option> 			
		   <option value="6">Hebraico</option>
		   <option value="7">Holandês</option>
		   <option value="8">Inglês</option>
		   <option value="9">Italiano</option>
		   <option value="10">Japonês</option>
		   <option value="11">Português</option>
		   <option value="12">Russo</option>
 		   </select><br />
           
		   
		   <label> Tipo: </label>
           <select name = "tipo"> 
		   <option value= "vazio"></option>
		   <option value= "1">Novo</option>
		   <option value= "2">Seminovo</option>
		   <option value= "3">Usado</option>
 		   </select><br />
		   
		   
           
		   <label> Imagem: </label>
           <input type="file" name="img" />
           <input type="hidden"  name="acao" /><br />
           
           <input type="submit" name="submit" id="button" class="botao azul" value="Cadastrar" />

  </form>
  </div>
     
<?php

 $cadProduto = new CrudProduto();
 $upload     = new Upload();
 
  if(isset($_POST['submit'])){
	  	 
	$imagem = $_FILES['img'];
	$upload->recebeImagem($imagem);
	
	if($upload->validarVazio()==true){
		
		if($upload->validarTamanho()==true){
			
		  if($upload->validarTipo()==true){
			  
			$upload->Redimensionar(250,150,'uploads/produto/');
	        //recebe o nome da imagem para salvar
	        $img  = $upload->nome;
		 
		 $cadProduto->setIdTipo($_POST['estante']);
		 $cadProduto->setTitulo($_POST['titulo']); 	    
		 $cadProduto->setDescricao($_POST['descricao']);
		 $cadProduto->setIdTipo($_POST['id_tipo']); 
		 $cadProduto->setPreco(str_replace(",", ".", $_POST['preco']));
		 $cadProduto->SetImagem($img);
		 

		//$cadProduto->setData(date("d/m/y"));
		//$hora = date("H:i:s");
		//$ip =  $_SERVER['REMOTE_ADDR'];
	
	     $cadProduto->cadastrarProduto($img);
  }
		}
	}  }
?>
	