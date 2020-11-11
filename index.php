<?php
/**
 * @package ClassicPress/WordPress
 * @subpackage Grande-Design
 * @since 1.0.0
 *
 */
get_header(); ?>

	<main>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="hentry" id="post-<?php the_ID(); ?>">

				<div class="post-entry">
				
					<?php the_content(); ?>

				</div>

			</article>

		<?php endwhile; ?>
		
		<?php get_template_directory( '/inc/pagination.php' ); ?>

		<?php else : ?>

			<h2 class="post-title">Nothing Posted</h2>
			
		<?php endif; ?>
		
		<?php get_template_part( 'template-parts/copyright' ) ?>

	</main><!-- main -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
