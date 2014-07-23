<?php
/**
 *Classe que irá realizar operações de Cadastrar Listar e Excluir produto
 *@autor: Marcelo Cavassani
 *@data: 18/06/2014
**/
class CrudProduto {
    private $idProduto;
	private $estante;
	private $codbarra;
	private $quantidade;
	private $autor;
	private $titulo;
	private $editora;
	private $ano;
	private $preco;
	private $descricao;
	private $peso;
	private $idioma;
	private $tipo;
	private $imagem;

    public function setIdProduto($idProduto){
        $this->idProduto = $idProduto;
    }

    public function getIdProduto(){
        return $this->idProduto;
    }

    public function setEstante($estante){
        $this->estante = $estante;
    }

    public function getEstante(){
        return $this->estante;
    }
	
	public function setCodBarra($codbarra){
        $this->estante = $codbarra;
    }

    public function getCodBarra(){
        return $this->codbarra;
    }
	
	public function setQuantidade($quantidade){
        $this->estante = $quantidade;
    }

    public function getQuantidade(){
        return $this->quantidade;
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
	
    
	public function setEditora($editora){
        $this->editora = $editora;
    }

    public function getAEditora(){
        return $this->Editora;
    }
	public function setAno($ano){
        $this->ano = $ano;
    }

    public function getAno(){
        return $this->ano;
    }
	public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }
	
	public function setPeso($peso){
		$this->peso = $peso;
	}
	public function getPeso(){
		return $this->peso;
	}
	public function setIdioma($idioma){
		$this->idioma = $idioma;
	}
	public function getIdioma(){
		return $this->idioma;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}
	
	public function setImagem($imagem){ 
		 $this->imagem = $imagem;
	 }

 	public function getImagem(){
		 return $this->imagem;	 
	 }
/***************************************************************************************************
 											validação
****************************************************************************************************/
	
	public function validar(){
		
	  $cont= 0;	
	  $dados = array(
	   '0'=> $this->nome
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

/***************************************************************************************************
 										Tratar dados
****************************************************************************************************/
 public function tratarDados(){
	
	
 }

/***************************************************************************************************
 								Método Cadastrar Produto no BD
****************************************************************************************************/
 public function cadastrarProduto($img){
	
	$this->tratarDados();
		
	$sql = " INSERT INTO produto SET id_produto='$this->idProduto', estante='$this->estante', cod_barra='$this->codbarra',
	 quantidade='$this->quantidade', autor='$this->autor', titulo='$this->titulo',editora='$this->editora',  ano='$this->ano',
	 preco='$this->preco', descricao='$this->descricao',peso='$this->peso', idioma='$this->idioma',tipo='$this->tipo' ,
	 imagem='$this->imagem' ";
	  
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados cadastrados com sucesso';
	  
	}else{
	   echo 'Falha ao cadastrar';
	}
 }	
 
 /***************************************************************************************************
 								Método para editar produto por id
****************************************************************************************************/
 public function editarProdutoPorId($idProduto){
		
	$sql = " UPDATE  produto SET id_produto='$this->idProduto', estante='$this->estante', cod_barra='$this->codbarra',
	 quantidade='$this->quantidade', autor='$this->autor', titulo='$this->titulo',editora='$this->editora',  ano='$this->ano',
	 preco='$this->preco', descricao='$this->descricao',peso='$this->peso', idioma='$this->idioma',tipo='$this->tipo' ,
	 imagem='$this->imagem' ";
	$sql.= " WHERE id_produto='$idProduto' ";
	$query = mysql_query($sql)or die(mysql_error());
	
	if($query == true){
		
	  echo 'Dados do produto atualizados com sucesso!';
	  echo "<script> window.location.replace('?pag=EditarProduto&id_produto=$idProduto');</script>";
	  
	}else{
	   echo 'Falha ao editar produto!';
	}
 }	
  
/***************************************************************************************************
 						Método para listar produto em ordem descrecente
****************************************************************************************************/
 public function listarProduto(){
	
	$sql = mysql_query("SELECT * FROM produto ORDER BY id_produto DESC");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }

 /***************************************************************************************************
 							Método para listar produto por id
****************************************************************************************************/
 public function listarProdutoPorId($idProduto){
	
	$sql = mysql_query("SELECT * FROM produto WHERE id_produto='$idProduto'");
	
	if(mysql_num_rows($sql) <1){
		
		return 0;
		
	}else{
		return $sql;
	}
 }
 
/***************************************************************************************************
 							Método para excluir produto por id
****************************************************************************************************/
public function excluirProdutoPorId($idProduto){
 
 $sql = mysql_query("DELETE FROM produto WHERE id_produto='$idProduto'");
 
 if($sql == true){
	
	return true; 
	
 }else{
	
	return false; 
 }
	
}
	
}//fim da classe

?>