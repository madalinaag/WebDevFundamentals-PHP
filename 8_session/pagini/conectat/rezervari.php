<?php
$user = preiaUtilizatorDupaEmail($_SESSION['email']);
$rezervari = preiaRezervari($user['id']);

if (empty($rezervari)) {
    print 'Nicio rezervare';
    return;
}

?>
    <table>
        <tr>
            <td>Data</td>
            <td>Locuri</td>
            <td></td>
        </tr>

<?php
foreach ($rezervari as $rezervare) {
    print '<tr>';
    print '<td>' . $rezervare['data'] . '</td>';
    print '<td>' . $rezervare['locuri'] . '</td>';
    print '<td><a href="index.php?anuleaza=' .$rezervare['id'] . '">Anuleaza</a></td>';
    print '</tr>';
}
print '</table>';

if (isset($_GET['anuleaza'])) {
    $idRez = $_GET['anuleaza'];
    $anulare = anuleazaRezervare($idRez);
    
    if (!$anulare) {
        print 'A aparut o eroare';
    } else {
        header("location: index.php");
    }
}