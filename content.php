<?php
    include('connection.php');
?>

<header class="bg-primary bg-gradient text-white">
    <div class="container px-4 text-center">
        <h1 class="fw-bolder">Zawartość</h1>
        <p class="lead">Rekordy zawarte w bazie danych.</p>
    </div>
</header>



<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <section id="about">
        <div class="container px-4">
            <div class="row gx-4 justify-content-center">
                <div class="col-lg-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imię</th>
                                <th>Nazwisko</th>
                                <th>Telefon</th>
                                <th>e-mail</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM users";

                            if($result = $mysqli -> query($sql)){
                                echo "Znalezionych rekordów: " . $result -> num_rows . "<br>";

                                if($result -> num_rows > 0){
                                    while($row = $result -> fetch_assoc()){
                                        echo "<tr>";
                                        foreach ($row as $field => $value) {
                                            if($field == 'tel'){
                                                if($value == ''){
                                                    echo "<td>-</td>";
                                                } else {
                                                    echo "<td>" . htmlspecialchars($value) . "</td>"; 
                                                }
                                            } else {
                                                echo "<td>" . htmlspecialchars($value) . "</td>"; 
                                            }
                                        }
                                        echo "<td>" . "<form method='POST' action=''>" . "<input type='hidden' name='number' value='" . $row['id_uzyt'] . "'>" . "<input type='submit' name='delete' value='Usuń' class='btn btn-outline-secondary'>" . "</form>" . "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }

                            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                                if(isset($_POST['delete'])){
                                    $number = $_POST["number"];
                                    
                                    $is_log_in = false;
                                    $user_id = (int) $number;

                                    if ($stmt = $mysqli->prepare("SELECT imie FROM users WHERE id_uzyt = ?")) {
                                        $stmt->bind_param("i", $user_id);
                                        $stmt->execute();
                                        $stmt->store_result();
                                        if ($stmt->num_rows > 0) {
                                            $stmt->bind_result($username);
                                            $stmt->fetch();
                                            if ($username == $_SESSION["user"]) {
                                                $is_log_in = true;
                                            }
                                        }
                                        $stmt->close();
                                    }

                                    $sql = "DELETE FROM `users` WHERE `users`.`id_uzyt` = $number;";
                                    if($result2 = $mysqli -> query($sql)){
                                        if($is_log_in){
                                            $firstname = $_SESSION["user"];
                                            setcookie("login_cookie", "$firstname", time() - 86400);
                                            unset($_SESSION["user"]);
                                            session_destroy();
                                            header('Location:'.'index.php?page=main.php');
                                        }else{
                                            header("Refresh:0");
                                        }
                                    }
                                }
                            }

                            $mysqli -> close();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
</html>