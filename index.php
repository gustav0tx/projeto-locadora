<!DOCTYPE html>
<html lang="pt-br">
    <?php
    
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $bancoNome = 'locadora';

    $conexão = new mysqli($servidor,$usuario,$senha,$bancoNome);

    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='./src/css/Pages/Login/style.css'>
    <script src="./src/js/Pages/Login/script.js" defer></script>
    <title>Locadora</title>
</head>
<body>
    
    <div class="box-login">

        <form action="" method="POST" class="form-login">

            <h3 class='text-login'><strong>LOGIN</strong></h3><br>
            
            <div class="box-info">

                <div class="emailArea">
                
                    <label class='text-info' for="email">Email</label>
                    <input type="text" name='email' class="form-input" placeholder="Digite aqui..."><br>
    
                </div>
    
                <div class="passwdArea">
                    
                    <label class='text-info' for="passwd">Senha</label>
                    <input type="password" name='passwd' id="passwd" class="form-input" placeholder="Digite aqui...">
                    <div>
                        <label for="showPass">Mostrar Senha</label>
                        <input type="checkbox" name="passwd" id="showPass">
                    </div>
                
                </div>

            </div>

            <button type="submit" name="send" class="btn">Login</button>

            <p class="text-cadaster">Não tem uma conta? <a href="./cadastro.php">Cadastre-se</a></p>

        </form>    

    </div>

    <?php
    
        if(isset($_POST['send'])){

            $email = $_POST['email'];
            $password = $_POST['passwd'];

            $sql = "SELECT email_user, password_user FROM usuarios WHERE email_user='$email';";
            
            $resultado = $conexão->query($sql);
            
            if($resultado && $resultado->num_rows > 0){
            
                $row = $resultado->fetch_assoc();
            
                if(($row['email_user'] == $email) && ($row['password_user'] == $password)) {
                        
                    header('Location: locadora.php');
                    exit();

                }
            
            }
            
        }
    
    ?>

</body>
</html>
