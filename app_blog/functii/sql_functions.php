<?php
function conectareBd(
            $host = 'localhost',
            $user = 'root',
            $password = '',
            $database = 'blog'
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

//inregistrarea utilizatorilor
//1. preia email si parola trimise din formular
//2. verific daca email-ul e deja folosit
//3. daca email-ul nu e folosit, pot face inregistrarea, altfel trebuie sa dau o eroare

//pentru a verifica daca email-ul e deja folosit, facem o fct generala pt a prelua un utilizator dupa email
//daca gasesc utilizatorul => nu pot sa fac inregistrarea
//daca nu gasesc utilizatorul => pot merge mai departe cu inregistrarea

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

function preiaUtilizatorDupaId($id)
{
    $link = conectareBd();
    $adresaEmail = clearData($id, $link);
    $query = "SELECT * FROM utilizator WHERE  id      =     $id";
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
    
    $query = "INSERT INTO utilizator VALUES(NULL, '$email', '$pass', 'NULL')";
    return mysqli_query($link, $query);    
}

//doar cu scop didactic, nu facem asta pe un site pe bune
function preiaUtilizatori()
{
    $link = conectareBd();
    $query = "SELECT id, email FROM utilizator";
    
    $result = mysqli_query($link, $query);
    $utilizatori = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $utilizatori;
}

function conectare($email, $pass) 
{
    $link = conectareBd();
    $email = clearData($email, $link);
    $pass = clearData($pass, $link);
    
    //cautam un utilizator dupa email, daca exista, verificam si parola
    //daca se potriveste parola intoarcem true
    //daca nu se potriveste parola, sau user nu exista intaorcem false
    $user = preiaUtilizatorDupaEmail($email);
    if ($user) { //am gasit user, mai trebuie sa ii verific parola
        //verificare parola
//        if (md5($pass) === $user['parola']) {
//            return true;
//        } else {
//            return false;
//        }
        
        return md5($pass) === $user['parola'];
    }
    
    return false;
}


function adaugaPostare($titlu, $continut, $data, $idUser)
{
    $link = conectareBd();
    $titlu = clearData($titlu, $link);
    $continut = clearData($continut, $link);
    $data = clearData($data, $link);
    
    $query = "INSERT INTO postare VALUES(NULL, '$titlu', '$continut', '$data', 0, $idUser)";
//    var_dump($query);die();
    return mysqli_query($link, $query);
}

function preiaPostari()
{
    $link = conectareBd();
    $query = "SELECT * FROM postare ORDER BY data DESC, titlu";
    $rezultat = mysqli_query($link, $query);
    
    $produse = mysqli_fetch_all($rezultat, MYSQLI_ASSOC); //fetch all folosit cand primesc mai multe inreg din bd
    
    return $produse;
}

function preiaPostareDupaId($id)
{
    $link = conectareBd();
    $id = clearData($id, $link);
    
    $query = "SELECT * FROM postare WHERE id = $id";
    $rezultat = mysqli_query($link, $query);
    
    $produs = mysqli_fetch_array($rezultat, MYSQLI_ASSOC); //fetch array folosit cand primesc o sg inreg din bd
    
    return $produs;   
}

function actualizeazaPoza($id,$imagine)
{
    $link = conectareBd();
    $imagine = clearData($imagine, $link);
    $query = "UPDATE utilizator SET poza = '$imagine' WHERE id = $id";
        
    return mysqli_query($link, $query);
}

function actualizeazaLike($id)
{
    $link = conectareBd();
    $denumire = clearData($denumire, $link);
    $pret = clearData($pret, $link);
    $imagine = clearData($imagine, $link);
    $query = "UPDATE postare SET likes = likes+1 WHERE id = $id";
        
    return mysqli_query($link, $query);
}

function preiaPostariDupaKeyword($keyword)
{
    $link = conectareBd();
    $keyword = clearData($keyword, $link);
    $query = "SELECT * FROM postare WHERE titlu LIKE '%$keyword%' OR continut LIKE '%$keyword%' ORDER BY data DESC, titlu";
    //LIKE %keyword% => denumirea trebuie sa contina keyword
    //LIKE %laptop% => => laptop/un laptop/laptop lenovo/un laptop lenovo
    $rezultat = mysqli_query($link, $query);
    $postari = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);
    
    return $postari;
}

function stergePostareDupaId($id)
{
    $link = conectareBd();
    $id = clearData($id, $link);
    
    $query = "DELETE FROM postare WHERE id = $id";
    
    return mysqli_query($link, $query);
}