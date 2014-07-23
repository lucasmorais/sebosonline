
<?php
	include_once('class/crud/CrudContato.class.php');
    include('include/redirecionar.php');

	if(isset($_POST['acao'])){
		 $cont = new CrudContato($_POST['email'], $_POST['tel1'], $_POST['tel2'], $_POST['rua'], $_POST['cidade'], $_POST['descricao'], $_POST['linkmaps']);
	
		 if($cont->validarDados()){
			$cont->inserir();	 
		 }
			 
		 
	  }

?>

 <form id="formulario" name="form1" method="post" >

           <label> Email  </label>
           <input type="text" name="email" />
           
           
            <label> Telefone 1: </label>
            <input type="text" name="tel1" id="tel1"/>
            
             <label> Telefone 2: </label>
            <input type="text" name="tel2" id="tel2"/>
            
            <label> Rua/Número: </label>
            <input type="text" name="rua" id="rua"/>
            
            <label> Cidade/Estado: </label>
            <input type="text" name="cidade" id="cidade"/>
           
           
            <label> Texto: </label>
            
            <textarea name="descricao" rows="5" cols="70">
            
            </textarea>
            <script type="text/javascript">CKEDITOR.replace('descricao');</script>
           
             <label> Link do google maps: </label>
            <input type="text" name="linkmaps" />
           
           <label>
           <input type="hidden"  name="acao" />
           <input type="submit"  value="Cadastrar" />
           </label>

 </form>
