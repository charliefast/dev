$(document).ready(function () {

    Responsive.Init();
    Filedrop.Init();
    Validation.Init();
    Search.Init();
    
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
		
		$('.uploadForm').hide();

		var dropbox = $('#dropbox'),
			message = $('.message', dropbox);
		
		dropbox.filedrop({
			// The name of the $_FILES entry:
			paramname:'pic',
			
			maxfiles: 1,
			maxfilesize: 1,
			url: 'post_file.php',
			fallback_id: 'fallbackBtn',

			uploadFinished:function(i,file,response){
				$.data(file).addClass('done');
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

		$('.loginForm form').validate({
			//debug: true,
			// errorElement: "em",
			// errorPlacement: function(error, element) {
			// error.appendTo( element.parent("td").next("td") );
			// },
			errorContainer: $("#message"),
			rules: {
				username: {
					required:true,
					email: true
				},
				password: {
					required:true,
					min: 8
				}
			},
			messages: {
				username: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				password: {
					required: 'Du glömde fylla i det här fältet',
					min: "Lösenordet måste vara minst 8 tecken långt"
				}
			}
		});


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
					min: 8
				},
				passconf: {
					required:true,
					equalTo: "#password"
				}
			},
			messages: {
				email: {
					required: 'Du glömde fylla i det här fältet',
					email: "Fyll i en korrekt mailadress"
				},
				password: {
					required: 'Du glömde fylla i det här fältet',
					min: "Lösenordet måste vara minst 8 tecken långt"
				}
			}
		});

	}
};

Search = {
	'Init': function() {

		var form = $("#searchForm"),
			submit = $("#submit"),
			query = $("#search"),
			resultList = $('#results');


		submit.on('click', function(e) {
			e.preventDefault();
			resultList.empty();

			$.getJSON("/index.php/item/search/?key="+query.val()+"&callback=json", function(data) {
				var items = [];

				$.each(data, function(key, val) {
					items.push('<li>'+
								'<h3><a href="#">'+val["headline"]+'</a></h3>'+
								'<p>'+val["description"]+'</p>'+
								'<span>'+val["id"]+'</span>'+
								'</li>');
				});

				resultList.html(items);
			});
		});

		// var items = [];
		// $.get("data.json", function(data){
		//	notes = data.notes;
		//		showList("");

		// }, "json");

		// var qEl = $("#q");

		// qEl.keyup(function(event){
		//  console.log( qEl.val() );
		//  showList( qEl.val() );
		// });

		
		// function showList( q ){
		//	$("#list").empty();

		// 	for (var i = 0; i < notes.length; i++){
		// 		var note = notes[i];
		// 		var title = note.title;
		// 		var date = note.date;
		// 		console.log("h");

		// 		if(title.toLowerCase().indexOf(q) != -1){

		// 			var liEl = $("<li />");
		// 			liEl.text(title + "(" + date + ")");

		// 			$("#lista").append(liEl);
		// 		}
		// 	}
		// }
	}
}

