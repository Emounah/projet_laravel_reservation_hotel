<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="js/Tools Owcarousel/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="{{ Asset('sass/fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ Asset('corousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ Asset('sass/style.css') }}">
    <title>@yield('titre')</title>
</head>
<body>
    @include('layoutsClient.header')
    @yield('contenue')
    @include('layoutsClient.footer')
    <!-- header>(.logo>h2>{My Logo})+(ul.nav>li-item*4>a.nav-link>{link$}) -->
    <script src="{{ Asset('js/index.js') }}"></script>
    <script src="{{ Asset('js/nav.js') }}"></script>
    <script src="{{ Asset('js/message.js') }}"></script>
    <script src="{{ Asset('corousel/jquery.min.js') }}"></script>
    <script src="{{ Asset('corousel/owl.carousel.min.js') }}"></script>
    <script>
        $('document').ready(()=>{
       $('.owl-carousel').owlCarousel({
       animateOut: 'slideOutDown',
       animateIn: 'flipInX',
       loop:true,
       margin:10,
       // padding:50,
       nav:true,
       smartSpeed:450,
       autoplay:true,
       center: true,
       autoplayTimeout:3000,
       autoplayHoverPause:true,
       responsive:{
           0:{
               items:1
           },
           600:{
               items:2
           },
           1000:{
               items:3
           }
       }
       })
   });
   $('document').ready(()=>{
       $('.owl-carousel1').owlCarousel({
       animateOut: 'slideOutDown',
       animateIn: 'flipInX',
       loop:true,
       margin:10,
       // padding:50,
       nav:true,
       smartSpeed:450,
       autoplay:true,
       center: true,
       autoplayTimeout:3000,
       autoplayHoverPause:true,
       responsive:{
           0:{
               items:1
           },
           600:{
               items:1
           },
           1000:{
               items:1
           }
       }
       })
   });
   // var owl_heading_carrousel = $('#owl-heading-carrousel').owlCarousel({
   //     items:1,
   //     loop:true,
   //     margin:1,
   //     autoplay:true,
   //     autoplayTimeout:7000,
   //     autoplayHoverPause:true,
   // });
   // $('.play').on('click', function () {
   //     owl_heading_carrousel.trigger('play.owl.autoplay', [4000])
   // })
   // $('.stop').on('click', function(){
   //     owl_heading_carrousel.trigger('stop.owl.autoplay')
   // })

//    <script>
//             $(document).ready(function() {
//                 $("#soValue1").on("keyup", function() {
//                     let value = $(this).val().toUpperCase();
//                     $(".searchrap").each(function() {
//                         $(this).toggle($(this).text().toUpperCase().indexOf(value) >= 0);
//                     });
//                 });
//             });
//     </script>

   </script>
</body>
</html>
