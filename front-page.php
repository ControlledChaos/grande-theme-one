<?php
/**
 * @package ClassicPress/WordPress
 * @subpackage Grande-Design
 * @since 1.0.0
 *
 * Template name: Front
 *
 */
get_header(); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php // Not currently used. Kept for possible future embedding of sizzle reel.
		if ( get_field( 'video_reel' )) { ?>
		<section id="featured" class="featured">
			<h2>Video Reel</h2>
			<div class="embed-container">
				<?php the_field( 'video_reel' ); ?>
			</div>
		</section>
		<?php } ?>
		<section id="featured" class="featured">
			<?php // Use larger heading if slideshow activated.
			if ( get_field( 'add_slideshow' )) { echo '<h2>Featured Projects</h2>'; } else { echo '<h3>Featured Projects</h3>'; }
			// Post type arguments
			$args = array(
				'post_type' => 'project',
				'posts_per_page' => 6,
				'tax_query' => array(
					array(
						'taxonomy' => 'priority',
						'field'    => 'slug',
						'terms'    => 'featured',
					),
				)
			);
			$query = new WP_Query( $args );
			// Post type loop
			if ( $query->have_posts() ) : ?>
			<div class="featured-projects">
				<ul class="featured-projects">
				<?php while ( $query->have_posts() ) : $query->the_post();
				// Set up post ID
				global $post;
				$projectID = $post->ID;
				// Custom fields
				$vimeo = get_field( 'vimeo_id' );
				$youtube = get_field( 'youtube_id' );
				$thumb = get_field( 'portfolio_thumbnail' );
				$size = 'Poster';
				?>
					<li>
						<figure id="<?php echo 'project-' . $projectID; ?>">
							<?php if( $thumb ) { echo wp_get_attachment_image( $thumb, $size );	} ?>
							<figcaption><?php the_title(); ?></figcaption>
							<div class="showcase-links">
							<?php
							// Vimeo link
							if ( $vimeo ) { ?><span><a id="video-link" title="Video" href="https://player.vimeo.com/video/<?php echo $vimeo; ?>?title=0&byline=0&portrait=0&color=cd612f&autoplay=1" class="trailer-link tooltip"><i class="fa fa-video-camera"></i></a>&nbsp;&nbsp;&nbsp;</span><?php }
							// YouTube link, not currently used
							elseif ( $youtube && get_field( 'video_source' ) == 'youtube' ) { ?><span><a id="video-link" title="Video" href="https://www.youtube.com/embed/<?php echo $youtube; ?>?rel=0&autoplay=1" class="trailer-link tooltip"><i class="fa fa-video-camera"></i></a>&nbsp;&nbsp;&nbsp;</span><?php }
							// Set up gallery link
							$galleryLinks = get_field( 'project_gallery' );

							if ( get_field( 'project_gallery' )) {
								$firstImage = $galleryLinks[0];
								$url = $firstImage['url'];	?>
							<span><a  class="tooltip" title="Stills" href="<?php echo $url; ?>" class="fancybox gallery-link" data-fancybox-group="<?php echo 'gallery-' . $projectID; ?>" rel="<?php echo 'gallery-' . $projectID; ?>"><i class="fa fa-camera"></i></a>&nbsp;&nbsp;&nbsp;</span><?php }
							// Link to project page ?>
							<span><a class="tooltip" title="Details" href="<?php the_permalink(); ?>"><i class="fa fa-info-circle"></i></a></span>
							</div>
						</figure>
					</li>

					<div class="featured-gallery" id="<?php echo 'gallery-' . $projectID; ?>">
					<?php
					// Gallery loop
					$galleryImages = get_field( 'project_gallery' );
					if( $galleryImages ): $i = 0;
					foreach( $galleryImages as $galleryImage ): $i++; if($i != 1): ?>
						<a class="fancybox" data-fancybox-group="<?php echo 'gallery-' . $projectID; ?>" rel="<?php echo 'gallery-' . $projectID; ?>" href="<?php echo $galleryImage['url']; ?>">
							 <img src="<?php echo $galleryImage['sizes']['large']; ?>" />
						</a>
					<?php endif; if (++$i == 12) break; endforeach; endif;
					// Final gallery frame notice ?>
					<a class="fancybox notice" data-fancybox-group="<?php echo 'gallery-' . $projectID; ?>" rel="<?php echo 'gallery-' . $projectID; ?>" href="<?php echo '#fancybox-link-' . $projectID; ?>"></a>
						<div id="<?php echo 'fancybox-link-' . $projectID; ?>" class="fancybox-link">
							<h3><?php the_title(); ?></h3>
							<p>More photos, video & info available on this project's page.</p>
							<p style="text-align: right;"><a href="<?php the_permalink(); ?>">Take me there</a> | <a href="javascript:jQuery.fancybox.close();">Close</a></p>
						</div>
					</div><!-- featured-gallery -->

				<?php endwhile; wp_reset_postdata(); ?>
				</ul><!-- featured-projects -->
			</div><?php endif; ?>

		</section>
		<?php endwhile; endif; ?>
		<div class="more"><a href="http://www.greggrandedesign.com/portfolio/">View Portfolio</a></div>
		<?php get_template_part( 'template-parts/copyright' ); ?>
	</main><!-- main -->

	<?php get_sidebar(); ?>

<script>

// Used if the intro slideshow is activated
jQuery(window).load(function() {
  jQuery( '.flexslider' ).flexslider({
    slideshow: true,
	slideshowSpeed: 5000,
    animation: "fade",
    animationSpeed: 800,
	directionNav: false,
	controlNav: false
  });
});
</script>

<?php get_footer(); ?>
