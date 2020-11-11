<?php
/**
 * @package ClassicPress/WordPress
 * @subpackage Grande-Design
 * @since 1.0.0
 */
get_header(); ?>

			<h2>Other Projects</h2>
			<?php if ( have_posts() ) : ?>
			<div class="portfolio-page">
				<div class="project-grid">
					<ul class="portfolio-gallery">
					<?php while ( have_posts() ) : the_post(); 
					$thumb = get_field('portfolio_thumbnail');
					$size = 'Poster'; ?>
						<li>
							<figure id="project-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>">
								<?php if( $thumb ) { echo wp_get_attachment_image( $thumb, $size );	} ?>
								<figcaption><?php the_title(); ?></figcaption>
							</a></figure>
						</li>
					<?php endwhile; ?>
					</ul>
				</div><!-- project-grid -->
				<div class="more"><a href="http://www.greggrandedesign.com/priority/featured/">Featured Projects</a></div>
			<?php else : ?>
			<h2>No Projects Listed</h2>
			</div>
			<?php endif; ?>
		
		<?php get_template_part( 'template-parts/copyright' ) ?>

	</main><!-- main -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>