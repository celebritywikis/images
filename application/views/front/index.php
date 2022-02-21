<div class="section">
	<div class="container main-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- <div class="aside-widget">
					<div class="section-title">
						<h3 class="h3-color">Trending Stories</h3>
					</div>
				</div> -->
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
		<?php
		$four_column=0;
		$three_column=0;
		
		foreach ($articles as $eacharticle){
		
		$article_id = $eacharticle->id;
		$folder_name = $eacharticle->folder_name;
		$category_id = $eacharticle->cat_id;
		$title = $eacharticle->title;
		$title = $article->getCleanUrl($title);
		$category_name = $category->get_by_id($category_id);
		
		$name = str_replace('-', ' ', $folder_name);
		$category_name = strtolower($category_name->category);
		$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
		$getImagesByArticleId = $file->getFilesByArticleIdLimit($article_id,4);
		$getAllCount = $file->getFileCountByArticleId($article_id);
		
		if($four_column%4==0){echo '<div class="row">';}

		if(is_array($getImagesByArticleId) && count($getImagesByArticleId)>0){
		foreach ($getImagesByArticleId as $key=>$value){
		if($key==0){ 
			$show_thumb = base_url($create_month_folder).$value->image_medium;
		?>
		
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="post shadow">
					<div class="flex-block">
						<div class="block-75p">
							<a class="post-img" href="<?php echo base_url($folder_name.'/'.$title)?>"> <img class="lazy bot-rad" src="<?php echo base_url()?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$value->image_thumb; ?>" alt=""></a>
						</div>
						<?php } ?>
						<?php 
						if($key>0) {
						if($three_column%3==0){ echo '<div class="block-25p">'; } ?>
							<div class="small-img">
								<a class="post-img" href="<?php echo base_url($folder_name.'/'.$title)?>"> <img class="bot-rad" src="<?php echo base_url($create_month_folder).$value->image_thumb; ?>" alt=""></a>
							</div>
						<?php } ?>
						<?php 
						if($key>0){
						$three_column++; if($three_column%3==0) { echo "</div>";$three_column=0; }
						}
						?>
					<?php } ?>
					</div>
					<?php if($key==3){?>
					<div class="post-body no-pad">
						<div class="post-meta sh-left">
							<a class="post-category cat-1" href="<?php echo base_url($folder_name.'/'.$title)?>"><img class="avatar avatar-small" src="<?php echo $show_thumb; ?>" alt="<?php echo ucwords($name)?>"></a> <span class="post-date"><a  href="<?php echo base_url($folder_name.'/'.$title)?>"><?php echo ucwords($name)?></a></span>
						</div>
						<div class="post-meta sh-right">
							<a class="post-category cat-1" href="<?php echo base_url($folder_name.'/'.$title)?>"><i class="fa fa-picture-o icon-flash" aria-hidden="true"></i></a> <span class="post-date"><?php echo $getAllCount?></span>
						</div>
						<div class="clearfix visible-md visible-lg"></div>
						<h3 class="post-title">
							<a href="<?php echo base_url($folder_name.'/'.$title)?>"><?php echo $eacharticle->title?></a>
						</h3>
					</div>
					</div>
					<?php 
					$show_thumb='';
					} ?>
					</div>
			<?php } ?>
			<?php  $four_column++; if($four_column%4==0) {echo '</div>'; $four_column=0;} ?>
			<?php } ?>
		<div class="clearfix visible-md visible-lg"></div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- <img class="lazy img-responsive" src="<?php echo base_url() ?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>assets/img/add2.png" alt=""> -->
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
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
				<div class="row">
				<div class="col-lg-3 col-lg-offset-6 col-md-5 col-md-offset-4 col-sm-12 col-xs-12">
				<div class="text-align">
					<?php if(isset($_GET['page'])>=2){
					$previous_page= $_GET['page']-1;
					?>
					<?php if($previous_page>0){?>
						<div class="btn-align"><a href="<?php echo base_url('?page='.$previous_page)?>">
							<button class="btn-align-style">
								<i class="fa fa-arrow-left" aria-hidden="true"></i> Prev 
							</button>
							</a>
						</div>
					<?php } ?>
					<?php } ?>
					<?php if($number_of_page>1){?>
						<div class="btn-align"><a href="<?php echo base_url('?page='.$page)?>">
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
	</div>
</div>