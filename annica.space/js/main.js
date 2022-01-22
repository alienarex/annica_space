jQuery(document).ready(function ($) {
  $(".hidden-item").hide();

  document.getElementById("visible-item-id").innerText = "Visa mer...";
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
    $(".readmore").click(function () {
      $header = $(this);
      console.log($header.next());

      $(".hidden-item").slideToggle(600, function () {
        $header.text(function () {
          return $(this).text() == "Visa mindre"
            ? "Visa mer..."
            : "Visa mindre";
        });
      });
    })
  );
});
