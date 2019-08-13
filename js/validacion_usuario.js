
	function validateForm() {
		
		var error1 = passwordValidation();
        
		var error2 = passwordConfirmation();
        
		return (error1.length==0) && (error2.length==0);
	}

	function passwordValidation(){
		var password = document.getElementById("Contrasena");
		var pwd = password.value;
		var valid = true;
		valid = valid && (pwd.length>=6);
		var hasUpperCases = /[A-Z]/;
		var hasLowerCases = /[a-z]/;
		var tieneSuper = /(SUPER.+)?/;
		valid = valid && (hasUpperCases.test(pwd)) && (hasLowerCases.test(pwd) && (tieneSuper.test(pwd)));
		
		if(!valid){
			var error = "La contraseña no cumple el formato correcto";
		}else{
			var error = "";
		}
	        password.setCustomValidity(error);
		return error;
	}
	
	
	function passwordConfirmation(){
        var password = document.getElementById("Contrasena");
		var pwd = password.value;
		var passconfirm = document.getElementById("ContrasenaConfirmar");
		var confirmation = passconfirm.value;

		// Los comparamos
		if (pwd != confirmation) {
			var error = "¡Las contraseñas deben coincidir!";
		}else{
			var error = "";
		}

		passconfirm.setCustomValidity(error);

		return error;
	}
	
