
	function validateForm() {
		
		var error1 = duracionValidar();
        
        
		return (error1.length==0);
	}

	function duracionValidar(){
		var duracion = document.getElementById("Duracion");
		var duraciones = duracion.value;
		var valid = true;
		if(duraciones < 1 || duraciones > 8){
		valid = false;	
		}
		if(!valid){
			var error = "La duración es entre 1 y 8";
		}else{
			var error = "";
		}
	        duracion.setCustomValidity(error);
		return error;
	}
	
	
