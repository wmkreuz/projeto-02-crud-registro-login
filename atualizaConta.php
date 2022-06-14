<?php
include "conexao.php";

session_start();
$id = $_SESSION["id_usuario"];

if($id==0){
    echo"<script type='text/javascript'>alert('Efetue login.')</script>";
    header("Location: index.php".'?erro=1');
}

if($_POST){
    $usuario   = $_POST ['usuario'];
    $nome      = $_POST ['nome'];
    $email     = $_POST ['email'];
    $senha     = $_POST ['senha'];
    $conf_senha= $_POST ['conf_senha'];

  

  $usuarioexist = "SELECT * FROM users where cd_usuario ='$id'";
  $resultado = mysqli_query($conexao, $usuarioexist);
  $cont = mysqli_num_rows($resultado);

  if($cont=1){
    if($senha!=$conf_senha){
      header("location: formConta.php".'?erro=2');
    } else {
    $emailexist = "SELECT * FROM users where email = '$email' and cd_usuario <> $id";
    $resultado = mysqli_query($conexao, $emailexist);
    $cont = mysqli_num_rows($resultado);
    
    if($cont!=1){
      $sql = "UPDATE users SET usuario='$usuario', nome='$nome', email='$email', senha='$senha', conf_senha='$conf_senha' 
               WHERE cd_usuario = $_POST[cd_usuario]";
      mysqli_query($conexao, $sql);
      if(mysqli_affected_rows($conexao)==1){
      header("location: formConta.php".'?true=3');}
    } else {
      header("location: formConta.php".'?email=1');
    }
    
    }
  }
}
?>