<?php
require_once 'pdo.php';
session_start();
if(!isset($_REQUEST['itemid']) || strlen($_REQUEST['itemid'])==0)
{
  header("Location: index.php");
}
if(isset($_POST['cart']))
{
  if(!isset($_SESSION['user_id']))
  {
    header("Location: login.php");
  }
  $stmt = $pdo->prepare('SELECT * FROM cart  WHERE item_id=:id AND user_id = :uid');
  $stmt->execute(array(':id' => $_POST['itemid'], ':uid'=> $_SESSION['user_id']));
  $row= $stmt-> fetch(PDO::FETCH_ASSOC);
  if($row==false)
  {
    $stmt = $pdo->prepare('INSERT INTO cart (item_id,user_id,quantity, price) VALUES
     (:iid,:uid, :qu, :pr)');
     $stmt->execute(array(':iid' => $_POST['itemid'],
                          ':uid'=> $_SESSION['user_id'],
                          'qu' => $_POST['quantity'],
                          'pr'=> $_POST['quantity'] * $_POST['rate']));
  }
  else
  {
    $stmt = $pdo->prepare('UPDATE cart SET quantity=:qu, price=:pr WHERE user_id = :uid AND item_id = :iid');
    $stmt->execute(array(
      ':iid' => $_POST['itemid'],
     ':uid'=> $_SESSION['user_id'],
     'qu' => $_POST['quantity'],
     'pr'=> $_POST['quantity'] * $_POST['rate']));
  }
}
if(isset($_POST['wish']))
{
  if(!isset($_SESSION['user_id']))
  {
    header("Location: login.php");
  }
  $stmt = $pdo->prepare('SELECT * FROM wishlist  WHERE item_id=:id AND user_id = :uid');
  $stmt->execute(array(':id' => $_POST['itemid'], ':uid'=> $_SESSION['user_id']));
  $row= $stmt-> fetch(PDO::FETCH_ASSOC);
  if($row==false)
  {
    $stmt = $pdo->prepare('INSERT INTO wishlist (item_id,user_id) VALUES
     (:iid,:uid)');
     $stmt->execute(array(':iid' => $_POST['itemid'],
                          ':uid'=> $_SESSION['user_id']));
  }
}
?>
<!doctype html>
<html lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>eCommerce HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">

        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- extra added by rishav -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
        integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

</head>


<body>

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
                <div class="header-top top-bg d-none d-lg-block">
                   <div class="container-fluid">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left d-flex">
                                    <div class="flag">
                                        <img src="assets/img/icon/header_icon.png" alt="">
                                    </div>
                                    <div class="select-this">
                                        <form action="#">
                                            <div class="select-itms">
                                                <select name="select" id="select1">
                                                    <option value="">USA</option>
                                                    <option value="">SPN</option>
                                                    <option value="">CDA</option>
                                                    <option value="">USD</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="contact-now">
                                        <li>+777 2345 7886</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                   <ul>
                                       <li><a href="login.php">My Account </a></li>
                                       <li><a href="wishlist.php">Wish List  </a></li>
                                       <li><a href="cart.php">Shopping</a></li>
                                       <li><a href="cart.php">Cart</a></li>
                                       <li><a href="checkout.html">Checkout</a></li>
                                   </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="Catagori.html">Catagori</a></li>
                                            <li class="hot"><a href="#">Latest</a>
                                                <ul class="submenu">
                                                    <li><a href="wishlist.php"> Product list</a></li>
                                                    <li><a href="single-product.html"> Product Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="single-blog.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="login.php">Login</a></li>
                                                    <li><a href="cart.php">Card</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                    <li><a href="about.html">About</a></li>
                                                    <li><a href="confirmation.html">Confirmation</a></li>
                                                    <li><a href="cart.php">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Product Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <input type="text" id = "search_bar" name="Search" placeholder="Search products">
                                            <button class="search-icon" style="background-color:white; border: none;"onclick="if(searchValidate()) {location.href =
                                              'search_list.php?term='+document.getElementById('search_bar').value;}">
                                              <i class="fas fa-search special-tag"></i>
                                            </button>
                                        </div>
                                     </li>
                                    <li class=" d-none d-xl-block">
                                        <div class="favorit-items">
                                            <a href="wishlist.php"><i class="far fa-heart"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </li>
                                   <li class="d-none d-lg-block"> <?php
                                        if(isset($_SESSION['user_id'])){
                                          echo ("<a href=\"logout.php\" class=\"btn header-btn\">Logout</a>");
                                        }
                                        else{
                                          echo ("<a href=\"login.php\" class=\"btn header-btn\">Sign in</a>");
                                        }
                                         ?></li>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/hero/category.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

  <!--================Single Product Area =================-->
  <?php
  $stmt = $pdo->prepare('SELECT * FROM items  WHERE item_id=:id');
  $stmt->execute(array(':id' => $_REQUEST['itemid']));
  $item= $stmt-> fetch(PDO::FETCH_ASSOC);

  $stmt = $pdo->prepare('SELECT img_id FROM images_of_items  WHERE item_id=:iid');
  $stmt->execute(array(':iid' => $_REQUEST['itemid']));
  $images = array();
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    $images[] = $row;
  }
   ?>
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
              <?php
                for($k=0; $k<sizeof($images); $k++)
                {
                  $stmt = $pdo->prepare('SELECT img_name FROM images  WHERE img_id=:iid');
                  $stmt->execute(array(':iid' => $images[$k]['img_id']));
                  $img= $stmt-> fetch(PDO::FETCH_ASSOC);
                  echo("<div class=\"single_product_img\">
                  <img src=\"product_images/".$img['img_name']."\" alt=\"#\" class=\"img-fluid\">
                  </div>");
                }
               ?>
            <!-- <div class="single_product_img">
              <img src="assets/img/product/single_product.png" alt="#" class="img-fluid">
            </div>
            <div class="single_product_img">
              <img src="assets/img/product/single_product.png" alt="#" class="img-fluid">
            </div> -->
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3><?php echo $item['name'] ?></h3>
            <p>
                <!-- Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness. Credibly innovate granular internal or organic sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal networks. -->
                <!-- description of product can be added in the item table and displayed once you have data -->
            </p>
            <div class="card_area">
              <form method="post" action = "single-product.php">
                <div class="product_count_area">
                    <p>Quantity:
                    <div class="product_count d-inline-block">
                        <button class="minus-btn" name="button" style="background-color: white; border:none"> <i class="ti-minus" style="color: black"></i></button>
                        <input type="text" name="quantity" size="1" value="1" min="1" max="1000">
                        <button class="plus-btn" name="button" style="background-color: white; border:none"> <i class="ti-plus" style="color: black"></i></button>
                    </div></p>
                  <p>Price for each: $<?php echo $item['price'];?></p>
                </div>
                <input type="hidden" class="btn_3" name ="itemid" value="<?php echo $item['item_id']; ?>">
                <input type="hidden" class="btn_3" name ="rate" value="<?php echo $item['price']; ?>">
              <div class="add_to_cart">
                  <input type="submit" class="btn_3" name ="cart" value="add to cart">
              </div>
            </form>
            <form method="post" action = "single-product.php">
              <input type="hidden" class="btn_3" name ="itemid" value="<?php echo $item['item_id']; ?>">
              <div class="add_to_cart">
                  <input type="submit" class="btn_3" name ="wish" value="add to wishlist">
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--================End Single Product Area =================-->
   <!-- subscribe part here -->
   <section class="subscribe_part section_padding">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="subscribe_part_content">
                      <h2>Get promotions & updates!</h2>
                      <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                      <div class="subscribe_form">
                          <input type="email" placeholder="Enter your mail">
                          <a href="#" class="btn_1">Subscribe</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- subscribe part end -->

  <footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                   <div class="single-footer-caption mb-50">
                     <div class="single-footer-caption mb-30">
                          <!-- logo -->
                         <div class="footer-logo">
                             <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                         </div>
                         <div class="footer-tittle">
                             <div class="footer-pera">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
                            </div>
                         </div>
                     </div>
                   </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Offers & Discounts</a></li>
                                <li><a href="#"> Get Coupon</a></li>
                                <li><a href="#">  Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>New Products</h4>
                            <ul>
                                <li><a href="#">Woman Cloth</a></li>
                                <li><a href="#">Fashion Accessories</a></li>
                                <li><a href="#"> Man Accessories</a></li>
                                <li><a href="#"> Rubber made Toys</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                             <li><a href="#">Frequently Asked Questions</a></li>
                             <li><a href="#">Terms & Conditions</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                             <li><a href="#">Report a Payment Issue</a></li>
                         </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row">
             <div class="col-xl-7 col-lg-7 col-md-7">
                 <div class="footer-copy-right">
                     <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                    </div>
             </div>
              <div class="col-xl-5 col-lg-5 col-md-5">
                 <div class="footer-copy-right f-right">
                     <!-- social -->
                     <div class="footer-social">
                         <a href="#"><i class="fab fa-twitter"></i></a>
                         <a href="#"><i class="fab fa-facebook-f"></i></a>
                         <a href="#"><i class="fab fa-behance"></i></a>
                         <a href="#"><i class="fas fa-globe"></i></a>
                     </div>
                 </div>
             </div>
         </div>
        </div>
    </div>

    <!-- Footer End-->
  </footer>

<!-- JS here -->
<script>
// $('.like-btn').on('click', function() {
// $(this).toggleClass('is-active');
// });
$('.minus-btn').on('click', function(e) {
e.preventDefault();
var $this = $(this);
var $input = $this.closest('div').find('input');
var value = parseInt($input.val());

if (value >1) {
value = value - 1;
} else {
value = 0;
}

$input.val(value);

});

$('.plus-btn').on('click', function(e) {
e.preventDefault();
var $this = $(this);
var $input = $this.closest('div').find('input');
var value = parseInt($input.val());

if (value < 100) {
value = value + 1;
} else {
value =100;
}

$input.val(value);
});
</script>
<script>
function searchValidate() {
    console.log('Validating Search...');
    try {
        val = document.getElementById('search_bar').value;
        console.log("Validating term="+val);
        if (val == "") {
            alert("Please enter the search term");
            return false;
        }
        else
          return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>
        <!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>

        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>

        <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

        <!-- Jquery Plugins, main Jquery -->
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

        <!-- swiper js -->
        <script src="./assets/js/swiper.min.js"></script>
            <!-- swiper js -->
        <script src="./assets/js/mixitup.min.js"></script>
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>


</body>

</html>
