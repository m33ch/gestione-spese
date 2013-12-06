$(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
		}
	});
	
	var $messages = {
	  success 	: $('.ui.message.success'),
	  warning 	: $('.ui.message.warning'),
	  error 	: $('.ui.message.error'),
	  info 		: $('.ui.message.info')
	};

	$('.ui.dropdown')
      .dropdown()
    ;

    $('.ui.button.delete').on('click', function(event) {
    	
    	event.preventDefault();

    	var action = $(this).parent('form').attr('action'),
    		tr 	   = $(this).parents('tr'),
    		data   = {_method: 'delete' };

    	var result =  $.ajax({
		    url:  action,
		    type: 'POST',
		    data: data,
		    dataType : 'json'
		})
		.done(function(data) {
			$messages.success.find('.content').text(data.message);
			$messages.success.transition('fade up');
			tr.fadeOut('slow');
		})
		.fail(function(data){
			$messages.error.find('.content').text(data.message);
			$messages.error.transition('fade up');
		});
    });	

    $('.ui.button.delete').popup();

   	$('.close').click(function(){
  		$(this).parent().transition('scale');
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
