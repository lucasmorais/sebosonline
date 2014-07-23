<?php
/*
 *Classe para validar id's
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
 */
  class ValidarId{
	  
	private $pag;
	private $tabela;
	private $id;	
	
/*********************************************************************************************************/	
	public function setId($id){
		
		$this->id = $id;
	}
/*********************************************************************************************************/	
	public function getId(){
		
		return $this->id;
	}
/*********************************************************************************************************/	
    
	public function setarTabela($pag){
		
	 $this->pag = mysql_real_escape_string($pag);
		
	 if($this->pag=='edit-admin'){		
		$this->tabela='administradores';
	 }
	  elseif($this->pag=='editar-paginas'){		
		$this->tabela='paginas';
	 }
	  elseif($this->pag=='edit-cliente'){		
		$this->tabela='clientes';
	 }
	  elseif($this->pag=='editar-banner'){		
		$this->tabela='banner';
	 }
	  elseif($this->pag=='editar-Servico'){		
		$this->tabela='servicos';
	 }
	  else{
		 $this->tabela='galerias'; 
	  }
	}
	
/*********************************************************************************************************/

   public function pesquisarId(){
	   
	   $id    = $this->getId();
	   $sql   = mysql_query(" SELECT id FROM $this->tabela WHERE id=$id ")or die(mysql_error());
	   
	  if($cont = mysql_num_rows($sql)<1){
		  
		   return false;
		   
	   }else{
		   
		   return true;
	   }
   }
/*********************************************************************************************************/

   public function redireciona($pagina){
	   
	  header("Location:$pagina");  
	   
   }
/*********************************************************************************************************/
	  
  }
?>