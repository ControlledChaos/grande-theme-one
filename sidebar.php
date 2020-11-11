<aside>
		
	<nav class="nav" role='navigation'>
		
		<?php if ( !is_front_page()) { ?><a href="<?php echo home_url(); ?>/" title="Greg Grande Homepage"><?php } ?><img class="logo" src="<?php bloginfo( 'template_directory' ); ?>/images/logo.jpg" alt="Grande Design logo" /><?php if ( !is_front_page()) { ?></a><?php } ?>
		
		<?php wp_nav_menu( array( 'theme_location' => 'navigation' ) ); ?>

	</nav>
	<div class="menu-toggle"></div>
</aside>