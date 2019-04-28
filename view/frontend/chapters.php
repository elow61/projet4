<?php $title = 'Chapitres - Le blog de Jean Forteroche'; ?>
<?php ob_start(); ?>
    <div class="bg-head">
        <p class="mess-head">Liste des chapitres</p>
    </div>

    <nav class="list-chapter">
        <div class="btn-chap">
            <ul class="nav">
            <?php if (is_array($chapters)): ?>
            <?php foreach ($chapters as $chapter): ?>
                <li>   
                    <a href="index.php?action=allChapters&id=<?= $chapter['id'] ?>">
                        <span class="button"><?= htmlspecialchars($chapter['title']) ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
            </ul>
        </div>
    </nav>
        <?php 
        if (isset($_GET['report']) && $_GET['report'] == 'success') {
            echo '<p class="msg_confirm">Le commentaire est bien signalé et sera traité dans les meilleurs délais. Merci.</p>';
        }
        ?>
    <div id="container-page">
        <section class=chapter>
            <div>
                <h2>
                    <?= htmlspecialchars_decode($chapter_single['title']) ?>
                </h2>
                <br />
                <?= nl2br(htmlspecialchars_decode($chapter_single['chapter'])) ?>
                <br />
            </div>
        </section>  
        <section class="comments">
            <div class="comments-box">
                <h2>Commentaires</h2>
                <?php
                foreach ($comments as $data_comment): ?>
                <div class="container-comm">
                    <div class="name">
                        <p>De <?= htmlspecialchars($data_comment['author']) ?></p>
                    </div>
                    <div class="comment">
                        <p class="date">le <?= $data_comment['date_create'] ?></p>
                        <br />
                        <p class="text-comment"> <?= nl2br(htmlspecialchars($data_comment['comment'])) ?> </p>
                        <br>
                    </div>
                    <?php if ($data_comment['report'] == 1): ?>
                    <!-- Message de signalement -->
                    <div class="bubble-mess">
                        <p class="mess-report">Commentaire signalé, en cours de traitement.</p>
                    </div>                     
                    <?php else :?>
                    <!-- Bouton pour signaler -->
                        <a href="index.php?action=report&id=<?= $data_comment['chapter_id'] ?>&commentId=<?= $data_comment['id']?>" onclick="return(confirm('Êtes vous sûr de vouloir signaler ce commentaire ?'));">
                            <span class="report-btn">Signaler</span>
                        </a>
                    <?php endif ?>
                </div>
                <?php endforeach ?>
            </div>
        </section>
        <section class="add-comments">
            <div class="box-add-comment">
                <h2>Ajouter un commentaire</h2>
                <form action="index.php?action=addComment&id=<?= $chapter_single['id'] ?>" method="post">
                    <div class="label-author">
                        <input type="text" name="author" id="author" placeholder="VOTRE PSEUDO">
                    </div>
                    <div>
                        <textarea name="comment" id="comment" rows="10" placeholder="VOTRE COMMENTAIRE"></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
            </div> 
        </section>
    </div>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
