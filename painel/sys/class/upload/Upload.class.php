<?php
/**********************************************************************************************************************************************************
  Classe para fazer upload de imagens
  @autor: Marcelo Cavassani
  @data: 06/09/2014
**********************************************************************************************************************************************************/

  class Upload{
	  
	 public $pasta;
	 public $imagem;
	 public $nome;
	 public $nomeTemp;
	 public $tamanho;
	 public $tipo;
	 public $novoNome;
	 public $local;
	 
/*********************************************************************************************************************/
	  
	 //recebe a imagem do campo file
	 public function recebeImagem($imagem){
		 
		$this->imagem    = $imagem; 
		$this->nome      = $this->imagem['name'];
		$this->tipo      = $this->imagem['type'];
		$this->nomeTemp  = $this->imagem['tmp_name'];
		$this->tamanho   = $this->imagem['size'];
		
	 }
	 
/*********************************************************************************************************************/
		
		public function validarVazio(){
			
			if(empty($this->nome)){
		       echo '<div class="erro"> Selecione uma imagem </div>';
			   
			   return false;
		    }
			else{
				 
			  return true;
			}
		}

/*********************************************************************************************************************/
		
	public function validarTipo(){
		
		$permitido = array('jpg','jpeg','JPG','pjpeg','png','gif');
		$tipo   = $this->tipo;
	    $t      = explode('/',$tipo);
	    $type   = $t[1];
		
		if(array_search($type,$permitido) == false){
			
		   echo '<div class="erro"> Só é permitido uplaod de imagem </div>';
		   return false;
		}
		  else{
			  
			  return true;
		 }
	}
	
/*********************************************************************************************************************/
		
	public function validarTamanho(){
		
		//tamanho máximo permitido
		$t = 2.9;
		$max = $t*1024*1024;
		
	   //verifica se o arquivo não ultrapassou o limite
	   if($this->tamanho > $max){
		  
		   echo '<div class="erro"> O limite para upload é de '.$t.' MB </div>';
		    
			return false;
		  
	   }else{
		    
			/*  Se retornar a, executo a redimensionar  */
			return true;
	   }
	   
	}
	
/***********************************************************************************/	
	
	public function Redimensionar($largura,$altura,$pasta){
		
		 $imagem   = $this->imagem;
		 $name     = $this->nome;
		 $nameTemp = $this->nomeTemp;
		
		 /*  Recupera a extenção */
		  $ext  = substr($name,-4);
		   
		 /*  Gera um novo novo, e concatena com a extenção */
		 
		 if($imagem['type']=="image/JPG"){
			$ext  = '.jpg';
			$name = rand(0,99999999999).$ext; 
		 }
		  else{
			  
			 $name =  rand(0,99999999999).$ext; 
		  }
		 
		 if ($imagem['type']=="image/jpeg"){
			$img = imagecreatefromjpeg($imagem['tmp_name']);
		}
		elseif($imagem['type']=="image/jpg"){
			$img = imagecreatefromjpeg($imagem['tmp_name']);
		}
		
		else if ($imagem['type']=="image/pjpeg"){
			$img = imagecreatefromjpeg($imagem['tmp_name']);
		}
		else if ($imagem['type']=="image/gif"){
			$img = imagecreatefromgif($imagem['tmp_name']);
		}else if ($imagem['type']=="image/png"){
			$img = imagecreatefrompng($imagem['tmp_name']);
		}
		$x   = imagesx($img);
		$y   = imagesy($img);
		//$altura = ($largura * $y)/$x;
		
		$nova = imagecreatetruecolor($largura,$altura);
		imagecopyresampled($nova,$img,0,0,0,0,$largura,$altura,$x,$y);
		
		if ($imagem['type']=="image/jpeg"){
			$local="$pasta/$name";
			imagejpeg($nova, $local);
		}
		else if ($imagem['type']=="image/jpg"){
			$local="$pasta/$name";
			imagejpeg($nova, $local);
		}
		else if ($imagem['type']=="image/pjpeg"){
			$local="$pasta/$name";
			imagejpeg($nova, $local);
			
		}
		else if ($imagem['type']=="image/gif"){
			$local="$pasta/$name";
			imagejpeg($nova, $local);
		}else if ($imagem['type']=="image/png"){
			$local="$pasta/$name";
			imagejpeg($nova, $local);
		}		
		
		imagedestroy($img);
		imagedestroy($nova);	
		
	 
	 if(move_uploaded_file($nameTemp,$local)){
		 
		 echo '<div class="sucesso"> Imagem cadastrada com sucesso </div>';
		 return $this->nome = $name;
	 }
	 else{
		   echo '<div class="erro"> Falha ao cadastrar imagem </div>'; 
	 }
	}
	   
/*********************************************************************************************************************/ 
       
  }

?>