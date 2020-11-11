<?php
/**
 * Header template
 *
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 *
 */

if ( is_home() && ! is_front_page() ) {
    $canonical = get_permalink( get_option( 'page_for_posts' ) );
} elseif ( is_archive() ) {
    $canonical = get_permalink( get_option( 'page_for_posts' ) );
} else {
    $canonical = get_permalink();
}

?>
<!doctype html>
<?php do_action( 'before_html' ); ?>
<html <?php language_attributes(); ?> class="no-js">

<head id="<?php echo get_bloginfo( 'wpurl' ); ?>" data-template-set="<?php echo get_template(); ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!--[if IE ]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open() ) {
		echo sprintf( '<link rel="pingback" href="%s" />', get_bloginfo( 'pingback_url' ) );
	} ?>
	<link href="<?php echo $canonical; ?>" rel="canonical" />
	<?php if ( is_search() ) { echo '<meta name="robots" content="noindex,nofollow" />'; } ?>

	<!-- Prefetch font URLs -->
	<link rel='dns-prefetch' href='//fonts.adobe.com'/>
	<link rel='dns-prefetch' href='//fonts.google.com'/>

	<?php do_action( 'before_wp_head' ); ?>
	<?php wp_head(); ?>
	<?php do_action( 'after_wp_head' ); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( is_front_page() ) { ?>
	<div class="loader">
		<div class="loader-image">
			<img src="<?php bloginfo( 'template_directory' ); ?>/images/logo.jpg" />
		</div>
		<span class="loading">Loading&hellip;<br /><i class="fa fa-spinner fa-2x fa-pulse"></i></span>
	</div>
<?php } else { ?>
	<div class="loader">
		<span class="loading"><i class="fa fa-spinner fa-2x fa-pulse"></i></span>
	</div>
<?php } ?>

	<div class="wrapper">

		<main>
			<?php if ( is_front_page() && get_field( 'add_slideshow', 2 ) ) { ?>

				<style>

				.header {
					position: absolute;
					width: 100%;
					height: 100%;
					top: 0px;
					left: 0px;
					z-index: 1000;
					display: flex;
					justify-content: center;
					align-items: center;
					flex-direction: column;
				}

				h1.site-title {
					font-size: 7vw;
					text-align: center;
					margin-bottom: 0.2em;
					padding-bottom: 0.2em;
					line-height: 1em;
					border-bottom: #fff solid 2px;
					text-shadow:
						#000 0px 0px 10px,
						rgba(0,0,0,0.5) 3px 3px 7px,
						rgba(0,0,0,0.3) -1px -1px 7px !important;
				}

				@media screen and (min-width: 1281px) {

					h1.site-title {
						font-size: 9rem;
					}
				}

				h2.description {
					font-family: 'Sofia-Pro', 'Open Sans', sans-serif;
					font-size: 2rem;
					font-size: 3.3vw;
					text-align: center;
					text-transform: uppercase;
					text-shadow:
						#000 0px 0px 7px,
						rgba(0,0,0,0.5) 2px 2px 5px !important;
				}

				@media screen and (min-width: 1281px) {

					h2.description {
						font-size: 4.4rem;
					}
				}

				</style>

				<div class="intro">
					<?php
					$introSlides = get_field( 'intro_slides' );
					if( $introSlides ): ?>
						<div id="slider" class="flexslider">

							<ul class="slides">
								<?php foreach( $introSlides as $introSlide ): ?>
									<li>
										<img src="<?php echo $introSlide['url']; ?>" />
									</li>
								<?php endforeach; ?>
							</ul>

							<header class="header" role="banner">

								<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
								<h2 class="description"><?php bloginfo( 'description' ); ?></h2>

							</header>

						</div>
					<?php endif; ?>
				</div><!-- intro -->

			<?php } elseif ( is_front_page()) { ?>

				<header class="header" role="banner">

					<h1 id="site-title" class="site-title"><?php bloginfo( 'name' ); ?></h1>
					<h2 id="description" class="description"><?php bloginfo( 'description' ); ?></h2>

				</header>

			<?php } ?>
