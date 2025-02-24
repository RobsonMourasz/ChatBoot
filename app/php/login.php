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
                $_SESSION['sessao'] = $verificar_LOGIN['usuario'];
                header("Location: ../index.php");
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