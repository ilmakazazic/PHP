<?php

function __autoload($classname){
    require_once "class/{$classname}.class.php";
}

?>
