<?php
include('class/upload/Upload.class.php');
include('class/crud/CrudCliente.class.php');
include('include/redirecionar.php');
	
  $listarCliente = new CrudCliente();
  $idCliente     = intval($_GET['id_cliente']);
  
  if($listarCliente->listarClientePorId($idCliente)==0){
	 
	 echo 'Nenhuma informação encontrada'; 
	 
  }else{
	  $sql = $listarCliente->listarClientePorId($idCliente);
	  
	  $qr  = mysql_fetch_assoc($sql);
	  
		$listarCliente->setNome($qr['nome']);
		$listarCliente->setEmail($qr['email']);
		$listarCliente->setTelefone($qr['telefone']);
		$listarCliente->setCep($qr['cep']);
		$listarCliente->setSenha($qr['senha']);
	
  }
?>

  <script>
	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		
		if (f.nome.value == '')	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o nome ");
			f.nome.focus();
			return false;
		}

	}
</script>
  
 
 <form method="post" id="formulario" enctype="multipart/form-data" onSubmit="javascript:return validar(this);">
 
 <label>Nome:</label>
 <input type="text" name="nome" value="<?php echo $listarCliente->getNome(); ?>">
 <br>
 
 <label>Email:</label>
 <input type="text" name="nome" value="<?php echo $listarCliente->getEmail(); ?>"  /> 
 <br>

 <label>Telefone:</label>
 <input type="text" name="nome" value="<?php echo $listarCliente->getTelefone(); ?>"  /> 
 <br>
 
 <label>CEP:</label>
  <input type="text" name="nome" value="<?php echo $listarCliente->getCep(); ?>"  /> 
 <br>

 <label>Senha:</label>
  <input type="text" name="nome" value="<?php echo $listarCliente->getSenha(); ?>"  /> 
 <br>

  <input type="hidden" name="acao">
  <input type="submit" value="atualizar">
 </form>

 <!-- Faz a alteração se o usuario quizer mudar a foto -->
<?php
$cadCliente = new CrudCliente();
$upload    = new Upload();
 
 //quer atualizar,trocando a imagem
 if(isset($_POST['acao']) && !empty($_FILES['img']['name'])){
    
  $imagem = $_FILES['img'];
  $upload->recebeImagem($imagem);
  
  if($upload->validarVazio()==true){
    
    if($upload->validarTamanho()==true){
      
      if($upload->validarTipo()==true){
       
       //recebe o nome da imagem para salvar
      $upload->Redimensionar(250,250, 'uploads/cliente/');
      $img  = $upload->nome;
      $idCliente     = intval($_GET['id_cliente']);

      $cadCliente->setNome($_POST['nome']);
      $cadCliente->setImagem($img);

      $cadCliente->editarComImg($idCliente);

       }
    }
    }
  }
  
  
?>

<!-- Faz a alteração apenas se o usuario quizer mudar o nome -->
 <?php

  if(isset($_POST['acao'])){
  
 $editarCliente = new CrudCliente();
 
      $idCliente    = intval($_GET['id_cliente']);
      $editarCliente->setNome($_POST['nome']);
          
         $editarCliente->editarClientePorId($idCliente);  
    } 
       ?>