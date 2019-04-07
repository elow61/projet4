<?php
$title = "Modification du "; 
?>
<?php ob_start(); ?>

<main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
    <section class="modif">
        <h2>Modification</h2>
        <hr>
        <form action="index.php?action=changeChapter&id=<?= $chapterId ?>" method="post">
            <h3>Titre</h3>
            <div class="form-group">
                <input type="text" name="editTitle" value="<?= htmlspecialchars($chapter_single['title']); ?>">
            </div>
            <h3>Chapitre</h3>
            <div class="form-group">
                <textarea name="editChapter" cols="30" rows="10">
                    <?= nl2br(htmlspecialchars($chapter_single['chapter']))?>
                </textarea>
            </div>
            <button class="btn btn-success" type="submit">Modifier</button>
        </form>
        
    </section>
</main>


<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>