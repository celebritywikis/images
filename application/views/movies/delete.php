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
                        Are you sure you want to delte this Movie ?
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
    <form action="<?= base_url('Movies/delete/'.$adsedit->id) ?>" name="theForm" method="POST">
        <div class="field">
            <label class="label">Movie Name</label>
            <div class="control">
                <input id="type" name="movie_name" class="input" type="text" value="<?= $adsedit->movie_name ?>" placeholder="Add Add Type" readonly=1>
                <input id="delete" name="delete" class="input" type="hidden" value="true">
            </div>
        </div>
        
        <div class="field">
            <label class="label">Image Alt Text</label>
            <div class="control">
                <input id="alt_text" name="alt_text" class="input" type="text" value="<?= $adsedit->alt_text ?>" placeholder="Add Image Alt Text" readonly=1>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Image</label>
            <div class="control">
                <img src="<?php echo base_url('uploads/movieimages/').$adsedit->image_thumb; ?>">
            </div>
        </div>
        <?php 
        $pop_select = $adsedit->language;
        $exp_select = explode(',',$pop_select);
        ?>
        <div class="field">
            <label class="label">Languages</label>
            <div class="control">
            <select id="languages" name="languages[]" multiple style="width:95px;height:110px;">
            <?php foreach($languages as $key=>$lang){?>
            <option value="<?php echo $lang?>" 
            <?php if(in_array($lang,$exp_select)) echo "selected";?>><?php echo $lang?></option>
            <?php } ?>
            </select>
            </div>
        </div> 
       
       
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="submit" class=" btn btn-primary" style="margin-left: -17px !important">Delete Movie</button></div>
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
        
        <form action="<?php echo base_url()?>Movies/index" name="cancelForm" method="post">
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