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
                                                <h4 class="card-title"><?php echo $email_notification; ?> Subscribers</h4>
                                            </div>
                                        </div> -->
                                        <div class="container">
                                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th class="th-sm">S No
                                                        </th>
                                                        <th class="th-sm">USERNAME
                                                        </th>
                                                        <th class="th-sm">EMAIL
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    <?php $i=0;
		                                                foreach ($subscriberlist as $key => $value) {
		                                                $i++;
		                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo  $i;?>
                                                            </td>
                                                            <td>
                                                                <a  href="<?php echo base_url(); ?>Dashboard/celebrityedit/<?php echo $value['id']?>" style="color:#e72c30"><?php echo  $value['user_name'];?></a>
                                                            </td>
                                                            <td>
                                                                <?php echo  $value['user_email'];?>
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

        <!-- Custom template | don't include it in your project! -->

        <!-- End Custom template -->
        </div>

        <div class="container">

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
        <?php  include('footer.php');?>
            </body>

            </html>