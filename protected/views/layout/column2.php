<?php
$this->layout = 'main';
?>
<div class="row">
	<div class="large-8 columns">
		<?php
		echo $content;
		?>
	</div>

	<div class="large-4 columns">
	<?php
	if(!isset($this->column2)):
	?>
		<h4>Getting Started</h4>
		<p>We're stoked you want to try Foundation! To get going, this file (index.html) includes some basic styles you can modify, play around with, or totally destroy to get going.</p>

		<h4>Other Resources</h4>
		<p>Once you've exhausted the fun in this document, you should check out:</p>
		<ul class="disc">
			<li><a href="http://foundation.zurb.com/docs">Foundation Documentation</a><br />Everything you need to know about using the framework.</li>
			<li><a href="http://github.com/zurb/foundation">Foundation on Github</a><br />Latest code, issue reports, feature requests and more.</li>
			<li><a href="http://twitter.com/foundationzurb">@foundationzurb</a><br />Ping us on Twitter if you have questions. If you build something with this we'd love to see it (and send you a totally boss sticker).</li>
		</ul>
	<?php
	else:
		echo $this->column2;
	endif;
	?>
	</div>
</div>
