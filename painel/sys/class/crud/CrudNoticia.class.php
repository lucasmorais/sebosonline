<?php
/**************************************************************************
 Classe que irá realiazar operações de noticia
 @autor: Tiago Matos de Abreu
 @data: 04/11/2013
**************************************************************************/
class CrudNoticia {
    private $idNoticia;
    private $data;
	private $autor;
	private $titulo;
    private $noticia;
    private $imagem;

    public function setIdNoticia($idNoticia){
        $this->idNoticia = $idNoticia;
    }

    public function getIdNoticia(){
        return $this->idNoticia;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }
	
	  public function setAutor($autor){
        $this->autor = $autor;
    }

    public function getAutor(){
        return $this->autor;
    }
	
	 public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function setNoticia($noticia){
        $this->noticia = $noticia;
    }

    public function getNoticia(){
        return $this->noticia;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getImagem(){
        return $this->imagem;
    }


/**************************************************************************
 validação
**************************************************************************/
	
	public function validar(){
		
	  $cont= 0;	
	  $dados = array(
	   '0'=> $this->nome,
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
 Tratar dados
**************************************************************************/
 public function tratarDados(){
	
	
 }

/**************************************************************************
 Cadastrar
**************************************************************************/
 public function cadastrarNoticia(){
	
	$this->tratarDados();
		
	$sql = " INSERT INTO noticia SET data='$this->data', autor='$this->autor', titulo='$this->titulo', noticia='$this->noticia' ";
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
 public function editarComImg($idNoticia){
	
	$this->tratarDados();
		
	$sql = " UPDATE noticia SET titulo='$this->titulo', noticia='$this->noticia', imagem='$this->imagem' WHERE id_noticia='$idNoticia' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados atualizados com sucesso';
	  echo "<script> window.location.replace('?pag=EditarNoticia&id_noticia=$idNoticia');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	

 /**************************************************************************
 Editar noticia po id
**************************************************************************/
 public function editarNoticiaPorId($idNoticia){
		
	$sql = " UPDATE  noticia SET titulo='$this->titulo', noticia='$this->noticia' ";	
	$sql.= " WHERE id_noticia='$idNoticia' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarNoticia&id_noticia=$idNoticia');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
  
/**************************************************************************
 Lista noticia em ordem descrecente
**************************************************************************/
 public function listarNoticia(){
	
	$sql = mysql_query("SELECT * FROM noticia ORDER BY id_noticia");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 listar noticia por id
**************************************************************************/
 public function listarNoticiaPorId($idNoticia){
	
	$sql = mysql_query("SELECT * FROM noticia WHERE id_noticia='$idNoticia'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/**************************************************************************
 Excluir noticia por id
**************************************************************************/
public function excluirNoticiaPorId($idNoticia){
 
 $sql = mysql_query("DELETE FROM noticia WHERE id_noticia='$idNoticia'");
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>