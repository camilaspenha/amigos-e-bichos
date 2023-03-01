//Scroll suave para link interno
	$('a[href^="#"]:not(.carousel-control-prev):not(.carousel-control-next)').click(function(e){
		e.stopImmediatePropagation();
		var id = $(this).attr('href'),
			menuHeight = $('#barra_superior_contatos').innerHeight() + $('header').innerHeight();
			if (id == '') {
				var targetOffset = 0;
			} else{
				var targetOffset =$(id).offset().top - menuHeight;
				$('html, body').animate({
					scrollTop: targetOffset
				}, 500);
			}	
	})
//Menu
	$(document).scroll(function(){
		height = $('#home').innerHeight();
		var documentTop= $(window).scrollTop();
		var windowWidth= $(window).width();
			if ( documentTop > height * 50/100) {	
				let margin = $('#barra_superior_contatos').innerHeight();			
				$('header').addClass('fixed');	
				$('.site-content').css('margin-top',margin);		
				/*if (windowWidth > 991) {$('#logo').css('font-size', 32);} 
					else {$('#logo').css('font-size', 37);}		*/		 
			} else {
				$('header').removeClass('fixed');
				$('.site-content').css('margin-top','auto');	
				/*if (windowWidth > 991) {$('#logo').css('font-size', 40);} 
					else {$('#logo').css('font-size', 37);}	*/						 	
			}	
	});
