<?php
 /****************************************************************************
  Classe genérica para gerenciar contato sobre parceria pelo site
  @autor: Tiago Matos de Abreu
  @data: 13/01/2014
/****************************************************************************/
 class CrudContatoParceiro {
    private $idContato;
    private $email;
    private $assunto;
    private $mensagem;

    public function setIdContato($idContato){
        $this->idContato = $idContato;
    }

    public function getIdContato(){
        return $this->idContato;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setAssunto($assunto){
        $this->assunto = $assunto;
    }

    public function getAssunto(){
        return $this->assunto;
    }

    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }

    public function getMensagem(){
        return $this->mensagem;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }
	
/****************************************************************************
  tratar dados
  
/****************************************************************************/
 public function tratarDados(){
	
	
	
 }

/****************************************************************************
  Listar página
/****************************************************************************/
public function listarContatoParceiro(){
	
  $sql = mysql_query("SELECT * FROM contato_parceiro")or die(mysql_error());	
	
   if(mysql_num_rows($sql)<1){
	   
	   return 0;
   }
   else{
	   
	   return $sql;
   }
	
}

/**************************************************************************
 Apagar contato por id
**************************************************************************/
public function apagarContatoParceiroPorId($idContato){
 
 $sql = mysql_query("DELETE FROM contato_parceiro WHERE id_contato='$idContato'");
 
 if($sql == true){
  
  return true; 
  
 }else{
  
  return false; 
 }
  
}
	
	

	
} //fim da classe

?>