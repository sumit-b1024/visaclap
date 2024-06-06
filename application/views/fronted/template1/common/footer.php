<section>
        <div class="footer mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-3">
                        <div class="aboutme">
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
                                       <?php if($franchisdetail[0]->facebook != ""){ ?>
                  <li class="list-inline-item"><a class="fb" href="<?php echo $franchisdetail[0]->facebook ?>" target="_blank" title="Facebook"><i
                        class="fa-brands fa-facebook"></i></a></li>
                  <?php } ?>
                  <?php if($franchisdetail[0]->twitter != ""){ ?>
                  <li class="list-inline-item"><a class="fb" href="<?php echo $franchisdetail[0]->twitter ?>" target="_blank" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                  <?php } ?>
                  
                                        
                                        <li class="list-inline-item"><a class="fb" href="#" target="_blank"
                                                title="Facebook"><i class="fa-brands fa-pinterest"></i></a></li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 mb-3">
                        <div class="aboutme" >
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
                        <div class="aboutme">
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
                        <div class="aboutme">
                            <div class="aboutme-content">
                                <h5>NewsLetter</h5>
                                <p>Subscribe to our newsletter and get our newest updates right on your inbox.</p>
                                <form class="form mt-4 w-100">
                                    <div class="d-flex flex-lg-row flex-md-row flex-sm-row flex-column">
                                        <input type="email" placeholder="Enter your email"
                                            class="form-control mb-lg-0 mb-md-0 mb-sm-0 mb-3 me-3">
                                        <button class="btn text-white kv-btn-primary">Subscribe</button>

                                    </div>
                                    <div class="d-flex mt-3">
                                        <div class="d-flex mt-3">
                                            <input class="w-auto " type="checkbox" style="width: 100%;">&nbsp;&nbsp; I agree to the terms  conditions
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>