<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php for($i=0;$i<=$number_of_page;$i++){
if($i>=1){
	?>
<url>
<loc><?php echo base_url()?>sitemap/images.xml?page=<?php echo $i;?></loc>
</url>
<?php } }?>
</urlset>