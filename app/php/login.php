<?php 
    require_once __DIR__."/../data/conexao.php";

    if(isset($_POST["user"]) && isset($_POST["password"])){
        $email = $_POST["user"] != "" ? $_POST["user"] : "sememail.com";
        $senha = $_POST['password'] != "" ? $_POST['password'] : "1234";

        $verificar_LOGIN = $conexao->query("SELECT * FROM cad_login WHERE usuario = '$email' AND user_ativo = 0");
        if($verificar_LOGIN->num_rows > 0 ){
            $verificar_LOGIN = $verificar_LOGIN->fetch_assoc();
            $verificar_SENHA = password_verify($senha, $verificar_LOGIN['senha']);
            if($verificar_SENHA){
                if (!isset($_SESSION)) {
                    session_start();
                }
                try {
                    $idLogado = $verificar_LOGIN['id_login'];
                    $_SESSION['sessao'] = $verificar_LOGIN['usuario'];
                    $_SESSION['nomeUsuario'] = $verificar_LOGIN['nome'];
                    $_SESSION['idUsuario'] = $idLogado;
                    $insertOnline = $conexao->query("INSERT INTO usuarios_ativos (id_usuario, ultimo_acesso, situacao) VALUES ($idLogado, now(), 'Online')");
                    header("Location: ../index.php");
                } catch (\Throwable $th) {
                    ?>
                    <script>
                        alert("Opss Usuario incorreto")
                        location.assign("../../index.html")
                    </script> 
                    <?php
                }
            }else{
                ?> 
                <script>alert("Opss Senha incorreta")</script>
                <script>location.assign("../../index.html")</script>
                <?php
            }
        }else{
            ?> 
            <script>alert("Opss Usuario incorreto")</script>
            <script>location.assign("../../index.html")</script>
            <?php
        }
        
    }