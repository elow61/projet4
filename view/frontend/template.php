<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kalam:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
</head>

<body>
    <header>
        <h1>Jean Forteroche</h1>
        <div id="btn-nav">
            <div class="barre"></div>
            <div class="barre"></div>
            <div class="barre"></div>
        </div>
        <nav id="menu">
            <ul>
                <li><a href="index.php"><i class="fas fa-igloo"></i> Accueil</a></li>
                <li><a href="index.php?action=allChapters&id=1"><i class="fas fa-book"></i> Chapitres</a></li>
                <li><a href="index.php?action=connected"><i class="fas fa-sign-in-alt"></i> Connexion</a></li>
            </ul>
        </nav>
    </header>
        <?= $section ?>
    <footer>
        <p>Copyright © Elodie Meunier - 2019. Tous droits réservés</p>
    </footer>

    <script src="<?= JS ?>script.js"></script>
</body>
</html>