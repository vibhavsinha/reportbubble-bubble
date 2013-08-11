<?php
$this->showbanner =false;

?>
<h2 class="subheader">
Files
</h2>


<ul class="inline-list">
<li><a href="#" data-reveal-id="uploadFile" >Upload File</a></li>
<li><a href="#" data-reveal-id="newFolder" >New Folder</a></li>
<li><a href="#" data-reveal-id="createBubble" >Create Bubble</a></li>
</ul>


<table style="width:100%">
<tr>
	<th width="50">#</th>
	<th>Title</th>
	<th width="100">Size</th>
	<th width="200">Date Created</th>
	<th></th>
</tr>
<?php foreach($files as $key=>$val) : ?>
<tr <?php
if ($val->type == 4) {
	echo"style=\"background-color : #cc9\"";
}
?>>
	<td><?php
	echo '<img src="filetype'.$val->type.'.jpg">';
	?></td>
	<td>
		<a href="./?r=site/doc&id=<?php echo $val->id ?>"><?php echo $val->name; ?></a>
	</td>
	<td><?php echo $val->size/1000 ."kb"; ?></td>
	<td><?php echo $val->date; ?></td>
	<?php
	if($val->type == 4):
	?>
		<td> <a href="./?r=site/bulk&id=<?php echo $val->id ?>" class=''>Bulk</a></td>
		<td><a href="./?r=site/dynamic&id=<?php echo $val->id ?>" class='' href=''>dynamic</a></td>
		<td><a href="./?r=site/filters&id=<?php echo $val->id ?>" class=''>filters</a></td>
	<?php
	endif;
	?>
</tr>
<?php endforeach; ?>
</table>

<div id="uploadFile" class="reveal-modal">
	<div class="row">
		<h4>Upload your file here.</h4>
		<form class="custom">
		<div class="small-7 columns"><input type="file" placeholder="name of doc"></div>
		<div id="small-2  columns">
			<input type="submit" name="newdoc" value="Create" class="small button">
		</div>
		</form>
	</div>
<a class="close-reveal-modal">&#215;</a>
</div>

<div id="createBubble" class="reveal-modal">
	<div class="row">
		<h4>Create a new Bubble Doc</h4>
		<form class="custom" method="post">
		<div class="small-7 columns"><input type="text" placeholder="name of doc" name="newdoc[title]"></div>
		<div  class="small-3 columns">
			<select name="newdoc[base]" id="doc_base">
				<?php
				foreach ($tables as $key) {
					echo "<option value='".$key['table_name']."'>".$key['table_name']."</option>";
				}
				?>
			</select>
		</div >
		<div id="small-2  columns">
			<input type="submit" name="newdoc[btn]" value="Create" class="small button">
		</div>
		</form>
	</div>
<a class="close-reveal-modal">&#215;</a>
</div>

<div id="newFolder" class="reveal-modal">
<form>
<div class="row">

<h4>Enter the name of the new folder.</h4>
	<div class="row collapse">
		<div class="small-10 columns">
		<input type="text" placeholder="new folder name" name="newfolder" />
		</div>
		<div class="small-2 columns">
		<a href="#" class="button prefix">Create</a>
		</div>
	 </div>
<p>Folder will be made inside your current path</p>
</div>
<a class="close-reveal-modal">&#215;</a>
</div>

