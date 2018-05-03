<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 02/05/2018
 * Time: 14:12
 */





define("PATHCONF", "./conf/");
date_default_timezone_set("Europe/Paris");
require_once "./functions/classAutoLoader.php";
spl_autoload_register('classAutoLoader');
$test = new Form(PATHCONF, "registration");
$test->frmCheck();
