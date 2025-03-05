<?php
    $conn = mysqli_connect("localhost", "root", "", "lista_zadan");

    $typ = $_POST["typ"];
    $kiedy_zadane = $_POST["kiedy_zadane"];
    $do_kiedy = $_POST["do_kiedy"];
    $priorytet = $_POST["priorytet"];
    $opis = $_POST["opis"];

    $dodaj = "INSERT INTO zadania (typ_zadania, kiedy_zadane, do_kiedy, priorytet, opis_zadania)
     VALUES ('$typ', '$kiedy_zadane', '$do_kiedy', '$priorytet', '$opis');";
    mysqli_query($conn, $dodaj);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista zadań</title>
    <link rel="stylesheet" href="style.css">
    <style>
        main {
            width: 70%;
        }
        aside {
            width: 30%;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="index.php">Lista zadań</a></h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Numer zadania</th>
                    <th>Typ zadania</th>
                    <th>Kiedy było zadane?</th>
                    <th>Do kiedy jest zadane?</th>
                    <th>Priorytet zadania</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $zap = "SELECT * FROM zadania;";
                    $wynik = mysqli_query($conn, $zap);
                    while ($x = mysqli_fetch_array($wynik)) {
                        echo "<tr><th>".$x[0]."</th><th>".$x[1]."</th><th>".$x[2]."</th><th>".$x[3]."</th><th>".$x[4]."</th></tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
    <aside>
        <a href="dodaj.php">Dodaj zadanie</a><br>
        <hr>
        <a href="edytuj.php">Edytuj zadanie</a><br>
        <hr>
        <a href="usun.php">Usuń zadanie</a>
    </aside>
</body>
</html>
<?php
    mysqli_close($conn);
?>