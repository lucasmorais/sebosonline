<?php
 /*
 *Classe exportar contato parceiro
 *@author: Marcelo Cavassani
 *@data: 06/09/2014
*/

$host = 'host.tiagoabreu.com'; // MYSQL database host adress
$db = 'sergam_painel'; // MYSQL database name
$user = 'sergam'; // Mysql Database user
$pass = 'w3dotsergamdotcomdotbr'; // Mysql Database password
 
// Conexão com o bando de dados
$link = mysql_connect($host, $user, $pass);
mysql_select_db($db);
 
require 'exportcsv.inc.php';
 
$table="contato_parceiro"; // aqui vai o nome da tabela que voce quer exportar 

exportMysqlToCsv($table);
 
?>