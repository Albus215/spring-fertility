var select_id = '';

function hide_parents() {

	active_select = 'ul#select2-acf-' + select_id + '-results li';

	$( active_select ).each( function() {
		if ( $(this).text().indexOf('-') <= -1 ) {
	   		$(this).css( 'pointer-events', 'none' );			
		}
	});

}


$(function($){

	$( '.acf-taxonomy-field' ).on( 'click ', function() {
		if ( $( this ).attr( 'data-taxonomy' ) == 'knowledge_topic' ) {
			select_id = $(this).find( 'select' ).attr('name');
			select_id = select_id.substring( select_id.lastIndexOf( '[' )+1, select_id.lastIndexOf( ']' ) );

	  		setTimeout( hide_parents, 1400);
		}
	});

});
