arr = [
  { Name: "Peter", Job: "Programmer" },
  { Name: "John", Job: "Programmer" },
  { Name: "Kevin", Job: "Scientist" },
];
testdata =
  "Dock jäst precis söka del hwila, samma bäckasiner faktor göras ingalunda, sig varit häst tid. Sällan hela dag dock regn tid och oss icke på varit, är som ännu det att dimma är verkligen denna dunge, brunsås vi räv och därmed både dimma kunde samtidigt. Gamla både söka dag på rot sorgliga sig, blivit är tid helt söka tidigare både gamla, där om miljoner blev vad kom. Lax stora åker ta äng plats och dunge björnbär och, nu sista själv nya ser kom gör tiden både, dunge vi bland själv hans se tiden dag. Trevnadens varit räv så";

jQuery(document).ready(function ($) {
  $.each(arr, function (i) {
    /** <div class="container desc ">
            <div class="row">
                <div class="col-lg-2 col-lg-offset-1">
                    <h2>Utbildning</h2>
                </div>
                <article>

                    <div class="col-lg-6"> */

    let testId = document.getElementById("test"),
      //Create elements
      div = document.createElement("DIV"),
      row = document.createElement("DIV"),
      div2 = document.createElement("DIV"),
      div3 = document.createElement("DIV"),
      div4 = document.createElement("DIV"),
      h2 = document.createElement("h2"),
      h3 = document.createElement("h3"),
      h4 = document.createElement("h4"),
      paragraph = document.createElement("P"),
      paragraph2 = document.createElement("P"),
      paragraph3 = document.createElement("P"),
      article = document.createElement("ARTICLE");

    // Add text
    h2.innerText = arr[i].Name;
    paragraph.innerText = testdata;

    //Add attributes, class, id etc.
    div.classList.add("container");
    div.classList.add("desc");
    row.classList.add("row");
    div2.classList.add("col-lg-2");
    div2.classList.add("col-lg-offset-1");
    div3.classList.add("col-lg-6");
    div4.classList.add("col-lg-3");

    // Append to element
    testId.append(div);
    div.appendChild(row);
    row.appendChild(div2);
    row.appendChild(article);
    article.appendChild(div3);
    div3.appendChild(h3);
    div3.appendChild(h4);
    div3.appendChild(paragraph);
    article.appendChild(div4);
    div4.appendChild(paragraph2);
    div4.appendChild(paragraph3);
    div2.append(h2);
  });
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
      $content.slideToggle(500, function () {
        //execute this after slideToggle is done
        //change text of header based on visibility of content div
        $header.text(function () {
          //change text based on condition
          //return $content.is(":visible") ? "Collapse" : "Expand";
        });
      });
    })
  );
});