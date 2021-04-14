<script type="text/javascript">
    window.alert("<?php echo'Vous êtes sur de vouloir supprimez?';?>");
</script>

<?php 
    
    $id=$_GET['id'];
    echo $id;
    $db = mysqli_connect("localhost","root","root","crud");
    $sql = "DELETE FROM infos WHERE id_info=".$id;
        if($db->query($sql) === TRUE){ 
        header("Location: index.php");
        }
        else{
            echo_debug($mysqli->error);
        }
?>