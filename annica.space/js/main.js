jQuery(document).ready(function ($) {
  // Set initial content to the p controlling show/hide more content
  document.getElementById("visible-item-id").innerHTML = "Visa mer ...";

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
      $content.slideToggle(400, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header.text(function () {
          //change text based on condition
          return $content.is(":visible") ? "Visa mindre" : "Visa mer ...";
        });
      });
    })
  );
});
