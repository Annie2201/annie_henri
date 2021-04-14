<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
    
<?php include 'entete.html';?>

<div class="insert-form">
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="nom" placeholder="nom" required><br>
    <input type="text" name="prenom" placeholder="prenom" required><br>
    <input type="email" name="email" placeholder="mail" required><br>
    <label>Choisir une photo :</label><br>
    <input type="file" name="image"><br>
    <input type="submit" name="upload" value="Valider" class="btn"><br><br>
</form>
</div>



<?php 
    if (isset($_POST['upload'])){
        $target= "image/".basename($_FILES['image']['name']);

        //connection db
        $db = mysqli_connect("localhost","root","root","crud");

        //info donné ampidirina
        $image = $_FILES['image']['name'];
        $nom = $_POST['nom'];
        $name=$_POST['prenom'];
        $mail=$_POST['email'];

        $sql = "INSERT INTO infos (nom,prenom,mail,image) VALUES ('$nom','$name','$mail','$image')";
        mysqli_query($db,$sql);

        //img va changer de dossier
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            echo"Enregistrés"; 
        }
    }
?>
</body>
</html>