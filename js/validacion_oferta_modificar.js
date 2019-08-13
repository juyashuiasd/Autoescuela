
	function validateForm() {
		
		var error1 = regaloValidar();
        
		var error2 = descuentoValidar();
        
		return (error1.length==0) && (error2.length==0);
	}

	function regaloValidar(){
		var regalo = document.getElementById("REGALO");
		var regalos = regalo.value;
		var valid = true;
		if(regalos < 0){
		valid = false;	
		}
		if(!valid){
			var error = "El regalo debe ser mayor de 0";
		}else{
			var error = "";
		}
	        regalo.setCustomValidity(error);
		return error;
	}
	
	
	function descuentoValidar(){
        var descuento = document.getElementById("DESCUENTO");
		var descuentos = descuento.value;
		var valid = true;
		if(descuentos < 0 || descuentos > 100){
		valid = false;	
		}
		if (!valid) {
			var error = "El descuento debe ser mayor de 0 y menor que 100";
		}else{
			var error = "";
		}

		descuento.setCustomValidity(error);

		return error;
	}
	
