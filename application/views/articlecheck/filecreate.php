<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <div class="card card-stats card-round">
                  <div class="card-body">
                     <div class="row align-items-center">
                       
                        </div>
                        <div class="container">
                          <?php echo validation_errors('<div class="notification is-danger">', '</div>'); ?>
					    <form action="<?= base_url('Articlecheck/filecreate/'.$article_id) ?>" name="addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					        <div class="field">
					            <label class="label">Article Images</label>
					            <div class="control">
					               <input type="file" name="userfile[]" multiple size="20" class=" mr-sm-2" />
					            </div>
					        </div>
					        <input type="hidden" name="article_id" value="<?php echo $article_id?>">
					        <input type="hidden" name="upload" value="true">
							<br>
					
					       <div class="col col-stats ml-3 ml-sm-0">
					                <button type="button" class=" btn btn-primary" style="margin-left: -17px !important" onClick="addform()">Add Image</button>
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

<form action="<?php echo base_url()?>Articlecheck/filelist/<?php echo $article_id?>" name="addcancelForm" method="post">
        </form>
        <script type="text/javascript">

        function addform(){
        	document.addForm.submit();
        }
            
            function addcancelform(){
            	document.addcancelForm.submit();
            }

            tinymce.init({ 
                selector:'.editor',
                theme: 'modern',
                height: 200
              });

            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd'
                });
               
            });
        </script>