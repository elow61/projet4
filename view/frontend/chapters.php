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
            <div class="add-comments">
                <h2>Ajouter un commentaire</h2>
                <form action="index.php?action=addComment&id= <?= $chapter_single['id'] ?>" method="post">
                    <div class="label-author">
                        <label for="author">Prénom : </label>
                        <input type="text" name="author" id="author">
                    </div>
                    <div>
                        <label for="comment">Commentaire : </label>
                        <textarea name="comment" id="comment" cols="100" rows="10"></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
            </div>
            <div class="comments">
                <h2>Commentaires</h2>
                    <?php
                    foreach ($comments as $data_comment) {
                    ?>
                        <p class="author-comm"> <strong><?= htmlspecialchars($data_comment['author'])?></strong>
                        le (<?= $data_comment['date_create'] ?>) </p>
                        <br />
                        <p class="text-comment"> <?= nl2br(htmlspecialchars($data_comment['comment'])) ?> </p>
                        <br />
                        <button type="submit">Signaler</button>
                        <hr />
                    <?php
                    }
                    ?>
            </div>              
    </section>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
