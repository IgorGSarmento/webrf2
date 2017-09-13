<?php

// constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'igor');
define('DB_PASS', 'qwert');
define('DB_NAME', 'dbWebRF2');

// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

// inclui o arquivo de funçõees
require_once 'functions.php';