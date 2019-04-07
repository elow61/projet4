<?php
$title = 'Bonjour '. $_SESSION['pseudo'] . '!'; 
?>

<?php ob_start(); ?>

        <!-- Container -->
    <main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
        <!-- Dashbord -->
        <section id="dashboard">
            <h2>Tableau de bord</h2>
            <hr/>
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview_C1">
                        <div class="overview-element">
                            <div class="icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            <div class="text">
                                <h2>
                                    <?= $numberChapter['nb'] ?>
                                </h2>
                                <span>chapitre<?php if ($numberChapter['nb'] > 1): ?>s <?php endif;?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview_C2">
                        <div class="overview-element">
                            <div class="icon">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                            <div class="text">
                                <h2>
                                    <?= $numberComment['nb'] ?>
                                </h2>
                                <span>commentaire<?php if ($numberComment['nb'] > 1): ?>s <?php endif;?> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Chapters -->
        <section id="last-chapters">
            <br>
            <h2>Derniers chapitres</h2>
            <hr />
            <div class="tab">
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Chapitre</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($chapters)): ?>
                        <?php foreach ($chapters as $data): ?>
                        <tr>
                            <td><?= htmlspecialchars_decode($data['title']); ?></td>
                            <td> <?= nl2br(htmlspecialchars_decode($this->helper->extract($data['chapter']))) ?> </td>
                            <td> <?= $data['date_sent'] ?> </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
               
        </section>
        <!-- Comments -->
        <section id="commentaires">
            <br />
            <h2>Commentaires</h2>
            <hr />
            <div class="tab">
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Auteurs</th>
                            <th>Commentaires</th>
                            <th>Chapitre dédié</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (is_array($comments)): ?>
                        <?php foreach ($comments as $data_comment): ?>
                        <tr>
                            <td><?= htmlspecialchars($data_comment['author']); ?></td>
                            <td> <?= nl2br(htmlspecialchars(substr($data_comment['comment'], 0, 100))).'...' ?> </td>
                            <td> <?= $data_comment['chapter_id'] ?> </td>
                            <td> <?= $data_comment['date_create'] ?> </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
        </section>
    </main>

<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php');