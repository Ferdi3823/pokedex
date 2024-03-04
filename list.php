<!-- 
    Ce fichier représente la page de liste de tous les pokémons.
    <pre>
    &lt;
    A REMPLACER PAR VOTRE CODE POUR CHARGER ET AFFICHER DANS UN TABLEAU LA LISTE DES POKEMONS PAR LEUR NOM.
    CHAQUE POKEMON DOIT ETRE CLIQUABLE POUR NAVIGUER SUR UNE PAGE OU L'ON AFFICHE SON IMAGE ET L'ENSEMBLE DE SES CARACTERISTIQUES 
    &gt;
    </pre>
-->
<?php require_once("head.php"); 
require_once('database-connection.php'); 
$query = $databaseConnection->query("SELECT NomPokemon, IdPokemon, urlPhoto, T.libelleType AS 'Type 1', T2.libelleType AS 'Type 2' 
    from pokemon P JOIN typepokemon T ON P.IdTypePokemon = T.IdType 
    LEFT JOIN typepokemon T2 ON 
    P.IdSecondTypePokemon = T2.IdType 
    ORDER BY IdPokemon"); 
    if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $pokemons = $query->fetch_all(MYSQLI_ASSOC); 
        echo "<table>"; 
        echo "<tr>
        <th>Nom</th>
        <th>Image</th>
        <th>Type</th>
        <th>Second Type</th>
        </tr>";
    foreach ($pokemons as $pokemon) { 
    echo "<tr>
    <td><a href='pokemon-unique.php?id=". $pokemon["IdPokemon"] ."'>" . $pokemon["NomPokemon"] . "</a></td>
    <td><img src='" . $pokemon['urlPhoto']. "' alt='" . $pokemon["NomPokemon"] . "'></td>
    <td>" . $pokemon["Type 1"] . "</td>
    <td>" . $pokemon["Type 2"] . "</td>
    </tr>"; } 
    echo "</table>"; } 
    require_once("footer.php");
     ?>