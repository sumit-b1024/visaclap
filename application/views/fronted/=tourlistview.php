<?php $this->load->view('template/header'); ?>

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
                           if(!empty($tourist->tourist_data)) {  $j=1;
                            foreach ($tourist->tourist_data as $key => $value) { 
                               if($value->all_image != ""){ 
                                $images = explode(",",$value->all_image);
                               }else{ 
                                $images = base_url()."assets/img/hotels/3.png";
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
                                            <h5 class="text-dark font-weight-900 hotel-title mb-1"><a href="<?= base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/".$value->meta_slug ?>"
                                                    class="text-dark"><?=$value->name ?></a>
                                                    <?php if($value->star > 0){ ?>
                                                    <span class="staricon bg-white">
                                                        <?php for($i=1;$value->star >= $i;$i++){ ?>
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
                                                        4.8
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="mt-4">
                                                <p class="hotel-details text-end text-color">8 nights, 2 adult</p>
                                                <h6 class="hotel-details text-end fw-bold text-dark">US$72</h6>
                                                <p class="hotel-details text-end text-color">+US$828 taxes and charges
                                                </p>
                                                <button class="btn kv-btn-primary hotel-details">
                                                    Book Now <i class="fa-solid fa-square-arrow-up-right"></i>
                                                </button>
                                                <a href="https://wa.me/?text=<?=$value->name ?>" target="_blank" class="btn kv-btn-primary hotel-details wats">
                                                <i class="fa-brands fa-whatsapp"></i>
                                                  </a>
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

    

  
  <?php $this->load->view('template/footer'); ?>

  