<?php 
$title = "Commentaire de " . $comment['author'];
ob_start();
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
    <section class="display-comment">
        <h2>Commentaire de <?= $comment['author']?></h2>
        <hr>
        <div class="box-comment">
            <?= $comment['comment'] ?>
        </div>
        <a href="index.php?action=validComm">
            <button class="btn btn-success">Valider</button>
        </a>
        <a href="index.php?action=deleteComm">
            <button class="btn btn-danger">Supprimer</button>
        </a>
    </section>
</main>

<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>
