<?php
/*
 *Classe genérica para realizar a inserção de dados das páginas
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/


 class CrudPaginas{

	protected $titulo;
	protected $chamada;
    protected $descricao; 
    protected $imagem;
	public    $dados = array();
	
	function __construct($titulo,$chamada,$descricao,$imagem){
		
		$this->titulo    = $titulo;
		$this->chamada   = $chamada;
		$this->descricao = $descricao;
		$this->imagem    = $imagem;
		$this->dados     = array();
	}
	
	 public function Validar(){
		 
		 //recebe todos dados  num array para fazer a validação
		 
		 $this->dados = array(
		 
		         '0' => $this->titulo,
				 '1' => $this->chamada,
				 '2' => $this->descricao,
		         '3' => $this->imagem
	          );
			  
		//varre o array para saber se há algum dados vazio
		$contador = 0;
		
		 foreach($this->dados as $valor){
			 
			  if($valor ==''){
				  
				 $contador++;  
			  }
		 }
			  
		   if($contador>0){
			   
			   echo '<h4> Por favor, preencha todos os campos </h4>';
		   }
		   else{
			    
				//executa o método que insere os dados 
			    $this->inserir();
		   }
	 }
	 
	   public function inserir(){
		   
		   $in = mysql_query(" INSERT INTO paginas set titulo='$this->titulo', chamada='$this->chamada', descricao='$this->descricao',imagem='$this->imagem'");   
		   
		   if($in == true){
			   
			   echo '<h4> Dados cadastrados com sucesso </h4>'; 
		   }
		   else{
			   echo '<h4> Falha ao cadastrar página </h4>';  
		   }
	   }
	
 
 }


?>