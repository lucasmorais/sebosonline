<?php
/**
 *Classe que irá realiazar operações de cliente
 *@autor: Marcelo Cavassani
 *@data: 25/06/2014
**/
class CrudCliente {
    private $idCliente;
    private $nome;
	private $email;
	private $telefone;
	private $cep;
	private $senha;

    public function setIdCliente($idCliente){
        $this->idCliente = $idCliente;
    }

    public function getIdCliente(){
        return $this->idCliente;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
	
	 public function setEmail($email){ 
		 $this->email = $email;
	 }

 	public function getEmail(){
		 return $this->email;	 
	 }
	 
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}
	
	public function getTelefone(){
		return $this->telefone;
	}
	
	public function setCep($cep){
		$this->cep = $cep;
	}
	public function getCep(){
		return $this->cep;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}
	
/**************************************************************************
 							validação
**************************************************************************/	
	public function validar(){
		
	  $cont= 0;	
	  $dados = array(
	   '0'=> $this->nome
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
 Tratar dados
**************************************************************************/
 public function tratarDados(){
	
	
 }

/**************************************************************************
 Cadastrar cliente
**************************************************************************/
 public function cadastrarCliente(){
	
	$this->tratarDados();
		
	$sql = " INSERT INTO cliente SET nome='$this->nome', email='$this->email', telefone='$this->telefone',cep='$this->cep', senha='$this->senha' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	

 /**************************************************************************
  Editar trocando a imagem por id
**************************************************************************/
 public function editarComImg($idCliente){
	
	$this->tratarDados();
		
	$sql = " UPDATE cliente SET nome='$this->nome', email='$this->email', telefone='$this->telefone',cep='$this->cep', senha='$this' WHERE id_cliente='$idCliente' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados atualizados com sucesso';
	  echo "<script> window.location.replace('?pag=EditarCliente&id_cliente=$idCliente');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
 
/**************************************************************************
 Editar cliente por id
**************************************************************************/
 public function editarClientePorId($idCliente){
		
	$sql = " UPDATE  cliente SET nome='$this->nome', email='$this->email', telefone='$this->telefone',cep='$this->cep', senha='$this' ";	
	$sql.= " WHERE id_cliente='$idCliente' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo "<script> window.location.replace('?pag=EditarCliente&id_cliente=$idCliente');</script>";	
	  echo 'Dados atualizados com sucesso';

	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
  
/**************************************************************************
 Lista cliente em ordem descrecente
**************************************************************************/
 public function listarCliente(){
	
	$sql = mysql_query("SELECT * FROM cliente ORDER BY RAND()");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 listar cliente por id
**************************************************************************/
 public function listarClientePorId($idCliente){
	
	$sql = mysql_query("SELECT * FROM cliente WHERE id_cliente='$idCliente'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }

  /**************************************************************************
 listar cliente por id
**************************************************************************/
 public function listarClienteOrdenadoPorNome(){
	
	$sql = mysql_query("SELECT * FROM cliente ORDER BY nome ");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
/**************************************************************************
 Excluir cliente por id
**************************************************************************/
public function excluirClientePorId($idCliente){
 
 $sql = mysql_query("DELETE FROM cliente WHERE id_cliente='$idCliente'");
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>