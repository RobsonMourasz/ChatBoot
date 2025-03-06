<?php 
include_once __DIR__."/../data/conexao.php";
if(!isset($_SESSION)){
    session_start();
}
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = intval(limpar_texto($_GET['id']));

}
