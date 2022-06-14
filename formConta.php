<?php
    include "conexao.php";
    session_start();
    $id = $_SESSION["id_usuario"];

    if($id==0){
        echo"<script type='text/javascript'>alert('Efetue login.')</script>";
        header("Location: index.php".'?erro=1');
    }

    
    if(isset($_GET["erro"])==2){
            echo"<script type='text/javascript'>alert('Senhas não conferem.')</script>";
    }
    if(isset($_GET["true"])==3){
        echo"<script type='text/javascript'>alert('Cadastro atualizado.')</script>";
    }
    if(isset($_GET["email"])==1){
        echo"<script type='text/javascript'>alert('E-mail já cadastrado.')</script>";
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
                    <h1>Minha conta</h1>
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
                    <form method="post" action="atualizaConta.php">
                        <?php

                            $sql = "SELECT cd_usuario, nome, email, senha, conf_senha, usuario FROM users WHERE cd_usuario = $id";
                            $pessoa = mysqli_fetch_array(mysqli_query($conexao, $sql));
                            echo "Código: <br>";
                            echo "<input type='text' name='cd_usuario' value='$id' readonly='readonly' class='txt bradius'><br><br>";
                            echo "Usuario: <br>";
                            echo "<input type='text' name='usuario' value='$pessoa[usuario]' class='txt bradius'><br><br>";
                            echo "Nome: <br>";
                            echo "<input type='text' name='nome' value='$pessoa[nome]' class='txt bradius'><br><br>";
                            echo "Email: <br>";
                            echo "<input type='text' name='email' value='$pessoa[email]' class='txt bradius'><br><br>";
                            echo "Senha: <br>";
                            echo "<input type='password' name='senha' value='$pessoa[senha]' class='txt bradius'><br><br>";
                            echo "Confirmação Senha: <br>";
                            echo "<input type='password' name='conf_senha' value='$pessoa[conf_senha]' class='txt bradius'><br><br>";
                            
                        ?>
                        
                        <input type="submit" value="Enviar" class="sb bradius">
                    </form>
                </div>
            </div>
        </center>
    </body>
</html>