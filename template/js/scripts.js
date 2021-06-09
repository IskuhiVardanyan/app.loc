window.addEventListener('load', function(event) {
	// alert(document.cookie.match(/PHPSESSID=[^;]+/));
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
	let subtotal = document.querySelector(".subtotal_price");
	let homeProductId = document.querySelectorAll(".home_product_id");
	let homeProductCount = document.querySelectorAll(".home_product_count");
	let cartItemList = document.querySelector(".cart_items_list");
	//
	let productObj = [];
	let allCartsValues = [];

//..................... Showing number of products in cart ......................

	if(typeof(cartItemValue) != 'undefined' && cartItemValue != null){
		let sId = document.querySelector('.session_num').value;
		if ((JSON.parse(localStorage.getItem("key") || "[]")).length > 0) {
			let v = JSON.parse(localStorage.getItem("key") || "[]");
			for(let i = 0; i < v.length; i++){
				if(v[i].sesId === sId){
					cartItemValue.innerHTML = v[i].eachValue;
				}
			}
		}
	}
	if(typeof(shopItemButton) != 'undefined' && shopItemButton != null) {

		for (let i = 0; i < shopItemButton.length; i++) {
			let sId = document.querySelector('.session_num').value;
			let clickNum = 1;
			let clickValue = 0;
			shopItemButton[i].addEventListener("click", function (e) {
				console.log(shopItemButton);
				let productId = homeProductId[i].innerHTML;
				let productCount = homeProductCount[i].innerHTML;
				let k = JSON.parse(localStorage.getItem("products") || "[]");
				let v = JSON.parse(localStorage.getItem("key") || "[]");

				productObj[i] = {
					sesId: sId,
					id: productId,
					cnt: productCount,
					name: homeProductName[i].innerHTML,
					price: homeProductPrice[i].innerHTML,
					image: homeProductImage[i].src,
					quantity: clickNum
				};

				if (k.length === 0) {
					allCartsValues[i] = {
						sesId: sId,
						eachValue: clickValue
					};
					allCartsValues[i].eachValue++;
					cartItemValue.innerHTML = allCartsValues[i].eachValue;
					k.push(productObj[i]);
					v.push(allCartsValues[i]);
					localStorage.setItem("products", JSON.stringify(k));
					localStorage.setItem("key", JSON.stringify(v));
				} else if (k.find(element => (element.id === productObj[i].id && element.sesId === productObj[i].sesId)) != null) {
					//alert("111111");
					let a = k.indexOf(k.find(element => (element.id === productObj[i].id && element.sesId === productObj[i].sesId)));
					k[a].quantity++;
					for (let j = 0; j < v.length; j++) {
						if (k[a].sesId === v[j].sesId) {
							v[j].eachValue++;
							cartItemValue.innerHTML = v[j].eachValue;
							localStorage.setItem("key", JSON.stringify(v));
							break;
						}
					}
					localStorage.setItem("products", JSON.stringify(k));
				} else if (k.find(element => element.id !== productObj[i].id && element.sesId === productObj[i].sesId) != null) {

						//alert("33333");
						k.push(productObj[i]);
						localStorage.setItem("products", JSON.stringify(k));
						for (let i = 0; i < v.length; i++) {
							if (v[i].sesId === sId) {
								v[i].eachValue++
								cartItemValue.innerHTML = v[i].eachValue;
								localStorage.setItem("key", JSON.stringify(v));
							}
						}
				}else if (k.find(element => element.id === productObj[i].id && element.sesId === productObj[i].sesId) == null) {
					//alert("444444");
					clickValue++;
					k.push(productObj[i]);
					localStorage.setItem("products", JSON.stringify(k));
					allCartsValues[i] = {
						sesId: sId,
						eachValue: clickValue
					};
					console.log(allCartsValues[i]);
					v.push(allCartsValues[i]);
					localStorage.setItem("key", JSON.stringify(v));
					console.log(v);
					cartItemValue.innerHTML = v[i].eachValue;
				}
			});
		}
	}
//..........................Sum of product prices...............................

	function ProductSubtotal(products, sId) {
		let sum = 0;
		for (let i = 0; i < products.length; i++) {
			if (products[i].sesId === sId){
				sum += products[i].price * products[i].quantity;
			}
		}
		return sum;
	}

//..........................Insert product row..............................

	if(typeof(cartItems) != "undefined" && cartItems != null) {

		if (localStorage.getItem("products").length != null) {
		let products = JSON.parse(localStorage.getItem("products") || "[]");
		let sId = document.querySelector('.session_num').value;
		let sum = 0;
		let itemContainer = [];
			for (let j = 0; j < products.length; j++) {
				itemContainer[j] = document.createElement('tr');
				cartItemList.appendChild(itemContainer[j]);
				itemContainer[j].classList.add("product_class");

				if(products[j].sesId === sId && sId.length > 0){
					itemContainer[j].innerHTML =
						'<td style="display: none"><span class="product_item_id">' + products[j].id + '</span></td>' +
						'<td><img class="desc_img" src="' + products[j].image + '" width="200px" height="200px"><br></td>' +
						'<td><span class="product_item_name">' + products[j].name + '</span></td>' +
						'<td><span>&#36 </span><span class="item_price">' + products[j].price + '</span></td>' +
						'<td><input class="cart-quantity-input" type="number" value="' + products[j].quantity + '"></td>' +
						'<td><button class="btn btn-danger btn_remove">Remove</button></td>' +
						'<td>' +
						'<a class="btn btn-danger buy_product" href="/cart/buy/'+ products[j].id + '">Buy</a>' +
						'</td>';
					sum += products[j].price * products[j].quantity;
				}else if(products[j].sesId === sId && sId.length === 0){
					itemContainer[j].innerHTML =
						'<td style="display: none"><span class="product_item_id">' + products[j].id + '</span></td>' +
						'<td><img class="desc_img" src="' + products[j].image + '" width="200px" height="200px"><br></td>' +
						'<td><span class="product_item_name">' + products[j].name + '</span></td>' +
						'<td><span>&#36 </span><span class="item_price">' + products[j].price + '</span></td>' +
						'<td><input class="cart-quantity-input" type="number" value="' + products[j].quantity + '"></td>' +
						'<td><button class="btn btn-danger btn_remove">Remove</button></td>';
					sum += products[j].price * products[j].quantity;
				}
				subtotal.innerHTML = sum;
			}

		}
	}


//............................Remove an element.............................

	let btnRemove = document.querySelectorAll(".btn_remove");
	let productItemId = document.querySelectorAll('.product_item_id');
	let tr = document.querySelectorAll(".product_class");
	let products = [];
	let newKey = []

	if(typeof(tr) != "undefined" && tr != null) {

		for (let i = 0; i < btnRemove.length; i++) {
			let sId = document.querySelector('.session_num').value;
			btnRemove[i].addEventListener("click", function (event) {
				products = JSON.parse(localStorage.getItem("products") || "[]");
				newKey = JSON.parse(localStorage.getItem("key") || "[]");
					for(let j = 0; j < products.length; j++){
						if(productItemId[i].innerHTML === products[j].id && sId === products[j].sesId){
							//alert("dfg");
							for(let n = 0; n < newKey.length; n++){
								if(newKey[n].sesId === sId){
									let cartUpdate = newKey[n].eachValue - products[j].quantity;
									if(cartUpdate === 0){
										newKey.splice(n, 1);
									}else{
										newKey[n].eachValue = cartUpdate;
									}
									localStorage.setItem("key", JSON.stringify(newKey));
									if (typeof (cartItemValue) != 'undefined' && cartItemValue != null) {
										cartItemValue.innerHTML = cartUpdate;
									}
									products.splice(j, 1);
									localStorage.setItem("products", JSON.stringify(products));
									tr[i].remove();
									subtotal.innerHTML = ProductSubtotal(products, sId);
								}
							}
						}
					}
				window.location.reload();
			});
		}
	}

//..........................Changing a count of products...........................

	if(typeof(cartItems) != "undefined" && cartItems != null) {
		let sId = document.querySelector('.session_num').value;
		let cartQuantityInput = document.querySelectorAll(".cart-quantity-input");
		let sum = 0;
		for (let i = 0; i < cartQuantityInput.length; i++) {
			cartQuantityInput[i].addEventListener("change", function () {

				newKey = JSON.parse(localStorage.getItem("key") || "[]");
				products = JSON.parse(localStorage.getItem("products") || "[]");

				if(isNaN(cartQuantityInput[i].value) || cartQuantityInput[i].value<=0){
					//alert("change");
					cartQuantityInput[i].value = 1;
					for(let n = 0; n < newKey.length; n++) {
						if (newKey[n].sesId === sId) {
							for (let j = 0; j < products.length; j++) {
								if (products[j].sesId === sId && products[j].id === productItemId[i].innerHTML) {
									let cartUpdate = newKey[n].eachValue - products[j].quantity;
									products[j].quantity = cartQuantityInput[i].value;
									// alert(products[j].quantity);
									localStorage.setItem("products", JSON.stringify(products));
									cartUpdate += parseInt(cartQuantityInput[i].value);
									cartItemValue.innerHTML = cartUpdate;
									newKey[n].eachValue = cartUpdate;
									localStorage.setItem("key", JSON.stringify(newKey));
								}
								subtotal.innerHTML = ProductSubtotal(products, sId);
							}
						}
					}
				}else{
					for(let n = 0; n < newKey.length; n++) {
						if (newKey[n].sesId === sId) {
							for (let j = 0; j < products.length; j++) {
								if (products[j].sesId === sId && products[j].id === productItemId[i].innerHTML) {

									let cartUpdate = newKey[n].eachValue - products[j].quantity;
									products[j].quantity = cartQuantityInput[i].value;
									//alert(products[j].quantity);
									localStorage.setItem("products", JSON.stringify(products));
									cartUpdate += parseInt(cartQuantityInput[i].value);
									cartItemValue.innerHTML = cartUpdate;
									newKey[n].eachValue = cartUpdate;
									localStorage.setItem("key", JSON.stringify(newKey));
								}
								subtotal.innerHTML = ProductSubtotal(products, sId);
							}
						}
					}
				}
			});
		}
	}


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

	let q = document.getElementById('edit_image').getAttribute('src');
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
	let count = document.querySelector("#count");
	let addForm = document.querySelector("#add_form");
	let priceError = document.querySelector(".price_error");
	let countError = document.querySelector(".count_error");

	if(typeof(addForm) != 'undefined' && addForm != null) {
		let isErr = false;
		addForm.addEventListener('submit', function (event) {
			let isErr = false;
			let patt =  /^[0-9]{1,16}$/;
			let countPatt = /^[0-9]{1,16}$/;

			if (productName.value == "" || (price.value == "" || description.value == "") || count.value == "") {

				let span = document.querySelector(".add_error");
				span.innerHTML = "* Please fill in all required fields";
				priceError.style.display = "none";
				isErr = true;
				event.preventDefault();
				if(!countPatt.test(count.value)){
					countError.style.display = "block";
					isErr = true;
					event.preventDefault();
				}else{
					countError.style.display = "none";
					event.stopPropagation();
				}
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
				if(!countPatt.test(count.value)){
					countError.style.display = "block";
					isErr = true;
					event.preventDefault();
				}else{
					countError.style.display = "none";
					event.stopPropagation();
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
	let countEdit = document.querySelector("#count_edit");
	let descriptionEdit = document.querySelector("#description_edit");
	let editForm = document.querySelector("#edit_form");
	let priceErrorEdit = document.querySelector(".price_error_edit");
	let countErrorEdit = document.querySelector(".count_error_edit");

	if(typeof(editForm) != 'undefined' && editForm != null) {
		let isErr = false;
		editForm.addEventListener('submit', function (event) {
			//alert("fg");
			let isErr = false;
			let patt =  /^[0-9]{1,16}$/;

			if (productNameEdit.value == "" || (priceEdit.value == "" || descriptionEdit.value == "") || countEdit.value == "") {

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

				if (!patt.test(countEdit.value)){
					//alert(span);
					countErrorEdit.style.display = "block";
					isErr = true;
					event.preventDefault();
				}else{
					countErrorEdit.style.display = "none";
					event.stopPropagation();
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
				if (!patt.test(countEdit.value)){
					//alert(span);
					countErrorEdit.style.display = "block";
					isErr = true;
					event.preventDefault();
				}else{
					countErrorEdit.style.display = "none";
					event.stopPropagation();
				}
			}
		});
	}
//.......................................................
});



