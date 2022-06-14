<?php
    include 'conexao.php';

    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue login.')</script>";
        header("Location: index.php".'?erro=1');
    }

    $nome = $_POST['nm_pessoa'];
    $cpf = $_POST['nr_cpf'];
    

    $usuario = "SELECT usuario FROM users WHERE cd_usuario = ".$id;
    $resultado = mysqli_query($conexao, $usuario);

	while ($linha = mysqli_fetch_array($resultado)) {
		$user = $linha['usuario'];
	}


    if ($_POST['cd_pessoa']) {
        $sql = "UPDATE pessoa SET nm_pessoa='$nome', nr_cpf='$cpf', usuario='$user'
                WHERE cd_pessoa = $_POST[cd_pessoa] ";
    } else {
        $sql = "INSERT INTO pessoa (nm_pessoa, nr_cpf, usuario) VALUES ('$nome', '$cpf', '$user')";
    }
    mysqli_query($conexao, $sql);
    header("location: listaPessoa.php");
?>