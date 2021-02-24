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
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <header id="banner"></header>
        <nav id="meniu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?p=1">Conectare</a></li>
                <li><a href="index.php?p=2">Inregistrare</a></li>
                <li><a href="index.php?p=3">Contact</a></li>
            </ul>
        </nav>
        <section id="continut">
        <?php
        if (isset($_GET['p'])) { //am cerut o anumita pagina
            //verific ce pagina am cerut
            $page = $_GET['p'];
            switch($page) {
                case 1: //conectare
                    require_once 'pagini/login.php';
                    break;
                case 2: //inregistrare
                    require_once 'pagini/register.php';
                    break;
                case 3: //contact
                    require_once 'pagini/contact.php';
                    break;
                default: //desi e setata pagina, nu e o valoare cunoscuta, asa ca incarc pagina de eroare
                    require_once 'pagini/eroare.php';
                    break;
            }
        } else { //nu am nicio pagina specifica ceruta, deci incarc homepage-ul
            require_once 'pagini/home.php';
        }
       
        ?>
        </section>
    </body>
</html>
