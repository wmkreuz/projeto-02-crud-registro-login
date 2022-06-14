<?php
    include 'conexao.php';

    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue login.')</script>";
        header("Location: index.php".'?erro=1');
    }

    $sql = "SELECT cd_pessoa, nm_pessoa, nr_cpf, usuario FROM pessoa";
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
                    <h1>Lista de Pessoas</h1>
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
                    <table border="1" class="bradius">
                        <tr>
                            <td class="bradius">Código</td>
                            <td class="bradius">Nome</td>
                            <td class="bradius">CPF</td>
                            <td class="bradius">Usuario Cadastro</td>
                            <td class="bradius">Editar</td>
                            <td class="bradius">Excluir</td>
                        </tr>
                    <?php
                        while ($linha = mysqli_fetch_array($resultado)) {
                            echo "<tr>";
                            echo "<td class='bradius'>$linha[cd_pessoa]</td>";
                            echo "<td class='bradius'>$linha[nm_pessoa]</td>";
                            echo "<td class='bradius'>$linha[nr_cpf]</td>";
                            echo "<td class='bradius'>$linha[usuario]</td>";
                            echo "<td class='bradius'><center><a href='formPessoa.php?cd_pessoa=$linha[cd_pessoa]'><img src='editar_off.png' class='icone'></a><center></td>";
                            echo "<td class='bradius'><center><a href='excluirPessoa.php?cd_pessoa=$linha[cd_pessoa]'><img src='excluir_vermelho.png' class='icone'></a><center></td>";
                            echo "</tr>";
                        }
                    ?>
                    </table>
                </div>
            </div>
        </center>        
    </body>
</html>
