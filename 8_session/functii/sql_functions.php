<?php
function conectareBd(
            $host = 'localhost',
            $user = 'root',
            $password = '',
            $database = 'restaurant'
        )
{
    return mysqli_connect($host, $user, $password, $database);
}

function clearData($input, $link)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    $input = mysqli_real_escape_string($link, $input);
    
    return $input;
}

function preiaUtilizatorDupaEmail($adresaEmail)
{
    $link = conectareBd();
    $adresaEmail = clearData($adresaEmail, $link);
    $query = "SELECT * FROM utilizator WHERE  email      =     '$adresaEmail'";
    //                                      nume atr bd          variabila trimisa in fct
    $result = mysqli_query($link, $query); //result set - o structura de date
    //transformam result set in array
    $utilizator = mysqli_fetch_array($result, MYSQLI_ASSOC); //intoarce o singura inregistrare
    
    return $utilizator; //daca nu gaseste userul intoarce null, daca da eroare intoarce false
}

//intoarce true pt inregistrare cu succes
//intoarce false in 2 cazuri: userul exista sau a dat eroare insertul
function inregistrare($email, $pass)
{
    $link = conectareBd();
    $email = clearData($email, $link);
    $pass = clearData($pass, $link);
    $pass = md5($pass);
    
    //verificam daca exista deja un user cu adresa de email trimisa
    $user = preiaUtilizatorDupaEmail($email);
    if ($user) { //user nu e null, am gasit deja un cont cu adresa de email trimisa
        return false; //la primul return intalnit, functia se opreste
    }
    
    $query = "INSERT INTO utilizator VALUES(NULL, '$email', '$pass')";
    return mysqli_query($link, $query);    
}


function conectare($email, $pass) 
{
    $link = conectareBd();
    $email = clearData($email, $link);
    $pass = clearData($pass, $link);
    //daca nu se potriveste parola, sau user nu exista intaorcem false
    $user = preiaUtilizatorDupaEmail($email);
    if ($user) { //am gasit user, mai trebuie sa ii verific parola
        return md5($pass) === $user['parola'];
    }
    
    return false;
}

function preiaRezervari($userId)
{
    $link = conectareBd();
    $query = "SELECT * FROM rezervare WHERE user_id = $userId";
    $result = mysqli_query($link, $query);
    $rezervari = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $rezervari;

}

function adaugaRezervare($data, $locuri, $userId)
{
    $link = conectareBd();
    $query = "INSERT INTO rezervare VALUES(NULL, '$data', $locuri, $userId)";
    return mysqli_query($link, $query);
}

function preiaNrRezervari($data)
{
    $link = conectareBd();
    $query = "SELECT SUM(locuri) locuri FROM rezervare WHERE data = '$data'";
    $result = mysqli_query($link, $query);
    $rezervari = mysqli_fetch_array($result, MYSQLI_ASSOC);

    return $rezervari;

}

function anuleazaRezervare($id)
{
    $link = conectareBd();
    $query = "DELETE FROM rezervare WHERE id = $id";
    return mysqli_query($link, $query);
}















