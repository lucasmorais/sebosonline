<?php
/**************************************************************************
 Classe que irá realizar operações de videos
 @autor: Marcelo Cavassani
 @data: 
**************************************************************************/
 class CrudVideos{
 	private $idAlbum;
    private $idVideo;
    private $video;
    private $titulo;
    private $descricao;
    private $data;
	
	public function setIdAlbum($idAlbum){
		$this->idAlbum = $idAlbum;
		
	}
	public function getIdAlbum(){
		return $this->idAlbum;
	}
	
	 public function setIdVideo($idVideo){
        $this->idVideo = $idVideo;
    }

    public function getIdVideo(){
        return $this->idVideo;
    }

    public function setVideo($video){
        $this->video = $video;
    }

    public function getVideo(){
        return $this->video;
    }

     public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }
 public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->Descricao;
    }

 public function setData(){
 	$this->data = $dat;
 }	
	public function getData(){
		return $this->Data;
	}
	
	
	
/**************************************************************************
 Cadastrar
**************************************************************************/
 public function cadastrarVideo(){
				
	$sql = " INSERT INTO video_album SET titulo='$this->titulo' ";	
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 /**************************************************************************
 Cadastrar
**************************************************************************/
 public function cadastrarVideoGaleria(){
				
	$sql = " INSERT INTO video_galeria SET titulo='$this->titulo', video='$this->video', id_album = '$this->idAlbum' ";	
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 /**************************************************************************
 lista alguns dados dos membros
**************************************************************************/
 public function listarVideos(){
	
	$sql = mysql_query("SELECT * FROM video_galeria");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
  /**************************************************************************
 lista 
**************************************************************************/
 public function listarVideosPorId($idVideo){
	
	$sql = mysql_query("SELECT * FROM video_galeria WHERE id_video = '$idVideo' ");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
  /**************************************************************************
 lista 
**************************************************************************/
 public function listarVideoOrdenadoPorNome($idAlbum){
	
	$sql = mysql_query("SELECT * FROM video_galeria WHERE id_album = '$idAlbum' ORDER BY titulo");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }




  /**************************************************************************
 Editar video id
**************************************************************************/
 public function editarVideoPorId($idVideo){
		
	$sql = " UPDATE video_galeria SET titulo='$this->titulo', video = '$this->video' ";	
	$sql.= " WHERE id_video='$idVideo' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Video alterado com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarVideo&id_video=$idVideo');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao alterar!!!"); </script>';
	}
 }	
	
/**************************************************************************
 excluir administrador por id
**************************************************************************/
public function excluirAlbumPorId($idAlbum){
 
 $sql = mysql_query("DELETE FROM video_album WHERE id_album='$idAlbum'") or die(mysql_error());
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}	


/**************************************************************************
 excluir administrador por id
**************************************************************************/
public function excluirVideoPorId($idVideo){
 
 $sql = mysql_query("DELETE FROM video_galeria WHERE id_video='$idVideo'") or die(mysql_error());
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
	
		
 }//fim da classe
?>