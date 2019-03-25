jQuery(document).ready(function() {
	
	jQuery('#email').keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});
	jQuery('#Nama').keyup(function() {
		$(this).val($(this).val().toUpperCase());
	});
	
});