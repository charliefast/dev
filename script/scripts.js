$(document).ready(function () {

    Responsive.Init();
    Filedrop.Init();
    Validation.Init();
    Search.Init();
    ViewItem.Init();
    Messages.Init();
    Publish.Item();
    
    // iOS scale bug fix
   // MBP.scaleFix();
    
});


Responsive = {
	'Init': function() {
	
		var currentBreakpoint; // default's to blank so it's always analysed on first load
		var didResize  = true; // default's to true so it's always analysed on first load
		var raw_slider = $("#featured").html(); // grab the unaltered HTML and store it
		
		// on window resize, set the didResize to true
		$(window).resize(function() {
			didResize = true;
		});
		
		// every 1/4 second, check if the browser was resized
		// we throttled this because some browsers fire the resize even continuously during resize
		// that causes excessive processing, this helps limit that
		setInterval(function() {
			if(didResize) {
				didResize = false;
				
				// inspect the CSS to see what breakpoint the new window width has fallen into
				var newBreakpoint = window.getComputedStyle(document.body, ':after').getPropertyValue('content');
				
				/* tidy up after inconsistent browsers (some include quotation marks, they shouldn't) */
				newBreakpoint = newBreakpoint.replace(/"/g, "");
				newBreakpoint = newBreakpoint.replace(/'/g, "");
				
				// if the new breakpoint is different to the old one, do some stuff
				if (currentBreakpoint != newBreakpoint) {
			
					// remove the old flexslider (which has attached event handlers and adjusted DOM nodes)
					$("#featured").remove();
					
					// now re-insert clean mark-up so flexslider can run on it properly
					
			
					// execute JS specific to each breakpoint
					if (newBreakpoint === 'breakpoint_1') {
						// the narrowset breakpoint is now the current breakpoint
						currentBreakpoint = 'breakpoint_1';
						
						$("#articles").append("<div id='featured'></div>");
						$("#featured").html(raw_slider);

					}
					if (newBreakpoint === 'breakpoint_2') {
						// the second largest breakpoint is now the current one
						currentBreakpoint = 'breakpoint_2';
							
						$("#articles").prepend("<div id='featured'></div>");
						$("#featured").html(raw_slider);
					}
				}
			}
		}, 250);
	}
};

Filedrop = {
	'Init': function() {
		
		// $('.uploadForm').hide();
		var itemId = $('.uploadForm').find('[name="item_id"]').val();
		var url = '/bytarna/item/verify_upload/'+ itemId;
		if (itemId === 'user') {
			url = '/bytarna/user/verify_upload';
		}
		var dropbox = $('#dropbox'),
			message = $('.message', dropbox);
		var parts = {},
		
		bits = location.pathname.substr(1).split('/'); // get rid of first / and split on slashes
		for (var i = 0; i<bits.length; i++) {
			parts[i] = bits[i];
		}
		
		dropbox.filedrop({
			// The name of the $_FILES entry:
			paramname:'pic',
			maxfiles: 1,
			maxfilesize: 1,
			url: url,
			fallback_id: 'fallbackBtn',
			uploadFinished:function(i,file,response){
				$.data(file).addClass('done');

				Messages.Success('Din bild har laddats upp.', $('.container'));

				// response is the JSON object that post_file.php returns
			},
			dragOver: function() {
				// user dragging files over #dropzone
				dropbox.addClass('hover');
			},
			dragLeave: function() {
				// user dragging files out of #dropzone
				dropbox.removeClass('hover');
			},
			error: function(err, file) {
				switch(err) {
					case 'BrowserNotSupported':
						showMessage('Din webbläsare stödjer inte HTML5 filuppladdning!');
						dropbox.hide();
						$('.uploadForm').show();
						break;
					case 'TooManyFiles':
						alert('För många filer! Du kan bara lägga upp en bild åt gången! (configurable)');
						break;
					case 'FileTooLarge':
						alert(file.name+' är för stor! Filen får inte vara större än 1mb (configurable).');
						break;
					default:
						break;
				}
			},
			// Called before each upload is started
			beforeEach: function(file){
				if(!file.type.match(/^image\//)){
					alert('Endast bilder är tillåtna!');
					
					// Returning false will cause the
					// file to be rejected
					return false;
				}
			},
			
			uploadStarted:function(i, file, len){
				createImage(file);
			},
			
			progressUpdated: function(i, file, progress) {
				$.data(file).find('.progress').width(progress);
			}

		});
		
		var template = '<div class="preview">'+
							'<span class="imageHolder">'+
								'<img />'+
								'<span class="uploaded"></span>'+
							'</span>'+
							'<div class="progressHolder">'+
								'<div class="progress"></div>'+
							'</div>'+
						'</div>';
		
		
		function createImage(file){

			var preview = $(template),
				image = $('img', preview);
				
			var reader = new FileReader();
			
			image.width = 100;
			image.height = 100;
			
			reader.onload = function(e){
				
				// e.target.result holds the DataURL which
				// can be used as a source of the image:
				
				image.attr('src',e.target.result);
			};
			
			// Reading the file as a DataURL. When finished,
			// this will trigger the onload function above:
			reader.readAsDataURL(file);
			
			message.hide();
			preview.appendTo(dropbox);
			
			// Associating a preview container
			// with the file, using jQuery's $.data():
			
			$.data(file,preview);
		}

		function showMessage(msg){
			message.html(msg);
		}
	}
};

Validation = {
	'Init': function() {
		
		Validation.LoginForm();
		Validation.RegisterForm();
		Validation.EditForm();
		Validation.UploadItemForm();
		

	},
	'LoginForm': function() {
		$('.loginForm form').validate({
			rules: {
				username: {
					required:true,
					email: true
				},
				password: {
					required:true,
					minlength: 8
				}
			},
			messages: {
				username: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				password: {
					required: 'Du glömde fylla i det här fältet',
					minlength: "Lösenordet måste vara minst 8 tecken långt"
				}
			},
			// the errorPlacement has to take the table layout into account
			errorPlacement: function(error, element) {
				if ( element.is(":radio") ) {
					error.appendTo( element.parent().next().next() );
				} else if ( element.is(":checkbox") ) {
					error.appendTo ( element.next() );
				} else {
					error.appendTo( element.parent() );
					// element.css('borderColor', 'red');
					element.closest('.control-group').removeClass('success').addClass('error');
				}

			},
			// set this class to error-labels to indicate valid fields
			success: function(label) {
				// set &nbsp; as text for IE
				label.closest('.control-group').removeClass('error').addClass('success');
				label.html("&nbsp;").addClass("checked");
			},
			submitHandler: function(form) {
				$.ajax({
					url: 'verifylogin',
					data: $(form).serialize(),
					type: 'POST',
					dataType: 'json',
					success: function(data) {

						if(data === null) {
							document.location.href = '/bytarna';
						} else if ( data.state === false ) {

							var errorDiv = $('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button></div>');
							errorDiv.html(data.message);
							errorDiv.fadeIn().appendTo('#message');
						}
					}
				});
			}
		});
	},
	'RegisterForm': function() {
		$('.registerForm form').validate({
			rules: {
				firstname: {
					required:true
				},
				lastname: {
					required:true
				},
				email: {
					required:true,
					email: true
				},
				emailconf: {
					required:true,
					equalTo: "#email"
				},
				password: {
					required:true,
					minlength: 8
				},
				passconf: {
					required:true,
					equalTo: "#password"
				}
			},
			messages: {
				firstname: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				lastname: {
					required: 'Du glömde fylla i det här fältet',
					min: "Lösenordet måste vara minst 8 tecken långt"
				},
				email: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				emailconf: {
					required: 'Du glömde fylla i det här fältet',
					min: "Fyll i korrekt mailadress"
				},
				password: {
					required: 'Du glömde fylla i det här fältet',
					email: "Lösenordet måste vara minst 8 tecken långt"
				},
				passconf: {
					required: 'Du glömde fylla i det här fältet',
					min: "Fyll i rätt lösenord"
				}
			},
			errorPlacement: function(error, element) {
				if ( element.is(":radio") ) {
					error.appendTo( element.parent().next().next() );
				} else if ( element.is(":checkbox") ) {
					error.appendTo ( element.next() );
				} else {
					error.appendTo( element.parent() );
					// element.css('borderColor', 'red');
					element.closest('.control-group').addClass('error');
				}

			},
			// set this class to error-labels to indicate valid fields
			success: function(label) {
				// set &nbsp; as text for IE
				label.closest('.control-group').removeClass('error').addClass('success');
				label.html("&nbsp;").addClass("checked");
			},
			submitHandler: function(form) {

				$.ajax({
					url: 'verify',
					data: $(form).serialize(),
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						document.location.href = '/bytarna/';
					}
				});
			}



		});
	},
	'EditForm': function() {
		$('.editForm form').validate({
			rules: {
				firstname: {
					required:true
				},
				lastname: {
					required:true
				},
				email: {
					required:true,
					email: true
				},
				password: {
					required:true,
					minlength: 8
				}
			},
			messages: {
				firstname: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				lastname: {
					required: 'Du glömde fylla i det här fältet',
					min: "Lösenordet måste vara minst 8 tecken långt"
				},
				email: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				password: {
					required: 'Du måste fylla i lösenord för att kunna spara',
					min: "Fyll i rätt lösenord"
				}
			},
			errorPlacement: function(error, element) {
				if ( element.is(":radio") ) {
					error.appendTo( element.parent().next().next() );
				} else if ( element.is(":checkbox") ) {
					error.appendTo ( element.next() );
				} else {
					error.appendTo( element.parent() );
					element.closest('.control-group').removeClass('success').addClass('error');
				}
			},
			// set this class to error-labels to indicate valid fields
			success: function(label) {
				// set &nbsp; as text for IE
				label.closest('.control-group').removeClass('error').addClass('success');
				label.html("&nbsp;").addClass("checked");
			},
			submitHandler: function(form) {
				$.ajax({
					url: 'verify',
					data: $(form).serialize(),
					type: 'POST',
					dataType: 'json',
					success: function(data) {
						if (data.state === true) {
							$('.alert-error, .finishedSuccess').remove();

							Messages.Success(data.message, $('.container'));

						} else {
							$('.alert-error, .finishedSuccess').remove();
							var errorDiv = $('<div class="alert alert-error"></div>');
							errorDiv.html(data.message);
							errorDiv.prepend($('<button type="button" class="close" data-dismiss="alert">&times;</button>'));
							errorDiv.fadeIn().appendTo('#message');
						}
					}
				});
			}
		});
	},
	'UploadItemForm': function() {
		$('.uploadItemForm form').validate({
			rules: {
				selectCategory: {
					required:true
				},
				inputTitle: {
					required:true,
					maxlength: 50,
					minlength: 3
				},
				inputDescription: {
					required:true,
					minlength: 5
				}
			},
			messages: {
				selectCategory: {
					required: 'Du glömde välja något i det här fältet'
				},
				inputTitle: {
					required: 'Du glömde fylla i det här fältet',
					maxlength: "Titeln får inte vara mer än 50 tecken.",
					minlength: "Beskrivningen måste vara minst 3 tecken"
				},
				inputDescription: {
					required: 'Du glömde fylla i det här fältet',
					minlength: 'Beskrivningen måste vara minst 5 tecken'
				}
			},
			errorPlacement: function(error, element) {
				if ( element.is(":radio") ) {
					error.appendTo( element.parent().next().next() );
				} else if ( element.is(":checkbox") ) {
					error.appendTo ( element.next() );
				} else {
					error.appendTo( element.parent() );
					element.closest('.control-group').removeClass('success').addClass('error');
				}
			},
			// set this class to error-labels to indicate valid fields
			success: function(label) {
				// set &nbsp; as text for IE
				label.closest('.control-group').removeClass('error').addClass('success');
				label.html("&nbsp;").addClass("checked");
			}
			// submitHandler: function(form) {
			//		document.location.href = '/bytarna/item/verify_new';
			//	$.ajax({
			//		url: 'verify_new',
			//		data: $(form).serialize(),
			//		type: 'POST',
			//		dataType: 'json',
			//		success: function(data) {
			//			console.log("hjee")

			//			// if (data.state === false) {
			//			//	$('.alert-error').remove();
			//			//	var errorDiv = $('<div class="alert alert-error"></div>');
			//			//	errorDiv.html(data.message);
			//			//	errorDiv.prepend($('<button type="button" class="close" data-dismiss="alert">&times;</button>'));
			//			//	errorDiv.fadeIn().appendTo('#message');
			//			//} else {
			//			//	console.log("hej");
			//			//	document.location.href = '/bytarna/item/verify_new';
			//			// }
			//		}
			//	});
			// }
		});
	}
};

Search = {
	'Init': function() {

		var form = $("#searchForm"),
			submit = $("#submit"),
			resultList = $('#results'),
			query = '';

		submit.on('click', function(e) {
			e.preventDefault();
			resultList.empty();

			var selectValue = $("form select option:selected").val(),
				txtValue = $("#search").val();

			if (selectValue !== "0") {
				query = 'item/'+selectValue+'/search/?key='+txtValue+'&callback=json';
			} else {
				query = 'item/search/?key='+txtValue+'&callback=json';
			}

			resultList.addClass('loading');
			$.ajax({
				url: query,
				dataType: 'json',
				data: form.serialize(),
				type: 'POST',
				success: function(data) {
					resultList.removeClass('loading');

					var items = [];
					
					if(data.error) {
						resultList.append($('<div class="alert alert-error">'+data.error+'<div>'));
					} else {
						$.each(data, function(key, val) {
							items.push('<li class="span3 item">'+
										'<div class="thumbnail">'+
										'<a href="/item/'+val.id+'" class="img">'+
											'<img src="http://placehold.it/300x200">'+
										'</a>'+
										'<h4>'+
											'<a href="/item/'+val.id+'">'+val.headline+'</a>'+
										'</h4>'+
										'<span class="icons">'+
											'<a href="#">'+
												'<i class="icon-user"></i>'+
											'</a>'+
											'<a href="/item/send_message/'+val.id+'"><i class="icon-pencil"></i></a>'+
											'<a href="#"><i class="icon-star"></i></a>'+
										'</span>'+
										'<span class="date">Upplagd den '+val.date_added+'</span>'+
										'</div>'+
										'</li>');

						});

						resultList.html(items);

					}
					

				}
			});
		});
	}
};


ViewItem = {
	'Init': function() {
		var itemsLength = $('#results').find('.item').length,
			moreLink = $('#more'),
			totalItems = moreLink.data('items');


		if( itemsLength < totalItems ) {
			// ViewItem.AddItems();
		} else {
			moreLink.hide();
		}

		$('#more').on('click', function(e) {
			e.preventDefault();

			console.log();
			

			
		});
	},
	'AddItems': function() {
		$('#results').addClass('loading');
			$.ajax({
				url: '/bytarna/starred/'+itemsLength+'/'+(itemsLength+20)+'?callback=json',
				dataType: 'json',
				type: 'POST',
				success: function(data) {
					// Items.Append(data.starred, $('#results'));

					$('#results').removeClass('loading');
					var items = [];

					$.each(data.starred, function(key, val) {
						items.push('<li class="span3 item">'+
										'<div class="thumbnail">'+
											'<a href="/item/'+val.id+'" class="img">'+
												'<img src="http://placehold.it/300x200">'+
											'</a>'+
											'<h4>'+
												'<a href="/item/'+val.id+'">'+val.headline+'</a>'+
											'</h4>'+
											'<span class="icons">'+
												'<a href="#">'+
													'<i class="icon-user"></i>'+
												'</a>'+
												'<a href="/item/send_message/'+val.id+'"><i class="icon-pencil"></i></a>'+
												'<a href="#"><i class="icon-star"></i></a>'+
											'</span>'+
											'<span>Upplagd den '+val.date_added+'</span>'+
										'</div>'+
									'</li>');
					});

					$('#results').append(items);

				}
			});
	}
};

Publish = {
	'Item': function() {
		$('.itemPreview button').on('click', function(e) {

			
			$.ajax({
				url: '/bytarna/item/publish',
				dataType: 'json',
				type: 'POST',
				data: $('itemPreview form').serialize(),
				success: function(data) {
					console.log(data);
				}
			});
		});
	}
};


Messages = {
	'Init': function() {
		Messages.LikeMessage();
		Messages.TeaserMessage();
		Messages.Sent();
		Messages.SendMessageForm();
	},
	'LikeMessage': function() {
		$('.item .like').on('click', function(e) {
			e.preventDefault();

			var href = $(this).attr('href');
			$.getJSON(href, function(data) {
				if (data.state === true) {
					Messages.Success(data.message, $('.container'));
				}
			});
		});
	},
	'SendMessageForm': function() {
		$('#sendMessageForm input[type="submit"]').on('click', function(e) {
			
			e.preventDefault();
			var form = $(this).closest('form');
			var href = form.attr('action');

			$.ajax({
				url: href,
				data: form.serialize(),
				dataType: 'json',
				type: 'POST',
				success: function(data) {
					var lastComment = '';
					var liClass = 'comment-parent';

					if( data.comments['0'].children === false ) {
						lastComment = data.comments['0'].parent;
					} else {
						liClass = 'comment-child';
					}

					var li = $('<li class="'+liClass+' well"></li>'),
						link = $('<a></a>').attr('href','/bytarna/item/'+lastComment.item_id).html('Svar till annons'),
                        message = $('<p></p>').html(lastComment.message),
                        span = $('<span></span>'),
                        name = $('<p></p>').html(lastComment.firstname +' '+ lastComment.lastname),
                        date = $('<p></p>').html(lastComment.date_sent);


                        span.append(name, date);
						li.append(link, message, span);

						$('.guestbook').prepend(li);

					Messages.Success(data.message, $('.container'));
				}
			});
		});
	},
	'TeaserMessage': function() {
		$('#teaserMessageForm .close').on('click', function(e) {
			e.preventDefault();

			$('#teaserMessageForm').removeClass('visible');
		});


		$('.item .sendMessage').on('click', function(e) {
			e.preventDefault();

			var href = $(this).data('link'),
				itemId = href.match(/\d+/g).toString(),
				userId = $(this).siblings('.userLink').attr('href').match(/\d+/g).toString();

			$('#teaserMessageForm form').attr('action', href);
			var test = $('#teaserMessageForm form').find('input[name="to_id"]').val(userId);

			$('#teaserMessageForm').find('h3').html( $(this).closest('span').siblings('h4').find('a').html() );

			$('#teaserMessageForm').addClass('visible');


			Messages.Sent(itemId);
		});

	},
	'Sent': function(itemId) {
		$('#teaserMessageForm input[type="submit"]').on('click', function(e) {
			e.preventDefault();

			$.ajax({
				url: '/bytarna/item/send_message/'+itemId+'',
				type: 'POST',
				data: $('#teaserMessageForm form').serialize(),
				dataType: 'json',
				success: function(data) {
					console.log(data.state);
					if (data.state === true) {
						Messages.Success(data.message, $('#teaserMessageForm form'));
						
					} else {
						console.log("false");
					}
				}
			});
			
		});

	},
	'Success': function(message, parent) {
		var successDiv = $('<div></div>');

		successDiv
			.html($('<p><i class="icon-ok icon-white"></i>'+message+'</p>'))
			.addClass('finishedSuccess')
			.appendTo(parent)
			.fadeIn()
			.delay(3000)
			.fadeOut();
	},
	'Error': function(message, parent) {
		$('.alert-error, .finishedSuccess').remove();
			var errorDiv = $('<div class="alert alert-error"></div>');
			errorDiv.html(data.message);
			errorDiv.prepend($('<button type="button" class="close" data-dismiss="alert">&times;</button>'));
			errorDiv.fadeIn().appendTo('#message');
	}
};


// Items = {
//'Append': function(objects, parentElement) {
//	var items = [];

//	$.each(objects, function(key, val) {
//		// var liElement = $('<li/>').addClass('span3 item');
//		// var imgAnchor = $('<a href="/item/'+val.id+'" class="img"><img src="http://placehold.it/300x200"></a>');
//		// var headline = $('<h4><a href="/item/'+val.id+'">'+val.headline+'</a></h4>');
//		// var icons = $('<span class="icons"><a href="#"><i class="icon-user"></i></a><a href="/item/send_message/'+val.id+'"><i class="icon-pencil"></i></a>'+
//		// 				'<a href="#"><i class="icon-star"></i></a></span>');
//		// var date = $('<span>Upplagd den '+val.date_added+'</span>');


//		// imgAnchor.appendTo(liElement);
//		// headline.appendTo(liElement);
//		// icons.appendTo(liElement);
//		// date.appendTo(liElement);

//		// console.log(liElement);
//		// items.push(liElement);
			
//		items.push('<li class="span3 item">'+
//					'<a href="/item/'+val.id+'" class="img">'+
//						'<img src="http://placehold.it/300x200">'+
//					'</a>'+
//					'<h4>'+
//						'<a href="/item/'+val.id+'">'+val.headline+'</a>'+
//					'</h4>'+
//					'<span class="icons">'+
//						'<a href="#">'+
//							'<i class="icon-user"></i>'+
//						'</a>'+
//						'<a href="/item/send_message/'+val.id+'"><i class="icon-pencil"></i></a>'+
//						'<a href="#"><i class="icon-star"></i></a>'+
//					'</span>'+
//					'<span>Upplagd den '+val.date_added+'</span>'+
// 						'</li>');
// 		});

// console.log(items);

// 		parentElement.add(items);

// 	}
// };
