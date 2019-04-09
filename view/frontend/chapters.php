<?php $title = 'Chapitres - Le blog de Jean Forteroche';

?>
<?php ob_start(); ?>
    <nav class="list-chapter">
        <div class="btn-chap">
            <ul class="nav">
            <?php if (is_array($chapters)): ?>
            <?php foreach ($chapters as $chapter): ?>
                <li>   
                    <a href="index.php?action=allChapters&id=<?= $chapter['id'] ?>">
                        <button id="button"><?= htmlspecialchars($chapter['title']) ?></button>                        
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>

            </ul>
        </div>
        
</nav>
    <section id="chapters">
        <div class="chapter">
            <h2>
                <?= htmlspecialchars_decode($chapter_single['title']) ?>
            </h2>
            <br />
            <p>
                <?= nl2br(htmlspecialchars_decode($chapter_single['chapter'])) ?>
            </p>
            <br />
        </div>
            <?php
            if (isset($_GET['report']) && $_GET['report'] == 'success') {
                echo 'Le commentaire est bien signalé et sera traité dans les meilleurs délais. Merci.';
            }

            ?>
            <div class="comments">
                <h2>Commentaires</h2>
                    <?php
                    foreach ($comments as $data_comment): ?> 
                        <p class="author-comm"> <strong><?= htmlspecialchars($data_comment['author'])?></strong>
                        (le <?= $data_comment['date_create'] ?>) </p>
                        <br />
                        <p class="text-comment"> <?= nl2br(htmlspecialchars($data_comment['comment'])) ?> </p>
                        <br>
                            <button id="report-btn">Signaler</button>
                                    <p id="mess-report">Le commentaire a été signalé. Il sera traité par l'administration dans les meilleurs délais. Merci.</p>
                                    <div id="form-hidden">
                                        <div class="sure-report">
                                            <h3>Êtes vous sûr de vouloir signaler ce commentaire ?</h3>
                                            <a href="index.php?action=report&id=<?= $data_comment['chapter_id'] ?>&commentId=<?= $data_comment['id']?>">
                                                <button id="yes-report">Oui</button>
                                            </a>
                                            <button id="no-report">Non</button>
                                        </div>
                                    </div>
                        <hr>
                    <?php endforeach ?>
            </div>
            <div class="add-comments">
                <h2>Ajouter un commentaire</h2>
                <form action="index.php?action=addComment&id= <?= $chapter_single['id'] ?>" method="post">
                    <div class="label-author">
                        <label for="author">Prénom : </label>
                        <input type="text" name="author" id="author" require>
                    </div>
                    <div>
                        <label for="comment">Commentaire : </label>
                        <textarea name="comment" id="comment" cols="100" rows="10"require></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
            </div>           
    </section>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
