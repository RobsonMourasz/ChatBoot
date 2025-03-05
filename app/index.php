<?php
    require_once __DIR__."/data/conexao.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['sessao']) && !empty($_SESSION['sessao'])) {
    $idLogado = $_SESSION["idUsuario"];
    $nomeLogado = $_SESSION["nomeUsuario"];
    $emailLogado = $_SESSION["sessao"];
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
        <input id="id" type="number" hidden value="<?php echo $idLogado ?>">

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

            <div class="tela-novas-mensagens"> <!-- TELA DE CONTATOS QUE CHEGA A MENSAGEM -->
                <div class="title">
                    <h1>Conversas</h1>
                </div>
                <div class="pesquisa-mensagens">
                    <div class="group-input">
                        <form action="" method="post" id="">
                            <input type="text" placeholder="Digite a busca...">
                        </form>
                    </div>
                </div>

                <div class="container-mensagens" id="container-mensagens">
                    
                </div>

            </div> <!-- END TELA DE CONTATOS QUE CHEGA A MENSAGEM -->

            <div class="mensagens-exibidas">

                <div class="page-active opacity-100"></div>

                <div class="header">
                    <span id="nome">Robson Moura</span>
                    <span id="ultimo-acesso">Visto por ultimo: 25-02-2025 18:15</span>
                </div>
                <div class="body">

                    <div class="card mensagem-recebida">
                        <div class="card-title">
                            <h3>Robson Moura</h3>
                        </div>
                        <div class="card-body">
                            <p>Olá, gostaria de verificar a possibilidade da gente ficar rico com essa bagaça teria como me falar ?</p>
                        </div>
                        <div class="card-footer">
                            <span>16:58</span>
                        </div>
                    </div>
                    <div class="clear-fix"></div>

                    <div class="card mensagem-enviada">
                        <div class="card-title">
                            <h3>Eu</h3>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque magnam animi itaque voluptates a repellendus facilis possimus velit non. Nesciunt laboriosam facilis qui libero similique!</p>
                        </div>
                        <div class="card-footer">
                            <span>16:58</span>
                        </div>
                    </div>
                    <div class="clear-fix"></div>

                    <div class="card mensagem-enviada">
                        <div class="card-title">
                            <h3>Eu</h3>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse perspiciatis nemo ea odit quas tenetur saepe aut rem debitis pariatur atque quia, aperiam dolore eaque quidem quam cumque totam. Aperiam sed pariatur, cum voluptatibus odio, excepturi modi dolorum id quas autem culpa nostrum labore nemo commodi itaque perspiciatis, vel distinctio.</p>
                        </div>
                        <div class="card-footer">
                            <span>16:59</span>
                        </div>
                    </div>
                    <div class="clear-fix"></div>

                    <div class="card mensagem-recebida">
                        <div class="card-title">
                            <h3>Robson Moura</h3>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ea eum magnam, error libero nihil et fugiat nam. Repellat vero, totam ipsam asperiores nihil accusantium provident rem ex vel eius molestiae magni consectetur neque mollitia debitis voluptatem omnis. Repudiandae veritatis autem optio recusandae incidunt numquam eaque, eum sed non harum deserunt vitae tempora dicta aperiam esse vel quia assumenda sunt, explicabo corrupti omnis. Impedit vitae facere quisquam? Voluptatibus laudantium libero dignissimos quam, at ullam eum nisi, saepe expedita fuga aut reprehenderit dicta sapiente veritatis possimus officiis excepturi! Expedita aut sit voluptatum atque rerum modi itaque nesciunt optio quam, quaerat, officiis enim!</p>
                        </div>
                        <div class="card-footer">
                            <span>16:58</span>
                        </div>
                    </div>
                    <div class="clear-fix"></div>

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
        <script src="js/NovasMensagens.js"></script>
        <script>
            /* Verifificar se está na pagina  */
            const verificar = () => {
                if (document.visibilityState === "visible") {
                    <?php 
                        $conexao->query("INSERT INTO usuarios_ativos (id_usuario, ultimo_acesso, situacao) VALUES ($idLogado, now(), 'Online')");
                    ?>
                } else {
                    <?php 
                        $conexao->query("INSERT INTO usuarios_ativos (id_usuario, ultimo_acesso, situacao) VALUES ($idLogado, now(), 'Offline')");
                    ?>
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
