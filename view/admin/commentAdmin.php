<?php 
$title = $_SESSION['pseudo'] . ", Espace commentaires"; 
ob_start(); 
?>



<?php $main = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>