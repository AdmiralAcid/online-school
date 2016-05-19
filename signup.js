//window.onload = init;
addListener(window, 'load', initSignUp);

function initSignUp(){
	var citySelect = document.getElementById("location");
	citySelect.onchange = handleSelectChange;
}

function handleSelectChange(){
	var selectedCity = this.value;
	var schoolSelect = document.getElementById("school");

	//remove old elements
	while (schoolSelect.length > 0) {
			schoolSelect.remove(schoolSelect.length-1);
	}

	if (selectedCity == "Moscow"){
		//add new elements
		var option_gymnasium = document.createElement("option");
		option_gymnasium.value = "znayka";
		option_gymnasium.text = "Гимназия \"Знайка\"";
		var option_lyceum = document.createElement("option");
		option_lyceum.value = "morozko";
		option_lyceum.text = "Лицей \"Морозко\"";
		var option_school = document.createElement("option");
		option_school.value = "school_11";
		option_school.text = "Школа №11";
		schoolSelect.add(option_gymnasium);
		schoolSelect.add(option_lyceum);
		schoolSelect.add(option_school);

	} else if (selectedCity == "Petersburg"){
		//add new elements
		var option_gymnasium = document.createElement("option");
		option_gymnasium.value = "raduga";
		option_gymnasium.text = "Гимназия \"Радуга\"";
		var option_lyceum = document.createElement("option");
		option_lyceum.value = "perspektiva";
		option_lyceum.text = "Лицей \"Перспектива\"";
		var option_school = document.createElement("option");
		option_school.value = "school_23";
		option_school.text = "Школа №23";
		schoolSelect.add(option_gymnasium);
		schoolSelect.add(option_lyceum);
		schoolSelect.add(option_school);
	}
}