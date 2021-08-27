  
<?php
define('DB_USER','root');
define('DB_SERVER','localhost');
define('DB_NAME','travelbook');
define('DB_PASSWORD','system');
try
 {
    $pdo=new PDO("mysql:host=".DB_SERVER."dbname=".DB_NAME,DB_USER,DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 }
 catch(PDOException $e)
 {
    die("ERROR:Could not connect".$e->getMessage());

 }
?>