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
  <fieldset class="large-6 columns">
    <legend> Database Credentials </legend>

    <div class="">
      <div class="">
	<select name="dbtype" class="medium">
		<option>MySQL</option>
		<option DISABLED>PostgreSQL</option>
		<option DISABLED>SQLite</option>
		<option DISABLED>MSSQL</option>
	</select>
	<input type="text" placeholder="Database Server" name="db[server]" value="" required="required">
	<input type="text" placeholder="Database Name" name="db[dbname]" required="required">
	<input type="text" placeholder="Database Username" name="db[username]" required="required">
	<input type="text" placeholder="Database Password" name="db[password]" required="required">
     </div>
    </div>

  </fieldset>
  <fieldset class="large-6 columns" style="margin-top:0px">
    <legend> ReportBubble Login </legend>

    <div class="">
      <div class="">
        <input type="email" placeholder="Email" value="" name="user[email]" required="required">
      </div>
    </div>

    <div class="">
      <div class="">
        <input type="password" placeholder="password" name="user[password]" required="required">
      </div>
    </div>

  </fieldset>
<div class="">
	<input type="submit" value="Login" class="small button large-offset-1">
	<input type="reset" value="Reset" class="small button ">
	<a class="small button large-offset-1" href="http://www.reportbubble.com">Signup @ reportbubble.com</a>
</div>

</form>

<style>
	fieldset legend{ background-color : inherit }
</style>
