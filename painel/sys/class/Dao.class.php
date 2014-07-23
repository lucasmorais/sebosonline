<?php
/*
 *Classe responsavel por fazer inserção, alteração e consultas.
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/
 include('Conexao.class.php');
 
 class Dao{
	
  protected $tabela;
  protected $dados;
 
 public $server;
	   public $usuario;
	   public $senha;
	   
      public function conexao(){
	  $this->server = "localhost";
	  $this->usuario = "root";
	  $this->server = "";
	  
	  $con = mysql_connect($this->server, $this->usuario, $this->senha) or die("Erro ao conectar com o banco");
	  mysql_select_db("mrimpermeabilizacoes", $con) or die("Erro ao procurar a banco de dados");
	  
      }
	
 /************************************************************************************
  Autor: Eric Ferraz
  Objetivo: função para realizar insert dinâmico no banco de
  dados
  
  exemplo de como é preciso passar os dados:
   
   $dados = array(
    
	   "nome"     => "Eric",
       "idade"    => "25",
	   "cidade"   => "Ourinhos",
       "email"    => "email@gmail.com",
	   "mensagem" => "Olá esse é um teste"
   );
   
 /*************************************************************************************/
  
  public function Insert($tabela , array $dados){
	 $this->conexao();
	 if( $this->conexao() == true){
		echo 'conectado';	 
	}else{
		echo 'desconectado';
		
		}
	/*Recebe como parâmetro o nome da tabela do bd e um array contendo os dados */
	 
	 //pega somente as chaves do array
	 $campos  = implode(",",array_keys($dados));
	 
	 //pega os valores
	 $valores = " ' ".implode(" ',' ",array_values($dados))." ' ";
	
	echo '<pre>';
   print_r( $ins = "INSERT INTO {$tabela} ({$campos})  VALUES ({$valores})");	
	echo '</pre>';
	
    if( $qry = mysql_query($ins) ){
	   echo 'Sucesso';   
    }else{
	     echo 'falha';
   }
	
 }//fim Insert
 /************************************************************************************/
  
	//efetua a pesquisa, precisa ser informada a sql completa, ex: SELECT nome,idade,email from usuarios where id = 1;
	public function pesquisar($sql){
		 $this->conexao();
	 if( $this->conexao() == true){
		echo 'conectado';	 
	}else{
		echo 'desconectado';
		
		}
		$resul = mysql_query($sql);
		if(mysql_num_rows($resul) < 1 ){
		//não tem email igual ao informado
		
		 return 1;
			
		}else{
			//o email informado já existe
			return 0;
		}
	
	

		} 
	 
	 
	 
 }


?>