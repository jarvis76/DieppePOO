<?php
//sert a appeler les fichiers dans classes sans faire un include
function classAutoLoader($className) {
    require_once "./classes/" . $className . ".php";
}