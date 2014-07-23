<?php
/*
 *Classe para validar id
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/


  function validarId($id,$tabela){
	  
	 $sql = mysql_query("SELECT id FROM $tabela  WHERE id = $id ");
	 
	 if($cont = mysql_num_rows($sql) <1){
		 
		 header("Location:painel.php?pag=inicio");
	 }
	  
  }

 if(isset($_GET['id'])){

   $id     = intval($_GET['id']);
   $pag    = mysql_real_escape_string($_GET['pag']);
   $tabela = "";
    
   
 
 }

?>