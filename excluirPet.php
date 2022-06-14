<?php
    include "conexao.php";
    $cd_pet = $_GET['cd_pet'];
    $sql = "DELETE FROM PET WHERE CD_PET = ".$cd_pet;
    mysqli_query($conexao, $sql);
    header("location: listaPet.php");
?>