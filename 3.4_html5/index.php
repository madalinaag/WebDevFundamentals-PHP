<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>ex1</title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
    </head>
    <body>
        <header id="banner" ></header>
        <nav id="meniu">
            <ul>
                <li>
                    <a  id="m1"href="#">Acasa</a>
                </li>
                <li>
                    <a id="m2" href="#">Produse </a>
                </li>
                <li>
                    <a id="m3"  href="#">Contact</a>
                </li>
            </ul>
        </nav>

        <section id="continut">
            <form>

                <h3>Forumular de Contact</h3>

                <label for="fname">Nume:*</label>
                <input type="text" name="fname" placeholder="Numele tau ..."><br><br>
                <label for="email">Email: *</label>
                <input type="email"  name="email" placeholder="Emailul tau ..."><br><br>
                <label for="birthday">Data nastere:</label>
                <input type="date" id="birthday" name="birthday" ><br><br>
                <label for="cars">Oras:</label>
                <select name="oras" id="oras">

                    <option >Bucuresti</option>
                    <option >Sibiu</option>

                    <option>Ilfov</option>
                    <option >Brasov</option>

                </select><br><br>
                <label>Mesajul tau *</label>
                <textarea placeholder="scrie aici..."  rows="4" cols="20">

                </textarea><br><br>

                <label>Abonare newsletter? </label>
                <input type="checkbox"><br><br>

                <input  id="submit" type="submit" value="Trimite">


            </form>
        </section>
        <aside id="lista-linkuri">
          
            <p><b>Ne gasesti si pe ...</b></p>
            <ol>
                
                <li><a href="#">facebook</a></li>
                <li><a href="#">twitter</a></li>
                <li><a href="#">instagram</a></li>
            </ol>
        </aside>
    </body>
</html>
