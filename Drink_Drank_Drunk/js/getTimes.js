var xmlHttp;

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
    var result = JSON.parse(xmlHttp.responseText);
    for(i=0; i<result.length; i++) {
      document.querySelector("#txtHint").innerHTML += '<div class="searchResult"><ul><li><a href="#">'+result[i].time+'</a></li></ul></div><br></br>';
    }
  }
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





