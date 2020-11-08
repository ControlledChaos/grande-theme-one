<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 */
get_header(); ?>

		<?php if ( have_posts() ) : 

		$post = $posts[0]; // Set $post so that the_date() works. 
		if ( is_category() ) { echo '<h2 class="archive-title">Archive for the "'; single_cat_title(); echo '" Category</h2>'; } 
		elseif ( is_tag() ) { echo '<h2 class="archive-title">Posts Tagged "'; single_tag_title(); echo'"</h2>'; } 
		elseif ( is_day() ) { echo '<h2 class="archive-title">Archive for '; get_option( 'date_format' ); echo '</h2>'; } 
		elseif ( is_month() ) { echo '<h2 class="archive-title">Archive for '; the_date('F, Y'); echo '</h2>'; } 
		elseif ( is_year() ) { echo '<h2 class="archive-title">Archive for '; the_date('Y'); echo '</h2>'; }
		elseif ( is_author() ) { echo '<h2 class="archive-title">Posts by '; the_author(); echo '</h2>'; }
		elseif ( isset($_GET['paged'] ) && !empty( $_GET['paged']) ) { echo '<h2 class="archive-title">Blog Archives</h2>'; } 

		while ( have_posts() ) : the_post(); ?>
				
			<article <?php post_class() ?>>
					
			<h2 class="post-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<div class="archive-content">
							
					<?php the_content(); ?>
								
				</div>

			</article>

			<?php endwhile; ?>

			<?php get_template_directory( '/inc/pagination.php' ); ?>
				
		<?php else : ?>
		
			<h2 class="archive-title">Nothing found</h2>
			
		<?php endif; ?>
		
		<?php get_template_part( 'inc/copyright' ) ?>

	</main><!-- main -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>