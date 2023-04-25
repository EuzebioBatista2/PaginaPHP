<?php
$contaErrada = false;
$emailErrPadrao = false;
$senhaErrPadrao = false;
if(isset($_POST['email'])){
        include('./php/conexao.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta de email e senha existente 
        $sql_consult = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' LIMIT 1";
        $sql_exec = $mysqli->query($sql_consult) or die($mysqli->error);

        if ($sql_exec->num_rows != 0) {
            $usuario = $sql_exec->fetch_assoc();
        } else {
            $contaErrada = true;
        }
        // Fim consulta de email e senha existente


        // Consulta tamanho 
        if (strlen($email) < 10 || strlen($email) > 100) {
            $emailErrPadrao = true;
        }

        if (strlen($senha) < 6 || strlen($senha) > 16) {
            $senhaErrPadrao = true;
        }
        // Fim consulta do tamanho
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
                $listaErros = "<div class='advice'>";
                if($contaErrada) {
                    $listaErros .= "<h3><strong>ERRO: </strong>Email ou senha incorreto(s).</h3>";
                }
                if($emailErrPadrao) {
                    $listaErros .= "<h3><strong>ERRO: </strong>Email fora do padrão: min: 30, max:100 carac.</h3>";
                }
                if($senhaErrPadrao) {
                    $listaErros .= "<h3><strong>ERRO: </strong>Senha fora do padrão: min: 6, max:16 carac.</h3>";
                }
                if(isset($_POST['email'])) {
                    echo $listaErros . "</div>";
                };
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
            <h2>Não tem conta? <a href="#">Criar</a></h2>
        </div>
    </div>

    <script src="./js/estilo.js"></script>
</body>
</html>