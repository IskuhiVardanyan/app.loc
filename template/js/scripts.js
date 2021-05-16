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



//......................... Cart ............................

	let shopItemButton = document.querySelectorAll(".shop-item-button");
	let cartItemValue = document.querySelector(".cart_item_value");
	let homeProductName = document.querySelectorAll(".home_product_name");
	let homeProductPrice = document.querySelectorAll(".home_product_price");
	let homeProductImage = document.querySelectorAll(".home_product_image");
	let cartItems = document.querySelector(".cart-items");
	let objArray = [];

//.....................Showing number of products in cart......................
	if(typeof(cartItemValue) != 'undefined' && cartItemValue != null){
		if (localStorage.getItem("key") != null) {
			cartItemValue.innerHTML = JSON.parse(localStorage.getItem("key"));
		}
	}
	//console.log(cartItemValue.innerHTML);


	let arrClick = [];
	for(let i = 0; i < shopItemButton.length; i++){
		let clickNum = 0;

		shopItemButton[i].addEventListener("click", function(e){
			clickNum++;
			arrClick[clickNum-1] =  clickNum;
		//	console.log(arrClick);
			cartItemValue.innerHTML++;
			let strCartItemValue = JSON.stringify(cartItemValue.innerHTML); // String representation of an object
			localStorage.setItem("key", strCartItemValue);
			cartItemValue.innerHTML = JSON.parse(localStorage.getItem("key"));
//........................................................................
			let productObj = {
				name: homeProductName[i].innerHTML,
				price:homeProductPrice[i].innerHTML,
				image: homeProductImage[i].src,
				quantity: arrClick[arrClick.length - 1]
			};

			objArray.push(productObj);
		    localStorage.setItem("users", JSON.stringify(objArray));



		});
		if(typeof(cartItems) != 'undefined' && cartItems != null) {

			if (localStorage.getItem("users") != null) {
				let products = JSON.parse(localStorage.getItem("users") || "[]");
				let bbb = document.querySelector(".bbb");
				let itemContainer = [];
				for (let j = 0; j < products.length; j++) {

					itemContainer[j] = document.createElement('tr');
					itemContainer[j].innerHTML =
						'<td><img src="' + products[j].image + '" width="200px" height="200px"><br></td>' +
						'<td><span class="product_item_name">' + products[j].name + '</span></td>' +
						'<td><span class="item_price">' + products[j].price + '</span></td>' +
						'<td><input class="cart-quantity-input" type="number" value="' + products[j].quantity + '"></td>' +
						'<td><button class="btn btn-danger btn_remove" type="button">Remove</button></td>';
					bbb.appendChild(itemContainer[j]);
				}

			}
		}
	}

//......................Showing a products in the cart page........................



//console.log(bbb);









//........................ Image Uploading ..........................

	let uploaded_pic = document.querySelector('body .uploaded_pic')
	let img_message = document.querySelector('body .img_message');
	let img_button = document.querySelector('#img_button');

	if(typeof(img_message) != 'undefined' && img_message != null){
		// alert("test");
		img_button.addEventListener("click", function (){
			img_message.style.display = "none";
		});
	}

//............................ Register Form Validation ............................

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

	//............................ Login Form Validation .............................

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
			let patt =  /^[0-9]{1,16}$/;

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

	let deleteBtn = document.querySelectorAll(".delete_btn");
	let popup = document.querySelector(".modal");
	let okBtn = document.querySelector("#ok_btn");
	let cancelBtn = document.querySelector("#cancel_btn");

	if(typeof(deleteBtn) != 'undefined' && deleteBtn != null) {

		for(let i = 0; i < deleteBtn.length; i++){
			deleteBtn[i].addEventListener("click", function(){
				let dataId = deleteBtn[i].getAttribute("data-id");
				okBtn.href = '/admin/delete/' + dataId ;
				popup.style.display = "block";
			});
		}
	}

	//	................. Checking a input field value for Edit page.................

	let productNameEdit = document.querySelector("#product_name_edit");
	let priceEdit = document.querySelector("#price_edit");
	let descriptionEdit = document.querySelector("#description_edit");
	let editForm = document.querySelector("#edit_form");
	let priceErrorEdit = document.querySelector(".price_error_edit");

	if(typeof(editForm) != 'undefined' && editForm != null) {
		let isErr = false;
		editForm.addEventListener('submit', function (event) {
			//alert("fg");
			let isErr = false;
			let patt =  /^[0-9]{1,16}$/;

			if (productNameEdit.value == "" || (priceEdit.value == "" || descriptionEdit.value == "")) {

				let span = document.querySelector(".edit_error");
				span.innerHTML = "* Please fill in all required fields";
				priceErrorEdit.style.display = "none";
				isErr = true;
				event.preventDefault();

				if (!patt.test(priceEdit.value)){
					//alert(span);
					priceErrorEdit.style.display = "block";
					isErr = true;
					event.preventDefault();
				}
			}else {
				let span = document.querySelector(".edit_error");
				span.innerHTML = "";

				if (!patt.test(priceEdit.value)){
					//alert(span);
					priceErrorEdit.style.display = "block";
					isErr = true;
					event.preventDefault();
				}
			}
		});
	}



//.......................................................
});



