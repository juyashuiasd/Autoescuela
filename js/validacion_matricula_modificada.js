
	function validateForm() {
		
		var error1 = bonoValidar();
        
		return (error1.length==0);
	}

	function bonoValidar(){
		var bono = document.getElementById("BONO");
		var bonos = bono.value;
		var valid = true;
		if(bonos < 0){
		valid = false;	
		}
		if(!valid){
			var error = "El bono debe ser mayor de 0";
		}else{
			var error = "";
		}
	        bono.setCustomValidity(error);
		return error;
	}
	
