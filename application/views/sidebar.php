<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav">
						<li class="nav-item">
							<div>
								<ul class="nav">
									<li>
										<a  href="<?php echo base_url(); ?>Dashboard/">
											<span class="sub-item">Dashboard</span>
										</a>
										
									</li>
									<li>
										<a  href="<?php echo base_url(); ?>Articlecheck/">
										<span class="sub-item">Articles List</span>
										</a>
									</li>
									<?php if($this->session->userdata('user_role')=='Administrator'){?>
									<li>
										<a  href="<?php echo base_url(); ?>Userscheck/">
											<span class="sub-item">Users List</span>
										</a>
										
									</li>

									<li>
										<a  href="<?php echo base_url(); ?>Subscriberscheck/">
											<span class="sub-item">Suscribers List</span>
										</a>
										
									</li>
									
									<li>
										<a  href="<?php echo base_url(); ?>Adscheck/">
											<span class="sub-item">Ads List</span>
										</a>
										
									</li>
									<?php } ?>
									<!-- <li>
										<a  href="<?php //echo base_url(); ?>Movies/">
										<span class="sub-item">Movies List</span>
										</a>
									</li> -->
									<li>
										<a  href="<?php echo base_url(); ?>Subcategory/">
											<span class="sub-item">Sub Category List</span>
										</a>
									</li>
									<li>
										<a  href="<?php echo base_url(); ?>Categories/">
											<span class="sub-item">Category List</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
