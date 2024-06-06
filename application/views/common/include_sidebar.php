 <div id="sidebar" class="sidebar position-fixed top-0 bottom-0 vh-100">
  <div class="sidebar_inner" id="scroll_container">
    <div class="px-3 mb-4">
      <a href="<?= BASE_URL; ?>" class="logo d-inline block mx-auto"><img src="<?= LOGO; ?>" alt="<?= BASE_NAMESMALL; ?>" class="img-fluid" /></a>
    </div>
    <?php 
    $current                =   $this->uri->segment(2);
    $user_role              =   $userdata['user_role'];
    $has_admin_access       =   [User_role::SUPER_ADMIN];
    $has_manager_access     =   [User_role::MANAGER];
    $has_franchise_access   =   [User_role::FRANCHISE, User_role::CUSTOMER];
    $has_franchise_staff_access = [User_role::FRANCHISE_STAFF];

    $first_segment = $this->uri->segment(1); 
    $second_segment = $this->uri->segment(2);
    $third_segment = $this->uri->segment(3);
    $fourth_segment = $this->uri->segment(4);
    ?>        
    <ul class="sidebar_menu list-unstyled" id="menu1">
      <?php  
      if(in_array($user_role, $has_franchise_staff_access)) { ?>
        <li class="menu_item1 <?= isset($second_segment) && $second_segment == "enquiry" ? "active" : ""?>" id="menu_item1">
          <a href="<?= FRANCHISE . '/staff/enquiry'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </span>Dashboard</a>
      </li>
      <li class="menu_item1 <?= isset($second_segment) && $second_segment == "itenerary" ? "active" : ""?>" id="menu_item1">
        <a href="<?= FRANCHISE . '/itenerary'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </span>Tour Itinerary</a>
    </li>
    <?php 
    $url_segment = $this->uri->segment(2);
    $second_segment = $this->uri->segment(3);
   $third_segment = $this->uri->segment(4); 
    $sub_menu_array = array('reports','flightreport','process_pool_data');
    $sub_menu_array1 = array('finalize_pool_data','drop_pool_data');
    $is_extended = in_array($url_segment, $sub_menu_array) ? "is-expanded" : "";
    $sub_active = in_array($url_segment, $sub_menu_array) ? "show" : "";
    $sub_active1 = in_array($third_segment, $sub_menu_array1) ? "show" : "";
    $sub_active2 = in_array($second_segment, $sub_menu_array) ? "show" : "";
    $is_extended1 = in_array($third_segment, $sub_menu_array1) ? "is-expanded" : "";
    $araexpan = in_array($second_segment, $sub_menu_array) ? "true" : "";
    $araexpan1 = in_array($third_segment, $sub_menu_array1) ? "true" : "";
    
    $upcomming_day_date = date('Y-m-d',strtotime('+7 days'));
    $upcomming  = $this->setting_model->fetch_all_upcommingdeadline_count($upcomming_day_date);
    $withoutdeco  = $this->setting_model->fetch_all_withoutdeadline();
    //print_r($upcomming); exit;
    ?>
    <li>
      <a href="#collapse_2" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?><?= $araexpan1; ?>"><span class="menu_icon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 2C13.3132 2 14.6136 2.25866 15.8268 2.76121C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7363 6.95991 21.2388 8.17317C21.7413 9.38643 22 10.6868 22 12M12 2V12M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5229 22 12M12 2C17.5228 2 22 6.47716 22 12M22 12L12 12M22 12C22 13.5781 21.6265 15.1338 20.9101 16.5399C20.1936 17.946 19.1546 19.1626 17.8779 20.0902L12 12" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
      </span>Reports</a>
      <ul class="submenu list-unstyled collapse <?= isset($sub_active) ? $sub_active : ""; ?><?= isset($sub_active1) ? $sub_active1 : ""; ?><?= isset($sub_active2) ? $sub_active2 : ""; ?>" id="collapse_2">
        <li class="menu_item2 <?= isset($url_segment) && $url_segment == "reports" ? "active" : ""?>"><a href="<?= FRANCHISE . '/reports'; ?>">Enquiry Report</a></li>
        <li class="menu_item2 <?= isset($third_segment) && $third_segment == "finalize_pool_data" ? "active" : ""?>"><a href="<?= FRANCHISE . '/staff/enquiry/finalize_pool_data'; ?>">Finalize Pool </a></li>
        <li class="menu_item2 <?= isset($third_segment) && $third_segment == "drop_pool_data" ? "active" : ""?>"><a href="<?= FRANCHISE . '/staff/enquiry/drop_pool_data'; ?>">Drop Pool </a></li>
        <li class="menu_item2 <?= isset($second_segment) && $second_segment == "process_pool_data" ? "active" : ""?>"><a href="<?= FRANCHISE . '/enquiry/process_pool_data'; ?>">Process pool </a></li>
        
        <li class="menu_item2 <?= isset($url_segment) && $url_segment == "flightreport" ? "active" : ""?>"><a href="<?= FRANCHISE . '/flightreport'; ?>">Fight Booking Report </a></li>
      </ul>
    </li>
    <li class="menu_item1 <?= isset($second_segment) && $second_segment == "request" ? "active" : ""?>" id="menu_item5">
      <a href="<?= FRANCHISE . '/request'; ?>"><span class="menu_icon">
        <svg width="19" height="24" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" fill="white"></rect>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7503 15.8582H8.69056L7.146 9.79235C7.07269 9.51332 6.91703 9.26664 6.68806 9.15038C6.11664 8.85821 5.48696 8.62568 4.80005 8.50841V8.27487H8.11813C8.57607 8.27487 8.91953 8.62568 8.97677 9.0331L9.77817 13.4086L11.8369 8.27487H13.8394L10.7503 15.8582ZM14.9843 15.8582H13.039L14.6408 8.27487H16.5861L14.9843 15.8582ZM19.1028 10.3757C19.16 9.96725 19.5035 9.73372 19.9042 9.73372C20.5338 9.67508 21.2197 9.79235 21.7922 10.0835L22.1356 8.45079C21.5632 8.21725 20.9335 8.09998 20.3621 8.09998C18.4741 8.09998 17.1003 9.15038 17.1003 10.6082C17.1003 11.7173 18.0734 12.2996 18.7603 12.6504C19.5035 13.0002 19.7897 13.2337 19.7324 13.5835C19.7324 14.1082 19.16 14.3418 18.5886 14.3418C17.9017 14.3418 17.2147 14.1669 16.5861 13.8747L16.2426 15.5084C16.9295 15.7996 17.6727 15.9169 18.3596 15.9169C20.4766 15.9745 21.7922 14.9251 21.7922 13.35C21.7922 11.3664 19.1028 11.2502 19.1028 10.3757ZM28.6 15.8582L27.0555 8.27487H25.3965C25.053 8.27487 24.7095 8.50841 24.5951 8.85821L21.7349 15.8582H23.7374L24.1371 14.7502H26.5976L26.8265 15.8582H28.6ZM25.6827 10.3171L26.2541 13.1751H24.6523L25.6827 10.3171Z" style="stroke: #a39e9e;" fill="#575757"></path>
          <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" stroke="#F2F4F7"></rect>
        </svg> </span>Apply Visa</a>
      </li>
      <li class="menu_item1 <?= isset($second_segment) && $second_segment == "view_visa" ? "active" : ""?>" id="menu_item5">
        <a href="<?= FRANCHISE . '/request/view_visa'; ?>"><span class="menu_icon">
          <svg width="19" height="24" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" fill="white"></rect>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7503 15.8582H8.69056L7.146 9.79235C7.07269 9.51332 6.91703 9.26664 6.68806 9.15038C6.11664 8.85821 5.48696 8.62568 4.80005 8.50841V8.27487H8.11813C8.57607 8.27487 8.91953 8.62568 8.97677 9.0331L9.77817 13.4086L11.8369 8.27487H13.8394L10.7503 15.8582ZM14.9843 15.8582H13.039L14.6408 8.27487H16.5861L14.9843 15.8582ZM19.1028 10.3757C19.16 9.96725 19.5035 9.73372 19.9042 9.73372C20.5338 9.67508 21.2197 9.79235 21.7922 10.0835L22.1356 8.45079C21.5632 8.21725 20.9335 8.09998 20.3621 8.09998C18.4741 8.09998 17.1003 9.15038 17.1003 10.6082C17.1003 11.7173 18.0734 12.2996 18.7603 12.6504C19.5035 13.0002 19.7897 13.2337 19.7324 13.5835C19.7324 14.1082 19.16 14.3418 18.5886 14.3418C17.9017 14.3418 17.2147 14.1669 16.5861 13.8747L16.2426 15.5084C16.9295 15.7996 17.6727 15.9169 18.3596 15.9169C20.4766 15.9745 21.7922 14.9251 21.7922 13.35C21.7922 11.3664 19.1028 11.2502 19.1028 10.3757ZM28.6 15.8582L27.0555 8.27487H25.3965C25.053 8.27487 24.7095 8.50841 24.5951 8.85821L21.7349 15.8582H23.7374L24.1371 14.7502H26.5976L26.8265 15.8582H28.6ZM25.6827 10.3171L26.2541 13.1751H24.6523L25.6827 10.3171Z" style="stroke: #a39e9e;" fill="#575757"></path>
            <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" stroke="#F2F4F7"></rect>
          </svg> </span>View Visa</a>
        </li>
        <li class="menu_item1 <?= isset($second_segment) && $second_segment == "withoutdeadline" ? "active" : "" ?>" id="menu_item5">
          <a href="<?= FRANCHISE . '/enquiry/withoutdeadline'; ?>"><span class="menu_icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></span>Without Deadline (<?=count($withoutdeco);?>)</a>
          </li>
          <li class="menu_item1 <?= isset($second_segment) && $second_segment == "upcommingdeadline" ? "active" : "" ?>" id="menu_item5">
            <a href="<?= FRANCHISE . '/enquiry/upcommingdeadline'; ?>"><span class="menu_icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg></span>Upcoming Deadline (<?=$upcomming;?>)</a>
            </li>
            <li class="menu_item1 <?= isset($third_segment) && $second_segment == "bookflight" ? "active" : "" ?>" id="menu_item5">
              <a href="<?= FRANCHISE . '/bookflight'; ?>"><span class="menu_icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg></span>Book Flight</a>
              </li>
            <?php } ?>

            <?php
            if(in_array($user_role, $has_franchise_access) )
            {
             $upcomming_day_date = date('Y-m-d',strtotime('+7 days'));
             $upcomming  = $this->setting_model->fetch_all_upcommingdeadline($enquiry_from,$enquiry_to,$upcomming_day_date);


             $without  = $this->setting_model->fetch_all_withoutdeadline();
             $first_segment = $this->uri->segment(1); 
             $second_segment = $this->uri->segment(2);
             $third_segment = $this->uri->segment(3);
             $four_segment = $this->uri->segment(4);
             ?>
             <li class="menu_item1" id="menu_item1">
              <a href="<?= FRANCHISE . '/enquiry'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>Dashboard</a>
          </li>
          <?php 
                   //$url_segment = $this->uri->segment(3);
          $url_segment1 = $this->uri->segment(2);
          $sub_menu_array = array('tourist_attraction','itenerary');
          $is_extended = in_array($url_segment1, $sub_menu_array) ? "collapsed" : "";
          $araexpan = in_array($url_segment1, $sub_menu_array) ? "true" : "";
          $sub_active = in_array($url_segment1, $sub_menu_array) ? "show" : "";
          $araexpan1 = in_array($four_segment, $sub_menu_array) ? "true" : "";
          $sub_active1 = in_array($four_segment, $sub_menu_array) ? "show" : "";
          ?>
          <li class="">
            <a href="#collapse_9" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?><?= $araexpan1; ?>"><span class="menu_icon">
              <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.5 15V17M12.5 11V17M16.5 7V17M8.3 21H16.7C18.3802 21 19.2202 21 19.862 20.673C20.4265 20.3854 20.8854 19.9265 21.173 19.362C21.5 18.7202 21.5 17.8802 21.5 16.2V7.8C21.5 6.11984 21.5 5.27976 21.173 4.63803C20.8854 4.07354 20.4265 3.6146 19.862 3.32698C19.2202 3 18.3802 3 16.7 3H8.3C6.61984 3 5.77976 3 5.13803 3.32698C4.57354 3.6146 4.1146 4.07354 3.82698 4.63803C3.5 5.27976 3.5 6.11984 3.5 7.8V16.2C3.5 17.8802 3.5 18.7202 3.82698 19.362C4.1146 19.9265 4.57354 20.3854 5.13803 20.673C5.77976 21 6.61984 21 8.3 21Z" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>Tourist Package</a>
            <ul class="submenu list-unstyled collapse <?= isset($sub_active) ? $sub_active : ""; ?><?= isset($sub_active1) ? $sub_active1 : ""; ?>" id="collapse_9">
              <li class="menu_item2 <?= isset($four_segment) && $four_segment == "tourist_attraction" ? "active" : ""?>" id="menu_item15"><a href="<?= FRANCHISE . '/settings/meta/tourist_attraction'; ?>">Tourist Attration</a></li>
              <li class="menu_item2 <?= isset($second_segment) && $second_segment == "itenerary" ? "active" : ""?>" id="menu_item2"><a href="<?= FRANCHISE . '/itenerary'; ?>">Tour Itinerary </a></li>

            </ul>
          </li>
          <?php 
                   //$url_segment = $this->uri->segment(3);
          $url_segment1 = $this->uri->segment(2);
          $sub_menu_array = array('email_template','template');
          $is_extended = in_array($url_segment1, $sub_menu_array) ? "collapsed" : "";
          $araexpan = in_array($url_segment1, $sub_menu_array) ? "true" : "";
          $sub_active = in_array($url_segment1, $sub_menu_array) ? "show" : "";
          ?>
          <li class="">
            <a href="#collapse_1" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?>"><span class="menu_icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 11.9999L11.6422 16.8211C11.7734 16.8866 11.839 16.9194 11.9078 16.9324C11.9687 16.9438 12.0313 16.9438 12.0922 16.9324C12.161 16.9194 12.2266 16.8866 12.3578 16.8211L22 11.9999M2 16.9999L11.6422 21.8211C11.7734 21.8866 11.839 21.9194 11.9078 21.9324C11.9687 21.9438 12.0313 21.9438 12.0922 21.9324C12.161 21.9194 12.2266 21.8866 12.3578 21.8211L22 16.9999M2 6.99994L11.6422 2.17883C11.7734 2.11324 11.839 2.08044 11.9078 2.06753C11.9687 2.0561 12.0313 2.0561 12.0922 2.06753C12.161 2.08044 12.2266 2.11324 12.3578 2.17883L22 6.99994L12.3578 11.8211C12.2266 11.8866 12.161 11.9194 12.0922 11.9324C12.0313 11.9438 11.9687 11.9438 11.9078 11.9324C11.839 11.9194 11.7734 11.8866 11.6422 11.8211L2 6.99994Z" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>Templates</a>
            <ul class="submenu list-unstyled collapse  <?= isset($sub_active) ? $sub_active : ""; ?>" id="collapse_1">
              <li class="menu_item2 <?= isset($second_segment) && $second_segment == "template" ? "active" : ""?>" id="menu_item3"><a href="<?= FRANCHISE . '/template'; ?>">Whatsapp Templates</a></li>
              <li class="menu_item2 <?= isset($second_segment) && $second_segment == "email_template" ? "active" : ""?>" id="menu_item4"><a href="<?= FRANCHISE . '/email_template'; ?>">Email Templates</a></li>

            </ul>
          </li>
          <li class="menu_item1 <?= isset($second_segment) && !isset($third_segment) && $second_segment == "request"  ? "active" : ""?>" id="menu_item5">
            <a href="<?= FRANCHISE . '/request'; ?>"><span class="menu_icon">
              <svg width="19" height="24" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" fill="white"></rect>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7503 15.8582H8.69056L7.146 9.79235C7.07269 9.51332 6.91703 9.26664 6.68806 9.15038C6.11664 8.85821 5.48696 8.62568 4.80005 8.50841V8.27487H8.11813C8.57607 8.27487 8.91953 8.62568 8.97677 9.0331L9.77817 13.4086L11.8369 8.27487H13.8394L10.7503 15.8582ZM14.9843 15.8582H13.039L14.6408 8.27487H16.5861L14.9843 15.8582ZM19.1028 10.3757C19.16 9.96725 19.5035 9.73372 19.9042 9.73372C20.5338 9.67508 21.2197 9.79235 21.7922 10.0835L22.1356 8.45079C21.5632 8.21725 20.9335 8.09998 20.3621 8.09998C18.4741 8.09998 17.1003 9.15038 17.1003 10.6082C17.1003 11.7173 18.0734 12.2996 18.7603 12.6504C19.5035 13.0002 19.7897 13.2337 19.7324 13.5835C19.7324 14.1082 19.16 14.3418 18.5886 14.3418C17.9017 14.3418 17.2147 14.1669 16.5861 13.8747L16.2426 15.5084C16.9295 15.7996 17.6727 15.9169 18.3596 15.9169C20.4766 15.9745 21.7922 14.9251 21.7922 13.35C21.7922 11.3664 19.1028 11.2502 19.1028 10.3757ZM28.6 15.8582L27.0555 8.27487H25.3965C25.053 8.27487 24.7095 8.50841 24.5951 8.85821L21.7349 15.8582H23.7374L24.1371 14.7502H26.5976L26.8265 15.8582H28.6ZM25.6827 10.3171L26.2541 13.1751H24.6523L25.6827 10.3171Z" style="stroke: #a39e9e;" fill="#575757"></path>
                <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" stroke="#F2F4F7"></rect>
              </svg> </span>Apply Visa</a>
            </li>
            <li class="menu_item1 <?= isset($third_segment) && $third_segment == "view_visa" ? "active" : ""?>" id="menu_item5">
        <a href="<?= FRANCHISE . '/request/view_visa'; ?>"><span class="menu_icon">
          <svg width="19" height="24" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" fill="white"></rect>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7503 15.8582H8.69056L7.146 9.79235C7.07269 9.51332 6.91703 9.26664 6.68806 9.15038C6.11664 8.85821 5.48696 8.62568 4.80005 8.50841V8.27487H8.11813C8.57607 8.27487 8.91953 8.62568 8.97677 9.0331L9.77817 13.4086L11.8369 8.27487H13.8394L10.7503 15.8582ZM14.9843 15.8582H13.039L14.6408 8.27487H16.5861L14.9843 15.8582ZM19.1028 10.3757C19.16 9.96725 19.5035 9.73372 19.9042 9.73372C20.5338 9.67508 21.2197 9.79235 21.7922 10.0835L22.1356 8.45079C21.5632 8.21725 20.9335 8.09998 20.3621 8.09998C18.4741 8.09998 17.1003 9.15038 17.1003 10.6082C17.1003 11.7173 18.0734 12.2996 18.7603 12.6504C19.5035 13.0002 19.7897 13.2337 19.7324 13.5835C19.7324 14.1082 19.16 14.3418 18.5886 14.3418C17.9017 14.3418 17.2147 14.1669 16.5861 13.8747L16.2426 15.5084C16.9295 15.7996 17.6727 15.9169 18.3596 15.9169C20.4766 15.9745 21.7922 14.9251 21.7922 13.35C21.7922 11.3664 19.1028 11.2502 19.1028 10.3757ZM28.6 15.8582L27.0555 8.27487H25.3965C25.053 8.27487 24.7095 8.50841 24.5951 8.85821L21.7349 15.8582H23.7374L24.1371 14.7502H26.5976L26.8265 15.8582H28.6ZM25.6827 10.3171L26.2541 13.1751H24.6523L25.6827 10.3171Z" style="stroke: #a39e9e;" fill="#575757"></path>
            <rect x="0.5" y="0.5" width="33" height="23" rx="3.5" stroke="#F2F4F7"></rect>
          </svg> </span>View Visa</a>
        </li>
            <?php 
            $url_segment = $this->uri->segment(2);
            $url_segment3 = $this->uri->segment(3);
            $sub_menu_array = array();
            $sub_menu_array1 = array('finalize_pool_data','drop_pool_data','process_pool_data','reports','flightreport');
            $is_extended = in_array($url_segment, $sub_menu_array) ? "collapsed" : "";
            $sub_active = in_array($url_segment, $sub_menu_array) ? "show" : "";
            $is_extended1 = in_array($url_segment3, $sub_menu_array1) ? "collapsed" : "";
            $sub_active = in_array($url_segment3, $sub_menu_array1) ? "show" : "";
            $sub_active1 = in_array($url_segment, $sub_menu_array1) ? "show" : "";
            $araexpan = in_array($url_segment, $sub_menu_array1) ? "true" : "";
            $araexpan1 = in_array($url_segment3, $sub_menu_array1) ? "true" : "";
            ?>
            <li>
              <a href="#collapse_2" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?><?= $araexpan1; ?>"><span class="menu_icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 2C13.3132 2 14.6136 2.25866 15.8268 2.76121C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7363 6.95991 21.2388 8.17317C21.7413 9.38643 22 10.6868 22 12M12 2V12M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5229 22 12M12 2C17.5228 2 22 6.47716 22 12M22 12L12 12M22 12C22 13.5781 21.6265 15.1338 20.9101 16.5399C20.1936 17.946 19.1546 19.1626 17.8779 20.0902L12 12" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>Reporting</a>
              <ul class="submenu list-unstyled collapse <?= isset($sub_active) ? $sub_active : ""; ?><?= isset($sub_active1) ? $sub_active1 : ""; ?>" id="collapse_2">
                <li class="menu_item2 <?= isset($url_segment) && $url_segment == "reports" ? "active" : ""?>"><a href="<?= FRANCHISE . '/reports'; ?>">Enquiry Report</a></li>
                <li class="menu_item2 <?= isset($third_segment) && $third_segment == "finalize_pool_data" ? "active" : ""?>"><a href="<?= FRANCHISE . '/enquiry/finalize_pool_data'; ?>">Finalize Report </a></li>
                <li class="menu_item2 <?= isset($third_segment) && $third_segment == "drop_pool_data" ? "active" : ""?>"><a href="<?= FRANCHISE . '/enquiry/drop_pool_data'; ?>">Drop Report </a></li>
                <li class="menu_item2 <?= isset($third_segment) && $third_segment == "process_pool_data" ? "active" : ""?>"><a href="<?= FRANCHISE . '/enquiry/process_pool_data'; ?>">Process Report </a></li>
                <li class="menu_item2 <?= isset($second_segment) && $second_segment == "flightreport" ? "active" : ""?>"><a href="<?= FRANCHISE . '/flightreport'; ?>">Fight Booking Report </a></li>
              </ul>
            </li>
            <li class="menu_item1 <?= isset($second_segment) && $second_segment == "batch" ? "active" : ""?>">
              <a href="<?= FRANCHISE . '/batch'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.685 9C11.685 10.485 10.485 11.685 9 11.685C7.515 11.685 6.315 10.485 6.315 9C6.315 7.515 7.515 6.315 9 6.315C10.485 6.315 11.685 7.515 11.685 9Z" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9 15.2025C11.6475 15.2025 14.115 13.6425 15.8325 10.9425C16.5075 9.885 16.5075 8.1075 15.8325 7.05C14.115 4.35 11.6475 2.79 9 2.79C6.3525 2.79 3.885 4.35 2.1675 7.05C1.4925 8.1075 1.4925 9.885 2.1675 10.9425C3.885 13.6425 6.3525 15.2025 9 15.2025Z" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg> </span>View Batch</a>
            </li>

            <li class="menu_item1 <?= isset($third_segment) && $third_segment == "withoutdeadline" ? "active" : ""?>">
              <a href="<?= FRANCHISE . '/enquiry/withoutdeadline'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 1.5V3.75" stroke="#575757" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12 1.5V3.75" stroke="#575757" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M2.625 6.8175H15.375" stroke="#575757" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M15.75 6.375V12.75C15.75 15 14.625 16.5 12 16.5H6C3.375 16.5 2.25 15 2.25 12.75V6.375C2.25 4.125 3.375 2.625 6 2.625H12C14.625 2.625 15.75 4.125 15.75 6.375Z" stroke="#575757" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.771 10.275H11.7778" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.771 12.525H11.7778" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M8.99661 10.275H9.00335" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M8.99661 12.525H9.00335" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M6.22073 10.275H6.22747" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M6.22073 12.525H6.22747" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg> </span>Without Deadline (<?=count($without);?>)</a>
            </li>
            <li class="menu_item1 <?= isset($third_segment) && $third_segment == "upcommingdeadline" ? "active" : ""?>">
              <a href="<?= FRANCHISE . '/enquiry/upcommingdeadline'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.43 1.5H6.57003C3.75003 1.5 3.53253 4.035 5.05503 5.415L12.945 12.585C14.4675 13.965 14.25 16.5 11.43 16.5H6.57003C3.75003 16.5 3.53253 13.965 5.05503 12.585L12.945 5.415C14.4675 4.035 14.25 1.5 11.43 1.5Z" stroke="#575757" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg> </span>Upcoming Deadline (<?=count($upcomming);?>)</a>
            </li>
            <li class="menu_item1 <?= isset($third_segment) && $third_segment == "bookflight" ? "active" : ""?>">
              <a href="<?= FRANCHISE . '/bookflight'; ?>"><span class="menu_icon">
                <svg width="20" height="18" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21 19V17C21 15.1362 19.7252 13.5701 18 13.126M14.5 1.29076C15.9659 1.88415 17 3.32131 17 5C17 6.67869 15.9659 8.11585 14.5 8.70924M16 19C16 17.1362 16 16.2044 15.6955 15.4693C15.2895 14.4892 14.5108 13.7105 13.5307 13.3045C12.7956 13 11.8638 13 10 13H7C5.13623 13 4.20435 13 3.46927 13.3045C2.48915 13.7105 1.71046 14.4892 1.30448 15.4693C1 16.2044 1 17.1362 1 19M12.5 5C12.5 7.20914 10.7091 9 8.5 9C6.29086 9 4.5 7.20914 4.5 5C4.5 2.79086 6.29086 1 8.5 1C10.7091 1 12.5 2.79086 12.5 5Z" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>

              </span>Book Flight</a>
            </li>
          <?php } ?>
          <?php
          if(in_array($user_role, $has_admin_access))
          {
           $url_segment = $this->uri->segment(3);
           $url_segment1 = $this->uri->segment(2);
           $sub_menu_array = array('hotel','room_category','template_tag','media');
           $is_extended = in_array($url_segment, $sub_menu_array) ? "is-expanded" : "";
           $sub_active = in_array($url_segment, $sub_menu_array) ? "show" : "";
           $sub_active1 = in_array($url_segment1, $sub_menu_array) ? "show" : "";
           $araexpan = in_array($url_segment, $sub_menu_array) ? "true" : "";
           $araexpan1 = in_array($url_segment1, $sub_menu_array) ? "true" : "";
           
           ?>
           <li class="menu_item1" id="menu_item1">
            <a href="<?= BASE_URL; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>Dashboard</a>
        </li>
        <li class="menu_item1 <?= isset($first_segment) && $first_segment == "supplier" ? "active" : ""?>" id="menu_item1">
          <a href="<?= CL_SUPPLIER; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg></span>Supplier</a>
        </li>
        <li class="menu_item1 <?= isset($first_segment) && $first_segment == "domainlist" ? "active" : ""?>" id="menu_item1">
          <a href="<?= BASE_URL; ?>domainlist"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg></span>Domain List</a>
        </li>
         <li class="menu_item1 <?= isset($first_segment) && $first_segment == "freecoupon" ? "active" : ""?>" id="menu_item1">
          <a href="<?= BASE_URL; ?>freecoupon"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg></span>Free Coupons</a>
        </li>

        <li class="menu_item1 ">
          <a href="#collapse_2" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?><?= $araexpan1; ?>"><span class="menu_icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C13.3132 2 14.6136 2.25866 15.8268 2.76121C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7363 6.95991 21.2388 8.17317C21.7413 9.38643 22 10.6868 22 12M12 2V12M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5229 22 12M12 2C17.5228 2 22 6.47716 22 12M22 12L12 12M22 12C22 13.5781 21.6265 15.1338 20.9101 16.5399C20.1936 17.946 19.1546 19.1626 17.8779 20.0902L12 12" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>Hotel</a>
          <ul class="submenu list-unstyled collapse <?= isset($sub_active) ? $sub_active : ""; ?><?= isset($sub_active1) ? $sub_active1 : ""; ?>" id="collapse_2">
            <li class="menu_item2 <?= isset($url_segment1) && $url_segment1 == "media" ? "active" : ""; ?>">
              <a href="<?= CL_SETTINGS . '/media'; ?>" class="slide-item">
               Add Media For Hotel
             </a>
           </li>
           <?php
           array_multisort($_meta, SORT_ASC);
           unset($_meta[0]);
           unset($_meta[3]);
           unset($_meta[2]);
           unset($_meta[5]);
           unset($_meta[1]);
           unset($_meta[7]);

           foreach( $_meta as $key => $value ) :
             $val = str_replace(' ', '_', strtolower($value));
             $url = ROOT_URL .'settings/meta/'. $val;
             ?>
             <li class="menu_item2 <?php echo isset($sub_menu_array) && $val == $this->uri->segment(3) && in_array($val,$sub_menu_array) ? "active" : ""; ?>"><a href="<?= $url; ?>"><?= $value ?> </a></li>
             <?php
           endforeach;
           ?> 
         </ul>
       </li>
       

       <?php 
       $url_segmentt = $this->uri->segment(2);
       $url_segmentt1 = $this->uri->segment(3);
       $expand_active = array('category','add-category','edit-category','hotel','tourist_attraction');
       $is_extended = in_array($url_segmentt, $sub_menu_array) ? "is-expanded" : "";
       $sub_active  = in_array($url_segmentt, $expand_active) ? "show" : "";
       $sub_active1  = in_array($url_segmentt1, $expand_active) ? "show" : "";
       $araexpan    = in_array($url_segmentt, $expand_active) ? "true" : "";
       $araexpan1    = in_array($url_segmentt1, $expand_active) ? "true" : "";
       ?>
       <li>
        <a href="#collapse_6" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?><?= $araexpan1; ?>"><span class="menu_icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C13.3132 2 14.6136 2.25866 15.8268 2.76121C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7363 6.95991 21.2388 8.17317C21.7413 9.38643 22 10.6868 22 12M12 2V12M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5229 22 12M12 2C17.5228 2 22 6.47716 22 12M22 12L12 12M22 12C22 13.5781 21.6265 15.1338 20.9101 16.5399C20.1936 17.946 19.1546 19.1626 17.8779 20.0902L12 12" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </span>Tourist Places</a>
        <ul class="submenu list-unstyled collapse <?= isset($sub_active) ? $sub_active : ""; ?><?= isset($sub_active1) ? $sub_active1 : ""; ?>" id="collapse_6">
          <li class="menu_item2 <?= isset($url_segmentt1) && $url_segmentt1 == "tourist_attraction" ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/meta/tourist_attraction'; ?>">Tourist Attraction</a></li>
          <?php $cat_array = array("add-category","edit-category","category"); ?>
          <li class="menu_item2 <?= in_array($url_segmentt,$cat_array) ?  "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/category'; ?>">Category</a></li>
          
        </ul>
      </li>

      <?php 
      $url_segment8 = $this->uri->segment(3);
      $sub_menu_array8 = array('activity','category','add-category','edit-category','edit-activity','add-activity','enquiry_status','enquiry_category','enquiry_description_enquiry');
      $is_extended = in_array($url_segment8, $sub_menu_array8) ? "show" : "";
      $sub_active8 = in_array($url_segment8, $sub_menu_array8) ? "true" : "";
      $araexpan8    = in_array($url_segment8, $sub_menu_array8) ? "true" : "";
      ?>

      <li class="menu_item1">                       
        
        <a href="#collapse_8" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan8; ?>"><span class="menu_icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C13.3132 2 14.6136 2.25866 15.8268 2.76121C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7363 6.95991 21.2388 8.17317C21.7413 9.38643 22 10.6868 22 12M12 2V12M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5229 22 12M12 2C17.5228 2 22 6.47716 22 12M22 12L12 12M22 12C22 13.5781 21.6265 15.1338 20.9101 16.5399C20.1936 17.946 19.1546 19.1626 17.8779 20.0902L12 12" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </span>Enquiry</a>
        <ul class="submenu list-unstyled collapse <?= isset($is_extended) ? $is_extended : ""; ?>" id="collapse_8">
          <li class="menu_item2 <?= $url_segment8 == 'enquiry_status' ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/meta/enquiry_status'; ?>">Enquiry Follow Up Status</a></li>
          <li class="menu_item2 <?= $url_segment8 == 'enquiry_category' ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/meta/enquiry_category'; ?>">Enquiry Type</a></li>
          <li class="menu_item2 <?= $url_segment8 == 'enquiry_description_enquiry' ? "active" : ""; ?>"><a href="<?= ROOT_URL .'settings/meta/enquiry_description_enquiry' ?>">Enquiry Description</a></li>
        </ul>
      </li>


      <?php 
      $url_segmentn = $this->uri->segment(2);
      $url_segmentn2 = $this->uri->segment(3);
      $sub_menu_array = array('add-user','edit-user','users','filleragent','referenceuser');
      $expand_active = array('filleragent','customer_category');
      $is_extended = in_array($url_segmentn, $sub_menu_array) ? "is-expanded" : "";
      $sub_active  = in_array($url_segmentn2, $expand_active) ? "show" : "";
      $sub_active1  = in_array($url_segmentn, $sub_menu_array) ? "show" : "";
      $araexpan    = in_array($url_segmentn, $expand_active) ? "true" : "";
      $araexpan1    = in_array($url_segmentn, $sub_menu_array) ? "true" : "";
      ?>
      <li>
        <a href="#collapse_3" data-bs-toggle="collapse" class="" aria-expanded="<?= $araexpan; ?><?= $araexpan; ?>"><span class="menu_icon">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C13.3132 2 14.6136 2.25866 15.8268 2.76121C17.0401 3.26375 18.1425 4.00035 19.0711 4.92893C19.9997 5.85752 20.7363 6.95991 21.2388 8.17317C21.7413 9.38643 22 10.6868 22 12M12 2V12M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5229 22 12M12 2C17.5228 2 22 6.47716 22 12M22 12L12 12M22 12C22 13.5781 21.6265 15.1338 20.9101 16.5399C20.1936 17.946 19.1546 19.1626 17.8779 20.0902L12 12" stroke="#667085" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
        </span>User Management</a>
        <ul class="submenu list-unstyled collapse <?= isset($sub_active) ? $sub_active : ""; ?><?= isset($sub_active1) ? $sub_active1 : ""; ?>" id="collapse_3">
          <li class="menu_item2 <?= ($url_segmentn == 'users' || $url_segmentn == 'add-user') ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/users'; ?>">Users</a></li>
          <li class="menu_item2 <?= $url_segmentn == 'filleragent' ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/filleragent'; ?>">Formfiller & Manager</a></li>
           <li class="menu_item2 <?= $url_segmentn == 'referenceuser' ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/referenceuser'; ?>">Reference User</a></li>
          <li class="menu_item2 <?= isset($url_segmentn2) && in_array($url_segmentn2,$expand_active) ? "active" : ""; ?>"><a href="<?= CL_SETTINGS . '/meta/customer_category'; ?>">Customer Category For Upload</a></li>
          
        </ul>
      </li>

      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "pool_master" && $second_segment != "view_pool_status_info" ? "active" : "";  ?>" id="menu_item1">
        <a href="<?= BASE_URL.'pool_master'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Pool Reason Master</a>
      </li>
      <li class="menu_item1 <?= isset($second_segment) && $second_segment == "view_pool_status_info" && $first_segment == "pool_master" ? "active" : "";?>" id="menu_item1">
        <a href="<?= BASE_URL.'pool_master/view_pool_status_info'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Pool Status</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "add_place" ? "active" : "";?>" id="menu_item1">
        <a href="<?= BASE_URL.'add_place'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Add New City</a>
      </li>
      <li class="menu_item1 <?= isset($second_segment) && $second_segment == "itenerary" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'itenerary'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Add Itinerary</a>
      </li>
      <li class="menu_item1 <?= isset($second_segment) && $second_segment == "country_list" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'settings/country_list'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Country list</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "notification" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'notification'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Notification</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "currency" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'currency'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Currency</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "template" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'template'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Template list</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "offer" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'offer'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Create Ads</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "bookingprofit" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'bookingprofit'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Flight Booking Profit</a>
      </li>
      <li class="menu_item1 <?= isset($first_segment) && $first_segment == "company_permission" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'settings/company_permission'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Company Permission</a>
      </li>
      <li class="menu_item1 <?= isset($second_segment) && $second_segment == "trialexplist" ? "active" : ""?>" id="menu_item1">
        <a href="<?= BASE_URL . 'settings/trialexplist'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Trail Expiring List</a>
      </li>
      <li class="menu_item1 <?= isset($third_segment) && $second_segment == "bookflight" ? "active" : "" ?>" id="menu_item1">
        <a href="<?= FRANCHISE . '/bookflight'; ?>"><span class="menu_icon"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8 17H16M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z" stroke="#6941C6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg></span>Book Flight</a>
      </li>

    <?php } ?>
  </ul>
</div>
</div>
