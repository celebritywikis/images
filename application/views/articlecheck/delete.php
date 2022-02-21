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
                        Are you sure you want to delete Article ?
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
				    <form action="<?= base_url('Articlecheck/delete/'.$articleedit->id) ?>" name="theForm" method="POST">
				        <div class="field">
				            <label class="label">Article Title </label>
				            <div class="control">
				                <input id="title" name="title" class="input" type="text" size=100 value="<?= $articleedit->title ?>"  placeholder="Add Title" readonly>
				                <input id="delete" name="delete" class="input" type="hidden" value="true">
				            </div>
				        </div>
				        
				       <br>
				        <div class="col col-stats ml-3 ml-sm-0">
				                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="articledeleteform()">Delete Celebrity</button></div>
				        <br>
				        <div class="col col-stats ml-3 ml-sm-0">
				                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="articlecancelform()">Cancel</button>
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
        
        <form action="<?php echo base_url()?>Articlecheck/index" name="cancelForm" method="post">
        </form>

        </div>
        <script type="text/javascript">
            < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });

            function articledeleteform(){
            	ConfirmDelete()
            }

            function ConfirmDelete()
            {
              var x = confirm("Are you sure you want to delete this Article? \nOnce deleted cannot be recovered ?");
              if (x){
            	  document.theForm.submit();
              }
              else
                return false;
            }
            
            function articlecancelform(){
            	document.cancelForm.submit();
            }
            
        </script>