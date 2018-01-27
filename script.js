var epreuveTabA = []
var epreuveTabB = []
$("#epreuveSave").click(function(){
	var boucle = document.epreuveFormulaire.choixBoucle.value
	var nomEpreuve = document.epreuveFormulaire.nomEpreuve.value
	var epreuve = new Object()
	epreuve.nom = nomEpreuve
	epreuve.boucle = boucle
	
	if(boucle == "A"){	
	epreuveTabA.push(epreuve)
	}
	else{
	epreuveTabB.push(epreuve)
	}


	ecrireEpreuve()
})

function ecrireEpreuve(){
	var ecrire = ""
	for(i=0;i<epreuveTabA.length;i++){
		ecrire += '<div class="epreuveTab"><div>'+epreuveTabA[i].nom+'</div><button type="button" class="btn btn-secondary deleteEpreuve" onclick="deleteEpreuveA('+i+')">delete</button></div>'
	}
	ecrire = '<h3>boucle A</h3>' + ecrire
	$("#boucleA").html(ecrire)


	ecrire = ""
	for(i=0;i<epreuveTabB.length;i++){
		ecrire += '<div class="epreuveTab"><div>'+epreuveTabB[i].nom+'</div><button type="button" class="btn btn-secondary deleteEpreuve" onclick="deleteEpreuveB('+i+')">delete</button></div>'
	}
	ecrire = '<h3>boucle B</h3>' + ecrire
	$("#boucleB").html(ecrire)
}
function deleteEpreuveA(position){
	epreuveTabA.splice(position,1)
	ecrireEpreuve()
}
function deleteEpreuveB(position){
	epreuveTabB.splice(position,1)
	ecrireEpreuve()
}

