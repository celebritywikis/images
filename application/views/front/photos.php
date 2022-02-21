<?php //error_reporting(-1);?>
<div class="section">
	<div class="container main-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="aside-widget">
					<div class="section-title">
					<?php foreach ($articledetailsphotos as $eacharticle) { ?>
						<h1 class="h3-color"><?php echo $count?>+ <?php echo $eacharticle->title?></h1>
						<p class="addReadMore showlesscontent"><?php echo strip_tags($eacharticle->meta_desc);?></p>
						<?php } ?>
					</div>
				</div>
				<!-- <img class="lazy img-responsive " src="<?php echo base_url() ?>/assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>/assets/img/add6.png" alt=""> -->
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
		<div class="row seciton-top-bot">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="seciton-top-bot">
					<div class="row">
					<?php 
					$next_photo_id_not_coded = $next_photo_id;
					if($next_photo_id>0){
					$get_previous_photo_details = $file->get_by_id($next_photo_id);
					}
					if($previous_photo_id>0){
					$get_next_photo_details = $file->get_by_id($previous_photo_id);
					}
					$same_article=false;
					$previous_article=false;
					$first_article=false;
					
					$title = $article->getCleanUrl($title);
					
					if(isset($get_previous_photo_details->id) && $get_previous_photo_details->id>0){
						$previous_id_encode = $article->urlEncodeId($get_previous_photo_details->id);
					}
					
					if(isset($get_next_photo_details->id) && $get_next_photo_details->id>0){
					$next_id_encode = $article->urlEncodeId($get_next_photo_details->id);
					}
					
					//echo "next id = ".$next_photo_id." next code".$next_id_encode." prev id ".$previous_photo_id." prev code ".$previous_id_encode;
					//echo "present article id ".$article_id;
					//echo "previouse artile id ".$get_previous_photo_details->article_id. " next article id ".$get_next_photo_details->article_id;
					
					if($article_id!=$get_previous_photo_details->article_id || $article_id==$get_next_photo_details->article_id){
						$first_article=true;
					}
					
					if($article_id!=$get_next_photo_details->article_id){
						$previous_article=true;
					}
					if(isset($get_previous_photo_details->article_id) && isset($get_next_photo_details->article_id)){
						if(($article_id == $get_next_photo_details->article_id) && ($article_id==$get_previous_photo_details->article_id)){
							$same_article=true;
							$previous_article=false;
							$first_article=false;
						}
					}
					
					?>
					
					<?php if($first_article){
						$next_title = $article->getCleanUrl($get_next_photo_details->title);
					?>
					
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-left">
								<a href="<?php echo base_url($folder_name.'/'.$heading)?>"> <span class="btn btn-secondary gallery-btn"><i class="fa fa-th" aria-hidden="true"></i><br> Gallery</span></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-right">
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_next_photo_details->image_thumb?>" alt=""></a> 
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-right" aria-hidden="true"></i> <span>Next</span></a>
							</div>
						</div>
						
						
					<?php } ?>
					
					<?php if($same_article){
					$next_title = $article->getCleanUrl($get_next_photo_details->title);
					$previous_title = $article->getCleanUrl($get_previous_photo_details->title);
						?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="box-mid-left">
								<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_previous_photo_details->image_thumb?>" alt=""></a> 
								<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span>Prev</span></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="box-mid-middle">
							<a href="<?php echo base_url($folder_name.'/'.$heading)?>"> <span class="btn btn-secondary gallery-btn"><i class="fa fa-th" aria-hidden="true"></i><br> Gallery</span></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="box-mid-right">
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_next_photo_details->image_thumb?>" alt=""></a> 
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-right" aria-hidden="true"></i> <span>Next</span></a>
							</div>
						</div>
					<?php } ?>
					<?php if($previous_article){
					$previous_title = $article->getCleanUrl($get_previous_photo_details->title);
						?>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-left">
							<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_previous_photo_details->image_thumb?>" alt=""></a> 
							<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span>Prev</span></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-right">
							<a href="<?php echo base_url($folder_name.'/'.$heading)?>"> <span class="btn btn-secondary gallery-btn"><i class="fa fa-th" aria-hidden="true"></i><br> Gallery</span></a>
							</div>
						</div>
						
					<?php } ?>
					
					</div>
				</div>
				
				<!-- dropdown events -->
				<div class="seciton-top-bot">
					<div class="mod-overlay">
						<div class="background-image">
							<img class="lazy img-responsive gallery-item" src="<?php echo base_url() ?>/assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$files->image_large;?>" alt="<?php echo $files->title?>" title="<?php echo $files->title ?>">
						</div>
						<div class="text-block">
							 <div class="download-details-small green-cl">
								 <i class="fa fa-share" aria-hidden="true"></i></i> Share
							</div> 
							<div class="download-details-small">
							<?php 
							$download_filename = base_url($create_month_folder).$files->image_large;
							list($width, $height, $type, $attr) = getimagesize($download_filename); 
							?>
								<a href="<?php echo base_url($create_month_folder).$files->image_large;?>" download title='<?php echo $files->title?>'> <i class="fa fa-download" aria-hidden="true"></i> Download (<?php echo $width?>x<?php echo $height?>) </a>
							</div>
						</div>
					</div>
					<div class="image-stats-list">
						<span class="images-right"><i class="fa fa-info-circle" aria-hidden="true"></i> License/Report</span>
					</div>
					<div class="onclickshows download-details">
						<p class="text-left">108images is a social community for users to download and share wallpapers. Most of the images are provided by third parties or submitted by users. The copyright of these pictures belongs to their original publisher/photographer. If you've any issues with the images shared here, please visit our <a href="<?php echo base_url() ?>disclaimer" target="_blank">disclaimer</a> page for more details.
						</p>
					
					</div>
				</div>
				<!-- dropdown events close -->
				<!-- 
				<div class="seciton-top-bot">
					<img class="lazy img-responsive gallery-item" src="<?php echo base_url() ?>/assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>/assets/img/add7.png" alt="">
				</div> -->
				<div class="seciton-top-bot">
					<div class="row">
					<?php 
					$next_photo_id_not_coded = $next_photo_id;
					if($next_photo_id>0){
					$get_previous_photo_details = $file->get_by_id($next_photo_id);
					}
					if($previous_photo_id>0){
					$get_next_photo_details = $file->get_by_id($previous_photo_id);
					}
					$same_article=false;
					$previous_article=false;
					$first_article=false;
					
					$title = $article->getCleanUrl($title);
					
					if(isset($get_previous_photo_details->id) && $get_previous_photo_details->id>0){
						$previous_id_encode = $article->urlEncodeId($get_previous_photo_details->id);
					}
					
					if(isset($get_next_photo_details->id) && $get_next_photo_details->id>0){
					$next_id_encode = $article->urlEncodeId($get_next_photo_details->id);
					}
					
					//echo "next id = ".$next_photo_id." next code".$next_id_encode." prev id ".$previous_photo_id." prev code ".$previous_id_encode;
					//echo "present article id ".$article_id;
					//echo "previouse artile id ".$get_previous_photo_details->article_id. " next article id ".$get_next_photo_details->article_id;
					
					if($article_id!=$get_previous_photo_details->article_id || $article_id==$get_next_photo_details->article_id){
						$first_article=true;
					}
					
					if($article_id!=$get_next_photo_details->article_id){
						$previous_article=true;
					}
					if(isset($get_previous_photo_details->article_id) && isset($get_next_photo_details->article_id)){
						if(($article_id == $get_next_photo_details->article_id) && ($article_id==$get_previous_photo_details->article_id)){
							$same_article=true;
							$previous_article=false;
							$first_article=false;
						}
					}
					
					?>
					
					<?php if($first_article){
						$next_title = $article->getCleanUrl($get_next_photo_details->title);
					?>
					
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-left">
								<a href="<?php echo base_url($folder_name.'/'.$heading)?>"> <span class="btn btn-secondary gallery-btn"><i class="fa fa-th" aria-hidden="true"></i><br> Gallery</span></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-right">
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_next_photo_details->image_thumb?>" alt=""></a> 
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-right" aria-hidden="true"></i> <span>Next</span></a>
							</div>
						</div>
						
						
					<?php } ?>
					
					<?php if($same_article){
					$next_title = $article->getCleanUrl($get_next_photo_details->title);
					$previous_title = $article->getCleanUrl($get_previous_photo_details->title);
						?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="box-mid-left">
								<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_previous_photo_details->image_thumb?>" alt=""></a> 
								<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span>Prev</span></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="box-mid-middle">
							<a href="<?php echo base_url($folder_name.'/'.$heading)?>"> <span class="btn btn-secondary gallery-btn"><i class="fa fa-th" aria-hidden="true"></i><br> Gallery</span></a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
							<div class="box-mid-right">
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_next_photo_details->image_thumb?>" alt=""></a> 
								<a href="<?php echo base_url($folder_name.'/'.$next_title.'/'.$next_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-right" aria-hidden="true"></i> <span>Next</span></a>
							</div>
						</div>
					<?php } ?>
					<?php if($previous_article){
					$previous_title = $article->getCleanUrl($get_previous_photo_details->title);
						?>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-left">
							<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>"> <img class="img-responsive thumb-imgs" src="<?php echo base_url($create_month_folder).$get_previous_photo_details->image_thumb?>" alt=""></a> 
							<a href="<?php echo base_url($folder_name.'/'.$previous_title.'/'.$previous_id_encode)?>" class="btn nav-btns-block btn-dark"> <i class="fa fa-arrow-left" aria-hidden="true"></i> <span>Prev</span></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<div class="box-mid-right">
							<a href="<?php echo base_url($folder_name.'/'.$heading)?>"> <span class="btn btn-secondary gallery-btn"><i class="fa fa-th" aria-hidden="true"></i><br> Gallery</span></a>
							</div>
						</div>
						
					<?php } ?>
					
					</div>
				</div>
				 <div class="seciton-top-bot">
					<!--<img class="lazy img-responsive gallery-item" src="<?php echo base_url() ?>/assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>/assets/img/add8.png" alt="">-->
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
			
			
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gall-img">
						<div class="seciton-top-bot">
							<h4 class="h3-color">MORE RELATED IMAGES</h4>
						</div>
					</div>
				</div>
				<?php 
				$four_column=0;
				$four_column_div=false;
				foreach ($articledetailsphotos as $eacharticlerealated){
					$article_id = $eacharticlerealated->id;
					$folder_name = $eacharticlerealated->folder_name;
					$category_id = $eacharticlerealated->category;
					
					$title = $eacharticlerealated->title;
					$title = $article->getCleanUrl($title);
					$category_name = $category->get_by_id($category_id);
					
					$name = str_replace('-', ' ', $folder_name);
					$category_name = strtolower($category_name->category);
					$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
					$getImagesByArticleId = $file->getFilesByArticleIdLimit($article_id,12);
					
					$getAllCount = $file->getFileCountByArticleId($article_id);
					
					?>
					<?php if(is_array($getImagesByArticleId) && count($getImagesByArticleId)>0){
					foreach ($getImagesByArticleId as $key=>$value){
						$single_filename = $value->title;
				$single_filename = $article->getCleanUrl($single_filename);
						$id = $article->urlEncodeId($value->id);
						
					if($four_column%4==0){echo '<div class="row mobilehidegal">'; $four_column_div=true;}
						
					?>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 gall-img">
					<?php //echo $value->id." code ".$id;?>
						<a class="" href="<?php echo base_url($folder_name.'/'.$single_filename.$value->id.'/'.$id)?>"> <img class="lazy img-responsive gallery-item shadows" src="<?php echo base_url()?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$value->image_thumb; ?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>"></a>
					</div>
					<?php  $four_column++; if($four_column%4==0) {echo '</div>'; $four_column=0; $four_column_div=false;} ?>
					<?php } } } ?>
				<?php if($four_column_div) {echo '</div>'; $four_column_div=false;}?>
				
				<?php 
				$three_column=0;
				$three_column_div=false;
				foreach ($articledetailsphotos as $eacharticlerealated){
					$article_id = $eacharticlerealated->id;
					$folder_name = $eacharticlerealated->folder_name;
					$category_id = $eacharticlerealated->category;
					
					$title = $eacharticlerealated->title;
					$title = $article->getCleanUrl($title);
					$category_name = $category->get_by_id($category_id);
					
					$name = str_replace('-', ' ', $folder_name);
					$category_name = strtolower($category_name->category);
					$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
					$getImagesByArticleId = $file->getFilesByArticleIdLimit($article_id,12);
					
					$getAllCount = $file->getFileCountByArticleId($article_id);
					
					?>
					<?php if(is_array($getImagesByArticleId) && count($getImagesByArticleId)>0){
					foreach ($getImagesByArticleId as $key=>$value){
						$id = $article->urlEncodeId($value->id);
					if($three_column%3==0){echo '<div class="row mobiledesktopgal">'; $three_column_div=true;}
						
					?>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 gall-img">
					<?php //echo $value->id." code ".$id;?>
						<a class="" href="<?php echo base_url($folder_name.'/'.$title.'/'.$id)?>"> 
						<img class="lazy img-responsive gallery-item shadows" src="<?php echo base_url()?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$value->image_thumb; ?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>">
						</a>
					</div>
					
					<?php  $three_column++; if($three_column%3==0) {echo '</div>'; $three_column=0; $three_column_div=false;} ?>
					<?php } } } ?>
				<?php if($three_column_div) {echo '</div>'; $three_column_div=false;}?>
				
				<?php 
				$three_column=0;
				$two_column=0;
				foreach ($getrelatedarticles as $eacharticle){
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
					
					if($two_column%2==0) {echo '<div class="row alpha-pad">';}
				?>
				<?php 
				if(is_array($getImagesByArticleId) && count($getImagesByArticleId)>0){
				foreach ($getImagesByArticleId as $key=>$value){
				if($key==0){  
					$show_thumb=base_url($create_month_folder).$value->image_medium;
				?>
					<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
					<div class="post shadow">
					<div class="flex-block">
						<div class="block-75p">
							<a class="post-img" href="<?php echo base_url($folder_name.'/'.$title)?>"> <img class="lazy bot-rad" src="<?php echo base_url()?>assets/img/loading-icon-big.gif" data-src="<?php echo base_url($create_month_folder).$value->image_thumb; ?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>"></a>
						</div>
						<?php } ?>
						<?php 
						if($key>0) {
						if($three_column%3==0){ echo '<div class="block-25p">'; } ?>
							<div class="small-img">
								<a class="post-img" href="<?php echo base_url($folder_name.'/'.$title)?>"> <img class="bot-rad" src="<?php echo base_url($create_month_folder).$value->image_thumb; ?>" alt="<?php echo $value->title?>" title="<?php echo $value->title?>"></a>
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
							<a class="post-category cat-1" href="<?php echo base_url($folder_name.'/'.$title)?>"><img class="avatar avatar-small" src="<?php echo $show_thumb ?>" alt="<?php echo $name?>"></a> <span class="post-date"><a  href="<?php echo base_url($folder_name.'/'.$title)?>"><?php echo ucwords($name)?></a></span>
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
				<?php  $two_column++; if($two_column%2==0) {echo '</div>'; $two_column=0;} ?>
				<?php } ?>
				 <div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!--<img class="lazy img-responsive" src="<?php echo base_url() ?>/assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>/assets/img/add5.png" alt="">-->
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
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="row alpha-pad">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="aside-widget">
							<div class="section-title">
								<h4 class="h3-color">TAGS</h4>
								<div class="breadcrum">
								<?php if($sub_cat_details->image_thumb!=''){?>
								<a href="<?php echo base_url($folder_name_page.'/'.$page_title)?>" style="color: #fff;"><img class="avatar" src="<?php echo base_url('uploads/subcategory/'.$sub_cat_details->image_thumb);?>" alt=""><?php echo ucwords(str_replace ("-"," ",$folder_name_page));?></a>
								<?php } else {?>
								<a href="<?php echo base_url($folder_name_page.'/'.$page_title)?>" style="color: #fff;"><?php echo ucwords(str_replace ("-"," ",$folder_name_page));?></a>
								<?php } ?>
								</div>
								<?php $tags_array = strip_tags($meta_tags);
								$tags_array = explode(",", $tags_array);
								if(count($tags_array)>0){
								foreach ($tags_array as $single_tag){
								?>
								<div class="breadcrum"><?php echo ucwords($single_tag);?></div>
								<?php }}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<img class="lazy img-responsive " src="<?php echo base_url() ?>/assets/img/loading-icon-big.gif" data-src="<?php echo base_url() ?>/assets/img/add6.png" alt="">
			</div>
		</div> -->
		<!-- 
		<div class="row seciton-top-bot">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="btn-align">
					<button class="btn-align-style">
						Next <i class="fa fa-arrow-right" aria-hidden="true"></i>
					</button>
				</div>
			</div>
		</div> -->
		<div class="clearfix visible-md visible-lg"></div>
	</div>
</div>