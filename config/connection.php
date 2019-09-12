<?php
    // demarage du session
    session_start();
    //chaine de connection à la base de données
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=php;charset=utf8','root','');
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die('Erreur de connexion: '.$e->getMessage());
    }
?>