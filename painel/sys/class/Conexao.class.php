<?php
/*
 *Classe que efetua conexão com Mysql
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/

   class Conexao{
	   
	   public $server;
	   public $usuario;
	   public $senha;
	   public $con;
	   
      public function conexao(){
	  $this->server = "localhost";
	  $this->usuario = "root";
	  $this->server = "";
	  
	  $this->con = mysql_connect($this->server,$this->usuario, $this->senha) or die("Erro ao conectar com o banco");
	  mysql_select_db('mrimpermeabilizacoes',$this->con) or die("Erro ao procurar a banco de dados");
	  
      }
	  
	  
	  public function fecharConexao(){
		  
		$fechar = mysql_close($this->con);  
		  
	  }
	  
   }
  
   
   
   
  ?>