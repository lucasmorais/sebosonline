<?php

/*
 *Classe para exibir corretamente o tpitulo da Pagina
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
 */


  class TituloPagina{
	  
	 public $pag;
	 public $title;
	 
	 public function exibirTitulo($pag){
		 
		  
		if(isset($_GET['pag']) && $_GET['pag'] !='' ){
			
			//evita cógigos maliciosos inceridos na url
			$this->pag = mysql_real_escape_string(trim($_GET['pag']));
			
			switch($this->pag){
				
				case 'cad-admin':
				$this->title = "Cadastrar administradores";
				break;
				
				case 'list-admin':
				$this->title = "Listar dados de administradores";
				break;
				
				case  'editarAdmin':
				$this->title = "Alterar dados de administradore";
				break;
				
				case 'cad-paginas':
				$this->title = "Criar páginas";
				break;
				
				case 'editar-paginas':
				$this->title = "Editar páginas";
				break;
				
				case 'cad-cliente':
				$this->title = "Cadastrar clientes";
				break;
				
				case 'list-clientes':
				$this->title = "Listar clientes";
				break;
				
				case 'edit-cliente':
				$this->title = "Editar cliente";
				break;
				
				case 'cad-servico':
				$this->title = "Cadastrar Serviços";
				break;
				
				case 'cad-banner':
				$this->title = "Cadastrar Banners";
				break;
				
				case 'list-banners':
				$this->title = "Listar Banners";
				break;
				
				case 'editar-banner':
				$this->title = "Editar Banners";
				break;
				
				case 'cad-contato':
				$this->title = "Cadastrar Nova página de contato";
				break;
		        
				case 'list-contato':
				$this->title = "Gerenciar dados de contato";
				break;
				
				case 'cad-galeria':
				$this->title = "Criar galeria";
				break;
				
				case 'incluir-fotos':
				$this->title = "Incluir fotos";
				break;
				
				case 'list-galeria':
				$this->title = "Listar Galerias";
				break;
				
				case 'list-fotos':
				$this->title = "Listar fotos";
				break;
				
				case 'edit-galerias':
				$this->title = "Editar Galerias";
				break;
				
			}
			
		}
		  
		
	  }
	  
	  
	 }
	   

?>