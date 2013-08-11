<?php
unset($this->layout);
?>
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
<style type="text/css">
body {
	overflow:hidden;
	}
</style>
</head>
<body style="overflow:hidden">
<div style="height:100%" id="wrapper">
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
              <a href="#" class=" button">Ask Question</a>
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
 
<script type="text/javascript" src="http://localhost/reportbubble/ckeditor/ckeditor.js" ></script>
<script>

CKEDITOR.config.sharedSpaces = {
	'top' : 'myToolbar',
	'bottom' : 'cketop_1',
	};
</script>
<div id="myToolbar" style="position:fixed;left:0px;right:0px;"></div>

<div style="position:absolute;overflow:scroll;margin-bottom:50px;height:600px;left:0px;right:0px;padding-left:100px;margin-top:40px;background:#999" >


<form action="" method="post" style="margin-top:20px;width:10px;display:inline-block;margin-bottom:30px" name="editarea">
<textarea id="page_editor" name="text" ><?php echo $doc->text; ?></textarea>
<br />
<input type="hidden" name="action" class="btn btn-inverse" value="save_doc" />
</form>
<script>
CKEDITOR.replace( 'page_editor', {
	extraPlugins : 'sharedspace,autogrow,save,preview,colorbutton,pagebreak,justify,generate',
	width : '720',
	autoGrow_minHeight : '1000',
	allowedContent : true,
	height : '1000',
	removePlugins : 'resize',
	toolbarGroups: [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'bubbletools'},
		{ name: 'others' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors', groups: ['colorbutton'] },
 		{ name: 'links' },
 		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },			// Groups name will be used to create voice label.
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'insert' },
		{ name: 'forms' },
		//{ name: 'tools' },
	
	]
});
</script>
<?php    /*
<div class="span3 pull-right" style=";color:#000;background:#fff;padding:20px;">
<h3>Entities</h3>
Choose entities from this dialog and drag it to the editor.
<?php
echo '<ul class="nav nav-list">';
foreach ($column as $key=>$val) {
	echo '<li>{{'.$val.'}}</li>';
}
echo '</ul>';
?>
</div>
 */ ?> 
</div>
</div>


<div id="cketop_1" style="position:fixed;left:0px;right:0px; bottom:0px"></div>


  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '<?php echo Mvcpp::$config['cdn'] ?>/assets/js/vendor/zepto' : '<?php echo Mvcpp::$baseUrl ?>/assets/js/vendor/jquery') +
  '.js><\/script>');
  </script>

  <script src="<?php echo Mvcpp::$config['cdn'] ?>/assets/js/foundation.min.js"></script>
<script>
    $(document).foundation();

</script>
</body> 

</html>
