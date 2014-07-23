<?php
/**************************************************************************
 Classe que irá realiazar operações de album
 @autor: Tiago Matos de Abreu
 @data: 30/12/2013
**************************************************************************/
class CrudAlbum{
    private $idAlbum;
    private $titulo;

    public function setIdAlbum($idAlbum){
        $this->idAlbum = $idAlbum;
    }

    public function getIdAlbum(){
        return $this->idAlbum;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
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
 public function cadastrarAlbum(){
				
	$sql = " INSERT INTO foto_album SET titulo='$this->titulo' ";	
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
 public function editarAlbumPorId($idAlbum){
		
	$sql = " UPDATE foto_album SET titulo='$this->titulo' ";	
	$sql.= " WHERE id_album='$idAlbum' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarAlbum&id_album=$idAlbum');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
 
 
/**************************************************************************
 lista alguns dados dos membros
**************************************************************************/
 public function listarAlbum(){
	
	$sql = mysql_query("SELECT * FROM foto_album");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 listar administrador por id
**************************************************************************/
 public function listarAlbumPorId($idAlbum){
	
	$sql = mysql_query("SELECT * FROM foto_album WHERE id_album='$idAlbum'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/**************************************************************************
 excluir administrador por id
**************************************************************************/
public function excluirAlbumPorId($idAlbum){
 
 $sql = mysql_query("DELETE FROM foto_album WHERE id_album='$idAlbum'") or die(mysql_error());
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>