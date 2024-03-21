$(document).ready(function() {

	   $("#accordeon").before('<p class="aligncenter"><a id="ouvrir" class="btn large primary" href="#">Ouvrir tout</a> <a id="fermer" class="btn large" href="#">Fermer tout</a></p>');
	
	   $('#accordeon dd').hide();
	   
	   $("#accordeon dt").first().addClass("current")
	   $("#accordeon dd").first().slideUp();
	
       $('#accordeon dt').click(function(){
			   $("#accordeon dd").slideUp();
			   
			   if($(this).next("dd").is(":hidden")) {
					$(this).next("dd").slideDown();
					$('#accordeon dt').removeClass("current");
					$(this).addClass("current");
			   } else {
					$(this).next("dd").slideUp();
					$('#accordeon dt').removeClass("current");
			   }
       });
	   
	    $('#ouvrir').click(function(){
			$("#accordeon dd").slideDown();
			$('#accordeon dt').addClass("current");
			return false;
		});
		
		$('#fermer').click(function(){
			$("#accordeon dd").slideUp();
			$('#accordeon dt').removeClass("current");
			return false;
		});

});