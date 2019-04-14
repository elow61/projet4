<?php
$title = "Espace Membre"; ?>
<?php ob_start(); ?>
<div class="bg-head">
    <p class="mess-head">Espace réservé aux administrateurs.</p>
</div>

<section id="form-connect">
    <div class="container-form-connect">
        <h2>Se connecter</h2>
            <form action="index.php?action=auth" method="post">
                <p> 
                    <input type="text" name="pseudo" placeholder="Nom d'utilisateur">
                </p>
                <p>
                    <input type="password" name="mdp" placeholder="Mot de passe">
                </p>
                <button type="submit">Se connecter</button>
            </form>
    </div>
</section>
<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>