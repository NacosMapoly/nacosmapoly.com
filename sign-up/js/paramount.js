function _disabledInspect() {
	$(document).ready(function () {
		// Disable right-click
		$(document).on('contextmenu', function (e) {
			e.preventDefault();
		});

		// Disable keyboard shortcuts for copy, cut, paste, view source, dev tools
		$(document).on('keydown', function (e) {
			const blockedKeys = ['c', 'x', 'v', 'u', 's', 'i', 'j'];
			if (
				(e.ctrlKey && blockedKeys.includes(e.key.toLowerCase())) ||
				(e.key === 'F12') ||
				(e.ctrlKey && e.shiftKey && blockedKeys.includes(e.key.toLowerCase()))
			) {
				e.preventDefault();
			}
		});

		// Intercept copy action
		$(document).on('copy', function (e) {
			e.originalEvent.clipboardData.setData('text/plain', 'Copying is disabled on this page.');
			e.preventDefault();
		});
	});
}


function _open_live_chat() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '0' }, 200);
	$('.index-menu-back-div').animate({ 'margin-left': '-100%' }, 400);
	$('.live-chat-back-div').animate({ 'margin-left': '0' }, 400);
}

function _close_side_nav() {
	$('.sidenavdiv, .sidenavdiv-in').animate({ 'margin-left': '-100%' }, 200);
	$('.index-menu-back-div,.live-chat-back-div').animate({ 'margin-left': '-100%' }, 400);
}

function _getPage(options) {
	const {
		page = '',
		action = 'get_page',
		url = '',
		pageContainer = 'page-content'
	} = options;

	$("#" + pageContainer).html('<div class="ajax-loader"><img src="' + website_url + '/sign-up/images/spinner.gif"/></div>').css({ 'display': 'flex', 'flex-direction': 'column', 'gap': '20px', 'align-items': 'center', 'align-items': 'center' }).fadeIn(500);
	const dataString = "action=" + action + "&page=" + page;
	$.ajax({
		type: "POST",
		url: url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#" + pageContainer).html(html);
		},
	});
}

function _getForm(options) {
	const {
		page = '',
		id = '',
		layer = 1,
		action = 'get_form',
		url = ''
	} = options;
	$(layer === 1 ? '#get-form-more-div' : '#get-more-div-secondary').css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const dataString = "action=" + action + "&page=" + page + "&id=" + id + "&modalLayer=" + layer;
	$.ajax({
		type: "POST",
		url: url,
		data: dataString,
		cache: false,
		success: function (html) {
			$(layer === 1 ? '#get-form-more-div' : '#get-more-div-secondary').html(html);
			if (page == 'password_reset_successful') {
				let userRegistrationDataSession = JSON.parse(sessionStorage.getItem("userRegistrationDataSession"));
				const fullname = userRegistrationDataSession.studentData.fullname;
				$('#userFullName').html(fullname);
			}
		},
	});
}
function _alertClose(layer = 1) {
	let text = '';
	text +=
		'<div class="alert-loading-div">' +
		'<div class="icon"><img src="' + website_url + 'sign-up/images/loading.gif" width="20px" alt="Loading"/></div>' +
		'<div class="text"><p>LOADING...</p></div>' +
		'</div>';
	$(layer === 1 ? '#get-form-more-div' : '#get-more-div-secondary').html(text).fadeOut(200);
}

function _actionAlert(message, status) {
	let text = '';
	$('.all-alert-back-div').html(text).css('display', 'flex');
	if (status == true) {
		text +=
			'<div class="success-alert-div animated fadeInDown">' +
			'<div class="icon"><i class="bi-check-all"></i></div>' +
			'<div class="text"><p>' + message + '</p></div>' +
			'</div>';
	} else {
		text +=
			'<div class="failed-alert-div animated fadeInDown">' +
			'<div class="icon"><i class="bi-exclamation-octagon-fill"></i></div>' +
			'<div class="text"><p>' + message + '</p></div>' +
			'</div>';
	}
	$('.all-alert-back-div').html(text).fadeIn(500).delay(4000).fadeOut(100);
}

