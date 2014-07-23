<?php 
  include('sys/class/crud/CrudAdmin.class.php');
  include('sys/include/redirecionar.php');				
?>  

<div id="geral">
<!-- Listar todos os administradores -->
 <form method="post" enctype="multipart/form-data" onsubmit="return confirm('Deseja realmente excluir?')">
 <table id="rounded-corner" summary="Mostrar todos os administradores">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Nome</th>
            <th scope="col" class="rounded">E-mail</th>
            <th scope="col" class="rounded">Último Acesso</th>
            <th scope="col" class="rounded">Editar</th>
            <th scope="col" class="rounded-q4">Deletar</th>
        </tr>
    </thead>
       
    <tbody>
 
 <?php 
  
  //include('class/crud/ConsultaAdmin.class.php');
    $admin = new CrudAdmin();
    $cont = '0';
	  if($admin->listarAdmin()==0){
		
		echo 'Nenhum administrador encontrado'; 
	  }else{
		  
		 $sql = $admin->listarAdmin();
		 
		 while($qr = mysql_fetch_assoc($sql)){

	  $admin->setIdAdmin($qr['id_admin']);
		$admin->setPrimeiroNome($qr['primeiro_nome']);
		$admin->setUltimoNome($qr['ultimo_nome']);
		$admin->setEmail($qr['email']);

    $idAdminMaster = $admin->getIdAdmin();

    if ($idAdminMaster != '0'){ //exibi todos os administradores menos o id = 0 que pertence ao master

  ?>
 <tr>
    <td><input type="checkbox" name="UIDL"/></td>
    <td><?php echo $admin->getPrimeiroNome(); ?> <?php echo $admin->getUltimoNome(); ?></td>
    <td><?php echo $admin->getEmail(); ?></td>
    <td>00/00/0000</td>

    <td><a href="?pag=EditarAdmin&id_admin=<?php echo $admin->getIdAdmin(); ?>"><img src="images/icones/editar-usuario.png"></a> </td>
    <td> 
     <input type="hidden" name="excluirAdmin" value="<?php echo $admin->getIdAdmin(); ?>" />
  	 <input type="image" src="images/icones/lixeira.png" />
    </td>
 </tr>
  <?php 
      $cont++; 
		}//fim do if
  	} //fim do while
  } //fim do if do admin master
  ?>
  </tbody>

    <tfoot>
      <tr>
          <td colspan="5" class="rounded-foot-left"><em>Total de <?php echo $cont; ?> administradores cadastrados.</em></td>
          <td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
</table>
</form>

<a href="?pag=CadastrarAdmin" class="bt_green"><span class="bt_green_lft"></span><strong>Adicionar novo</strong><span class="bt_green_r"></span></a>
<a href="#" class="bt_blue" onclick="CheckAll()"><span class="bt_blue_lft"></span><strong>Selecionar todos</strong><span class="bt_blue_r"></span></a>
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Deletar selecionados</strong><span class="bt_red_r"></span></a> 
     
 <?php
 
  if(isset($_POST['excluirAdmin'])){
	  
	 $idAdmin =  $_POST['excluirAdmin'];
	 
	$excluirAdmin = new CrudAdmin();
   if ($excluirAdmin->excluirAdminPorId($idAdmin)==true){
	  
	  echo '<script> alert("Excluido com sucesso"); </script>'; 
	  echo '<script> window.location.replace("?pag=ListarAdmin") </script>';
	  
   }else{
	   
	   echo '<script> alert("Falha ao excluir"); </script>'; 
   }
	  
 }

 ?>

</div><!--geral-->
