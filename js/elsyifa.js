(function($) {

$.elsyifaJS = {

	getData : function (div, pageURL) {
		loader = "<div class='center'><img src='images/loader.gif' alt='Loading..' /></div>";
		
		$.ajax({
			type: "GET",
			url: pageURL,
			beforeSend: function() {
				/* $("#loading").show(); */
				$(div).html(loader);
			},
			complete: function() {
				/* $("#loading").hide(); */
			},
			success: function(html) {
				$(div).html(html);
			}
		});
	},
	
	postData : function (target, pageURL, params) {
		loader = "<div class='center'><img src='images/loader.gif' alt='Loading..' /></div>";
		
		$.ajax({
			type: "POST",
			url: pageURL,
			data: params,
			beforeSend: function() {
				/* $("#loading").show(); */
				$(target).html(loader);
			},
			complete: function() {
				/* $("#loading").hide(); */
			},
			success: function(html) {
				$(target).html(html);
			}
		});
	},
	
	postFormData : function (target, pageURL, theForm) {
		params = $(theForm).serialize();
		loader = "<div class='center'><img src='images/loader.gif' alt='Loading..' /></div>";
		
		$.ajax({
			type: "POST",
			url: pageURL,
			data: params,
			beforeSend: function() {
				/* $("#loading").show(); */
				$(target).html(loader);
			},
			complete: function() {
				/* $("#loading").hide(); */
			},
			success: function(html) {
				$(target).html(html);
			}
		});
	},
	
	numAsString : function (num) {
		numstring = '' + num;
		return numstring;
	}
	
}

})(jQuery);