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
                    <th>Opis zadania</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id_edytuj = $_POST["edytuj"];
                    $zap = "SELECT * FROM zadania WHERE zadanie_id = '$id_edytuj';";
                    $wynik = mysqli_query($conn, $zap);

                    while ($x = mysqli_fetch_array($wynik)) {
                        echo "<tr><td>".$x[0]."</td><td>".$x[1]."</td><td>".$x[2]."</td><td>".$x[3]."</td><td>".$x[4]."</td><td>".$x[5]."</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <div><h2>Komentarze do zadania:</h2>
        <hr>
        <ul>
            <?php
                $zap2 = "SELECT komentarz FROM komentarze WHERE zadanie_id = '$id_edytuj';";
                $wynik2 = mysqli_query($conn, $zap2);

                while ($x = mysqli_fetch_array($wynik2)) {
                    echo "<li>".$x[0]."</li>";
                }
            ?>
        </ul></div>
    </aside>
    <main>
        <form action="edytuj3.php" method="post">
            <?php
                $id_edytuj = $_POST["edytuj"];
                echo "<input type=\"hidden\" id=\"numer\" name=\"numer\" value=\"".$id_edytuj."\">";
            ?>
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