function isNumberCheck(e) {
	var key = e.keyCode || e.which;
	if (!((key >= 48 && key <= 57))) {
		if (e.preventDefault) {
			e.preventDefault();
		} else {
			e.returnValue = false;
		}
	}
}

function _isNumberCheck(id) {
	$(document).on('keypress', '#' + id, function (event) {
		var key = event.keyCode || event.which;
		if (!((key >= 48 && key <= 57) || key === 43 || key === 45)) {
			event.preventDefault();
			$(this).css('border', '#F00 1px solid');
		} else {
			$(this).css('border', '#e2e2e2 1px solid');
		}
	});
}

function _nextPage(next_id) {
	$("#page1,#page2,#page3").hide();
	$("#" + next_id).fadeIn(1000);
}

function _isValidMobileNumber(number) {
	// Regular expression to match a typical mobile phone number format
	var regex = /^\d+$/;
	return regex.test(number);
}


function _showPasswordVisibility(ids, toggle_pass) {
	var password = $('#' + ids).val();
	if (password != '') {
		$('#' + toggle_pass).show();
	} else {
		$('#' + toggle_pass).hide();
	}
}

function _checkPasswordMatch(ids, toggle_pass) {
	var password = $("#password").val();
	var confirmed_password = $("#confirmed_password").val();
	if ((password != confirmed_password) && (confirmed_password != '')) {
		$('#message').show();
		$('#password,#confirmed_password').css('border', '#F00 1px solid');
	} else {
		$('#message').hide();
		$('#password,#confirmed_password').css('border', '#e2e2e2 1px solid');
	}
	_showPasswordVisibility(ids, toggle_pass);
}


function _togglePasswordVisibility(ids, toggle_pass) {
	const passwordInput = $('#' + ids);
	const togglePasswordIcon = $('#' + toggle_pass);

	if (passwordInput.attr('type') === 'password') {
		passwordInput.attr('type', 'text');
		togglePasswordIcon.html('<i class="bi-eye password-toggle"></i>');
	} else {
		passwordInput.attr('type', 'password');
		togglePasswordIcon.html('<i class="bi-eye-slash password-toggle"></i>');
	}
}


// function _matricNumberFormat() {
// 	$('#matric_number').on('keyup', function () {
// 		let value = $(this).val().toUpperCase().trim();
// 		$(this).val(value); // force uppercase

// 		const format1 = /^\d{2}\/\d{2}\/\d{4}$/;
// 		const format2 = /^\d{2}\/\d{3}\/\d{2}\/[A-Z]\/\d{4}$/;
// 		const format3 = /^\d{2}\/\d{3}\/\d{4}$/;

// 		let hint = "";
// 		let msgColor = "";

// 		if (format1.test(value) || format2.test(value) || format3.test(value)) {
// 			hint = "✔ Valid Matric Number";
// 			msgColor = "var(--primary-color)";
// 		} else {
// 			hint = "⛔ Expected formats: 00/00/0000 | 00/000/00/P/0000 | 00/000/0000";
// 			msgColor = "var(--close-color)";
// 		}

// 		$('#msg').css('color', msgColor).text(hint).fadeIn(200).delay(2000).fadeOut(100);
// 	});

// }




function _getSelectLevel(select_id, level_id) {
	$('#' + select_id).append('<option id="loading_' + select_id + '" value="">FETCHING...</option>');

	var dataString = "level_id=" + level_id;
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-level',
		data: dataString,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			$('#loading_' + select_id).hide();
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const level_name = fetch[i].level_name;
					$('#' + select_id).append('<option value="' + level_name + '">' + level_name + '</option>');
				}
			} else {
				$('#loading_' + select_id).show();
				$('#' + select_id).append('<option id="loading_' + select_id + '" value="">' + message + '</option>');
			}
		},
	});
}

