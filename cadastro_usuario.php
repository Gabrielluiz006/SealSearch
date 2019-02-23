<?php
require_once './seguranca_usuario.php';
require_once './conexao.php';

define('TABELA', 'cliente');

try {
    $con = getConexao();
    if(!isset($con)) {
        header('Location: ./pagefound.php');
    }
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $cadastro = filter_input(INPUT_POST, 'cadastrar', FILTER_SANITIZE_SPECIAL_CHARS);

    // recebendo os dados do formulario e usando filtros
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
    $dataNasc = filter_input(INPUT_POST, 'data_nasc', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // verifica se todas as variaveis tem algum valor
    if(empty($nome) || empty($email) || empty($senha) || empty($cpf)) {
        if(empty($nome)) {
            $_SESSION['msgDeVerificacaoNome'] = "* Nome é necessário";
        }
        if(empty($email)) {
            $_SESSION['msgDeVerificacaoEmail'] = "* Email é necessário";
        }
        if(empty($senha)) {
            $_SESSION['msgDeVerificacaoSenha'] = "* Senha é necessário";
        }
        // salvando valores para evitar reescrita no formulario
        $_SESSION['nomeForm'] = (isset($_POST['nome'])) ? $_POST['nome'] : '';
        $_SESSION['emailForm'] = (isset($_POST['email'])) ? $_POST['email'] : '';
        $_SESSION['cpfForm'] = (isset($_POST['cpfForm'])) ? $_POST['cpfForm'] : '';
        $_SESSION['dataNascForm'] = (isset($_POST['dataNascForm'])) ? $_POST['dataNascForm'] : '';
        $con = null;
        header('Location: ../PP1_FRONT/Cadastro.php');
        exit();
    }
        
    if(isset($nome,$email,$senha,$cadastro,$cpf,$dataNasc)) {
        // verificar se o email ja esta sendo usado
        $sql_verifica_email = 'SELECT email FROM '.TABELA.' WHERE id = (SELECT id FROM cliente WHERE email = :verificarEmail);';
        $stmtVerificarEmail = $con->prepare($sql_verifica_email);
        $stmtVerificarEmail->bindParam('verificarEmail', $email);
        
        if($stmtVerificarEmail->execute()) {
            $result = $stmtVerificarEmail->fetchAll(PDO::FETCH_ASSOC);
            if(count($result)) {
                $_SESSION['msgDeVerificacaoEmail'] = "* Email já está sendo usado";
                $con = null;
                header('Location: ../PP1_FRONT/Cadastro.php');
                exit();
            }
        }
        
        // preparando sql
        $sql = 'INSERT INTO '.TABELA.' (nome,email,senha,CPF,data_nascimento) '
                .'VALUES (:nome,:email,:senha,:cpf,:data_nasc);';
        $stmt = $con->prepare($sql);

        // trocar os valores do statement com bindParam
        $stmt->bindParam('nome', $nome);
        
        // passando a senha por uma funcao hash
        $senha = hash('sha512', $senha.HASH_SEGURANCA);
        
        $stmt->bindParam('email', $email);
        $stmt->bindParam('senha', $senha);
        $stmt->bindParam('cpf', $cpf);
        $stmt->bindParam('data_nasc', $dataNasc);
        
        // executando
        if($stmt->execute()) {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $con = null;
            header('Location: ../login_cadastro_usuario/login_usuario.php');
        }else {
            $_SESSION['msgDeVerificacao'] = "Não foi possivel cadastrar";
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $con = null;
            header('Location: ../PP1_FRONT/Cadastro.php');
        }

    }else {
        $_SESSION['msgDeVerificacao'] = "Não foi possivel cadastrar";
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        $con = null;
        header('Location: ../PP1_FRONT/Cadastro.php');
    }

}catch(PDOException $ex) {
    echo $ex->getCode(); echo $ex->getMessage();
}