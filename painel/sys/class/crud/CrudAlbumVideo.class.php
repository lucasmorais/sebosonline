<?php
/**************************************************************************
 Classe que irá realizar operações do album de video
 @autor: Marcelo Cavassani
 @data: 05/06/2014
**************************************************************************/
class CrudAlbumVideo{
    private $idAlbumVideo;
    private $titulo;

    public function setIdAlbumVideo($idAlbumVideo){
        $this->idAlbumVideo = $idAlbumVideo;
    }

    public function getIdAlbumVideo(){
        return $this->idAlbumVideo;
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
 public function cadastrarAlbumVideo(){
				
	$sql = " INSERT INTO video_album SET titulo='$this->titulo' ";	
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 
 /**************************************************************************
 Editar album por id
**************************************************************************/
 public function editarAlbumPorId($idAlbumVideo){
		
	$sql = " UPDATE video_album SET titulo='$this->titulo' ";	
	$sql.= " WHERE id_album='$idAlbumVideo' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarAlbumVideo&id_album=$idAlbumVideo');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
 
 
/**************************************************************************
 lista albuns
**************************************************************************/
 public function listarAlbumVideo(){
	
	$sql = mysql_query("SELECT * FROM video_album");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 listar album por id
**************************************************************************/
 public function listarAlbumPorId($idAlbumVideo){
	
	$sql = mysql_query("SELECT * FROM video_album WHERE id_album='$idAlbumVideo'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/**************************************************************************
 excluir album por id
**************************************************************************/
public function excluirAlbumPorId($idAlbumVideo){
 
 $sql = mysql_query("DELETE FROM video_album WHERE id_album='$idAlbumVideo'") or die(mysql_error());
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>