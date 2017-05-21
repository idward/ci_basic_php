
<table>
	<tr>
		<th>Title</th>
		<th>Slug</th>
		<th>Text</th>
		<th>Action</th>
	</tr>	
	<?php foreach ($newsList as $newItem) { ?>
		<tr>
			<td><?php echo $newItem['title'] ?></td>
			<td><?php echo $newItem['slug'] ?></td>
			<td><?php echo $newItem['text'] ?></td>
			<td><a href="<?php echo site_url('/news/update/').$newItem['id'] ?>">update</a></td>
		</tr>
	<?php } ?>
</table>
<hr>