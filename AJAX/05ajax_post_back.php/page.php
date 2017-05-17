<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>back office ajax</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
        <h1>Employes</h1>
        <div id="tableau_employes"></div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>

    <script>
        // mise en place d'un timer JS
        setInterval("ajax()", 5000);
        // 2 arguments -> la fonction a executer, le timer en ms

                function ajax(){

                    var file = "ajax.php";

                    var xhttp = new XMLHttpRequest();

                    xhttp.open("POST", file, true);

                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                    xhttp.onreadystatechange = function(){
                
                        if(xhttp.readyState == 4 && xhttp.status == 200){
                            console.log(xhttp.responseText);
                            var obj = JSON.parse(xhttp.responseText);
                            document.getElementById("tableau_employes").innerHTML = obj.resultat;
                        }
                    }
                
                xhttp.send();
                }
    </script>
  </body>
</html>