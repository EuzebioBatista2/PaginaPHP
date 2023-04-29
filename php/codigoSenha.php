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
    if(isset($_POST['codigo'])) {
        include('../php/conexao.php');
        $codigoDigitado = $_POST['codigo'];
        if($codigoDigitado != $codigo) {
            $verificador = false;
            $messegeErros .= "<h3>Código inválido</h3>";
        } else {
            header("location: novaSenha.php");
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
    <title>Confirmando senha</title>
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
                    <label for="email">Codigo de confirmação(6 digitos)</label>
                    <input type="text" name="codigo" id="codigo" maxlength="6">
                    <button type="submit">Enviar</button>
                </form>
                <h4><a href="esqueciSenha.php">Retornar</a></h4>
            </div>
        </div>
    </section>
</body>
</html>