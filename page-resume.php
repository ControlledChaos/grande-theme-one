<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 *
 * Template Name: Resume
 *
 */

$resume = get_field( 'resume_file' );
if ( $resume ) {
	$resume_url = $resume;
} else {
	$resume_url = 'http://www.innovativeartists.com/upload/GRANDE.GREG.web.resume.pdf';
}

get_header(); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="resume" id="page-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>

				<h3><?php the_field( 'resume_section_title' ); ?></h3>

				<?php the_field( 'resume_content' ); ?>

				<hr />

				<h3>Projects</h3>

					<ul class="resume-links">
					<li><a class="tooltip" title="Featured Projects" href="http://www.greggrandedesign.com/priority/featured/">Featured</a> |</li>
						<li><a class="tooltip" title="IMDb Profile" href="http://www.imdb.com/name/nm0334805/" target="_blank">IMDb&nbsp;&nbsp;<i class="fa fa-external-link"></i></a> |</li>
						<li><a class="tooltip" title="Resume File" href="<?php echo esc_url( $resume_url ); ?>" target="_blank">Download&nbsp;&nbsp;<i class="fa fa-download"></i></a> |</li>
						<li><a class="tooltip" title="All Other Projects" href="http://www.greggrandedesign.com/priority/other/">More</a></li>
					</ul>

				<?php if ( get_field( 'video_reel' )) { ?>
				<section id="featured" class="featured">

					<h3>Video Reel</h3>

					<div class="embed-container">
						<?php the_field( 'video_reel' ); ?>
					</div>

				</section>

				<?php } ?>

				<?php if ( get_field( 'add_awards' )) { ?>

				<hr />

				<h3>Awards</h3>

				<?php if ( have_rows( 'awards_list' )):
				echo '<ul class="awards-list">';
				while ( have_rows( 'awards_list' )) : the_row();
				echo '<li><h4>' . get_sub_field( 'award_title' ) . '</h4><p>' . get_sub_field( 'award_description' ) . '</p><p>For <span style="font-weight: bold; font-weight: 700;">"' . get_sub_field( 'awarded_for' ) . '"</span></p></li>';	endwhile; echo '</ul>'; endif; } ?>

			</article>

		<?php endwhile; endif; ?>

		<?php get_template_part( 'template-parts/copyright' ) ?>

	</main><!-- main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
