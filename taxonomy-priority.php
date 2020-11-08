<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 */
get_header(); ?>

			<h2>Project Portfolio</h2>
			<?php if ( have_posts() ) : ?>
			<div class="portfolio-page">
				<div class="project-grid">
				<?php while ( have_posts() ) : the_post(); 
				$thumb = get_field('portfolio_thumbnail');
				$size = 'Poster'; ?>
					<ul class="portfolio-gallery">
						<li>
							<figure id="project-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>">
								<?php if( $thumb ) { echo wp_get_attachment_image( $thumb, $size );	} ?>
								<figcaption><?php the_title(); ?></figcaption>
							</a></figure>
						</li>
					</ul>
			<?php endwhile; echo '</div><!-- project-grid -->' else : ?>
			<h2>No Projects Listed</h2>
			</div>
			<?php endif; ?>
		
		<?php get_template_part( 'inc/copyright' ) ?>

	</main><!-- main -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>