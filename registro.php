<?php
include("conexao.php");
if(!empty($_POST)){
  $usuario   = $_POST ["usuario"];
	$nome      = $_POST ["nome"];
	$sex       = $_POST ["sex"];
	$email     = $_POST ["email"];
	$senha     = $_POST ["senha"];
	$conf_senha= $_POST ["conf_senha"];

  $emailexist = "SELECT * FROM users where email = '$email'";
  $resultado = mysqli_query($conexao, $emailexist);
  $cont = mysqli_num_rows($resultado);

  if($cont!=1){
    if($senha!=$conf_senha){
      echo"<script type='text/javascript'>alert('Senhas não conferem.')</script>";
    } else {
    $sql = "INSERT INTO users (sex, usuario, nome, email, senha, conf_senha) 
            VALUES ('$sex', '$usuario', '$nome', '$email','$senha','$conf_senha')";
    mysqli_query($conexao, $sql);
    if(mysqli_affected_rows($conexao)==1){
      echo"<script type='text/javascript'>alert('Cadastro concluído, clique em página de login para efetuar o login.')</script>";}
    }
  } else {
    echo"<script type='text/javascript'>alert('E-mail já cadastrado.')</script>";
  }
}
?>    
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Cadastro</title>
  <link rel="stylesheet" href="css/registro.css">
</head>
<body>
  <h1 id="cadastro" name="cadastro" class="register-title">Preencha os campos</h1>
  <form  class="register" method="post"  onsubmit="return validaCampo(); return false;">
    <div class="register-switch">
      <input type="radio" name="sex" value="F" id="sex_f" class="register-switch-input" checked>
      <label for="sex_f" class="register-switch-label">Mulher</label>
      <input type="radio" name="sex" value="M" id="sex_m" class="register-switch-input">
      <label for="sex_m" class="register-switch-label">Homem</label>
    </div>
    <input name="usuario" type="text" class="register-input" placeholder="Usuário" required>
    <input name="nome" type="text" class="register-input" placeholder="Nome Completo" required>
    <input name="email" type="email" class="register-input" placeholder="Endereço de e-mail" required>
    <input name="senha" type="password" class="register-input" placeholder="Senha" required>
    <input name="conf_senha" type="password" class="register-input" placeholder="Confirmação de senha" required>
    <input name="cadastrar" type="submit" value="Criar" id="cadastrar" class="register-button">
	<a href="index.php" class="register-button">Página de login</a>
  </form>
</body>
</html>