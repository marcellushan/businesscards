
function prepareEventHandlers() {
	document.getElementById("frmRecd").onsubmit = function () {
			if(document.getElementById("recdDate").value=="") {
				document.getElementById("errorMsg").innerHTML = "Please enter a Date in the following format:  YYYY-MM-DD";	
				return false;		
				}
	};		
}

window.onload = function () {
	prepareEventHandlers();
}
