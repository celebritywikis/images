<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <div class="card card-stats card-round">
                  <div class="card-body">
                     <div class="row align-items-center">
                          <!-- <div class="col-icon">
                           <div class="icon-big text-center icon-info bubble-shadow-small">
                              Are you sure you want to delte this ad ?
                           </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                           <div class="numbers">
                              <p class="card-category"></p>
                              <h4 class="card-title"></h4>
                           </div>
                        </div>-->
                        <div>  
                        </div>
                        <div class="container">
                        Are you sure you want to delte this Category ?
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
    <form action="<?= base_url('Subcategory/delete/'.$adsedit->id) ?>" name="theForm" method="POST">
        <div class="field">
            <label class="label">Sub Category Name</label>
            <div class="control">
                <input id="type" name="subcategory" class="input" type="text" value="<?= $adsedit->subcategory ?>" placeholder="Update Sub Category" readonly=1>
                <input id="delete" name="delete" class="input" type="hidden" value="true">
            </div>
        </div>
         <?php 
        $pop_select = $articleedit->category;
        $exp_select = explode(',',$pop_select);
        ?>
         <div class="field">
            <label class="label">Category</label>
            <div class="control">
            <select id="category" name="category[]" multiple style="width:95px;height:210px;">
            <?php foreach($categories as $cate){?>
            <option value="<?php echo $cate->id?>" 
            <?php if(in_array($cate->id,$exp_select)) echo "selected";?>><?php echo $cate->category?></option>
            <?php } ?>
            </select>
            </div>
        </div>
       <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="submit" class=" btn btn-primary" style="margin-left: -17px !important">Delete Sub Category</button></div>
        <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="addeletecancelform()">Cancel</button>
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
        
        <form action="<?php echo base_url()?>Subcategory/index" name="cancelForm" method="post">
        </form>

        </div>
        <script type="text/javascript">
            < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </script>

        <script type="text/javascript">
            function addeleteform(){
            	document.theForm.submit();
            }

            function addeletecancelform(){
            	document.cancelForm.submit();
            }
            
        </script>