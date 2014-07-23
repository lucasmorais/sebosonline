<?php

/**********************************************************************************************************************************************
 Incluir páginas passadas pela url dentro do conteúdo
 @autor: Tiago Matos de Abreu
 @data:05/09/2013
/**********************************************************************************************************************************************/

 class IncluiPagina{
	 
	private $pag;
	
	public function abrirPag($pag){
	
			
			//evita cógigos maliciosos inceridos na url
			$this->pag = trim($pag);
			
			switch($this->pag){

				case 'EditarConfig':
				include('sys/EditarConfig.php');
				break;
				
				case 'ListarAdmin':
				include('sys/ListarAdmin.php');
				break;

				case 'CadastrarAdmin':
				include('sys/CadastrarAdmin.php');
				break;
				
				case  'EditarAdmin':
				include('sys/EditarAdmin.php');
				break;
				
				case 'ListarAlbum':
				include('sys/ListarAlbum.php');
				break;

				case 'EditarGaleria':
				include('sys/EditarGaleria.php');
				break;

				case 'EditarImagem':
				include('sys/EditarImagem.php');
				break;

				case  'ListarNoticia':
				include('sys/ListarNoticia.php');
				break;
				
				case  'CadastrarNoticia':
				include('sys/CadastrarNoticia.php');
				break;
				
				case  'EditarNoticia':
				include('sys/EditarNoticia.php');
				break;
				
				case  'ListarProduto':
				include('sys/ListarProduto.php');
				break;
				
				case  'CadastrarProduto':
				include('sys/CadastrarProduto.php');
				break;
				
				case  'EditarProduto':
				include('sys/EditarProduto.php');
				break;
				
				case  'ListarCliente':
				include('sys/ListarCliente.php');
				break;

				case  'CadastrarCliente':
				include('sys/CadastrarCliente.php');
				break;
				
				case  'EditarCliente':
				include('sys/EditarCliente.php');
				break;
				
				case  'CadastrarAfiliado':
				include('sys/CadastrarAfiliado.php');
				break;
				
				case  'ListarAfiliado':
				include('sys/ListarAfiliado.php');
				break;
				
				case  'EditarAfiliado':
				include('sys/EditarAfiliado.php');
				break;
				
				case  'ListarPagina':
				include('#');
				break;
				
				case  'CadastrarVideo':
				include('sys/CadastrarVideo.php');
				break;
				
				case  'ListarVideo':
				include('sys/ListarVideo.php');
				break;
				
				case  'EditarVideo':
				include('sys/EditarAlbumVideo.php');
				break;
				
				case  'EditarAlbumVideo':
				include('sys/EditarAlbumVideo.php');
				break;
				
				case  'CadastrarAlbumVideo':
				include('sys/CadastrarAlbumVideo.php');
				break;
				
				case  'ListarAlbumVideo':
				include('sys/ListarAlbumVideo.php');
				break;
				
				case 'CadastrarPagina':
				include('sys/CadastrarPagina.php');
				break;
				
				case 'EditarPagina':
				include('sys/EditarPagina.php');
				break;

				case 'EditarTextAux':
				include('sys/EditarTextAux.php');
				break;

				case 'ListarContato':
				include('sys/ListarContato.php');
				break;

				case 'ListarContatoParceiro':
				include('sys/ListarContatoParceiro.php');
				break;
				
				case 'ListarContatoSugestao':
				include('sys/ListarContatoSugestao.php');
				break;

				case 'EditarBannerGaleria':
				include('sys/EditarBannerGaleria.php');
				break;

				case 'ListarBanner':
				include('sys/ListarBanner.php');
				break;

				case 'CadastrarBanner':
				include('sys/CadastrarBanner.php');
				break;

				case 'EditarBannerGaleriaImagem':
				include('sys/EditarBannerGaleriaImagem.php');
				break;
				
				/* fim das páginas fixas do painel */
				
				case 'list-equipes':
				include('list-equipes.php');
				break;
				
				case 'edit-equipe':
				include('edit-equipe.php');
				break;
				
				case 'cad-diretoria':
				include('cad-diretoria.php');
				break;
				
				case 'list-diretoria':
				include('list-diretoria.php');
				break;
				
				case 'edit-diretoria':
				include('edit-diretoria.php');
				break;
				
				case 'cad-paginas':
				include('cad-paginas.php');
				break;
				
				case 'CadSubPaginas':
				include('CadSubPaginas.php');
				break;
				
				case 'edit-pagina':
				include('edit-pagina.php');
				break;
				
				case 'edit-subpagina':
				include('edit-subpagina.php');
				break;
				
				case 'cad-cliente':
				include('cadastrarClientes.php');
				break;
				
				case 'list-clientes':
				include('ListarClientes.php');
				break;
				
				case 'edit-cliente':
				include('editarCliente.php');
				break;
				
				case 'cad-servico':
				include('cadastrarServicos.php');
				break;
				
				case 'list-servico':
				include('listarServicos.php');
				break;
				
				case 'cad-banner':
				include('cadastrarBanner.php');
				break;
				
				case 'list-banner':
				include('list-banner.php');
				break;
				
				case 'edit-banner':
				include('edit-banner.php');
				break;
				
				case 'cad-contato':
				include('cadastrarContato.php');
				break;
				
				case 'list-contato':
				include('listarContatos.php');
				break;
				
				case 'editar-Servico':
				include('editarServicos.php');
				break;
				
				case 'cad-galeria':
				include('criarGalerias.php');
			    break;
				
				case 'incluir-fotos':
				include('incluirFotos.php');
				break;
				
				case 'list-galeria':
				include('listarGalerias.php');
				break;
				
				case 'list-fotos':
				include('listarFotos.php');
				break;
				
				case 'edit-galerias':
				include('editarGalerias.php');
				break;
				
				case 'cad-video':
				include('cad-video.php');
				break;
				
				case 'edit-video':
				include('edit-video.php');
				break;
				
				case 'listar-video':
				include('listar-video.php');
				break;
				
				case 'cad-membro':
				include('cad-membro.php');
				break;
				
				case 'listar-membro':
				include('listar-membro.php');
				break;
				
				case 'edit-membro':
				include('edit-membro.php');
				break;
				
				case 'listar-contato':
				include('listar-contato.php');
				break;
				
				case 'listar-contato2':
				include('listar-contato2.php');
				break;
				
				case 'exibir-contato':
				include('exibir-contato.php');
				break;
				
				
			}
		
		
	}
	  
 }


?>