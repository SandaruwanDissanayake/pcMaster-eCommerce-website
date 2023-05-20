<?php
// echo("brands");
require "connection.php";

if(isset($_GET["c"])){
    $city_id=$_GET["c"];
 
    $distric_rs=Database::search("SELECT * FROM `distric` WHERE `id`='".$city_id."'");

    $distric_num=$distric_rs->num_rows;
  ?>
    <option value="0">--Select Distric--</option> 
  <?php

    if($distric_num > 0 ){
        for($x=0; $x < $distric_num;$x++){
            $distric_data=$distric_rs->fetch_assoc();
            // echo("hello");
            ?>
            <option value="<?php echo $distric_data["id"];?>"><?php echo $distric_data["name"]; ?></option>
            
            <?php
        }
    }else{
       $all_distric=Database::search("SELECT * FROM `distric`");
       $all_num=$all_distric->num_rows;
       for($y=0; $y<$all_num;$y++){
        $all_data=$all_distric->fetch_assoc();
        ?>
        <option value="<?php echo $all_data["id"];?>"><?php echo $all_data["name"]; ?></option>
        
        <?php
       }
    }
}

?>