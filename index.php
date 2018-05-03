<h1> Bienvenue sur votre reservation de mariage </h1>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title> EasyWedding </title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a> </li>
            <li><a href="#">.</a> </li>
        </ul>
    </nav>
</header>
</body>
</html>




<?php
define("PATHCONF", "./conf/");
date_default_timezone_set("Europe/Paris");
require_once "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');
$test = new Form(PATHCONF, "registration");
echo $test->frmGenerate("form.php");


?>



