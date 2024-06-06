<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/fronted/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fronted/swiper-bundle.min.css">
    <script src="<?php echo base_url(); ?>assets/fronted/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/fronted/main.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    

    <style>.wats{background-color: #09815c !important;}</style>
</head>

<body class="m-0 border-0">
   
<section id="carousel">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

            <div class="carousel-inner rounded-0">
                <div class="carousel-item maincarousel  rounded-0 active ">
                    <img src="https://cdn.pixabay.com/photo/2019/03/09/21/30/downtown-4045036_1280.jpg"
                        class="d-block w-100 carousel-img" alt="...">                   
                </div>
            </div>
        </div>

        </div>
    </section>
    <section>
        <div class="latestpost">
            <div class="container">
                <div class="row align-items-center">
                    
                    <hr class="my-2">
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 mb-3">                        
                        <div class="latest-content">
                            <?php 
                           if(!empty($tourdetail[0])) {  
                            
                               if($tourdetail[0]->all_image != ""){ 
                                $images = explode(",",$tourdetail[0]->all_image);
                               }else{ 
                                $images = base_url()."assets/3.png";
                               }

                            ?>
                            <div class="row">
                                <div class="col-md-4  my-auto">
                                    <div class="latestcontentimg position-relative my-auto h-100"
                                        style="position: relative;">

                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php if($tourdetail[0]->all_image != ""){
                                                    $i=0;
                                                foreach($images as $key=>$img){
                                                    $imagevalue = "http://".$_SERVER["HTTP_HOST"]."/visaclaptour/".$img; 
                                                 ?>
                                                <div class="carousel-item <?php echo ($i == 0) ? "active" : ""; ?>">
                                                    <img class="rounded-4" src="<?php echo $imagevalue ?>">
                                                </div>
                                                
                                                <?php $i++; } } else{ ?>    
                                                   <div class="carousel-item active">
                                                    <img class="rounded-4" src="<?php echo $images; ?>">
                                                </div>  
                                                <?php } ?>    
                                            </div>

                                            <?php  if($tourdetail[0]->all_image != ""){ ?>
                                                <button class="carousel-control-prev" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button"
                                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            <?php } ?>
                                        </div>
                                        <button
                                            class=" border-0 position-absolute rounded-circle bg-light top-0 end-0 mt-3 me-3">
                                            <i class=" fa-regular fa-heart text-secondary"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3" data-aos="fade-up">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <a href="#">
                                            </a>
                                            <h5 class="text-dark font-weight-900 hotel-title mb-1"><?=$tourdetail[0]->name?>
                                             	<?php if($tourdetail[0]->star > 0){ ?>
                                                    <span class="staricon bg-white">
                                                        <?php for($i=1;$tourdetail[0]->star >= $i;$i++){ ?>
                                                            <i class="fa-solid fa-star text-warning pe-1"></i>
                                                        <?php } ?>
                                                    </span>
                                                    <?php } ?>
                                                </p>
                                            </h5>
                                            <p class="hotel-details"><span class="text-color">Westminster Borough,
                                                    London</span> <a href=""
                                                    class="kv-text-primary text-decoration-underline">show on map</a>
                                                <br>
                                                
                                                <?php if($tourdetail[0]->all_things != ""){ 
                                                  $allthin = explode("==",$tourdetail[0]->all_things);
                                                  foreach($allthin as $keya=>$vala){  
                                                  ?>
                                                  <span class="text-dark"><?=$vala?></span> <br>
                                                <?php } } ?>
                                                
                                            </p>
                                            <p class="hotel-details text-success mb-1">
                                                <span class="fw-bold">Free cancellation</span> <br>
                                                <span class="fw-normal">You can cancel later, so lock in this great
                                                    price today.</span>
                                            </p>

                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <button class="bottom-btns mx-1">Breakfast</button>
                                                <button class="bottom-btns mx-1">WiFi</button>
                                                <button class="bottom-btns mx-1">Spa</button>
                                                <button class="bottom-btns">Bar</button>
                                            </div>
                                        </div>
                                        <div class="col-md-5 position-relative">
                                            <div class="row justify-content-between">
                                                <div class="col-6 px-0 row">
                                                    <div class="col-12 hotel-details text-color">Exceptional</div>
                                                    <div class="col-12 hotel-details text-color">3,014 reviews</div>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn kv-btn-primary hotel-details">
                                                        4.8
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="mt-4">
                                                <p class="hotel-details text-end text-color">8 nights, 2 adult</p>
                                                <h6 class="hotel-details text-end fw-bold text-dark">US$<?=$tourdetail[0]->price?></h6>
                                                <p class="hotel-details text-end text-color">+US$828 taxes and charges
                                                </p>
                                                <button class="btn kv-btn-primary hotel-details">
                                                    See Availability <i class="fa-solid fa-square-arrow-up-right"></i>
                                                </button>
                                                
                                                <?php if($franchisdetail[0]->watsapp_number != ""){ ?>
                                                <a href="https://wa.me/<?=$franchisdetail[0]->watsapp_number ?>/?text=<?=$value->name ?>" target="_blank" class="btn kv-btn-primary hotel-details wats">
                                                <i class="fa-brands fa-whatsapp"></i>
                                                  </a>
                                                <?php } ?>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php  }else{  ?>    
                            	<h3>Tourist Attraction Not Found</h3>
                            <?php } ?>	
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        </div>


    </section>

    
    <section>
        <div class="footer mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="aboutme" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                            data-aos-duration="1000" data-aos-easing="ease-in-out">
                            <div class="aboutme-content">
                                <h5>About Me</h5>
                                <div class="textwidgets">
                                    <p> Start writing, no matter what. The water does not flow until the faucet is
                                        turned on.</p>
                                    <p><strong>Address</strong><br>
                                        123 Main Street<br>
                                        New York, NY 1001</p>
                                    <p>Follow me</p>
                                    <ul class="ps-0">
                                        <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                                title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                                title="Facebook"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                                title="Facebook"><i class="fa-brands fa-pinterest"></i></a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 mb-3">
                        <div class="aboutme" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                            data-aos-duration="1000" data-aos-easing="ease-in-out">
                            <div class="aboutme-content">
                                <h5>Quick Link</h5>
                                <ul class="ps-0 font-small">
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                            title="Facebook">About me</a></li>
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                            title="Facebook">Help & Support</a></li>
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                            title="Facebook">Licensing Policy</a></li>
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                            title="Facebook">Refund Policy</a></li>
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                            title="Facebook">Hire me</a></li>
                                    <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                            title="Facebook">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="aboutme" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                            data-aos-duration="1000" data-aos-easing="ease-in-out" data-aos-duration="1000"
                            data-aos-easing="ease-in-out">
                            <div class="aboutme-content">
                                <h5>TagCloud</h5>
                                <div class="tagcloud">
                                    <a href="">Beautiful</a>
                                    <a href="">New York</a>
                                    <a href="">Droll</a>
                                    <a href="">Intimate</a>
                                    <a href="">Loving</a>
                                    <a href="">Travel</a>
                                    <a href="">Fighting</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="aboutme" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                            data-aos-duration="1000" data-aos-easing="ease-in-out">
                            <div class="aboutme-content">
                                <h5>NewsLetter</h5>
                                <p>Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                                <form class="form mt-4 w-100">
                                    <div class="d-flex flex-lg-row flex-md-row flex-sm-row flex-column">
                                        <input type="email" placeholder="Enter your email"
                                            class="form-control mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                                        <button class="btn text-white kv-btn-primary">Subscribe</button>

                                    </div>
                                    <div class="d-flex">
                                        <input class="w-auto" type="checkbox" style="width: 100%;"> I agree to the <span>terms &amp; conditions</span>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>







    <script src="<?php echo base_url(); ?>assets/fronted/index.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Example Code -->
</body>

</html>