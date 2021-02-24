<h1>Contact</h1>
<form method="post">
    <table>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" id="email" name="email"/></td>
        </tr>
        <tr>
            <td>Categorie</td>
            <td>
                Feedback <input type="radio" name="categorie" value="feedback"/><br>
                Intrebare <input type="radio" name="categorie" value="intrebare"/><br>
                Solicitare <input type="radio" name="categorie" value="solicitare"/><br>
            </td>
        </tr
        <tr>
            <td><label for="msj">Mesaj</label></td>
            <td><textarea id="msj" name="msj" rows="10" cols="40"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="send" value="Trimite"/></td>
        </tr>
    </table>

</form>
<?php
if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $mesaj = $_POST['msj'];

    $erori = [];

    if (isset($_POST['categorie'])) {
        $categorie = $_POST['categorie'];
    } else {
        $erori[] = 'Trebuie sa selectezi o categorie';
    }

    if (strlen(trim($mesaj)) < 10) {
        $erori[] = 'Mesajul trebuie sa aiba minim 10 caractere';
    }

    if (!empty($erori)) {
        print '<div style="color: red">';
        print 'Au aparut urmatoarele erori: <br>';
        print '<ul>';
        foreach ($erori as $eroare) {
            print '<li>' . $eroare . '</li>';
        }
        print '</ul>';
        print '</div>';
    } else {
        print "$email, am trimis mesajul tau din categoria $categorie, uite aici o copie: $mesaj";
    }
}