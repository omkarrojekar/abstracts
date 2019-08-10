
<div class="row">
   <hr>
   <?php foreach ($editAbstract as $row): ?>
   <form action="<?php echo base_url(); ?>userabstract/updateabstract" class="m-2" method="post" enctype="multipart/form-data">
      <!--TITLE-->
      <div class="col-xl-12">
          <div class="form-group">
               <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo $row->title; ?>">
          </div>
      </div>
      <div class="col-xl-12"><?php echo form_error('title', '<div class="error" style="color:red;">', '</div>'); ?></div>


        <!--Select Abstract Category-->
         <div class="col-xl-12">
         <div class="form-group input-group">
            <div class="input-group-prepend">
              <label for="category">Abstract Category :</label>
            </div>
        </div>
      </div>
        <div class="col-xl-12">
             <select class="form-control" name="category">
              <option value="">--Select Category--</option>
              <?php foreach($category as $abs_category){ ?>
                <option value="<?php echo $abs_category->category; ?>" <?php if($abs_category->category == $row->category){{echo "selected='selected'";}}?>>
                    <?php echo $abs_category->category; ?>
                </option>';
                <?php } ?>
              </select>
        </div> <!-- form-group// --> 
        <div class="col-xl-12"><?php echo form_error('category', '<div class="error" style="color:red;">', '</div>'); ?></div>


    <!--Select Abstract Type-->
      <div class="col-xl-12">
         <div class="form-group input-group">
            <div class="input-group-prepend">
              <label for="type">Abstract Type :</label>
            </div>
        </div>
      </div>
        <div class="col-xl-12">
             <select class="form-control" name="type">
                <option value="">--Select Type--</option>
               <?php foreach($type as $abs_type){ ?>
                <option value="<?php echo $abs_type->type; ?>" <?php if($abs_type->type == $row->type){{echo "selected='selected'";}}?>>
                    <?php echo $abs_type->type; ?>
                </option>';
                <?php } ?>
              </select>
        </div> <!-- form-group// -->  
       <div class="col-xl-12"><?php echo form_error('type', '<div class="error" style="color:red;">', '</div>'); ?></div>



      <!--Authors-->
        <div class="col-xl-12">
          <div class="form-group">
               <label for="authores">Authores:</label>
                <input type="text" name="authores" id="authores" class="form-control" value="<?php echo $row->authors; ?>">
          </div>
      </div>
     <div class="col-xl-12"><?php echo form_error('authores', '<div class="error" style="color:red;">', '</div>'); ?></div>


    <!--Abstract BACGROUND-->
      <div class="col-xl-12">
            <label for="background*">Background*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="background" name="background" class="form-control summernote" rows="10"><?php echo $row->background; ?></textarea>
         </div>
      </div>
      <div class="col-xl-12"><?php echo form_error('background', '<div class="error" style="color:red;">', '</div>'); ?></div>


      <!--Abstract METHOD-->
      <div class="col-xl-12">
            <label for="method">Method*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="method" name="method" class="form-control summernote" rows="10"><?php echo $row->method; ?></textarea>
         </div>
      </div>
       <div class="col-xl-12"><?php echo form_error('method', '<div class="error" style="color:red;">', '</div>'); ?></div>



       <!--Abstract RESULT-->
      <div class="col-xl-12">
            <label for="result">Result*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="result" name="result" class="form-control summernote" rows="10" value="<?php echo set_value('result'); ?>"><?php echo $row->result; ?></textarea>
         </div>
      </div>
      <div class="col-xl-12"><?php echo form_error('result', '<div class="error" style="color:red;">', '</div>'); ?></div>
      
          <!--Abstract CONCLUSION-->
      <div class="col-xl-12">
            <label for="conclusion">Conclusion*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="conclusion" name="conclusion" class="form-control summernote" rows="10" value="<?php echo set_value('conclusion'); ?>"><?php echo $row->conclusion; ?></textarea>
         </div>
      </div>
      <div class="col-xl-12"><?php echo form_error('conclusion', '<div class="error" style="color:red;">', '</div>'); ?></div>
         <div class="col-xl-6">
        <img src="<?php echo base_url()."upload/".$this->session->username."/".$row->imageupload; ?>" alt="" style="height: 100px;">
        <a href="<?php echo base_url(); ?>userabstract/changeimage/<?= ($row->id * 50); ?>/<?= ($row->loginid * 3) ?>/<?= $row->imageupload ?>" class="btn btn-warning">Change Image</a>
       </div>
      <div class="col-md-6">
         <input type="hidden" name="abstractID" id="abstractID" class="form-control" value="<?php echo $row->id; ?>">
         <input type="hidden" name="userID" id="userID" class="form-control" value="<?php echo $row->loginid; ?>">
        <input type="submit" value="Update" class="btn btn-info">
      </div>
   </form>
    <!--IMAGE-->
   <?php endforeach; ?>
</div>



<script type="text/javascript">
		    $(document).ready(function() {
          $('.summernote').summernote({
          toolbar:[
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
        ['fontname', ['fontname']],     
        ['fontsize', ['fontsize']], 
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],      
      //fontNames: ['Helvetica', 'Arial', 'Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Thai Sans Neue Light', 'Thai Sans Neue Regular', 'Thai Sans Neue Bold'],            
      height: 350,  
      focus: true ,

          });
        });
		</script>