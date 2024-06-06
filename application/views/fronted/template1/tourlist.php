<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Document</title>
    <link href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/get.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/font.css">
    <link href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/gogleapi.css" rel="stylesheet" >
    <link href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/cloudflare.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/aos.css" >
    <link type="text/css" rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template1/style.css">
    <link rel="stylesheet" href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/slider/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/css/datepicker.css" >

</head>

<body class="m-0 border-0">
     <?php include('common/header.php') ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators text-center d-block">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                class="active text-white" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="text-white"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="text-white"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner rounded-0">
            <div class="carousel-item rounded-0 maincarousel active">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/img/downtown-4045036_1280.jpg"
                    class="d-block w-100 carousel-img" alt="..." style="height: 250px;">
                <div class="carousel-caption text-center text-white ">
                    <h5 class="text-white">First slide label</h5>
                    <p class="text-white">Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item rounded-0 maincarousel">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/img/burj-khalifa-2212978_1280.jpg"
                    class="d-block w-100 carousel-img" alt="..." style="height: 250px;">
                <div class="carousel-caption text-center text-white ">
                    <h5 class="text-white">Second slide label</h5>
                    <p class="text-white">Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item rounded-0 maincarousel">
                <img src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/img/dubai-1767540_1280.jpg"
                    class="d-block w-100 carousel-img" alt="..." style="height: 250px;">
                <div class="carousel-caption text-center text-white ">
                    <h5 class="text-white">Third slide label</h5>
                    <p class="text-white">Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-white" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon text-white" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section>
        <div class="container mt-3 content">
            <div class="row" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-dark ">Start your holiday today</h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-8 mt-4" data-aos="fade-up ">
                    <img src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/img/new-places-to-visit-header-v2.webp"
                        class=" zoom-out d-block carousel-img w-100 rounded" alt="...">
                </div>
                <div class="col-md-6 col-lg-4 mt-4 position-relative" data-aos="fade-up ">
                    <div class="card  cardtokyo h-100" style="padding-bottom: 30px;" data-aos="fade-up"
                        data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">

                        <div class="px-4 mt-2 py-0 mb-0">
                            <span><a href="" class="text-decoration-none text-info fw-bold mb-0">Sports <span
                                        class="dot">.</span></a></span>
                        </div>
                        <div class="px-4">
                            <p>
                            <h4 class="card-description card-content px-0 pb-3">New attractions to check out in Dubai
                            </h4>
                            Discover hot new openings and fresh experiences that you will love.
                            </p>
                        </div>
                        <div class="px-4 mb-3 mt-auto row">
                            <div class="col-6">
                                <button class="btn btn-secondary border-0 card-link">
                                    Read now >
                                </button>
                            </div>
                            <div class="col-6">
                                <button class=" like-btn-2 btn card-link  ">
                                    <i class="fa-regular fa-heart fa-2x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </section>

    <section class="swiper my-5">
        <div class="container" data-aos="fade-up " data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000"
            data-aos-easing="ease-in-out">
            <div class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                       <?php
                    if(!empty($places_data)) { $i = 1;
                    foreach ($places_data as $key => $value) { 
                        if($value->img_name == ""){
                                   $image = "https://cdn.pixabay.com/photo/2019/03/09/21/30/downtown-4045036_1280.jpg";
                                }else{
                                    $image = "http://".$_SERVER["HTTP_HOST"]."/visaclaptour/".$value->img_name; 
                                }
                        ?>    
                        <div class="card swiper-slide mb-2" data-aos="fade-up " data-aos-offset="200"
                            data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                            <div class="image-content pt-0">
                                <img class="sub-img zoom-out" src="<?php echo $image; ?>">
                            </div>
                            <h4 class="card-description card-content px-4"><?= $value->i_name ?></h4>
                            </p>
                        </div>
                      <?php } } ?>  
                        
                        <!-- <div class="card swiper-slide mb-2" data-aos="fade-up " data-aos-offset="200"
                            data-aos-delay="50">
                            <div class="image-content pt-0">
                                <img class="sub-img zoom-out" src="./assets/img/news-11.jpg">
                            </div>

                            <h4 class="card-description card-content px-4">When Two Wheels Are Better Than Four
                            </h4>
                            </p>
                        </div> -->
                    </div>
                </div>

                <div class="swiper-button-next swiper-navBtn d-lg-block d-md-block d-sm-block d-none"></div>
                <div class="swiper-button-prev swiper-navBtn d-lg-block d-md-block d-sm-block d-none"></div>
                <div class="swiper-pagination d-lg-none d-md-none d-sm-none d-block"></div>
            </div>
        </div>
        </div>


        </div>
    </section>

     <section id="gallery">
        <div class="container my-5">
            <div class="d-lg-flex d-md-flex d-sm-flex flex-nowrap" data-aos="fade-up " data-aos-offset="200"
                data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <ul data-aos="fade-up " data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000"
                    data-aos-easing="ease-in-out" class="nav nav-tabs flex-lg-column  flex-md-column flex-sm-column
                flex-lg-wrap flex-md-wrap flex-sm-wrap flex-nowrap tabs-header" id="myTab" role="tablist">
                    
                   
                    <?php  
                    if(!empty($category_data)) { $i = 1;
                         
                    foreach ($category_data as $key => $value) { 
                        $slug = str_replace(' ', '-', $value->name);
                        ?>
                    <li class="nav-item " role="presentation">
                        <button class="nav-link w-100 h-100 text-nowrap cursor-pointer position-relative  <?php echo ($i == 1) ? "active" : ""; ?>"
                            id="<?=$value->cat_slug?>-tab" data-bs-toggle="tab" data-bs-target="#<?=$value->cat_slug?>" type="button" role="tab"
                            aria-controls="" aria-selected="false"><?=$value->name?></button>
                    </li>
                    <?php $i++; } }?>
                </ul>
                <div class="tab-content ms-lg-3 ms-md-3 ms-sm-3 ms-0 mt-lg-0 mt-md-0 mt-sm-0 mt-3 w-100 "
                    id="myTabContent">
                    <?php  
                    if(!empty($tourist_data)) {  $j=1;
                    foreach ($tourist_data as $key => $value) { 
                        $slug = str_replace(' ', '-', $key);
                    ?>
                    <div class=" h-100 tab-pane fade show <?php echo ($j == 1) ? "active" : ""; ?>" id="<?php echo $slug ?>" role="tabpanel"
                        aria-labelledby="<?php echo $slug ?>-tab">
                        <div class="h-100 row align-items-center bg-light">
                            <h1 class="text-secondary"><?php echo $key; ?></h1>
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
                            <div class=" col-lg-4 col-md-4 col-sm-6 col-12 my-2 ">
                                <div class="card"></div>
                                <img src="<?=$image?>"
                                    alt="" class="rounded-4 gallery-image">
                            </div>
                                  
                            <?php  } } ?>
                            <a class="btn card-link " href="<?php echo base_url().$franhisurl.$value[0]->country_slug."/".$slug ?>" style="float: right;text-align: right;">View All</a>   
                        </div>
                                    
                     </div>
                     <?php  $j++; } } ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="latestpost">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-3">

                        <h5 class="featuredheader">Latest Posts </h5>
                        <hr>
                        <div class="latest-content" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                            data-aos-duration="1000" data-aos-easing="ease-in-out">
                            <div class="row">
                                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <div class="latestcontentimg" style="position: relative;">
                                        <img class="" src="./assets/img/news-13.jpg">

                                        <div class="social-service-icons">
                                            <div class="shareicon share">
                                                <a href=""><i class="fa-solid fa-share-nodes"
                                                        style="background-color:#007bff;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons fb">
                                                <a href=""><i class="fa-brands fa-facebook-f"
                                                        style="background-color:#3b5999;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons twitter">
                                                <a href=""> <i class="fa-brands fa-twitter"
                                                        style="background-color:#55acee;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons pint">
                                                <a href=""> <i class="fa-brands fa-pinterest-p"
                                                        style="background-color:#bd081c;color:white !important"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <a href="#">
                                        <span style="color: #5869DA !important;font-weight: 900;">Food</span> <span
                                            class="post-cat"></span>
                                    </a>

                                    <h5 class="text-dark font-weight-900 helpcontent"><a href=""
                                            class="text-dark">Helpful Tips for Working from Home as a Freelancer</a>
                                        <span class="staricon"><i class="fa-regular fa-star"></i></span>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">7 August</span>
                                        <span class="time-reading has-dot">11 mins read</span>
                                        <span class="post-by has-dot">3k views</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <div class="latestcontentimg" style="position: relative;">
                                        <img class="" src="./assets/img/cooking.jpg">

                                        <div class="social-service-icons">
                                            <div class="shareicon share">
                                                <a href=""><i class="fa-solid fa-share-nodes"
                                                        style="background-color:#007bff;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons fb">
                                                <a href=""><i class="fa-brands fa-facebook-f"
                                                        style="background-color:#3b5999;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons twitter">
                                                <a href=""> <i class="fa-brands fa-twitter"
                                                        style="background-color:#55acee;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons pint">
                                                <a href=""> <i class="fa-brands fa-pinterest-p"
                                                        style="background-color:#bd081c;color:white !important"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <a href="#">
                                        <span style="color: #09815C !important;font-weight: 900;">Cooking</span> <span
                                            class="post-cat"></span>
                                    </a>

                                    <h5 class="text-dark font-weight-900 helpcontent"><a href="" class="text-dark">10
                                            Easy Ways to Be Environmentally Conscious At Home </a>
                                        <span class="staricon"><i class="fa-regular fa-star"></i></span>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">27 SEP</span>
                                        <span class="time-reading has-dot">10 mins read</span>
                                        <span class="post-by has-dot">22k views</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <div class="latestcontentimg" style="position: relative;">
                                        <img class="" src="./assets/img/news-2.jpg">

                                        <div class="social-service-icons">
                                            <div class="shareicon share">
                                                <a href=""><i class="fa-solid fa-share-nodes"
                                                        style="background-color:#007bff;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons fb">
                                                <a href=""><i class="fa-brands fa-facebook-f"
                                                        style="background-color:#3b5999;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons twitter">
                                                <a href=""> <i class="fa-brands fa-twitter"
                                                        style="background-color:#55acee;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons pint">
                                                <a href=""> <i class="fa-brands fa-pinterest-p"
                                                        style="background-color:#bd081c;color:white !important"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <a href="#">
                                        <span style="color: #e38836 !important;font-weight: 900;">Cooking</span> <span
                                            class="post-cat"></span>
                                    </a>

                                    <h5 class="text-dark font-weight-900 helpcontent"><a href="" class="text-dark">My
                                            Favourite Comfies to Lounge in At Home</a>
                                        <span class="staricon"><i class="fa-regular fa-star"></i></span>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">7 August</span>
                                        <span class="time-reading has-dot">9 mins read</span>
                                        <span class="post-by has-dot">12k views</span>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <div class="latestcontentimg" style="position: relative;">
                                        <img class="" src="./assets/img/news-3.jpg">

                                        <div class="social-service-icons">
                                            <div class="shareicon share">
                                                <a href=""><i class="fa-solid fa-share-nodes"
                                                        style="background-color:#007bff;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons fb">
                                                <a href=""><i class="fa-brands fa-facebook-f"
                                                        style="background-color:#3b5999;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons twitter">
                                                <a href=""> <i class="fa-brands fa-twitter"
                                                        style="background-color:#55acee;color:white !important"></i></a>
                                            </div>
                                            <div class="social-icons pint">
                                                <a href=""> <i class="fa-brands fa-pinterest-p"
                                                        style="background-color:#bd081c;color:white !important"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                    data-aos-duration="1000" data-aos-easing="ease-in-out">
                                    <a href="#">
                                        <span style="color: #e3363e !important;font-weight: 900;">Travel</span> <span
                                            class="post-cat"></span>
                                    </a>

                                    <h5 class="text-dark font-weight-900 helpcontent"><a href="" class="text-dark">How
                                            to Give Your Space a Parisian-Inspired Makeover</a>
                                        <span class="staricon"><i class="fa-regular fa-star"></i></span>
                                    </h5>
                                    <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                        <span class="post-on">27 August</span>
                                        <span class="time-reading has-dot">12 mins read</span>
                                        <span class="post-by has-dot">23k views</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 mb-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                        data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <h5 class="featuredheader">Categories</h5>
                        <hr>
                        <div class="lastcomment-conent">
                            <div class="card sub-cards p-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                data-aos-duration="1000" data-aos-easing="ease-in-out">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="">
                                            <img src="./assets/img/news-11.jpg" alt="">
                                        </a>

                                    </div>
                                    <div class="ms-3">

                                        <strong>Entertainment</strong>

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                                            voluptatibus architecto tenetur expedita.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card sub-cards p-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                data-aos-duration="1000" data-aos-easing="ease-in-out">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="">
                                            <img src="./assets/img/thumb-2.jpg" alt="">
                                        </a>

                                    </div>
                                    <div class="ms-3">

                                        <strong>Lifestyle</strong>

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                                            voluptatibus architecto tenetur expedita.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card sub-cards p-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                data-aos-duration="1000" data-aos-easing="ease-in-out">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="">
                                            <img src="./assets/img/thumb-3.jpg" alt="">
                                        </a>

                                    </div>
                                    <div class="ms-3">

                                        <strong>Foody</strong>

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                                            voluptatibus architecto tenetur expedita.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card sub-cards p-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                data-aos-duration="1000" data-aos-easing="ease-in-out">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <a href="">
                                            <img src="./assets/img/thumb-1.jpg" alt="">
                                        </a>

                                    </div>
                                    <div class="ms-3">

                                        <strong>Travel Tips</strong>

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
                                        </p>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>
   
     <?php include('common/footer.php') ?>

     <script src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/slider/swiper-bundle.min.js"></script>
    <script src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/js/bootstrap.js"></script>

    <script src="<?php echo FRONTED_TEMPLATE; ?>/template1/second.js"></script>
    <script type="text/javascript" src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/js/cloud.js"></script>

    <script src="<?php echo FRONTED_TEMPLATE; ?>/template1/assets/js/aos.js"></script>
    <script>
        AOS.init();
    </script>



    <!-- End Example Code -->
</body>

</html>