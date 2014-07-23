<?php
	 include_once('sys/class/crud/CrudBanner.class.php');
	 include('sys/include/redirecionar.php');
	 
	  if(isset($_POST['acao'])){
		 
		  $cadBanner = new CrudBanner();
		  
			$cadBanner->setTitulo($_POST['titulo']);
			$cadBanner->setIdPagina($_POST['pagina']);
			
		  	$cadBanner->cadastrarBanner();
		  }
		  
	  
?>


<script>
	/*Funcao para validar campos vazios*/
	function validar(f)
	{
				
	}
</script>


<div id="geral">

     <form id="formulario" name="form1" method="post" onSubmit="javascript:return validar(this);">
          
          <fieldset>
  		  <legend>Cadastrar Banner</legend>
           <label> Titulo: </label>
           <input type="text" name="titulo" /><br>

            <label> Pagina:</label>
            <label>
            <select name="pagina">
            <?php 
    			  $listarPagina = new CrudPagina();
	 			 if($listarPagina->listarPagina()==0){
		
					echo 'Nenhuma pagina encontrada'; 
	 
	 			 }else{
		  
				 $sql = $listarPagina->listarPagina();
		 
		 		 while($qr = mysql_fetch_assoc($sql)){
			 
	    			$listarPagina->setIdPagina($qr['id_pagina']);
					$listarPagina->setTitulo($qr['titulo']);
					
  			?>
            <option value="<?php echo $listarPagina->getIdPagina(); ?>"><?php echo $listarPagina->getTitulo(); ?></option>
             <?php 
					}//fim do if
  				} //fim do while
  			?>
            </select>
            </label> <br />


           </fieldset>  
            
           <input type="hidden"  name="acao" />
           <label>
           <input type="submit"  id="btn1" class="botao azul" value="Cadastrar" />
           </label>
          </form>
          
    </div>