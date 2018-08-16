<?php include 'bd/connect.php' ?>

!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Autenticação</title>
	<script type="text/javascript">
		function loginsucess(){
			window.location='index-log.php';
		}
		function loginfailed(){
			alert('Login e/ou senha incorretos');
			window.location='index.php';
		}
	</script>
</head>
<body>

<?php 
$user = $_POST['user'];
$pw = $_POST['senha'];




 ?>

 
<?php

	$sql = "SELECT * FROM GE_USUARIOS WHERE US_NOME='$user' AND US_SENHA='$pw'";
	$res = $conn->query($sql);
	if($res !== false){
		$result = $res->fetch(PDO::FETCH_ASSOC);
		if($result['US_NOME'] == $user && $result['US_SENHA'] == $pw) {
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $pw;
			$_SESSION['logado'] = True;
			echo "<script>loginsucess()</script>";
		}
		else{
			echo "<script>loginfailed()</script>";
		}
	}	
?>