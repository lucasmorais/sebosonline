<?php
	 include_once('sys/class/crud/CrudAdmin.class.php');
	 include('sys/include/redirecionar.php');
	 
	  if(isset($_POST['acao'])){
		 
		  $cadAdmin = new CrudAdmin();
		  
		 	$cadAdmin->setPrimeiroNome($_POST['primeiro-nome']);
			$cadAdmin->setUltimoNome($_POST['ultimo-nome']);
			$cadAdmin->setEmail($_POST['email']);
			$cadAdmin->setUsuario($_POST['usuario']);
			$cadAdmin->setSenha($_POST['senha']);
			
			
		  	$cadAdmin->cadastrarAdministrador();
		  }
		  
	  
?>


      <script>

	/*Funcao para validar campos vazios*/
	function validar(f)
	{
		if (f.primeiro-nome.value == '' || f.nome.length<4)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o primeiro nome ");
			f.nome.focus();
			return false;
		}
		
		if (f.seugundo-nome.value == '' || f.nome.length<4)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o segundao nome ");
			f.nome.focus();
			return false;
		}
		
		if (f.email.value == '' || f.email.length<8)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o email");
			f.email.focus();
			return false;
		}
		
		             /*If Validando campo de e-mail*/	
		if (f.email.value.indexOf('@', 0) == -1 || f.email.value.indexOf('.', 0) == -1) {
     			 alert("Por favor, preencha corretamente o campo e-mail.");
      			 f.email.focus();
       			 return false;
 		   }
		   
		
		if (f.usuario.value == '' || f.usuario.length<4)	/*Passa o nome do campo como parametro*/
		{
			window.alert("Informe o usuario");
			f.usuario.focus();
			return false;
		}		
	}
</script>


<div id="geral">
	<h3><center>CADASTRAR ADMINISTRADOR</center></h3></br></br></br>

     <form id="formulario" name="form1" method="post" onSubmit="javascript:return validar(this);">
          
           <label> Primeiro nome: </label>
           <input type="text" name="primeiro-nome" />
           
            <label> Último nome: </label>
           <input type="text" name="ultimo-nome" /><br />
           
            <label> E-mail: </label>
           <input type="text" name="email" /></br>
           
            <label> Usuario: </label>
           <input type="text" name="usuario" /><br />
           
            <label> Senha: </label>
           <input type="text" name="senha" /><br />
             
            <label> Nivel de Acesso:</label>
            <select name = "nivel_acesso"> 
		   <option value="1">Administrador</option>
			</select></br></br></br></br>
            
            
           <input type="hidden"  name="acao" />
           <label>
           <input type="submit"  id="btn1"  value="Cadastrar" />
           </label>
          </form>
          
    </div>