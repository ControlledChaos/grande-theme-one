<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 */
get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="project" id="project-<?php the_ID(); ?>">
				
				<h2 class="project-title"><?php the_title(); ?></h2>
				<?php if ( is_singular( 'project' ) && has_term( 'featured', 'priority' ) ) { echo '<h4 class="featured-project">Featured Project</h4>'; } ?>
				
				<h4>Client: <?php the_field( 'project_client' ); ?></h4>
				
				<p class="project-description"><?php echo get_field( 'project_description' ); ?></p>
				
				<?php  
				$imdb = get_field( 'imdb_link' );
				if ( $imdb ) { ?>
				<p><a href="<?php echo $imdb; ?>" target="blank">IMDb Page</a>&nbsp;&nbsp;<i class="fa fa-external-link"></i></p>
				<?php } ?>
				
				<div class="project-nav top">
				<?php get_template_part( 'inc/project-nav' ); ?>
				</div>
				<?php if( get_field( 'add_video' )) { echo '<h3>Video</h3>'; } ?>				
				<?php if( get_field( 'add_video' ) && get_field( 'vimeo_url' ) ) { ?>					
				<div class="embed-container">
					<?php the_field( 'vimeo_url' ); ?>
				</div>
				<?php } ?>				
				<?php if( get_field( 'project_gallery' )) { echo '<h3>Stills</h3>'; ?>				
				<?php 
				$images = get_field( 'project_gallery' );
				if( $images ): ?>
					<ul class="project-gallery">
						<?php foreach( $images as $image ): ?>
							<li>
								<a href="<?php echo $image['url']; ?>">
									 <img src="<?php echo $image['sizes']['thumbnail']; ?>" />
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; } 
				else { 
				$poster = get_field( 'portfolio_thumbnail' );
				$size = 'Poster';
				$video = get_field( 'add_video' );
					if( $poster && !$video ) {
						echo wp_get_attachment_image( $poster, $size );
					}
				} ?>

			</article>
			
			<div class="project-nav bottom">
			<?php get_template_part( 'inc/project-nav' ); ?>
			</div>

		<?php endwhile; endif; ?>
		
		<?php get_template_part( 'template-parts/copyright' ) ?>

	</main><!-- main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>