<?php
    include('class/crud/CrudConfig.class.php');
       
    
  $listarConfig = new CrudConfig();
  $idSite     = '1';
  
  if($listarConfig->listarConfigPorId($idSite)==0){
     
     echo 'Nenhuma informação encontrada'; 
     
  }else{
      $sql = $listarConfig->listarConfigPorId($idSite);
      
      $qr  = mysql_fetch_assoc($sql);
      
        $listarConfig->setIdSite($qr['id_site']);
        $listarConfig->setNome($qr['nome']);
        $listarConfig->setUrl($qr['url']);
        $listarConfig->setRazaoSocial($qr['razao_social']);
        $listarConfig->setCEP($qr['cep']);
        $listarConfig->setCidade($qr['cidade']);    
        $listarConfig->setEstado($qr['estado']);    
        $listarConfig->setEndereco($qr['endereco']);  
        $listarConfig->setN($qr['n']);
        $listarConfig->setFax($qr['fax']);
        $listarConfig->setTelefone($qr['telefone']);
        $listarConfig->setTelefone2($qr['telefone2']);
        $listarConfig->setCelular($qr['celular']);
        $listarConfig->setCelular2($qr['celular2']);
        $listarConfig->setCelular3($qr['celular3']);
        $listarConfig->setCelular4($qr['celular4']);
        $listarConfig->setEmail($qr['email']);
        $listarConfig->setHorarioComercial($qr['horario_comercial']);
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Consulta de CEP - por rafaelWendel.com</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
        <script type='text/javascript' src='http://tiagoabreu.com/site/cep.js'></script>
 
         <script>
    /*Funcao para validar campos vazios*/
    function validar(f)
    {
        
        if (f.nome.value == '' )    /*Passa o nome do campo como parametro*/
        {
            window.alert("Informe o nome ");
            f.nome.focus();
            return false;
        }
    }
</script>
    </head>
    <body>
        <h1>Preenchimento automático com consulta de CEP - por <a href="http://www.rafaelwendel.com" title="Visite o blog www.rafaelwendel.com">rafaelWendel.com</a></h1>
        <form id="form1" class="form1" method="post">
            <label>CEP (Somente números):</label><br />
            <input type="text" name="cep" id="cep" maxlength="8" />
 
            <br /><br />
 
            <label>Rua:</label><br />
            <input type="text" name="rua" id="rua" size="45" />
 
            <br /><br />
 
            <label>Número:</label><br />
            <input type="text" name="numero" id="numero" size="5" />
 
            <br /><br />
 
            <label>Bairro:</label><br />
            <input type="text" name="bairro" id="bairro" size="25" />
 
            <br /><br />
 
            <label>Cidade:</label><br />
            <input type="text" name="cidade" id="cidade" size="25" />
 
            <br /><br />
 
            <label>Estado:</label><br />
            <input type="text" name="estado" id="estado" size="2" />
 
            <br /><br />
 
            <input type="submit" value="Salvar Dados" />
 
        </form>
    </body>
</html>

 <?php

    if(isset($_POST['acao'])){
    
    $editarConfig = new CrudConfig();
 
            $idSite    = '1';
            $editarConfig->setNome($_POST['nome']);
            $editarConfig->setUrl($_POST['url']);
            $editarConfig->setRazaoSocial($_POST['razao_social']);
            $editarConfig->setCEP($_POST['cep']);
            $editarConfig->setCidade($_POST['cidade']);
            $editarConfig->setEstado($_POST['estado']);
            $editarConfig->setEndereco($_POST['bairro']);
            $editarConfig->setN($_POST['n']);
            $editarConfig->setFax($_POST['fax']);
            $editarConfig->setTelefone($_POST['telefone']);
            $editarConfig->setTelefone2($_POST['telefone2']);
            $editarConfig->setCelular($_POST['celular']);
            $editarConfig->setCelular2($_POST['celular2']);
            $editarConfig->setCelular3($_POST['celular3']);
            $editarConfig->setCelular4($_POST['celular4']);
            $editarConfig->setEmail($_POST['email']);
            $editarConfig->setHorarioComercial($_POST['horario_comercial']);
                    
            $editarConfig->editarConfigPorId($idSite);  
        }   
    ?>
