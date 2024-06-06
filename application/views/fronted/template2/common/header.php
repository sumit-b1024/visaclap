<div class="navbar-header sticky-top">
        <nav>
            
                 <?php if($franchisdetail[0]->logo != ""){ ?>
                        <a href="" class="navbar-h fs-4" style="display:inline-block"><img src="<?php echo base_url().$franchisdetail[0]->logo ?>" width="50" height="60" /></a>
                      <?php }else{ ?> 
                        <a href="" class="navbar-h fs-4" style="display:inline-block">VISA <span class="text-blue-light">
                CLAP</span></a>
                      <?php } ?>
            <label for="drop" class="toggle" style="float:right"><i class="fa fa-bars" aria-hidden="true"></i></label>
            <input type="checkbox" id="drop" />
            <ul class="menu">
                <li><a href="#" class="navlink">HOME</a></li>
                <li>

                    <!-- First Tier Drop Down -->
                    <label for="drop-6" class="toggle">FREE ZONE COMPANIES </label>
                    <a href="#">FREE ZONE COMPANIES <i class="fa-solid fa-sort-down"></i></a>
                    <input type="checkbox" id="drop-6" />
                    <ul style="z-index:999;">
                        <li> 
                            <label for="drop-7" class="toggle">Option 1 </label>
                            <a href="#">Option 1 <i class="fa-solid fa-caret-right"></i></a>
                            <input type="checkbox" id="drop-7" />
                            <ul style="z-index:2;">
                                <li><a href="#">Option1</a></li>
                                <li><a href="#">Option2</a></li>
                                <li><a href="#">Option3</a></li>
                            </ul>
                        </li>
                        <li>
                            <label for="drop-8" class="toggle">Option 2 </label>
                            <a href="#">Option 2<i class="fa-solid fa-caret-right"></i></a>
                            <input type="checkbox" id="drop-8" />
                            <ul style="z-index:999;">
                                <li><a href="#">Option1</a></li>
                                <li><a href="#">Option2</a></li>
                                <li><a href="#">Option3</a></li>
                                <li><a href="#">Option4</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>

                    <!-- First Tier Drop Down -->
                    <label for="drop-2" class="toggle">USA FOOD </label>
                    <a href="#">USA FOOD <i class="fa-solid fa-sort-down"></i></a>
                    <input type="checkbox" id="drop-2" />
                    <ul style="z-index:999;">
                        <li> <label for="drop-3" class="toggle">Portfolio 1 </label>
                            <a href="#">Portfolio 1 <i class="fa-solid fa-caret-right"></i></a>
                            <input type="checkbox" id="drop-3" />
                            <ul style="z-index:999;">
                                <li><a href="#">CSS</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">java</a></li>
                            </ul>
                        </li>
                        <li>
                            <label for="drop-4" class="toggle">Portfolio 2 </label>
                            <a href="#">Portfolio 2 <i class="fa-solid fa-caret-right"></i></a>
                            <input type="checkbox" id="drop-4" />
                            <ul style="z-index:999;">
                                <li><a href="#">HTMl</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">java</a></li>
                            </ul>
                        </li>
                        <li>

                            <!-- Second Tier Drop Down -->
                            <label for="drop-5" class="toggle">Works </label>
                            <a href="#">Works <i class="fa-solid fa-caret-right"></i></a>
                            <input type="checkbox" id="drop-5" />
                            <ul>
                                <li><a href="#">HTML/CSS</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">Python</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#" class="navlink">ABOUT</a></li>
                <li><a href="#" class="navlink">CONTACT</a></li>
                <li><a href="#" class="navlink"> PRIVACY POLICY</a></li>
                <li><a href="#" class="navlink">CALL ON 1234567890</a></li>
                <li><a href="#"><button type="submit" class="search"><i class="fa fa-search"></i></button>SEARCH</a>
                </li>
            </ul>
        </nav>
    </div>