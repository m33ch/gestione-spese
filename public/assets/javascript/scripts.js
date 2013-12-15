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
    $('.ui.accordion')
  		.accordion()
	;
    $('.ui.button.delete').on('click', function(event) {
    	
    	event.preventDefault();

    	var action = $(this).parent('form').attr('action'),
    		tr 	   = $(this).parents('tr'),
    		data   = {_method: 'delete' };

    	$.ajax({
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

	
	if ($('.datepicker').length > 0) {
		$('.datepicker').pickadate({
		    // Escape any “rule” characters with an exclamation mark (!).
		    format: 'Hai selezionato: dddd, dd mmm, yyyy',
		    formatSubmit: 'yyyy/mm/dd',
		    hiddenSuffix: '_submit'
		});
	}
	$('.button.add').on('click', function(event) {
		event.preventDefault();
		$('#add_payer')
			.transition('fade up')
		;
	});
	
	$('#add_payer').on('click','.ui.button.save', function(event) {
		event.preventDefault();
		var action = 'add_payer',
    		data   = $('#contributions input[name^="contributions"]').serializeArray();

			$.ajax({
				url:  action,
			    type: 'POST',
			    data: data,
			    dataType : 'json',
			    success	: function(result) {
			    	console.log(result);
			    }
			})
	});
	
	$('#add_payer .ui.checkbox')
	  .checkbox('setting', {
	  		onEnable : function() {
	  			var	id 	 = $(this).val(),
	  				name = $(this).next().text();
	  				container = $('#add_payer #contributions'),
	  				field = $('<div id="'+name+'" class="ui field transition hidden"></div>'),
	  				save = $('<div class="ui button green save transition hidden">Salva</div>');
	  			
	  			field.html(
	  						'<label>Contributo per '+name+'</label>'+
	  					    '<input placeholder="0,00" type="text" name="contributions['+id+']">'
	  					  );
	  			
	  			container.prepend(field);

	  			field.transition('fade up');

	  			if (container.children('.save').length == 0) {
	  				container.append(save);
	  			}
	  			save.transition('fade up');
	  		},
	  		onDisable : function() {
	  			var	name = $(this).next().text(),
	  				save = $('#add_payer #contributions .save');

	  			$('#'+name)
	  				.transition({
	  					animation : 'fade down', 
	  					complete : function() {
	  						$(this).remove();
				  			if ($('#add_payer #contributions .ui.field').length == 0) {
							  	save.transition({
				  					animation : 'fade down', 
				  					complete : function() {
				  						$(this).remove();
				  					}
				  				})
							}	
	  					}
	  				})
	  			
	  		}
	  })
	;
}) 
