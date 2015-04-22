var xmlHttp;
var drinkTimes;
var start;
var end;
var times;

var thisForm = document.querySelector("#bacform");
//console.log(thisForm);

function showResults() { 
  xmlHttp=GetXmlHttpObject();
  if(xmlHttp==null) {
    alert ("Browser does not support HTTP Request");
    return;
  }
  //search string enetered
  var url="search/1";
  xmlHttp.onload=stateChanged;
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}

function stateChanged() {
  if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") {
    document.querySelector("#txtHint").innerHTML = "";
    drinkTimes = JSON.parse(xmlHttp.responseText);
    for(i=0; i<drinkTimes.length; i++) {
    	start = drinkTimes[0].time;
    	end = drinkTimes[drinkTimes.length - 1].time;
    	//document.querySelector("#txtHint").innerHTML += '<div class="searchResult"><ul><li><a href="#">'+drinkTimes[i].time+'</a></li></ul></div><br></br>';
    }
  }

  solveBAC(thisForm);

}

function GetXmlHttpObject() {
  xmlHttp=null;
  try {
   // Firefox, Opera 8.0+, Safari
   xmlHttp=new XMLHttpRequest();
  }
  catch(e) {
   //Internet Explorer
    try {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e) {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return xmlHttp;

}

window.addEventListener("load", showResults, false);

function solveBAC(form) {
	console.log(form);
	//TIME CONVERSIONS
	//============================

	//if no drinks give a fallback value to the start and end times
	if(start == undefined) {
		start = "12:00 pm";
	}
	if(end == undefined) {
		end = "01:00 pm";
	}

	//round start time to the lower time
	if(start.substring(3,5) >= 0 && start.substring(3,5) < 30) {
		start = start.substring(0, 2)+":00 "+start.substring(6, 8);
		//if start is 0, remove 0
		if(start.charAt(0) == 0) {
			start = start.substring(1, 2)+":00 "+start.substring(6, 8);
		}
	}

	//round start time to the higher time
	if(start.substring(3,5) >= 30 && start.substring(3,5) <= 59) {
		var round = start.substring(0, 2);
		var suffix = start.substring(6, 8); //get suffix value (pm/am)
		round++; //add 1 to current number

		//change suffix to pm if the original was am
		if(round == 12 && suffix == "am") {
			console.log("changing to pm");
			suffix = "pm";
		}

		//change round to 1 if the original time was 12
		if(round == 13) {
			round = 1;
		}

		start = round+":00 "+suffix;

		if(start.charAt(0) == 0) {
			start = start.substring(1, 2)+":00 "+suffix;
		}
	}

	//round end time to the lower time
	if(end.substring(3,5) >= 0 && end.substring(3,5) < 30) {
		var round = end.substring(0, 2);
		var suffix = end.substring(6, 8);

		end = end.substring(0, 2)+":00 "+suffix;
		//if start number is 0, remove 0
		if(end.charAt(0) == 0) {
			end = end.substring(1, 2)+":00 "+suffix;
		}
	}

	if(end.substring(3,5) >= 30 && end.substring(3,5) <= 59) {
		var round = end.substring(0, 2);
		var suffix = end.substring(6, 8);//get suffix value (pm/am)
		round++; //add 1 to current number

		//change round to 1 if the original time was 12
		if(round == 13) {
			round = 1;
		}
		end = round+":00 "+suffix;

		if(start.charAt(0) == 0) {
			end = end.substring(1, 2)+":00 "+suffix;
		}
	}

	//============================

	var message;
	var gender = eval(form.gender.value);
	var genderConstant;
	if(gender == 'female') {
		genderConstant = 0.66;
	}
	if(gender == 'male') {
		genderConstant = 0.73;
	} else {
		genderConstant = 0.66;
	}


	var percent = eval(form.percent.value);
	var weight = eval(form.weight.value);
	var hours = eval(form.hours.value);

	//var result = (ounces * percent * 0.075 / weight) - (hours * 0.015);
	var result = (((percent * 5.14) / (weight * genderConstant)) - (hours * 0.015));
	result = Math.round(result * 100) / 100;

	if(result <= 0) {
		message = "You are not legally intoxicated.";
		result = 0;
	}
	else {
		if (result > 0.08) {
			message = "Legally Intoxicated";
		} if (result < 0.08) {
			message = "You may not be legally intoxicated, but it still may be possible to be arrested for DUI.";
		} else {
			message = "Enter all information above before calculating.";
		}
		form.message.value = message;
		form.bacamount.value = result + " %";
	}

	var randomScalingFactor = function(){
		return Math.round(Math.random()*100)
	};

	var timeArray = [];
	var bacArray = [];
	
	//for each loop into data chart?
	for(i=0; i<drinkTimes.length; i++) {
    	timeArray.push(drinkTimes[i].time);
    	bacArray.push(drinkTimes[i].CurrentBAC);
    }

    console.log(bacArray);

	var lineChartData = {
		labels : timeArray,//[start,times,end],
		datasets : [
			{
				label: "My First dataset",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				//0, 0.04, 0.08, 0.12, 0.16, 0.20, 0.24, 0.28, 0.32, 0.36, 0.40
				data : bacArray
			},
		]
	}
	var ctx = document.getElementById("canvas").getContext("2d");
	myLine = new Chart(ctx).Line(lineChartData, {
		responsive: true
	})

}







