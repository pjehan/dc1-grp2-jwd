<?php
require_once '../../../model/database.php';

$id = $_GET["id"];
$photo = getEntity("photo", $id);
$liste_categories = getAllEntities("categorie");
$liste_tags = getAllEntities("tag");

$photo_liste_tags = getAllTagsByPhoto($id);
$photo_liste_tag_ids = [];
foreach ($photo_liste_tags as $tag) {
    $photo_liste_tag_ids[] = $tag["id"];
}

require_once '../../layout/header.php';
?>

<h1>Modification d'une photo</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="titre" value="<?php echo $photo["titre"]; ?>" placeholder="Titre" required class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="img" class="form-control">
        <img src="../../../uploads/<?php echo $photo["img"]; ?>" class="img-thumbnail">
    </div>
    <div class="form-group">
        <label>Catégorie</label>
        <select name="categorie_id" required class="form-control">
            <?php foreach ($liste_categories as $categorie) : ?>
                <?php $selected = ($categorie["id"] == $photo["categorie_id"]) ? "selected" : ""; ?>
                <option value="<?php echo $categorie["id"]; ?>" <?php echo $selected; ?>>
                    <?php echo $categorie["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tags</label>
        <select name="tag_ids[]" multiple class="form-control">
            <?php foreach ($liste_tags as $tag) : ?>
                <?php $selected = (in_array($tag["id"], $photo_liste_tag_ids)) ? "selected" : ""; ?>
                <option value="<?php echo $tag["id"]; ?>" <?php echo $selected; ?>>
                    <?php echo $tag["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" placeholder="Description de la photo" class="form-control"><?php echo $photo["description"]; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>