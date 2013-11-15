$(function(){

	$('.ui.dropdown')
      .dropdown()
    ;

    $('.ui.button.delete').on('click', function(event) {
    	
    	event.preventDefault();

    	var action = $(this).parent('form').attr('action'),
    		data = {_method: 'delete' };

    	$.ajax({
		    url:  action,
		    type: 'POST',
		    data: data,
		    success: function(result) {
		        
		    }
		});

    });	

    $('.ui.button.delete').popup();

   	$('.close').click(function(){
  		$(this).parent().transition()
	});

	$('.ui.checkbox')
	  .on('change', function() {
	    $(this)
	      .parent()
	      .next()
	      .children()
	      .transition('scale')
	      .children()
	      .focus()
	    ;
	  })
	;

	if ($('.datepicker').length > 0) {
		$('.datepicker').pickadate({
		    // Escape any “rule” characters with an exclamation mark (!).
		    format: 'Hai selezionato: dddd, dd mmm, yyyy',
		    formatSubmit: 'yyyy/mm/dd',
		    hiddenSuffix: '_submit'
		});
	}
	
}) 
