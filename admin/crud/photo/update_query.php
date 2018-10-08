<?php

require_once '../../security.php';
require_once '../../../model/database.php';

$id = $_POST["id"];
$photo = getPhoto($id);

$titre = $_POST["titre"];
$description = $_POST["description"];
$categorie_id = $_POST["categorie_id"];
$tag_ids = isset($_POST["tag_ids"]) ? $_POST["tag_ids"] : [];

// Upload de l'image
if ($_FILES["img"]["error"] == 0) {
    $tmp = $_FILES["img"]["tmp_name"]; // Emplacement temporaire du fichier uploadé
    $filename = $_FILES["img"]["name"]; // Nom du fichier uploadé
    move_uploaded_file($tmp, "../../../uploads/" . $filename);
} else {
    // Pas d'upload d'image
    // Conserver l'image actuellement présente
    $filename = $photo["img"];
}

updatePhoto($id, $titre, $filename, $description, $categorie_id, $tag_ids);

header("Location: index.php");
