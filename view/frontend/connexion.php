<?php $title = "Espace Membre"; ?>
<?php ob_start(); ?>

<section id="form-connect">
    <h2>Se connecter</h2>
    <form action="index.php?action=accessAdmin" method="post">
        <p>
            <label for="pseudo">Pseudo : </label>
            <input type="text" name="pseudo" id="pseudo">
        </p>
        <p>
            <label for="mdp">Mot de passe : </label>
            <input type="password" name="mdp" id="mdp">
        </p>
        <button type="submit">Se connecter</button>
    </form>
</section>
<?php $section = ob_get_clean(); ?>
<?php require('template.php'); ?>