<?php require "connection.php";

session_start();

$id = $_GET["id"];


$product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $id . "'");
$product_data = $product_rs->fetch_assoc();

?>

<!-- <h1><?php echo $product_data["title"]; ?></h1> -->

<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="resouses/bacground_image/logo.png">

  <title><?php echo $product_data["title"]; ?></title>


<link rel="stylesheet" href="animations/animation.css">
 
  <link href="bootstrap/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="style.css">


</head>


<body style="overflow-x: hidden;">




  <!-- search -->

  <section id="search" >


    <div class="col-12 z-in" style="margin-top: 70px; " >
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
            <div class="col-2" style="cursor: pointer;" onclick="advanceSearch();">
              <h6 class="mt-2"  >Advance Search</h6>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section >

  <!-- search -->

  <section id="basicSearchResult">

    <!-- product data area -->

    <section>

      <div class="col-12 mt-5" >
        <div class="row justify-content-center">
          <div class="col-11">
            <div class="row">

              <?php

              $product_img_rs = Database::search("SELECT * FROM `product_image` WHERE `product_id`='" . $product_data["id"] . "'");

              $product_img_num = $product_img_rs->num_rows;
              $img = array();



              ?>

              <div class="col-lg-5 fade-right col-12">
                <div class="row">
                  <div class="col-lg-2 col-3 ">
                    <div class="row">
                      <?php

                      if ($product_img_num != 0) {


                        for ($x = 0; $x < $product_img_num; $x++) {
                          $product_img_data = $product_img_rs->fetch_assoc();
                          $img[$x] = $product_img_data["path"];


                      ?>
                          <div class="col-12">
                            <img src="<?php echo $img["$x"]; ?>" id="productImg<?php echo $x; ?>" onclick="loadMainImg(<?php echo $x; ?>);" class="mb-3 rounded-1" style="width: 100%;" alt="">
                          </div>
                        <?php

                        }
                      } else {
                        ?>
                        <!-- <h1>asasda</h1> -->
                        <div class="col-12 ">
                          <img src="resouses/product/empty.svg" style="width: 100%;" alt="">
                        </div>
                        <div class="col-12">
                          <img src="resouses/product/empty.svg" style="width: 100%;" alt="">
                        </div>
                        <div class="col-12">
                          <img src="resouses/product/empty.svg" style="width: 100%;" alt="">
                        </div>
                      <?php

                      }


                      ?>


                    </div>
                  </div>
                  <div class="col-lg-10 col-9">
                    <div class="row">
                      <div class="col-12">

                        <div class="row  ">

                          <div class="main-img  " src="<?php echo $img[1]; ?>" id="main_img">
                            <div class="row " id="empty-img">
                              <div class="col-12">
                                <h1 class="text-center" style="margin-top: 30px; font-size: 200px;"><i class="bi bi-camera"></i></h1>
                              </div>
                            </div>
                          </div>
                        </div>



                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" mx-lg-5 col-12 col-lg-6 fade-left " >
                <div class="row justify-content-center mx-2">
                  <div class="col-11 border-bottom ">
                    <div class="row border-bottom border-dark mb-3">
                      <h4 class="fw-bold"><?php echo $product_data["title"]; ?></h4>
                      
                    </div>

                    <div class="row border-bottom border-dark mt-3 ">
                      <div class="col-12 my-2 mb-3">
                        <span class="badge">
                          <i class="bi bi-star-fill text-warning fs-5"></i>
                          <i class="bi bi-star-fill text-warning fs-5"></i>
                          <i class="bi bi-star-fill text-warning fs-5"></i>
                          <i class="bi bi-star-fill text-warning fs-5"></i>
                          <i class="bi bi-star-fill text-warning fs-5"></i>
                          &nbsp;&nbsp;
                          <label class=" rewive-star" data-bs-toggle="modal" data-bs-target="#star">4.5 Stars | 39 Reviews & Ratings</label>
                        </span>
                      </div>
                    </div>




                    <div class="row border-bottom border-dark mt-3">
                      <div class="col-4">
                        <?php

                        $conditon_rs = Database::search("SELECT * FROM `condition` WHERE `id`='" . $product_data["condition_id"] . "'");
                        $conditon_data = $conditon_rs->fetch_assoc();

                        ?>
                        <div class="row mb-3">
                          <h6 class="text-end">Condition : <?php echo $conditon_data["name"]; ?></h6>


                        </div>
                      </div>
                      <?php

                      if ($product_data["condition_id"] == '1') {
                        $c_rs = Database::search("SELECT * FROM `catogory` WHERE `id`='" . $product_data["catogory_id"] . "'");
                        $c_data = $c_rs->fetch_assoc();
                      ?>
                        <h6>1 YEARS WARRANTY INCLUDED!!! <?php echo $c_data["name"]; ?> ARE FULLY TESTED AND 100% FUNCTIONAL, CLEANED, AND READY TO USE!</h6>

                      <?php
                      } else {
                        $c_rs = Database::search("SELECT * FROM `catogory` WHERE `id`='" . $product_data["catogory_id"] . "'");
                        $c_data = $c_rs->fetch_assoc();
                      ?>

                        <h6>1 MONTH WARRANTY INCLUDED!!! <?php echo $c_data["name"]; ?> ARE FULLY TESTED AND 100% FUNCTIONAL, CLEANED, AND READY TO USE!</h6>

                      <?php

                      }

                      ?>
                    </div>

                    <div class="row border-bottom border-dark">

                      <div class="col-2 mt-3 mb-3 ">
                        <div class="row">
                          <h6 class="text-end">Quntity :</h6>
                        </div>
                      </div>

                      <div class="col-2 mt-3 mb-3 ">
                        <div class="row">
                          <input type="text" value="<?php echo $product_data['qty']; ?>" id="availble_qty<?php echo $product_data["id"]; ?>" hidden>
                          <input type="number" value="1" min="1" onclick="cart_qty_update(<?php echo $product_data['id']; ?>);" onkeyup="cart_qty_update(<?php echo $product_data['id']; ?>);" id="qty_input<?php echo $product_data['id']; ?>">
                        </div>
                      </div>
                      <div class="col-8 mt-3 mb-3">
                        <div class="row">
                          <h5 class="col-3 text-end text-danger"><?php echo $product_data["qty"]; ?></h6>
                            <div class="col-6 text-start">: Item Availble</div>

                        </div>
                      </div>
                    </div>

                    <?php

                    $price = $product_data["price"];
                    $adding_price = ($price / 100) * 5;
                    $new_price = $price + $adding_price;
                    $differnt_price = $new_price - $price;
                    $percentage = ($differnt_price / $price) * 100;








                    ?>

                    <div class="row mt-3 border-bottom border-dark">
                      <div class="col-9">
                        <div class="row">
                          <h6 class="col-lg-5 col-12" style="text-decoration-line: line-through; color: red;">Rs : <?php echo ($new_price); ?> .00</h6>
                          <h4 class="col-lg-6 col-12 fw-bold" style=" color: black;">Rs : <?php echo ($price); ?> .00</h4>
                        </div>

                      </div>
                      <div class="col-lg-3 col-12">
                        <div class="row mt-2">
                          <h3 class="text-success"><?php echo ($percentage); ?>% OFF</h3>

                        </div>
                      </div>
                    </div>
                    <div class="col-12">

                      <div class="row mt-3 justify-content-center">
                        <div class="col-lg-3 col-12 m-2">
                          <div class="row justify-content-center">
                            <button class="btn btn-success rounded-4" style="font-size: 13px;" type="submit" id="payhere-payment" onclick="payNow(<?php echo $product_data['id']; ?>);">Buy now</button>

                          </div>
                        </div>

                        <div class="col-lg-3 col-12  m-2">
                          <div class="row justify-content-center">
                            <button class="btn btn-success rounded-4 " onclick="addCart('<?php echo $product_data['id']; ?>');" style="font-size: 13px;">Add To Cart </button>

                          </div>
                        </div>

                        <div class="col-lg-3 col-12 m-2">
                          <div class="row justify-content-center">
                            <button class="btn btn-success rounded-4" style="font-size: 13px;">Add To Watchlist</button>

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

    </section>
    <section style="margin-top: -50px;" class="z-in" >
      <div class="col-12 ">
        <div class="row m-5">
          <div class="col-5">
            <h4 class="fw-bold">Description</h4>
            <hr>
          </div>
          <div class="col-12">
            <h6><?php echo $product_data["description"]; ?></h6>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="col-12 fade-up" >
        <div class="row mx-5">
          <div class="col-5">
            <h4 class="fw-bold">Customer Feedback</h4>
            <hr>
          </div>
          <div class="col-12">

            <div class="row">
              <div class="col-12 col-lg-6 border-end border-dark">
                <div class="row">
                  <div class="col-6">
                    <?php
                    $feedback_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $product_data["id"] . "'");
                    $feedbak_num = $feedback_rs->num_rows;


                    ?>
                    <h4 class="text-success">FeedBack(<?php echo $feedbak_num; ?>)</h4>
                    <hr>

                  </div>
                  <div class="col-4 offset-2">
                    <div class="row justify-content-end">
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feedback">Add your Feedback</button>

                    </div>
                  </div>
                </div>
                <div class="col-12" style="overflow-y: scroll; overflow-y: hidden; overflow-x: hidden; height: 200px;">
                  <?php


                  for ($c = 0; $c < $feedbak_num; $c++) {
                    $feedback_data = $feedback_rs->fetch_assoc();

                    $user_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $feedback_data["user_email"] . "'");
                    $user_data = $user_rs->fetch_assoc();
                  ?>
                    <div class="row mt-1 mb-1">
                      <h5 class="text-decoration-underline fw-bold"><?php echo $user_data["fname"] . " " . $user_data["fname"]; ?></h5>
                      <h6><?php echo $feedback_data["text"]; ?></h6>
                      <hr>

                    </div>
                  <?php
                  }

                  ?>

                </div>
              </div>
              <div class="col-12 col-lg-6 ">
                <div class="row">

                  <!-- Star rating Process -->

                  <?php

                  $all_star_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $id . "'");
                  $all_star_num = $all_star_rs->num_rows;


                  if ($all_star_num != 0) {

                    // 5 Star

                    $fiveStar_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $id . "' AND `star_type_id`=5 ");
                    $fiveStar_num = $fiveStar_rs->num_rows;


                    $fiveStar_prasantage = ($fiveStar_num / $all_star_num) * 100;


                    // 5 Star

                    // four Star

                    $fourStar_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $id . "' AND `star_type_id`=4 ");
                    $fourStar_num = $fourStar_rs->num_rows;

                    $fourStar_prasantage = ($fourStar_num / $all_star_num) * 100;
                    // four Star


                    // Three Star

                    $ThreeStar_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $id . "' AND `star_type_id`=3 ");
                    $ThreeStar_num = $ThreeStar_rs->num_rows;

                    $threeStar_Prasantage = ($ThreeStar_num / $all_star_num) * 100;

                    // Three Star


                    // Two Star

                    $TwoStar_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $id . "' AND `star_type_id`=2 ");
                    $TwoStar_num = $TwoStar_rs->num_rows;

                    $twostar_prasantge = ($TwoStar_num / $all_star_num) * 100;

                    // Two Star


                    // One Star

                    $OneStar_rs = Database::search("SELECT * FROM `star` WHERE `product_id`='" . $id . "' AND `star_type_id`=1 ");
                    $OneStar_num = $OneStar_rs->num_rows;

                    $oneStar_prasantage = ($OneStar_num / $all_star_num) * 100;
                    // One Star


                  ?><?php

                  }

                    ?>


                  <!-- Star rating Process -->





                  <div class="col-12">

                    <div class="row">
                      <div class="col-3">
                        <h6>5 Star</h6>

                      </div>
                      <div class="col-9">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar" style="width: <?php echo $fiveStar_prasantage; ?>%"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <h6>4 Star</h6>

                      </div>
                      <div class="col-9">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar" style="width: <?php echo $fourStar_prasantage; ?>%"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <h6>3 Star</h6>

                      </div>
                      <div class="col-9">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar" style="width: <?php echo $threeStar_Prasantage; ?>%"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <h6>2 Star</h6>

                      </div>
                      <div class="col-9">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar" style="width: <?php echo $twostar_prasantge; ?>%"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3">
                        <h6>1 Star</h6>

                      </div>
                      <div class="col-9">
                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                          <div class="progress-bar" style="width: <?php echo $oneStar_prasantage; ?>%"></div>
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
    </section>
    <!-- product data area -->

    <!-- add FeedBack model -->

    <div class="modal fade" id="feedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-aos="zoom-in">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <h1 class="modal-title fs-5 " id="exampleModalLabel">Add Feedback</h1>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



          </div>
          <?php

          if (isset($_SESSION["u"])) {
            $user = $_SESSION["u"];
          ?>
            <h6>Your Name : <?php echo $user["fname"] . ' ' . $user["lname"]; ?></h6>
          <?php
          }

          ?>
          <div class="modal-body">
            <div class="col-12">
              <div class="row">
                <textarea name="" class="form-control" id="t" cols="30" rows="10"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addfeedback('<?php echo $product_data['id']; ?>');">Send Feedback</button>
          </div>
        </div>
      </div>
    </div>
    <!-- add FeedBack model -->


    <!-- add star model -->

    <div class="modal fade" id="star" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Star</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="col-12">

            <input type="text" class="star-text-model col-12 mx-1 text-white d-none" id="product_id" value="<?php echo $id ?>" disabled>

            <h6 class="mx-1 star-text-model "><?php echo $product_data["title"]; ?></h6>

          </div>
          <div class="modal-body">
            <div class="col-12">
              <div class="row">
                <h6 class="text-start">Give Star</h6>
                <hr>
              </div>
              <div class="row justify-content-center">
                <div class="col-10">
                  <div class="row justify-content-center">
                    <div class="col-2">
                      <div class="row justify-content-center" onclick="addstar(1);">
                        <i class="text-center bi bi-star-fill  star-model fs-4"></i>
                        <input type="text" value="1 Star" id="ab" class="star-text-model" disabled>
                      </div>

                    </div>

                    <div class="col-2">
                      <div class="row justify-content-center" onclick="addstar(2);">
                        <i class="text-center bi bi-star-fill  star-model fs-4"></i>


                        <input type="text" value="2 Star" id="ab" class="star-text-model" disabled>

                      </div>

                    </div>

                    <div class="col-2">
                      <div class="row justify-content-center" onclick="addstar(3);">
                        <i class="text-center bi bi-star-fill star-model fs-4"></i>

                        <input type="text" value="3 Star" id="ab" class="star-text-model" disabled>
                      </div>

                    </div>

                    <div class="col-2">
                      <div class="row justify-content-center" onclick="addstar(4);">
                        <i class="text-center bi bi-star-fill  star-model fs-4"></i>
                        <input type="text" value="4 Star" id="ab" class="star-text-model" disabled>
                      </div>

                    </div>

                    <div class="col-2">
                      <div class="row justify-content-center" onclick="addstar(5);">
                        <i class="text-center bi bi-star-fill  star-model fs-4"></i>
                        <input type="text" value="5 Star" id="ab" class="star-text-model" disabled>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 border-top mt-3">

                <div class="row">
                  <div class="col-3">
                    <h6>5 Star</h6>

                  </div>
                  <div class="col-9">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: <?php echo $fiveStar_prasantage; ?>%"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>4 Star</h6>

                  </div>
                  <div class="col-9">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: <?php echo $fourStar_prasantage; ?>%"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>3 Star</h6>

                  </div>
                  <div class="col-9">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: <?php echo $threeStar_Prasantage; ?>%"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>2 Star</h6>

                  </div>
                  <div class="col-9">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: <?php echo $twostar_prasantge; ?>%"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <h6>1 Star</h6>

                  </div>
                  <div class="col-9">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar" style="width: <?php echo $oneStar_prasantage; ?>%"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- add star model -->


  </section>








  <?php require "footer.php"; ?>


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
  <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

</body>


</html>