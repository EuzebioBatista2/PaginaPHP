<?php 
    session_start();
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $codigo = $_SESSION['codigo'];
    } else {
        session_destroy();
        header("location: ../index.php");
    }
    $verificador = true;
    $messegeErros = "";
    if(isset($_POST['senha'])) {
        include('../php/conexao.php');
        $senha = $_POST['senha'];
        $confirmar = $_POST['confirmar'];
        if($senha != $confirmar) {
            $verificador = false;
            $messegeErros .= "<h3>Senha diferente de confirmar senha.</h3>";
        } else {
            if (strlen($senha) < 6 || strlen($senha) > 16) {
                $messegesErros .= "<h3>A senha deve conter entre 6 a 16 caracteres.</h3>";
                $verificador = false;
            }
            else {
                $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
                $queryEmail =  "UPDATE usuarios SET senha = '$senhaCriptografada' WHERE email='$email' LIMIT 1";
                $querExec = $mysqli->query($queryEmail) or die($mysqli->error);
                header("location: ../index.php");
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleEsqueciSenha.css">
    <title>Nova senha</title>
</head>
<body>
    <section class="container">
        <div class="content">
            <div class="content-email">
                <?php
                    if($messegeErros != "") {
                        echo "<div class='adviceErr'>" . $messegeErros . "</div>";
                    }
                ?>
                <h1>Esqueci minha senha</h1>
                <h2>Insira o codigo de informação</h2>
                <h3>*Foi enviado um código de verificação para seu email.*</h3>
                <form action="" method="post">
                    <label for="email">Nova senha</label>
                    <input type="password" name="senha" id="senha">
                    <label for="email">Confirmar nova senha</label>
                    <input type="password" name="confirmar" id="confirmar">
                    <button type="submit">Enviar</button>
                </form>
                <h4><a href="codigoSenha.php">Retornar</a></h4>
            </div>
        </div>
    </section>
</body>
</html>