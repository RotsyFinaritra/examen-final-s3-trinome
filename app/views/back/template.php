<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Acceuil</title>

    <link href="<?= $_SESSION['base_url'] ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $_SESSION['base_url'] ?>/css/ajoutAnimal.css" rel="stylesheet">

    <script src="<?= $_SESSION['base_url'] ?>/assets/js/jquery.min.js"></script>
    <script src="<?= $_SESSION['base_url'] ?>/assets/js/bootstrap.min.js"></script>

</head>

<body>
    <header class="col-md-3">
        <div class="profil">
            <img src="image/profil.jpg" alt="">
            <div>
                <h1>Fanilo ANDRIAMARISON</h1>
                <p>admin@gmail.com</p>
            </div>
        </div>
        <nav>
            <div>
                <button id="but1" class="showListButton actif"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>List</button>
                <div id="list1" class="listContainer">
                    <ul>
                        <li><a href="">Des Habitats</a></li>
                        <li><a href="">Des Agents</a></li>
                        <li><a href="">Des Users</a></li>
                    </ul>
                </div>
            </div>

            <div>
                <button id="but2" class="showListButton actif"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>Formulaire</button>
                <div id="list2" class="listContainer">
                    <ul>
                        <li><a href="<?= $_SESSION['base_url'] ?>/admin/animals/insertion" class="actif">Ajout Animal</a></li>
                        <li><a href="<?= $_SESSION['base_url'] ?>/admin/aliments/insertion">Ajout Aliment</a></li>
                        <li><a href="">Ajout User</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="col-md-9">
        <div class="back">
            <img src="<?= $_SESSION['base_url'] ?>/image/background.gif" alt="">
        </div>
        <?php include($view) ?>
    </section>
</body>


</html>