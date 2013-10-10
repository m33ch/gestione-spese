$(function(){
	$('.ui.dropdown').dropdown();

	$('.close').click(function(){
  		$(this).parent().transition()
	});

	$('.datepicker').pickadate({
	    // Escape any “rule” characters with an exclamation mark (!).
	    format: 'Hai selezionato: dddd, dd mmm, yyyy',
	    formatSubmit: 'yyyy/mm/dd',
	    hiddenSuffix: '_submit'
	});
	
}) 
