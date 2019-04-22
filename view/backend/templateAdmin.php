<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= CSS ?>admin/style.css">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= IMAGE ?>favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= IMAGE ?>favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= IMAGE ?>favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= IMAGE ?>favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= IMAGE ?>favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= IMAGE ?>favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= IMAGE ?>favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= IMAGE ?>favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= IMAGE ?>favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= IMAGE ?>favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= IMAGE ?>favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= IMAGE ?>favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= IMAGE ?>favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= IMAGE ?>favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#2E3841">
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
                    <a href="index.php?action=sessionFinish" class="nav-link"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
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

    <footer>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2019 Elodie Meunier. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="<?= JS ?>admin/script.js"></script>
    </body>
</html>
