<?php require_once '../../layout/header.php'; ?>

<h1>Création d'une catégorie</h1>

<form action="create_query.php" method="POST">
    <div class="form-group">
        <label>Libellé</label>
        <input type="text" name="libelle" placeholder="Libellé" class="form-control">
    </div>
    <button class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>