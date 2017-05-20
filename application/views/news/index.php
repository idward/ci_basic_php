<hr>
<?php foreach ($news as $new_item) { ?>
	<h3><?php echo $new_item['title']; ?></h3>
	<div class="main">
		<?php echo $new_item['text'] ?>
	</div>
	<p><a href="<?php echo site_url('/news/').$new_item['slug']; ?>">View article</a></p>
	<hr>
<?php } ?>