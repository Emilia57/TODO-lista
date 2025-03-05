<?php
    $conn = mysqli_connect("localhost", "root", "", "lista_zadan");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista zadań</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><a href="index.php">Lista zadań</a></h1>
    </header>
    <aside>
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
    </aside>
    <main>
        <form action="usun2.php" method="post">
            <label for="usun"><h2>Które zadanie usunąć:<h2></label><br>
            <input type="number" id="usun" name="usun" required><br>
            <button type="submit">Usuń zadanie</button>
        </form>
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