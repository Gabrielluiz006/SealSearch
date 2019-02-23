<?php

function getConexao() {
    try {
        $dsn = 'mysql:host=localhost;dbname=sealseach;charset=utf8;';
        $username = 'root';
        $passwd = '';
        $pdo = new PDO($dsn, $username, $passwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $ex) {
        echo $ex->getCode(); echo $ex->getMessage();
        return null;
    }
}
