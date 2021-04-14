<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'entete.html';?>

<div>
    <h2>Profils existant</h2>
    <table>
        <tr>
            <th class="table">Nom</th>
            <th class="table">Prénom</th>
            <th class="table">Mail</th>
            <th class="table">Photo </th>
            <th border="0"> </th>
        </tr>
    <?php 
    $db = mysqli_connect("localhost","root","root","crud");
    $sql = "SELECT * FROM infos";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) { 
        $name= $row['nom'];
        $firstname = $row['prenom'];  
        $mail = $row['mail'];        
        $pic = $row['image'];
        $id = $row['id_info'];
    ?> 
        <tr> 
        <td class="table"><?php echo $name; ?></td>
        <td class="table"><?php echo $firstname; ?></td>
        <td class="table"><?php echo $mail; ?></td>
        <td class="table"><?php echo "<img style='width:200px; height:200px;' src='image/".$pic." '>"; ?></td> 
        <td>
            <button class="delete"><a href="delete.php?id=<?php echo $id; ?>" style="text-decoration: none;color: white;">Supprimer</a></button>

            <button class="edit"><a href="edit.php?id=<?php echo $id; ?>" style="text-decoration: none;color: white;">Modifier</a></button>
        </td> 
    <?php 
    } 
    ?> 
    </table>
</div>
</body>
</html>
