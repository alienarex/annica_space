$(".visibleitem").click(function () {

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

});

// jQuery(document).ready(function( $ ) {

//   // Smooth scroll for the menu and links with .scrollto classes
//   $('.smothscroll').on('click', function(e) {
//     e.preventDefault();
//     if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
//       var target = $(this.hash);
//       if (target.length) {

//         $('html, body').animate({
//           scrollTop: target.offset().top - 62
//         }, 1500, 'easeInOutExpo');
//       }
//     }
//   });

//   $('.carousel').carousel({
//     interval: 3500
//   });

//   // JavaScript Chart
//   var doughnutData = [{
//       value: 50,
//       color: "#1abc9c"
//     },
//     {
//       value: 50,
//       color: "#ecf0f1"
//     }
//   ];
// //   var myDoughnut = new Chart(document.getElementById("javascript").getContext("2d")).Doughnut(doughnutData);

// //   // .NET Chart
// //   var doughnutData = [{
// //     value: 90,
// //     color: "#1abc9c"
// //   },
// //   {
// //     value: 10,
// //     color: "#ecf0f1"
// //   }
// //   ];
// //   var myDoughnut = new Chart(document.getElementById(".NET").getContext("2d")).Doughnut(doughnutData);

// //   // WordPress Chart
// //   var doughnutData = [{
// //     value: 65,
// //     color: "#1abc9c"
// //   },
// //   {
// //     value: 35,
// //     color: "#ecf0f1"
// //   }
// //   ];
// //   var myDoughnut = new Chart(document.getElementById("wordpress").getContext("2d")).Doughnut(doughnutData);

// //   // HTML Chart
// //   var doughnutData = [{
// //     value: 80,
// //     color: "#1abc9c"
// //   },
// //   {
// //     value: 20,
// //     color: "#ecf0f1"
// //   }
// //   ];
// //   var myDoughnut = new Chart(document.getElementById("html").getContext("2d")).Doughnut(doughnutData);

// //   // Photoshop Chart
// //   var doughnutData = [{
// //     value: 70,
// //     color: "#1abc9c"
// //   },
// //   {
// //     value: 30,
// //     color: "#ecf0f1"
// //   }
// //   ];
// //   var myDoughnut = new Chart(document.getElementById("photoshop").getContext("2d")).Doughnut(doughnutData);

// //   // Illustrator Chart
// //   var doughnutData = [{
// //     value: 50,
// //     color: "#1abc9c"
// //   },
// //   {
// //     value: 50,
// //     color: "#ecf0f1"
// //   }
// //   ];
// //   var myDoughnut = new Chart(document.getElementById("illustrator").getContext("2d")).Doughnut(doughnutData);
// // });
