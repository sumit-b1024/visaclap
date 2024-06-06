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

    <style>
.rating {
  font-size: 24px;
  color: gold;
}

.rating .fas.fa-star {
  position: relative;
}

.rating .fas.fa-star::before {
  content: "\f005";

  top: 0;
  left: 0;
  overflow: hidden;
  width: 50%;
}

.rating .fas.fa-star-half-alt::before {
  content: "\f089";
  
  top: 0;
  left: 0;
  overflow: hidden;
  width: 50%;
  color: gold;
}
</style>

</head>

<body class="m-0 border-0">
    <!-- Example Code -->
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <nav class="navbar sticky-top navbar-expand-xl bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold ms-3" href="#">
                    	<?php if($franchisdetail[0]->logo != ""){ ?>
                    		<img src="<?php echo base_url().$franchisdetail[0]->logo ?>" width="50" height="60" />
                    	<?php }else{ ?>	
                    		LOGO
                    	<?php } ?>	
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse-md navbar-collapse-sm navbar-collapse"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item  my-auto">
                                <a class="nav-link active" aria-current="page" href="#">
                                    <button class="btn px-1 shadow-none nav-button">
                                        <i class="fa-solid fa-house-chimney pe-0"></i> Home
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item  my-auto py-2">
                                <div class="dropdown">
                                    <button class="btn px-2 bg-light nav-button dropdown-toggle shadow-none my-auto"
                                        type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                        aria-expanded="false">
                                        Free Zone Companies
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-6">Option 1</div>
                                                    <div class="col-6 text-end"> &rsaquo;</div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Option 3</a></li>
                                                <li><a class="dropdown-item" href="#">Option 4</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-6">Option 2</div>
                                                    <div class="col-6 text-end"> &rsaquo;</div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">


                                                <li>
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 3</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="#">Option 4
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-6">Option 3</div>
                                                    <div class="col-6 text-end"> &rsaquo;</div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">

                                                <li>
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 4
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item  my-auto py-2">
                                <div class="dropdown">
                                    <button class="btn px-2 bg-light nav-button dropdown-toggle shadow-none my-auto"
                                        type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                        aria-expanded="false">
                                        USA Food
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-6">Option 1</div>
                                                    <div class="col-6 text-end"> &rsaquo;</div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 3</a>
                                                </li>

                                                <li>
                                                    <a class="dropdown-item" href="#">Option 4</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-6">Option 2</div>
                                                    <div class="col-6 text-end"> &rsaquo;</div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 2</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 3</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <div class="row">
                                                    <div class="col-6">Option 3</div>
                                                    <div class="col-6 text-end"> &rsaquo;</div>
                                                </div>
                                            </a>
                                            <ul class="dropdown-menu dropdown-submenu">

                                                <li>
                                                    <a class="dropdown-item" href="#">Option 1</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Option 4
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item  my-auto">
                                <a class="nav-link " aria-current="page" href="#">
                                    <button class="btn px-1 nav-button shadow-none">
                                        About
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item  my-auto">
                                <a class="nav-link " aria-current="page" href="#">
                                    <button class="btn px-1 nav-button shadow-none">
                                        Contact
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item  my-auto">
                                <a class="nav-link " aria-current="page" href="#">
                                    <button class="btn px-1 nav-button shadow-none">
                                        Privacy Policy
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item  my-auto">
                                <a class="nav-link " aria-current="page" href="#">
                                    <button class="btn px-1 nav-button  shadow-none">
                                        Call on 1234567890
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item  my-auto">
                                <button class=" btn px-1 bg-light nav-button shadow-none collapsed"
                                    onclick="expandCollapseExpansionPanel()" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <i class="fa-solid fa-magnifying-glass me-2"></i>Search
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="collapseTwo" class="accordion-collapse collapse h-100" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h1 class="text-center text-secondary my-3">SEARCH</h1>
                            <div class="input-group mt-3">
                                <input type="text" class="form-control border-0 "
                                    placeholder="Search stories, places and people"
                                    aria-label="Search stories, places and people" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text border-0 " id="basic-addon2">
                                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                                    </span>
                                </div>
                            </div>
                            <hr class="border-4 border-dark my-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
  <div class="clearfix" ></div>
  

    <style>.wats{background-color: #09815c !important;}</style>
<link rel="stylesheet" href="<?= base_url(); ?>assets/slider/swiper-bundle.min.css">
    <script src="<?= base_url(); ?>assets/slider/swiper-bundle.min.js"></script>

  
  <div class="clearfix" ></div>
  
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
                    <div class="col-md-12 col-lg-4 row align-items-center">
                        <div class="col-12 my-auto">
                            <h5 class="featuredheader mb-0">Filters</h5>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8  row align-items-center">
                        <div class="col-6 my-auto">
                            <h5 class="featuredheader mb-0 ">3,269 properties in Europe Latest Posts</h5>
                        </div>
                        <div class="col-6 text-end">
                                <button class="btn kv-btn-primary rounded-pill mb-3">
                                    <i class="fa-solid fa-arrow-up"></i>
                                    <i class="fa-solid fa-arrow-down"></i>
                                    Top picks for your search</button>
                        </div>
                        
                    </div>
                    <hr class="my-2">
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-4 mb-3">
                        <nav class="navbar navbar-expand-lg  bg-light flex-column">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#applyfilters" aria-controls="applyfilters"  aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                          
                            <div class="collapse navbar-expand-lg navbar-collapse-md navbar-collapse-sm navbar-collapse flex-column" id="applyfilters">
                              <ul class="navbar-nav mr-auto flex-column">
                                  <div class="lastcomment-conent">
                                      <div class=" p-3" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                                          data-aos-duration="1000" data-aos-easing="ease-in-out">
          
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3">
          
                                                  <strong class="text-dark mb-3 fw-bold mt-2">Search by property name
                                                  </strong>
          
                                                  <div class="input-group mb-4 mt-2 border border-1">
                                                      <div class="input-group-prepend">
                                                          <span class="input-group-text border-0" id="basic-addon1">
                                                              <i class="fa-solid fa-search text-dark"></i>
                                                          </span>
                                                      </div>
                                                      <input type="text" class="shadow-none form-control border-0 "
                                                          placeholder="e.g. Best Western" aria-label="Username"
                                                          aria-describedby="basic-addon1">
                                                  </div>
                                                  <hr class="my-2">
                                              </div>
                                          </div>
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3">
          
                                                  <strong class="text-dark mb-3 fw-bold">Deals
                                                  </strong>
          
                                                  <div class="form-check mt-3">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                          Free cancellation </label>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                          Reserve now, pay at stay
                                                      </label>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                          Properties with special offers
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold"> Popular Filters
                                                  </strong>
          
                                                  <div class="form-check mt-2">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Breakfast Included
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Romantic
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Airport Transfer
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              WiFi Included
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              5 Star
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
          
                                          <div class="d-flex align-items center">
                                              <div class="ms-3">
                                                  <label class="form-label text-dark" for="customRange1">Nightly Price</label>
                                                  <div class="range mt-2">
                                                      <input type="range" class="form-range" id="customRange1" />
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
          
          
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold"> Amenities
                                                  </strong>
          
                                                  <div class="form-check mt-2">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Breakfast Included
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Wifi Included
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Pool
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Restaurant </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Air conditioning
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold mt-2"> Star Rating
          
                                                  </strong>
          
                                                  <div class="d-flex mt-2">
                                                      <button class="btn star-btn rounded-pill btn-secondary me-1">1</button>
                                                      <button class="btn star-btn rounded-pill kv-btn-primary me-1">2</button>
                                                      <button class="btn star-btn rounded-pill btn-secondary me-1">3</button>
                                                      <button class="btn star-btn rounded-pill btn-secondary me-1">4</button>
                                                      <button class="btn star-btn rounded-pill btn-secondary me-1">5</button>
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
          
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold mt-2"> Guest Rating
          
                                                  </strong>
                                                  <div class="form-check mt-2">
                                                      <input class="form-check-input" type="radio" name="exampleRadios"
                                                          id="exampleRadios1" value="option1" checked>
                                                      <label class="form-check-label" for="exampleRadios1">
                                                          Any
                                                      </label>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="exampleRadios"
                                                          id="exampleRadios2" value="option2">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="exampleRadios2">
                                                              Wonderful 4.5+
                                                          </label>
                                                          <label class="form-check-label" for="exampleRadios2">
                                                              245
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="exampleRadios"
                                                          id="exampleRadios2" value="option2">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="exampleRadios2">
                                                              Very good 4+
                                                          </label>
                                                          <label class="form-check-label" for="exampleRadios2">
                                                              24
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="radio" name="exampleRadios"
                                                          id="exampleRadios2" value="option2">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="exampleRadios2">
                                                              Good 3.5+
                                                          </label>
                                                          <label class="form-check-label" for="exampleRadios2">
                                                              24 </label>
                                                      </div>
                                                  </div>
          
          
          
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold"> Amenities
                                                  </strong>
          
                                                  <div class="form-check mt-2">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Breakfast Included
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Wifi Included
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Pool
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Restaurant </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Air conditioning
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold"> Neighborhood
          
                                                  </strong>
          
                                                  <div class="form-check mt-2">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Central London
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Guests' favourite area
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Westminster Borough
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Kensington and Chelsea
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Oxford Street
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <hr>
                                          <div class="d-flex align-items-center">
                                              <div class="ms-3 w-100">
          
                                                  <strong class="text-dark mb-3 fw-bold"> Style
          
                                                  </strong>
          
                                                  <div class="form-check mt-2">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Budget
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Mid-range
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Luxury
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Family-friendly
          
                                                          </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                      <div class="d-flex justify-content-between">
          
                                                          <label class="form-check-label" for="defaultCheck1">
                                                              Business </label>
                                                          <label>
                                                              23
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                          
                              </ul>                             
                            </div>
                          </nav>
                    </div>
                    <div class="col-md-12 col-lg-8 mb-3">                        
                        <div class="latest-content">
                            <?php   
                           if(!empty($tourist_data)) {  $j=1;  
                            foreach ($tourist_data as $key => $value) { 
                               if($value->all_image != ""){ 
                                $images = explode(",",$value->all_image);
                               }else{ 
                                $images = base_url()."assets/3.png";
                               }
                               if($franchisdetail[0]->markup != ""){
                                $price = ($value->price+(($value->price* $franchisdetail[0]->markup)/100));
                               }else{
                                $price = $value->price;
                               }
                               
                            ?>
                            <div class="row">
                                <div class="col-md-4  my-auto">
                                    <div class="latestcontentimg position-relative my-auto h-100"
                                        style="position: relative;">

                                        <div id="carouselExampleControls" class="carousel slide"
                                            data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                <?php if($value->all_image != ""){
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

                                            <?php  if($value->all_image != ""){ ?>
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
                                            <h5 class="text-dark font-weight-900 hotel-title mb-1"><a href="<?= base_url().$franhisurl.$value->meta_slug ?>"
                                                    class="text-dark"><?=$value->name ?></a>
                                                    <!-- <?php if($value->star > 0){ ?>
                                                    <span class="staricon bg-white">
                                                        <?php for($i=1;$value->star >= $i;$i++){ ?>
                                                            <i class="fa-solid fa-star text-warning pe-1"></i>
                                                        <?php } ?>
                                                    </span>
                                                    <?php } ?> -->
                                                    <div class="rating">
                                                    <?php 
                                                    $rating = $value->star;
                                                   for ($i = 1; $i <= 5; $i++) {
    if ($i <= ceil($rating)) {
      // Full star
      echo '<span class="fas fa-star"></span>';
   } elseif ($i == floor($rating)) {
      // Half star
      echo '<span class="far fa-star-half-alt"></span>';
    } else {
      // Empty star
      echo '<span class="far fa-star"></span>';
    }
  }
                 ?>                              </div> </p>
                                            </h5>
                                            <p class="hotel-details"><span class="text-color">Westminster Borough,
                                                    London</span> <a href=""
                                                    class="kv-text-primary text-decoration-underline">show on map</a>
                                                <br>
                                                <?php if($value->all_things != ""){ 
                                                  $allthin = explode("==",$value->all_things);
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
                                                        <?=$value->star?>
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="mt-4">
                                                <p class="hotel-details text-end text-color">8 nights, 2 adult</p>
                                                <h6 class="hotel-details text-end fw-bold text-dark">US$<?=$price ?></h6>
                                                <p class="hotel-details text-end text-color">+US$828 taxes and charges
                                                </p>
                                                <button class="btn kv-btn-primary hotel-details">
                                                    Book Now <i class="fa-solid fa-square-arrow-up-right"></i>
                                                </button>
                                                <?php if($franchisdetail[0]->watsapp_number != ""){ ?>
                                                <a href="https://wa.me/<?=$franchisdetail[0]->watsapp_number ?>/?text=<?=$value->name ?>" target="_blank" class="btn kv-btn-primary hotel-details wats">
                                                <i class="fa-brands fa-whatsapp"></i>
                                                  </a>
                                                <?php } ?>  
                                                  <!--window.open( "https://wa.me/"+data.mobile_no+"/?text=" + data.content, '_blank'); -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php  } }else{ ?>
                                <h3>Not Found</h3>
                            <?php } ?>    
                            
                        </div>
                    </div>
                </div>
                <hr>
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