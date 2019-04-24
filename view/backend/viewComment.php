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
                    <a class="btn btn-success" href="index.php?action=validComment&id=<?= $comment['id'] ?>" onclick="return(confirm('Êtes-vous sûr de vouloir valider ce commentaire ?'));">
                        Valider
                    </a>
                <?php endif;?>
                <a class="btn btn-danger" href="index.php?action=deleteComment&id=<?= $comment['id'] ?>" data-toggle="tooltip" title="Le commentaire sera supprimé de la base de donnée." onclick="return(confirm('Êtes vous sûr de vouloir supprimer ce commentaire ?'));">
                    Supprimer
                </a>
            </div>
    </div>
</main>

<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>
