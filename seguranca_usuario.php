<?php
/* php.ini
session.cookie_httponly=1;
session.cookie_secure=1;
session.use_only_cookies=1; */

define('HASH_SEGURANCA', 'W4r/N0Mor3Trouble@&St0pWar@');
// necessaria a criptografia do nome da sessao
// pois so assim, os dados do formulario vao ser encontrados
session_name(hash('sha512', $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].HASH_SEGURANCA)); 

session_start();

$tokenSessao = hash('sha512', $_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].HASH_SEGURANCA. session_id());

