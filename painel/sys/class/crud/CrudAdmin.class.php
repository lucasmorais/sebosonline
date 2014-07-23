<?php
/**************************************************************************
 Classe que irá realiazar operações de administrador
 @autor: Tiago Matos de Abreu
 @data: 09/12/2013
**************************************************************************/
class CrudAdmin{
    private $idAdmin;
    private $primeiroNome;
	private $ultimoNome;
	private $email;
	private $usuario;
	private $nivelAcesso ;
	private $senha;	
	private $statusAdmin;
	
	
	

    public function setIdAdmin($idAdmin){
        $this->idAdmin = $idAdmin;
    }

    public function getIdAdmin(){
        return $this->idAdmin;
    }

    public function setPrimeiroNome($primeiroNome){
        $this->primeiroNome = $primeiroNome;
    }

    public function getPrimeiroNome(){
        return $this->primeiroNome;
    }
	
	 public function setUltimoNome($ultimoNome){
        $this->ultimoNome = $ultimoNome;
    }

    public function getUltimoNome(){
        return $this->ultimoNome;
    }
	
	 public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
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
	 public function setNivelAcesso($nivelAcesso){
        $this->nivelAcesso = $nivelAcesso;
    }

    public function getNivelAcesso(){
        return $this->nivelAcesso;
    }

/**************************************************************************
 validação
**************************************************************************/
	
	public function validar(){
		
	  $cont= 0;	
	  $dados = array(
	   '0'=> $this->primeiroNome,
	   '1'=> $this->email
	  );
	  
	  foreach($dados as $valor){
		  
		  if($valor == ""){
			 
			 $cont++; 
		  }
	  }//fim forach
	  
	  if($cont>0){
		  
		  echo '<h1>Todos dados são requeridos </h1>';
		  return false;
		  
	  }else{
		  
		  return true;
	  }
		
}//fim validar

/**************************************************************************
 Cadastrar
**************************************************************************/
 public function cadastrarAdministrador(){
		
	$statusAdmin = '1';
		
	$sql = " INSERT INTO administrador SET primeiro_nome='$this->primeiroNome', ultimo_nome='$this->ultimoNome',email='$this->email',usuario='$this->usuario',senha='$this->senha', ";
	$sql.= " nivel_acesso='$this->nivelAcesso' ";	
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 
 /**************************************************************************
 Editar administrador por id
**************************************************************************/
 public function editarAdminPorId($idAdmin){
		
	$sql = " UPDATE  administrador SET primeiro_nome='$this->primeiroNome',ultimo_nome='$this->ultimoNome', ";
	$sql.= " email='$this->email', usuario='$this->usuario',senha='$this->senha' ";	
	$sql.= " WHERE id_admin='$idAdmin' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarAdmin&id_admin=$idAdmin');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
 
 
/**************************************************************************
 lista alguns dados dos membros
**************************************************************************/
 public function listarAdmin(){
	
	$sql = mysql_query("SELECT * FROM administrador");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 listar administrador por id
**************************************************************************/
 public function listarAdminPorId($idAdmin){
	
	$sql = mysql_query("SELECT * FROM administrador WHERE id_admin='$idAdmin'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/**************************************************************************
 excluir administrador por id
**************************************************************************/
public function excluirAdminPorId($idAdmin){
 
 $sql = mysql_query("DELETE FROM administrador WHERE id_admin='$idAdmin'") or die(mysql_error());
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>