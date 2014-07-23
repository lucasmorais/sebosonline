<?php
/**********************************************************************************************************************
  Classe responsável pelo email
  @autor: Marcelo Cavassani
  @data: 09/06/2014
**********************************************************************************************************************/
$nome   =   'Angelo'; //pega o nome do remetente
$email  = 'asdadasdasdas'; //pega o email do remetente
$receptor = 'angelo.a.novello@hotmail.com'; //seu email

$mensagem = 'Segue a senha'; //mensagem
$assunto = 'Recuperação de senha'; //assunto
#Pega o nome e o email e mostra no cabeçalho do email receptor
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: angelo.novello@centropaulasouza.sp.gov.br\r\n"; // remetente
$headers .= "Return-Path: angelo.novello@centropaulasouza.sp.gov.br\r\n"; // return-path


    if(mail($receptor, $assunto, $mensagem, $headers))
        echo "$nome, seu email foi enviado com sucesso!, entraremos em contato em breve";
    else
        echo "O email falhou ao enviar";

?>