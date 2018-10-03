<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST["id"];
$libelle = $_POST["libelle"];

updateCategorie($id, $libelle);

header("Location: index.php");