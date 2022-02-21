<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <div class="card card-stats card-round">
                  <div class="card-body">
                     <div class="row align-items-center">
                       
                        </div>
                        <div class="container">
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
    <form action="<?= base_url('Articlecheck/update/'.$articleedit->id) ?>" name="editaddform" enctype="multipart/form-data" method="post" accept-charset="utf-8">
       <div class="field">
            <label class="label">Article Title </label>
            <div class="control">
                <input id="title" name="title" class="input" type="text" size=100 value="<?= $articleedit->title ?>"  placeholder="Add Title">
            </div>
        </div>
        
        <div class="field">
            <label class="label">Folder Name</label>
            <div class="control">
                <input id="folder_name" name="folder_name" class="input" type="text" value="<?= $articleedit->folder_name ?>" readonly>
            </div>
        </div>
        
        <?php 
        $pop_select = $articleedit->category;
        ?>
         <div class="field">
            <label class="label">Category</label>
            <div class="control">
            <select class="form-control" id="category" name="category" >
            <option value="Select One">Select One</option> 
            <?php foreach($categories as $cate){?>
            <option value="<?php echo $cate->id?>" 
            <?php if($pop_select==$cate->id) echo "selected";?>><?php echo $cate->category?></option>
            <?php } ?>
            </select>
            </div>
        </div>
        
        <?php 
        $sub_pop_select = $articleedit->subcategory;
        ?>
         <div class="field">
            <label class="label">Sub Category</label>
            <div class="control">
            <select class="form-control" id="subcategory" name="subcategory" >
            <option value="">Select One</option>
            <?php foreach($subcategory as $cate){?>
            <option value="<?php echo $cate->id?>" 
            <?php if($sub_pop_select==$cate->id) echo "selected";?>><?php echo $cate->subcategory?></option>
            <?php } ?>
            </select>
            </div>
        </div>
        
         <div class="field">
            <label class="label">Meta Keywords</label>
            <div class="control">
            <textarea class='editor' name='meta_keywords'>
					<?php if(isset($articleedit->meta_keywords)){ echo $articleedit->meta_keywords; } ?>
			</textarea>
            </div>
        </div>
        
         <div class="field">
            <label class="label">Meta Description</label>
            <div class="control">
             <textarea class='editor' name='meta_desc'>
					<?php if(isset($articleedit->meta_desc)){ echo $articleedit->meta_desc; } ?>
			</textarea>
            </div>
        </div>
        
         <div class="field">
            <label class="label">Meta Tags</label>
            <div class="control">
            <textarea class='editor' name='meta_tags'>
					<?php if(isset($articleedit->meta_tags)){ echo $articleedit->meta_tags; } ?>
			</textarea>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Fake Views</label>
            <div class="control">
                <input id="fake_views" name="fake_views" class="input" type="text" value="<?= $articleedit->fake_views ?>" placeholder="Add fake view numbers">
            </div>
        </div>
        
       <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="editform()">Update Article</button>
        </div>
        <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="updatecancelform()">Cancel</button>
        </div>
    </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
        </div>

        </div>
        <form action="<?php echo base_url()?>Articlecheck/" name="cancelForm" method="post">
        <input type="hidden" name="cancel" value="true">
        </form>
        <script type="text/javascript">
            < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            function editform(){
            	document.editaddform.submit();
            }
            function updatecancelform(){
            	document.cancelForm.submit();
            }
            tinymce.init({ 
                selector:'.editor',
                theme: 'modern',
                height: 200
              });
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
               
            });

            $(document).ready(function(){
           	 $('#category').change(function(){
           	  var cat_id = $('#category').val();
           	  if(cat_id != '')
           	  {
           	   $.ajax({
           	    url:"<?php echo base_url(); ?>Articlecheck/get_sub_category",
           	    method:"POST",
           	    data:{cat_id:cat_id},
           	    success:function(data)
           	    {
           	     $('#subcategory').html(data);
           	    }
           	   });
           	  }
           	  else
           	  {
           	   $('#subcategory').html('<option value="">Select Sub Category</option>');
           	  }
           	 });
           });
            
        </script>