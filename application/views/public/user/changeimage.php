<form action="<?php echo base_url(); ?>userabstract/updateimage" method="POST" enctype="multipart/form-data">
   <!--IMAGE-->
      <div class="col-xl-12">
          <div class="form-group">
               <label for="abstractImage">Upload Image:</label>
               <input type="file" name="file" id="file" class="form-control">
               <input type="hidden" name="userID" id="userID" class="form-control" value="<?php echo $userID;  ?>">
               <input type="hidden" name="oldImage" id="oldImage" class="form-control" value="<?php echo $oldImage;  ?>">
         		<input type="hidden" name="abstractID" id="abstractID" class="form-control" value="<?php echo $abstractID ?>">
          </div>
      </div>
       <div class="col-xl-12"><?php echo form_error('file', '<div class="error" style="color:red;">', '</div>'); ?></div>
      <div class="col-md-6">
        <input type="submit" value="Update Image" class="btn btn-info">
      </div>
</form>