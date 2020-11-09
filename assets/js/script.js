function validateform() {
		var mail = $('#mail').val();
		var testat = mail.indexOf("@");
		var testdot = mail.lastIndexOf(".");
		mail = mail.trim();
		if (mail == "") {
		alert("Glöm inte att skriva in text under e-post!");
		}
		else if (testat == -1||testdot<testat) {
		alert("Inte en korrekt e-postadress!");
	}
		var namn = $('#namn').val();
		namn = namn.trim();
		if (namn == "") {
		alert("Glöm inte att skriva in text under namn!");
		}
		var textbox = $('#textbox').val();
		textbox = textbox.trim();
		if (textbox == "") {
		alert("Glöm inte att skriva in text under ärende!");
		}
}
