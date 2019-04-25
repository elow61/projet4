<?php
$title = "Espace Membre"; 

// Vérifie si l'administrateur est déjà en ligne. Si c'est le cas il est redirigé vers l'espace admin
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    header('Location: index.php?action=admin');
}

?>

<?php ob_start(); ?>
<div class="bg-head">
    <p class="mess-head">Espace réservé aux administrateurs.</p>
</div>
        <?php 
            if (isset($_GET['co']) && $_GET['co'] === 'no-admin') {
                echo '<p class="msg_confirm"> Mauvais identifiant ou mot de passe.</p>';
            }

            if (isset($_GET['co']) && $_GET['co'] === 'deco') {
                echo '<p class="msg_confirm">Vous êtes déconnecté.</p>';
            }
        ?>
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