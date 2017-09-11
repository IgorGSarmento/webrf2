<?php
 
/**
 * Conecta com o MySQL usando PDO
 */
function db_connect()
{
    $PDO = new PDO("pgsql:host=".DB_HOST."; dbname=".DB_NAME."; user=".DB_USER."; password=".DB_PASS."");
 
    return $PDO;
}
 
 
/**
 * Cria o hash da senha, usando MD5 e SHA-1
 
function make_hash($str)
{
    return sha1(md5($str));
}
*/

//$encrypted = encryptIt($input);
//$decrypted = decryptIt($encrypted);

function encryptIt( $str ) {
    $cryptKey  = '1fed12c3baac014be15fac';
    $strEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, 
    	md5($cryptKey), $str, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
    return( $strEncoded );
}

function decryptIt( $str ) {
    $cryptKey  = '1fed12c3baac014be15fac';
    $strDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), 
    	base64_decode($str), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
    return( $strDecoded );
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