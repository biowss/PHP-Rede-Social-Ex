<!-- PAGINA INICIAL DO USUARIO -->
<?php 
error_reporting(1);


if($_POST != NULL){

    include_once "connect_db.php";

    $usuario = addslashes($_POST["usuario"]);
    $senha = addslashes($_POST["senha"]);

    if($usuario != NULL && $senha != NULL){

        $sql = "SELECT * 
                FROM user_info 
                WHERE user = '$usuario'
                AND password = '$senha'";
        


        $retorno = $conexao->query($sql);

        if ($retorno == false) {
            echo $conexao->error;
        }

        if($registro = $retorno->fetch_array()){

        $id = $registro["id"];
        $username = $registro["fullname"];

        //Inicializa a sessão
        session_start();

        $_SESSION["logado"] = "ok";
        $_SESSION["id_usuario"] = $id;
        $_SESSION["fullname"] = $username;

             header("Location: feed.php");
        }else{
            echo 
            "<script>
                alert('Usuário/Senha incorretos!!');
             </script>";
        }

    }else{
        echo 
            "<script>
                alert('Usuário/Senha incorretos!!');
             </script>";
    }

}


?>

<!DOCTYPE html>

<html>

<head>
    <title>Ren-Chon</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/login-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>


<body>

<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="index.php"><img src="https://33.media.tumblr.com/5dc4d066766ace675599ee469422390c/tumblr_mwix7neuTm1s21xzoo3_400.gif"> Ren-Chon Network </a>
</nav>

<div class="login-sidebar">
    <div class="login-form">
        <form method="POST">
            <div class="form-group">
                        <label for="user">User:</label>
                <input type="text" id="user" name="usuario" placeholder="" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="senha" placeholder="" class="form-control">
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-dark">Login</button>
            </div>
        </form>        
        <div class="text-center mt-5"> 
            <a href="cadastro.php">Cadastrar</a> 	
            <br><br>
            <a href="esqueceu.php">Esqueceu a senha?</a>
        </div>
    </div>
</div>

<footer>
    <p>© 2019 Copyright, AppleHead Company</p>
</footer>
</body>
</html>