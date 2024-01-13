<?php 
require("../db.php");
// title
if(isset($_GET["search"])){
    $search=$_GET["search"];
    $query="SELECT * FROM `article` WHERE 'name' LIKE '$search%'";
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $tab[]=$row;
        }
        echo  json_encode($tab);  
    }
}
// description
if(isset($_GET["search"])){
    $search=$_GET["search"];
    $query="SELECT * FROM `article` WHERE 'description' LIKE '$search%'";
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $tab[]=$row;
        }
        echo  json_encode($tab);  
    }
}
// categorie
if(isset($_GET["cat"])){
    $cat=$_GET["cat"];
    
    $query = "SELECT * FROM `article`
              INNER JOIN `Categorie` ON `Categorie`.`id` = `article`.`Categorie_id` 
              WHERE `Categories`.`Categorie_ID` LIKE '$cat%'";
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $tab[]=$row;
        }
        echo  json_encode($tab);  
    }
}
// tag
if(isset($_GET["cat"])){
    $cat=$_GET["cat"];
    
    $query = "SELECT * FROM `tag` WHERE `tag`.`name` LIKE '$tag%'";
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $tab[]=$row;
        }
        echo  json_encode($tab);  
    }
}
?>