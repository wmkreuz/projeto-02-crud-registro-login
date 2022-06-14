<?php
    include 'conexao.php';

    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue Login.')</script>";
        header("Location: index.php".'?erro=1');
    }

    $sql = "DELETE FROM users WHERE cd_usuario = $id";
    mysqli_query($conexao, $sql);
    header('location: sair.php');
?>