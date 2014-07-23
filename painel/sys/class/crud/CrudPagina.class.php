<?php
 /****************************************************************************
  Classe genérica para gerenciar página
  @autor: Tiago Matos de Abreu
  @data: 19/11/2013
/****************************************************************************/
 class CrudPagina {
    private $idPagina;
    private $titulo;
    private $resumo;
    private $conteudo;
    private $imagem;

    private $textAux1;
    private $textAux2;
    private $textAux3;
    private $textAux4;

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

    public function setResumo($resumo){
        $this->resumo = $resumo;
    }

    public function getResumo(){
        return $this->resumo;
    }

    public function setConteudo($conteudo){
        $this->conteudo = $conteudo;
    }

    public function getConteudo(){
        return $this->conteudo;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function setTextAux1($textAux1){
        $this->textAux1 = $textAux1;
    }

    public function getTextAux1(){
        return $this->textAux1;
    }
	
    public function setTextAux2($textAux2){
        $this->textAux2 = $textAux2;
    }

    public function getTextAux2(){
        return $this->textAux2;
    }

    public function setTextAux3($textAux3){
        $this->textAux3 = $textAux3;
    }

    public function getTextAux3(){
        return $this->textAux3;
    }

    public function setTextAux4($textAux4){
        $this->textAux4 = $textAux4;
    }

    public function getTextAux4(){
        return $this->textAux4;
    }
/****************************************************************************
  tratar dados
  
/****************************************************************************/
 public function tratarDados(){
	
	$this->titulo    = strip_tags(trim($this->titulo));
	$this->descricao = trim(htmlentities($this->conteudo));
	
 }
	
/****************************************************************************
  Cadastrar página
  
/****************************************************************************/

public function cadastrarPagina(){
	
  $sql = mysql_query("INSERT INTO pagina SET titulo='$this->titulo',conteudo='$this->conteudo' ")or die(mysql_error());	
	
 if($sql == true){
	
	echo 'Operação realizada com sucesso.'; 
 }
 else{
	 
	echo 'Falha na operação.';  
 }
	
}

/****************************************************************************
  Listar página
/****************************************************************************/
public function listarPagina(){
	
  $sql = mysql_query("SELECT * FROM pagina")or die(mysql_error());	
	
   if(mysql_num_rows($sql)<1){
	   
	   return 0;
   }
   else{
	   
	   return $sql;
   }
	
}

/****************************************************************************
  Editar página
  
/****************************************************************************/

public function editarPagina($idPagina){
	
  $sql = mysql_query("UPDATE pagina SET titulo='$this->titulo', resumo='$this->resumo', conteudo='$this->conteudo' WHERE id_pagina='$idPagina' ")or die(mysql_error());	
	
 if($sql == true){
	
	echo '<div class="sucesso"> Operação realizada com sucesso</div>'; 
	echo "<script> window.location.replace('?pag=EditarPagina&id_pagina=$idPagina') </script>";
 }
 else{
	 
	echo '<div class="erro">Falha na operação</div>';  
 }
	
}

/****************************************************************************
 
/****************************************************************************/
public function listarImagemPorIdPagina($idPagina){
  
  $sql = mysql_query("SELECT imagem FROM imagem WHERE id_pagina='$idPagina'")or die(mysql_error());  
  
   if(mysql_num_rows($sql)<1){
     
     return 0;
   }
   else{
     
     return $sql;
   }
  
}

/****************************************************************************
  Listar texto auxiliar por id
/****************************************************************************/
public function listarTextAuxPorId($idPagina){
  
  $sql = mysql_query("SELECT * FROM pagina WHERE id_pagina = '$idPagina' ")or die(mysql_error());  
  
   if(mysql_num_rows($sql)<1){
     
     return 0;
   }
   else{
     
     return $sql;
   }
}

/****************************************************************************
  Editar texto auxiliar por id
/****************************************************************************/
public function editarTextoAuxPorId($idPagina){
  
  $sql = mysql_query("UPDATE pagina SET text_aux1='$this->textAux1', text_aux2='$this->textAux2', text_aux3='$this->textAux3', text_aux4='$this->textAux4' WHERE id_pagina='$idPagina' ")or die(mysql_error());  
  
   if($sql == true){
  
  echo '<div class="sucesso"> Operação realizada com sucesso</div>'; 
  echo "<script> window.location.replace('?pag=EditarTextAux&id_pagina=$idPagina') </script>";
 }
 else{
   
  echo '<div class="erro">Falha na operação</div>';  
 }
}

/****************************************************************************
  Busca pagina através do id
/****************************************************************************/
public function buscarPaginaPorId($idPagina){
	
  $sql = mysql_query("SELECT * FROM pagina WHERE id_pagina='$idPagina'")or die(mysql_error());	
	
   if(mysql_num_rows($sql)<1){
	   
	   return 0;
   }
   else{
	   
	   return $sql;
   }
	
}
		
}//fim da classe

?>