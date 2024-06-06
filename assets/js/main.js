
  
document.addEventListener("DOMContentLoaded", function () {

  // Script for Sidebar hide show under 1200px
  if (document.getElementById("menu_bar") !== null && document.getElementById("overlay") !== null) 
  {
    const menuBar = document.getElementById("menu_bar");
    const sideBar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");
    menuBar.addEventListener("click", function (e) {
      e.preventDefault();
      sideBar.classList.add("show");
      overlay.classList.add("show");
    });

    overlay.addEventListener("click", function (e) {
      e.preventDefault();
      sideBar.classList.remove("show");
      overlay.classList.remove("show");
    });
  }



  // Script/activation for perfect scrollbar
  if (document.getElementById('sidebar') !== null) {
    const ps = new
      PerfectScrollbar('#sidebar', {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
      });
  }


  // Script/activation for datepicker
  flatpickr("#datepicker_one", {});

  
});

// let value = document.getElementById("menu_item1");
// //var element = document.getElementById("myDIV");
//   value.classList.add("active");
//alert(value.className);

// $(document).ready(function () { 
  
//   $(document).click(function () {
//      // if($(".navbar-collapse").hasClass("in")){
//        $('.navbar-collapse').collapse('hide');
//      // }
//   });
// });
