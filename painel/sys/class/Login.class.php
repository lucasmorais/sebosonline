<?php
/*
 *Classe para efetuar operações relacionadas a usuario
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/
 class Login{
	 
	 protected $usuario;
	 protected $senha;
	 protected $sql;
	 protected $pag;
	 protected $nivel_acesso;
	 protected $status;
	 public    $dados = array();
	
/********************************************************************************************************/	 	 
	public function SetDados($dados){
		
		 $this->dados = $dados;
	 }
/********************************************************************************************************/
	 public function GetDados(){
		 
		 return $this->dados;
	 }
/********************************************************************************************************/  
	 
	public function SetUsuario($usuario){
		
		 $this->usuario = $usuario;
	 }
/********************************************************************************************************/
	 public function GetUsuario(){
		 
		 return $this->usuario;
	 }
/********************************************************************************************************/ 
	 public function SetSenha($senha){
		 
		  $this->senha = $senha;
	 }
/********************************************************************************************************/	
	 public function GetSenha(){
		 
		 return $this->senha;
	 }
/********************************************************************************************************/	
	 public function SetSql($sql){
		 
		 $this->sql = $sql;
	 }
/********************************************************************************************************/	 
	public function GetSql(){
		 
		 return $this->sql;
	 }
/********************************************************************************************************/	
	 public function GetStatus(){
		 
		 return $this->status;
	 }
/********************************************************************************************************/ 
	 public function SetStatus($status){
		 
		  $this->status = $status;
	 }
/********************************************************************************************************/	
	 public function GetNivelAceso(){
		 
		 return $this->nivel_acesso;
	 }
/********************************************************************************************************/ 
	 public function SetNivelAcesso($nivel_acesso){
		 
		  $this->nivel_acesso = $nivel_acesso;
	 }
/********************************************************************************************************/	

   public function validar(){
		 
		if(empty($this->usuario) || strlen($this->usuario)<4){
			 
			 echo '<h2 align="center" style="color:red"> Digite o login corretamente</h2> <br />';
		 }
		 elseif(empty($this->senha) || strlen($this->senha) <4){
			 
			 echo '<h2 align="center" style="color:red"> Digite a senha corretamente</h2> <br />'; 
		 }
		 else{
			 
			 return true;
			 $this->tratarDados();
		 }
		 
	 }
/********************************************************************************************************/	
	 public function tratarDados(){
		 
		 $this->usuario  = trim($this->usuario);
		 $this->senha    = trim($this->senha);
		 
		 $this->usuario  = strip_tags($this->usuario);
		 $this->senha    = strip_tags($this->senha);
		 
		 $this->usuario = mysql_real_escape_string($this->usuario);
		 $this->senha   = mysql_real_escape_string($this->senha);
	 }
	 
/********************************************************************************************************/	 
	 public function verificaUser(){
		 
		 
	 try{
		 
		$qr =  mysql_query($this->GetSql()) or die(mysql_error());
		 
		 if($qr == false){
			 
			 throw new Exception("Erro na busca");
		 }
		 
		 if($cont = mysql_num_rows($qr)<1){
			 
			// Não existe usuario com login e senha informados
			return false;
		 }
		 else{
			//existe usuario com login e senha informados 
		    return $this->dados = $qr;
		 }
		 
	  }catch(Exception $ex){
		 
		 echo $ex->getMessage();
		 
	  }
	 }
/********************************************************************************************************/   
	 public function redirecionar($pag){
		 
		 $this->pag = $pag;
		 header("Location:$this->pag"); 
	 }
/********************************************************************************************************/
 
 	public function pesquisa($ssql){
			$resul = mysql_query($ssql) or die (mysql_error());
			$cont = mysql_fetch_assoc($resul);
			return $cont;
	}//fim do pesquisaID
 
 }


?>