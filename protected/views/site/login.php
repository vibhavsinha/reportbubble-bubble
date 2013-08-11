<?php /*<div class="row" style="border-bottom:4px solid rgb(34, 132, 161)">
	<div class="small-5 small-centered columns">
		<h1 style="color:rgb(43, 166, 203)"><?php echo strtoupper(Mvcpp::$config['name']) ?></h1>
	</div>
	<div class="small-6 small-centered columns" style="text-align:center">
		<em class="subheader">Bringing the power of documents to your database</em>
	</div>
</div>
*/ ?>
<form class="row custom panel" style="margin-top: 20px; border-top: 4px solid rgb(43, 166, 203)" method="post">
  <fieldset class="large-5 large-centered columns" style="margin-top:0px">
    <legend> ReportBubble Login </legend>

    <div class="">
      <div class="">
        <input type="email" placeholder="Email" name="User[email]" required="required">
      </div>
    </div>

    <div class="">
      <div class="">
        <input type="password" placeholder="password" name="User[password]" required="required">
      </div>
    </div>
<div class="">
	<input type="submit" value="Login" class="tiny button" class="has-tip tip-left" title="Use the same login as you created on reportbubble.com" data-tooltip="left">
	<input type="reset" value="Reset" class="tiny button ">
	<br />
	<a class="tiny  button" href="http://www.reportbubble.com">Signup @ reportbubble.com</a>
</div>


  </fieldset>
</form>

<style>
	fieldset legend{ background-color : inherit }
</style>
