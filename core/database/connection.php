<?php 
    $dsn = 'mysql:host=localhost;dbname=tweety';
    $user = 'ali';
    $pass = 'chelseatavb';

    try {
        $pdo = new PDO($dsn, $user, $pass);
    }catch(PDOException $err){
        echo 'Connection error ' . $err->getMessage();
    }
?>