<?php foreach ($singleAbstract as $row): ?>
<h5 class="text-right"><strong>Created On:- <?php echo $row->date; ?></strong></h5>
<h5 class="text-right"><strong>Last Updated:- <?php echo $row->lastupdate; ?></strong></h5>
<table class="table">
	
	<tr>
		<th>Title</th>
		<td><?php echo $row->title; ?></td>
	</tr>
	<tr>
		<th>Abstract Category</th>
		<td><?php echo $row->category; ?></td>
	</tr>
	<tr>
		<th>Abstract Type</th>
		<td><?php echo $row->type; ?></td>
	</tr>
	<tr>
		<th>Authors</th>
		<td><?php echo $row->authors; ?></td>
	</tr>
	<tr>
		<th>Background</th>
		<td><?php echo $row->background; ?></td>
	</tr>
	<tr>
		<th>Method</th>
		<td><?php echo $row->method; ?></td>
	</tr>
	<tr>
		<th>Conclusion</th>
		<td><?php echo $row->conclusion; ?></td>
	</tr>
	<tr>
		<th>Image</th>
		<td><img src="<?php echo base_url(); ?>upload/<?php echo $this->session->username; ?>/<?php echo $row->imageupload; ?>" alt="image" class="img img-thumbnail img-responsive" ></td>
	</tr>
	
</table>
<?php endforeach; ?>