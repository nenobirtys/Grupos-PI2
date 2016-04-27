<?php
session_start();
$dbhost="koo2dzw5dy.database.windows.net";
$db="SenaQuiz";
$user="TSI";
$password="SistemasInternet123";
	
$conninfo = "driver={SQL server};server=$dbhost;port=1433;Database=$db;";
if ($conn = odbc_connect($conninfo,$user,$password))
	echo "Conectado.";
else 
	echo "login senha invalidos.";
	
	

$senha = $_POST["senha"];
$email = $_POST["email"];

$sql = "SELECT * FROM Professor where email='$email' and senha=hashbytes('SHA1', '".$senha."')";

$q=odbc_exec($conn,$sql);


	
	
$numero = odbc_num_rows($q);
if ($numero == 1) { 
	$_SESSION['showMenu'] = true;
	$_SESSION['codProfessor'] = odbc_result($q,'codProfessor');
	$_SESSION['tipoProfessor'] = odbc_result($q,'tipo');
	$_SESSION['nomeProfessor'] = odbc_result($q,'nome');
	print_r($_SESSION);
	header('Location: menu.html');
	echo "login válido";
	
}  else {
	header('Location: erro.html'); 
	 
}

	
?>