<?php
    include 'conexao.php';

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

    $nome = $_POST['nm_produto'];
    $qt = $_POST['qt_estoque'];
    if ($_POST['cd_produto']) {
        $sql = "UPDATE produto SET nm_produto='$nome', qt_estoque='$qt', usuario='$user'
                WHERE cd_produto = $_POST[cd_produto] ";
    } else {
        $sql = "INSERT INTO produto (nm_produto, qt_estoque, usuario) VALUES ('$nome', '$qt', '$user')";
    }
    mysqli_query($conexao, $sql);
    header("location: listaProduto.php");
?>