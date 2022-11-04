<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="./images/logo.png">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inria Serif' rel='stylesheet'>
    <link rel="stylesheet" href="./css.css">
    <title>Accueil</title>
</head>

<body>
    <?php

    function loadClass($class)
    {
        if (str_contains($class, "Controller")) {
            require "./controller/$class.php";
        } else {
            require "./Entity/$class.php";
        }
    }
    spl_autoload_register("loadClass");

    $postController = new PostController();
    $userController = new UserController();

    $posts = $postController->readAll();

    ?>


    <div class="row">
        <?php require "./Vues/Header.php" ?>

    </div>



    <div class="row">

        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <br><br><br>

                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                            <li>
                                <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fa-solid fa-plus"></i> <span class="ms-1 d-none d-sm-inline style">Faire une publication</span> </a>
                            </li>
                            <br>
                            <li>
                                <a href="#" class="nav-link px-0 align-middle">
                                    <i class="fa-sharp fa-solid fa-clock"></i> <span class="ms-1 d-none d-sm-inline style">Nouveautés</span></a>
                            </li>
                            <br>
                            <li>
                                <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                    <i class="fa-solid fa-newspaper"></i> <span class="ms-1 d-none d-sm-inline style">Mes publications</span></a>

                            </li>
                            <br>
                            <li class="style">
                                <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fa-sharp fa-solid fa-users"></i><span class="ms-1 d-none d-sm-inline style">About us </span> </a>

                            </li>

                        </ul>
                        <hr>
                        <div class="dropdown pb-4">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">User connected' name</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col py-3 pt-5">

                    <div class="col-7 container d-flex flex-column">
                        <?php foreach ($posts as $post) : ?>
                            <div class="container pb-4">
                                <div class="card card-style">
                                    <div class="card-body d-flex justify-content-space-around">

                                        <img class="img-style img-fluid img-thumbnail" src="<?= $post->getImage() ?>" alt="Card image">

                                        <div class="ms-4 text-center div-post">
                                            <h5 class="card-title" style="font-family: lobster;"><?= $post->getTitle() ?>
                                            </h5>
                                            <br>
                                            <div style="font-family: Inria Serif;">
                                                <p class="card-text text-center "><?= $post->getContent() ?>
                                                </p>
                                                <p class="card-text "><?= $post->getPublished_at() ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>

</body>
















<?php require "./Vues/Footer.php"; ?>

</html>