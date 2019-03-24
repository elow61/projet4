<?php $title = 'Chapitres - Le blog de Jean Forteroche';

?>
<?php ob_start(); ?>

    <section id="chapters">
        <div class="btn-chap">
            <?php if (is_array($chapters)): ?>
                <?php foreach ($chapters as $chapter): ?>
                    <a href="index.php?action=allChapters&id=<?= $chapter['id'] ?>">
                        <button id="button"><?= htmlspecialchars($chapter['title']) ?></button>
                    </a>  
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="chap-comment">
            <div class="chapter">
                <h2>
                    <?= htmlspecialchars($chapter_single['title']) ?>
                </h2>
                <br />
                <p>
                    <?= nl2br(htmlspecialchars($chapter_single['chapter'])) ?>
                </p>
                <br />
            </div>
            <div class="comments">
                    <h2>Ajouter un commentaire</h2>
                    <form action="index.php?action=addComment&id= <?= $chapter_single['id'] ?>" method="post">
                        <div class="label-author">
                            <label for="author">Auteur : </label>
                            <input type="text" name="author" id="author">
                        </div>
                        <div>
                            <label for="comment">Commentaire : </label>
                            <textarea name="comment" id="comment" cols="100" rows="10"></textarea>
                        </div>
                        <button type="submit">Envoyer</button>
                    </form>
                    <hr>
                    <h2>Commentaires</h2>
                    <?php
                        while ($data_comment = $comments->fetch()) {
                        ?>
                        <div>
                            <p><strong> <?= htmlspecialchars($data_comment['author']) ?> </strong>
                            le <?= $data_comment['date_create'] ?> </p>
                        </div>
                        <div>
                            <p> <?= nl2br(htmlspecialchars($data_comment['comment'])) ?> </p>
                            <br />
                        </div>
                        <?php
                        }
                        $comments->closeCursor();
                        ?>
                </div>

        </div>
        
    </section>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
