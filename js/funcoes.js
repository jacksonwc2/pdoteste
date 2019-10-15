/**
 * Funções JavaScript gerais
 */

function confirmacao(msg) {
	return confirm(msg);
}

function request(method, url) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
		}
	};
	xhttp.open(method, url, true);
	xhttp.send();
}