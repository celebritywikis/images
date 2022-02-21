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
    
    <form action="<?= base_url('Adscheck/store/') ?>" name="addForm" method="POST">
        <div class="field">
            <label class="label">Ads Type</label>
            <div class="control">
                <input id="type" name="type" class="input" type="text" value="<?php echo set_value('type'); ?>" placeholder="Add Add Type">
            </div>
        </div>
        <div class="field">
            <label class="label">Ads Content</label>
            <div class="control">
                <textarea id="ad_content" rows="4" cols="50" name="ad_content" class="input" type="textarea" value="<?php echo set_value('ad_content'); ?>" placeholder="Add Ads Script">
                </textarea>
            </div>
        </div>
       
       <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="addform()">Add Ad</button>
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

<form action="<?php echo base_url()?>Adscheck/index" name="addcancelForm" method="post">
        </form>
        <script type="text/javascript">

        function addform(){
        	document.addForm.submit();
        }
            
            function addcancelform(){
            	document.addcancelForm.submit();
            }
        </script>