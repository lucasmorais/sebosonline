<?php
	include('class/crud/CrudAfiliado.class.php');
    include('include/redirecionar.php');	
	
  $listarAfiliado = new CrudAfiliado();
  $idAdmin    = intval($_GET['id_admin']);
  
  if($listarAfiliado->listarAfiliadoPorId($idAdmin)==0 || $idAdmin == 0){
	 
	 echo 'Esse Afiliado não existe'; 
	 
  }else{
	  $sql = $listarAfiliado->listarAfiliadoPorId($idAdmin);
	  
	  $qr  = mysql_fetch_assoc($sql);
	  
		$nome = $qr['nome'];
		$cidade = $qr['cidade'];
		$estado = $qr['estado'];//$listarAfiliado->setEstado($_POST['estado']);
	    $endereco= $qr['endereco'];//$listarAfiliado->setEndereco($_POST['endereco']);
	    $numero = $qr['numero'];//$listarAfiliado->setNumero($_POST['numero']);
		$email = $qr['email'];//$listarAfiliado->setEmail($_POST['email']);	
		$senha = $qr['senha'];//$listarAfiliado->setSenha($_POST['senha']);
  }
 
?>


    <script>

	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		if (f.nome.value == '' || f.nome.length<4)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o Nome!!");
			f.nome.focus();
			return false;
		}
		
		
		if (f.email.value == '' || f.email.length<8)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o email!!");
			f.email.focus();
			return false;
		}
		
		             /*If Validando campo de e-mail*/	
		if (f.email.value.indexOf('@', 0) == -1 || f.email.value.indexOf('.', 0) == -1) {
     			 alert("Por favor, preencha corretamente o campo e-mail.");
      			 f.email.focus();
       			 return false;
 		   }
		   
		
		if (f.senha.value == '' || f.senha.length<4)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe a senha!!");
			f.usuario.focus();
			return false;
		}		
	}
</script>

<div id="geral">

<form method="post" id="formulario" enctype="multipart/form-data" onSubmit="javascript:return validar(this);">
  <fieldset>
  <legend>Editar Afiliado</legend>
  <label for="primeiro-nome">Nome</label>
  <input type="text" name="nome" id="nome" readonly="true" value="<?php echo $nome; ?>"/><br />
  
  <label for="cidade">Cidade</label>
  <input type="text" id="cidade" name="cidade" readonly="true" value="<?php echo $cidade; ?>"/><br />
  
  <label for="estado">Estado</label>
  <input type="text" id="estado" name="estado" value="<?php echo $estado; ?>"/><br />
  
  <label for="endereco">Endereço</label>
  <input type="text" id="endereco" name="endereco" value="<?php echo $endereco; ?>"/><br />
  
  <label for="numero">Numero</label>
  <input type="text" id="numero" name="numero" value="<?php echo $numero; ?>"/><br />
  
  <label for="email">Email</label>
  <input type="text" id="email" name="email" value="<?php echo $email; ?>"/><br />
  
  <label for="senha">Senha</label>
  <input type="password" id="senha" name="senha" value="<?php echo $senha; ?>"/><br />
  
  </fieldset>
  
  <input type="hidden" name="acao" />
  <input type="submit" id="button" class="botao azul" value="Editar"> 
</form>

     <?php

	if(isset($_POST['acao'])){
	
 $cadAfiliado = new CrudAfiliado();
 
			$idAdmin    = intval($_GET['id_admin']);
			$cadAfiliado->setNome($_POST['nome']);
			$cadAfiliado->setCidade($_POST['cidade']);
			$cadAfiliado->setEstado($_POST['estado']);
			$cadAfiliado->setEndereco($_POST['endereco']);
			$cadAfiliado->setNumero($_POST['numero']);
			$cadAfiliado->setEmail($_POST['email']);	
			$cadAfiliado->setSenha($_POST['senha']);
					
				$cadAfiliado->editarAfiliadoPorId($idAdmin);	
		}	
		   ?>

</div>