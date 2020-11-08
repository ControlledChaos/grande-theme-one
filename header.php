<?php
/**
 * Header template
 *
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 *
 */
?><!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head data-template-set="grande">

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="prev" href="<?php echo previous_posts(); ?>">
<link rel="next" href="<?php echo next_posts(); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php if( is_front_page()) { ?>
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
