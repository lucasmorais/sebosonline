<?php
/*
 *Classe genérica para gerenciar sub páginas
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/



 class CrudSubPaginas {
    private $id;
    private $titulo;
    private $descricao;
	private $imagem;

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
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
	public function setImagem($imagem){
	   $this->imagem = $imagem;	
	}
	 public function getImagem(){
        return $this->imagem;
    }
	
/****************************************************************************
  tratar dados
  
/****************************************************************************/
 public function tratarDados(){
	
	$this->titulo    = strip_tags(trim($this->titulo));
	$this->descricao = trim(htmlentities($this->descricao));
	
 }
	
/****************************************************************************
  cadastra páginas
  
/****************************************************************************/

public function cadastrar(){
	
  $sql = mysql_query("INSERT INTO subpaginas SET titulo='$this->titulo',descricao='$this->descricao' ")or die(mysql_error());	
	
 if($sql == true){
	
	echo '<div class="sucesso"> Operação realizada com sucesso</div>'; 
 }
 else{
	 
	echo '<div class="erro"> Falha na operação</div>';  
 }
	
}
/**************************************************************************
 Listar paginas
**************************************************************************/
public function listarTodosSub(){
	
	$sql = mysql_query("SELECT * FROM subpaginas")or die(mysql_error());
	
	if(mysql_num_rows($sql) <1){
	 return 0;
	}else{
	 return $sql;	
	}
}
/****************************************************************************
  busca o titulo das páginas e id para poder listar e atualizar
  @return: 0 or sql
/****************************************************************************/
public function listarSubPaginas(){
	
  $sql = mysql_query("SELECT titulo,id FROM subpaginas")or die(mysql_error());	
	
   if(mysql_num_rows($sql)<1){
	   
	   return 0;
   }
   else{
	   
	   return $sql;
   }
	
}

/****************************************************************************
  editar páginas
  
/****************************************************************************/

public function editarSubPaginas($id){
	
  $sql = mysql_query("UPDATE subpaginas SET titulo='$this->titulo',descricao='$this->descricao' WHERE id='$id' ")or die(mysql_error());	
	
 if($sql == true){
	
	echo '<div class="sucesso"> Operação realizada com sucesso</div>'; 
	echo "<script> window.location.replace('?pag=edit-pagina&id=$id') </script>";
 }
 else{
	 
	echo '<div class="erro"> Falha na operação</div>';  
 }
	
}

/****************************************************************************
  busca pagina através do id
  @return: 0 or sql
/****************************************************************************/
public function buscarSubPaginaPorId($id){
	
  $sql = mysql_query("SELECT id,titulo,descricao FROM subpaginas WHERE id='$id'")or die(mysql_error());	
	
   if(mysql_num_rows($sql)<1){
	   
	   return 0;
   }
   else{
	   
	   return $sql;
   }
	
}

 /****************************************************************************
  busca pagina através do id
  @return: 0 or sql
/****************************************************************************/
public function buscarFotosPorIdSubPagina($idPagina){
	
  $sql = mysql_query("SELECT imagem FROM fotos WHERE id_pagina='$idPagina'")or die(mysql_error());	
	
   if(mysql_num_rows($sql)<1){
	   
	   return 0;
   }
   else{
	   
	   return $sql;
   }
	
}
	
	
	
}


?>