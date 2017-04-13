<?php
/**
 * Created by PhpStorm.
 * User: lucasnabas
 * Date: 13/04/2017
 * Time: 11:35
 */


 if($_POST['email'] != "@viacesi.fr" AND "cesi.fr"){
     die('bot!');
 }
 else{

 }

?>

<html xmlns="http://www.w3.org/1999/html">
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
<div class="inscription">
<div class="container-fluid">
<form method="post" action="">
    <div class="form-horizontal">
        <label class="control-label">Identifiant:<input type="text" name="identifiant"/></label><br/>
    </div>
    <div class="form-groupe">
        <label class="control-label">Mot de passe: <input type="password" name="passe"/></label><br/>
    </div>
    <div class="form-groupe">
        <label class="control-label">Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
    </div>
    <div class="form-groupe">
        <label class="control-label">Promotion <select name="nom" size="1"></label><br/>
        <option>A1</option>
        <option>A2</option>
        <option>A3</option>
        <option>A4</option>
        <option>A5</option>
    </select>
    </div>
    <div class="form-groupe">
        <label class="control-label">Adresse e-mail: <input type="email" name="email"/></label><br/>
    </div>

        <input type="submit" value="M'inscrire" class="btn btn-default"/>
</div>





</form>
    </div>

</body>
</html>

