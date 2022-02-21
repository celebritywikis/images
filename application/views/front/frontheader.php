<!DOCTYPE html>
<html dir='ltr' lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:b='http://www.google.com/2005/gml/b'
      xmlns:data='http://www.google.com/2005/gml/data' xmlns:expr='http://www.google.com/2005/gml/expr'>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="description" content="<?php if(empty($meta_description)){ echo 'Latest HD Photos, 1080p images, HD wallpapers for Android and Iphone Mobiles';}else {echo $meta_description;}?>">
<meta name="keywords" content="<?php echo str_replace('&nbsp;',"",$meta_keywords);?>">
<link rel="canonical" href="<?php if(empty($url))echo base_url(); else {echo $url;}?>"/>
<meta property="og:title" content=" <?php echo $count?>+ <?php echo $title;?> " />
<meta property="og:description" content="<?php if(empty($meta_description)){ echo 'Latest HD Photos, 1080p images, HD wallpapers for Android and Iphone Mobiles';}else {echo $meta_description;}?>" />
<meta property="og:site_name" content="108images" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php if(empty($url))echo base_url(); else {echo $url;}?>" />
<?php 
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
<meta property="og:image" content="<?php echo base_url($create_month_folder).$value->image_large?>" />
<?php } } ?>
<?php $tags_array = strip_tags($meta_tags);
$tags_array = explode(",", $tags_array);
if(count($tags_array)>0){
foreach ($tags_array as $single_tag){
?>
<?php if(strlen($single_tag)){?>
<meta property="og:tag" content="<?php echo trim($single_tag);?>" />
<?php } ?>
<?php } }else {?>
<meta property="og:tag" content="<?php echo trim($tags_array);?>" />
<?php } ?>

<meta name="twitter:title" content="<?php echo $count?>+ <?php echo $title;?>" />
<meta name="twitter:description" content="<?php if(empty($meta_description)){ echo 'Latest HD Photos, 1080p images, HD wallpapers for Android and Iphone Mobiles';}else {echo $meta_description;}?>" />
<meta name="twitter:card" content="summary_large_image" />
<!-- <meta name="twitter:site" content="" /> -->
<meta name="twitter:url" content="<?php if(empty($url))echo base_url(); else {echo $url;}?>" />
<?php 
$iTwitter=0;
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
<meta name="twitter:images<?php echo $iTwitter?>" content="<?php echo base_url($create_month_folder).$value->image_large?>" />
<?php $iTwitter++;} } ?>




<title><?php echo $title?></title>
<link href="<?php echo base_url() ?>/assets/font.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/style/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>/assets/style/style.css">
<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
<meta name="google-site-verification" content="eBVnjXSOAHxudR-hZHoeo29uwk03-vH2IbuFv6THdU4" />
<script data-ad-client="ca-pub-2978950148664875" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-554401LVC7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-554401LVC7');
</script>
</head>
<body>
	<header id="header">
		<div id="nav">
			<div id="nav-fixed">
				<div class="container main-container">
					<div class="nav-btns shs-right">
						<button class="search-btn">
							<i class="fa fa-search"></i>
						</button>
						<div class="search-form">
							<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
							<button class="search-close">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
					<div class="nav-btns shs-left">
						<button class="aside-btn">
							<i class="fa fa-bars"></i>
						</button>
					</div>
					<div class="nav-logo">
						<a href="<?php echo base_url() ?>" class="logo logo-style">108 Images</a>
					</div>
					<!-- <ul class="nav-menu nav navbar-nav">
						<li><a href="category.html">News</a></li>
						<li><a href="category.html">Popular</a></li>
						<li class="cat-1"><a href="category.html">Web Design</a></li>
						<li class="cat-2"><a href="category.html">JavaScript</a></li>
						<li class="cat-3"><a href="category.html">Css</a></li>
						<li class="cat-4"><a href="category.html">Jquery</a></li>
					</ul> -->
				</div>
			</div>
			<div id="nav-aside">
				<div class="section-row">
					<ul class="nav-aside-menu">
						<li><a href="<?php echo base_url() ?>">Home</a></li>
						<li><a href="<?php echo base_url() ?>aboutus">About Us</a></li>
						<li><a href="<?php echo base_url() ?>contactus">Contacts</a></li>
						<li><a href="<?php echo base_url() ?>disclaimer">Disclaimer</a></li>
						<li><a href="<?php echo base_url() ?>policy">Privacy Policy</a></li>
					</ul>
				</div>
				<div class="section-row">
					<h3 class="h3-color">Follow us</h3>
					<ul class="nav-aside-social">
						<li><a href=""><i class="fa fa-facebook"></i></a></li>
						<li><a href=""><i class="fa fa-twitter"></i></a></li>
						<li><a href=""><i class="fa fa-google-plus"></i></a></li>
						<li><a href=""><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
				<button class="nav-aside-close">
					<i class="fa fa-times"></i>
				</button>
			</div>
		</div>
	</header>