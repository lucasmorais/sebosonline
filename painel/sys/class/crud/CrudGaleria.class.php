<?php
/**************************************************************************
 Classe que irá realiazar operações de galeria
 @autor: Tiago Matos de Abreu
 @data: 30/12/2013
**************************************************************************/
class CrudGaleria{
    private $idAlbum;
    private $idImagem;
    private $imagem;
    private $titulo;
    private $descricao;
    private $data;

    public function setIdAlbum($idAlbum){
        $this->idAlbum = $idAlbum;
    }

    public function getIdAlbum(){
        return $this->idAlbum;
    }

    public function setIdImagem($idImagem){
        $this->idImagem = $idImagem;
    }

    public function getIdImagem(){
        return $this->idImagem;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getImagem(){
        return $this->imagem;
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
        return $this->descricao;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
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
 public function cadastrarGaleria(){
				
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
 public function editarGaleriaPorId($idAlbum){
		
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
 public function listarGaleria(){
	
	$sql = mysql_query("SELECT * FROM galeria_foto");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }

  /**************************************************************************
 Editar administrador por id
**************************************************************************/
 public function editarImagemPorId($idImagem){
		
	$sql = " UPDATE galeria_foto SET titulo='$this->titulo' ";	
	$sql.= " WHERE id_imagem='$idImagem' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarImagem&id_imagem=$idImagem');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
 
 

 /**************************************************************************
 lista alguns dados dos membros
**************************************************************************/
 public function listarGaleriaPorId($idImagem){
	
	$sql = mysql_query("SELECT * FROM galeria_foto WHERE id_imagem='$idImagem' ");
	
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