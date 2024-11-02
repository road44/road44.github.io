<?php
  include('connection.php');
?>

<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <?php
            echo '<h1 class="fw-bolder">Witaj ' . $_SESSION["user"] . ' na twoim koncie!</h1>';
            echo '<p class="lead">Jest to pulpit nawigacyjny twojego konta.</p>';
        ?>
        
    </div>
</header>

<section id="about">
    <div class="container px-4">
        <div class="row gx-4 justify-content-center">
            <div class="col-lg-8">
                <h2>Jakaś losowa zawartość twojego konta</h2>
                <span class="lead">Chcesz się wylogować?</span><br>
                <form method="post">
                    <input type="submit" name="logout" value="Wyloguj czyszcząc sesję" class="btn btn-outline-secondary">
                    <input type="submit" name="delcookies" value="Wyloguj czyszcząc sesję i ciasteczka" class="btn btn-outline-secondary">
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        if(isset($_POST['logout'])){
                            unset($_SESSION["user"]);
                            header('Location:'.'index.php?page=main.php');
                        }
                        if(isset($_POST['delcookies'])){
                            $name = $_SESSION["user"];
                            setcookie("login_cookie", "$name", time() - 86400);
                            unset($_SESSION["user"]);
                            header('Location:'.'index.php?page=main.php');
                        }
                    }
                ?>
                <br><br><br><br><br><br>
            </div>
        </div>
    </div>
</section>