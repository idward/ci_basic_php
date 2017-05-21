<div style="color:red;">
	<?php echo validation_errors(); ?>
</div>

<?php if (isset($id)) { ?>
	<?php echo form_open('news/updateHandle'); ?>

	<label for="title">Title</label>
	<input type="text" name="title" id="title" value="<?php echo $news_item['title']; ?>"><br><br>
	
	<label for="text">Text</label>
	<textarea name="text" id="text"><?php echo $news_item['text']; ?></textarea><br><br>

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<input type="submit" name="submit" value="Update news item">
<?php } else { ?>
	<?php echo form_open('news/create'); ?>

	<label for="title">Title</label>
	<input type="text" name="title" id="title"><br><br>

	<label for="text">Text</label>
	<textarea name="text" id="text"></textarea><br><br>

	<input type="submit" name="submit" value="Create news item">

<?php } ?>


</form>