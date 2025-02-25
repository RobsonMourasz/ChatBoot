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
                    <a href="#" class="icon-link"><i class="bi bi-messenger"></i></a>
                </div>
                <div class="icons-mensagens">
                    <a href="#" class="icon-link"><i class="bi bi-pin-angle"></i></a>
                </div>
                <div class="icons-mensagens">
                    <a href="#" class="icon-link"><i class="bi bi-person-circle"></i></a>
                </div>
                <div class="icons-mensagens">
                    <a href="php/logoff.php" class="icon-link"><i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>

            <div class="tela-novas-mensagens">
                <div class="title">
                    <h1>Conversas</h1>
                </div>
                <div class="pesquisa-mensagens">
                    <div class="group-input">
                        <form action="" method="post">
                            <input type="text" placeholder="Digite a busca...">
                        </form>
                    </div>
                </div>
                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 2 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/perfil-2.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Ingrid Silva</small>
                            <p>Olá tudo bem ?</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>

                </div> <!-- END MENSAGEM 2 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 3 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Perfil-3.jpg" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Rainha Elizabeth</small>
                            <p>Meus parabéns você novo rei </p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>

                </div> <!-- END MENSAGEM 3 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->

                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->
                <div class="tela-mensagens"> <!--MENSAGEM 1 MODELO -->
                    <div class="contato">
                        <div class="contato-img">
                            <img src="img/perfil/Foto-perfil.png" alt="" width="60" height="60">
                        </div>
                        <div class="contato-descricao">
                            <small>Robson Moura</small>
                            <p>Fala manolo</p>
                        </div>
                        <div class="contato-inf">
                            <span class="title">12:00</span>
                            <span class="visivel">Online</span>
                        </div>
                    </div>
                </div> <!-- END MENSAGEM 1 MODELO -->

            </div>

            <div class="mensagens-exibidas">

                <div class="page-active opacity-100"></div>

                <div class="header">
                    <span id="nome">Robson Moura</span>
                    <span id="email">robsonic10@gmail.com</span>
                    <span id="ultimo-acesso">Visto por ultimo: 25-02-2025 18:15</span>
                </div>
                <div class="body">

                </div>
                <div class="footer">
                    <div class="group-input">
                        <form action="" method="post">
                            <div class="container-input">
                                <input type="text" placeholder="Digite a mensagem...">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            /* Verifificar se está na pagina  */
            const verificar = () => {
                if (document.visibilityState === "visible") {
                    console.log("usuario ativo")
                } else {
                    console.log("usuario não ativo")
                }
            }
            document.addEventListener("visibilitychange", verificar)
        </script>
        <script src="js/acoes.index.js"></script>
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
