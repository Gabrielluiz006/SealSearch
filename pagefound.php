<?php
require_once '../login_cadastro_usuario/conexao.php';

$con = getConexao();
if($con != null) {
    header('Location: ./logout_usuario.php');
}
session_start();
// limpo a sessao criando uma array vazio
$_SESSION = array();
// destroi todas as variaveis da sessao
session_unset();
// e agora destroi a sessao
session_destroy();

echo "<br><h1>Página fora do ar</h1>";

