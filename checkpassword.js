'use strict'

function checkPass(beforepass){
	var pw=document.frm1.pass.value;
	if(!(pw==beforepass)){
		alert("パスワードが違います。");
		document.frm1.pass.focus();
		return false;
	}
}