<?php require_once("head.php"); 
require_once('database-connection.php');
$idPokemon = $_GET['id'];

$query = $databaseConnection->query("SELECT NomPokemon, IdPokemon, urlPhoto, T.libelleType AS 'Type 1', T2.libelleType AS 'Type 2' 
from pokemon P
 JOIN typepokemon T ON P.IdTypePokemon = T.IdType
  LEFT JOIN typepokemon T2 ON P.IdSecondTypePokemon = T2.IdType 
  WHERE idPokemon = $idPokemon
  ORDER BY IdPokemon"); 
    if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $idpokemon = $query->fetch_assoc();
        echo "<h1> Pokemon n° " . $idpokemon['IdPokemon'] ."</h1>"
        ;
    }
require_once("footer.php");
?>