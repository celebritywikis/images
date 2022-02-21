<?php  include('header.php');?>
<?php include('sidebar.php');?>
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
                        <div class="col col-stats ml-3 ml-sm-0">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                           Add Celebrity
                           </button>
                          </div>
                        </div>
                        <div class="container">
                           <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                              <thead>
                                 <tr>
                                    <th class="th-sm">S No
                                    </th>
                                    <th class="th-sm">Name
                                    </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 $i=0;
                                    foreach ($celebritylistData as $key => $value) {
                                    $i++;
                                        ?>
                                 <tr>
                                    <td>
                                       <?php echo  $i;?>
                                    </td>
                                    <td>
                                       <a  href="<?php echo base_url(); ?>Dashboard/celebrityedit/<?php echo $value['id']?>" style="color:#e72c30"><?php echo  $value['name'];?></a>
                                    </td>
                                 </tr>
                                 <?php   } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

   <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
   
        <!-- Modal Header -->
<div class="modal-header">
   <h4 class="modal-title">Add Celebrity</h4>
   <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body">
   <form action="<?php echo base_url(); ?>Dashboard/addcelebrity" class="was-validated" method="post" enctype="multipart/form-data">
      <div class="form-group">
         <label for="uname">Name:</label>
         <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="Name" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="pwd">Nick Name:</label>
         <input type="text" class="form-control" id="nickname" placeholder="Enter Nick Name" name="nick_name" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="uname">DOB:</label>
         <input type="text" class="form-control" id="js-date" name="dob">
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="pwd">Birth Place:</label>
         <input type="text" class="form-control" id="birth_place" placeholder="Enter Birth Place" name="birth_place" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="uname">Nationality:</label>
         <input type="text" class="form-control" id="nationality" placeholder="Enter Nationality" name="Nationality" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="pwd">Weight:</label>
         <input type="text" class="form-control" id="weight" placeholder="Enter Weight" name="Weight" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="uname">Social Platform:</label>
         <input type="text" class="form-control" id="social_platform" placeholder="Enter Social Platform" name="Social_Platform" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="pwd">Small Description:</label>
         <input type="text" class="form-control" id="small_desc" placeholder="Enter Small Description" name="Small_Description" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <div class="form-group">
         <label for="uname">Measurements:</label>
         <input type="text" class="form-control" id="measurement" placeholder="Enter Measurements" name="Measurement" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
       <div class="form-group"> 
         <label for="uname">Image Upload:</label>
         <input type="file" class="form-control" name="image" required>
         <div class="valid-feedback">Valid.</div>
         <div class="invalid-feedback">Please fill out this field.</div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
   </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src=https://cdnjs.cloudflare.com/ajax/libs/webfont/1.6.28/webfontloader.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       $('#dtMaterialDesignExample').DataTable();
       $('.dataTables_length').addClass('bs-select');
   });
</script>
<?php  include('footer.php');?>
</body>
</html>