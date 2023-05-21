<?php

require "connection.php";

if(isset($_GET["d"])){
    $province_id=$_GET["d"];
 
    $province_rs=Database::search("SELECT * FROM `province` WHERE `id`='".$province_id."'");

    $province_num=$province_rs->num_rows;
  ?>
    <option value="0">--Select province--</option> 
  <?php

    if($province_num > 0 ){
        for($x=0; $x < $province_num;$x++){
            $province_data=$province_rs->fetch_assoc();
            // echo("hello");
            ?>
            <option value="<?php echo $province_data["id"];?>"><?php echo $province_data["name"]; ?></option>
            
            <?php
        }
    }else{
       $all_province=Database::search("SELECT * FROM `province`");
       $all_num=$all_province->num_rows;
       for($y=0; $y<$all_num;$y++){
        $all_data=$all_province->fetch_assoc();
        ?>
        <option value="<?php echo $all_data["id"];?>"><?php echo $all_data["name"]; ?></option>
        
        <?php
       }
    }
}

?>