<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if IE ]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<meta name="title" content="<?php bloginfo( 'name' ); ?>">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<meta name="robots" content="index,follow" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<?php if ( is_search() ) echo '<meta name="robots" content="noindex, nofollow" />'; ?>
<meta name="web_author" content="Greg Sweet | Controlled Chaos Design | ccdzine.com">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Facebook Open graph meta -->
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
<meta property="og:title" content="<?php if (is_front_page()) { echo'Greg Grande'; } else { echo 'Greg Grande | ' . get_the_title(); } ?>" />
<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
<meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/images/sharing.jpg" />

<!-- Twitter Card meta data -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?php bloginfo( 'name' ); ?>" />
<meta name="twitter:title" content="<?php echo get_the_title(); ?>">
<meta name="twitter:description" content="<?php bloginfo( 'description' ); ?>" />
<meta name="twitter:url" content="<?php echo get_the_permalink(); ?>" />
<meta name="twitter:image:src" content="<?php bloginfo( 'template_directory' ); ?>/images/sharing.jpg" />