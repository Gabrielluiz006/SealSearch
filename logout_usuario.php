<?php

require_once './seguranca_usuario.php';

// para evitar o usuario ter que reescrever o email, guardo em uma variavel local
if(isset($_SESSION['email'])) {
    $email_login = $_SESSION['email'];
}

// depois limpo a sessao criando um novo array, fazendo assim, todas as sessoes serem sobrescritas
$_SESSION = array();
session_destroy();

// logo depois de destruir a sessao, uso a variavel local para setar o cookie
if(isset($email_login)) {
    setcookie('email-login', $email_login);
}

header('Location: ../PP1_FRONT/Home.php');
exit();