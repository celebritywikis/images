<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($articles as $eacharticle){ 
	$article_id = $eacharticle->id;
	$folder_name = $eacharticle->folder_name;
	$updated_date = $eacharticle->updated_date;

	$title = $eacharticle->title;
	$title = $article->getCleanUrl($title);

	$category_name = $eacharticle->categoryname;
	$name = str_replace('-', ' ', $folder_name);
	$category_name = strtolower($category_name);
	$create_month_folder = '/uploads/'.$category_name.'/'.$folder_name.'/';
	
	$blog_timezone = 'UTC';
	$timezone_offset = '+00:00';
    $W3C_datetime_format_php = 'Y-m-d\Th:i:s'; // See http://www.w3.org/TR/NOTE-datetime

	$getFileCount = $file->getFileCountByArticleId($article_id);
	$lastModifiedDate = $file->date_decode($updated_date, $blog_timezone, $W3C_datetime_format_php) . $timezone_offset;
	$results_per_page = 12;

	$page_first_result = ($page-1) * $results_per_page;

	$number_of_page = ceil ($getFileCount / $results_per_page);
	for($i=0;$i<=$number_of_page;$i++){
	if($i>=1){ ?>
	<url>
	<loc><?php echo base_url($folder_name.'/'.$title.'?page='.$i)?></loc>
	<lastmod><?php echo $lastModifiedDate; ?></lastmod>
	<changefreq>daily</changefreq>
	<priority>0.8</priority>
	</url>
	<?php } } }?>
</urlset>