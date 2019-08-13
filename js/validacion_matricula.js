
	function validateForm() {
		
		var error1 = bonoValidar();
        
		var error2 = fechaDespuesValidar();
        
		return (error1.length==0) && (error2.length==0);
	}

	function bonoValidar(){
		var bono = document.getElementById("Bono");
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
	
	function fechaDespuesValidar(){
		var fechaAnt = document.getElementById("FechaInicial");
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
	