function _getSelectGender(select_id) {
	$('#' + select_id).append('<option id="loading_' + select_id + '" value="">FETCHING...</option>');

	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-gender',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			$('#loading_' + select_id).hide();
			const success = info.success;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const gender_id = fetch[i].gender_id;
					const gender_name = fetch[i].gender_name;
					$('#' + select_id).append('<option value="' + gender_id + '">' + gender_name + '</option>');
				}
			} else {
				$('#loading_' + select_id).show();
				$('#' + select_id).append('<option id="loading_' + select_id + '" value="">' + message + '</option>');
			}
		},
	});
}


function _getSelectCourseOfStudy(select_id) {
	$('#' + select_id).append('<option id="loading_' + select_id + '" value="">FETCHING...</option>');
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-course-study',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			$('#loading_' + select_id).hide();
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const course_study_id = fetch[i].course_study_id;
					const course_study_title = fetch[i].course_study_title;
					$('#' + select_id).append('<option value="' + course_study_id + '">' + course_study_title + '</option>');
				}
			} else {
				$('#loading_' + select_id).show();
				$('#' + select_id).append('<option id="loading_' + select_id + '" value="">' + message + '</option>');
			}
		},
	});
}

function _getSelectProgrammeMode(select_id) {
	$('#' + select_id).append('<option id="loading_' + select_id + '" value="">FETCHING...</option>');
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-programme-mode',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			$('#loading_' + select_id).hide();
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const prog_mode_id = fetch[i].prog_mode_id;
					const prog_mode_title = fetch[i].prog_mode_title;
					$('#' + select_id).append('<option value="' + prog_mode_id + '">' + prog_mode_title + '</option>');
				}
			} else {
				$('#loading_' + select_id).show();
				$('#' + select_id).append('<option id="loading_' + select_id + '" value="">' + message + '</option>');
			}
		},
	});
}

function _getIsMatricNo(select_id) {
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/setups/is-matric-no',
			dataType: 'json',
			cache: false,
			headers: {
				'apiKey': apiKey,
			},
			success: function (info) {
				var success = info.success;
				var message = info.message;
				var text = '';
				if (success == true) {
					var getAllData = info.data;
					for (var i = 0; i < getAllData.length; i++) {
						var is_matric_no = getAllData[i].is_matric_no;
						text +=
							'<label>' +
							'<div class="radio-in-div">' +
							'<div class="radio ' + is_matric_no + '">' +
							'<input type="checkbox" class="child" id="' + is_matric_no + '" name="is_matric_no[]" data-value="' + is_matric_no + '">' +
							'<div class="border"></div>' +
							'</div>' +
							'<span class="text">' + is_matric_no + '</span>' +
							'</div>' +
							'</label>';
					}
					$('#' + select_id).html(text);
					_checkRadioBox();
				} else {
					$('#' + select_id).append(message);
				}
			},
		});
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}

function _checkRadioBox() {
	$(".child").on("change", function () {
		// Uncheck the other checkbox
		$(".child").not(this).prop("checked", false);
		// Get the selected value
		var selectedValue = $(this).data("value");
		// Show alert based on value
		if (selectedValue == "YES") {
			$('#matric_number_container').show();
		} else {
			$('#matric_number').val('');
			$('#matric_number_container').hide();
		}
	});
}


function _inputDataSession() {
	let page2DataSession = JSON.parse(sessionStorage.getItem("page2DataSession"));
	let page3DataSession = JSON.parse(sessionStorage.getItem("page3DataSession"));
	if (page2DataSession) {
		$('#surname').val(page2DataSession.surname);
		$('#firstname').val(page2DataSession.firstname);
		$('#phone').val(page2DataSession.phone);
	}
	if (page3DataSession) {
		$('#matric_number').val(page3DataSession.matric_number);
		$('#email').val(page3DataSession.email);
		$('#confirm_email').val(page3DataSession.confirm_email);
	}
}

function checkField() {
	var level_id = $("#level_id").val();
	if ((level_id == 'HND I') || (level_id == 'HND II')) {
		$('#course_of_study_container').show();
	} else {
		$('#course_of_study_container').hide();
	}
}






