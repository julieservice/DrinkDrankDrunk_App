var showDetails;

function init(){
	showDetails = document.querySelectorAll(".services");
	/*for(i = 0; i<showDetails.length; i++){
	showDetails[i].addEventListener("click", showAll, false);
	}*/
}

function showAll(){
	var details = document.querySelectorAll(".servicedetails");
	for(i = 0; i<details.length; i++){
		details[i].style.display = "block";
	}
	for(i = 0; i<showDetails.length; i++){
		showDetails[i].removeEventListener("click", showAll);
		showDetails[i].addEventListener("click", hideAll, false);
	}
}

function hideAll(){
	var details = document.querySelectorAll(".servicedetails");
	for(i = 0; i<details.length; i++){
		details[i].style.display = "none";
	}
	for(i = 0; i<showDetails.length; i++){
		showDetails[i].removeEventListener("click", hideAll);
	}
}

function showByID(id){
	console.log("running");
	console.log(id);
	var detail = document.querySelector(".detail"+id);
	var holder = document.querySelector(".service"+id);
	detail.style.display = "block";

	for(i = 0; i<showDetails.length; i++){
		showDetails[i].addEventListener("click", hideAll, false);
	}

}

window.addEventListener("load", init, false);