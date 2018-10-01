<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST["id"];

$error = deleteEntity("categorie", $id);
if ($error) {
    header("Location: index.php?errcode=" . $error->getCode());
    exit;
}

header("Location: index.php");