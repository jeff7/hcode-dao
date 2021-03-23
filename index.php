<?php

require_once "config.php";

// $root = new formulario();

// $root->loadById(1);

$lista = formulario::getList();

echo json_encode($lista);

// echo $root;