function _userSignUp(next_id) {
	var surname = $("#surname").val().trim();
	var firstname = $("#firstname").val().trim();
	var phone = $("#phone").val().trim();
	var gender_id = $("#gender_id").val();
	var level_id = $("#level_id").val();
	var is_matric_no = [];
	$(".child:checked").each(function () {
		is_matric_no.push($(this).data("value"));
	});
	var checked = $('input[name="is_matric_no[]"]:checked').length;
	var matric_number = $("#matric_number").val().trim();
	var email = $("#email").val().trim();
	var confirm_email = $("#confirm_email").val().trim();
	var course_of_study = $("#course_of_study").val();
	var programme_mode = $("#programme_mode").val();
	var password = $("#password").val();
	var confirmed_password = $("#confirmed_password").val();

	$('#surname,#firstname,#phone,#gender_id,#level_id,#matric_number,#email, #confirm_email,#course_of_study,#programme_mode,#password ,#confirmed_password').removeClass('issue');
	if (next_id == 'page2') {
		if (!surname) {
			$('#surname').addClass("issue");
			_actionAlert('Provide surname to continue', false);
			return;
		}
		if (!firstname) {
			$('#firstname').addClass("issue");
			_actionAlert('Provide firstname to continue', false);
			return;
		}
		if (!phone) {
			$('#phone').addClass("issue");
			_actionAlert('Provide phone number to continue', false);
			return;
		}
		if (!_isValidMobileNumber(phone)) {
			$('#phone').addClass("issue");
			_actionAlert('Fill in valid phone number to continue', false);
			return;
		}
		if (!gender_id) {
			$('#gender_id').addClass("issue");
			_actionAlert('Select gender to continue', false);
			return;
		}
		const page2DataSession = {
			surname: surname,
			firstname: firstname,
			phone: phone,
		};
		sessionStorage.setItem("page2DataSession", JSON.stringify(page2DataSession));

		_nextPage(next_id);

	} else if (next_id == 'page3') {
		if (!level_id) {
			$('#level_id').addClass("issue");
			_actionAlert('Select level to continue', false);
			return;
		}
		if (checked < 1) {
			_actionAlert('Have you gotten matric number? Kindly Select YES or NO to continue', false);
			return;
		}
		if (is_matric_no == 'YES') {
			if (!matric_number) {
				$('#matric_number').addClass("issue");
				_actionAlert('Provide matric number to continue', false);
				return;
			}
		}
		if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
			$('#email').addClass('issue');
			_actionAlert('Provide a valid email address to continue', false);
			return;
		}
		if (email != confirm_email) {
			$('#email, #confirm_email').addClass('issue');
			_actionAlert('Error! email address not matched, try again', false);
			return;
		}

		const page3DataSession = {
			matric_number: matric_number,
			email: email,
			confirm_email: confirm_email,
		};
		sessionStorage.setItem("page3DataSession", JSON.stringify(page3DataSession));
		_nextPage(next_id);

	} else if (next_id == 'proceed_to_payment') {
		if ((level_id == 'HND I') || (level_id == 'HND II')) {
			if (!course_of_study) {
				$('#course_of_study').addClass("issue");
				_actionAlert('Select course of study to continue', false);
				return;
			}
		}
		if (!programme_mode) {
			$('#programme_mode').addClass("issue");
			_actionAlert('Select programme mode to continue', false);
			return;
		}
		if (!password) {
			$('#password').addClass("issue");
			_actionAlert('Provide Password to Continue', false);
			return;
		}
		if (password != confirmed_password) {
			$('#password, #confirmed_password').addClass("issue");
			_actionAlert('Password not matched, try again', false);
			return;
		}

		_userVerification(surname, firstname, phone, gender_id, level_id, is_matric_no, matric_number, email, confirm_email, course_of_study, programme_mode, password, confirmed_password);
	} else {
		/// do nothing
	}
}




