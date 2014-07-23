<?php
/**********************************************************************************************************************************************************
  classe para redimensionar imagens
  @autor: Marcelo Cavassani
  @data: 06/09/2014
**********************************************************************************************************************************************************/


function Redimensionar($imagem,$largura,$pasta){
         
		 $tmp    = $imagem['tmp_name'];
		 $name   = $imagem['name'];
		 
		 /* Altera o nome do arquivo*/
		 $ext   = substr($name,-4);
		 $name  = date("dmYHiS").$ext;
		
		if ($imagem['type']=="image/jpeg"){
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
		$autura = ($largura * $y)/$x;
		
		$nova = imagecreatetruecolor($largura, $autura);
		imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $autura, $x, $y);
		
		if ($imagem['type']=="image/jpeg"){
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
	 
	 if(move_uploaded_file($tmp,$local)){
		 
		 echo 'Enviada com sucesso';
		 return $local;
	 }
	 else{
		    echo 'Falha ao enviar';  
	 }
	
}

 function receberArq($imagem){
	 
	 $imagem = $_FILES['img'];
	 $nome   = $imagem['name'];
	 
	 if(empty($nome)){
		 
		 echo'<h2 align="left"style="color:red"> Seleciona uma imagem <h2>';
	 }
	 else{
		 
         return $imagem;
	}
	 
 }


?>