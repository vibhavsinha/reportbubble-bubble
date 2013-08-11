<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en" > <!--<![endif]-->
<head>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title><?php echo Mvcpp::$config['name'] ?></title>
  <link rel="stylesheet" href="<?php echo Mvcpp::$config['cdn'] ?>/assets/css/foundation.min.css" />
  <script src="<?php echo Mvcpp::$config['cdn'] ?>/assets/js/vendor/custom.modernizr.js"></script>
<style type="text/css" media="screen">
	@font-face {
		font-family: 'GeneralFoundicons';
		src: url("<?php echo Mvcpp::$config['cdn'] ?>/fonts/general_foundicons.eot");
		src: url("<?php echo Mvcpp::$config['cdn'] ?>/fonts/general_foundicons.eot?#iefix") format('embedded-opentype'),
		url('<?php echo Mvcpp::$config['cdn'] ?>/fonts/general_foundicons.woff') format('woff'),
		url('<?php echo Mvcpp::$config['cdn'] ?>/fonts/general_foundicons.ttf') format('truetype'),
		url('<?php echo Mvcpp::$config['cdn'] ?>/fonts/general_foundicons.svg#[set]Foundicons') format('svg');
		font-weight: normal;
		font-style: normal;
	}
	 
	 [class*="foundicon-"] {
		 display: inline;
		 width: auto;
		 height: auto;
		 line-height: inherit;
		 vertical-align: baseline;
		 background-image: none;
		 background-position: 0 0;
		 background-repeat: repeat;
	 }
	  
	  [class*="general foundicon-"]:before {
		  font-family: "GeneralFoundicons";
		  font-weight: normal;
		  font-style: normal;
		  text-decoration: inherit;
		  content : 'a';
	  }
	  html, body{
		  height:100%;
	  }
	  #wrapper{
		min-Height : 100% !important;
		min-height: 100%;
		height: auto !important;
	        height: 100%;
		margin: 0 auto -80px;
	  }
</style>
</head>
<body>
<div id="wrapper">
<nav class="top-bar" style="margin-bottom:0px">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="#">Report Bubble </a></h1>
    <li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>
  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
      <li class="divider"></li>
    <li class="divider"></li>
    <li class="has-form" style="width:500px">
        <form>
          <div class="row collapse">
            <div class="small-7 columns">
              <input type="text">
            </div>
            <div class="small-5 columns">
              <a href="#" class="button">Ask Question</a>
            </div>
          </div>
        </form>
      </li>


   </ul>

    <!-- Right Nav Section -->
    <ul class="right">
      <li class="divider hide-for-small"></li>
       <li class="has-dropdown"><a href="#">Help</a>

        <ul class="dropdown">
          <li><a href="#">Getting Started</a></li>
          <li><a href="#">Creating Documents</a></li>
          <li><a href="#">Bulk Generation</a></li>
          <li><a href="#">Dynamic pdf links</a></li>
          <li><a href="#">Using Entity Relations</a></li>
          <li class="divider"></li>
          <li><a href="#">See all &rarr;</a></li>
        </ul>
      </li>
      <li class="divider"></li>

      <li class="has-dropdown"><a href="#"><?php echo (Mvcpp::$user->isGuest)?'Guest':Mvcpp::$user->username ?></a>
        <ul class="dropdown">
          <li><label>Dropdown Level 1 Label</label></li>
          <li><a href="./?r=site/files">Files</a></li>
          <li><a href="./?r=site/entities">Entities</a></li>
          <li><a href="./?r=site/files">ParaLinks</a></li>
          <li class="divider"></li>
          <li><a href="./?r=site/settings">Settings</a></li>
          <li class="divider"></li>
          <li><a href="./?r=site/logout">Logout</a></li>
        </ul>
      </li>
      <li class="divider"></li>
    </ul>
  </section>
</nav>
<style>
.orbit-bullets, .orbit-timr, .orbit-slide-number, .orbit-prev, .orbit-next {display:none}
</style>
<?php
if($this->showbanner):
?>

<ul data-orbit >
	<li>
<div class="contain-to-grid" style="background:#3ac;margin-top:0px;color:#fff">
	<div class="row">
		<div class="small-6 columns">
			<h4 class="subheader" style="color:#fff"> Create Bulk Documents</h4>
			<p style="color:#fff">Generate bulk of documents with one click for analytical and report generation uses.</p>
		</div>
	</div>
</div>
	</li>
	<li>
<div class="contain-to-grid" style="background:#3ac;margin-top:0px;color:#fff">
	<div class="row">
		<div class="small-6 columns">
			<h4 class="subheader" style="color:#fff"> Dynamic Links</h4>
			<p style="color:#fff">Create custom parameter based links for downloading documents and pages .</p>
		</div>
	</div>
</div>
	</li>
</ul>

<?php
endif;
echo $content;
?>
	<div style="height:80px">

	</div>
</div>
<!--WRAPPER ENDS-->
<?php
if(!isset($this->hideFooter)):
?>
<div class="contain-to-grid contain-to-grid" id="footer" style="padding:20px;color:#999;height:80px;">
	<div class="row">
		<div class="large-4 columns large-centered" style="text-align:center">
			A product of WebDweb Systems
		</div>
	</div>
</div>
<?php
endif;
?>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '<?php echo Mvcpp::$config['cdn'] ?>/assets/js/vendor/zepto' : '<?php echo Mvcpp::$baseUrl ?>/assets/js/vendor/jquery') +
  '.js><\/script>');
  </script>

  <script src="<?php echo Mvcpp::$config['cdn'] ?>/assets/js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  <script src="js/foundation/foundation.interchange.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  -->
  <?php
if(!isset($this->hideFooter)):
?>
  <script>
    $(document).foundation();/*
  document.body.onload = function(){
  	document.getElementById('wrapper').style.minHeight = window.innerHeight - 50 + "px";
	return true;
  };*/
  </script>

<?php
endif;
?>
</body>
</html>
