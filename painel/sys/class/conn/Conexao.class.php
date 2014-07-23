<?php
/**********************************************************************************************************************
  Classe responsável por fazer a conexão com a base de dados e fecha-lá
  @autor: Marcelo Cavassani
  @data: 09/06/2014
**********************************************************************************************************************/
   class Conexao{
	   
	   private $servidor;
	   private $usuario;
	   private $senha;
	   private $banco;
	   private $conn;
	   private $tipoConexao = "local";

 /*********************************************************************************************************************/  
	 
	 public function __construct(){
		
		if($this->tipoConexao=="local"){
		$this->servidor = 'localhost'; 
		$this->usuario  = 'root';
		$this->senha    = '';
		$this->banco    = 'sebosonline';
		}else{
		  $this->servidor = 'seboonline.com.br'; 
		  $this->usuario  = 'fagan';
		  $this->senha    = 'Fagan0800';
		  $this->banco    = 'fagan_painel';
		}
		 
	 }
	  
/*********************************************************************************************************************/	  
	  /* Método que faz a conexão */
	  
	  public function conectar(){
		  
		  
		try{
			
		  /* Tenta conectar */  
		 $this->conn = mysql_connect($this->servidor,$this->usuario,$this->senha);
		 
		 /* para arrumar problemas de códificação */
		 mysql_query(" SET NAMES 'utf8' ");
		 mysql_query(" SET character_set_connection =  utf8 ");
		 mysql_query(" SET character_set_client     =  utf8 ");
		 mysql_query(" SET character_set_results    =  utf8 ");
		 
		 if(!$this->conn) {
			
			throw new Exception('Erro na conexão <br />');
			exit();
			
		 }else{
			 
			if(mysql_select_db($this->banco,$this->conn)==false){
				
				throw new Exception('Erro ao selecionar database <br />');
				exit();
			}
			
		 }
			  
		 }catch(Exception $ex){
			 echo 'Error:'.$ex->getMessage().'<br />';    
		 }
		  
	  }
	  
/*********************************************************************************************************************/  
	     
	  /* Método para fechar a conexão */
	  
	  public function fecharConexao(){
		  
		  mysql_close($this->conn);
	  }
	
/*********************************************************************************************************************/
	  
   }
  ?>