<?php
/**
 * Footer template
 *
 * @package WordPress
 * @subpackage Grande-Design
 * @since Grande Design 1.0
 *
 */
?>
</div><!-- wrapper -->

<?php wp_footer(); ?>

<!-- Web Font Loader | Documentation at: https://github.com/typekit/webfontloader -->
<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
<script>
	WebFont.load({
	google: {
		families: ['Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic:latin']
		}
	});
</script>

<script src="https://use.typekit.net/gqn1jpx.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<script>
	
// FitText used if the intro slideshow is activated
	jQuery("#site-title").fitText(0.7, { minFontSize: '24px', maxFontSize: '90px' });
	jQuery("#description").fitText(1.4, { minFontSize: '14px', maxFontSize: '48px' });
</script>

<!-- Fancybox -->
<script>
	
// Initiate touch swipe if 768px or smaller
var pixelRatio = window.devicePixelRatio || 1;
if (window.innerWidth/pixelRatio < 769 ) {

jQuery(document).ready(function() {
	jQuery( ".notice, a[href$='.jpg'], a[href$='.jpeg'], a[href$='.png'], a[href$='.gif']" ).attr( 'rel', 'gallery' ).fancybox({
		padding     : 0,
		openEffect  : 'elastic',
		closeEffect : 'none',
		closeClick  : false,
        arrows: false,
		loop: false,
		tpl: {
			loading  : '<div id="fancybox-loading"><div><i class="fa fa-2x fa-spinner fa-pulse"></i></div></div>'
		},
		helpers     : { 
			overlay : {closeClick: false},
			title : false
		},
		afterShow: function() {
			jQuery('.fancybox-wrap').swipe({
				swipe : function(event, direction) {
					if (direction === 'left' || direction === 'up') {
						jQuery.fancybox.prev( direction );
						} else {
						jQuery.fancybox.next( direction );
					}
				}
			});
        },
        afterLoad : function() {
        }
	});
});

} else {

// Desktop/laptop galleries
jQuery(document).ready(function() {
	jQuery( ".notice, a[href$='.jpg'], a[href$='.jpeg'], a[href$='.png'], a[href$='.gif']" ).attr( 'rel', 'gallery' ).fancybox({
		padding     : 0,
		openEffect  : 'elastic',
		closeEffect : 'none',
		closeClick  : false,
		loop: false,
		tpl: {
			loading  : '<div id="fancybox-loading"><div><i class="fa fa-2x fa-spinner fa-pulse"></i></div></div>'
		},
		helpers     : { 
			overlay : {closeClick: true},
		},
	});
});

}

// Vimeo lightnox
jQuery(document).ready(function() {
	jQuery( '#video-link' ).fancybox({
		padding     : 0,
		openEffect  : 'elastic',
		closeEffect : 'none',
		type : 'iframe',
		aspectRatio : true,
		closeClick  : false,
		tpl: {
			loading  : '<div id="fancybox-loading"><div><i class="fa fa-2x fa-spinner fa-pulse"></i></div></div>'
		},
		helpers     : { 
			overlay : {closeClick: false}
		}
	});
});
</script>

<!-- Tooltipster -->
<script>

// Encanced title tooltips on homepage
var pixelRatio = window.devicePixelRatio || 1;
if (window.innerWidth/pixelRatio > 768 ) {
	jQuery(document).ready(function() {
		jQuery( '.tooltip' ).tooltipster();
	});
}
</script>

<script>
// Loadung screen
jQuery(window).load(function() {
	jQuery('.loader').fadeOut('slow');
})
</script>

<a href="http://ccdzine.com/" rel="nofollow" style="text-indent: -9999px; font-size: 0px; visibility: hidden;">Controlled Chaos Design</a>

</body>

</html>
