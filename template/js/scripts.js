window.addEventListener('load', function(event) {

	let allRegisterInputs = document.querySelectorAll('.register_input');
	let allLoginInputs = document.querySelectorAll('.login_input');
	let register_form = document.querySelector('.register_form');
	let login_form = document.querySelector('.login_form');

	let patterns = {
		'first_name': /^[A-Za-z]{3,16}$/,
		'last_name': /^[A-Za-z]{5,16}$/,
		'email': /^.+@.+\..+/,
		'password': /^[a-zA-Z0-9!@#$%^&*]{6,16}$/
	}


	//................Image Uploading .................
	let uploaded_pic = document.querySelector('.uploaded_pic')
	let img_message = document.querySelector('.img_message');
	let img_button = document.querySelector('#img_button');

	if(typeof(img_message) != 'undefined' && img_message != null){
		uploaded_pic.style.opacity = "0.7";

		img_button.addEventListener("click", function (){
			img_message.style.display = "none";
			uploaded_pic.style.opacity = "1";
		});
	}

	//............................Register Form Validation.............................

	if(typeof(register_form) != 'undefined' && register_form != null){

		register_form.addEventListener('submit', function (event) {


			let regErrorBlock = document.querySelector("body .reg_error_style");
			if(typeof(regErrorBlock) != "undefined" && regErrorBlock != null){
				regErrorBlock.style.display = "none";
			}

			let isError = false;
			allRegisterInputs.forEach(inputsValidation);

			function inputsValidation(item, index) {
				//console.log(item, index);
				let value = item.value.trim();
				let validation = item.getAttribute("data-validation");
				let pattern = patterns[validation];
				if(validation != null ){
					if (pattern.test(value)) {
						item.classList.remove('err');
						if (index == 0) {
							document.querySelector('.error_1').innerHTML = "";
						} else if (index == 1) {
							document.querySelector('.error_2').innerHTML = "";
						} else if (index == 2) {
							document.querySelector('.error_3').innerHTML = "";
						} else if (index == 3) {
							document.querySelector('.error_4').innerHTML = "";
						}
					} else {
						item.classList.add('err');
						if (index == 0) {
							document.querySelector('.error_1').innerHTML = "* The length of first " +
								"name must be more than 2 symbols";
						} else if (index == 1) {
							document.querySelector('.error_2').innerHTML = "* The length of last name " +
								"must be more than 4 symbols";

						} else if (index == 2) {
							document.querySelector('.error_3').innerHTML = "* Incorrect email";

						} else if (index == 3) {
							document.querySelector('.error_4').innerHTML = "* The length of password " +
								"must be more than 5 symbols";
						}
						isError = true;
						event.preventDefault();

					}
				}

			}
		});
	}

	//............................Login Form Validation.............................

	if(typeof(login_form) != 'undefined' && login_form != null){

		login_form.addEventListener('submit', function (event) {

			let loginError = document.querySelector("body .login_error");
			if(typeof(loginError)!= "undefined" && loginError != null){
				loginError.style.display = "none";
			}

			let isError = false;
			let login_patterns = {
				'email': /^.+@.+\..+/,
				'password': /^[a-zA-Z0-9!@#$%^&*]{6,16}$/
			}
			allLoginInputs.forEach(loginInputsValidation);
			//console.log(allLoginInputs);

			function loginInputsValidation(item, index) {
				let value = item.value.trim();
				let validation = item.getAttribute("data-validation");
				let pattern = login_patterns[validation];
				if(validation != null ) {
					if (pattern.test(value)) {
						item.classList.remove('err');
						if (index == 0) {
							document.querySelector('.error_l1').innerHTML = "";
						} else if (index == 1) {
							document.querySelector('.error_l2').innerHTML = "";
						}
					} else {
						item.classList.add('err');
						if (index == 0) {
							document.querySelector('.error_l1').innerHTML = "* Incorrect email";
						} else if (index == 1) {
							document.querySelector('.error_l2').innerHTML = "* The length of password " +
								"must be more than 5 symbols";
						}
						isError = true;
						event.preventDefault();
					}
				}
			}
		});
	}
//.......................................................
});


