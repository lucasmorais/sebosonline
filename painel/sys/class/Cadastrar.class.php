<?php
/*
*Classe para cadastrar users
*@author: Marcelo Cavassani
*@data: 09/06/2014
*/
 //classe para importações
 include('Util.class.php');
 
 
 //classe para realizar operações no banco de dados
 include('Dao.class.php');
 
 class Cadastrar extends Util{
	/******************************************************************************************/
	 // Classe para cadastrar administradores
	/******************************************************************************************/
	protected $nome;
	protected $login;
	protected $email;
	
	
	function __construct($nome,$email,$login){
		
		$this->nome = $nome;
		$this->login = $login;
		$this->email = $email;
		
	}
	
	public function validarDados(){
		
		$erros = array();
		
		if(empty($this->nome)){
			
			$erros[] = "Digite seu nome";
		}
		elseif(empty($this->email)){
			
			$erros[] = "Digite seu email";
		}
		elseif(empty($this->login)){
		$erros[] = "Digite seu login";
		}
		
		if(!empty($erros)){
			
			foreach($erros as $valor){
			   echo '<h3 style="color:red"> '.$valor.' </h3> <br />';	
			}
		}
		else{
			//Instacia da classe Util, onde pegaremos a função verificar email
			  $util = new Util();
			  $dao = new Dao();
			  // caso a função verificar email retornar 1, o email é valido
			  if($util->verificar_email($this->email)==1){
				 //email valido
				 
				 if($dao->pesquisar("SELECT email FROM administradores WHERE login = '$this->email'")== 1){
					 // cadastra 
					 if($dao->pesquisar("SELECT login FROM administradores WHERE login = '$this->login'") ==1){
						 $senha = $util->geraSenha();
						 
						 // Alimentando o array de dados que sera salvo no banco
						 $dados = array( 
						 	"nome" => $this-> nome,
							"email" => $this-> email,
							"login" => $this-> login,
							"senha" => $senha
						 
						 );
						 
						 //$dados recebe um array 
						 $dao->Insert('administradores', $dados);
						 
						 }else{
							 //Login ja cadastrado
							 echo "Login ja cadastrado";
							header("Location: incluir_administradores.php");
							 
							 }
					 
					 
					 
				 }else{
					//login cadastrado
					echo "Email ja cadastrado";
					header("Location: incluir_administradores.php");
						 
						 
						 }
				    
				  
				}else{
				//Email invalido
				
				header("Location: incluir_administradores.php");
					
					}
			  
			  
		}
	}//fim  validaDados
	 
	
	   //método para validar administrador
	   
	 
 }



?>