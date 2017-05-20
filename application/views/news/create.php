<div style="color:red;">
	<?php echo validation_errors(); ?>
</div>

<?php echo form_open('news/create'); ?>

<label for="title">Title</label>
<input type="text" name="title" id="title"><br><br>

<label for="text">Text</label>
<textarea name=text></textarea><br><br>

<input type="submit" name="submit" value="Create news item">

</form>