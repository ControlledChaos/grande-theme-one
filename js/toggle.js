jQuery(document).ready(function() {	jQuery(".menu-toggle").click(function () {
	jQuery("aside").toggleClass('open')	});	jQuery(".nav li").click(function () {
	jQuery(".menu-toggle").removeClass('open')	});
});