<?php 
    $verificador = true;
    $messegeErros = "";
    if(isset($_POST['nome'])){

        include('./conexao.php');

        // Verificação Usuário
        if (preg_match("/\d+/", $_POST['nome'])) {
            $messegeErros .= "<h3>O nome do usuário não deve conter números</h3>";
            $verificador = false;
        } elseif (empty($_POST['nome'])) {
            $messegeErros .= "<h3>Campo Nome deve ser preenchido.</h3>";
            $verificador = false;
        } else { 
            $usuario = $_POST['nome'];
        }
        // Fim verificação Usuário

        // Verificação Sobrenome
        if (preg_match("/\d+/", $_POST['sobrenome'])) {
            $messegeErros .= "<h3>O sobrenome do usuário não deve conter números</h3>";
            $verificador = false;
        } elseif (empty($_POST['sobrenome'])) {
            $messegeErros .= "<h3>Campo Sobrenome deve ser preenchido.</h3>";
            $verificador = false;
        } else { 
            $sobrenome = $_POST['nome'];
        }
        // Fim verificação Sobrenome

        // Verificação Email
        $email = $_POST['email'];
        if (strlen($email) < 10 || strlen($email) > 100) {
            $messegeErros .= "<h3>O email deve conter entre 10 a 100 caracteres.</h3>";
            $verificador = false;
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $messegeErros .= "<h3>Email invalido.</h3>";
                $verificador = false;
            } else {
                $consult = "SELECT email FROM usuarios WHERE email = '$email'";
                $sql_exec = $mysqli->query($consult) or die($mysqli->error);
                if ($sql_exec->num_rows != 0) {
                    $messegeErros .= "<h3>Email já cadastrado.</h3>";
                    $verificador = false;
                }
            }
        }
        // Fim verificação Email

        // Verificação Senha
        $senha = $_POST['senha'];
        if (strlen($senha) < 6 || strlen($senha) > 16) {
            $messegeErros .= "<h3>A senha deve conter entre 6 a 16 caracteres.</h3>";
            $verificador = false;
        } else {
            $senhaCript = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        }
        // Fim verificação Senha

        // Verificação Termo
        if(!isset($_POST['termo'])) {
            $messegeErros .= "<h3>Para realizar o cadastro, deve-se aceitar os termos.</h3>";
            $verificador = false;
        } 
        // Fim verificação Termo

        if($verificador) {
            $cadastro = "INSERT INTO usuarios (nome, sobrenome, email, senha) 
            VALUES ('$usuario','$sobrenome', '$email', '$senhaCript')";
            $mysqli->query($cadastro) or die($mysqli->error);
            session_start();
            $_SESSION['usuario'] = $_POST['nome'];
            unset($_POST);
            header("location: ../index.php");
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/styleCadastro.css">
</head>
<body>
    <div class="container">
        <div class="content-register">
            <h1>Cadastro de usuários</h1>
            <?php
                if($messegeErros != "") {
                    echo "<div class='adviceErr'>" . $messegeErros . "</div>";
                }
            ?>
            <form action="" method="post">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'] ?>">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" name="sobrenome" id="sobrenome" value="<?php if(isset($_POST['sobrenome'])) echo $_POST['sobrenome'] ?>">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
                <div class="terms">
                    <input type="checkbox" name="termo" id="termo">
                    <label for="termo">Termos de cadastro</label>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
            
            <h4>Já possui um cadastro? Realize um <a href="../index.php">login</a></h4>
        </div>
    </div>
</body>
</html>