function _userVerification(surname, firstname, phone, gender_id, level_id, is_matric_no, matric_number, email, confirm_email, course_of_study, programme_mode, password, confirmed_password) {
	try {
		const btn_text = $("#submit_btn").html();
		$("#submit_btn").html('<img src=" ' + website_url + '/sign-up/images/loading.gif" width="15px" alt="Loading"/>');
		document.getElementById("submit_btn").disabled = true;

		const form_data = new FormData();
		form_data.append("firstname", firstname);
		form_data.append("surname", surname);
		form_data.append("phone", phone);
		form_data.append("gender_id", gender_id);
		form_data.append("level_id", level_id);
		form_data.append("is_matric_no", is_matric_no);
		form_data.append("matric_number", matric_number);
		form_data.append("email", email);
		form_data.append("confirm_email", confirm_email);
		form_data.append("course_of_study", course_of_study);
		form_data.append("programme_mode", programme_mode);
		form_data.append("password", password);
		form_data.append("confirmed_password", confirmed_password);

		$.ajax({
			type: "POST",
			url: endPoint + '/sign-up/auth/verify-sign-up',
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			headers: {
				'apiKey': apiKey,
			},
			processData: false,
			success: function (info) {
				sessionStorage.setItem("userRegistrationDataSession", JSON.stringify(info));
				const response = info.response;
				const success = info.success;
				const message = info.message;
				if (success === true) {
					const user_id = info.studentData.user_id;
					const firstname = info.studentData.firstname;
					const surname = info.studentData.surname;
					const fullname = info.studentData.fullname;
					const phone = info.studentData.phone;
					const email = info.studentData.email;
					const is_matric_no = info.studentData.is_matric_no;
					const matric_number = info.studentData.matric_number;
					const level_id = info.studentData.level_id;
					const gender_id = info.studentData.gender_id;
					const course_of_study = info.studentData.course_of_study;
					const programme_mode = info.studentData.programme_mode;
					const password = info.studentData.password;

					const session_id = info.settingsData.session_id;
					const academic_setting_id = info.settingsData.academic_setting_id;

					const payment_reference = info.paymentData.payment_reference;
					const amount = info.paymentData.amount;
					const paystack_payment_key = info.paymentData.paystack_payment_key;

					const payment_name = info.paymentData.payment_name;
					const payment_id = info.paymentData.payment_id;
					const wallet_id = info.paymentData.wallet_id;
					const charges = info.paymentData.charges;
					const transaction_type = info.paymentData.transaction_type;
					const payment_method = info.paymentData.payment_method;

					_payWithPaystack(user_id, fullname, phone, email, payment_reference, amount, paystack_payment_key, firstname, surname, is_matric_no, matric_number, level_id, gender_id, course_of_study, programme_mode, password, session_id, academic_setting_id, payment_name, payment_id, wallet_id, charges, transaction_type, payment_method);

				} else {
					if (response == 401) { // check for email
						$('#email').addClass('issue');
					} else if ((response == 402) || (response == 403)) {
						$('#matric_number').addClass('issue');
					}
					_nextPage('page2');
					_actionAlert(message, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}

			},
			error: function (error) {
				_actionAlert('An error occurred while processing your request: ' + error, false);
				$("#submit_btn").html(btn_text);
				document.getElementById("submit_btn").disabled = false;
			}
		});
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}


function _payWithPaystack(user_id, fullname, phone, email, payment_reference, amount, paystack_payment_key, firstname, surname, is_matric_no, matric_number, level_id, gender_id, course_of_study, programme_mode, password, session_id, academic_setting_id, payment_name, payment_id, wallet_id, charges, transaction_type, payment_method) {
	var handler = PaystackPop.setup({
		key: paystack_payment_key,
		email: email,
		amount: amount * 100, //amt in kobo
		ref: payment_reference,
		currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
		metadata: {
			custom_fields: [
				{
					display_name: fullname,
					variable_name: "mobile_number",
					value: phone
				}
			]
		},
		callback: function (response) { //success
			var stack_pay_ref = $.trim(response.reference);
			_callPaymentSuccess(user_id, phone, email, stack_pay_ref, amount, firstname, surname, is_matric_no, matric_number, level_id, gender_id, course_of_study, programme_mode, password, session_id, academic_setting_id, payment_name, payment_id, wallet_id, charges, transaction_type, payment_method);
		},
		onClose: function () { //update to cancelled.
			$('#submit_btn').html('<i class="bi bi-check"></i> PROCEED');
			document.getElementById('submit_btn').disabled = false;
			return false;
		}
	});
	handler.openIframe();
}

function _callPaymentSuccess(user_id, phone, email, stack_pay_ref, amount, firstname, surname, is_matric_no, matric_number, level_id, gender_id, course_of_study, programme_mode, password, session_id, academic_setting_id, payment_name, payment_id, wallet_id, charges, transaction_type, payment_method) {
	var dataString = 'user_id=' + user_id + '&email=' + email + '&phone=' + phone + '&payment_reference=' + stack_pay_ref +
		'&amount=' + amount + '&firstname=' + firstname + '&surname=' + surname + '&is_matric_no=' + is_matric_no + '&matric_number=' + matric_number + '&level_id=' + level_id + '&gender_id=' + gender_id + '&course_of_study=' + course_of_study +
		'&programme_mode=' + programme_mode + '&password=' + password + '&session_id=' + session_id + '&academic_setting_id=' + academic_setting_id +
		'&payment_name=' + payment_name + '&payment_id=' + payment_id + '&wallet_id=' + wallet_id + '&charges=' + charges + '&transaction_type=' + transaction_type + '&payment_method=' + payment_method;
	$.ajax({
		type: "POST",
		url: endPoint + '/sign-up/auth/complete-sign-up',
		data: dataString,
		cache: false,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			if (success == true) {
				sessionStorage.setItem("page2DataSession", JSON.stringify(''));
				sessionStorage.setItem("page3DataSession", JSON.stringify(''));
				_getForm({ page: 'password_reset_successful', url: user_signup_local_url });
			} else {
				_actionAlert(message, false);
			}
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html(btn_text);
			document.getElementById("submit_btn").disabled = false;
		}
	});
}



function _fetchSettings() {
	let contactSession = JSON.parse(sessionStorage.getItem("contactSession"));

	if (contactSession) {
		const {
			current_academics_session,
			phone_number,
			whatsapp_number,
			email_address,
			instagram_link
		} = contactSession;
		_fetchSettingsData(current_academics_session, phone_number, email_address, whatsapp_number, instagram_link);
	} else {
		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/site/setting/fetch-contact',
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
				},
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success == true) {
						const data = info.data[0];
						sessionStorage.setItem("contactSession", JSON.stringify(data));
						const { current_academics_session, phone_number, whatsapp_number, email_address, instagram_link } = data;
						_fetchSettingsData(current_academics_session, phone_number, email_address, whatsapp_number, instagram_link);
					} else {
						_actionAlert(message, false);
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					_actionAlert('An error occurred while processing your request: Please try again', false);
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			_actionAlert('An error occurred while processing your request: ' + error, false);
		}
	}
}

function _fetchSettingsData(current_academics_session, phone_number, email_address, whatsapp_number, instagram_link) {
	$('#currentAcademicSession1').html(current_academics_session);

	$("#callUs1,#callUs2").attr('href', 'tel:' + phone_number);
	$('#textPhone1,#textPhone2,#textPhone3,#textPhone4').html(phone_number);

	$('#whatsAppUs1,#whatsAppUs2,#whatsAppUs3,#whatsAppUs4').attr('href', 'https://api.whatsapp.com/send?phone=' + whatsapp_number);
	$('#textWhatsApp1').html(whatsapp_number);

	$('#mailUs1,#mailUs2,#mailUs3,#mailUs4').attr('href', 'mailto:' + email_address);
	$('#textMailUs1,#textMailUs2').html(email_address);
	$('#instagram1,#instagram2,#instagram3,#instagram4').attr('href', instagram_link);

}
