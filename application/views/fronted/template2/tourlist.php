<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>VISA CLAP</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="<?php echo FRONTED_TEMPLATE; ?>/template2/css/googleapipoppins.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template2/font-awesome/css/all.min.css">

  <!-- Libraries Stylesheet -->
  <link href="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?php echo FRONTED_TEMPLATE; ?>/template2/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template2/css/second.css">

  <!-- CSS only -->
  <link href="<?php echo FRONTED_TEMPLATE; ?>/template2/css/bootstrap5.2.3.css" rel="stylesheet"
  integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- SWIPER.JS -->


  <link rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template2/css/swiper8.css" />

  <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/js/swiper8.js"></script>

  
  
</head>

<body>

  <!-- Navbar Start -->
  <?php include('common/header.php') ?>
  <!-- Navbar End -->

  <!-- Header Start -->
  <div class="container-fluid page-header p-0">
    <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/river-7489170_960_720.jpg" class="" alt="..."
    width="100%"  height="250px">
    <div class="container">
      <div class="d-flex flex-column align-items-center justify-content-center">

        <div class="d-inline-flex text-white">

        </div>
      </div>
    </div>
  </div>
  <!-- Header End -->

  <div class="container-fluid pb-5 mt-5 bg-color2">
    <div class="row g-0  position-relative">
      <div class="col-md-6 mb-md-0 p-md-4 col-lg-6 col-sm-12 col-12 img-hover-zoom img-hover-zoom--zoom-n-rotate">

        <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/hallstatt-7524006_960_720.jpg" class="w-100" alt="...">
      </div>
      <div class="col-md-4 col-lg-5 col-sm-12 col-12 p-4 ps-md-0 my-auto offset-md-1">
        <h3 class="text-prime text-uppercase text-center" style="letter-spacing: 5px;">New attractions to check out in
        Dubai</h3>
        <h4 CLASS="text-center">Discover hot new openings and fresh experiences that you will love.</h4>

        <button class=" button buttonHover success mx-auto my-auto"> Read Now</button>
        <button class=" button buttonHover success mx-auto"><i class="fa-solid fa-heart"></i></button>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-5">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
       <?php
       if(!empty($places_data)) { $i = 1;
        foreach ($places_data as $key => $value) { 
          if($value->img_name == ""){
           $image = "https://cdn.pixabay.com/photo/2019/03/09/21/30/downtown-4045036_1280.jpg";
         }else{
          $image = "http://".$_SERVER["HTTP_HOST"]."/visaclaptour/".$value->img_name; 
        }
        ?>  
        <div class="swiper-slide col-lg-3 col-md-3 col-sm-12 col-12">

          <div class="card " style="  box-shadow: 0 0 30px #CCCCCC;">
            <div class=" zoom">
              <img src="<?php echo $image; ?>" class="rounded-top "
              alt="..." height="100%">
            </div>

            <div class="card-body">
              <h5 class="card-title text-uppercase"><?= $value->i_name ?></h5>
              <!-- <p class="card-text">When two wheels are better than four</p> -->

            </div>
          </div>
        </div>
      <?php } } ?>


    </div>
  </div>

</div>
<div id="swipe" class="swiper-pagination"></div>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      520: {
        slidesPerView: 3,
      },
      950: {
        slidesPerView: 4,
      },
    }
  });
</script>

