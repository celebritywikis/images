<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <div class="card card-stats card-round">
                  <div class="card-body">
                     <div class="row align-items-center">
                       <!--  <div class="col-icon">
                           <div class="icon-big text-center icon-info bubble-shadow-small">
                              <i class="far fa-newspaper"></i>
                           </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                           <div class="numbers">
                              <p class="card-category"></p>
                              <h4 class="card-title"><?php //echo $celebrity; ?> Celebrities</h4>
                           </div>
                        </div>
                        <div> -->
                        </div>
                        <div class="container">
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
     <form action="<?= base_url('Subcategory/store/') ?>" name="addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="field">
            <label class="label">Sub Category Name</label>
            <div class="control">
                <input id="type" name="subcategory" class="input" type="text" value="<?php echo set_value('subcategory'); ?>" placeholder="Add Sub Category">
            </div>
        </div>
        
        <div class="field">
            <label class="label">Category Image</label>
            <div class="control">
               <input type="file" name="userfile" size="20" class=" mr-sm-2" />
            </div>
        </div>
        
         <div class="field">
            <label class="label">Category</label>
            <div class="control">
            <select class="form-control" id="category" name="category" >
            <option value="">Select Main Category</option>
            <?php foreach($categories as $cate){?>
            <option value="<?php echo $cate->id?>"><?php echo $cate->category?></option>
            <?php } ?>
            </select>
            </div>
        </div>
        
<br>       
       <div class="col col-stats ml-3 ml-sm-0">
                <button type="submit" class=" btn btn-primary" style="margin-left: -17px !important">Add Sub Category</button>
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

<form action="<?php echo base_url()?>Categories/" name="addcancelForm" method="post">
        </form>
        <script type="text/javascript">

        function addform(){
        	document.addForm.submit();
        }
            
            function addcancelform(){
            	document.addcancelForm.submit();
            }
        </script>