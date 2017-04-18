<?php
/**
 * Created by PhpStorm.
 * User: lucasnabas
 * Date: 12/04/2017
 * Time: 14:08
 */

require '../../src/view/headerClient.php';
require '../../src/view/navbar.php';
?>
<html>
<head>
    <link rel="stylesheet" href="../../dist/css/style.css"/>
    <link href="/dist/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<h1>
    Shop
</h1>
<?php

// On inclus le fichier de connexion à la base
include ('database.php');

// On définis le répertoire ou sont stockées les images (ex.: photos de voitures)
$dir = '../../dist/img';

// On séléctionne les enregistrements de la base
$req_main = $connexion->prepare("SELECT .filename, .description FROM  ORDER BY .filename ASC");
$req_main->execute();

// On crée une boucle pour afficher les photos avec description
while ($row = $req_main->fetch(PDO::FETCH_ASSOC)) {

// On crée les variables
    $filename = $row['filename'];
    $description = $row['description'];


    echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="'.$dir.'/'.$filename.'" width="150px" height="113px"></td>
    <td>'.$description.'</td>
  </tr>
</table>';
}

?>
</body>
</html>