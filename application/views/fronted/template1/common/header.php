<div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <nav class="navbar sticky-top navbar-expand-xl bg-light">
                <div class="container-fluid">
                    
                     <?php if($franchisdetail[0]->logo != ""){ ?>
                        <a href="" class="navbar-brand fw-bold ms-3"><img src="<?php echo base_url().$franchisdetail[0]->logo ?>" width="50" height="60" /></a>
                      <?php }else{ ?> 
                        <a class="navbar-brand fw-bold ms-3" href="#">VISA CLAP</a>
                      <?php } ?>

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
                                <button class="btn px-2 bg-light nav-button dropdown-toggle shadow-none my-auto border-0"
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
                                <button class="btn px-2 bg-light nav-button dropdown-toggle shadow-none my-auto border-0"
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