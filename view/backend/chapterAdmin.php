<?php $title = $_SESSION['pseudo'] . ", Espace chapitres"; ?>
<?php ob_start(); ?>

    <main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
        <section class="chapter-management">
            <h2>Liste de vos chapitres</h2>
            <hr>
            <?php 
                if (isset($_GET['chap']) && $_GET['chap'] === 'add') {
                    echo '<div class="alert alert-info">Le chapitre a bien été ajouté.</div>';
                }

                if (isset($_GET['chap']) && $_GET['chap'] === 'modified') {
                    echo '<div class="alert alert-success">Le chapitre a bien été modifié.</div>';
                }

                if (isset($_GET['chap']) && $_GET['chap'] === 'delete') {
                    echo '<div class="alert alert-danger">Le chapitre a bien été supprimé.</div>';
                }
            ?>
            <div class="tab">
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Chapitre</th>
                            <th>Date</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($chapters)): ?>
                        <?php foreach ($chapters as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars_decode($data['title']); ?></td>
                            <td> <?= nl2br(htmlspecialchars_decode($this->helper->extract($data['chapter']))) ?> </td>
                            <td> <?= $data['date_sent'] ?> </td>
                            <td> 
                                <a href="index.php?action=viewChangeChapter&id=<?= $data['id'] ?>">
                                    <button type="button" class="btn btn-success">Modifier</button>
                                </a>  
                            </td>
                            <td> 
                                <a href="index.php?action=deleteChapter&id=<?= $data['id'] ?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?'));">
                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                </a>  
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="add-chapter">
            <h2>Ajouter un chapitre</h2>
            <hr>
            <form action="index.php?action=addChapter" method="post">
            <h3>Titre</h3>
            <div class="form-group">
                <input type="text" name="newTitle">
            </div>
            <h3>Chapitre</h3>
            <div class="form-group">
                <textarea name="newChapter" cols="30" rows="10">
                </textarea>
            </div>
            <button class="btn btn-primary" type="submit">Ajouter</button>
        </form>
        </section>

    </main>


<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>