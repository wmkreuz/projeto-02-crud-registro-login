<?php
    include 'conexao.php';
    $cd_produto = $_GET['cd_produto'];
    $sql = "DELETE FROM PRODUTO WHERE CD_PRODUTO = $cd_produto";
    mysqli_query($conexao, $sql);
    header('location: listaProduto.php');
?>