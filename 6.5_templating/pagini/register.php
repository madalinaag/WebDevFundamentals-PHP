<h1>Register</h1>
<!--formular cu nume, email, parola, varsta minima, varsta, gen, locatie, preferinte notificari-->
<form method="post">
    <table id="register">
        <tr>
            <td><label for="nume">Nume</label></td>
            <td><input type="text" id="nume" name="nume"/></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" id="email" name="email"/></td>
        </tr>
        <tr>
            <td><label for="pass">Parola</label></td>
            <td><input type="password" id="pass" name="pass"/></td>
        </tr>
        <!--ori cu readonly ori cu hidden-->
        <tr>
            <td>Varsta minima</td>
            <td><input type="text" name="varsta_min" value="16" readonly/></td>
        </tr>
        <input type="hidden" name="varsta_min_2" value="16"/>
        <tr>
            <td><label for="varsta">Varsta *min 16 ani</label></td>
            <td><input type="number" name="varsta" id="varsta"/></td>
        </tr>
        <tr>
            <td>Gen</td>
            <td>
                M <input type="radio" name="gen" value="m"/>
                F <input type="radio" name="gen" value="f"/>
            </td>
        </tr>
        <tr>
            <td><lable for="locatie">Locatie</lable></td>
            <td>
                <select id="locatie" name="locatie">
                    <option value="b">Bucuresti</option>   
                    <option value="if">Ilfov</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Notificari</td>
            <td>
                Email <input type="checkbox" name="notificari[]" value="email"/><br>
                SMS <input type="checkbox" name="notificari[]" value="sms"/><br>
                Push <input type="checkbox" name="notificari[]" value="push"/><br>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="register" value="Inregistrare"/></td>
        </tr>
    </table>
</form>
<?php
//verificam daca s-a trimis formularul - verificam daca e setata pe post cheia corespunzatoare butonului de submit
if (isset($_POST['register'])) {
    /*
     * nume min 3 caractere
     * parola min 6 caractere
     * varsta >= varsta min - ori din readonly ori din hidden
     * 
     * mesaj succes: <nume>, te-ai inregistrat cu email-ul <email> si vei primi notificari pe <canale>/nu vei primi notificari
     * 
     * pentru erori afisam: au aparut urmatoarele erori: 
     *  - eroare 1
     *  - eroare 2
     */
    
    //setam o variabila pt salvat erori
    $erori = array();
    
    //preluam datele din form
    $nume = $_POST['nume'];
    if ( strlen( trim($nume) ) < 3) {
        $erori[] = 'Numele trebuie sa aiba min 3 caractere';
//        echivalent cu array_push($erori, 'Numele trebuie sa aiba min 3 caractere');
    }
    
    $parola = $_POST['pass'];
    if ( strlen( trim($parola) ) < 6) {
        $erori[] = 'Parola trebuie sa aiba min 6 caractere'; 
    }
    
    $varstaMin = $_POST['varsta_min']; //din readonly
    $varstaMin2 = $_POST['varsta_min_2']; //din hidden
    
    $varsta = $_POST['varsta'];
    if ($varsta < $varstaMin) {
        $erori[] = 'Varsta minima este de 16 ani.';
    }
    
    if (!empty($erori)) { //avem erori (erori nu e array gol)
        print '<div style="color: red">';
        print 'Au aparut urmatoarele erori: <br>';
        print '<ul>';
        foreach ($erori as $eroare) {
            print '<li>' . $eroare . '</li>';
        }
        print '</ul>';
        print '</div>';
    } else { //nu avem erori
        if (isset($_POST['notificari'])) {
            $canale = $_POST['notificari']; //array
            //concatenare elemente din vector intr-un string: implode
            //$canale = array('email', 'sms')
            //implode('/', $canale) = 'email/sms' => string
            //explode = sparge un string in elemente dintr-un array, dupa un separator (fix inversul lui implode)
            //explode('/', 'email/sms') => array('email', 'sms')
            $mesajNotificari = 'vei primi notificari pe ' . implode('/', $canale);
        } else {
            $mesajNotificari = 'nu vei primi notificari';
        }
        
        $email = $_POST['email'];
        print '<div style="color: green">';
        print "$nume, te-ai inregistrat cu email-ul $email si $mesajNotificari";
        print '</div>';
    }
}