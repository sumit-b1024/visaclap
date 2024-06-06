<div class="v-flex min-vh-100 d-flex flex-column">
      <header class="header-area">
        <div class="container-fluid px-3 px-md-4">
          <div class="row align-items-center">
            <div class="col-4">
              <button class="menu_bar d-xl-none" id="menu_bar">
                <img src="<?php echo base_url('assets/images/menu-bar.svg'); ?>" alt="" class="img-fluid" />
              </button>
            </div>
            <div class="col-8">
              <div class="header-right d-flex align-items-center justify-content-end">
                <ul class="notificaion-part mb-0">
                  <li class="dropdown">
                   <?php if($this->session->userdata('user_role') == User_role::FRANCHISE || $this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){ ?>
                           <a href="<?= ROOT_URL . 'notification'; ?>" class="nav-link icon show" aria-expanded="true"> <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"> <path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"> </path> </svg></a>
                            <?php } ?>
                  </li>

                </ul>
               
                  <?php if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){ ?>
                     <ul class="notificaion-part mb-0">
                                    <span><a href="<?= ROOT_URL . 'franchise/staff/enquiry_notification'; ?>"><i class="fa fa-envelope"></i></a></span>
                                     </ul>
                                <?php } ?>

               
                <ul class="notificaion-part mb-0">
                  <?php if($this->session->userdata('user_role') == User_role::FRANCHISE || $this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){ ?>
                                    <span>
                                      <?php 
                                        if($this->session->userdata('user_role') == User_role::FRANCHISE){
                                          $wallet =  $this->setting_model->get_wallet($this->session->userdata('user_id'));
                                        }else if($this->session->userdata('user_role') == User_role::FRANCHISE_STAFF){
                                          $wallet =  $this->setting_model->get_wallet($this->session->userdata('franchise_id'));
                                        }
                                        echo ($wallet->balance) ? $wallet->balance." ".$wallet->currency : "0 ".$wallet->currency;?>
                                         
                                     </span>
                                <?php } ?>

                </ul>
                
               <ul class="user-part mb-0 p-0">
                  <li class="dropdown">
                    <a href="#"
                      class="user-trigger d-flex align-items-center justify-content-center rounded-circle text-decoration-none text-uppercase"
                      data-bs-toggle="dropdown"><img src="<?php echo base_url('assets/images/user.png'); ?>" alt="nu"
                        class="rounded-circle d-flex align-items-center justify-content-center" />
                      <span class="d-inline-block"><?= toPropercase($userdata['user_name']); ?></span></a>

                    <div class="dropdown-menu user-dropdown border-0">
                      <ul>
                         <li><small class="text-muted">
                                                <?= toPropercase(User_role::getValue($userdata['user_role'])); ?>
                                            </small></li>
                        <?php if($this->session->userdata('user_role') == User_role::FRANCHISE){ ?>
                        <li>
                          <a href="<?= FRANCHISE . '/globel_setting/viewprofile'; ?>" class="px-0 py-1"><span class="menu_icon"><svg width="18" height="18"
                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M12.75 15.375H5.25C3 15.375 1.5 14.25 1.5 11.625V6.375C1.5 3.75 3 2.625 5.25 2.625H12.75C15 2.625 16.5 3.75 16.5 6.375V11.625C16.5 14.25 15 15.375 12.75 15.375Z"
                                  stroke="#575757" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round" />
                                <path d="M12.75 6.75L10.4025 8.625C9.63 9.24 8.3625 9.24 7.59 8.625L5.25 6.75"
                                  stroke="#575757" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round" />
                              </svg> </span>View Profile</a>
                        </li>
                       
                        
                         
                        <li>
                          <a href="<?= FRANCHISE . '/globel_setting/toppop'; ?>" class="px-0 py-1"><span class="menu_icon"><svg width="18" height="18"
                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M6.375 14.25H6C3 14.25 1.5 13.5 1.5 9.75V6C1.5 3 3 1.5 6 1.5H12C15 1.5 16.5 3 16.5 6V9.75C16.5 12.75 15 14.25 12 14.25H11.625C11.3925 14.25 11.1675 14.3625 11.025 14.55L9.9 16.05C9.405 16.71 8.595 16.71 8.1 16.05L6.975 14.55C6.855 14.385 6.5775 14.25 6.375 14.25Z"
                                  stroke="#575757" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round" />
                                <path d="M11.9978 8.25H12.0046" stroke="#575757" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                                <path d="M8.99686 8.25H9.00359" stroke="#575757" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                                <path d="M5.99588 8.25H6.00262" stroke="#575757" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                              </svg> </span>Billing & payments</a>
                        </li>

                        <li>
                          <a href="<?= ROOT_URL . 'franchise/globel_setting'; ?>" class="px-0 py-1"><span class="menu_icon"><svg width="18" height="18"
                                viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 1.5V3.75" stroke="#575757" stroke-width="1.5" stroke-miterlimit="10"
                                  stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 1.5V3.75" stroke="#575757" stroke-width="1.5" stroke-miterlimit="10"
                                  stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                  d="M12 2.625C14.4975 2.76 15.75 3.7125 15.75 7.2375V11.8725C15.75 14.9625 15 16.5075 11.25 16.5075H6.75C3 16.5075 2.25 14.9625 2.25 11.8725V7.2375C2.25 3.7125 3.5025 2.7675 6 2.625H12Z"
                                  stroke="#575757" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                  stroke-linejoin="round" />
                                <path d="M15.5625 13.2H2.4375" stroke="#575757" stroke-width="1.5"
                                  stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                  d="M9 6.1875C8.0775 6.1875 7.2975 6.69 7.2975 7.665C7.2975 8.13 7.515 8.4825 7.845 8.7075C7.3875 8.9775 7.125 9.4125 7.125 9.9225C7.125 10.8525 7.8375 11.43 9 11.43C10.155 11.43 10.875 10.8525 10.875 9.9225C10.875 9.4125 10.6125 8.97 10.1475 8.7075C10.485 8.475 10.695 8.13 10.695 7.665C10.695 6.69 9.9225 6.1875 9 6.1875ZM9 8.3175C8.61 8.3175 8.325 8.085 8.325 7.7175C8.325 7.3425 8.61 7.125 9 7.125C9.39 7.125 9.675 7.3425 9.675 7.7175C9.675 8.085 9.39 8.3175 9 8.3175ZM9 10.5C8.505 10.5 8.145 10.2525 8.145 9.8025C8.145 9.3525 8.505 9.1125 9 9.1125C9.495 9.1125 9.855 9.36 9.855 9.8025C9.855 10.2525 9.495 10.5 9 10.5Z"
                                  fill="#575757" />
                              </svg></span>Global Setting</a>
                        </li>
                        <?php } ?>
                        <li>
                          <a href="<?= ROOT_URL . 'account/signout'; ?>" class="box-btn d-block text-center mt-3">Sign out</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>