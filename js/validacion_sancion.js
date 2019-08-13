
	function validateForm() {
		
		var error1 = fechaDespuesValidar();
        
		return (error1.length==0);
	}

	
	function fechaDespuesValidar(){
		var fechaAnt = document.getElementById("FechaInicio");
		var fechaA = fechaAnt.value;
		var fechaFin = document.getElementById("FechaFinal");
		var fechaF = fechaFin.value;
		var valid = true;
		if(!(fechaA < fechaF)){
		valid = false;	
		}
		if(!valid){
			var error = "La fecha final debe ser posterior a la inicial";
		}else{
			var error = "";
		}
	        fechaFin.setCustomValidity(error);
		return error;
	}
	
