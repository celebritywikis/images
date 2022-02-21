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
    
    <form action="<?= base_url('Adscheck/update/'.$adsedit->id) ?>" name="editaddform" method="POST">
        <div class="field">
            <label class="label">Ads Type</label>
            <div class="control">
                <input id="type" name="type" class="input" type="text" value="<?= $adsedit->type ?>" placeholder="Add Add Type">
            </div>
        </div>
        <div class="field">
            <label class="label">Ads Content</label>
            <div class="control">
                <textarea id="ad_content" rows="4" cols="50" name="ad_content" class="input" type="text" placeholder="Add Ads Script"><?php echo $adsedit->ad_content?> </textarea>
            </div>
        </div>
        <!-- 
        <div class="field">
            <label class="label">City</label>
            <div class="control select">
                <select id="city_id" name="city_id">
                    <option>--Select a city</option>
                    <?php foreach ($cities as $city): ?>
                        <option <?= ($city->id == $pal->city_id ? "selected" : '' ) ?> value="<?= $city->id ?>"><?= $city->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div> -->
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="editform()">Update Ad</button>
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
        <form action="<?php echo base_url()?>Adscheck/index" name="cancelForm" method="post">
        <input type="hidden" name="cancel" value="true">
        </form>
        <script type="text/javascript">
            < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
            function editform(){
            	document.editaddform.submit();
            }
            function updatecancelform(){
            	document.cancelForm.submit();
            }
        </script>