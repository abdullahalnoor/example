<?php
header ("Content-Type:text/css");
$color = "#f0f";

function checkhexcolor($color) {
	return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if( isset( $_GET[ 'firastColor' ] ) AND $_GET[ 'firastColor' ] != '' ) {
  $color = "#".$_GET[ 'firastColor' ];
}

if( !$color OR !checkhexcolor( $color ) ) {
	$color = "#336699";
}


header ("Content-Type:text/css");
$color2 = "#f00f";

function checkhexcolor2($color2) {
	return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}

if( isset( $_GET[ 'secondColor' ] ) AND $_GET[ 'secondColor' ] != '' ) {
	$color2 = "#".$_GET[ 'secondColor' ];
}

if( !$color2 OR !checkhexcolor2( $color2 ) ) {
	$color2 = "#336699";
}

?>

    /*-------------------------
    Color Css
--------------------------*/
/*-- gradient background --*/
.header-area:after,
.navbar-area .boxed-btn.blank:hover,
.about-us-area .content .boxed-btn.blank:hover,
.navbar-area.nav-fixed,
.about-app-area .single-about-app-box:hover,
.feature-area .featured-left-item .single-featured-box .icon .icon-inner,
.feature-area .featured-right-item .single-featured-box .icon .icon-inner,
.introduce-with-area:after,
.suitable-area:after,
.suitable-area .left-content .boxed-btn.blank:hover,
.subscribe-area .subscription-form p button[type=submit],
.user-review-area,
.pricing-area .single-pricing-plan .footer .boxed-btn,
.pricing-area .single-pricing-plan:hover:after,
.faq-area .faq-accordion .panel-default>.panel-heading a[aria-expanded="true"]:after,
.faq-area .faq-accordion .panel-default>.panel-heading a:after,
.get-in-touch-area .get-in-touch-form-wrapper .left-content .single-get-in-touch-box .icon i,
.get-in-touch-area .get-in-touch-form-wrapper .contact-form input[type=submit],
.footer-area:after,
.team-member-area .single-team-member .thumb .hover,
.introduce-with-area .video-play-btn:hover
{
        background-image: -moz-linear-gradient(0deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
        background-image: -webkit-linear-gradient(0deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
        background-image: -ms-linear-gradient(0deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
}
.get-in-touch-area .get-in-touch-form-wrapper .contact-form input[type=submit]:hover
{
            background-image: -moz-linear-gradient(0deg, <?php echo $color2 ?> 0%, <?php echo $color ?> 100%);
            background-image: -webkit-linear-gradient(0deg, <?php echo $color2 ?> 0%, <?php echo $color ?> 100%);
            background-image: -ms-linear-gradient(0deg, <?php echo $color2 ?> 0%, <?php echo $color ?> 100%);
}
/*--- text gradient ---*/
.about-us-area .content h2,
.pricing-area .single-pricing-plan .header .price h3,
.pricing-area .single-pricing-plan .header .price .icon,
.about-app-area .single-about-app-box .icon
{
        background: -webkit-linear-gradient(0deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
}
/*--- gradient with border ---*/
.about-us-area .content .boxed-btn.blank
{
    background-image: -webkit-gradient(linear, left top, left bottom, from(white), to(white)),
    radial-gradient(circle at top left, <?php echo $color ?>, <?php echo $color2 ?>);
    background-image: -webkit-linear-gradient(white, white),
    -webkit-radial-gradient(top left, circle, <?php echo $color ?>, <?php echo $color2 ?>);
    background-image: -o-linear-gradient(white, white),
    -o-radial-gradient(top left, circle, <?php echo $color ?>, <?php echo $color2 ?>);
    background-image: linear-gradient(white, white),
    radial-gradient(circle at top left, <?php echo $color ?>, <?php echo $color2 ?>);
    background-origin: border-box;
    background-clip: content-box,
    border-box;
}
/*-- stop 1 color --*/
.about-app-area .single-about-app-box .icon i,
.counter-area .single-counter-box .icon i
{
    stop-color: <?php echo $color ?>;
    background: -webkit-linear-gradient(0deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

}
/*-- stop 2 color --*/
.about-app-area .single-about-app-box .icon i,
.counter-area .single-counter-box .icon i
{
    stop-color: <?php echo $color2 ?>;
    background: -webkit-linear-gradient(0deg, <?php echo $color ?> 0%, <?php echo $color2 ?> 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
}
.back-to-top
{
    background-color:<?php echo $color ?>;
    border-color: <?php echo $color ?>;
}
.back-to-top:hover
{
    color: #000;
    border-color: <?php echo $color2 ?>;
}


