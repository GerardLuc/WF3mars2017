<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>no bdd</title>
        <style>
        
        </style>
    </head>
    <body>
        <form id="inscription">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="">
            <input type="submit" value="S'inscrire'">
        </form>
        <hr>
        <div id="list_inscrit"></div>
        <script>
            document.getElementById("inscription").addEventListener("submit", ajax);

            function ajax(event){
                event.preventDefault();
                var file = "ajax.php";

                if(window.XMLHttpRequests){
                    var xhttp = new XMLHttpRequest();
                } else {
                    var xhttp = new ActiveXObject(Microsoft.XMLHTTP); // Pour internet explorer avant le 7
                }

                var info = document.getElementById("email");
                var email = info.value;

                var parametres = "email="+email;

                xhttp.open("POST, file, true");
                xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function(){
                    if(xhttp.readyState == 4 && xhttp == 200){
                        var liste = JSON.parse(xhttp.responseText);

                        document.getElementById("liste_inscrit").innerHTML = liste.resultat;
                    }
                }
                xhttp.send(parametres)
            }
        </script>
    </body>
</html>