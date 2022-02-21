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
    
     <form action="<?= base_url('Movies/store/') ?>" name="addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="field">
            <label class="label">Movie Name</label>
            <div class="control">
                <input id="type" name="movie_name" class="input" type="text" value="<?php echo set_value('movie_name'); ?>" placeholder="Add Movie">
            </div>
        </div>
        <div class="field">
            <label class="label">Image Alt Text</label>
            <div class="control">
                <input id="alt_text" name="alt_text" class="input" type="text" value="<?php echo set_value('alt_text'); ?>" placeholder="Add Image Alt Text">
            </div>
        </div>
        <div class="field">
            <label class="label">Movie Image</label>
            <div class="control">
               <input type="file" name="userfile" size="20" class=" mr-sm-2" />
            </div>
        </div>
         <div class="field">
            <label class="label">Languages</label>
            <div class="control">
            <select id="languages" name="languages[]" multiple style="width:95px;height:110px;">
            <?php foreach($languages as $lang){?>
            <option value="<?php echo $lang?>"><?php echo $lang?></option>
            <?php } ?>
            </select>
            </div>
        </div> 
        <div class="field">
            <label class="label">Category</label>
            <div class="control">
            <select id="category" name="category[]" multiple style="width:95px;height:210px;">
            <?php foreach($categories as $cate){?>
            <option value="<?php echo $cate->id?>"><?php echo $cate->category?></option>
            <?php } ?>
            </select>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Youtube Id </label>
            <div class="control">
                <input id="youtube_id" name="youtube_id" class="input" type="text" value="<?php echo set_value('youtube_id'); ?>"  placeholder="Add Youtube id">
            </div>
        </div><br>
       
       <div class="col col-stats ml-3 ml-sm-0">
                <button type="submit" class=" btn btn-primary" style="margin-left: -17px !important">Add Movie</button>
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

<form action="<?php echo base_url()?>Movies" name="addcancelForm" method="post">
        </form>
        <script type="text/javascript">

        function addform(){
        	document.addForm.submit();
        }
            
            function addcancelform(){
            	document.addcancelForm.submit();
            }
        </script>