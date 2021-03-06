jQuery(document).ready(function ($) {
  // Smooth scroll for the menu and links with .scrollto classes
  $(".smothscroll").on(
    "click",
    function (e) {
      e.preventDefault();
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        console.log(this);
        if (target.length) {
          $("html, body").animate(
            {
              scrollTop: target.offset().top - 62,
            },
            1500,
            "easeInOutExpo"
          );
        }
      }
    },
    // Toggle for the read more function
    $(".readmore").click(function () {
      $("#readmore-icon").toggleClass("fas fa-chevron-down fas fa-chevron-up");
      $(".hidden-item").slideToggle(600, function () {});
    })
  );
});
