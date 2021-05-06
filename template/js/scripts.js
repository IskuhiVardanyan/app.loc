window.addEventListener('load', function(event) {

	let allRegisterInputs = document.querySelectorAll('.register_input');
	let allLoginInputs = document.querySelectorAll('.login_input');
	let register_form = document.querySelector('.register_form');
	let login_form = document.querySelector('.login_form');

	let patterns = {
		'first_name': /^[A-Za-z]{3,16}$/,
		'last_name': /^[A-Za-z]{5,16}$/,
		'email': /^.+@.+\..+/,
		'password': /^[a-zA-Z0-9@#$%^&*]{6,16}$/
	}


	//................Image Uploading .................
	let uploaded_pic = document.querySelector('body .uploaded_pic')
	let img_message = document.querySelector('body .img_message');
	let img_button = document.querySelector('#img_button');

	if(typeof(img_message) != 'undefined' && img_message != null){
		// alert("test");
		img_button.addEventListener("click", function (){
			img_message.style.display = "none";
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
						if(value == 0){
							if (index == 0) {
								document.querySelector('.error_1').innerHTML = "* First name field is required";
							} else if (index == 1) {
								document.querySelector('.error_2').innerHTML = "* Last name field is required";

							} else if (index == 2) {
								document.querySelector('.error_3').innerHTML = "* Email field is required";

							} else if (index == 3) {
								document.querySelector('.error_4').innerHTML = "* Password field is required";
							}
						}else{
							if (index == 0) {
								document.querySelector('.error_1').innerHTML = "* First name must be 3-16 " +
									"characters in length";
							} else if (index == 1) {
								document.querySelector('.error_2').innerHTML = "* Last name must be 5-16 " +
									"characters in length";

							} else if (index == 2) {
								document.querySelector('.error_3').innerHTML = "* Incorrect email";

							} else if (index == 3) {
								document.querySelector('.error_4').innerHTML = "* Password must be 6-16 " +
									"characters in length";
							}
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
						if(value == 0){
							if (index == 0) {
								document.querySelector('.error_l1').innerHTML = "* Email field is required";
							} else if (index == 1) {
								document.querySelector('.error_l2').innerHTML = "* Password field is required";
							}
						}else{
							if (index == 0) {
								document.querySelector('.error_l1').innerHTML = "* Incorrect email";
							} else if (index == 1) {
								document.querySelector('.error_l2').innerHTML = "* Password must be 6-16 " +
									"characters in length";
							}
						}
						isError = true;
						event.preventDefault();
					}
				}
			}
		});
	}

//	..................Image Uploading...................

	let inpFile = document.getElementById("inpFile");
	let previewContainer = document.getElementById("imagePreview");
	let previewImage = previewContainer.querySelector(".image-preview__image");
	let previewDefaultText = previewContainer.querySelector(".image-preview__default-text");
	let inpFileSubmit = document.getElementById("inpFileSubmit");

	q = document.getElementById('edit_image').getAttribute('src');
	// console.log(q);
	if(q){
		previewDefaultText.style.display = "none";
	}

	inpFile.addEventListener("change", function (){
		let file = this.files[0];

		if(file) {
			let reader = new FileReader();
			previewDefaultText.style.display = "none";
			previewImage.style.display = "block";

			reader.addEventListener("load", function () {
				//console.log(this);
				previewImage.setAttribute("src", this.result);

			});

			reader.readAsDataURL(file);
		}else{
			previewDefaultText.style.display = null;
			previewImage.style.display = null;
			previewImage.setAttribute("src", "");
		}
	});


//	................. Checking a input field value .................

	let productName = document.querySelector("#product_name");
	let price = document.querySelector("#price");
	let description = document.querySelector("#description");
	let addForm = document.querySelector("#add_form");
	let priceError = document.querySelector(".price_error");

	if(typeof(addForm) != 'undefined' && addForm != null) {
		let isErr = false;
		addForm.addEventListener('submit', function (event) {
			let isErr = false;
			let patt =  /^[1-9]+[0-9]{1,16}$/;

			if (productName.value == "" || (price.value == "" || description.value == "")) {

				let span = document.querySelector(".add_error");
				span.innerHTML = "* Please fill in all required fields";
				priceError.style.display = "none";
				isErr = true;
				event.preventDefault();

				if (!patt.test(price.value)){
					//alert(span);
					priceError.style.display = "block";
					isErr = true;
					event.preventDefault();
				}
			}else {
				let span = document.querySelector(".add_error");
				span.innerHTML = "";

				if (!patt.test(price.value)){
					//alert(span);
					priceError.style.display = "block";
					 isErr = true;
					event.preventDefault();
				}
			}
		});
	}


//...................Popup Box for Delete Button......................

	// let deleteBtn = document.querySelector(".delete_btn")
	// // let modal = document.querySelector(".modal-content");
	// let popup = document.querySelector(".popup");
	// let okBtn = document.querySelector("#ok_btn");
	// let cancelBtn = document.querySelector("#cancel_btn");
	//
	// if(typeof(deleteBtn) != 'undefined' && deleteBtn != null) {
	// 	deleteBtn.addEventListener("click", function(event){
	// 		popup.style.display = "block";
	// 		if(popup){
	// 			event.preventDefault();
	// 		}else{
	// 			event.stopPropagation();
	// 		}
	// 	});
	//
	// 	okBtn.addEventListener("click", function() {
	// 		popup.style.display = "none";
	// 	});
	//
	// 	cancelBtn.addEventListener("click", function() {
	// 		popup.style.display = "none";
	// 	});
	// }


	// deleteBtn.addEventListener('click', function (event){
	// 	if(!confirm("fgdfg")){
	// 		event.preventDefault();
	// 	}
	// });

//.......................................................
});



