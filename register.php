<?php require "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>TEC MASTER | LOG IN</title>



<link rel="stylesheet" href="animations/animation.css">

    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">


</head>

<body class="bacground" style="overflow: hidden;">
    <div class="container-fluid">
        <div class="row">

            <!-- header  -->

            <header>
                <div class="col-12 hedaer1">
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3 offset-1 col-5">
                            <div class="row align-content-center">
                                <img src="resouses/bacground_image/tec_master_logo.png" style="width: 90px; margin-top: -20px;" alt="">

                            </div>
                        </div>
                        <div class="col-6 d-lg-none d-block">
                            <div class="col-4 d-block d-md-block offset-4 d-lg-none">
                                <div class="row">
                                    <div class="offset-6 col-6 justify-content-end">
                                        <div class="row">
                                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></button>

                                            <div class="offcanvas offcanvas-end main-body" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                                <div class="offcanvas-header">
                                                    <!-- <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5> -->
                                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body" style="background-color:#000 ;">



                                                    <div class="col-12 mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;">Home</button>
                                                    </div>
                                                    <div class="col-12 mb-1 ">
                                                        <button class="btn1 btn2" style="width:90% ;">About Us</button>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;">Contact</button>
                                                    </div>
                                                    <div class="col-12  mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;">Become a seller</button>
                                                    </div>
                                                    <div class="col-12  mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;" onclick="signInWindow();">Sign In</button>
                                                    </div>
                                                    <div class="col-12  mb-1">
                                                        <button class="btn1 btn2" style="width:90% ;" onclick="signUpWindow();">Rejister</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 d-lg-block d-none">
                            <div class="row justify-content-end">
                                <div class="col-2">
                                    <button class="btn1" onclick="(window.location='index.php');">HOME</button>
                                </div>
                                <div class="col-2">
                                    <button class="btn1">ABOUT US</button>

                                </div>
                                <div class="col-2">
                                    <button class="btn1" onclick="(window.location='signIn.php');">SIGN IN</button>

                                </div>
                                <!-- <div class="col-3 ">
                    <button class="btn1" onclick="(window.location='signin.php');">REGISTER NOW</button>

                  </div> -->


                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- header -->
            <div class="col-12 " style="display: flex; align-items: center; justify-content: center; height: 700px;">
                <div class="row justify-content-center">

                    <div class="col-12 sign-inBox  rounded-3 col-lg-7 " >
                        <div class="row">
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-11 rounded-3  ">
                                        <h3 class="text-center mt-5 fw-bold text-white z-in" >Register Now</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <h6 id="r1" style="color:red ;"></h6>
                                                    <div class="col-6 z-in" >
                                                        <div class="row">
                                                            <div class="form-floating mb-3">

                                                                <input type="text" class="form-control" id="f" placeholder="Jhone">
                                                                <label for="floatingInput" class="text-success">Frist Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 z-in" >
                                                        <div class="row">
                                                            <div class="form-floating mb-3">

                                                                <input type="text" class="form-control" id="l" placeholder="perera">
                                                                <label for="floatingInput" class="text-success">Last Name</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 z-in" >
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <h6 id="r3" style="color:red ;"></h6>
                                                                <input type="email" class="form-control" id="e" placeholder="name@example.com">
                                                                <label for="floatingInput" class="text-success">Email Address</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 z-in">
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <h6 id="r4" style="color:red ;"></h6>
                                                                <input type="password" class="form-control" id="p" placeholder="Password">
                                                                <label for="floatingInput" class="text-success">Password</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 z-in">
                                                        <div class="row">
                                                            <div class="form-floating mb-3">
                                                                <h6 id="r5" style="color:red ;"></h6>
                                                                <input type="text" class="form-control" id="m" placeholder="07_">
                                                                <label for="floatingInput" class="text-success">Mobile</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 z-in">
                                                        <div class="row ">
                                                            <h6 id="r6" style="color:red ;"></h6>
                                                            <select class="form-select text-success" style="height:57px ; width: 340px;" id="g">
                                                                <option value="0">--Select Gender--</option>
                                                                <?php
                                                                $gender_rs = Database::search("SELECT * FROM `gender` ");
                                                                $gender_num = $gender_rs->num_rows;

                                                                for ($x = 0; $x < $gender_num; $x++) {
                                                                    $gender_data = $gender_rs->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $gender_data["id"]; ?>"><?php echo $gender_data["name"]; ?></option>
                                                                <?php
                                                                }
                                                                ?>



                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="" id="alertdiv" role="alert">
                                                        <h6 id="r7"></h6>
                                                    </div>
                                                    <div class="col-12 z-in">
                                                        <div class="row justify-content-center">
                                                            <button class="btn2 col-6 mt-4 mb-4" style="color:#000 ; border:2px solid #000 ;"  onclick="Rejister();">Rejister</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


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