<?php require "connection.php";

session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <title>SHOP NOW | TEC MASTER</title>


  <meta content="" name="description">
  <meta content="" name="keywords">



  <link href="bootstrap/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="bootstrap/animation/aos/aos.css" rel="stylesheet">
  <link href="bootstrap/animation/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="bootstrap/animation/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="bootstrap/animation/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="bootstrap/animation/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="bootstrap/animation/remixicon/remixicon.css" rel="stylesheet">
  <link href="bootstrap/animation/swiper/swiper-bundle.min.css" rel="stylesheet">


  <link href="bootstrap/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">


</head>


<body style="overflow-x: hidden;" onload="changestatesCart();">


  <?php require "header2.php" ?>

  <!-- search -->

  <section id="search">


    <div class="col-12" style="margin-top: 70px; " data-aos="zoom-in">
      <div class="row justify-content-center">
        <div class="col-11 shadow-lg" style=" height: 50px;">
          <div class="row mt-1">
            <div class="col-2">
              <select style="width: 100%; border-radius: 10px; border: none; font-size: 15px; cursor: pointer;" name="" id="">
                <option selected value="">
                  Select Catogeroy
                </option>
                <?php

                $catogory_rs = Database::search("SELECT * FROM `catogory`");
                $catogory_num = $catogory_rs->num_rows;

                for ($s = 0; $s < $catogory_num; $s++) {
                  $catogory_data = $catogory_rs->fetch_assoc();

                ?>

                  <option onclick="basicSearch(0);" id="category" value="<?php echo $catogory_data["id"]; ?>"><?php echo $catogory_data["name"]; ?></option>



                <?php
                }

                ?>
              </select>

            </div>
            <div class="col-6">
              <input type="text" class="search-input" placeholder="Type Keyword" id="keyword" onkeyup="basicSearch(0);">
            </div>
            <div class="col-2">
              <div class="row">
                <button class="btn btn-success d-grid" onclick="basicSearch(0);">Search</button>

              </div>
            </div>
            <div class="col-2" style="cursor: pointer;" onclick="advansSerch();">
              <h6 class="mt-2">Advance Search</h6>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>

  <!-- search -->

  <section id="basicSearchResult">


    <section>


      <!-- carosel -->


      <div class="col-12 " data-aos="fade-left" data-aos-delay="50" style="width: 100%; margin-top: -80px; ">
        <div class="row">
          <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="resouses/bacground_image/Untitled-2.jpg" class="d-block" style="height:200px ; width: 100%;" alt="...">
              </div>
              <div class="carousel-item">
                <img src="resouses/bacground_image/Untitled-1.jpg" class="d-block" style="height:200px ; width: 100%;" alt="...">
              </div>
              <div class="carousel-item">
                <img src="resouses/bacground_image/06e09bc0-604e-438f-bc38-215dafe1826c.png" class="d-block " style="height:200px ; width: 100%;" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>


      <!-- carosel -->

      <section style="margin-top: -30px;">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                  <h2 class="text-black mx-3 "> Popular Categories</h2>
                  <div class="col-3">
                    <hr>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 shadow-lg">
            <div class="row justify-content-center">



              <!-- catogory cart -->

              <?php

              $catogory_rs = Database::search("SELECT * FROM `catogory` offset");
              $catogory_num = $catogory_rs->num_rows;
              for ($z = 0; $z < $catogory_num; $z++) {
                $catogory_data = $catogory_rs->fetch_assoc();


              ?>

                <div onclick="catogorybox('<?php echo $catogory_data['id']; ?>')" class="col-lg-2 col-5 mt-4 mb-4 mx-1" style="background-color: red; height: 200px; cursor: pointer;" data-aos="zoom-in">

                  <div class="row">
                    <div class="col-12  " style="background-color: #000; height: 150px;">
                      <div class="product">
                        <?php
                        
                        if(isset($catogory_data["path"])){
                          ?>
                        <img src="<?php echo $catogory_data["path"]; ?>" style="height: 150px; width: 100%;" alt="">
                          
                          
                          <?php
                        }else{
?>
                        <img src="resouses/product/empty.svg" style="height: 150px; width: 100%;" alt="">

<?php
                        }
                        
                        ?>

                      </div>
                      <div class="col-12">
                        <h6 class="text-white"><?php echo $catogory_data["name"]; ?></h6>

                        <?php

                        $p_catogory_rs = Database::search("SELECT * FROM `product` WHERE `catogory_id`='" . $catogory_data["id"] . "'");
                        $p_catogory_num = $p_catogory_rs->num_rows;

                        ?>

                        <label class="text-white" for=""><?php echo $p_catogory_num ?> Product in stock</label>
                      </div>
                    </div>

                  </div>

                </div>
              <?php
              }

              ?>


              <!-- catogory cart -->

            </div>
          </div>
        </div>
      </section>





    </section>

    <!-- Related Products -->

    <section>
      <div class="col-12" style="margin-top: -60px;">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row">
              <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-black mx-3 ">Related Products</h2>
                <div class="col-3">
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 shadow-lg">
          <div class="row justify-content-center">

            <!-- Card -->
            <?php

            $product_rs = Database::search("SELECT * FROM `product` WHERE `status_id`='1'");
            $product_num = $product_rs->num_rows;

            for ($x = 0; $x < $product_num; $x++) {
              $product_data = $product_rs->fetch_assoc();
            ?>

              <div class="col-lg-3 mx-1 mt-4 col-6 shadow p-3 mb-5 bg-body rounded " data-aos="zoom-in" href='<?php echo "singleProduct.php?id=" . $product_data["id"] ?>'>
                <div class="row justify-content-center product_cart">
                  <div class="col-11" style="background-color: transparent; height: 200px; width: 100%; ">

                    <?php

                    $product_img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $product_data["id"] . "'");
                    $product_img_data = $product_img_rs->fetch_assoc();

                    ?>

                    <img src="<?php echo $product_img_data["path"]; ?>" style="width: 100%; max-height: 250px;" alt="" onclick="singleProduct('<?php echo $product_data['id']; ?>');">

                    <!-- <img src="resouses/product/OIP__4_-removebg-preview.png" style="width: 100%; max-height: 250px;" alt=""> -->

                  </div>
                  <div class="col-11 bg-white" style="width: 100%; height: 100px; ">
                    <div class="row">
                      <div class="col-10 mt-3">
                        <div class="row">
                          <label onclick="singleProduct('<?php echo $product_data['id']; ?>');" style="cursor: pointer;" class="col-10 label" for=""><?php echo $product_data["title"]; ?></label>


                          <label onclick="singleProduct('<?php echo $product_data['id']; ?>');" class="fw-bold" style="font-size: 15px;" for="">LKR : <?php echo $product_data["price"]; ?>.00</label>
                          <!-- <button class="btn btn-success">Buy now</button> -->
                        </div>
                      </div>
                      <div class="col-2 mt-3" style="flex-direction: column;">
                        <h5 class="col-12 text-center" style="cursor: pointer;"><i class="bi bi-heart"></i></h5>

                        <?php

                        if (isset($_SESSION["u"])) {

                          $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $product_data["id"] . "' AND `user_email`='" . $user["email"] . "'");
                          $cart_num = $cart_rs->num_rows;

                          if ($cart_num == 0) {
                        ?>

                            <h5 class="col-12 text-center text-success" style="cursor: pointer;" onclick="addCart('<?php echo $product_data['id']; ?>');"><i class="bi bi-cart-plus"></i></h5>


                          <?php
                          } else {
                          ?>
                            <h5 class="col-12 text-center text-danger" style="cursor: pointer;" onclick="addCart('<?php echo $product_data['id']; ?>');"><i class="bi bi-cart-plus"></i></h5>

                          <?php
                          }
                        } else {
                          ?>

                          <h5 class="col-12 text-center text-success" style="cursor: pointer;" onclick="addCart('<?php echo $product_data['id']; ?>');"><i class="bi bi-cart-plus"></i></h5>


                        <?php
                        }



                        ?>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }

            ?>




            <!-- Card -->


          </div>
        </div>
      </div>
    </section>


    <!-- Related Products -->



  </section>








  <?php require "footer.php"; ?>


  <script type="text/javascript">
    window.addEventListener("scroll", function() {
      var header = document.querySelector("header");
      header.classList.toggle("sticky", window.scrollY > 0)
    })
  </script>
  <script src="bootstrap/animation/purecounter/purecounter_vanilla.js"></script>
  <script src="bootstrap/animation/aos/aos.js"></script>
  <script src="bootstrap/animation/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bootstrap/animation/glightbox/js/glightbox.min.js"></script>
  <script src="bootstrap/animation/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="bootstrap/animation/swiper/swiper-bundle.min.js"></script>
  <script src="bootstrap/animation/php-email-form/validate.js"></script>


  <script src="bootstrap/js/main.js"></script>
  <script src="bootstrap.js"></script>
  <script src="script.js"></script>

  <script src="bootstrap.bundle.js"></script>
</body>


</html>