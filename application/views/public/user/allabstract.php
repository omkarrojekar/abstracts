 	<?php if ($this->session->flashdata('delete_successfully')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('delete_successfully').'</p>'; ?>
    <?php endif; ?>


     <?php if ($this->session->flashdata('not_delete')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('not_delete').'</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('abstract_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('abstract_updated').'</p>'; ?>
  <?php endif; ?>


    <?php if ($this->session->flashdata('abstract_not_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('abstract_not_updated').'</p>'; ?>
    <?php endif; ?>


    <?php if ($this->session->flashdata('updated_file_not_uploaded')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('updated_file_not_uploaded').'</p>'; ?>
    <?php endif; ?>

     <?php if ($this->session->flashdata('no_such_abstract')): ?>
    <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('no_such_abstract').'</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('immage_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('immage_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('image_not_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('image_not_updated').'</p>'; ?>
    <?php endif; ?>
<table class="table table-hover">
	<tr>
		<th>Sr. No.</th>
		<th>Title</th>
		<th>Category</th>
		<th>Type</th>
		<th>Authors</th>
		<th class="text-center" colspan="3">Actions</th>
	</tr>
    <?php  $count = 1; //For Sr. Number?> 
	<?php foreach ($allAbstract as $row): ?>
	
	<tr>
        <td><?php  echo $count;  $count = $count + 1;  ?></td>
		<td><?php  echo $row->title; ?></td>
		<td><?php  echo $row->category; ?></td>
		<td><?php  echo $row->type; ?></td>
		<td><?php  echo $row->authors; ?></td>
		<td><a href="<?php echo base_url(); ?>userabstract/singleview/<?= ($row->id * 50); ?>/<?= ($row->loginid * 3) ?>" class="btn btn-info">View</a></td>
		<td><a href="<?php echo base_url(); ?>userabstract/edit/<?= ($row->id * 50); ?>/<?= ($row->loginid * 3)?> " class="btn btn-success">Edit</a></td>
		<td><a href="<?php echo base_url(); ?>userabstract/delete/<?= ($row->id * 50);?>/<?= ($row->loginid * 3) ?>" class="btn btn-danger" onClick="return doconfirm();">Delete</a></td>
	</tr>
	<?php endforeach; ?>
</table>
<a href="<?php echo base_url(); ?>users/dashboard" class="btn btn-info">New Abstract</a>
