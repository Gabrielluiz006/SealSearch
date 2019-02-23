<?php
require_once './conexao.php';
require_once './seguranca_usuario.php';

define('TABELA', 'cliente');

try {
    $con = getConexao();
    /* verifica se existe algum problema de conexao, caso exista, redireciona para pagefound
     * evitando assim, mostrar os diretorios da pasta
     */
    if(!isset($con)) {
        header('Location: ./pagefound.php');
    }
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // verifica se as variaveis globais tem algum valor
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email-login', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha-login', FILTER_SANITIZE_SPECIAL_CHARS);
    
    // funcao hashing na senha se vier do form de login
    if(isset($senha)) {
       $senha = hash('sha512', $senha.HASH_SEGURANCA); 
    }
    
    if(isset($_SESSION['email'],$_SESSION['senha'])) {
        // se vier redirecionado do form de cadastro, nao é necessario usar a funcao hashing, pois ja foi usado
        $email = $_SESSION['email'];
        $senha = $_SESSION['senha'];
    }
    
    // codigo para logar
    if(isset($email,$login,$senha)){
        // busca no banco os dados com base no email
        $sql = 'SELECT nome,CPF,email,senha,data_nascimento FROM '.TABELA.' WHERE id = (SELECT id FROM cliente WHERE email = :email);';
        
        // prepara sql
        $stmt = $con->prepare($sql);
            
        $stmt->bindParam(':email', $email);
           
            if($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                // hash_equals agora para verificar se senha do banco é igua a que o usuario mandou
                if(hash_equals($result[0]['senha'], $senha)) {
                    foreach ($result as $value) {
                        $_SESSION['nome'] = $value['nome'];
                        $_SESSION['cpf'] = $value['CPF'];
                        $_SESSION['email'] = $value['email'];
                        $_SESSION['senha'] = $value['senha'];
                        $_SESSION['dataNasc'] = $value['data_nascimento'];
                    }
                    $_SESSION['tokenUsuarioLogado'] = hash('sha512', $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].HASH_SEGURANCA. session_id());
                    unset($_SESSION['msgLoginFalha']);
                    $con = null;
                    header('Location: ../PP1_FRONT/Perfil.php');
                    
                }else {
                    // caso a senha esteja errada
                    $_SESSION['msgLoginFalha'] = true;
                    unset($_SESSION['email']);
                    unset($_SESSION['senha']);
                    $con = null;
                    header('Location: ../PP1_FRONT/Cadastro.php');
                }
                
            }else {
                // caso o execute() falhe
                $_SESSION['msgLoginFalha'] = true;
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                $con = null;
                header('Location: ../PP1_FRONT/Cadastro.php');
            }

        }else {
            // caso algumas das variaveis nao tenha valor
            $_SESSION['msgLoginFalha'] = true;
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $con = null;
            header('Location: ../PP1_FRONT/Cadastro.php');
        }
} catch (PDOException $e) {
    echo $e->getCode(); echo $e->getMessage();
}
