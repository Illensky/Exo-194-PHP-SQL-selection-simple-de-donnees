<head>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<?php

/**
 * 1. Importez le fichier SQL se trouvant dans le dossier SQL.
 * 2. Connectez vous à votre base de données avec PHP
 * 3. Sélectionnez tous les utilisateurs et affichez toutes les infos proprement dans un div avec du css
 *    ex:  <div class="classe-css-utilisateur">
 *              utilisateur 1, données ( nom, prenom, etc ... )
 *         </div>
 *         <div class="classe-css-utilisateur">
 *              utilisateur 2, données ( nom, prenom, etc ... )
 *         </div>
 * 4. Faites la même chose, mais cette fois ci, triez le résultat selon la colonne ID, du plus grand au plus petit.
 * 5. Faites la même chose, mais cette fois ci en ne sélectionnant que les noms et les prénoms.
 */

require __DIR__ . '/Classes/Config.php';
require __DIR__ . '/Classes/DBSingleton.php';

$pdo = DBSingleton::PDO();

/*
$stm = $pdo->prepare("
        SELECT * FROM user
");
*/

/*
$stm = $pdo->prepare("
        SELECT * FROM user ORDER BY id DESC
");
*/

$stm = $pdo->prepare("
        SELECT nom, prenom FROM user
");

if ($stm->execute()) {
    foreach ($stm->fetchAll() as $index => $user) {
        echo "<div class='user'><h3>Utilisateur ".($index+1)." :</h3>";
        foreach ($user as $key => $value) {
            echo "<div>".$key." : ".$value."</div>";
        }
        echo "</div>";
    }
}