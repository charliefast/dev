$(document).ready(function() {
	
	// $('.uploadForm').hide();

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
					showMessage('Your browser does not support HTML5 file uploads!');
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

});