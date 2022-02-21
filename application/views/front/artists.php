<div id="page-wrapper">
<?php if($celebrity[0]->name!=''){ ?>
                <div class="inner-content single-3" style="background-color: #fff;">
                    <!--/music-right-->
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="gl_title_box"><h1><?php echo $celebrity[0]->name?></h1></div>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <img class="lazy gl-responsvie-img" data-src="<?php echo base_url('uploads/celebrityimages/').$celebrity[0]->image_large;?>" /><br>
                                <hr>
                                <div>
								<!--  
                                    <div class="gl-info-details gl_title_bot">
                                        <i class="fa fa-star-half-o"></i><span class="gl-info">User
											Ratings:</span>
                                    </div>
                                    <div class="gl_title_bot">
                                        <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
-->
                                    <img src="https://tpc.googlesyndication.com/simgad/9943120088572995930?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qlo0vcZ0RL8JqJRbURAwkPnR2EbIA" style="width: 90%">
								<hr>
								<div class="gl-info-details">
                                    <i class="fa fa-facebook"></i><span class="gl-info">Facebook: <?php echo $celebrity[0]->facebook?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-twitter"></i><span class="gl-info">Twitter: <?php echo $celebrity[0]->twitter?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-instagram"></i><span class="gl-info">Instagram: <?php echo $celebrity[0]->instagram?></span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12">
                                <hr>
                                <img src="https://tpc.googlesyndication.com/simgad/9943120088572995930?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qlo0vcZ0RL8JqJRbURAwkPnR2EbIA" style="width: 90%">
                                <hr>

                                <div class="gl-info-details">
                                    <i class="fa fa-calendar"></i><span class="gl-info">DOB: <?php echo date("F jS, Y",strtotime($celebrity[0]->dob));  ?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-home"></i><span class="gl-info">Birth Place: <?php echo $celebrity[0]->birth_place?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa fa-info"></i><span class="gl-info">Nationality: <?php echo $celebrity[0]->nationality ?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa fa-info"></i><span class="gl-info">Weight: <?php echo $celebrity[0]->weight ?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa fa-info"></i><span class="gl-info">Nick Name: <?php echo $celebrity[0]->nick_name ?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-info"></i><span class="gl-info">Country: <?php echo $celebrity[0]->country ?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-mobile"></i><span class="gl-info">Mobile Number: <?php echo $celebrity[0]->whats_app ?></span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-info"></i><span class="gl-info">Country: <?php echo $celebrity[0]->email ?></span>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="gl_title_box">More Celebrity Biography</div>
                            <?php foreach ($celebrities as $single_celebrity){?>
                            <div class="gl-info-details">
                                    <i class="fa fa fa-link"></i><span class="gl-info"><a href="<?php echo base_url('artists/').$single_celebrity->url_slug?>"><?php echo $single_celebrity->name ?></a></span>
                                </div>
                                <hr>
                               <?php } ?>
                            <!--  <img src="https://s0.2mdn.net/8017295/Value_Prop_-_Shop_More_Confidently_-_Nov_2019_-_300X600.jpg" alt="">-->
                        </div>
                    </div>
                    <div class="row albums">
                        <div class="tittle-head">
                        <h3 class="tittle"><?php echo $celebrity[0]->name?> Biography</h3>
                            <div class="clearfix"></div>
                            <div class="gd-lyrics-content"><?php echo $celebrity[0]->small_desc?></div>
                        </div>
                    </div>
                </div>
                <?php } else{?>
               <div class="inner-content single" style="background-color: #fff;">
                    <!--/music-right-->
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="gl_title_box"><h1><?php echo ucwords($name)?></h1></div>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <img class="lazy gl-responsvie-img" data-src="<?php echo base_url('uploads/celebrityimages/').$celebrity[0]->image_large;?>" /><br>
                                <hr>
                                <div>
								
                                    <img src="https://tpc.googlesyndication.com/simgad/9943120088572995930?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qlo0vcZ0RL8JqJRbURAwkPnR2EbIA" style="width: 90%">
								<hr>
								<div class="gl-info-details">
                                    <i class="fa fa-facebook"></i><span class="gl-info">Facebook: Facebook.com</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-twitter"></i><span class="gl-info">Twitter: Twitter.com</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-instagram"></i><span class="gl-info">Instagram: Instagram.com</span>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12">
                                <hr>
                                <img src="https://tpc.googlesyndication.com/simgad/9943120088572995930?sqp=4sqPyQQrQikqJwhfEAEdAAC0QiABKAEwCTgDQPCTCUgAUAFYAWBfcAJ4AcUBLbKdPg&rs=AOga4qlo0vcZ0RL8JqJRbURAwkPnR2EbIA" style="width: 90%">
                                <hr>

                                <div class="gl-info-details">
                                    <i class="fa fa-calendar"></i><span class="gl-info">DOB: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-home"></i><span class="gl-info">Birth Place: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa fa-info"></i><span class="gl-info">Nationality: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa fa-info"></i><span class="gl-info">Weight: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa fa-info"></i><span class="gl-info">Nick Name: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-info"></i><span class="gl-info">Country: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-mobile"></i><span class="gl-info">Mobile Number: Not Available</span>
                                </div>
                                <hr>
                                <div class="gl-info-details">
                                    <i class="fa fa-info"></i><span class="gl-info">Country: Not Available</span>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="gl_title_box">More Celebrity Biography</div>
                           <?php foreach ($celebrities as $single_celebrity){?>
                            <div class="gl-info-details">
                                    <i class="fa fa fa-link"></i><span class="gl-info"><a href="<?php echo base_url('artists/').$single_celebrity->url_slug?>"><?php echo $single_celebrity->name ?></a></span>
                                </div>
                                <hr>
                               <?php } ?>
                            <!--  <img src="https://s0.2mdn.net/8017295/Value_Prop_-_Shop_More_Confidently_-_Nov_2019_-_300X600.jpg" alt="">-->
                        </div>
                    </div>
                    <div class="row albums">
                        <div class="tittle-head">
                        <h3 class="tittle"><?php echo $celebrity[0]->name?> Biography</h3>
                            <div class="clearfix"></div>
                            <div class="gd-lyrics-content"><?php echo $celebrity[0]->small_desc?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
                <!--body wrapper end-->
                <!-- /w3layouts-agile -->
            </div>