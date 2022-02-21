<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <div class="card card-stats card-round">
                  <div class="card-body">
                     <div class="row align-items-center">
                         
                        <div>  
                        </div>
                        <div class="container">
                        Are you sure you want to delete this User ?
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
    <form action="<?= base_url('Userscheck/delete/'.$usersedit->id) ?>" name="theForm" method="POST">
        <div class="field">
            <label class="label">User Name</label>
            <div class="control">
                <input id="username" name="username" class="input" type="text" value="<?= $usersedit->id ?>" placeholder="Add User namee" readonly=1>
                <input id="delete" name="delete" class="input" type="hidden" value="true">
            </div>
        </div>
        <div class="field">
            <label class="label">User Email</label>
            <div class="control">
                <textarea id="ad_content" rows="4" cols="50" name="ad_content" class="input" type="text" placeholder="Edit Email Id" readonly=1><?php echo $usersedit->email_id ?> </textarea>
            </div>
        </div>
       
       
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="userdeleteform()">Delete Users</button></div>
        <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="usereletecancelform()">Cancel</button>
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
        
        <form action="<?php echo base_url()?>Userscheck/index" name="cancelForm" method="post">
        </form>

        </div>
        <script type="text/javascript">
            <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });

            function userdeleteform(){
            	document.theForm.submit();
            }

            function usersdeletecancelform(){
            	document.cancelForm.submit();
            }
            
        </script>