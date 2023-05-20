<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>TEC MASTER</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="bootstrap.css">


</head>

<body class="body">



  <div class="main-header">

    <div class="container-fluid">
      <div class="row">
        <header>
          <div class="col-12 hedaer1">
            <div class="row">
              <div class="col-lg-1"></div>
              <div class="col-lg-3 mx-3 col-5 ">
                <div class="row align-content-center">
                  <img src="resouses/bacground_image/tec_master_logo.png" style="width: 150px; margin-top: -20px;" alt="">
                </div>
              </div>
              <div class="col-5 d-lg-none d-block">
                <div class="row justify-content-end">

                </div>
                <div class="col-12 mt-2  ">
                  <div class="row justify-content-end">
                    <div class="offset-6 col-6 ">
                      <div class="row justify-content-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></button>

                        <div class="offcanvas offcanvas-end main-body" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                          <div class="offcanvas-header">
                            <!-- <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5> -->
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>

                          <?php
                          session_start();
                          if (isset($_SESSION["u"])) {
                            $data = $_SESSION["u"];
                          ?>
                            <div class="col-2">
                              <img class="text-center m-4 mt-0" src="resouses/user_data/profile-user.png" style="height:20px ; width:20px ;">
                            </div>
                            <div class="col-9">
                              <h6><?php echo $data["fname"] . " " . $data["lname"]; ?></h6>
                            </div>
                          <?php
                          }
                          ?>
                          <div class="offcanvas-body" style="background-color:#000 ; ">



                            <div class="col-12 mb-1 ">
                              <button class="btn1 btn2" style="width:90% ; ">Home</button>
                            </div>
                            <div class="col-12 mb-1 ">
                              <button class="btn1 btn2" style="width:90% ;">About Us</button>
                            </div>
                            <div class="col-12 mb-1">
                              <button class="btn1 btn2" style="width:90% ;">Services</button>
                            </div>
                            <div class="col-12 mb-1">
                              <button class="btn1 btn2"  style="width:90% ;">Contact</button>
                            </div>
                          

                            <?php
                            // session_start();
                            if (isset($_SESSION["u"])) {
                              $data = $_SESSION["u"];
                            ?>
                              <div class="col-12  mb-1">
                                <button class="btn1 btn2" style="width:90% ;">Cart</button>
                              </div>
                              <div class="col-12  mb-1">
                                <button class="btn1 btn2" style="width:90% ;">Watch List</button>
                              </div>
                              <div class="col-12  mb-1">
                                <button class="btn1 btn2" style="width:90% ;">Purchasd History</button>
                              </div>
                              <div class="col-12  mb-1">
                                <button class="btn1 btn2" style="width:90% ;" onclick="logOut();">Log Out <i class="bi bi-box-arrow-in-right"></i></button>
                              </div>
                            <?php
                            } else {
                            ?>


                              <div class="col-12  mb-1">
                                <button class="btn1 btn2" style="width:90% ;" onclick="signInWindow();">Sign In</button>
                              </div>
                              <div class="col-12  mb-1">
                                <button class="btn1 btn2" style="width:90% ;" onclick="signUpWindow();">Rejister</button>
                              </div>
                            <?php
                            }
                            ?>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 d-lg-block d-none">
                <div class="row justify-content-end">
                  <div class="col-12">
                    <div class="row justify-content-end">

                    <div class="col-2">
                    <a href="#home"><button class="btn1" onclick="(window.location='index.php');">HOME</button></a>
                  </div>
                  <div class="col-2">
                    <a href="#about"><button class="btn1"> ABOUT US</button></a>


                  </div>

                  <div class="col-2">
                    <a href="#contact"><button class="btn1"> Contact</button></a>
                  </div>
                  <div class="col-2">
                    <a href="#Services"><button class="btn1"> Services</button></a>
                  </div>

                    </div>
                  </div>
                  





                </div>
              </div>
            </div>
          </div>
        </header>
      </div>
    </div>

  </div>




  <script type="text/javascript">
    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0)
    })
  </script>

</body>


</html>