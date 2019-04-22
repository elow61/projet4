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
    <section id="bio">
        <div class="head-bio">
            <img src="<?= IMAGE ?>jean.png" alt="Jean Forteroche">
            <div class="connect"></div>
            <h2>Jean Forteroche</h2>
        </div>
        <div class="text-bio">
            <p>Né le 17 mai 1972 à Paris, Jean Forteroche découvra rapidement la poésie puisque sa mère, très cultivée et parlant plusieurs langues, est passionnée de théâtre. 
                Jean Forteroche se prend de passion rapidement pour la littérature, consacrant tout son temps libre à dévorer des livres à la bibliothèque 
                de son école. Grâce à un concours de nouvelles proposé par son professeur de français, il découvre le bonheur de l'écriture.
                À compter de ce jour, il ne cessera plus de noircir les pages de carnets.
            </p>
            <br>
            <p>       
                À 22 ans, il souhaite enrichir son imagination et décide donc de quitter la France pour s'exiler quelques temps aux États-Unis.
                Ce long voyage, ses rencontres, développeront chez lui des projets de roman. En 2003, il écrira son premier roman : "Le champ du feu", mais c'est le suivant, 
                "Un jour viendra..." qui consacre sa rencontre avec le public. Aujour'hui, Jean revient avec un nouveau roman "Billet simple pour l'Alaska" 
                inspiré par ses vacances passées en Alaska. Jean décide cette fois de mettre en avant première, son livre sur le web. Mais pas de panique, une édition 
                est prévue d'ici la fin de l'année 2019 pour ceux et celles qui désirent tourner les pages d'un livre. 
            </p>
        </div>
    </section>
    <section id="chapitres">
        <h2>Les derniers chapitres</h2>
        <div class="container-chapter">
        <?php foreach ($chapters as $data) {
            ?>
            <div class="chapter-resume">
                <h3>
                    <?= htmlspecialchars_decode($data['title']) ?>
                    <span>Écrit par Jean Forteroche.</span>
                </h3>
                <br>
                <br>
                <p>
                    <?= nl2br(htmlspecialchars_decode($this->helper->extract($data['chapter']))) ?>
                </p>
                <br>
                <br>
                <form action="index.php?action=allChapters&id=<?= $data['id'] ?>" method="post">
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