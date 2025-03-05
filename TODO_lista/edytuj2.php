<?php
    $conn = mysqli_connect("localhost", "root", "", "lista_zadan");

    $id_edytuj = $_POST["edytuj"];
    $zap = "SELECT * FROM zadania JOIN komentarze ON zadania.zadanie_id = komentarze.zadanie_id WHERE zadania.zadanie_id = '$id_edytuj';";
    $wynik = mysqli_query($conn, $zap);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Lista zadań</title>
    <link rel="stylesheet" href="style.css">
    <style>
        main {
            flex-direction: column;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="index.php">Lista zadań</a></h1>
    </header>
    <aside>
        <form action="edytuj3.php" method="post">
            <label for="edytuj"><h3>Które zadanie edytować:</h3></label>
            <input type="number" id="edytuj" name="edytuj" required>
            <label for="typ"><h3>Typ zadania:</h3></label>
            <select id="typ" name="typ">
                <option value="">nie zmieniaj</option>
                <option value="praca">praca</option>
                <option value="szkoła">szkoła</option>
                <option value="inne">inne</option>
            </select>
            <label for="kiedy_zadane"><h3>Kiedy zostało zadane:</h3></label>
            <input type="date" id="kiedy_zadane" name="kiedy_zadane">
            <label for="do_kiedy"><h3>Do kiedy jest zadanie:</h3></label>
            <input type="date" id="do_kiedy" name="do_kiedy">
            <h3>Jaki jest priorytet zadania:</h3>
            <label for="malo_wazne">mało ważne</label>
            <input type="radio" id="malo_wazne" name="priorytet" value="mało ważne">
            <label for="wazne">ważne</label>
            <input type="radio" id="wazne" name="priorytet" value="ważne">
            <label for="bardzo_wazne">bardzo ważne</label>
            <input type="radio" id="bardzo_wazne" name="priorytet" value="bardzo ważne">
            <label for="opis"><h3>Opis zadania:</h3></label>
            <textarea id="opis" name="opis"></textarea>
            <label for="komentarz"><h3>Dodaj komentarz:</h3></label>
            <textarea id="komentarz" name="komentarz"></textarea><br>
            <button type="submit">Edytuj</button>
        </form>
    </aside>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Numer zadania</th>
                    <th>Typ zadania</th>
                    <th>Kiedy było zadane?</th>
                    <th>Do kiedy jest zadane?</th>
                    <th>Priorytet zadania</th>
                    <th>Opis zadania</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id_edytuj = $_POST["edytuj"];
                    $zap = "SELECT * FROM zadania WHERE zadanie_id = '$id_edytuj';";
                    $wynik = mysqli_query($conn, $zap);

                    while ($x = mysqli_fetch_array($wynik)) {
                        echo "<tr><th>".$x[0]."</th><th>".$x[1]."</th><th>".$x[2]."</th><th>".$x[3]."</th><th>".$x[4]."</th></tr>";
                    }
                ?>
            </tbody>
        </table>
        <h2>Komentarze do zadania:</h2>
        <ul>
            <?php
                $zap2 = "SELECT komentarz FROM komentarze WHERE zadanie_id = '$id_edytuj';";
                $wynik2 = mysqli_query($conn, $zap2);

                while ($x = mysqli_fetch_array($wynik2)) {
                    echo "<li>".$x[0]."</li>";
                }
            ?>
        </ul>
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