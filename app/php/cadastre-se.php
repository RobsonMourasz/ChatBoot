<!DOCTYPE html>
<html lang=pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/SignUp.css">
    <title>Signup</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Cadastre-se</h1>
            </div>
            <form action="criar_novo_usuario.php" method="post">
                <div class="card-body">
                    <div class="group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" required>
                    </div>
                    <div class="group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" required>
                    </div>
                    <input type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>