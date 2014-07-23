<?php

 $cadastrarPagina = new CrudPagina();
  
  if(isset($_POST['submit'])){
		 
		 $cadastrarPagina->setTitulo($_POST['titulo']); 
		 $cadastrarPagina->setConteudo($_POST['descricao']); 
	 
	  
	  $cadastrarPagina->tratarDados();
	  $cadastrarPagina->cadastrarPagina();
  }

?>

<div id="geral">
   
     <form method="post" id="formulario" enctype="multipart/form-data" >
                    
            <label> Titulo: </label>
           <input type="text" name="titulo" value=""/><br />
           
            <textarea name="descricao" cols="" rows="5"></textarea>
            <script type="text/javascript">CKEDITOR.replace('descricao');</script>
            
            <input type="submit" name="submit" id="button" class="botao azul" value="Salvar" />

  </form>
  
  </div>
