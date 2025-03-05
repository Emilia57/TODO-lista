<?php
    $conn = mysqli_connect("localhost", "root", "", "lista_zadan");

    $id_edytuj = $_POST["numer"];
    if (!empty($_POST["typ"])) {
        $typ = $_POST["typ"];
        $edytuj1 = "UPDATE zadania SET typ_zadania = '$typ' WHERE zadanie_id = '$id_edytuj';";
        mysqli_query($conn, $edytuj1);
    }
    if (!empty($_POST["kiedy_zadane"])) {
        $kiedy_zadane = $_POST["kiedy_zadane"];
        $edytuj2 = "UPDATE zadania SET kiedy_zadane = '$kiedy_zadane' WHERE zadanie_id = '$id_edytuj';";
        mysqli_query($conn, $edytuj2);
    }
    if (!empty($_POST["do_kiedy"])) {
        $do_kiedy = $_POST["do_kiedy"];
        $edytuj3 = "UPDATE zadania SET do_kiedy = '$do_kiedy' WHERE zadanie_id = '$id_edytuj';";
        mysqli_query($conn, $edytuj3);
    }
    if (!empty($_POST["priorytet"])) {
        $priorytet = $_POST["priorytet"];
        $edytuj4 = "UPDATE zadania SET priorytet = '$priorytet' WHERE zadanie_id = '$id_edytuj';";
        mysqli_query($conn, $edytuj4);
    }
    if (!empty($_POST["opis"])) {
        $opis = $_POST["opis"];
        $edytuj5 = "UPDATE zadania SET opis_zadania = '$opis' WHERE zadanie_id = '$id_edytuj';";
        mysqli_query($conn, $edytuj5);
    }
    if (!empty($_POST["komentarz"])) {
        $komentarz = $_POST["komentarz"];
        $edytuj6 = "INSERT INTO komentarze (komentarz, zadanie_id)
         VALUES ('$komentarz', '$id_edytuj');";
        mysqli_query($conn, $edytuj6);

    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista zadań</title>
    <link rel="stylesheet" href="style.css">
    <style>
        main {
            width: 69%;
        }
        aside {
            width: 29%;
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
                        echo "<tr><td>".$x[0]."</td><td>".$x[1]."</td><td>".$x[2]."</td><td>".$x[3]."</td><td>".$x[4]."</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
    <aside>
        <a href="dodaj.php">Dodaj zadanie</a><br>
        <a href="edytuj.php">Edytuj zadanie</a><br>
        <a href="usun.php">Usuń zadanie</a>
    </aside>
</body>
</html>
<?php
    mysqli_close($conn);
?>