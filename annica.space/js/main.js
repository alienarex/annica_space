jQuery(document).ready(function ($) {
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
    // Toggle for the read more function
    $(".readmore").click(function () {
      $header = $(this);

      $(".hidden-item").slideToggle(600, function () {
        $header.text(function () {
          return $(this).text() == "Visa mindre"
            ? "Visa mer..."
            : "Visa mindre";
        });
      });
    })
  );
  jQuery("#lang-select").hover(
    function () {
      jQuery(this).attr("size", jQuery("option").length);
    },
    function () {
      jQuery(this).attr("size", 1);
    }
  );

  // $("#lang-select")
  //   .chosen()
  //   .next(".chzn-container")
  //   .hover(
  //     function () {
  //       $("#lang-select").trigger("liszt:open");
  //     },
  //     function () {
  //       $(this).trigger("click");
  //     }
  //   );

  $.post("../eng/index.php", { data: "value1" }, function (data) {
    console.log(data);
    $("#response").text(data);
  });
  // $("#lang-switch").change(function () {
  //   // $('[lang="en"]').hide();
  //   // $('[lang="sv"]').hide();
  //   var lang = $(this).val();

  //   console.log($(this).val());
  //   switch (lang) {
  //     case "en":
  //       $("[lang]").hide();
  //       $('[lang="en"]').show();

  //       break;
  //     case "sv":
  //       // $("[lang]").hide();
  //       $('[lang="sv"]').show();
  //       break;
  //     default:
  //       // $("[lang]").hide();
  //       $('[lang="sv"]').show();
  //   }
  // });
});
