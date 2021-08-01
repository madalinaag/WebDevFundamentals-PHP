<h1>Adauga Postare</h1>
<form method="post">
    <table>
        <tr>
            <td>Titlu</td>
            <td>
                <input type="text" name="titlu" required/>
            </td>
        </tr>
        
        <tr>
            <td>Continut</td>
            <td>
                <textarea name="continut" rows="10" cols="40"></textarea>
            </td>
        </tr>
        
        <tr>
            <th colspan="2">
                <input type="submit" name="add" value="Adauga"/>
            </th>
        </tr>
    </table>
</form>
<?php
if (isset($_POST['add'])) {
    $titlu = $_POST['titlu'];
    $continut = $_POST['continut'];
    if (trim($titlu) == null || trim($continut) == null) {
        print 'Titlul si continutul nu pot fi nule';
        return;
    }
    $data = date('Y-m-d');
    $user = preiaUtilizatorDupaEmail($_SESSION['email']);
    $rezultatAdaugare = adaugaPostare($titlu, $continut, $data, $user['id']);
    
    if ($rezultatAdaugare) {
        print 'Postare adaugata cu succes';
    } else {
        print 'Eroare la adaugarea postarii';
    }
}