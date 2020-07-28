<?php
 
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 */
function make_hash($str){    
    return base64_encode($str);
}

function decode_hash($str){
	return base64_decode($str);
}
 
 
/**
 * Verifica se o usuário está logado
 */
function isLoggedIn()
{
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    return true;
}