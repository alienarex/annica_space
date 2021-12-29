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
    $(".visible-item").click(function () {
      $header = $(this);
      //getting the next element
      $content = $header.next();
      //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
      $content.slideToggle(1000, function () {});
    }),
    $(".visible-item").hover(function () {
      $header = $(this);
      //getting the next element
      $content = $header.next();
      // Slide down content
      $content.slideDown(1000, function () {});
    })
  );
});
