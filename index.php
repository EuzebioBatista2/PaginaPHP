<?php
$verificador = true;
$messegesErros = "";
$messegesSucess = "";
// Deu certo cadastro?
if(!isset($_SESSION)) {
    session_start();
    if (isset($_SESSION['usuario'])) {
        $messegesSucess = "<h3><strong>AVISO: </strong>Cadastro realizado com sucesso</h3>";
    }
    session_destroy();
}

if(isset($_POST['email'])){
        
        include('./php/conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta tamanho 
        if (strlen($email) < 10 || strlen($email) > 100) {
            $messegesErros .= "<h3>O email deve conter entre 10 a 100 caracteres.</h3>";
            $verificador = false;
        }

        if (strlen($senha) < 6 || strlen($senha) > 16) {
            $messegesErros .= "<h3>A senha deve conter entre 6 a 16 caracteres.</h3>";
            $verificador = false;
        }
        // Fim consulta do tamanho

        // Consulta de email e senha existente 
        $sql_consult = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $sql_exec = $mysqli->query($sql_consult) or die($mysqli->error);
        if ($sql_exec->num_rows == 0) {
            $messegesErros .= "<h3><strong>ERRO: </strong>Email ou senha incorreto(s).</h3>";
            $verificador = false;
        } else {
            $usuario = $sql_exec->fetch_assoc();
            if(!password_verify($senha, $usuario['senha'])) {
                $messegesErros .= "<h3><strong>ERRO: </strong>Email ou senha incorreto(s).</h3>";
                $verificador = false;
            }
        }
        // Fim consulta de email e senha existente

        if ($verificador) {
            session_start();
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['perfil'] = $usuario['path'];
            header("location: ./php/cliente.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Página Login</title>
</head>
<body>
    <div class="container">
        
        <div class="content-image">
            <img src="./images/login.png" alt="">
        </div>
        <div class="content-login">
            <?php
                if($messegesErros != "") {
                    echo "<div class='adviceErr'>" . $messegesErros . "</div>";
                } 

                if($messegesSucess != "") {
                    echo "<div class='adviceSuc'>" . $messegesSucess . "</div>";
                }
            ?>
            
            <h1>Faça o login</h1>
            <form action="" method="post">
                <div class="content-data">
                    <input type="text" name="email" class="input-form">
                    <span dataPlaceholder="Email"></span>
                </div>
                <div class="content-data">
                    <input type="password" name="senha" class="input-form">
                    <span dataPlaceholder="Password"></span>
                </div>
                <button type="submit">Login</button>
            </form>
            <h2>Esqueceu sua <a href="#">Senha?</a></h2>
            <h2>Não tem conta? <a href="./php/cadastro.php">Criar</a></h2>
        </div>
    </div>

    <script src="./js/estilo.js"></script>
</body>
</html>