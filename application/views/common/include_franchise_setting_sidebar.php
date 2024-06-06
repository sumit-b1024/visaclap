<?php 
$current                =   $this->uri->segment(2);
$user_role              =   $userdata['user_role'];
$has_admin_access       =   [User_role::SUPER_ADMIN];
$has_manager_access     =   [User_role::MANAGER];
$has_franchise_access   =   [User_role::FRANCHISE, User_role::CUSTOMER];
$has_franchise_staff_access = [User_role::FRANCHISE_STAFF];
?>
 <div id="sidebar" class="sidebar position-fixed top-0 bottom-0 vh-100">
  <div class="sidebar_inner" id="scroll_container">
      <div class="px-3 mb-4">
          <a href="<?= BASE_URL; ?>" class="logo d-inline block mx-auto"><img src="<?= LOGO; ?>" alt="<?= BASE_NAMESMALL; ?>" class="img-fluid" /></a>
        </div>

        <ul class="sidebar_menu list-unstyled" id="menu1">
           
             <?php
          if(in_array($user_role, $has_franchise_access) )
          {
            
            ?>
             <?php 
             $url_segment = $this->uri->segment(2);
             $second_segment = $this->uri->segment(3);
             $sub_menu_array = array('toppop','payment_history','mypassbook');
             $is_extended = in_array($second_segment, $sub_menu_array) ? "true" : "";
             $sub_active = in_array($second_segment, $sub_menu_array) ? "show" : "";
             ?>
          <li class="<?= $second_segment != "" && $second_segment == "viewprofile" ? "active" : ""?>">
            <a href="<?= FRANCHISE . '/globel_setting/viewprofile'; ?>"><span class="menu_icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z"
                    stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>My Profile</a>
          </li>
          <li class="<?= isset($url_segment) && $second_segment == "" && $url_segment == "globel_setting" ? "active" : ""?>">
            <a href="<?= FRANCHISE . '/globel_setting'; ?>"><span class="menu_icon">
                <svg width="18" height="18" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.5 15V17M12.5 11V17M16.5 7V17M8.3 21H16.7C18.3802 21 19.2202 21 19.862 20.673C20.4265 20.3854 20.8854 19.9265 21.173 19.362C21.5 18.7202 21.5 17.8802 21.5 16.2V7.8C21.5 6.11984 21.5 5.27976 21.173 4.63803C20.8854 4.07354 20.4265 3.6146 19.862 3.32698C19.2202 3 18.3802 3 16.7 3H8.3C6.61984 3 5.77976 3 5.13803 3.32698C4.57354 3.6146 4.1146 4.07354 3.82698 4.63803C3.5 5.27976 3.5 6.11984 3.5 7.8V16.2C3.5 17.8802 3.5 18.7202 3.82698 19.362C4.1146 19.9265 4.57354 20.3854 5.13803 20.673C5.77976 21 6.61984 21 8.3 21Z"
                    stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>Global Settings</a>
          </li>

          <li class="<?= isset($url_segment) && $url_segment == "add_franchise_staff" ? "active" : ""?>">
            <a href="<?= FRANCHISE . '/add_franchise_staff'; ?>"><span class="menu_icon">
                <img src="<?php echo base_url('assets/images/check-done-01.svg'); ?>" width="18px">
              </span>Staff</a>
          </li>

          <li class="<?= isset($url_segment) && $url_segment == "reset_pwd" ? "active" : ""?>">
            <a href="<?= FRANCHISE . '/reset_pwd'; ?>"><span class="menu_icon">
                <img src="<?php echo base_url('assets/images/key-01.svg'); ?>" width="18px">
              </span>Change Password</a>
          </li>

          <li>
            <a href="#collapse_1" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?>"><span class="menu_icon">
                <img src="<?php echo base_url('assets/images/pie-chart-03.svg'); ?>" width="18px">
              </span>Billing And Payment</a>
            <ul class="submenu collapse list-unstyled <?= isset($sub_active) ? $sub_active : ""; ?>" id="collapse_1">
              <li class="<?= isset($second_segment) && $second_segment == "toppop" ? "active" : ""?>"><a href="<?= FRANCHISE . '/globel_setting/toppop'; ?>">Top Up</a></li>
              <li class="<?= isset($second_segment) && $second_segment == "payment_history" ? "active" : ""?>"><a href="<?= FRANCHISE . '/globel_setting/payment_history'; ?>">Payment History</a></li>
              <li class="<?= isset($second_segment) && $second_segment == "mypassbook" ? "active" : ""?>"><a href="<?= FRANCHISE . '/globel_setting/mypassbook'; ?>">My Passbook</a></li>

            </ul>
          </li>
        </ul>
    <?php } ?>
   </div>
</div>

 
