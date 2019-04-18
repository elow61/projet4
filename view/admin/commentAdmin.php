<?php 
$title = $_SESSION['pseudo'] . ", Espace commentaires"; 
ob_start(); 
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
    <section class="reporting-comments">
    <h2>Liste des commentaires signalés</h2>
        <hr>
        <?php 
            if (isset($_GET['comm']) && $_GET['comm'] === 'validate') {
                echo '<div class="alert alert-info">Le commentaire a bien été validé.</div>';
            }

            if (isset($_GET['comm']) && $_GET['comm'] === 'delete') {
                echo '<div class="alert alert-danger">Le commentaire a bien été supprimé de la base de donnée.</div>';
            }
            ?>
        <div class="tab">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Commentaire</th>
                        <th>Chapitre ciblé</th>
                        <th>Date</th>
                        <th>Traitement</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (is_array($report)): ?>
                    <?php foreach ($report as $data): ?>
                    <tr>
                        <td><?= htmlspecialchars($data['author']) ?></td>
                        <td><?=nl2br(htmlspecialchars($this->helper->extract($data['comment'])))?></td>
                        <td> <?= $data['chapter_id'] ?></td>
                        <td><?= $data['date_create']?></td>
                        <td>
                            <a href="index.php?action=viewComment&id=<?= $data['id_comm']?>" class="link-view">
                                <button type="button" class="btn btn-warning">Gérer</button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </section>
    <section class="comment-management">
        <h2>Liste des commentaires</h2>
        <hr>
        <div class="tab">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th>Prénom</th>
                        <th>Commentaire</th>
                        <th>Chapitre ciblé</th>
                        <th>Date</th>
                        <th>Lire</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (is_array($comments)): ?>
                    <?php foreach ($comments as $data): ?>
                    <tr>
                        <td><?= htmlspecialchars($data['author']) ?></td>
                        <td><?=nl2br(htmlspecialchars($this->helper->extract($data['comment'])))?></td>
                        <td> <?= $data['chapter_id'] ?></td>
                        <td><?= $data['date_create']?></td>
                        <td>
                            <a href="index.php?action=viewComment&id=<?= $data['id']?>" class="link-view">
                                <button type="button" class="btn btn-info">Voir</button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </div>
    </section>
</main>


<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>