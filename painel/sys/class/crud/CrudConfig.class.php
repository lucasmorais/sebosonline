<?php
/**************************************************************************
 Classe que irá realiazar operações de configurações
 @autor: Tiago Matos de Abreu
 @data: 16/12/2013
**************************************************************************/
class CrudConfig {
    private $idSite;
    private $nome;
	private $url;
	private $razaoSocial;
    private $cep;
    private $cidade;
    private $estado;
    private $bairro;
    private $rua;
    private $n;
    private $fax;
    private $telefone;
    private $telefone2;
    private $celular;
    private $celular2;
    private $celular3;
    private $celular4;
    private $email;
    private $horarioComercial;
    private $diaUtil;

    private $facebook;
    private $youtube;
    private $twitter;
    private $tumblr;
    private $linkedin;


    public function setIdSite($idSite){
        $this->idSite = $idSite;
    }

    public function getIdSite(){
        return $this->idSite;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }
	
	  public function setUrl($url){
        $this->url = $url;
    }

    public function getUrl(){
        return $this->url;
    }
	
	 public function setRazaoSocial($razaoSocial){
        $this->razaoSocial = $razaoSocial;
    }

    public function getRazaoSocial(){
        return $this->razaoSocial;
    }

    public function setCEP($cep){
        $this->cep = $cep;
    }

    public function getCEP(){
        return $this->cep;
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

    public function setBairro($bairro){
        $this->bairro = $bairro;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setRua($rua){
        $this->rua = $rua;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setN($n){
        $this->n = $n;
    }

    public function getN(){
        return $this->n;
    }

    public function setFax($fax){
        $this->fax = $fax;
    }

    public function getFax(){
        return $this->fax;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone2($telefone2){
        $this->telefone2 = $telefone2;
    }

    public function getTelefone2(){
        return $this->telefone2;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setCelular2($celular2){
        $this->celular2 = $celular2;
    }

    public function getCelular2(){
        return $this->celular2;
    }

    public function setCelular3($celular3){
        $this->celular3 = $celular3;
    }

    public function getCelular3(){
        return $this->celular3;
    }

    public function setCelular4($celular4){
        $this->celular4 = $celular4;
    }

    public function getCelular4(){
        return $this->celular4;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setHorarioComercial($horarioComercial){
        $this->horarioComercial = $horarioComercial;
    }

    public function getHorarioComercial(){
        return $this->horarioComercial;
    }

    public function setDiaUtil($diaUtil){
        $this->diaUtil = $diaUtil;
    }

    public function getDiaUtil(){
        return $this->diaUtil;
    }

    public function setFacebook($facebook){
        $this->facebook = $facebook;
    }

    public function getFacebook(){
        return $this->facebook;
    }

    public function setYoutube($youtube){
        $this->youtube = $youtube;
    }

    public function getYoutube(){
        return $this->youtube;
    }

    public function setTwitter($twitter){
        $this->twitter = $twitter;
    }

    public function getTwitter(){
        return $this->twitter;
    }

    public function setTumblr($tumblr){
        $this->tumblr = $tumblr;
    }

    public function getTumblr(){
        return $this->tumblr;
    }

    public function setLinkedin($linkedin){
        $this->linkedin = $linkedin;
    }

    public function getLinkedin(){
        return $this->linkedin;
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
 public function cadastrarConfig(){
	
	$this->tratarDados();
		
	$sql = " INSERT INTO configuracao SET nome='$this->nome', url='$this->url', razao_social='$this->razaoSocial', cep='$this->cep', cidade='$this->cidade', estado='$this->estado', rua='$this->rua', bairro='$this->bairro', n='$this->n', ";
	$sql.= " fax='$this->fax' , telefone='$this->telefone', telefone2='$this->telefone2', celular='$this->celular', celular2='$this->celular2', celular3='$this->celular3', celular4='$this->celular4', email='$this->email', horario_comercial='$this->horarioComercial', dia_util='$this->diaUtil', facebook='$this->facebook', youtube='$this->youtube', twitter='$this->twitter', tumblr='$this->tumblr', linkedin='$this->linkedin' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 
 /**************************************************************************
 Editar noticia po id
**************************************************************************/
 public function editarConfigPorId($idSite){
		
	$sql = " UPDATE configuracao SET nome='$this->nome', url='$this->url', razao_social='$this->razaoSocial', cep='$this->cep', cidade='$this->cidade', estado='$this->estado', rua='$this->rua', bairro='$this->bairro', n='$this->n', ";
	$sql.= " fax='$this->fax' , telefone='$this->telefone', telefone2='$this->telefone2', celular='$this->celular', celular2='$this->celular2', celular3='$this->celular3', celular4='$this->celular4', email='$this->email', horario_comercial='$this->horarioComercial', dia_util='$this->diaUtil', facebook='$this->facebook', youtube='$this->youtube', twitter='$this->twitter', tumblr='$this->tumblr', linkedin='$this->linkedin' ";
	$sql.= " WHERE id_site='$idSite' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo "Dados atualizados com sucesso"; 
	  echo "<script> window.location.replace('?pag=EditarConfig');</script>";
	  
	}else{
	   echo '<script>alert("Falha ao atualizar"); </script>';
	}
 }	
  
/**************************************************************************
 Lista noticia em ordem descrecente
**************************************************************************/
 public function listarConfig(){
	
	$sql = mysql_query("SELECT * FROM configuracao ORDER BY id_site DESC");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
 /**************************************************************************
 listar noticia por id
**************************************************************************/
 public function listarConfigPorId($idSite){
	
	$sql = mysql_query("SELECT * FROM configuracao WHERE id_site='$idSite'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/**************************************************************************
 Excluir noticia por id
**************************************************************************/
public function excluirConfigPorId($idSite){
 
 $sql = mysql_query("DELETE FROM configuracao WHERE id_site='$idSite'");
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>