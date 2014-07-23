<?php
/**********************************************************************************************************************************************************
  Fazer multiplo upload de produto
  @autor: Marcelo Cavassani
  @data: 09/06/2014
**********************************************************************************************************************************************************/
  class MultiuploadProduto{
	  
	 public $pasta;
	 public $imagem;
	 public $idImagem;
	 private $imagens;
	 private $miniatura;
	 public $nome;
	 public $nomeTemp;
	 public $tamanho;
	 public $tipo;
	 public $novoNome;
	 public $local;
	 public $cont;
	 public $idProduto;
	 public $erros;
	 public $envios;
	 public $sucesso;
	 
/*********************************************************************************************************************/
	  
	 //recebe a imagem do campo file
	 public function __construct($imagem){
		
		$this->imagem    = $imagem;
		$this->pasta     = 'uploads/';
		$this->cont      = 0;
		$this->erros     = 0;
		$this->envios    = 0;
		$this->sucesso   = 0;
	 }
	 
/*********************************************************************************************************************/
   
   public function setIdProduto($idProduto){
	   
	  $this->idProduto = $idProduto;
	   
   } 
   
   public function getIdProduto(){
	   
	   return $this->idProduto;
	   
   }
   
   public function setImagem($imagem){
	   
	  $this->imagem = $imagem; 
   }
   
   public function getImagem(){
	   
	   return $this->imagem;
   }
   
    public function setIdImagem($idImagem){
	   
	  $this->idImagem = $idImagem; 
   }
   
   public function getIdImagem(){
	   
	   return $this->idImagem;
   }
   
   public function setImagens($imagens){
	   
	   $this->imagens = $imagens;
   }
   
   public function getImagens(){
	   
	   return $this->imagens;
   }
 
/*********************************************************************************************************************/
  
	//conta a quamtidade de arquivos que vieram do formulário
	public function contar(){
      
	  //conta os arquivos pelo nome
	  $this->cont = count($this->imagem['name']);
   
	}

/*********************************************************************************************************************/
		
		public function validarVazio(){
			
			if($this->cont==0){
		       echo 'Selecione a(as) imagem(ns) para enviar.';
			   return false;
		    }else{ 
				 return true;
			}
		}
		
/*********************************************************************************************************************/
	
 public function validarTipo(){
	
	$aceito = array('image/jpg','image/jpeg','image/pjpeg','image/JPG','image/gif','image/GIF','image/png','image/PNG');		
	$this->tipo = $this->imagem['type'];
	
	$cont1 = count($aceito);
	$cont2 = count($this->tipo);
	
	for($i=0;$i<$cont1;$i++){
		
	  for($j=0;$j<$cont2;$j++){
		   
		 /* Faz a verificação se os arquivos correspondem ao tipo aceito*/
		 if($aceito[$i] == $this->tipo[$j]){
			  $this->sucesso++; 
		 }
	  }
	}
 }
		
/*********************************************************************************************************************/

 public function receberImagens(){

	  if($this->cont == $this->sucesso){
		
		/* Recebe os n arquivos*/
		for($i=0;$i<$this->cont;$i++){
			
			$this->nome     = $this->imagem['name'][$i];
			$this->nomeTemp = $this->imagem['tmp_name'][$i];
			$this->tamanho  = $this->imagem['size'][$i];
			$this->tipo     = $this->imagem['type'][$i];
			
			/*Verifica a cada loop, se os dois métodos retornaram true*/
			if($this->validarTamanho()==true){
				
			if(move_uploaded_file($this->nomeTemp,$this->pasta.$this->nome)){
				
			 $this->envios++;		
			 /*Posso executar o método redimensionar*/
			 $img = $this->carregar_imagem($this->pasta.$this->nome,$this->tipo);
			 
			 /*Salvar todas imagens com essa extenção*/
			 $ext = '.jpg';
			 
				if ($img) {
					$dir = 'uploads/';
					$nome = md5(uniqid(rand(), 1));
					
					/*Executo o método inserir, tanto faz a quantidade de imagens que deseja gerar a partir de uma única
					*imagem, esse método insere o mesmo nome na base de dados
					*só muda a estrutura de diretórios
					*quando for ler essas imagens
					*/
					$this->inserir($nome.$ext,$this->idProduto);

					flush();
					
					/*Para redimensionar a mesma imagem, mais de 1 vez seguida, é preciso estar em diretórios diferentes*/
					$this->criar_miniatura($img,160,$dir.'produto/miniatura/'.$nome);
					$this->criar_miniatura($img,1300,$dir.'produto/original/'.$nome);
					
					imagedestroy($img);
					
					/* Esvazia da memória a cada looop*/
					@unlink($this->nomeTemp);
					@unlink($this->tipo);
					
					/*O arquivo é movido para pasta, de lá são feitos os redimensionamentos, então é preciso apagar o arquivo
					 *depois de terminada cada alteração
					 *caso contrário, ficará sujeira, algo inutil no diretório.
					*/
					@unlink($this->pasta.$this->nome);
					
				}//if carregar img
				
			 }//fim move_uploaded
			 else{
				 
				 $this->erros++;
			 }
			 
		  }//validarTamnho
		  
		 }//fim for
		 
		}//validar tipo
		else{
		  	
		echo 'Por favor, selecione imagens para enviar';
		}
 }
 
/*********************************************************************************************************************/
		
	public function validarTamanho(){
		
		//tamanho máximo permitido
		$t = 8;
		$max = $t*1024*1024;
		
	   //verifica se o arquivo não ultrapassou o limite
	   if($this->tamanho > $max){
		  
			return false;
		  
	   }else{
			/*  Se retornar true, executo a redimensionar  */
			return true;
	   }
	   
	}
		   
/*********************************************************************************************************************/ 
 public function exibirMensagem(){
	 
 if($this->envios>0){
	echo'<br>Imagens envidas sucesso!</br>';
 }
   if($this->erros){
	  echo'<br>Imagens não envidas, ERRO: '.$this->erros.'</br>'; 
   }
 }
   
/*********************************************************************************************************************/  
 public function carregar_imagem($arquivo, $tipo) {
	if ($tipo == 'image/jpeg' || $tipo == 'image/pjpeg' || $tipo == 'image/jpg')
		return imagecreatefromjpeg($arquivo);
	elseif ($tipo == 'image/png')
		return imagecreatefrompng($arquivo);
	elseif ($tipo == 'image/gif')
		return imagecreatefromgif($arquivo);
}

// criar_miniatura(OBJETO_IMAGEM, TAMANHO, NOME);
 public function criar_miniatura($i, $s, $nome) {
	$o_x = imagesx($i); // largura original
	$o_y = imagesy($i); // altura original

	$m_x = $s;
	$m_y = $s;
	if ($o_x <= $s && $o_y <= $s) {
		$m_x = $o_x;
		$m_y = $o_y;
	}
	elseif ($s>100) {
		if ($o_x > $o_y)
			$m_y = round($o_y / ($o_x / $m_x));
		else if ($o_y > $o_x)
			$m_x = round($o_x / ($o_y / $m_y));
	}

	$mini = imagecreatetruecolor($m_x, $m_y);

	imagealphablending($mini, true); // Definir que a imagem aceita transparência
	imagefill($mini, 0, 0, 0xFFFFFF); // Pintar o fundo de branco (caso a imagem carregada tenha transparência)

	imagecopyresampled($mini, $i, 0, 0, 0, 0, $m_x, $m_y, $o_x, $o_y);
	imagejpeg($mini, $nome.'.jpg', 75);
	
	imagedestroy($mini);
}

/*********************************************************************************************************************/ 
public function redimensionar_imagem($i, $larg, $alt) {
	$o_x = imagesx($i); // largura original
	$o_y = imagesy($i); // altura original

	$mini = imagecreatetruecolor($larg, $alt);

	imagealphablending($mini, true); // Definir que a imagem aceita transparência
	imagefill($mini, 0, 0, 0xFFFFFF); // Pintar o fundo de branco (caso a imagem carregada tenha transparência)

	imagecopyresampled($mini, $i, 0, 0, 0, 0, $larg, $alt, $o_x, $o_y);
	
	return $mini;
}
 
/*********************************************************************************************************************/ 
public function inserir($foto,$idProduto){
	   
	  $in = mysql_query("INSERT INTO galeria_produto SET id_produto='$idProduto',imagem='$foto' ") or die(mysql_error()); 
	  
	  if($in===true){ 
		  
		  $this->envios++;
	  }
	  else{
		  
		  $this->erro++;
	  }
	  
   }
   
/*********************************************************************************************************************/ 
public function listarImagem($idProduto){
	
 $sql = mysql_query("SELECT id_imagem, imagem FROM galeria_produto WHERE id_produto='$idProduto' ")or die(mysql_error());
 
 if(mysql_num_rows($sql)<1){
	
	return 0; 
 }
 else{
	 
	 return $sql;
 }
	
}

/*********************************************************************************************************************/ 
public function apagarImagem($idImagem,$idProduto){

 $sqlNome = mysql_query("SELECT imagem FROM galeria_produto WHERE id_imagem='$idImagem' ");
 $sql     = mysql_query("DELETE FROM galeria_produto WHERE id_imagem='$idImagem' ")or die(mysql_error());
 
  if($sql==true){
	  
	$this->apagarFotoDaPasta($sqlNome);
    echo "<script>window.location.replace('?pag=EditarProduto&id_produto=$idProduto')</script>";
  
  }
  else{
	 return 0; 
  }
	
}

/*********************************************************************************************************************/ 
public function apagarFotoDaPasta($sql){
	
 
 $pasta1 = 'uploads/produto/miniatura/';
 $pasta2 = 'uploads/produto/original/';
 
 if(mysql_num_rows($sql) >0){
	
	$qr  = mysql_fetch_assoc($sql);
	$img = $qr['imagem'];
	
	unlink($pasta1.$img);
	unlink($pasta2.$img);
 }
 
	
}

/*********************************************************************************************************************/ 

   public function __destruct(){
	   
	   
   }
       
  }

?>