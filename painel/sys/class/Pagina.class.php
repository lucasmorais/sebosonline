<?php

/******************************************************************************************************************************
 Classe para capturar a página da url
 @autor: Marcelo Cavassani
 @data: 09/06/2014
/******************************************************************************************************************************/

 class Pagina{
	 
	public $pag; 
	 
	 public function incluirPagina($pag){
		 
		 $this->pag = $pag;
		 
		if($this->pag){
			
			if(isset($_GET['pag'])){
				
				if(!empty($_GET['pag'])){
					
					//posso incluir as páginas
					
					switch($this->pag){
						
						 case 'gerenciavel';
						 include('includes/inicio.php');
						 break;
					}
					
				}
				
			}
			
			
		}
		 
		 
		 
	 }
	  
	 
 }



?>