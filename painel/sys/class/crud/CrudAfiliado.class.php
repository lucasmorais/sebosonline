<?php
/**
 *Classe que irá realizar operações de cadastrar editar e listar Afiliado
 *@autor: Marcelo Cavassani
 *@data: 17/06/2014
**/

class CrudAfiliado {
    private $idAdmin;
    private $nome;	
	private $cidade;
	private $estado;
	private $endereco;
	private $numero;
	private $email;
	private $senha;
	private $nivelAcesso=2 ;
	
	

    public function setIdAdmin($idAdmin){
        $this->idAdmin = $idAdmin;
    }

    public function getIdAdmin(){
        return $this->idAdmin;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
	
	public function setCidade($cidade){ 
		 $this->cidade = $cidade;
	 }

 	public function getCidade(){
		 return $this->cidade;	 
	 }
	public function setEstado($estado){ 
		 $this->estado = $estado;
	 }

 	public function getEstado(){
		 return $this->estado;	 
	 }
	public function setEndereco($endereco){ 
		 $this->endereco = $endereco;
	 }

 	public function getEndereco(){
		 return $this->endereco;	 
	 }
    public function setNumero($numero){ 
		 $this->numero = $numero;
	 }

 	public function getNumero(){
		 return $this->numero;	 
	 }
	public function setEmail($email){ 
		 $this->email = $email;
	 }

 	public function getEmail(){
		 return $this->email;	 
	 }
	public function setSenha($senha){ 
		 $this->senha = $senha;
	 }

 	public function getSenha(){
		 return $this->senha;	 
	 }
	public function setNivelAcesso($nivelAcesso){
        $this->nivelAcesso = $nivelAcesso;
    }

    public function getNivelAcesso(){
        return $this->nivelAcesso;
    }

/**************************************************************************
 							metodo de validação
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
		  
		  echo '<h1>Todos dados são requeridos! </h1>';
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
 					Metodo Cadastrar Afiliado
**************************************************************************/
 public function cadastrarAfiliado(){
	
	$this->tratarDados();
	
	$sql = " INSERT INTO administrador SET nome='$this->nome', cidade='$this->cidade', 
	estado='$this->estado', endereco='$this->endereco', 
	numero='$this->numero', email='$this->email', senha='$this->senha',nivel_acesso='$this->nivelAcesso' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados do Afiliado cadastrados com sucesso!';
	  
	}else{
	   echo 'Falha ao cadastrar Afiliado!';
	}
 }	

 
 
/**************************************************************************
 					MetodoEditar afiliado por id
**************************************************************************/
 public function editarAfiliadoPorId($idAfiliado){
		
	$sql = " UPDATE  administrador SET nome='$this->nome', cidade='$this->cidade', 
	estado='$this->estado', endereco='$this->endereco', 
	numero='$this->numero', email='$this->email', senha='$this->senha' ";	
	$sql.= " WHERE id_afiliado='$idAfiliado' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo "<script> window.location.replace('?pag=EditarAfiliado&id_afiliado=$idAfiliado');</script>";	
	  echo 'Dados do Afiliado atualizados com sucesso!';

	}else{
	   echo '<script>alert("Falha ao atualizar Afiliado!"); </script>';
	}
 }	
  
/**************************************************************************
 			Metodo que Lista Afiliado em ordem decrecente
**************************************************************************/
 public function listarAfiliado(){
	
	$sql = mysql_query("SELECT * FROM administrador ORDER BY RAND()");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 					Metodo que vai listar afiliadopor Id
**************************************************************************/
 public function listarAfiliadoPorId($idAdmin){
	
	$sql = mysql_query("SELECT * FROM administrador WHERE id_admin='$idAdmin'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }

  /**************************************************************************
 				Metodo que vai listar afiliado ordenado  por nome
**************************************************************************/
 public function listarAfiliadoOrdenadoPorNome(){
	
	$sql = mysql_query("SELECT * FROM administrador ORDER BY nome ");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
/**************************************************************************
 				Metdodo que vai excluir afiliado por id
**************************************************************************/
public function excluirAfiliadoPorId($idAfiliado){
 
 $sql = mysql_query("DELETE FROM administrador WHERE id_admin='$idAdmin'");
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>