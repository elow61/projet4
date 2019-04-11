<?php 
$title = $_SESSION['pseudo'] . ", Espace commentaires"; 
ob_start(); 
?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
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
                            <a href="index.php?action=deleteComment&id=<?= $data['id']?>" class="link-delete">
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
    <section class="reporting-comments">
    <h2>Liste des commentaires signalés</h2>
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
                        <th>Supprimer</th>
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
                            <a href="index.php?action=deleteComment&id=<?= $data['id']?>" class="link-delete">
                                <button type="button" class="btn btn-info">Voir</button>
                            </a>
                        </td>
                        <td>
                            <a href="index.php?action=deleteComment&id=<?= $data['id']?>">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
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