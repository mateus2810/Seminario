
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
	

//-------------recebendo dados do formulário ---------------
	$nome = $_POST['nome'];
	$tipo = $_POST['tipo'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$telefone = $_POST['telefone'];
	
	



//------------ mostrando dados recebidos ---------------------



try {
    $conn = new PDO('mysql:host=localhost;dbname=bancodados', 'root','');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO usuario ( nome, tipodeusuario, email, senha, cpf, endereco, telefone) VALUES  (:nome, :tipo, :email, :senha, :cpf, :endereco, :telefone)";
    $sql = $conn->prepare($sql);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":tipo", $tipo);
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", $senha);
	$sql->bindValue(":cpf", $cpf);
	$sql->bindValue(":endereco", $endereco);
	$sql->bindValue(":telefone", $telefone);
	$sql->execute();


$sq2 = $conn->query(" SELECT * FROM usuario");


} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>







<table class="table">
  <thead class="thead-dark">
    <tr>

     <th scope="col"> <?php echo ("Nome:");?></th>
      <th scope="col"><?php echo ("Tipo de usuario:<br\>"); ?></th>
      <th scope="col"><?php echo ("email: <br\>");?></th>
      	<th scope="col"><?php echo ("senha:<br>");?></th>
      	 <th scope="col"><?php echo ("cpf: <br>");?></th>
		 <th scope="col"><?php echo ("endereco:<br>");?></th>
	 <th scope="col"><?php echo ("telefone:");?></th>

</th>
<tbody>
	<?php while ( $assoc = $sq2->fetch(PDO::FETCH_ASSOC)) { ?>
	


    <tr>
      
      <td><?php echo $assoc['nome'];?></td>
      <td><?php echo $tipo ?></td> 
      <td><?php echo $email ?></td> 
      <td><?php echo $senha ?></td> 
      <td><?php echo $cpf ?></td> 
      <td><?php echo $endereco ?></td>
      <td><?php echo $telefone ?></td>  
      
    </tr>
    <?php }?>
      <th scope="col"></th>
    </tr>
  </thead>
</table>

<!--
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="text"  value="	<?php echo "email cadastrado".$nome. "com a senha".$email;?>"	 name="">

</body>
</html>
<textarea>
	

</textarea> -->