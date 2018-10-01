<?php
require_once '../../../model/database.php';

$liste_categories = getAllEntities("categorie");

$error_msg = null;
if (isset($_GET["errcode"])) {
    switch ($_GET["errcode"]) {
        case 23000:
            $error_msg = "Erreur lors de la suppression !";
            break;
        default:
            $error_msg = "Une erreur est survenue !";
            break;
    }
}

require_once '../../layout/header.php';
?>

<h1>Gestion des catégories</h1>

<a href="create.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<?php if ($error_msg) : ?>
    <div class="alert alert-danger">
        <i class="fa fa-times"></i>
        <?php echo $error_msg; ?>
    </div>
<?php endif; ?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Titre</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($liste_categories as $categorie) : ?>
            <tr>
                <td><?php echo $categorie["libelle"]; ?></td>
                <td>
                    <div class="actions">
                        <a href="update.php?id=<?php echo $categorie["id"]; ?>" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                            Modifier
                        </a>
                        <form action="delete_query.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $categorie["id"]; ?>">
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once '../../layout/footer.php'; ?>