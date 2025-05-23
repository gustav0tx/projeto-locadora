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
    <link rel="stylesheet" href="./src/css/Pages/Cadastro/style.css">
    <title>Locadora</title>
</head>
<body>
    
    <div class="box-cadaster">

        
        <form action="" method="POST" class="box-form">
            
            <h2 class="cadaster-title"><strong>CADASTRO</strong></h2>
            
            <div class="inputsArea">

                <div class="inputArea">

                    <label for="name" class="form-input-text">Nome</label>
                    <input type="text" name="name" placeholder="Digite aqui..." class="form-input"><br>

                    <label for="email" class="form-input-text">Email</label>
                    <input type="email" name="email" placeholder="Digite aqui..." class="form-input"><br>

                    <label for="phone" class="form-input-text">Número de Telefone</label>
                    <input type="tel" name="phone" placeholder="Digite aqui..." class="form-input"><br>

                    <label for="date" class="form-input-text">Data de Nascimento</label>
                    <input type="date" name="date" class="form-input">
                    
                </div>

                <div class="inputArea">

                    <label for="passwd" class="form-input-text">Senha</label>
                    <input type="password" name="passwd" placeholder="Digite aqui..." class="form-input"><br>

                    <label for="passwdConfirm" class="form-input-text">Confirme a Senha</label>
                    <input type="password" name="passwdConfirm" placeholder="Digite aqui..." class="form-input"><br>

                    <label for="cpf" class="form-input-text">CPF</label>
                    <input type="text" name="cpf" placeholder="Digite aqui..." class="form-input"><br>

                </div>

            </div>

            <div class="form-actions">

                <button type="submit" class="btn" name="send">Cadastrar</button>

                <p class="text-go-login">Possui uma conta?<a href="./index.php"> Logar</a></p>

            </div>

        </form>

    </div>

    <?php
    
        if(isset($_POST['send'])){

            if($_POST['passwd'] == $_POST['passwdConfirm']){

                $name = $_POST['name'];

                $email = $_POST['email'];

                $phone = $_POST['phone'];

                $date = $_POST['date'];

                $password = $_POST['passwd'];

                $cpf = $_POST['cpf'];

                $sql = "INSERT INTO usuarios (name_user, email_user, password_user, phone_user, date_born_user, cpf_user) VALUES ('$name','$email','$password','$phone','$date','$cpf');";

                $result = $conexão->query($sql);


    
            }

        }

    ?>

</body>
</html>