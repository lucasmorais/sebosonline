<?php
 include('class/crud/CrudCliente.class.php');
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
                    
            <label> Nome: </label>
           <input type="text" name="nome" /><br />
            
           <label> Imagem: </label>
           <input type="file" name="img" />
           <input type="hidden"  name="acao" /><br />
           
            <input type="submit" name="submit" id="button" class="botao azul" value="Cadastrar" />

  </form>
  </div>
     
<?php

 $cadCliente = new CrudCliente();
 $upload     = new Upload();
 
  if(isset($_POST['submit'])){
	  	 
	$imagem = $_FILES['img'];
	$upload->recebeImagem($imagem);
	
	if($upload->validarVazio()==true){
		
		if($upload->validarTamanho()==true){
			
		  if($upload->validarTipo()==true){
			  
			$upload->Redimensionar(250,150,'uploads/cliente/');
	        //recebe o nome da imagem para salvar
	        $img  = $upload->nome;
			
		 $cadCliente->setNome($_POST['nome']); 
		 $cadCliente->SetImagem($img);
		 

		//$cadProduto->setData(date("d/m/y"));
		//$hora = date("H:i:s");
		//$ip =  $_SERVER['REMOTE_ADDR'];
	
	     $cadCliente->cadastrarCliente($img);
  }
		}
	}  }
?>
	