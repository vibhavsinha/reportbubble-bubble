<h3 ><?php
echo $doc->name;
if(!isset($cols))
	$cols = array('sfdsf','sfsdf','sfdsfs');
$crit = array(
	'equal to', 'less than', 'greater than', 'contains'
);
?></h3>
<strong >Choose Filters</strong>
<form method="post" accept-charset="utf-8" class="custom">
	<section id="filters">
	<div class="row">
		<div class="large-4 columns">
			<select name="type[0]" >
				<?php foreach($cols as $key): ?>
					<option value-="1"><?php echo $key ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="large-4 columns">
			<select name="type[0]" >
				<?php foreach($crit as $key): ?>
					<option value-="1"><?php echo $key ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="large-3 columns">
			<input type="text" name="value{0}" value="">
		</div>
		<div class="large-1 columns">
			<input type="button" name="remove" value="&times;" class="tiny button alert removerow">
		</div>
	</div>
	</section>
	<div class="row">
		<div class="large-centered columns" style="text-align:center">
			<a href="#" class="small button success" id="addbutton" >Add more..</a>
		</div>
	</div>

</form>
<script type="text/javascript" charset="utf-8">
	var a = document.getElementById('filters').innerHTML;
	document.getElementById('addbutton').onclick = function(){
		document.getElementById('filters').innerHTML += a;
		$(document).foundation();
	};
	document.body.onload = function(){
		alert('sdfsdf');
	};
	document.getElementsByClassName('removerow').onclick = function(){
			alert('zdhjdbkjsadks');
	};
</script>
