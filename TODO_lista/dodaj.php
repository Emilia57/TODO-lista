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
                        echo "<tr><th>".$x[0]."</th><th>".$x[1]."</th><th>".$x[2]."</th><th>".$x[3]."</th><th>".$x[4]."</th></tr>";
                    }
                ?>
            </tbody>
        </table>
    </aside>
    <main>
        <form action="dodaj2.php" method="post">
            <label for="typ"><h3>Typ zadania:</h3></label>
            <select id="typ" name="typ">
                <option value="praca">praca</option>
                <option value="szkola">szkoła</option>
                <option value="inne">inne</optoin>
            </select>
            <label for="kiedy_zadane"><h4>Kiedy zostało zadane:</h4></label>
            <input type="date" id="kiedy_zadane" name="kiedy_zadane" required>
            <label for="do_kiedy"><h3>Do kiedy jest zadanie:</h3></label>
            <input type="date" id="do_kiedy" name="do_kiedy" required>
            <h3>Jaki jest priorytet zadania:</h3>
            <label for="malo_wazne">mało ważne</label>
            <input type="radio" id="malo_wazne" name="priorytet" value="mało ważne" checked>
            <label for="wazne">ważne</label>
            <input type="radio" id="wazne" name="priorytet" value="ważne">
            <label for="bardzo_wazne">bardzo ważne</label>
            <input type="radio" id="bardzo_wazne" name="priorytet" value="bardzo ważne">
            <label for="opis"><h3>Opis zadania:</h3></label>
            <textarea id="opis" name="opis"></textarea><br>
            <button type="submit">Dodaj zadanie</button>
        </form>
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