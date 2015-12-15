/*
Upsells
*/

jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation link and Upgrade to PRO link */


	if( !jQuery( ".fara-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section fara-upsells" style="padding-bottom: 15px">');
		}

    if( jQuery( ".fara-upsells" ).length ) {

  		jQuery('.fara-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://github.com/Codeinwp/fara" class="button" target="_blank">{github}</a>'.replace('{github}', faraCustomizerObject.github));
  		jQuery('.fara-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/fara#postform" class="button" target="_blank">{review}</a>'.replace('{review}', faraCustomizerObject.review));

  	}

	if ( !jQuery( ".fara-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}
});
