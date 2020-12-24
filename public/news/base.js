jQuery(document).ready(function($){
	"use strict";

	/* Flexslider */
	jQuery(window).load(function() {
		jQuery('.flexslider').flexslider({
			animation: "fade",
			animationLoop: true,
			start: function(slider) {
				jQuery( '.flexslider' ).removeClass('loading');
			}
		});
	});

	/* Flexslider - Testimonials */
	jQuery(document).ready(function () {
		jQuery(window).load(function() {
			jQuery('.testimonials').flexslider({
			animation: "fade"
			});
		});
	});

	/* Gallery Posts Slider */
	jQuery(window).ready(function() {

		jQuery('#flexslider-gallery-carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: true,
			itemWidth: 150,
			asNavFor: '.flexslider-gallery'
		});

		jQuery('.flexslider-gallery').flexslider({
			animation: "fade",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			sync: "#flexslider-gallery-carousel",
			start: function(slider) {
				jQuery( '.flexslider-gallery' ).removeClass('loading');
			}
		});

	});


	/* Mean Menu */

	/* Toggle for Search form */
	jQuery(".search-form a").click(function () {
		jQuery(this).parent().toggleClass('active');
	});

	/* Tabs */
	/* Toggle for Social Buttons */
	jQuery(".share-bt .share-click").click(function () {
		jQuery(".share-buttons").toggle();
	});

	jQuery(".share-bt .share-click").click(function () {
		jQuery(".share-bt").toggleClass( "square" );
	});

	/* Go Top */
	jQuery(".go-top").click(function() {
	  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
	  return false;
	});

	/* Tabs */
	jQuery('.panes div').hide();
	jQuery(".tabs:not(.wc-tabs) a:first").addClass("selected");
	jQuery(".tabs_table").each(function(){
			jQuery(this).find('.panes div:first').show();
			jQuery(this).find('a:first').addClass("selected");
	});
	jQuery('.tabs:not(.wc-tabs) a').click(function(){
			var which = jQuery(this).attr("rel");
			jQuery(this).parents(".tabs_table").find(".selected").removeClass("selected");
			jQuery(this).addClass("selected");
			jQuery(this).parents(".tabs_table").find(".panes").find("div").hide();
			jQuery(this).parents(".tabs_table").find(".panes").find("#"+which).fadeIn(800);
	});

	/* Toggle */
	jQuery(".toggle-content .expand-button").click(function() {
		jQuery(this).toggleClass('close').parent('div').find('.expand').slideToggle(250);
	});

	/* FitVids */

	/* WooCommerce stars */
	$( 'body.woocommerce .single-product .woocommerce-Reviews' ).on( 'mouseover', '.comment-form-rating .stars a', false, function() {
		$( this ).prevAll().addBack().addClass( 'color' );
		$( this ).nextAll().removeClass( 'color' );
	} );

	$( 'body.woocommerce .single-product .woocommerce-Reviews' ).on( 'mouseleave', '.comment-form-rating .stars span', false, function() {
		if( $( this ).children().hasClass( 'active' ) ) {
			$( this ).children( '.active' ).prevAll().addBack().addClass( 'color' );
			$( this ).children( '.active' ).nextAll().removeClass( 'color' );
		} else {
			$( this ).children().removeClass( 'color' );
		}
	} );

	$( 'body.woocommerce .single-product .woocommerce-Reviews' ).on( 'click', '.comment-form-rating .stars a', false, function() {
		$( this ).addClass( 'color' );
		$( this ).prevAll().addClass( 'color' );
		$( this ).nextAll().removeClass( 'color' );
	} );

});

// Share buttons
function twwindows(object) {
	window.open( object, "twshare", "height=400,width=550,resizable=1,toolbar=0,menubar=0,status=0,location=0" )
}

function fbwindows(object) {
	window.open( object, "fbshare", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" )
}

function pinwindows(object) {
	window.open( object, "pinshare", "height=270,width=630,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" )
}