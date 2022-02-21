<div class="section">
	<div class="container main-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="aside-widget">
					<div class="section-title">
					<?php foreach ($articledetails as $eacharticle) { ?>
						<h1 class="h3-color"><?php echo $count?>+ <?php echo $eacharticle->title?></h1>
						<p class="addReadMore showlesscontent"><?php echo strip_tags($eacharticle->meta_desc);?></p>
						<?php } ?>
					</div>
				</div>
				<!-- <img class="lazy bot-rad img-responsive" src="<?php echo base_url() ?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>assets/img/add1.png" alt=""> -->
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- 108Images Responsive Ad -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-2978950148664875"
                     data-ad-slot="3694315112"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                     (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="row alpha-pad">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="aside-widget">
							<div class="section-title">
								<h4 class="h3-color">TAGGED IN THIS PAGE</h4>
								<div class="breadcrum">
								<?php if($sub_cat_details->image_thumb!=''){?>
									<a href="<?php echo base_url($folder_name_page.'/'.$page_title)?>" style="color: #fff;"><img class="avatar" src="<?php echo base_url('uploads/subcategory/'.$sub_cat_details->image_thumb);?>" alt=""><?php echo ucwords(str_replace ("-"," ",$folder_name_page));?></a>
									<?php } else {?>
									<a href="<?php echo base_url($folder_name_page.'/'.$page_title)?>" style="color: #fff;"><?php echo ucwords(str_replace ("-"," ",$folder_name_page));?></a>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
				$three_row=-1;
				$four_row=0;
				$five_row=0;
				
				foreach ($articledetails as $eacharticle) {
				$article_id = $eacharticle->id;
				$folder_name = $eacharticle->folder_name;
				
				$category_name = $eacharticle->categoryname;
				$name = str_replace('-', ' ', $folder_name);
				$category_name = strtolower($category_name);
				$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
				$getImagesByArticleId = $file->getFilesByArticleIdLimitPagination($article_id,$start,$limit);
				
				foreach ($getImagesByArticleId as $value){
					
				$single_filename = $value->title;
				$single_filename = $article->getCleanUrl($single_filename);
				
				$id = $article->urlEncodeId($value->id);
				
				?>
				<?php if($four_row%4==0) {echo '<div class="row">'; $four_column_div_open=true;}?>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 gall-img">
						<a class="" href="<?php echo base_url($folder_name.'/'.$single_filename.'/'.$id)?>"> <img class="lazy img-responsive gallery-item" src="<?php echo base_url() ?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$value->image_medium?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>"></a>
					</div>
				<?php $four_row++; if($four_row%4==0) { echo '</div>'; $four_row=0;$four_column_div_open=false;$three_row++;}?>
				<?php if($three_row%3==0){?>
				<div class="row top-bot">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						 <!-- <img class="lazy img-responsive gall-img" src="<?php echo base_url() ?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>assets/img/add4.png" alt=""> -->
						  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- 108Images Responsive Ad -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-2978950148664875"
                             data-ad-slot="3694315112"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
					</div>
				</div>
				<?php $three_row++;if($three_row%3==0) {$three_row=-1;}} ?>
				<?php } ?>
			</div>
			<?php } ?>
			<?php if($four_column_div_open) {echo '</div>'; $four_column_div_open=false;}?>
			
			<!-- Sidebar Related Articles here below -->
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				 <div class="top-bot">
					<!-- <img class="lazy img-responsive gall-img" src="<?php echo base_url() ?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>assets/img/add3.png" alt=""> -->
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- 108Images Responsive Ad -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-2978950148664875"
                         data-ad-slot="3694315112"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
				</div>
				<?php 
				$three_column=0;
				foreach ($getrelatedarticles as $eacharticlerealated){
					$article_id = $eacharticlerealated->id;
					$folder_name = $eacharticlerealated->folder_name;
					$category_id = $eacharticlerealated->cat_id;
					
					$title = $eacharticlerealated->title;
					$title = $article->getCleanUrl($title);
					$category_name = $category->get_by_id($category_id);
					
					$name = str_replace('-', ' ', $folder_name);
					$category_name = strtolower($category_name->category);
					$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
					$getImagesByArticleId = $file->getFilesByArticleIdLimit($article_id,4);
					
					$getAllCount = $file->getFileCountByArticleId($article_id);
				?>
				<div class="post shadow">
					<?php 
					if(is_array($getImagesByArticleId) && count($getImagesByArticleId)>0){
					foreach ($getImagesByArticleId as $key=>$value){ 
					?>
					<?php if($key==0) { 
					$show_thumb = base_url($create_month_folder).$value->image_medium;
						?>
					<div class="flex-block">
						<div class="block-75p">
							<a class="post-img" href="<?php echo base_url($folder_name.'/'.$title)?>"> <img class="lazy bot-rad" src="<?php echo base_url() ?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$value->image_medium; ?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>"></a>
						</div>
						<?php } ?>
						<?php if($key>0) { ?>
						<?php if($three_column%3==0){ echo '<div class="block-25p">'; } ?>
							<div class="small-img">
								<a class="post-img" href="<?php echo base_url($folder_name.'/'.$title)?>"> <img class="bot-rad" src="<?php echo base_url($create_month_folder).$value->image_medium; ?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>"></a>
							</div>
						<?php } ?>
						<?php if($key>0){ $three_column++; if($three_column%3==0) { echo "</div></div>";$three_column=0; } } ?>
					
					<?php if($key==3){?>
					<div class="post-body no-pad">
						<div class="post-meta sh-left">
							<a class="post-category cat-1" href="<?php echo base_url($folder_name.'/'.$title)?>"><img class="avatar avatar-small" src="<?php echo $show_thumb?>" alt="<?php echo ucwords($name)?>"></a> <span class="post-date"><a  href="<?php echo base_url($folder_name.'/'.$title)?>"><?php echo ucwords($name)?></a></span>
						</div>
						<div class="post-meta sh-right">
							<a class="post-category cat-1" href="<?php echo base_url($folder_name.'/'.$title)?>"><i class="fa fa-picture-o icon-flash" aria-hidden="true"></i></a> <span class="post-date"><?php echo $getAllCount?></span>
						</div>
						<div class="clearfix visible-md visible-lg"></div>
						<h3 class="post-title">
							<a href="<?php echo base_url($folder_name.'/'.$title)?>"><?php echo $eacharticlerealated->title?></a>
						</h3>
					</div>
					<?php 
					$show_thumb='';
					} ?>
					
					<?php } ?>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="row">
				<div class="col-lg-3 col-lg-offset-4 col-md-5 col-md-offset-3 col-sm-12 col-xs-12">
				<div class="text-align">
					<?php if(isset($_GET['page'])>=2){
					$previous_page= $_GET['page']-1;
					?>
					<?php if($previous_page>0){?>
						<div class="btn-align"><a href="<?php echo base_url($folder_name_page.'/'.$page_title.'?page='.$previous_page)?>">
							<button class="btn-align-style">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> Prev 
							</button>
							</a>
						</div>
					<?php } ?>
					<?php } ?>
					<?php if($number_of_page>1){?>
						<div class="btn-align"><a href="<?php echo base_url($folder_name_page.'/'.$page_title.'?page='.$page)?>">
							<button class="btn-align-style">
								Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
							</button>
							</a>
						</div>
					<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix visible-md visible-lg"></div>
	</div>
</div>