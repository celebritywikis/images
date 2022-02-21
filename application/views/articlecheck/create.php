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
    
    <form action="<?= base_url('Articlecheck/store/') ?>" name="addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        
        
        <div class="field">
            <label class="label">Article Title </label>
            <div class="control">
                <input id="title" name="title" class="input" type="text" size=100 name="type" class="input" type="text"  placeholder="Add Title">
            </div>
        </div>
        
        <div class="field">
            <label class="label">Folder Name</label>
            <div class="control">
                <input id="folder_name" name="folder_name" class="input" type="text" value="<?php echo set_value('folder_name'); ?>" placeholder="Add Folder Name">
            </div>
        </div>
        
         <div class="field">
            <label class="label">Category</label>
            <div class="control">
            <select class="form-control" id="category" name="category">
            <option value="">Select One</option>
            <?php foreach($categories as $cate){?>
            <option value="<?php echo $cate->id?>"><?php echo $cate->category?></option>
            <?php } ?>
            </select>
            </div>
        </div>
        
       <!--  <div class="field">
            <label class="label">Sub Category</label>
            <div class="control">
            <select id="category" name="subcategory" style="width:200px;">
            <option value="">Select One</option>
            <?php foreach($subcategory as $cate){?>
            <option value="<?php echo $cate->id?>"><?php echo $cate->subcategory?></option>
            <?php } ?>
            </select>
            </div>
        </div>
         -->
         <div class="field">
            <label class="label">Sub Category</label>
            <div class="control">
        <select class="form-control" id="subcategory" name="subcategory" required>
                        <option>No Selected</option>
 
        </select>
        </div>
        </div>
        
        <div class="field">
            <label class="label">Meta Keywords</label>
            <div class="control">
            <textarea class='editor' name='meta_keywords' value="<?php echo set_value('meta_keywords'); ?>">
					
			</textarea>
            </div>
        </div>
        <div class="field">
            <label class="label">Meta Description</label>
            <div class="control">
             <textarea class='editor' name='meta_desc' value="<?php echo set_value('meta_desc'); ?>">
			</textarea>
            </div>
        </div>
         <div class="field">
            <label class="label">Tags</label>
            <div class="control">
             <textarea class='editor' name='meta_tags' value="<?php echo set_value('meta_tags'); ?>">
			</textarea>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Fake Views</label>
            <div class="control">
                <input id="fake_views" name="fake_views" class="input" type="text" value="<?php echo set_value('fake_views'); ?>" placeholder="Add fake view numbers">
            </div>
        </div>

		<br>


       <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="addform()">Add Article</button>
        </div>
        <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="addcancelform()">Cancel</button>
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
        <script type="text/javascript">
            < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<form action="<?php echo base_url()?>Articlecheck/" name="addcancelForm" method="post">
        </form>
        <script type="text/javascript">

        function addform(){
        	document.addForm.submit();
        }
            
            function addcancelform(){
            	document.addcancelForm.submit();
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