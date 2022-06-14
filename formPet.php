<?php
    include "conexao.php";

    include "conexao.php";
    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue login.')</script>";
        header("Location: index.php".'?erro=1');
    }

    if(isset($_GET['cd_pet'])){
        $cd_pet = $_GET['cd_pet'];
        $sqlpet = "SELECT CD_PET, NM_PET, CD_DONO, NM_PESSOA FROM PET
                JOIN PESSOA ON (PESSOA.CD_PESSOA = PET.CD_DONO)
                WHERE CD_PET = ".$cd_pet;
        $resultadopet = mysqli_query($conexao, $sqlpet);
        $pet = mysqli_fetch_array($resultadopet);
    }
        $sql = "SELECT CD_PESSOA, NM_PESSOA FROM PESSOA ORDER BY NM_PESSOA";
        $resultado = mysqli_query($conexao, $sql);
    
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta charset="utf-8">
    </head>
    <body>
        <center>
            <div class="conteudo">
                <div class="centro">
                    <h1>Cadastro Pet</h1>
                    <div class="menu clearfix">
                        <li> <a href="home.php">Home</a></li>
                        <li> <a href="#">Pessoa </a>
                            <ul class="sub-menu clearfix">
                                <a href="formPessoa.php" class="link_submenu"><li> Cadastro</li></a>
                                <a href="listaPessoa.php" class="link_submenu"><li> Consulta</li></a>
                            </ul>
                        </li>
                        <li> <a href="#">Produto </a>
                            <ul class="sub-menu clearfix">
                                <a href="formProduto.php" class="link_submenu"><li> Cadastro</li></a>
                                <a href="listaProduto.php" class="link_submenu"><li> Consulta</li></a>
                            </ul>
                        </li>
                        <li> <a href="#">Pet </a>
                            <ul class="sub-menu clearfix">
                                <a href="formPet.php" class="link_submenu"><li> Cadastro</li></a>
                                <a href="listaPet.php" class="link_submenu"><li> Consulta</li></a>
                            </ul>
                        </li>
                        <li> <a href="#">Conta </a>
                            <ul class="sub-menu clearfix">
                                <a href="formConta.php" class="link_submenu"><li> Alterar</li></a>
                                <a href="excluirConta.php" class="link_submenu"><li> Excluir</li></a>
                                <a href="sair.php" class="link_submenu"><li> Sair</li></a>
                            </ul>
                        </li>
                    </div>
                    <br><br>
                    <form method="post" action="recebePet.php">
                        <?php
                            if(isset($cd_pet)){
                                echo"Código: <br>";
                                echo"<input type='text' name='cd_pet' value='$cd_pet' readonly='readonly' class='txt bradius'><br><br>";
                            }
                        ?>
                        Nome: <br>
                        <input type="text" name="nm_pet" value="<?php if(isset($cd_pet)){echo $pet['NM_PET'];}?>" class="txt bradius" required><br><br>
                        Dono: <br>
                        <select name="cd_dono" class="txt bradius">
                            <option>- selecione -</option>
                            <?php
                                while($linha = mysqli_fetch_array($resultado)){
                                    if($linha['CD_PESSOA'] == $pet['CD_DONO']){
                                        echo"<option selected value='$linha[CD_PESSOA]'>";
                                    } else {
                                        echo"<option value='$linha[CD_PESSOA]'>";
                                    }
                                    echo $linha['NM_PESSOA'];
                                    echo"</option>";
                                }
                            ?>
                        </select><br><br>
                        <input type="submit" value="Cadastrar" class="sb bradius">
                    </form>
                </div>
            </div>
        </center>
    </body>
</html>