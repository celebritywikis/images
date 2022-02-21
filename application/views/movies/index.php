<div class="main-panel">
   <div class="content">
      <div class="page-inner">
         <div class="row">
            <div class="col-sm-12 col-md-12">
               <div class="card card-stats card-round">
                  <div class="card-body">
                  <!--
                     <div class="row align-items-center">
                         <div class="col-icon">
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
                        <div> 
                        <div class="col col-stats ml-3 ml-sm-0" style="margin-left: 8px !important;">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                           <a  href="<?php echo base_url(); ?>Adscheck/create/" style="color:#fff;text-decoration:none;">Add Ads</a>
                           </button>
                          </div>
                        </div>
                        -->
                        <div class="container">
                        <a  href="<?php echo base_url(); ?>Movies/create/" style="float: right;margin-top: 5px;color: #e72c30;font:8px"><img width=20 height=20 src="<?php echo base_url()?>/assets/img/plus.png"></a>
                           <table id="dtMaterialDesignExample" class="table table-striped dtBasicExample" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="th-sm">S No
                                                        </th>
                                                        <th class="th-sm">Movie Name
                                                        </th>
                                                        <th class="th-sm">Image
                                                        </th>
                                                        <th class="th-sm">Languages
                                                        </th>
                                                        <th class="th-sm">Youtube Id
                                                        </th>
                                                        <?php if($this->session->userdata('user_role')=='Administrator'){?>
                                                        <th class="th-sm">Delete
                                                        </th>
                                                        <?php } ?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=0;
                                                    foreach ($ads as $value){
		                                                $i++;
		                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo  $i;?>
                                                            </td>
                                                             <td>
                                                                <?php echo  $value->movie_name;?>
                                                            </td>
                                                            <td>
                                                                <img src="<?php echo base_url('uploads/movieimages/').$value->image_mobile; ?>" width=75 height=75>
                                                            </td>
                                                            <td>
                                                                <?php echo  $value->language;?>
                                                            </td>
                                                            <td>
                                                                <?php echo  $value->youtube_id;?>
                                                            </td>
                                                            <?php if($this->session->userdata('user_role')=='Administrator'){?>
                                                            <td>
                                                                <a href="<?=site_url('Movies/edit/'.$value->id)?>"><i class="fas fa-edit" style="color:#e72c30"></i></a>
                        										| <a  href="<?php echo base_url(); ?>Movies/delete/<?php echo $value->id?>" style="color:#e72c30"><i class="fas fa-trash"></i></a>
                                                            </td>
                                                            <?php } ?>
                                                        </tr>
                                                        <?php } ?>

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

        </div>
        <script type="text/javascript">
            < script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" >
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtMaterialDesignExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>