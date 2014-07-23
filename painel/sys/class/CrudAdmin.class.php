<?php
/*
 *Classe crud de administrador
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/

	include_once("ConsultaAdmin.class.php");
	
	include('trabalho/Util.class.php');

	class CrudAdmin{
//-------------------------------------------------------------------------------------------------------------------------------------------------------		
	function __construct($nome,$email,$login, $permissao){
		
		$this->nome = $nome;
		$this->login = $login;
		$this->email = $email;
		$this->permissao = $permissao;
		
	}//fim do construtor
	
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
			   echo "<h3 style='color:red'> Você não tem premissão para essa ação  </h3> <br />"; 
			}
		}
		else{
				//Instacia da classe Util, onde pegaremos a função verificar email
				
				  $util = new Util();
				  $consul = new ConsultaAdmin();
			
				  // caso a função verificar email retornar 1, o email é valido
				  if($util->verificar_email($this->email)==1){
			
					 if($consul->pesquisar("SELECT id, email FROM administradores WHERE email like '$this->email'") == 0){
						 
						 
						 if($consul->pesquisar("SELECT usuario FROM administradores WHERE usuario like '$this->login'") == 0 ){
							 $senha = $util->geraSenha();
							 
							$this->inserir($this->nome, $this->email, $this->login, $senha, $this->permissao);
							
							$assunto = "Mrimpermeabilizaçoes";
							$msg ="Login:  ".$this->login. " Senha:  ".$senha; 
							 
							$this->enviarEmail($this->nome, $this->email, $assunto, $msg);
							 
						 }else{
							echo "<h3 style='color:red'> Login já cadastrado </h3> <br />";; 
								 
							 
						 }//fim pesquisar login
							 
					 }else{
						//Login ja cadastrado
						echo "<h3 style='color:red'> Email já cadastrado </h3> <br />";;
						//header("Location: incluir_administradores.php");
						
					 }//Fim verificar email cadastrado
							 
					  
				   }else{
					//Email invalido
					
					echo "<h3 style='color:red'> Email inválido </h3> <br />";
						
				}//fim do validar email
		}//fim dos validar campos
	}//fim  validaDados   
		
//-------------------------------------------------------------------------------------------------------------------------------------------------------		
	
	//funçao para inserção
	public function inserir($nome, $email, $login, $senha, $permissao){
		 
	  mysql_query("INSERT INTO administradores SET nome='$nome', email='$email', usuario='$login', senha='$senha', nivel_acesso='$permissao', status='0'") or die("Erro ao inserir o adm");
	}//fim do inserir
		
	public function excluir($id){
		$in = mysql_query("DELETE FROM administradores WHERE id='$id' ");
			
		if($in == true){
		
			 echo '<h2 align="left" style="color:green;">Administrador excluido com sucesso </h2>';
		}
		else{
			 echo '<h2 align="left" style="color:red;"> Falha ao excluir o Administrador </h2>';
		}
		
	}//fim do excluir
	
	public function update($usuario, $email, $id){
		 
	  mysql_query("UPDATE administradores SET usuario='$usuario', email='$email' WHERE id='$id'") or die("Erro ao atualizar o adm");
	  
	}//fim do inserir
	
//-------------------------------------------------------------------------------------------------------------------------------------------------------	
	public function validaUpdate($ide, $emaile, $usuarioe){
		
		$validaEmail;
		$validaUsuario;
		$consul = new ConsultaAdmin();
		$dados = $consul->Buscar("SELECT id, nome, email, usuario, senha FROM administradores WHERE id='$ide'");
		
		if($dados[1] == $emaile){
				
			$validaEmail = true;
								
		}else{
			$util = new Util();

			if($util->verificar_email($emaile) == 1) {
					
				if($consul->pesquisar("SELECT email FROM administradores WHERE email='$emaile'") == 0){
						
					$validaEmail = true;
						
				}else{
						
					$validaEmail = false;
				}
					
			}else{
				
				$validaEmail = false;
					
			}//fim if($util->verificar_email($_POST['email']) == 1)
			
		}//fim valida email
			
			
		if($dados[2] == $usuarioe){
			$validaUsuario = true;
				
		}else{
				
			if($consul->pesquisar("SELECT usuario FROM administradores WHERE usuario='$usuarioe'") == 0){
					
				$validaUsuario = true;
					
			}else{
					
				$validaUsuario = false;
					
			}
				
		}

		if($validaEmail == true && $validaUsuario == true){
				
			$this->update($usuarioe, $emaile, $ide);
			echo "<h3 style='color:green'> Usuário atualizado com sucesso </h3> <br />";
				
		}elseif($validaEmail == false){
				
			echo "<h3 style='color:red'> Email inválido ou já cadastrado </h3> <br />";
			
		}elseif($validaUsuario == false){
			
			echo "<h3 style='color:red'> Usuário já cadastrado </h3> <br />";
		}
		
	}
//-------------------------------------------------------------------------------------------------------------------------------------------------------		
	
	public function enviarEmail($nomee, $emaile, $assuntoe, $msge){
		
		$nome   =   $nomee; //pega o nome do remetente
		$email  = 'asdadasdasdas'; //pega o email do remetente
		$receptor = $emaile; //seu email
		
		$mensagem = $msge; //mensagem
		$assunto = $assuntoe; //assunto
		#Pega o nome e o email e mostra no cabeçalho do email receptor
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "From: angelo.novello@centropaulasouza.sp.gov.br\r\n"; // remetente
		$headers .= "Return-Path: angelo.novello@centropaulasouza.sp.gov.br\r\n"; // return-path
		
		
			if(mail($receptor, $assunto, $mensagem, $headers))
				echo "<h3 style='color:gree'> $nome, Foi enviado um email com seus dados, aguarde alguns segundo...</h3>";
			else
				echo "<h3 style='color:red'> $nome, Ocorreu um problema ao enviar seu email, aguarde alguns minutos e tente novamente.</h3>";
		
		
		
	}

	}//fim da classe
?>