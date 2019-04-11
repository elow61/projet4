<?php
$title = "Espace Membre"; ?>
<?php ob_start(); ?>
<?php

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>
<section>
    <div class="message-connexion">
        <p>Espace réservé aux administrateurs.</p>
    </div>
</section>

<section id="form-connect">
    <div class="container-form-connect">
        <h2>Se connecter</h2>
            <form action="index.php?action=auth" method="post">
                <p> 
                    <label for="pseudo">Pseudo : </label>
                    <input type="text" name="pseudo" placeholder="Nom d'utilisateur">
                </p>
                <p>
                    <label for="mdp">Mot de passe : </label>
                    <input type="password" name="mdp" placeholder="Votre mot de passe">
                </p>
                <button type="submit">Se connecter</button>
            </form>
    </div>
</section>
<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>