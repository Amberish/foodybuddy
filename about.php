<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>FoodyBuddy | About</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/superfish.css" media="screen" />

<!--###CUSTOM CSS###-->
<link rel="stylesheet" type="text/css" href="css/myCss.css" />
<!--###CUSTOM CSS###-->


<style type="text/css">.sf-sub-indicator {behavior: url(css/iepngfix.htc);}</style>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="javascript/scripts/jquery.min.js"></script>
<script type="text/javascript" src="javascript/jquery.cycle.all.js"></script>
<script type="text/javascript" src="javascript/thickbox.js"></script>
<script type="text/javascript" src="javascript/superfish.js"></script>
<script type="text/javascript" src="javascript/dd.min.js"></script>

<!--##########CUSTOM SCRIPTS BEGINS#############-->
<script type="text/javascript" src="javascript/myScript.js"></script>
<!--##########CUSTOM SCRIPTS ENDS#############-->

<script type="text/javascript">
//<![CDATA[
// initialise plugins
$(document).ready(function () {
    if ($('#slider').length == 1) {
        $('#slider').cycle({
            fx: 'fade',
            speed: 2000,
            timeout: 4000
        });
    }
    var ie6 = $.browser.msie && /MSIE 6.0/.test(navigator.userAgent);
    if (!ie6) {
        $('ul.sf-menu').superfish({
            delay: 1000,
            // one second delay on mouseout 
            animation: {
                opacity: 'show',
                height: 'show'
            },
            // fade-in and slide-down animation 
            speed: 'normal' // faster animation speed 
        });
    }
    else {
        DD_belatedPNG.fix('#topbar, img, a, .commentbubble, .infobubble, .view-all, #category-picture1, #category-picture2, #category-picture3, #footer');
    }
});
//]]>
</script>
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">
  <!-- Top bar -->
  <div id="topbar">
    <!-- Logo -->
    <img class="logo" src="images/logo.png" alt="" />
    <!-- Menu -->
    <?php
		if(!isset($_SESSION['username'])){
	?>
        <div id="secnav">
          <ul>
            <li> <a href="#" onclick="showSignupPanel()">SIGN UP</a> </li>
            <li class="noimg"> <a href="#" onclick="showLoginPanel()">LOGIN</a> </li>
          </ul>
        </div>
    <?php
		}else{
			
	?>
    	<div id="secnav">
          <ul>
            <li> <a href="manage.php" onclick="manage()">MANAGE</a> </li>
            <li class="noimg"> <a href="logout.php">LOGOUT</a> </li>
          </ul>
        </div>
     <?php } ?>
    <div class="menu">
      <ul class="sf-menu">
        <li> <a href="index.php">HOME</a></li>
        <li> <a class="on" href="about.php">ABOUT</a>
          <ul>
            <li class="first"><a href="#">TEAM</a></li>
            <li><a href="#">PHILOSOPHY</a></li>
            <li><a href="#">COMPANY</a></li>
            <li class="last"><a href="#">PRODUCTS</a>
              <ul>
                <li class="first"><a href="#">PRODUCT ONE</a></li>
                <li><a href="#">PRODUCT TWO</a></li>
                <li class="last"><a href="#">PRODUCT THREE</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li> <a href="portfolio.php">PORTFOLIO</a>
          <ul>
            <li><a href="#">WEBDESIGN</a></li>
            <li><a href="#">PHOTOS</a>
              <ul>
                <li class="first"><a href="#">NATURE</a></li>
                <li><a href="#">ANIMALS</a></li>
                <li class="last"><a href="#">CITIES</a>
                  <ul>
                    <li class="first"><a href="#">NEW YORK</a></li>
                    <li><a href="#">MONTREAL</a></li>
                    <li class="last"><a href="#">LAS VEGAS</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="last"><a href="#">ARTS</a></li>
          </ul>
        </li>
        <li> <a href="blog.php">BLOG</a>
          <ul>
            <li class="first"><a href="#">CATEGORY ONE</a></li>
            <li><a href="#">CATEGORY TWO</a></li>
            <li class="last"><a href="#">CATEGORY THREE</a></li>
          </ul>
        </li>
        <li> <a href="contact.php">CONTACT</a> </li>
      </ul>
    </div>
    <!-- End of Menu -->
  </div>
  <!-- End of Topbar -->
  <!-- Introtext -->
  <div id="introtext">
    <h1>EXEMPLE OF A STATIC PAGE +</h1>
    <p>Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet. Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet.Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet. </p>
    <div class="clear"></div>
  </div>
  <!-- End of introtext -->
  <!-- Content -->
  <div id="content">
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Recent post -->
      <div id="recentpost">
        <h1>RECENT POST FROM THE BLOG +</h1>
        <div class="post"> <a href="#">ADDING SPARKLE TO FASHION PHOTOGRAPHY</a>
          <div class="popularcomments"> <a href="#">55 COMMENTS</a>
            <div class="readit"><a href="#">READ IT</a></div>
          </div>
        </div>
        <div class="post"> <a href="#">HOW TO CREATE A DARK SURREAL ILLUSTRATION IN PHOTOSHOP</a>
          <div class="popularcomments"> <a href="#">41 COMMENTS</a>
            <div class="readit"><a href="#">READ IT</a></div>
          </div>
        </div>
        <div class="post"> <a href="#">THREE SHORT TUTORIALS FOR PHOTOGRAPHERS </a>
          <div class="popularcomments"> <a href="#">33 COMMENTS</a>
            <div class="readit"><a href="#">READ IT</a></div>
          </div>
        </div>
        <div class="post"> <a href="#">HOW TO CREATE A PHOTO MANIPULATION OF A FLOODED CITY SCENE</a>
          <div class="popularcomments"> <a href="#">12 COMMENTS</a>
            <div class="readit"><a href="#">READ IT</a></div>
          </div>
        </div>
      </div>
      <!-- End of recent post -->
      <!-- Blog category -->
      <div id="blogcategory">
        <h1>CATEGORY +</h1>
        <ul>
          <li><a href="#">PHOTO EFFECTS</a></li>
          <li><a href="#">CREATIVE INSPIRATIONS</a></li>
          <li><a href="#">INTERVIEW</a></li>
          <li><a href="#">JOBS</a></li>
        </ul>
      </div>
      <!-- End of blog category-->
    </div>
    <!-- End of sidebar-->
    <h1>LATEST WORK +</h1>
    <div class="left-article"> <a class="thickbox" href="images/photo1big.jpg"><img src="images/photo1.png" alt=""/></a> <a class="thickbox" href="images/photo2big.jpg" ><img class="right" src="images/photo2.png" alt=""  /></a> <a class="thickbox"  href="images/photo3big.jpg" ><img src="images/photo3.png" alt="" /></a> <a class="thickbox" href="images/photo4big.jpg" ><img class="right" src="images/photo4.png" alt=""  /></a>
      <p>&nbsp;</p>
      <h1>EXEMPLE OF ELEMENTS +</h1>
      <p>This is a paragraph : Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet. Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet.Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet. </p>
      <p>This is a paragraph : Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet. Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet.Aliquam luctus lectus sit amet nifacilisis feugiat. Morbi ullamcorper sem ut justo gravida at imperdiet. </p>
    </div>
    <!-- End of content-->
  </div>
  <div class="clear"></div>
  <!-- Footer-->
  <div id="footer">
    <div class="info">&copy; 2009 StudioCLICK | DESIGNED AND DEVELOPPED BY <a href="http://freepsdtheme.com/">DDSTUDIOS</a></div>
    <div class="infonav"> <a href="#">HOME</a> | <a href="#">ABOUT</a> | <a href="#">PORTFOLIO</a> | <a href="#">BLOG</a> | <a href="#">CONTACT</a> </div>
  </div>
  <!-- End of footer-->
</div>
<!-- End of wrapper -->
<!--#######Including  Added Modules BEGINS######-->
<?php include('AddedModules.php'); ?>
<!--#######Including  Added Modules ENDS######-->

</body>
</html>
