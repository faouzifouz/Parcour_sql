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


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Meteo</title>
</head>
<body>
<form action="exe.php" method="post">
  
  <?php

    $resultat = $bdd->query('SELECT * FROM météo');

    echo '<table border>';
    echo '<tr>';
    echo '<th>'."Check"."</th>";
    echo '<th>'."Villes"."</th>";
    echo '<th>'."Minima"."</th>";
    echo '<th>'."Maxima"."</th>";
    
    echo '</tr>';
    
  while ($donnees = $resultat->fetch())
  {
    
  echo '<tr>';
  echo"<th><input type='checkbox' name='checkbox[]' value='".$donnees['ville']."'></th>";
  echo '<th>'.$donnees['ville'].'</th>';
  echo '<th>'.$donnees['bas'].'</th>';
  echo '<th>'.$donnees['haut'].'</th>';
  echo '</tr>';
}
echo '</table>';


?>



  <h2>Ajouter une ville</h2>
      <input type="text" name="ville" placeholder="ville" />
      <input type="text" name="haut" placeholder='maxima'/>
      <input type="text" name="bas" placeholder='minima' />
      <input type="submit" name='insert' value="ajouter"/>
      <input type="submit" name='delete' value="supprimer"/>
    </form>


</body>
</html>

