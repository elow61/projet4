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
    <link rel="stylesheet" href="/public/css/admin/style.css">
    <title>Coucou</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Tiny MCE -->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar fixed-top bg-light flex-md-nowrap p-0 shadow">
            <a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0">Admin</a>
            <input type="text" class="form-control form-control-light w-100" placeholder="Search" aria-label="Search">
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
            <nav class="col-md-2 sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Tableau de bord</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Chapitres</a>
                            <ul>
                                <li><a href="#">Ajouter</a></li>
                                <li><a href="#">Modifier</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Commentaires</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- Container -->
    <main class="col-md-9 ml-sm-auto col-lg-10 px-4" role="main">
        <!-- Dashbord -->
        <div class="tableau">
            <h2>Tableau de bord</h2>
            <hr />
            <h3>Nombre de chapitres = </h3>
            <p>"PHP dira le nombre"</p>
            <h3>Nombre de commentaires = </h3>
            <p>"PHP dira le nombre</p>
        </div>
        <!-- Chapters -->
        <div class="chapitre">
            <h2>Chapitres</h2>
            <hr />
            <!-- Nav tabs-->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#ajout">Ajouter</a>    
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#modif">Modifier</a>     
                </li>
            </ul>
            <!-- Tab panes -->
            <br>
            <div class="tab-content">
                <div class="tab-pane container active" id="ajout">
                        <form action="">
                        <p>
                            <textarea name="" id="" cols="30" rows="10"></textarea>
                        </p>
                        <button class="btn btn-primary" type="submit"> Ajouter </button>
                    </form>
                    
                </div>
                <div class="tab-pane container fade" id="modif">
                    <p>Liste des chapitres</p>
                </div>
            </div>
        </div>
        <!-- Comments -->
        <div class="commentaires">
            <h2>Commentaires</h2>
            <hr />
            <ul>
                Liste des commentaires
            </ul>
        </div>
    </main>

</body>
</html>