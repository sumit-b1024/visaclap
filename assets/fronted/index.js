var TxtType = function (el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 2000;
  this.txt = "";
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function () {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
    this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
    this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) {
    delta /= 2;
  }

  if (!this.isDeleting && this.txt === fullTxt) {
    delta = this.period;
    this.isDeleting = true;
  } else if (this.isDeleting && this.txt === "") {
    this.isDeleting = false;
    this.loopNum++;
    delta = 500;
  }

  setTimeout(function () {
    that.tick();
  }, delta);
};

window.onload = function () {
  var elements = document.getElementsByClassName("typewrite");
  for (var i = 0; i < elements.length; i++) {
    var toRotate = elements[i].getAttribute("data-type");
    var period = elements[i].getAttribute("data-period");
    if (toRotate) {
      new TxtType(elements[i], JSON.parse(toRotate), period);
    }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #000}";
  document.body.appendChild(css);
};

let isOpened = false;
function expandCollapseExpansionPanel() {
  isOpened = !isOpened;
  console.log(isOpened);
  if (isOpened) {
    document.body.classList.add("overflow-hidden");
    document.body = document.body;
  } else if (!isOpened || document.body.classList.contains("overflow-hidden")) {
    document.body.classList.remove("overflow-hidden");
    document.body = document.body;
  }
}

window.onscroll = function () {
  myFunction();
};

var header = document.getElementById("accordionExample");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

function modalclose() {
  let element = document.getElementById("staticBackdrop");
  element.classList.add("d-none");
}

var swiper = new Swiper(".slide-content", {
  slidesPerView: 4,
  spaceBetween: 25,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    520: {
      slidesPerView: 3,
    },
    950: {
      slidesPerView: 4,
    },
  },
});

function switchTab(inputId) {
  document.getElementById(inputId).value = `0 adults - 0 Children  0 room`;
  document.getElementById(inputId).innerHTML =
    document.getElementById(inputId).innerHTML;
}

