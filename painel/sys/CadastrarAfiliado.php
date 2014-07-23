<?php
 include('class/crud/CrudAfiliado.class.php');

 include('include/redirecionar.php');
 	 
	   if(isset($_POST['acao'])){
		 
		  $cadAfiliado = new CrudAfiliado();
		  
		 	$cadAfiliado->setNome($_POST['nome']);
			$cadAfiliado->setCidade($_POST['cidade']);
		    $cadAfiliado->setEstado($_POST['estado']);
		    $cadAfiliado->setEndereco($_POST['endereco']);
		    $cadAfiliado->setNumero($_POST['numero']);
			$cadAfiliado->setEmail($_POST['email']);	
			$cadAfiliado->setSenha($_POST['senha']);
		  	$cadAfiliado->cadastrarAfiliado();
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
	<h3><center>CADASTRAR AFILIADO</center></h3></br></br></br>

     <form id="formulario" name="form1" method="post" onSubmit="javascript:return validar(this);">
          
           <label> Nome: </label>
           <input type="text" name="nome" />
           
            <label> Cidade: </label>
           <input type="text" name="cidade" /><br />
		   
            <label> Estado: </label>
           <input type="text" name="estado" />
		   
		    <label> Endereço: </label>
           <input type="text" name="endereco" /></br>
		    
			<label> Numero: </label>
           <input type="text" name="numero" />
		   
            <label> E-mail: </label>
           <input type="text" name="email" /><br />
           
            <label> Senha: </label>
           <input type="text" name="senha" /><br />

           <label> Nivel de Acesso:</label>
            <select name = "nivel_acesso"> 
		   <option value="2">Afiliado</option>
			</select></br></br></br></br>
           
            
           
           <input type="hidden"  name="acao" />
           <label>
           <input  type="submit"  id="btn1"  value="Cadastrar" />
           </label>
          </form>
          
    </div>