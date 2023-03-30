(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).ready(function() {
		$("#wdm-sub-btn").on("click", function(e) {
			let email = $("#wdm-sub-me").val();
			console.log(email);
			$.ajax({
				url : "http://plugin-assg.local/wp-content/plugins/subscribe-me/public/js/db_insert.php",
				type : "POST",
				data: {sub_email: email},
				success: function(data){
					$("#asd").html(data)
					// console.log(data);
				}

			})
		})
	})

})( jQuery );

