jQuery(function($){
	$('.month').hide();
	$('.month:first').show();
	$('.months a:first').addClass('active');
	var current = 1;
	$('.months a').click(function(){
		var month = $(this).attr('id').replace('linkmonth','');
		if(month != current)
		{
			$('#month'+current).slideUp();
			$('#month'+month).slideDown();
			$('.months a').removeClass('active');
			$('.months a#linkmonth'+month).addClass('active');
			current = month;
		}
		return false;
	});
});

// var formcompteur = document.querySelector('#ajouter');
// formcompteur.style.display = 'none';

var day = document.getElementsByClassName('weekdays'); 
for (i in day) {
	day[i].onclick = function(){
		var formulaire = this.children[2];
		if(formulaire.style.display == "")
		{
			formulaire.style.display = 'block';
			this.style.background = "#D9D9D9";
		}
		else
		{
			// formulaire.style.display = 'none';
		}
	} 
};

var valider = document.getElementsByClassName('envoiValeur'); 
for (i in valider) {
	valider[i].onclick = function(){
		var nbpas = document.querySelector('.nbpas').value;
		var date = this.parentNode.children[2].id;
		var res = {"tabpas" : [{
									'nbpas' : nbpas, 
									'date':date
								}]
				  };
		alert(date);
		jQuery(function($){
		$.ajax({
	        type: 'POST',
	        url:  "fondation-manpower/index.php/ajax",
	        data: 
	        {
	        	'tab': res
	        }, 
	        success : function(data){
	        	console.log("success :",data);
	        },
	        error : function(resultat, statut, erreur){
	        	console.log(erreur);
       }
	});
});		
};
}