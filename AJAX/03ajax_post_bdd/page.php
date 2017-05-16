<?php
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $liste_prenom = $pdo->query("SELECT prenom, id_employes FROM employes");
    $liste = '';
    while($personne = $liste_prenom->fetch(PDO::FETCH_ASSOC)){
        $liste .= '<option value="'. $personne['id_employes']. '">'. $personne['prenom'].'</option>';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
            *{font-family: sans-serif; text-align: center;}
            form, #resultat{width:50%; margin: 0 auto;}
            select, input{padding: 5px; width: 100%; border-radius: 3px; border: 1px solid;}
            input{cursor: pointer;}
            
        </style>
    </head>
    <body>
        <form id="mon_form">
            <label>prenom</label>
            <select id="choix">
                <?php
                    // Recuperer tous les prenoms presents dans la bdd sur la table employés et mettre l'id_employes dans la value
                    echo $liste;
                ?>
            </select><br>
            <input type="submit" id="valider" value="valider">
        </form>
        <br>
        <div id="resultat"></div>

        <script>
            // Mettre en place un evenement sur la validation du formulaire
            var fomulaire = document.getElementById("mon_form").addEventListener("submit", ajax);

            function ajax(event){
                evt.preventDefault();
                var champSelect = document.getElementById("choix");
                var valeur = champSelect.value;

                var file = "ajax.php";
                var parametres = "personne="+valeur;

                var xhttp = new XMLHttpRequest();

                xhttp.open("POST", file, true);

                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp.status == 200){
                        console.log(r.reponseText);
                        var reponse = JSON.parse(xhttp.reponseText);
                        document.getElementById("resultat").innerHTML = reponse.resultat
                    }
                }
                xhttp.send(parametres)
            }


        </script>
    </body>
</html>