<?php 
$newid = ($id*5);
echo $id;
echo "<br>";
echo $newid;
 ?>
We Have received your Forget Password Link so you can change password by clicking on this <a href="<?php echo base_url();?>users/changepasswordpage/<?= $loginCredential?>/<?= $newid ?>">link !!</a>