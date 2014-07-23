<?php
	include('class/crud/CrudAdmin.class.php');
    include('include/redirecionar.php');	
	
  $listarAdmin = new CrudAdmin();
  $idAdmin     = intval($_GET['id_admin']);
  
  if($listarAdmin->listarAdminPorId($idAdmin)==0 || $idAdmin == 0){
	 
	 echo 'Esse administrador não existe'; 
	 
  }else{
	  $sql = $listarAdmin->listarAdminPorId($idAdmin);
	  
	  $qr  = mysql_fetch_assoc($sql);
	  
		$listarAdmin->setPrimeiroNome($qr['primeiro_nome']);
		$listarAdmin->setUltimoNome($qr['ultimo_nome']);
		$listarAdmin->setEmail($qr['email']);
		$listarAdmin->setUsuario($qr['usuario']);
		$listarAdmin->setSenha($qr['senha']);
		  
  }
 
?>


    <script>

	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		
		if (f.nome.value == '' )	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o nome ");
			f.nome.focus();
			return false;
		}
		
		if (f.email.value == '' )	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o email ");
			f.email.focus();
			return false;
		}
		
		
		if (f.email.value.indexOf('@', 0) == -1 || f.email.value.indexOf('.', 0) == -1) {
     			 alert("Por favor, preencha corretamente o campo e-mail.");
      			 f.email.focus();
       			 return false;
 		   }
		
		
		if (f.usuario.value == '')	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o login ");
			f.usuario.focus();
			return false;
		}
	}


</script>

<div id="geral">

<form method="post" id="formulario" enctype="multipart/form-data" onSubmit="javascript:return validar(this);">
  <fieldset>
  <legend>Editar administrador</legend>
  <label for="primeiro-nome">Primeiro nome</label>
  <input type="text" name="primeiro-nome" id="primeiro-nome" readonly="true" value="<?php echo $listarAdmin->getPrimeiroNome(); ?>"/><br />
  
  <label for="ultimo-nome">Ultimo nome</label>
  <input type="text" id="ultimo-nome" name="ultimo-nome" readonly="true" value="<?php echo $listarAdmin->getUltimoNome(); ?>"/><br />
  
  <label for="email">Email</label>
  <input type="text" id="email" name="email" value="<?php echo $listarAdmin->getEmail(); ?>"/><br />
  
  <label for="usuario">Usuario</label>
  <input type="text" id="usuario" name="usuario" value="<?php echo $listarAdmin->getUsuario(); ?>"/><br />
  
  <label for="senha">Senha</label>
  <input type="password" id="senha" name="senha" value="<?php echo $listarAdmin->getSenha(); ?>"/><br />
  
  </fieldset>
  
  <input type="hidden" name="acao" />
  <input type="submit" id="button" class="botao azul" value="Editar"> 
</form>

     <?php

	if(isset($_POST['acao'])){
	
 $cadAdmin = new CrudAdmin();
 
			$idAdmin    = intval($_GET['id_admin']);
			$cadAdmin->setPrimeiroNome($_POST['primeiro-nome']);
			$cadAdmin->setUltimoNome($_POST['ultimo-nome']);
			$cadAdmin->setEmail($_POST['email']);
			$cadAdmin->setUsuario($_POST['usuario']);
			$cadAdmin->setSenha($_POST['senha']);
					
				$cadAdmin->editarAdminPorId($idAdmin);	
		}	
		   ?>

</div>