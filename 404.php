<?php get_header(); ?>

			<h2>Oops!</h2>
		
			<p>We don't find anything at this address. Check out one of my featured projects...</p>
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
			<div class="portfolio-page">
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
			<?php else : ?>
				<h3>No Projects Listed</h3>
			</div>
			<?php endif;
		wp_reset_postdata(); ?>
		
		<?php get_template_part( 'inc/copyright' ) ?>

	</main><!-- main -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>