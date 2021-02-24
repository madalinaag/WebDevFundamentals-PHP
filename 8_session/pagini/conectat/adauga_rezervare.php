<form method="post">
    <table>
        <tr>
            <td><label for="data">Data</label></td>
            <td><input type="date" id="data" name="data"/></td>
        </tr
        <tr>
            <td><label for="sala">Locuri</label></td>
            <td><input type="number" id="locuri" name="locuri" min="1" max="15"/></td>
        </tr

        <tr>
            <td><input type="submit" name="add" value="Rezerva"/></td>
        </tr>
    </table>

</form>
<?php
define('LOCURI_TOTAL', 15);

if (isset($_POST['add'])) {
    $data = $_POST['data'];
    $locuri = $_POST['locuri'];
    $user = preiaUtilizatorDupaEmail($_SESSION['email']);

    $locuriOcupate = preiaNrRezervari($data);
    $locuriDisponibile = LOCURI_TOTAL - $locuriOcupate['locuri'];

    if ($locuri > $locuriDisponibile) {
        print "Mai sunt doar $locuriDisponibile locuri disponibile pentru data selectata";
        return; //opreste executia
    }

    $rezerva = adaugaRezervare($data, $locuri, $user['id']);

    if ($rezerva) {
        header("location: index.php");
    } else {
        print 'Eroare la adaugarea rezervarii';
    }
}
