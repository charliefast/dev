$(document).ready(function () {

    Responsive.Init();
    Validation.Init();
    //Search.Init();
    
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

Validation = {
	'Init': function() {

		$('.loginForm form').validate({
			//debug: true,
			// errorElement: "em",
			// errorPlacement: function(error, element) {
			// 	error.appendTo( element.parent("td").next("td") );
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
		// var items = [];

		$.get("data.json", function(data){
				notes = data.notes;
				showList("");

		}, "json");

		var qEl = $("#q");

		qEl.keyup(function(event){
			console.log( qEl.val() );
			showList( qEl.val() );
		});

		
		function showList( q ){
			$("#list").empty();

			for (var i = 0; i < notes.length; i++){
				var note = notes[i];
				var title = note.title;
				var date = note.date;
				console.log("h");

				if(title.toLowerCase().indexOf(q) != -1){

					var liEl = $("<li />");
					liEl.text(title + "(" + date + ")");

					$("#lista").append(liEl);
				}
			}
		}
	}
}








// // AJAX + XML
		//   $.get("data.xml", function(data){
		//     var notes = $(data).find("note");
		// //    var notes = $("note", data);
		//     for( var i = 0; i < notes.length; i++){
		//       var note = $(notes[i]);
		//       var title = $("title", note).text();
		//       var date = $("date", note).attr("value");
		 
		//       var liEl = $("<li />");
		 
		//       liEl.text(title + " (" + date + ")");
		 
		//       $("#lista").append(liEl);
		//     }
		//   }, "xml");
		/*


		// XML version
		$.get("data.xml", function(data){
			var notes = $(data).find("note");

			for (var i = 0 ; i < notes.length; i++){
				var note = $(notes[i]);
				//Måste .find var title finns! Skrivs likadant som .find("note"). eller som detta exempel, fungerar likadant.	
				var title = $("title", note).text();
				var date = $("date", note).attr("value");

				var liEl = $("<li />");

				liEl.text(title + "(" + date + ")");

				$("#lista").append(liEl);

			}
		}, "xml");


		*/
