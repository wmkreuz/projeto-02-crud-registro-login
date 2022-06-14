<?php
    include "conexao.php";
    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue login.')</script>";
        header("Location: index.php".'?erro=1');
    }
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
                    <h1>Cadastro de Pessoa</h1>
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
                    <form method="post" action="recebePessoa.php">
                        <?php
                            if (isset($_GET['cd_pessoa'])) {
                                $sql = "SELECT cd_pessoa, nm_pessoa, nr_cpf FROM pessoa WHERE cd_pessoa = $_GET[cd_pessoa]";
                                $pessoa = mysqli_fetch_array(mysqli_query($conexao, $sql));
                                echo "Código: <br>";
                                echo "<input type='text' name='cd_pessoa' value='$_GET[cd_pessoa]' readonly='readonly' class='txt bradius'><br><br>";
                            }
                        ?>
                        Nome:<br>
                        <input type="text" name="nm_pessoa" value="<?php if (isset($pessoa['nm_pessoa'])) { echo $pessoa['nm_pessoa']; } ?>" class="txt bradius" required><br><br>
                        CPF: <br>
                        <input type="text" name="nr_cpf" value="<?php if (isset($pessoa['nr_cpf'])) { echo $pessoa['nr_cpf']; } ?>" class="txt bradius" required><br><br>
                        <input type="submit" value="Enviar" class="sb bradius">
                    </form>
                </div>
            </div>
        </center>
    </body>
</html>