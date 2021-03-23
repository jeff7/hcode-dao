<?php

require_once "config.php";

$root = new formulario();

$root->loadById(1);

echo $root;