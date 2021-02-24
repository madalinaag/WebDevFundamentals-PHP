<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
    <form method="post">
        <table>
            <tr>
                <td><label for="curs">Curs</label></td>
                <td><input type="text" id="curs" name="curs"/></td>
            </tr>
            <tr>
                <td><label for="data">Data</label></td>
                <td><input type="date" id="data" name="data"/></td>
            </tr
            <tr>
                <td><label for="sala">Sala</label></td>
                <td><input type="number" id="sala" name="sala" min="1" max="8"/></td>
            </tr

            <tr>
                <td><input type="submit" name="add" value="Adauga"/></td>
            </tr>
        </table>

    </form>
        <?php
            require_once 'functii/sql_functions.php';
            if (isset($_POST['add'])) {
                $curs = $_POST['curs'];
                $data = $_POST['data'];
                $sala = $_POST['sala'];

                $rezultatAdaugareCurs = adaugaCurs($curs, $data, $sala);

                if ($rezultatAdaugareCurs) {
                    print 'Curs adaugat cu succes';
                } else {
                    print 'Eroare la adaugarea cursului';
                }
            }

            print '<br>';
            print '<br>';

            $cursuri = preiaCursuri();
            foreach ($cursuri as $curs) {
                print $curs['denumire'] . " [data incepere" . $curs['data_incepere']. "] are loc in sala " . $curs['sala'] . '<br>';
            }
        ?>
    </body>
</html>
