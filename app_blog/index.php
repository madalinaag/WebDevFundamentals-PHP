<?php 
    require_once 'functii/sql_functions.php';
    session_start();
    if (isset($_POST['conectare'])) {
        $email = $_POST['email_utilizator'];
        $pass = $_POST['pass'];
        $rezultatConectare = conectare($email, $pass);
        if ($rezultatConectare) {
            if (isset($_SESSION['eroare_login'])) {
                unset($_SESSION['eroare_login']);//sterg perechea cheie-valoare din sesiune, unde cheia este eroare_login
            }
            //setez email pe sesiune, atunci cand avem setata cheia email pe $_SESSION, stim ca userul este logat
            //ma intereseaza sa stiu cand este userul logat ca sa pot sa aleg template-ul corect
            $_SESSION['email'] = $email; //userul este conectat
        } else {
            $_SESSION['eroare_login'] = 'Conectare esuata';
        }
    }
?>
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
        <?php
        if (isset($_SESSION['email'])) {
            require_once 'templates/template_conectat.php';
        } else {
            require_once 'templates/template_neconectat.php';
        }
        ?>
    </body>
</html>
