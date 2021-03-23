<?php

require_once "config.php";

$sql = new sql();

$formulario = $sql->select("SELECT * FROM formulario");

echo json_encode($formulario);
