<?php
    include 'conexao.php';
    $cd_pessoa = $_GET['cd_pessoa'];
    $sql = "DELETE FROM PESSOA WHERE CD_PESSOA = $cd_pessoa";
    mysqli_query($conexao, $sql);
    header('location: listaPessoa.php');
?>