<?php $title = 'Chapitres - Le blog de Jean Forteroche'; ?>
<?php ob_start(); ?>

    <section id="chapters">
        <div class="container-list-chapter">
            <div class="btn">

            <?php
            while ($data = $chapters->fetch()) {
                ?>
                <div class="btn-chapter">
                    <a href="index.php?action=allChapters&id=<?= $data['id'] ?>">
                        <button class="btn-chapters active" id="button"><?= htmlspecialchars($data['title']) ?></button>
                    </a>  
                </div>
            </div>
                
                <?php
                if ($_GET['id'] == $data['id']) {
                ?>
                <div class="chapter">
                    <h3>
                        <?= htmlspecialchars($data['title']) ?>
                    </h3>
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
            </div>
            <div class="comments">
                <h3>Commentaires</h3>
                <form action="index.php?action=addComment&id= <?= $chapter['id'] ?> " method="post">
                    <div>
                        <label for="author">Auteur</label>
                        <input type="text" name="author" id="author">
                    </div>
                    <div>
                        <label for="comment">Commentaire</label>
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
                
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
                    ?>
            </div>
        
    </section>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
