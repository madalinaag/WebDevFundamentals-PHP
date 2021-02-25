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
                <td><input type="submit" name="add_curs" value="Adauga"/></td>
            </tr>
        </table>

    </form>

        <?php
            require_once 'functii/sql_functions.php';
            if (isset($_POST['add_curs'])) {
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


        print '<br>';
        print '<br>';
        ?>
    </body>


    <form method="post">
        <table>
            <tr>
                <td><label for="instr">Instructor</label></td>
                <td><input type="text" id="instr" name="instr"/></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" id="email" name="email"/></td>
            </tr
            <tr>
                <td><label for="spec">Specializare</label></td>
                <td><input type="text" id="spec" name="spec"/></td>
            </tr

            <tr>
                <td><input type="submit" name="add_instr" value="Adauga"/></td>
            </tr>
        </table>

    </form>
    <?php
    if (isset($_POST['add_instr'])) {
        $nume = $_POST['instr'];
        $email = $_POST['email'];
        $spec = $_POST['spec'];

        $rezultatAdaugareInstructor = adaugaInstructor($nume, $email, $spec);

        if ($rezultatAdaugareInstructor) {
            print 'Instructor adaugat cu succes';
        } else {
            print 'Eroare la adaugarea instructorului';
        }
    }

    print '<br>';
    print '<br>';

    $instructori = preiaInstructori();
    foreach ($instructori as $instr) {
        print $instr['nume'] . " [email: " . $instr['email']. "] - specializare " . $instr['specializare'] . '<br>';
    }
    ?>
</html>
