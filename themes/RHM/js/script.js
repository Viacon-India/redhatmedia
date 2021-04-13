jQuery(document).ready(function($) {
  initHideAndShowNav("#top-nav");
  initScrollUpButton("#goto-top-button");
  initCarousel(".single-item");
});

function initCarousel(selector) {
  var prevButton =
      '<button type="button" data-role="none" class="slick-prev" aria-label="prev"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" version="1.1"><path fill="#FFFFFF" d="M 16,16.46 11.415,11.875 16,7.29 14.585,5.875 l -6,6 6,6 z" /></svg></button>',
    nextButton =
      '<button type="button" data-role="none" class="slick-next" aria-label="next"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#FFFFFF" d="M8.585 16.46l4.585-4.585-4.585-4.585 1.415-1.415 6 6-6 6z"></path></svg></button>';

  $(selector).slick({
    infinite: true,
    dots: true,
    autoplay: true,
    autoplaySpeed: 4000,
    speed: 1000,
    cssEase: "ease-in-out",
    prevArrow: prevButton,
    nextArrow: nextButton
  });
}

function initScrollUpButton(selector) {
  var btn = $(selector);

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });

  btn.on("click", function(e) {
    e.preventDefault();
    // $("html, body").animate({ scrollTop: 0 }, "300");
    document
      .querySelectorAll("body")[0]
      .scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
  });
}

function initHideAndShowNav(selector) {
  var c,
    currentScrollTop = 0,
    navbar = $(selector);

  $(window).scroll(function() {
    var a = $(window).scrollTop();
    var b = navbar.height();

    currentScrollTop = a;

    if (c < currentScrollTop && a > b + b) {
      navbar.addClass("scrollUp");
      console.log("Testing header");
    } else if (c > currentScrollTop && !(a <= b)) {
      navbar.removeClass("scrollUp");
    }
    c = currentScrollTop;
  });
}
