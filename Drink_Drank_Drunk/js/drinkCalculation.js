//Javascript

function solveBAC(form) {
var message;
var ounces = eval(form.ounces.value);
var percent = eval(form.percent.value);
var weight = eval(form.weight.value);
var hours = eval(form.hours.value);

var result = (ounces * percent * 0.075 / weight) - (hours * 0.015);
result = Math.round(result * 1000) / 1000;


if (result <= 0) {
message = "There is a negligible amount of alcohol in your system. You are not legally intoxicated.";
result = 0;
}
else {
if (result > 0.08)
  message = "You would be considered intoxicated and arrested for DUI if driving.";
else if (result < 0.08)
message = "You may not be legally intoxicated, but it still may be possible to be arrested for DUI.";
else message = "Enter all information above before calculating.";
}
form.message.value = message;
form.bacamount.value = result + " %";
}








var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		var lineChartData = {
			labels : ["9:00","10:00","11:00","12:00","1:00","2:00","3:00"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [0,randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
				},
			
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}