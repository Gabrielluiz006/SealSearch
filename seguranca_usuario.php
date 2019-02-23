<?php
/* php.ini
session.cookie_httponly=1;
session.cookie_secure=1;
session.use_only_cookies=1; */


define('HASH_SEGURANCA', 'W4r/N0Mor3Trouble@&St0pWar@');
// necessaria a criptografia do nome da sessao
// pois so assim, os dados do formulario vao ser encontrados
session_name(hash('sha512', $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].HASH_SEGURANCA)); 

// caso nao exista a variavel, entao a sessao é nova
if(empty($marcaTempoCache)) {
    // usando cache expire para setar uma tempo de sessao
    session_cache_expire(10);
    $marcaTempoCache = session_cache_expire();
}
        
session_start();

// aqui renova o id da sessa caso tenha passado o tempo
if($marcaTempoCache <= 3) {
    session_regenerate_id();
    /*
     * ainda vou modificar essa renovacao de sessao
     */
}

// cria um token de sessao
$tokenSessao = hash('sha512', $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].HASH_SEGURANCA. session_id());
