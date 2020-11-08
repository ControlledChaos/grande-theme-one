<?php
/**
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 * 
 * Template Name: Contact
 * 
 */
get_header(); ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<article id="page-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>
				
					<h3>Agency</h3>

					<div class="contant-info">
					
						<?php the_field( 'contact_info' ); ?>
					
					</div>

					<?php if(get_field( 'add_agents' )) { ?>
					
					<h3>Representatives</h3>
					
					<div class="agents">					
					<?php if ( have_rows( 'agents' ) ): ?>
					<?php while ( have_rows( 'agents' ) ) : the_row(); ?>
					
						<div class="agent">
					
							<h4><?php the_sub_field( 'agent_name' ) ?></h4>
							<a class="phone-link" href="tel:1-<?php the_sub_field( 'agent_phone' ) ?>"><?php the_sub_field( 'agent_phone' ) ?></a><br />
							<a href="mailto:<?php the_sub_field( 'agent_email' ) ?>"><?php the_sub_field( 'agent_email' ) ?></a>
						
						</div><!-- agent -->

					<?php endwhile; ?>
					<?php else : endif; ?>
					</div><!-- agents -->
					<?php } ?>
					<?php $form = get_field( 'form_shortcode' ); if ( $form ) { ?>

					<p>Or send Greg an email..</p>
					
					<div class="form">

						<?php echo do_shortcode( "$form" ); ?>
					
					</div><!-- contact-form -->
					<?php } ?>

			</article>
			
		<?php endwhile; endif; ?>
		
		<?php get_template_part( 'template-parts/copyright' ) ?>

	</main><!-- main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
