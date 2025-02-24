<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['sessao']) && !empty($_SESSION['sessao'])) {
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="css/style.min.css">

        <title>Bem vindo ao ChatBoot</title>
    </head>

    <body>

        <div class="content-mensagens">
            <div class="menu-mensagens">
                <div class="icons-mensagens">
                    <i class="bi bi-messenger"></i>
                </div>
                <div class="icons-mensagens">
                    <i class="bi bi-pin-angle"></i>
                </div>
                <div class="icons-mensagens">
                    <i class="bi bi-person-circle"></i>
                </div>
                <div class="icons-mensagens-end">
                    <i class="bi bi-box-arrow-right"></i>
                </div>
            </div>

            <div class="tela-novas-mensagens">

            </div>

            <div class="mensagens-exibidas">

            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
} else {
?>
    <script>
        alert("Sem usuário ativo")
        location.assign("../index.html");
    </script>
<?php
}
