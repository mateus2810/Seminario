<?php
	

//-------------recebendo dados do formulário ---------------
	$email = $_POST['email'];
	$senha = $_POST['senha'];	


//------------ mostrando dados recebidos ---------------------


echo("email: ".$email."<br>");
echo "senha: ".$senha;


//--------------Modelo de conexão com o banco--------------------

   $conn = new PDO('mysql:host=localhost;dbname=treinamentoe','root','');
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

	$sql = "INSERT INTO  user (email, senha)  VALUES(:email , :senha);";
 	
 	$sql = $conn->prepare($sql);
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", $senha);
	$sql->execute();



?>