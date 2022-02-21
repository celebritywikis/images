<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php
foreach ($images as $image){
	$singleArticleDetails = $article->get_by_id($image->article_id);
	$folder_name = $singleArticleDetails->folder_name;
	
	$article_full_details = $article->getArticleByFolderName($folder_name);
	$category_name = $article_full_details[0]->categoryname;
	$category_name = strtolower($category_name);
	$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
	
	$updated_date=$image->updated_date;
	$blog_timezone = 'UTC';
	$timezone_offset = '+00:00';
    $W3C_datetime_format_php = 'Y-m-d\Th:i:s'; // See http://www.w3.org/TR/NOTE-datetime
    
    $single_filename = $image->title;
	$single_filename = $article->getCleanUrl($single_filename);
	$id = $article->urlEncodeId($image->id);

	$lastModifiedDate = $file->date_decode($updated_date, $blog_timezone, $W3C_datetime_format_php) . $timezone_offset;
?>
<url>
<loc><?php echo base_url($folder_name.'/'.$single_filename.'/'.$id);?></loc>
<lastmod><?php echo $lastModifiedDate;?></lastmod>
<changefreq>daily</changefreq>
<priority>0.8</priority>
<image:image>
<image:loc><?php echo base_url($create_month_folder).$image->image_large;?></image:loc>
<image:title><?php echo $image->title;?></image:title>
</image:image>
<image:image>
<image:loc><?php echo base_url($create_month_folder).$image->image_medium;?></image:loc>
<image:title><?php echo $image->title;?></image:title>
</image:image>
<image:image>
<image:loc><?php echo base_url($create_month_folder).$image->image_thumb;?></image:loc>
<image:title><?php echo $image->title;?></image:title>
</image:image>
<image:image>
<image:loc><?php echo base_url($create_month_folder).$image->image_mobile;?></image:loc>
<image:title><?php echo $image->title;?></image:title>
</image:image>
</url>
<?php } ?>
</urlset>
