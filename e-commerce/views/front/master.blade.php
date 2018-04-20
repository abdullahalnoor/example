<!DOCTYPE HTML>
<html>
<head>
<title>Gifty an E-Commerce online Shopping Category Flat Bootstarp responsive Website Template| Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gifty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('/') }}front/css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="{{ asset('/front') }}/css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="{{ asset('/front/') }}/css/jquery.countdown.css" />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ asset('/front') }}/js/jquery-1.11.1.min.js"></script>
<!-- dropdown -->
<script src="{{ asset('/front') }}/js/jquery.easydropdown.js"></script>
<!-- start menu -->
<link href="{{ asset('/front') }}/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{ asset('/front') }}/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="{{ asset('/front') }}/js/responsiveslides.min.js"></script>
<script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: false,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
</script>
<script src="{{ asset('/front') }}/js/jquery.countdown.js"></script>
<script src="{{ asset('/front') }}/js/script.js"></script>

<link rel="stylesheet" href="{{ asset('/front') }}/css/etalage.css">
<script src="{{ asset('/front') }}/js/jquery.etalage.min.js"></script>
<script>
jQuery(document).ready(function ($) {

    $('#etalage').etalage({
        thumb_image_width: 300,
        thumb_image_height: 400,
        source_image_width: 900,
        source_image_height: 1200,
        show_hint: true,
        click_callback: function (image_anchor, instance_id) {
            alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
        }
    });

});
</script>
</head>
<body>
    
@include('front.includes.header')

@yield('content')

@include('front.includes.footer')

</body>
</html>	

