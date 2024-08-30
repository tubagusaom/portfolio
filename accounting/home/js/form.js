
function navi(name_baner,loc,form,get) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(loc).innerHTML = xmlhttp.responseText;
		}
	}

	xmlhttp.open("GET",form+".php?"+get,true);
	xmlhttp.send();
// =================================================================
	document.getElementById('idbaner').innerHTML = name_baner;

}

// function cetak(){
// 	alert('CETAK');
// }
