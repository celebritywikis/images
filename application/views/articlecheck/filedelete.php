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
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
    
    <form action="<?= base_url('Articlecheck/filedelete/'.$file_id) ?>" name="theForm" method="POST">
        <div class="field">
            <label class="label">Article Image </label>
            <img src="<?php echo base_url($image_path); ?>" >
        </div>
        <input type="hidden" name="delete" value="true">
		<div class="field">
            <label class="label">Title </label>
            <div class="control">
                <input id="filename" name="title" class="input" type="text" name="type" value="<?= $files->title ?>" readonly >
            </div>
        </div>
       <br>
        <div class="col col-stats ml-3 ml-sm-0">
                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="articledeleteform()">Delete Article Image</button></div>
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
        
        <form action="<?php echo base_url()?>Articlecheck/filelist/<?php echo $article_id?>" name="cancelForm" method="post">
        </form>

        </div>
        <script type="text/javascript">
            <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });

            function articledeleteform(){
            	ConfirmDelete();
            }

            function ConfirmDelete()
            {
              var x = confirm("Are you sure you want to delete? \nOnce deleted cannot be recovered ?");
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