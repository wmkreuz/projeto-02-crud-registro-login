<?php

include("conexao.php");


if(isset($_GET["erro"])){
	echo"<script type='text/javascript'>alert('Efetue login.')</script>";
}


if(!empty($_POST)){

	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = "SELECT * FROM users WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql);

	while ($linha = mysqli_fetch_array($resultado)) {
		$senha_db = $linha['senha'];
		$id = $linha['cd_usuario'];
	}
	
	$cont = mysqli_num_rows($resultado);
	
	if($cont == 0){
		echo"<script type='text/javascript'>alert('Login não existe.')</script>";
	} else{
		if($senha_db != $senha){
			echo"<script type='text/javascript'>alert('E-mail ou senha não corresponde.')</script>";
		} else{
			session_start();
			$_SESSION['id_usuario'] = $id;
			$_SESSION['email_usuario'] = $email;
			$_SESSION['senha_usuario'] = $senha;
			header("Location: home.php");
		}
	}
		mysqli_close($conexao);
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link rel="stylesheet" href="css/login.css">
        <title>Login</title>
    </head>
    <body class="teste">
        <h1 class="register-title">Bem Vindo</h1>
        <form action="index.php" method="post" name="cadastro" class="register">
            <center><div class="container">
                <input name="email" type="email" class="register-input" placeholder="Endereço de Email" required>
                <input name="senha" type="password" class="register-input" placeholder="Senha" required><br>
				<input type="submit" class="button" value="Login" />
                <a href="registro.php" class="button button-blue">Sign Up</a>
            </div>
            </center>
        </form>
        
    </body>
</html>