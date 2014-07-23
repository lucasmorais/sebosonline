<?php include("header.php"); ?>
<div class="global">
    <!--content-->
        <section class="formBox">
            <div class="container">
                <div class="row">
                   <article class="col-lg-8 col-md-8 col-sm-8 contactBox2">
                   <div class="fundo">

                        <h2>Crie Sua Conta</h2>
                        
                        <form method="POST">
                            <!-- <div class="success-message">Contact form submitted.</div> -->
                            <div class="holder">
                                <div class="form-div-1 clearfix">
                                    <label class="name">
                                        <input type="text" name="nome" placeholder="* Nome:" data-constraints="@Required @JustLetters" />
                                        <span class="empty-message">*Este Campo é requerido.</span>
                                        <span class="error-message">*Não é um nome Valido.</span>
                                    </label>
                                </div>
                            </div>
                            <div class="holder">                                
                                <div class="form-div-2 clearfix">
                                    <label class="email">
                                        <input type="text" name="email" placeholder="* Email:" data-constraints="@Required @Email" />
                                        <span class="empty-message">*Este Campo é requerido.</span>
                                        <span class="error-message">*Não é um nome Valido.</span>
                                    </label>
                                </div>
                            </div>
                            <div class="holder">
                                <div class="form-div-3 clearfix">
                                    <label class="phone notRequired">
                                        <input type="text" name="telefone" placeholder="Telefone:" />
                                        <span class="empty-message">*Este Campo é requerido.</span>
                                        <span class="error-message">*Não é um nome Valido.</span>
                                    </label>
                                </div>
                            </div>
                             <div class="holder">
                                <div class="form-div-3 clearfix">
                                    <label class="phone">
                                        <input type="text" name="cep" placeholder="* CEP:" data-constraints="@Required @JustNumbers"/>
                                        <span class="empty-message">*Este Campo é requerido.</span>
                                        <span class="error-message">*Não é um nome Valido.</span>
                                    </label>
                                </div>
                            </div>
                            <div class="holder">
                                <div class="form-div-3 clearfix">
                                    <label class="phone">
                                        <input type="text" name="senha" placeholder="* Senha:" />
                                        <span class="empty-message">*Este Campo é requerido.</span>
                                        <span class="error-message">*Não é um nome Valido.</span>
                                    </label>
                                </div>
                            </div>
                            <!-- <div class="form-div-4 clearfix">
                                <label class="message">
                                    <textarea placeholder="Message*:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                                        <span class="empty-message">*Este Campo é requerido.</span>
                                        <span class="error-message">*Não é um nome Valido.</span>
                                </label>
                            </div> -->
       
                                <input type="submit" name="cadastrarCliente" class="btn-default btn1" value= "Cadastrar"/>
                                <p>* São Campos necessarios para cadastro</p>
              
                        </form>
                        </div>
                    </article>
                </div>
            </div>
        </section>


</div>

<?php
  if(isset($_POST['cadastrarCliente'])){
  
     $nome = $_POST['nome'];
	 $email = $_POST['email'];
     $telefone = $_POST['telefone'];
     $cep = $_POST['cep'];
     $senha = $_POST['senha'];
     
     $sql = mysql_query("INSERT INTO cliente SET nome='$nome', email='$email', telefone='$telefone',cep='$cep', senha='$senha' ");
	 $query = mysql_fetch_array($sql);
	
	if($sql == true){
		
	  echo '<script>alert("CLiente Cadastrado com sucesso!!!!!"); </script>';
	  
	}else{
	   echo '<script>alert("Ocorreu um erro ao cadastrar o cliente!"); </script>';
	}    
 }
?>
<?php include("footer.php"); ?>