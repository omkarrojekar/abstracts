<div class="row">
    <?php if ($this->session->flashdata('abstract_stored')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('abstract_stored').'</p>'; ?>
    <?php endif; ?>


    <?php if ($this->session->flashdata('abstract_not_stored')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('abstract_not_stored').'</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('file_not_uploaded')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('file_not_uploaded').'</p>'; ?>
    <?php endif; ?>



   <div class="col-md-10">
      <h2><?php echo "Welcome "; ?> <strong><?php echo $this->session->username; ?></strong></h2>
   </div>
   <div class=" col-md-2">
        <a href="<?php echo base_url(); ?>users/logout" class="btn btn-danger" style="text-align: right; margin-top: 1em">Logout</a>
   </div>
</div>
<div class="row">
   <hr>
   <form action="<?php echo base_url(); ?>userabstract/submit" class="m-2" method="post" enctype="multipart/form-data">
      <!--TITLE-->
      <div class="col-xl-12">
          <div class="form-group">
               <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="<?php echo set_value('title'); ?>">
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
              <option value="" selected="selected">--Select Category--</option>
              <?php foreach($category as $abs_category){ ?>
                <option value="<?php echo $abs_category->category; ?>">
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
                <option value="" selected="selected">--Select Type--</option>
               <?php foreach($type as $abs_type){ ?>
                <option value="<?php echo $abs_type->type; ?>">
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
                <input type="text" name="authores" id="authores" class="form-control" value="<?php echo set_value('authores'); ?>">
          </div>
      </div>
    <div class="col-xl-12"><?php echo form_error('authores', '<div class="error" style="color:red;">', '</div>'); ?></div>


    <!--Abstract BACGROUND-->
      <div class="col-xl-12">
            <label for="background*">Background*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="background" name="background" class="form-control summernote" rows="10"><?php echo set_value('background'); ?></textarea>
         </div>
      </div>
      <div class="col-xl-12"><?php echo form_error('background', '<div class="error" style="color:red;">', '</div>'); ?></div>


      <!--Abstract METHOD-->
      <div class="col-xl-12">
            <label for="method">Method*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="method" name="method" class="form-control summernote" rows="10"><?php echo set_value('method'); ?></textarea>
         </div>
      </div>
         <div class="col-xl-12"><?php echo form_error('method', '<div class="error" style="color:red;">', '</div>'); ?></div>


       <!--Abstract RESULT-->
      <div class="col-xl-12">
            <label for="result">Result*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="result" name="result" class="form-control summernote" rows="10"><?php echo set_value('result'); ?></textarea>
         </div>
      </div>
        <div class="col-xl-12"><?php echo form_error('result', '<div class="error" style="color:red;">', '</div>'); ?></div>
          <!--Abstract CONCLUSION-->
      <div class="col-xl-12">
            <label for="conclusion">Conclusion*:</label>
      </div>
      <div class="col-xl-12">
         <div class="form-group">
            <textarea  id="conclusion" name="conclusion" class="form-control summernote" rows="10"><?php echo set_value('conclusion'); ?></textarea>
         </div>
      </div>
       <div class="col-xl-12"><?php echo form_error('conclusion', '<div class="error" style="color:red;">', '</div>'); ?></div>

       <!--IMAGE-->
      <div class="col-xl-12">
          <div class="form-group">
               <label for="abstractImage">Upload Image:</label>
                <input type="file" name="file" id="abstractImage" class="form-control" value="<?php echo set_value('file'); ?>">
          </div>
      </div>
       <div class="col-xl-12"><?php echo form_error('file', '<div class="error" style="color:red;">', '</div>'); ?></div>
      <div class="col-md-6">
        <input type="submit" value="Save" class="btn btn-info">
      </div>
      <div class="col-md-6">
        <a href="<?php echo base_url()?>userabstract/allabstract" class="btn btn-success">See your abstracts</a>
      </div>
    
   </form>
</div>

<script type="text/javascript">
    function registerSummernote(element, placeholder, max, callbackMax) {
    $(element).summernote({
      toolbar: [
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
      height : 250,
      placeholder,
    });
  }


$(function(){
  registerSummernote('.summernote', 'Leave a comment', 400, function(max) {
    $('#maxContentPost').text(max)
  });
});
</script>

<script type="text/javascript">
 /* 
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
   */    
</script>
  

  <h1 class="text-center">hola</h1>
      <div class="col-xs-12">
      <div class="summernote"></div>
    </div>
    <div class="col-xs-12 text-right">
      <span id="maxContentPost"></span>
    </div>
 
 