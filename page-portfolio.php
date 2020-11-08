<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 * 
 * Template name: Portfolio
 * 
 */
get_header(); ?>

			<article id="page-<?php the_ID(); ?>">

				<h2 class="page-title"><?php the_title(); ?></h2>

				<?php
				$args = array(
					'post_type' => 'project',
					'posts_per_page' => 12,
					'tax_query' => array(
						array(
							'taxonomy' => 'priority',
							'field'    => 'slug',
							'terms'    => 'featured'
						),
					),
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) : ?>
					<div class="portfolio-page" id="featured">
						<h3>Featured Projects</h3>
						<div class="project-grid">
							<ul class="portfolio-gallery">
							<?php while ( $query->have_posts() ) : $query->the_post();
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
						<div class="more"><a href="http://www.greggrandedesign.com/priority/featured/">All Featured Projects</a></div>
						<hr />
					<?php else : ?>
						<h3>No Projects Listed</h3>
					
					<?php endif; ?>
					</div><!-- #featured -->
				<?php wp_reset_postdata(); ?>
				
				<?php
				$args = array(
					'post_type' => 'project',
					'posts_per_page' => 4,
					'tax_query' => array(
						array(
							'taxonomy' => 'priority',
							'field'    => 'slug',
							'terms'    => 'other'
						),
					),
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) : ?>
					<div class="portfolio-page" id="other">
						<h3>Other Projects</h3>
						<div class="project-grid">
							<ul class="portfolio-gallery">
							<?php while ( $query->have_posts() ) : $query->the_post();
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
						<div class="more"><a href="http://www.greggrandedesign.com/priority/other/">All Other Projects</a></div>
					<?php else : ?>
						<h3>No Projects Listed</h3>
					<?php endif; ?>
					</div><!-- #other -->
				<?php wp_reset_postdata(); ?>

			</article>

		<?php get_template_part( 'template-parts/copyright' ) ?>

	</main><!-- main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
