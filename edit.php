<?php include 'entete.html';?>
<link rel="stylesheet" href="style.css">

<?php 

    $id=$_GET['id'];
    $db = mysqli_connect("localhost","root","root","crud");

    $sql = "SELECT * FROM infos WHERE id_info=".$id;
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)) { 
        $name= $row['nom'];
        $firstname = $row['prenom'];  
        $mail = $row['mail'];        
        $pic = $row['image'];
?>
<div class="insert-form">
   <form action="" method="POST">
        <input type="text" name="nom" value="<?=$name?>" required><br>
        <input type="text" name="prenom" value="<?=$firstname?>" required><br>
        <input type="email" name="email" value="<?=$mail?>" required><br>
        <button type="submit" name="valider" class="btn" style="font-size: 18px;">Changer les informations</button>
    </form>
   <form action="" method="POST">
        <input type="file" name="image"><br>
        <button type="submit" name="photo" class="btn">Changer la photo</button>
   </form>
</div>
<?php
    }
 if (isset($_POST['valider'])) {
   
   $name= $_POST['nom'];
   $firstname= $_POST['prenom'];
   $mail= $_POST['email'];
    $sql = "UPDATE infos SET nom='" .$name. "',prenom='".$firstname."',mail='".$mail."' WHERE id_info=".$id;
    if ($db->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $db->error;
    }

    }
    if (isset($_POST['photo'])) {
        $pic= $_POST['image'];
        $sql = "UPDATE infos SET image='".$pic."' WHERE id_info=".$id;
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $db->error;
          }
    }
?>