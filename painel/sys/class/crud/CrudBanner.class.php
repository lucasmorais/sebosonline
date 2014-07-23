<?php
/**************************************************************************
 Classe que irá realiazar operações de banner
 @autor: Tiago Matos de Abreu
 @data: 20/02/2014
**************************************************************************/
class CrudBanner{
    private $idBanner;
    private $idPagina;
    private $titulo;

    private $idImagem;
    private $link;
    private $imagem;

    public function setIdBanner($idBanner){
        $this->idBanner = $idBanner;
    }

    public function getIdBanner(){
        return $this->idBanner;
    }

    public function setIdPagina($idPagina){
        $this->idPagina = $idPagina;
    }

    public function getIdPagina(){
        return $this->idPagina;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function getTitulo(){
        return $this->titulo;
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

    public function setLink($link){
        $this->link = $link;
    }

    public function getLink(){
        return $this->link;
    }
	
/**************************************************************************
 Validação
**************************************************************************/
	
	public function validar(){
		

		
}//fim validar

/**************************************************************************
 Cadastrar
**************************************************************************/
 public function cadastrarBanner(){
				
	$sql = " INSERT INTO banner SET id_pagina='$this->idPagina', titulo='$this->titulo' ";	
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 
 /**************************************************************************
 Editar banner por id
**************************************************************************/
 public function editarBannerPorId($idBanner){
		
	$sql = " UPDATE banner SET titulo='$this->titulo' ";	
	$sql.= " WHERE id_banner='$idBanner' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarBanner&id_banner=$idBanner');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	

  /**************************************************************************
 Editar banner por id
**************************************************************************/
 public function editarImagemPorId($idImagem){
		
	$sql = " UPDATE banner_galeria SET link='$this->link' ";	
	$sql.= " WHERE id_imagem='$idImagem' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo '<script>alert("Dados atualizados com sucesso"); </script>';
	  echo "<script> window.location.replace('?pag=EditarBannerGaleriaImagem&id_imagem=$idImagem');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
 
 
 
/**************************************************************************
 Listar banner
**************************************************************************/
 public function listarBanner(){
	
	$sql = mysql_query("SELECT * FROM banner");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 Listar banner por id
**************************************************************************/
 public function listarBannerPorId($idBanner){
	
	$sql = mysql_query("SELECT * FROM banner WHERE id_banner='$idBanner'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
  /**************************************************************************
 Listar banner imagem por id
**************************************************************************/
 public function listarImagemPorId($idImagem){
	
	$sql = mysql_query("SELECT * FROM banner_galeria WHERE id_imagem='$idImagem'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/**************************************************************************
 Excluir banner por id
**************************************************************************/
public function excluirBannerPorId($idBanner){
 
 $sql = mysql_query("DELETE FROM banner WHERE id_banner='$idBanner'") or die(mysql_error());
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>