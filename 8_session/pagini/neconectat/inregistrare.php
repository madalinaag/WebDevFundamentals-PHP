<h1>Inregistrare</h1>
<form method="post">
    <table>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email_utilizator" required/>
            </td>
        </tr>
        <tr>
            <td>Parola</td>
            <td>
                <input type="password" name="pass" required/>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="inregistrare" value="Inregistrare"/>
            </th>
        </tr>
    </table>
</form>
<?php 
if (isset($_POST['inregistrare'])) {
    $email = $_POST['email_utilizator'];
    $parola = $_POST['pass'];
    if (trim($email) == null || trim($parola) == null) {
        print 'Email si parola nu pot fi nule!';
        return;
    }
    $rezultatInregistrare = inregistrare($email, $parola);
    if ($rezultatInregistrare) {
        $_SESSION['email'] = $email; //autologin la inregistrare cu succes
        $_SESSION['welcome'] = "Salut, $email, te-ai inregistrat cu succes, spor la cumparaturi!";
        header("location: index.php");
    } else {
        print 'Eroare la inregistrare';
    }
}
