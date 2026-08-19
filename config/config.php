<?php
session_start();

define ('BASE_URL', 'http://localhost/IT34b-lab');

define ('DB_HOST', 'localhost');
define ('DB_NAME', 'it34b-lab_db');
define ('DB_USER', 'root');
DEFINE ('DB_PASS', '');

try{
    $pdo = new PDo(
        "mysql:host=" . DB_HOST . ";dbname=" .DB_NAME , DB_USER , DB_PASS,
        [PDO :: ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]    
    );
}catch(PDOExceptipon $e){
  die ("Connection failed: " . $e->getMessage());
}

?>