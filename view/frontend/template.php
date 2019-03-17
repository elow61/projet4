<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Kalam:300,400,700|Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                <li><a href="/index.php"><i class="fas fa-igloo"></i> Accueil</li></a>
                <li><a href="index.php?action=allChapters&id=1"><i class="fas fa-book"></i> Chapitres</li></a>
                <li><a href="index.php?action=contact"><i class="fas fa-mobile"></i> Contact</li></a>
                <li><a href="index.php?action=connected"><i class="fas fa-sign-in-alt"></i> Connexion</li></a>
            </ul>
        </nav>
    </header>
    <?= $section ?>
    <footer>
        <p>Copyright © Elodie Meunier - 2019. Tous droits réservés</p>
    </footer>

    <script src="/public/js/menu.js"></script>
</body>
</html>