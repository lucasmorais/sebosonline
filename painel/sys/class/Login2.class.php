<?php
/*
 *Classe para efetuar operações relacionadas a usuario de usuário
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/

 class Login2 {
	 
	private $idUsuario;
    private $usuario;
    private $senha;
    private $statusAdmin;

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setStatusAdmin($statusAdmin){
        $this->statusAdmin = $statusAdmin;
    }

    public function getStatusAdmin(){
        return $this->statusAdmin;
    }
	
	/*******************************************************
	 Valida se foram digitados todos dados
	 @return: true or false
	********************************************************/
	public function validar(){
		
		if(empty($this->usuario) || empty($this->senha)){
		  
		  return false;
		  
		}else{
			
			return true;
			
		}
	}
	
  /*********************************************************
	 Trata os dados 
	 @return: void
  *********************************************************/
  public function tratarDados(){
    
	//retira todo html,retira espaços, e trata contra sql injection
	$this->usuario = strip_tags(trim(mysql_real_escape_string($this->usuario)));
    $this->senha   = strip_tags(trim(mysql_real_escape_string($this->senha)));
  }
  
  /*********************************************************
	 criptografa a senha
	 @return: void
  **********************************************************/
  public function criptografarSenha(){
	 
	 $this->senha = ($this->senha); 
  }
  
  /**********************************************************
	pesquisa se existe usuário com o usuario e senha informados
	@return: 0 or sql
  ***********************************************************/
  
  public function pesquisarUsuario(){
	
	$sql = mysql_query("SELECT * FROM  administrador WHERE usuario='$this->usuario' AND senha='$this->senha'"); 
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
	  
  }
  
  /**********************************************************
   verifica o status de usuário
   @return status or 2
  ***********************************************************/
  public function verificarStatus(){
	 
	 $sql = mysql_query("SELECT status_admin FROM  administrador WHERE usuario='$this->usuario' AND senha='$this->senha' AND status_admin=0")or die(mysql_error());
	 
	 if(mysql_num_rows($sql) >0){
		 
		$status = mysql_fetch_assoc($sql['status_admin']);
		return $statusAdmin;
	 }
	 else{
		 
		return 2; 
	 }
	  
  }
  
  /**********************************************************
  verifica se as duas senhas digitadas conferem
  @param senha1,senha2
  @return: true or false
 ***********************************************************/
 public function verificarSenhas($senha1,$senha2){
	 
	 if(($senha1) == ($senha2)){
		 
		 return true;
	 }
	 else{
		
		return false; 
	 }
	 
 }
  
 /**********************************************************
  altera a senha do usuário
  
 ***********************************************************/
 public function alterarSenha(){
	
	$in = mysql_query("UPDATE administrador SET senha='$this->senha', status_admin='1' WHERE usuario='$this->uruario'") or die(mysql_error());	
		
		if($in == true){
			echo "<h2 align='center' style='color:green'> Senha alterada com sucesso </h2>";
			echo "<script> window.location.replace('painel.php?pag=inicio'); </script>";
		}else{
			echo "<h2 align='center' style='color:red'> Erro ao inserir no banco </h2>";
		} 
	 
 }
  
  
}//fim da classe Login

?>