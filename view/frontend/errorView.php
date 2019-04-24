<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erreur</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body class="body-error">
    <section class="container_error">
        <h2>Une erreur est survenue : </h2>
        <div class="text-mess">
            <p><?=  $errorMess; ?></p>
            <a href="index.php">Retourner sur la page d'accueil <i class="fas fa-sign-in-alt"></i></a>
        </div>
    </section>
    
</body>
</html>