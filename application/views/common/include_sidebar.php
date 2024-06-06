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
              </svg></span>Upcoming Deadline (<?=count($upcomming);?>)</a>
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
         
          <?php 
                   //$url_segment = $this->uri->segment(3);
          $url_segment1 = $this->uri->segment(2);
          $sub_menu_array = array('email_template','template');
          $is_extended = in_array($url_segment1, $sub_menu_array) ? "collapsed" : "";
          $araexpan = in_array($url_segment1, $sub_menu_array) ? "true" : "";
          $sub_active = in_array($url_segment1, $sub_menu_array) ? "show" : "";
          ?>
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
                
              </ul>
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
      $sub_menu_array = array('add-user','edit-user','meta','users','filleragent','referenceuser');
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
      
     

    <?php } ?>
  </ul>
</div>
</div>
