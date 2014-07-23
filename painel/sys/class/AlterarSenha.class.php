<?php
/*
* Classe para alterar senha
* @author: Marcelo Cavassani
* @data 09/06/2014
*/
	//inclui a classe de conexão
 	include('Control/Conexao.class.php');
	class AlterarSenha{
 	
 	private $usuario;
	private $senha;
	private $resena;
	
	public function __construct($senha, $resenha, $usuario){
		
		$this->usuario = $usuario;
		$this->senha   = md5($senha);
		$this->resenha = md5($resenha);
		
	}
	
	public function getUsuario(){
		 
		 return $this->usuario;
	 }
	 
	public function setUsuario($usuario){
		
		 $this->usuario = $usuario;
	 }
	
	public function getSenha(){
		 
		 return $this->senha;
	 }
	 
	public function setSenha($senha){
		
		 $this->senha = $senha;
	 }
		
	public function getResenha(){
		 
		 return $this->resenha;
	 }
	 
	public function setResenha($resenha){
		
		 $this->resenha = $resenha;
	 }
	 
//-------------------------------------------------------------------------------------//

	public function inserir(){
		//instância o objeto
		 $conexao = new Conexao();
		 
		 //acessa seus métodos
		 $conexao->conectar();
		 //echo $this->usuario;
		
		$in = mysql_query("UPDATE administradores SET senha='$this->senha', status='1' WHERE usuario='$this->usuario'") or die(mysql_error());	
		
		if($in == true){
			echo "<h2 align='center' style='color:green'> Senha alterada com sucesso </h2>";
			echo "<script> window.location.replace('painel.php?pag=inicio'); </script>";
		}else{
			echo "<h2 align='center' style='color:red'> Erro ao inserir no banco </h2>";
		}
	
		$conexao->fecharConexao();
	}//fim inserir()
	
	public function validar(){
		
		 $this->senha    = trim($this->senha);
		 $this->resenha  = trim($this->resenha);
		 
		 $this->senha    = strip_tags($this->senha);
		 $this->resenha  = strip_tags($this->resenha);
		
		if($this->getSenha() == $this->getResenha()){
			
			$this->inserir();
			
		}else{
			echo "<h2 align='center' style='color:red'> Senha divergente </h2>";
		}
		
	}//fim validar()
	
	}//fim da classe
?>