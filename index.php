<?php
    //include('connection.php');
    session_start();
    $page = $_GET["page"] ?? $page = "main.php";
    //$mysqli -> close();
?>
<!DOCTYPE html>
<html lang="pol">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Delta" />
        <meta name="author" content="Filip Hołdyk" />
        <title>Strona Hołdy</title>

        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet"/>
        <link href="css/customstyles.css" rel="stylesheet"/>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=VT323&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playwrite+ES+Deco:wght@100..400&display=swap" rel="stylesheet">
    </head>
    <body id="page-top">
        <!-- Nawigacja-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="index.php?page=main.php">Strona Hołdy 👌</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <!-- Ładowanie zakładek skryptem -->
                        <?php
                            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=main.php">Główna</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=muzyka.php">Ulubiona Muzyka</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="old/index.html">Stara_Strona</a></li>';
                            // echo '<li class="nav-item"><a class="nav-link" href="index.php?page=news.php">Aktualności</a></li>';
                            
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Zawartość strony głównej -->
        <?php
            include($page);
        ?>
        <!-- Stopka -->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">Copyright &copy; Filip Hołdyk 2024</p></div>
        </footer>

        <!-- Skrypty JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
