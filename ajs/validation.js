function indexValidation(str, evt) {
	var bool = false;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if(str.length<8 && str.length==0 && (charCode == 67 || charCode == 99)){
			bool = true;
	}else if(str.length<8 && str.length==1 && charCode == 45){
			bool = true;
	}else if(str.length<8 && str.length>1){
		bool=isNumberKey(evt);
	}
	return bool; 
}
function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode < 48 || charCode > 57)//only number , decimal
		return false;
	return true;
}