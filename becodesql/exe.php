<?php
 try
 {
     // On se connecte à MySQL
     $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root');
 }
 catch(Exception $e)
 {
     // En cas d'erreur, on affiche un message et on arrête tout
         die('Erreur : '.$e->getMessage());
 }
 
    if(isset($_POST['ville']) && isset($_POST['haut']) && isset($_POST['bas']))
    {
        $ville=$_POST['ville'];
        $haut=$_POST['haut'];
        $bas=$_POST['bas'];

        $ajout = $bdd->exec("INSERT INTO météo(ville, bas, haut) VALUES ('$ville', '$bas', '$haut')");
    }

    if(isset($_POST['delete'])){
       foreach($_POST['checkbox'] as $check) {
           
        $del= $bdd->exec("DELETE FROM météo WHERE ville = '$check'");
       } 
    }
    header ('Location: http://localhost/becodesql/');
?>