<!-- Destination Start -->
<div class="container-fluid py-5">
  <div class="container pt-5">
    <div class="text-center mb-3 ">

      <div id="tabsDiv " class="text-center tabsdivbtn">

       <?php  

       if(!empty($category_data)) { $i = 1;
        foreach ($category_data as $key => $value) { 
          $slug = str_replace(' ', '-', $value->name);
          ?>
          <button class="linkClass button buttonHover success " onclick="displayContent(event, '<?=$value->cat_slug?>')">
            <?=$value->name?>
          </button>
          <?php $i++; } }?>

         <!--  <button class="linkClass button buttonHover success" onclick="displayContent(event, 'mustsee')">
            MUST-SEE
          </button>

          <button class="linkClass button buttonHover success" onclick="displayContent(event, 'adventure')">
            ADVENTURE
          </button>
          <button class="linkClass button buttonHover success" onclick="displayContent(event, 'themepark')">
            THEME PARK
          </button>
          <button class="linkClass button buttonHover success" onclick="displayContent(event, 'food')">
            FOOD & DRINKS
          </button>
          <button class="linkClass button buttonHover success" onclick="displayContent(event, 'sights')">
            Sights & Attractions
          </button>
          <button class="linkClass button buttonHover success" onclick="displayContent(event, 'entertainment')">
            Entertainment
          </button> -->


        </div>
      </div>
      <?php  
      if(!empty($tourist_data)) {  $j=1;
        foreach ($tourist_data as $key => $value) { 
          $slug = str_replace(' ', '-', $key);
          ?>
          <div id="<?php echo $slug ?>" class="contentClass">
            <h3 class="text-center"><?php echo $key; ?></h3>

            <div class="row">
             <?php  
             if(!empty($value)) { 
              $e = 1;
              foreach ($value as $key1 => $data) { 
                if($data->img_name == ""){
                 $image = base_url()."assets/3.png";
               }else{
                $image = "http://".$_SERVER["HTTP_HOST"]."/visaclaptour/".$data->img_name; 
              }
              ?>
              <div class="col-lg-4 col-md-6 mb-4 col-sm-12 col-12">
                <div class="destination-item position-relative overflow-hidden mb-2">
                  <img class="img-fluid" src="<?=$image?>" alt="" style="height: 300px;">
                  <a class="destination-overlay text-white text-decoration-none">
                    <h5 class="text-white">United States</h5>
                    <span>100 Cities</span>
                  </a>
                </div>
              </div>
            <?php  } } ?>
            <br/>

          </div>
          <div class=" button buttonHover success mx-auto my-auto">
           <a class=" button buttonHover success mx-auto my-auto" href="<?php echo base_url().$franhisurl.$value[0]->country_slug."/".$slug ?>" >View All</a> 
         </div>
       </div>
       <?php  $j++; } } ?>

     </div></div>
     <!-- Destination end -->
     <script>
      <?php  if(!empty($category_data)) { ?>
        displayContent(event, '<?php echo $category_data[0]->cat_slug ?>');
      <?php } ?>  

      function displayContent(event, contentNameID) {

        let content =
        document.getElementsByClassName("contentClass");
        let totalCount = content.length;

        // Loop through the content class
        // and hide the tabs first
        for (let count = 0;
          count < totalCount; count++) {
          content[count].style.display = "none";
      }
      
      let links =
      document.getElementsByClassName("linkClass");
      totalLinks = links.length;
      
        // Loop through the links and
        // remove the active class
      for (let count = 0;
        count < totalLinks; count++) {
        links[count].classList.remove("active");
    }

        // Display the current tab
    document.getElementById(contentNameID)
    .style.display = "block";

        // Add the active class to the current tab
    event.currentTarget.classList.add("active");
  }</script>

  <div class="container">
    <h2 class="text-prime text-uppercase text-center" style="letter-spacing: 5px;">LATEST POST.</h2>
    <h4 class="text-center mb-3">CATEGORIES. &nbsp;</h4>
    <!-- CATAGORIES -->
    <div class="ag-offer-block">

      <div class="ag-format-container mt-4">
        <ul class="ag-offer_list">

          <li class="card ag-offer_item">
            <div class="ag-offer_visible-item pt-4">
              <div class="ag-offer_img-box">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/news-11.jpg" class="ag-offer_img rounded-circle mb-3" alt="" />
              </div>
              <div class="ag-offer_title mt-2 mt-2">
                Entertainment
              </div>
            </div>
            <div class="ag-offer_hidden-item">
              <p class="ag-offer_text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sunt quia quo.
              </p>
            </div>
          </li>
          <li class="card ag-offer_item">
            <div class="ag-offer_visible-item pt-4">
              <div class="ag-offer_img-box">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/thumb-2.jpg" class="ag-offer_img rounded-circle mb-3"  alt="" />
              </div>
              <div class="ag-offer_title mt-2">
                Lifestyle
              </div>
            </div>
            <div class="  ag-offer_hidden-item">
              <p class="ag-offer_text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sunt quia quo.
              </p>
            </div>
          </li>
          <li class=" card ag-offer_item">
            <div class="ag-offer_visible-item pt-4">
              <div class="ag-offer_img-box">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/thumb-3.jpg" class="ag-offer_img rounded-circle mb-3" alt="" />
              </div>
              <div class="ag-offer_title mt-2">
                Foody
              </div>
            </div>
            <div class="ag-offer_hidden-item">
              <p class="ag-offer_text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sunt quia quo.
              </p>
            </div>
          </li>
          <li class="card ag-offer_item">
            <div class="ag-offer_visible-item pt-4">
              <div class="ag-offer_img-box">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/thumb-1.jpg" class="ag-offer_img rounded-circle mb-3" alt="" />
              </div>
              <div class="ag-offer_title mt-2">
                Travel Tips
              </div>
            </div>
            <div class="ag-offer_hidden-item">
              <p class="ag-offer_text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sunt quia quo.
              </p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row g-4">


      <!-- <div class="row row-cols-1 row-cols-md-2 g-4"> -->
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="d-flex position-relative">
            <div class="row g-0">
              <div class="col-md-6">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/news-13.jpg"
                class="img-fluid rounded mb-3" alt="..." >
              </div>
              <div class="col-md-6">
                <div class="card-body ms-3">
                  <h6 class="card-title text-uppercase text-info">FOOD .</h6>
                  <p class="card-title text-uppercase"><strong> Helpful Tips for Working from Home as a
                  Freelancer</strong></p>
                  <p class="card-text"><small class="text-muted">
                    <span class="footerText">7 August</span>
                    <span class="footerText">11 mins read</span>
                    <span class="footerText">3k views</span></small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="d-flex position-relative">
              <div class="row g-0">
                <div class="col-md-6">
                  <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/news-4.jpg"
                  class="img-fluid rounded mb-3" alt="...">
                </div>
                <div class="col-md-6">
                  <div class="card-body ms-3">
                    <h6 class="card-title text-uppercase text-success">COOKING .</h6>
                    <p class="card-title text-uppercase"><strong>10 Easy Ways to Be Environmentally Conscious At
                    Home</strong> </p>
                    <p class="card-text"><small class="text-muted"> <span class="footerText">27 Sep</span>
                      <span class="footerText">10 mins read</span>
                      <span class="footerText">22k views</span></small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="d-flex position-relative">

                <div class="row g-0">
                  <div class="col-md-6">
                    <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/news-2.jpg"
                    class="img-fluid rounded mb-3" alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body ms-3">
                      <h6 class="card-title text-uppercase text-warning">COOKING .</h6>
                      <p class="card-title text-uppercase"><strong>My Favorite Comfies to Lounge in At Home</strong></p>
                      <p class="card-text"><small class="text-muted"><span class="footerText">7 August</span>
                        <span class="footerText">9 mins read</span>
                        <span class="footerText">12k views</span></small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="d-flex position-relative">
                  <div class="row g-0">
                    <div class="col-md-6">
                      <img src="<?php echo FRONTED_TEMPLATE; ?>/template2/img/news-3.jpg"
                      class="img-fluid rounded mb-3" alt="...">
                    </div>
                    <div class="col-md-6">
                      <div class="card-body ms-3">
                        <h6 class="card-title text-uppercase text-danger">TRAVEL .</h6>
                        <p class="card-title text-uppercase"><strong> To Give Your Space a Parisian-Inspired Makeover</strong>
                        </p>
                        <p class="card-text"><small class="text-muted"> <span class="footerText">27 August</span>
                          <span class="footerText">12 mins read</span>
                          <span class="footerText">23k views</span></small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- ---------------- -->

            </div>

            <!-- Footer Start -->
            <?php include('common/footer.php') ?>
            <!-- Footer End -->



            <!-- JavaScript Libraries -->
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/js/jquery3.4.1.js"></script>
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/js/bootstrap4.4.1.js"></script>
            <!-- //down// -->
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/easing/easing.min.js"></script>
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/tempusdominus/js/moment.min.js"></script>
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/js/swiper2.js"></script>

            <script src="<?php echo FRONTED_TEMPLATE; ?>/template2/js/main.js"></script>



          </body>

          </html>