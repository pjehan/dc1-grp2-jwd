<?php
require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST["id"];
$photo = getEntity("photo", $id);

$error = deleteEntity("photo", $id);
if ($error) {
    header("Location: index.php?errcode=" . $error->getCode());
    exit;
}

// Supprimer l'image du disque dur
unlink("../../../uploads/" . $photo["img"]);

header("Location: index.php");