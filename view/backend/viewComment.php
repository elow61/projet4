<?php 
$title = "Commentaire de " . $comment['author'];
ob_start();
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Commentaire de <?= $comment['author']?></h2>
            <hr>
            <?= $comment['comment'] ?>
        </div>
            <div class="card-footer bg-secondary">
                <?php if ($comment['report'] == 1): ?>
                    <a href="index.php?action=validComment&id=<?= $comment['id'] ?>" onclick="return(confirm('Êtes-vous sûr de vouloir valider ce commentaire ?'));">
                        <button class="btn btn-success">Valider</button>
                    </a>
                <?php endif;?>
                <a href="index.php?action=deleteComment&id=<?= $comment['id'] ?>" data-toggle="tooltip" title="Le commentaire sera supprimé de la base de donnée." onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?'));">
                    <button class="btn btn-danger">Supprimer</button>
                </a>
            </div>
    </section>
</main>

<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>
