<?php $title = 'Accueil - Le blog de Jean Forteroche'; ?>
<?php ob_start(); ?>

    <section id="slideshow">
        <div class="container-slider">
            <div id="slider">
                <div class="img-slide"><img src="<?= IMAGE ?>slider/alaska7.jpg" alt="image slider (1)"></div>
                <div class="img-slide"><img src="<?= IMAGE ?>slider/alaska16.jpg" alt="image slider (2)"></div>
                <div class="img-slide"><img src="<?= IMAGE ?>slider/alaska18.jpg" alt="image slider (3)"></div>
            </div>
        </div>
        <div class="title">
            <h2 class="title-book">Billet simple pour l'Alaska</h2>
            <p>Découvrez l'Alaska sous une autre aurore.</p>
            <a href="#chapitres"><button>Partez à l'aventure</button></a> 
        </div>
    </section>
    <section id="chapitres">
    <h2>Les derniers chapitres</h2>
    <div class="container-chapter">
    <?php
    // echo '<pre>';
    // print_r($chapters);
    // echo '</pre>';
    // On affiche les 3 derniers chapitres
    foreach ($chapters as $data) {
        ?>
        <div class="chapter-resume">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
            </h3>
            <br />
            <p>
                <?= nl2br(htmlspecialchars($this->helper->extract($data['chapter']))) ?>
            </p>
            <br />
            <form action="index.php?action=allChapters&id= <?= $data['id'] ?>" method="POST">
                <button type="submit">Lire la suite</button>
            </form>
        </div>
    <?php
    }
    ?>
    </div>
    </section>
<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>