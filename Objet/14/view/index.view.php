<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
        
        <table>
            <tr>
                <th>id</th>
                <th>prenom</th>
                <th>nom</th>
                <th>email</th>
                <th>adresse</th>
            </tr>
            <?php
            foreach ($user as $user):
            ?>
            <tr>
                <td><?= $user->getId(); ?></td>    
                <td><?= $user->getFirstName(); ?></td>    
                <td><?= $user->getLastName(); ?></td>    
                <td><?= $user->getEmail(); ?></td>    
                <td><?= $user->getAdress(); ?></td>    
            </tr>

            <?php
            endforeach;
            ?>

        </table>
    </body>
</html>