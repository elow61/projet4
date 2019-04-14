<?php $title = 'Chapitres - Le blog de Jean Forteroche';

if (isset($_GET['report']) && $_GET['report'] == 'success') {
    echo 'Le commentaire est bien signalé et sera traité dans les meilleurs délais. Merci.';
}
?>
<?php ob_start(); ?>
    <div class="bg-head">
        <p class="mess-head">Liste des chapitres.</p>
    </div>

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
    <div id="container-page">
        <section class=chapter>
            <div>
                <h2>
                    <?= htmlspecialchars_decode($chapter_single['title']) ?>
                </h2>
                <br />
                <p>
                    <?= nl2br(htmlspecialchars_decode($chapter_single['chapter'])) ?>
                </p>
                <br />
            </div>
        </section>  
        <section class="comments">
            <div>
                <h2>Commentaires</h2>
                <?php
                foreach ($comments as $data_comment): ?>
                <div class="container-comm">
                    <div class="name">
                        <p>De <?= htmlspecialchars($data_comment['author']) ?></p>
                    </div>
                    <div class="comment">
                        <p class="date">(le <?= $data_comment['date_create'] ?>) </p>
                        <br />
                        <p class="text-comment"> <?= nl2br(htmlspecialchars($data_comment['comment'])) ?> </p>
                        <br>
                    </div>
                        
                    <?php if ($data_comment['report'] === true): ?>
                    <!-- Message de signalement -->                      
                    <p class="mess-report">Le commentaire a été signalé. Il sera traité par l'administration dans les meilleurs délais. Merci.</p>
                    <?php else :?>
                    <!-- Bouton pour signaler -->
                    <a href="index.php?action=report&id=<?= $data_comment['chapter_id'] ?>&commentId=<?= $data_comment['id']?>" onclick="confirm('Êtes vous sûr de vouloir signaler ce commentaire ?');">
                        <button class="report-btn">Signaler</button>
                    </a>
                </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
        <section class="add-comments">
            <div class="box-add-comment">
                <h2>Ajouter un commentaire</h2>
                <form action="index.php?action=addComment&id= <?= $chapter_single['id'] ?>" method="post">
                    <div class="label-author">
                        <input type="text" name="author" id="author" placeholder="VOTRE PSEUDO" require>
                    </div>
                    <div>
                        <textarea name="comment" id="comment" rows="10" placeholder="VOTRE COMMENTAIRE" require></textarea>
                    </div>
                    <button type="submit">Envoyer</button>
                </form>
            </div> 
        </section>
    </div>

<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>
