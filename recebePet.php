<?php
    include "conexao.php";

    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue login.')</script>";
        header("Location: index.php".'?erro=1');
    }

    $usuario = "SELECT usuario FROM users WHERE cd_usuario = ".$id;
    $resultado = mysqli_query($conexao, $usuario);

	while ($linha = mysqli_fetch_array($resultado)) {
		$user = $linha['usuario'];
	}

    $nm_pet = $_POST['nm_pet'];
    $cd_dono = $_POST['cd_dono'];
    if(isset($_POST['cd_pet'])){
        $sql = "UPDATE pet set nm_pet = '$nm_pet', cd_dono = $cd_dono,  usuario='$user' where cd_pet = $_POST[cd_pet]";
    } else {
        $sql = "INSERT INTO pet (nm_pet, cd_dono, usuario) VALUES ('$nm_pet', $cd_dono, '$user')";
    }
    
    mysqli_query($conexao, $sql);
    header("location: listaPet.php");
?>