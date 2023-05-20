<?php

require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="resouses/bacground_image/logo.png">

    <title>TEC MASTER | SELLING DETAILS</title>



    <link rel="stylesheet" href="animations/animation.css">
    <link href="bootstrap/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php

if (isset($_SESSION["au"])) {
    $admin = $_SESSION["au"];
?>

    <body style=" overflow-x: hidden; ">



        <?php

        require "adminHeader.php";

        ?>

        <!-- panel -->

        <div class="col-12">
            <div class="row justify-content-center">


                <div class="col-11">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-2 d-lg-block d-none">
                            <div class="row mt-2">

                                <div class="col-12 rounded shadow-lg  ">
                                    <div class="row p-3 d-lg-inline-flex">
                                        <button class="btn selling-btn mt-4" onclick="Dashboard();"><i class="bi bi-bell"></i>&nbsp;Notification</button>

                                        <button class="btn selling-btn mt-4" onclick="NewOrder();"><i class="bi bi-chat-left-text"></i> &nbsp;Comment</button>
                                        <button class="btn selling-btn mt-4" onclick="Packing();"><i class="bi bi-chat-dots"></i> &nbsp; Repiar Request</button>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-12 d-lg-none d-block">
                            <div class="row mt-2">

                                <div class="col-12 rounded shadow-lg  ">
                                    <div class="row p-3 d-lg-inline-flex">
                                        <button class="btn selling-btn mt-4" onclick="Dashboard();"><i class="bi bi-bell"></i>&nbsp;Notification</button>

                                        <button class="btn selling-btn mt-4" onclick="NewOrder();"><i class="bi bi-chat-left-text"></i> &nbsp;Comment</button>
                                        <button class="btn selling-btn mt-4" onclick="Packing();"><i class="bi bi-chat-dots"></i> &nbsp; Repiar Request</button>

                                    </div>

                                </div>

                            </div>
                        </div>










                        <div class="col-lg-10 col-10">

                            <div class="row justify-content-center">
                                <div class="col-11">
                                    <div class="row justify-content-center">

                                        <h2 class="text-center  mt-3" style="font-weight:bolder;">COMIUNITY AREA</h2>

                                    </div>
                                    <!-- Dashboard -->
                                    <section id="Dashboard" class="d-block">
                                        <div class="row justify-content-center">

                                            <div class="col-12">
                                                <div class="row">
                                                    <h4 class="text-center">Add Notifications</h4>
                                                </div>
                                                <div class="row mt-3">
                                                    <h4 class="text-danger fw-bold">Header</h4>
                                                    <input type="text" id="head" class="mt-2">
                                                </div>
                                                <div class="row mt-3">
                                                    <h4 class="text-danger fw-bold">Massage</h4>
                                                    <textarea name="" id="notification" cols="30" rows="10"></textarea>
                                                </div>

                                                <div class="row mt-3 mb-3">
                                                    <button class="btn btn-success" onclick="sendNotification();">Send</button>
                                                </div>
                                            </div>










                                        </div>
                                    </section>

                                    <!-- Dashboard -->


                                    <!-- New Order -->

                                    <section id="NewOrder" class="d-none">

                                        <div class="row">
                                            <div class="col-12 shadow-lg">
                                                <div class="row">

                                                    <h4 class="text-center">Comment</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <?php



                                                $comment_rs = Database::search("SELECT * FROM `user_comment` WHERE `status`='2'");
                                                for ($x = 0; $x < $comment_rs->num_rows; $x++) {
                                                    $comment_data = $comment_rs->fetch_assoc();

                                                ?>
                                                    <div class="row g-2 border-1 mt-3 mb-3" style="border-radius:20px; background-color: #ccc;">
                                                        <div class="col-12">
                                                            <div class="row border-bottom">
                                                                <div class="col-9 m-2">
                                                                    <h5 style="font-size: 18px; font-weight: bold;"><?php echo $comment_data["name"]; ?></h5>
                                                                    <h6 style="font-size: 15px; "><?php echo $comment_data["email"]; ?></h6>
                                                                    <h6 style="font-size: 15px; "><?php echo $comment_data["mobile"]; ?></h6>
                                                                    <h6 style="font-size: 15px; ">2023-10-03</h6>

                                                                </div>
                                                                <div class="col-2 m-2">
                                                                    <button class="btn btn-danger d-grid" onclick="deletComment(<?php echo $comment_data['id']; ?>);">Delete</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h6 class="m-1 fw-bold mt-5 mb-5" style="font-size: 15px;"><?php echo $comment_data["comment"]; ?></h6>
                                                            </div>
                                                        </div>



                                                    </div>

                                                <?php
                                                }

                                                ?>
                                            </div>
                                        </div>



                                    </section>

                                    <!-- New Order -->


                                    <!-- Packing -->

                                    <section id="Packing" class="d-none">
                                        <div class="row">
                                            <div class="col-12 shadow-lg">
                                                <div class="row">
                                                    <h4 class="text-center">Request</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-12">

                                                <?php



                                                $comment_rs = Database::search("SELECT * FROM `user_comment` WHERE `status`='1'");
                                                for ($x = 0; $x < $comment_rs->num_rows; $x++) {
                                                    $comment_data = $comment_rs->fetch_assoc();

                                                ?>
                                                    <div class="row g-2 border-1 mt-3 mb-3" style="border-radius:20px; background-color: #ccc;">
                                                        <div class="col-12">
                                                            <div class="row border-bottom">
                                                                <div class="col-9 m-2">
                                                                    <h5 style="font-size: 18px; font-weight: bold;"><?php echo $comment_data["name"]; ?></h5>
                                                                    <h6 style="font-size: 15px; "><?php echo $comment_data["email"]; ?></h6>
                                                                    <h6 style="font-size: 15px; "><?php echo $comment_data["mobile"]; ?></h6>
                                                                    <h6 style="font-size: 15px; ">2023-10-03</h6>

                                                                </div>
                                                                <div class="col-2 m-2">
                                                                    <button class="btn btn-danger d-grid" onclick="deletComment(<?php echo $comment_data['id']; ?>);">Delete</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h6 class="m-1 fw-bold mt-5 mb-5" style="font-size: 15px;"><?php echo $comment_data["comment"]; ?></h6>
                                                            </div>
                                                        </div>



                                                    </div>

                                                <?php
                                                }

                                                ?>



                                            </div>
                                        </div>



                                    </section>
                                    <!-- Packing -->






                                </div>
                            </div>








                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- panel -->
    <?php
} else {
    ?>

        <h1>Pleace LogIn Frist</h1>

    <?php
}

require "footer.php";

    ?>



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