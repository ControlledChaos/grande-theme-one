<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 */
get_header(); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>">
				
				<h2><?php the_title(); ?></h2>

				<div class="post-content">
					
					<?php the_content(); ?>
					
				</div>

			</article>

		<?php endwhile; endif; ?>
		
		<?php get_template_part( 'inc/copyright' ) ?>

	</main><!-- main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>