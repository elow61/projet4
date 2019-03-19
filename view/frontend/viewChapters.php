<?php $title = 'Chapitres - Le blog de Jean Forteroche'; ?>
<?php ob_start(); ?>

    <section id="chapters">
                <?php
                while ($data = $chapters->fetch()) {
                ?>
                    <a href="index.php?action=allChapters&id=<?= $data['id'] ?>">
                        <button id="button"><?= htmlspecialchars($data['title']) ?></button>
                    </a>  
                    <?php
                    if ($_GET['id'] == $data['id']) {
                    ?>
                        <div class="chapter">
                            <h2>
                                <?= htmlspecialchars($data['title']) ?>
                            </h2>
                            <br />
                            <p>
                                <?= nl2br(htmlspecialchars($data['chapter'])) ?>
                            </p>
                            <br />
                        </div>
                    <?php
                    } 
                }
                $chapters->closeCursor();
                ?>
            <div class="comments">
                <h2>Commentaires</h2>
                <form action="index.php?action=addComment&id= <?= $chapter['id'] ?> " method="post">
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
                <?php
                    while ($data_comment = $comments->fetch()) {
                    ?>
                    <div>
                        <p><strong> <?= htmlspecialchars($data_comment['author']) ?> </strong>
                        le <?= $data_comment['date_create'] ?> </p>
                    </div>
                    <div>
                        <p> <?= nl2br(htmlspecialchars($data_comment['comment'])) ?> </p>
                    </div>
                    <?php
                    }
                    $comments->closeCursor();
                    ?>
            </div>
    </section>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
