function creationXhr(){
	let xhr ;
	try {
		xhr = new ActiveXObject('Msxml2.XMLHTTP');
	} catch(e) {
		try {
			xhr = new ActiveXObject('Microsoft.XMLHTTP');
		} catch(e) {
			try{
				xhr = new XMLHttpRequest();
			}catch(e){
				console.log("Failed to create xhr" + e);
			}
		}
	}
	return xhr;
}


function supprimer_tous_details(){
	let documents = document.getElementById("details-container");
	while( documents.firstChild ){
		documents.removeChild(documents.firstChild);
	}
}

function ajout_details_aliment(){
	let details = document.getElementById("details-container");

	// Azo ny details rehetra
	// Ampidirina anaty tbody

	let formModal = document.getElementById("form-modal");
	let aliment = formModal.querySelector('#aliment');
	let pourcentage = formModal.querySelector('#pourcentage');
	let id = aliment.value.split(',')[0];
	let designation = aliment.value.split(',')[1];
	let categorie = aliment.value.split(',')[2];
	let id_input = creationInput( id, 'id_aliment' );
	id_input.setAttribute('type', 'hidden');
	let designation_input = creationInput( designation, 'designation' );
	let categorie_input = creationInput( categorie, 'categorie' );
	let pourcentage_input = creationInput( pourcentage.value, 'pourcentage' );

	let row = createRowPlatAliment( id_input,designation_input, categorie_input, pourcentage_input );
	details.appendChild( row );
	resetModalFormAliment();
}

function ajout_details(){
	let details = document.getElementById("details-container");
	
	// Azo ny details rehetra
	// Ampidirina anaty tbody
	
	let formModal = document.getElementById("form-modal");
	let plat = formModal.querySelector('#plat');
	let id = plat.value.split(',')[0];
	let designation = plat.value.split(',')[1];
	let id_input = creationInput( id, 'id_plat' );
	id_input.setAttribute('type', 'hidden');
	let designation_input = creationInput( designation, 'designation' );

	let row = createRowPlatRegime( id_input,designation_input  );
	details.appendChild( row );
	resetModalForm();
}

function creationInput( text, identification ){
	let element = document.createElement("input");
	element.setAttribute('type', 'text');
	element.classList.add('form-control');
	element.classList.add('border-0');
	element.value = text;
	element.setAttribute('name' , identification + '[]');
	return element;
}

function resetModalForm(){
	let formModal = document.getElementById("form-modal");
	let plat = formModal.querySelector('#plat');
	plat.selectedIndex = 0;
}
function resetModalFormAliment(){
	let formModal = document.getElementById("form-modal");
	let plat = formModal.querySelector('#aliment');
	plat.selectedIndex = 0;
	let pourcentage = formModal.querySelector('#pourcentage');
	pourcentage.value = 0;
}

function createRowPlatRegime( id, designation ){
	let tr = document.createElement("tr");
	let td1 = document.createElement("td");
	td1.appendChild(id);
	td1.appendChild(designation)
	tr.appendChild(td1);
	return tr;
}

function createRowPlatAliment( id, designation, categorie, pourcentage ){
	let tr = document.createElement("tr");
	let td1 = document.createElement("td");
	let td2 = document.createElement("td");
	let td3 = document.createElement("td");
	td1.appendChild(id);
	td1.appendChild(designation);
	td2.appendChild(categorie);
	td3.appendChild(pourcentage);
	tr.appendChild(td1);
	tr.appendChild(td2);
	tr.appendChild(td3);
	return tr;
}

function validate_regime( url, redirection ){
	let xhr = creationXhr();
	let form = document.querySelector('#general-form');
	let datas = new FormData(form);
	xhr.onreadystatechange = function(){
		if( xhr.readyState === 4 ){
			if( xhr.status === 200 ){
				let response = JSON.parse(xhr.responseText);
				let success = response['success'];
				window.location.href = redirection;
			}else if( xhr.status === 400 ){
				let response = JSON.parse(xhr.responseText);
				let error = response['error'];
				alert(error);
			}
		}
	};

	xhr.open('POST' , url , true);
	xhr.send(datas);
}