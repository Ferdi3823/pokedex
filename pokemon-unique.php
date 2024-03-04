<?php require_once("head.php"); 
require_once('database-connection.php');
$idPokemon = $_GET['id'];

$query = $databaseConnection->query("SELECT P.NomPokemon AS 'Nom', P.IdPokemon AS 'Id', P.urlPhoto AS 'Photo', P.PV AS 'PV', P.Attaque AS 'Attaque', P.Defense AS 'Defense', P.Vitesse AS 'Vitesse', P.Special AS 'Special', E.idEvolution AS 'Evolution',P2.NomPokemon AS 'Nom2', P2.IdPokemon AS 'Id2', P2.urlPhoto AS 'Photo2' 
    from evolutionpokemon E 
    JOIN pokemon P ON E.IdPokemon = P.idPokemon 
    LEFT JOIN Pokemon P2 ON 
    E.idEvolution = P2.IdPokemon 
    WHERE P.IdPokemon = $idPokemon"); 
    if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $idpokemon = $query->fetch_assoc();
        echo "<h1> Pokemon n° " . $idpokemon['Id'] ."</h1>
        <h3>" . $idpokemon['Nom'] ."</h3>
        <img src='" . $idpokemon['Photo']. "' alt='" . $idpokemon["Nom"] . "'>"
        ;
        echo "<table>"; 
        echo "<tr>
        <th>PV</th>
        <th>Defense</th>
        <th>Vitesse</th>
        <th>Attaque Spéciale</th>
        </tr>";
    echo "<tr>
    <td>" . $idpokemon["PV"] . "</td>
    <td>" . $idpokemon["Defense"] . "</td>
    <td>" . $idpokemon["Vitesse"] . "</td>
    <td>" . $idpokemon["Special"] . "</td>
    </tr>"; } 
    echo "</table>";
require_once("footer.php");
?>