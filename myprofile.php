<?php require "connection.php";

session_start();

if (isset($_SESSION["u"])) {
  $user = $_SESSION["u"];
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <title>TEC MASTER | MY PROFILE</title>


 
  <link rel="stylesheet" href="animations/animation.css">

  <link href="bootstrap/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">


  </head>

  <body style="height: 1000px; overflow-x: hidden;">

    <?php require "header2.php"; ?>

    <section></section>

    <section>
      <div class="col-12 mt-5">
        <div class="row justify-content-center">
          <h4 class="text-center" data-aos="zoom-in">My Profile</h4>
          <div class="col-11 shadow-lg">
            <div class="row">
              <div class="col-lg-4 col-12 border-end mt-5">
                <div class="row">
                  <div class="col-12" data-aos="fade-up">
                    <div class="row justify-content-center">


                      <!-- <img src="resouses/user_data/profile-user.png" class="rounded mt-5" id="viweImage" style="width: 150px;" alt=""> -->
                      <?php

                      $prfile_img_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email`='" . $user["email"] . "'");
                      $profile_img_num = $prfile_img_rs->num_rows;

                      if ($profile_img_num = 0) {
                      ?>
                        <input type="file" class="d-none" id="profileimg" iaccept="image/*">

                        <label for="profileimg" class=" col-6 mt-5" onclick="changeImage();"> <img src="resouses/user_data/profile-user.png" for="profileimg" id="viweImage" style="max-width: 200px; cursor: pointer; border-radius: 20%;" alt="">
                        </label>
                      <?php
                      } else {
                        $Profile_img_data = $prfile_img_rs->fetch_assoc();
                      ?>
                        <input type="file" class="d-none" id="profileimg" iaccept="image/*">

                        <label for="profileimg" class=" col-6 mt-5" onclick="changeImage();"> <img src="<?php echo $Profile_img_data["path"]; ?>" for="profileimg" id="viweImage" style="max-width: 200px; cursor: pointer; border-radius: 20%;" alt="">
                        </label>
                      <?php
                      }

                      ?>






                    </div>
                    <div class="row justify-content-center mt-3">
                      <h4 class="text-center"><?php echo $user["fname"] . " " . $user["lname"] ?></h4>
                      <h6 class="text-center"><?php echo $user["email"]; ?></h6>
                    </div>

                    <div class="row border-top justify-content-center" style="margin-top: 100px;">
                      <div class="col-12">
                        <h5 class="text-center mt-4 fw-bold">Security Settings</h5>
                        <div class="offset-3 col-6">
                          <hr>
                        </div>

                        <section class="d-block" id="changePwBtn">

                          <div class="offset-1 col-10 text-center">
                            <p>Click the button below to change the password. A code will then be sent to your email by usClick the button below to change the password. A code will then be sent to your email by us</p>
                          </div>
                          <div class="offset-3 col-6">
                            <button class="btn btn-success d-grid" onclick="changePwSendVerification('<?php echo $user['email']; ?>');">Change Password</button>
                          </div>

                        </section>

                        <section class="d-none" id="changePwVeri">
                          <div class="offset-1 col-10 text-center">
                            <p>The verification code has already been send to your email.</p>
                          </div>
                          <div class="offset-1 col-10">

                            <input type="text" class="form-control" placeholder="verification code">
                          </div>
                          <div class="border m-3">
                            <p class="mt-5">Type Your New Password.</p>
                            <div class="offset-1 col-10">

                              <input type="password" class="form-control" placeholder="New Password">


                            </div>
                            <div class="offset-1 col-10 mt-4 mb-4">

                              <input type="password" class="form-control" placeholder="Re-New Password">
                            </div>
                          </div>
                          <div class="offset-1 col-10 mt-4">
                            <div class="row justify-content-center">
                              <button class="btn btn-success d-grid col-5">Change</button>
                            </div>


                          </div>
                        </section>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-12 mt-5">
                <div class="row justify-content-center">
                  <h5 class="text-center mt-4 fw-bold" data-aos="fade-up" data-aos-delay="30">Update Profile</h5>

                  <div class="col-1 -lg-block d-none"></div>
                  <div class="col-4 col-lg-4 col-10 mt-5 " data-aos="fade-up" data-aos-delay="50">
                    <div class="row">
                      <p>* Frist Name</p>
                      <input id="fname" type="text" class="form-control" value="<?php echo $user["fname"]; ?>">
                    </div>
                  </div>
                  <div class="col-1 d-lg-block d-none"></div>
                  <div class="col-lg-4 col-10 mt-5" data-aos="fade-up" data-aos-delay="50">
                    <div class="row">
                      <p>* Last Name</p>
                      <input type="text" id="lname" class="form-control" value="<?php echo $user["lname"]; ?>">
                    </div>
                  </div>
                  <div class="col-lg-9 col-10 mt-5" data-aos="fade-up" data-aos-delay="70">
                    <div class="row">
                      <p>* Email Address</p>
                      <input type="text" class="form-control" value="<?php echo $user["email"]; ?>" disabled>
                    </div>
                  </div>

                  <div class="col-lg-9 col-10 mt-5" data-aos="fade-up" data-aos-delay="90">
                    <div class="row">
                      <p>* Mobile</p>
                      <input type="text" id="mobile" class="form-control" value="<?php echo $user["mobile"]; ?>">
                    </div>
                  </div>

                  <?php

                  $addrss_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $user["email"] . "'");
                  $address_data = $addrss_rs->fetch_assoc();

                  ?>

                  <div class="col-lg-9 col-10 mt-5" data-aos="fade-up" data-aos-delay="110">
                    <div class="row">
                      <p>* Address Line 1</p>
                      <input type="text" id="line1" class="form-control" value="<?php echo $address_data["address_line_1"]; ?>">
                    </div>
                  </div>
                  <div class="col-lg-9 mt-5 col-10" data-aos="fade-up" data-aos-delay="130">
                    <div class="row">
                      <p>* Address Line 2</p>
                      <input type="text" id="line2" class="form-control" value="<?php echo $address_data["address_line_2"]; ?>">
                    </div>
                  </div>
                  <div class="col-1 -lg-block d-none"></div>
                  <div class="col-4 col-lg-4 col-10 mt-5 " data-aos="fade-up" data-aos-delay="150">
                    <?php
                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                    $city_data = $city_rs->fetch_assoc();
                    ?>
                    <div class="row">
                      <p>* City</p>
                      <select class="form-select" name="" id="city" onchange="loadDistric();">
                        <option class="fw-bold text-success" value=""><?php echo $city_data["name"]; ?></option>
                        <option value="">--Select City--</option>

                        <?php

                        $cit_rs = Database::search("SELECT * FROM `city`");
                        $cit_num = $cit_rs->num_rows;

                        for ($z = 0; $z < $cit_num; $z++) {
                          $cit_data = $cit_rs->fetch_assoc();

                        ?>
                          <option value="<?php echo $cit_data["id"]; ?>"><?php echo $cit_data["name"]; ?></option>
                        <?php
                        }

                        ?>
                      </select>

                    </div>
                  </div>

                  <div class="col-1 d-lg-block d-none"></div>


                  <?php
                  $distric_rs = Database::search("SELECT * FROM `distric` WHERE `id`='" . $city_data["distric_id"] . "'");
                  $distric_data = $distric_rs->fetch_assoc();
                  ?>
                  <div class="col-lg-4 col-10 mt-5" data-aos="fade-up" data-aos-delay="150">
                    <div class="row">
                      <p>* Distric</p>
                      <select name="" id="distric" onchange="loadProvince();" class="form-select">
                        <option value="" class="fw-bold text-success" selected><?php echo $distric_data["name"]; ?></option>
                        <option value="">--Select Distric--</option>
                        <?php

                        $dis_rs = Database::search("SELECT * FROM `distric`");
                        $dis_num = $dis_rs->num_rows;

                        for ($y = 0; $y < $dis_num; $y++) {
                          $dis_data = $dis_rs->fetch_assoc();
                        ?>
                          <option value="<?php echo $dis_data["id"]; ?>"><?php echo $dis_data["name"]; ?></option>
                        <?php
                        }

                        ?>
                      </select>

                    </div>
                  </div>

                  <div class="col-1 -lg-block d-none"></div>
                  <div class="col-4 col-lg-4 col-10 mt-5 " data-aos="fade-up" data-aos-delay="170">

                    <div class="row">
                      <p>* Province</p>
                      <select class="form-select" name="" id="province">
                        <?php
                        $pr_rs = Database::search("SELECT * FROM `province` WHERE `id`='" . $distric_data["province_id"] . "'");
                        $pr_data = $pr_rs->fetch_assoc();
                        ?>
                        <option class="fw-bold text-success" value="" selected><?php echo $pr_data["name"]; ?></option>
                        <option value="">--Select Province--</option>

                        <?php

                        $province_rs1 = Database::search("SELECT * FROM `province`");


                        $province_num1 = $province_rs1->num_rows;

                        for ($x = 0; $x < $province_num1; $x++) {
                          $province_data = $province_rs1->fetch_assoc();

                        ?>

                          <option value="<?php echo $province_data["id"]; ?>"><?php echo $province_data["name"]; ?></option>

                        <?php
                        }

                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-1 d-lg-block d-none"></div>

                  <div class="col-lg-4 col-10 mt-5" data-aos="fade-up" data-aos-delay="170">
                    <div class="row">
                      <p>* Postal Code</p>
                      <input type="text" class="form-control" id="pcode" value="<?php echo $address_data["postal_code"]; ?>">
                    </div>
                  </div>
                  <div class="col-9 mt-5 mb-3" data-aos="fade-up" data-aos-delay="190">
                    <div class="row justify-content-end">
                      <button class="btn btn-success col-lg-3 col-12 d-grid" onclick="updateMyProfile();">Save Change</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>


    <?php require "footer.php" ?>
    <script type="text/javascript">
      window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0)
      })
    </script>
 <script src="animations/animation.js"></script>

  <script src="bootstrap/js/main.js"></script>
  <script src="bootstrap.js"></script>
  <script src="script.js"></script>

  <script src="bootstrap.bundle.js"></script>
  </body>

  </html>

<?php
} else {
?>
  <h6>Pleace Log in 1st</h6>
<?php
}

?>