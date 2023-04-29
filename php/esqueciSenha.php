<?php 
    $verificador = true;
    $messegeErros = "";
    if(isset($_POST['email'])) {
        include('../php/conexao.php');
        include('../php/mail.php');
        $email = $_POST['email'];
        $queryEmail = "SELECT email FROM usuarios WHERE email ='$email' LIMIT 1";
        $queryExec = $mysqli->query($queryEmail);
        if($queryExec->num_rows != 1) {
            $verificador = false;
            $messegeErros .= "<h3>Email não cadastrado.</h3>";
        } else {
            $codigo = rand(100000, 999999);
            session_start();
            $_SESSION['codigo'] = $codigo;
            $_SESSION['email'] = $email;
            enviar_email($email, "Código para recuperar a senha", 
                "<h1>Segue abaixo o código de acesso a senha:</h1><br>
                <h2>".$codigo."</h2>");
            header("location: codigoSenha.php");
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
    <title>Esqueci Senha</title>
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
                <h2>Insira seu e-mail de recuperação</h2>
                <h3>*Será enviado e-mail informando um código para alterar a senha.*</h3>
                <form action="" method="post">
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email">
                    <button type="submit">Enviar</button>
                </form>
                <h4>Já possui um cadastro? Realize um <a href="../index.php">login</a></h4>
            </div>
        </div>
    </section>
    
</body>
</html>