/* fonctions jquery pour DigitArt */
	
	$(document).ready(function(){
		$('#submit_choix_type').remove();
		$('#choix_type').change(function(){
			var param = $(this).attr('name');
			var val = $(this).val();
			var refresh = 'index.php?'+param+'='+val+'&submit_choix_type=1';
			location.href = refresh;
			
		});
		
		
		//les tests
		$('#parag1').css('color','#FF0000');
		
		$('#parag2').css({
			"background-color" : "lightcyan",
			"font-size" : "120%"
		});
		
		/* deux actions sur la fonction click qui change la couleur du paragraphe 1 puis la taille de la police du paragraphe 2*/
		$("#parag1").click(function(){
			$(this).css('color','#0000FF');
			$("#parag2").css('font-size','80%');
		});
		
		
	});