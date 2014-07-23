<?php
/*
 *Classe que redireciona pra pagina painel
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/


 if(!isset($_GET['pag'])){
	 
	  header("Location:painel.php?pag=inicio");
   }	
?>