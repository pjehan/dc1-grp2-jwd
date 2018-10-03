<?php
require_once '../../../model/database.php';

$liste_categories = getAllEntities("categorie");
$liste_tags = getAllEntities("tag");

require_once '../../layout/header.php';
?>

<h1>Création d'une photo</h1>

<form action="create_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="titre" placeholder="Titre" required class="form-control">
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="img" required class="form-control">
    </div>
    <div class="form-group">
        <label>Catégorie</label>
        <select name="categorie_id" required class="form-control">
            <?php foreach ($liste_categories as $categorie) : ?>
                <option value="<?php echo $categorie["id"]; ?>">
                    <?php echo $categorie["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Tags</label>
        <select name="tag_ids[]" multiple class="form-control">
            <?php foreach ($liste_tags as $tag) : ?>
                <option value="<?php echo $tag["id"]; ?>">
                    <?php echo $tag["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" placeholder="Description de la photo" class="form-control"></textarea>
    </div>
    <button class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>