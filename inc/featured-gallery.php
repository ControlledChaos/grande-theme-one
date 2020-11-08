<div class="featured-gallery" id="<?php echo 'gallery-' . $projectID; ?>">
<?php 
$galleryImages = get_field( 'project_gallery' );
if( $galleryImages ): $i = 0; 
foreach( $galleryImages as $galleryImage ): $i++; if($i != 1): ?>
	<a class="fancybox" data-fancybox-group="<?php echo 'gallery-' . $projectID; ?>" rel="<?php echo 'gallery-' . $projectID; ?>" href="<?php echo $galleryImage['url']; ?>">
		 <img src="<?php echo $galleryImage['sizes']['large']; ?>" />
	</a>
<?php endif; if (++$i == 24) break; endforeach; endif; ?>
<a class="fancybox" data-fancybox-group="<?php echo 'gallery-' . $projectID; ?>" rel="<?php echo 'gallery-' . $projectID; ?>" href="<?php bloginfo( 'template_directory' ); ?>/images/placeholder.jpg"></a>
</div><!-- featured-gallery -->