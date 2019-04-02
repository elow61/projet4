<?php
// Gestion du message à l'arrivée de l'écrivain sur son espace
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= CSS ?>admin/style.css">
    <title> <?= $title ?> </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Tiny MCE -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=uhw72caza1vg9zugdw4nvlx88uspx6akn6ve7e55a1tsx2p9"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar fixed-top bg-light flex-md-nowrap p-9 shadow">
            <a href="index.php?action=admin" class="navbar-brand col-sm-3 col-md-2 mr-0">Administrateur</a>
            <input type="text" class="form-control form-control-light w-100" placeholder="Recherche" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a href="index.php?action=connected" class="nav-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Sidebar -->
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="index.php?action=admin" class="nav-link active">Tableau de bord</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=pageChapter" class="nav-link active">Chapitres</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?action=comment" class="nav-link active">Commentaires</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <body>
    <?= $main; ?>

    <script src="<?= JS ?>admin/script.js"></script>
    </body>
</html>