function increaseValue(id, inputId, idArray) {
  console.log(id);
  var value = parseInt(document.getElementById(id).value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById(id).value = value;
  document.getElementById(inputId).value = `${
    document.getElementById(idArray[0]).value
      ? +document.getElementById(idArray[0]).value
      : 0
  } adults - ${
    +document.getElementById(idArray[1]).value + 2
      ? +document.getElementById(idArray[1]).value
      : 0
  } childeren - ${
    +document.getElementById(idArray[2]).value + 3
      ? +document.getElementById(idArray[2]).value
      : 0
  } room`;
  document.getElementById(inputId).innerHTML =
    document.getElementById(inputId).innerHTML;
}

function decreaseValue(id, inputId, idArray) {
  // console.log(id);

  var value = parseInt(document.getElementById(id).value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? (value = 1) : "";
  value--;
  document.getElementById(id).value = value;
  document.getElementById(inputId).value = `${
    document.getElementById(idArray[0]).value
      ? +document.getElementById(idArray[0]).value
      : 0
  } adults - ${
    +document.getElementById(idArray[1]).value + 2
      ? +document.getElementById(idArray[1]).value
      : 0
  } childeren - ${
    +document.getElementById(idArray[2]).value + 3
      ? +document.getElementById(idArray[2]).value
      : 0
  } room`;
  document.getElementById(inputId).innerHTML =
    document.getElementById(inputId).innerHTML;
}

function chooseLocation(id, value) {
  document.getElementById(id).value = value;
  document.getElementById(id).innerHTML = document.getElementById(id).innerHTML;
}

index = 1;
switchTab("guest-in-hotel-tab");
function buttonLeft() {
  clearBulletDots();
  let bullets = document.getElementsByClassName("bullet-dot");
  if (screen.availWidth >= 1200) {
    // console.log(index)
    if (index <= Math.round(bullets.length / 4) && index > 1) {
      index--;
    }
  } else if (screen.availWidth <= 1200 && screen.availWidth >= 992) {
    // console.log(index)
    if (index <= Math.round(bullets.length / 3) && index > 1) {
      index--;
    }
  } else if (screen.availWidth <= 992 && screen.availWidth >= 768) {
    // console.log(index)
    if (index <= Math.round(bullets.length / 2) && index > 1) {
      index--;
    }
  } else if (screen.availWidth <= 768 && screen.availWidth >= 576) {
    // console.log(index)
    if (index <= Math.round(bullets.length / 1) && index > 1) {
      index--;
    }
  } else if (screen.availWidth <= 425) {
    // console.log(index)
    if (index <= Math.round(bullets.length / 1) && index > 1) {
      index--;
    }
  }
  console.log(index);
  document.getElementById("recommended-row").style.transition = "all 2s";
  document.getElementById("recommended-row").scrollLeft -= 1000;
  document.getElementById("pagination-bullets-scroll").scrollLeft -= 10;

  showActiveBullet();
}
function buttonRight() {
  clearBulletDots();
  let bullets = document.getElementsByClassName("bullet-dot");
  if (screen.availWidth >= 1200) {
    console.log(index)
    if (index < Math.round(bullets.length / 4) && index >= 1) {
      index++;
    }
  } else if (screen.availWidth <= 1200 && screen.availWidth >= 992) {
    console.log(index)
    if (index < Math.round(bullets.length / 3) && index >= 1) {
      index++;
    }
  } else if (screen.availWidth <= 992 && screen.availWidth >= 768) {
    console.log(index)
    if (index < Math.round(bullets.length / 2) && index >= 1) {
      index++;
    }
  } else if (screen.availWidth <= 768 && screen.availWidth >= 576) {
    console.log(index)
    if (index < Math.round(bullets.length / 1) && index >= 1) {
      index++;
    }
  } else if (screen.availWidth <= 425) {
    console.log(index)
    if (index < Math.round(bullets.length / 1) && index >= 1) {
      index++;
    }
  }
  document.getElementById("recommended-row").style.transition = "all 2s";
  document.getElementById("recommended-row").scrollLeft += 1000;
  document.getElementById("pagination-bullets-scroll").scrollLeft += 10;

  showActiveBullet();
}



function showActiveBullet() {
  console.log(index)
  let bullets = document.getElementsByClassName("bullet-dot");
  if (screen.availWidth >= 1200) {
    // console.log((index)*4);
    console.log(bullets.item((index * 4)-1>bullets.length-1?bullets.length-1:(index * 4)-1));
    bullets.item((index * 4)-1>bullets.length-1?bullets.length-1:(index * 4)-1).classList.add("bullet-dot-active");

  } else if (screen.availWidth <= 1200 && screen.availWidth >= 992) {
    console.log(bullets.item((index * 3)-1>bullets.length-1?bullets.length-1:(index * 3)-1));
    bullets.item((index * 3)-1>bullets.length-1?bullets.length-1:(index * 3)-1).classList.add("bullet-dot-active");

  } else if (screen.availWidth <= 992 && screen.availWidth >= 768) {
    console.log(bullets.item((index * 2)-1>bullets.length-1?bullets.length-1:(index * 2)-1));
    bullets.item((index * 2)-1>bullets.length-1?bullets.length-1:(index * 2)-1).classList.add("bullet-dot-active");

  } else if (screen.availWidth <= 768 && screen.availWidth >= 576) {
    console.log(bullets.item(index -1>bullets.length-1?bullets.length-1:index -1));
    bullets.item(index -1>bullets.length-1?bullets.length-1:index -1).classList.add("bullet-dot-active");

  } else if (screen.availWidth <= 425) {
    console.log(bullets.item(index-1>bullets.length-1?bullets.length-1:index-1));
    bullets.item(index-1>bullets.length-1?bullets.length-1:index-1).classList.add("bullet-dot-active");
  }
  // bullets.item(index).classList.add("bullet-dot-active");
  console.log(index)

  console.log(bullets);
}

function clearBulletDots() {
  let bullets = document.getElementsByClassName("bullet-dot");
  console.log(bullets);

  for (let i = 0; i < bullets.length; i++) {
    if (bullets.item(i).classList.contains("bullet-dot-active")) {
      bullets.item(i).classList.remove("bullet-dot-active");
    }
  }
  console.log(bullets);
}

showActiveBullet();
