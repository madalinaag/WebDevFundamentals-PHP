<?php
$user = preiaUtilizatorDupaEmail($_SESSION['email']);
?>
<h1><?php print $user['email']?></h1>
<?php if(isset($user['poza'])) {?>
<img src="imagini/<?php print $user['poza'];?>" width="200px"/>
<?php } else { ?>
<img src="imagini/default.png" width="200px"/>
<?php } ?>
<h2>Actualizeaza poza profil</h2>
<form method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="img">Imagine</label></td>
            <td><input type="file" id="img" name="img"/></td>
        </tr>
        <tr>
            <td><input type="submit" name="adauga" value="Adauga"/></td>
        </tr>
    </table>
        
</form>
<?php
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

if (isset($_POST['adauga'])) {
    if (isset($_FILES['img'])) {
        //verificam daca exista vreo eroare
        if ($_FILES['img']['error'] == 0) { //nu aveam nicio eroare, avem un fisier, putem adauga produsul
            //verificam tipul fisierului
            //jpg, jpeg, png, bmp, gif
            switch ($_FILES['img']['type']) {
                case 'image/jpg':
                case 'image/jpeg':
                case 'image/png':
                case 'image/bmp':
                case 'image/gif':
                    //imagine in format acceptat
                    //$_FILES['img']['name'] - nume_img_din_pc_user.jpg
                    //ne asiguram ca imaginea are un nume unic si extensia corecta
                    //pastram name-ul pt ca are si extensia, dar ii mai concatenam la inceput un id unic
                    $numeImagine = uniqid() . $_FILES['img']['name']; //jbhft65445fjnume_img_din_pc_user.jpg
                    //salvare pe server = mutare din temp in imagini
                    $salvareServer = move_uploaded_file(
                                        $_FILES['img']['tmp_name'],
                                        'imagini/' . $numeImagine
                                    );
                    if ($salvareServer) {
                        //salvam produs cu imagine in bd
                        $salvareBd = actualizeazaPoza($user['id'], $numeImagine);
                        if ($salvareBd) {
                            //salvat produs cu succes
                                header("location: index.php?page=2");

                        } else {
                            //nu l-am salvat in bd, sterg imaginea si de pe server
                            unlink('imagini/' . $numeImagine);
                            print "Eroare la salvarea in baza de date";
                        }
                    } else {
                        print "Eroare la salvarea pe server";
                    }
                    break;
                default:
                    print "Fisierul selectat nu are un format acceptat";
                    break;
            }
        } 
    }
}