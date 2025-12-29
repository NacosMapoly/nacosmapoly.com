function _logout() {
	sessionStorage.removeItem("staffLoginData");
	window.parent.location.href = "../";
}


$(document).ready(function () {
	window.setInterval(function () {
		getNotificationNumber();
	}, 180000);
});

///// Right Click Disabled Function ////////
function _disabledInspect() {
	// Disable right-click on the entire document
	document.addEventListener('contextmenu', function (e) {
		e.preventDefault();
	});

	// Disable Ctrl+S
	document.addEventListener('keydown', function (e) {
		if ((e.ctrlKey || e.metaKey) && e.key === 's') {
			e.preventDefault();
		}
	});
}

function _open_li(ids) {
	$('#' + ids + '-sub-li').toggle('slow');
}




function _toggleProfile(ids) {
	$("#" + ids).toggle("slow");
}

function _toggleContent(ids) {
	let element = $("#" + ids);
	// Toggle visibility
	element.toggle("slow", function () {
		// Save the state in localStorage
		localStorage.setItem(ids, element.is(":visible") ? "open" : "closed");
	});
}

function _toggleSession(ids) {
	// On page load, restore the state
	$(document).ready(function () {
		$("." + ids).each(function () {
			let id = $(this).attr("id");
			if (localStorage.getItem(id) === "open") {
				$(this).show(); // Keep it open
			} else {
				$(this).hide(); // Keep it closed
			}
		});
	});
}

function _collapse(div_id) {
	// Close other answers and reset icons
	$(".answer-div").not("#" + div_id + "answer").slideUp("slow");
	$(".expand-div").not("#" + div_id + "num").html('&nbsp;<i class="bi-plus"></i>&nbsp;');

	var $icon = $("#" + div_id + "num");
	var $answer = $("#" + div_id + "answer");

	if ($answer.is(":visible")) {
		$icon.html('&nbsp;<i class="bi-plus"></i>&nbsp;'); // Collapse
		$answer.slideUp("slow");
	} else {
		$icon.html('&nbsp;<i class="bi-dash"></i>&nbsp;'); // Expand
		$answer.slideDown("slow");
	}
}


function _sessionInputFormat(id) {
	$(document).ready(function () {
		$("#" + id).on("input", function () {
			let value = $(this).val().replace(/\D/g, ""); // Remove non-numeric characters
			if (value.length > 8) value = value.slice(0, 8); // Max 8 digits

			let formatted = value.length > 4 ? value.substring(0, 4) + " / " + value.substring(4, 8) : value;

			$(this).val(formatted);
		});
	});
}


function select_search() {
	$(".srch-select").toggle("fast");
}

function srch_custom(text) {
	$('#srch-text').html(text);
	$('.custom-srch-div').fadeIn(500);
};

function _next_page(next_id, icon, divid) {
	$("#account_settings_id, #academic_session_detail, #account_detail, #channge_password, #contact_detail").hide(); // hide all pages
	$("#" + next_id).fadeIn(500);
	$("#panel-title").html($("#" + icon).html() + $("#" + divid).html());
}
function _prev_page(next_id) {
	$("#account_settings_id, #academic_session_detail, #account_detail, #channge_password, #contact_detail").hide(); // hide all pages
	$("#" + next_id).fadeIn(500);
	$("#panel-title").html('<i class="bi-gear"></i> <span id="app_text">APP SETTINGS</span>');
}


function _show_password_visibility(ids, toggle_pass) {
	const password = $('#' + ids).val();
	if (password != '') {
		$('#' + toggle_pass).show();
	} else {
		$('#' + toggle_pass).hide();
	}
}



function capitalizeFirstLetterOfEachWord(inputText) {
	// Split the input text into an array of words
	const words = inputText.toLowerCase().split(' ');
	// Capitalize the first letter of each word
	for (let i = 0; i < words.length; i++) {
		words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
	}
	// Join the words back into a sentence
	const result = words.join(' ');
	return result;
}

function _togglePasswordVisibility(ids, toggle_pass) {
	const passwordInput = document.getElementById(ids);
	const togglePasswordIcon = document.getElementById(toggle_pass);

	if (passwordInput.type === 'password') {
		passwordInput.type = 'text';
		togglePasswordIcon.innerHTML = '<i class="bi-eye password-toggle"></i>';
	} else {
		passwordInput.type = 'password';
		togglePasswordIcon.innerHTML = '<i class="bi-eye-slash password-toggle"></i>';
	}
}

function isNumber_Check(e) {
	var key = e.keyCode || e.which;

	if (!((key >= 48 && key <= 57))) {
		if (e.preventDefault) {
			e.preventDefault();
		} else {
			e.returnValue = false;
		}
	}
}


function _alert_close() {
	let text = '';
	text +=
		'<div class="alert-loading-div">' +
		'<div class="icon"><img src="' + website_url + '/all-images/images/loading.gif" width="20px" alt="Loading"/></div>' +
		'<div class="text"><p>LOADING...</p></div>' +
		'</div>';
	$('#get-more-div').html(text).fadeOut(200);
}

function _alert_secondary_close() {
	let text = '';
	text +=
		'<div class="alert-loading-div">' +
		'<div class="icon"><img src="' + website_url + '/all-images/images/loading.gif" width="20px" alt="Loading"/></div>' +
		'<div class="text"><p>LOADING...</p></div>' +
		'</div>';
	$('#get-more-div-secondary').html(text).fadeOut(200);
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
	$('.all-alert-back-div').html(text).fadeIn(500).delay(3000).fadeOut(100);
}

function _get_active_link(divid) {
	$("#side-dashboard, #side-staff, #side-excos, #side-event, #side-past, #side-courses, #side-gallery, #side-blog, #side-faq, #side-test").removeClass("active-li");
	$('#side-' + divid).addClass('active-li');
	$("#page-title").html($("#_" + divid).html());
}

function _get_page(page, divid) {

	_get_active_link(divid);
	$("#page-content").html('<div class="ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");
	const action = "get_page";
	const dataString = "action=" + action + "&page=" + page;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#page-content").html(html);
			let academicsSessionData = JSON.parse(sessionStorage.getItem("academicsSessionData"));
			$('#academic_year_session').html(academicsSessionData.session);
			if (page == 'dashboard') {
				handleAdminClick();
			}
		},
	});
}

$(document).ready(function () {
	_get_page('dashboard', 'dashboard');
});



function _getPDF() {
	$(function () {
		var $pdfDisplay = $('#pdf_display');
		var $pdfInput = $('#material');
		var $fileList = $('#file-list');
		var $pdfEmbed = $('#pdfFile');

		function showPdf(file) {
			if (file && file.type === "application/pdf") {
				var fileUrl = URL.createObjectURL(file);
				$pdfEmbed.show().attr('src', fileUrl);
				$pdfDisplay.find('.background-text').hide();

				var sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
				$fileList.text('File size: ' + sizeInMB + ' MB');
			} else {
				$fileList.text('Please upload a valid PDF file.');
			}
		}

		// When file is selected
		$pdfInput.on('change', function () {
			showPdf(this.files[0]);
		});

		// Drag and Drop support
		$pdfDisplay.on('dragover', function (e) {
			e.preventDefault();
			$pdfDisplay.addClass('drag-over');
		});

		$pdfDisplay.on('dragleave', function () {
			$pdfDisplay.removeClass('drag-over');
		});

		$pdfDisplay.on('drop', function (e) {
			e.preventDefault();
			$pdfDisplay.removeClass('drag-over');
			var file = e.originalEvent.dataTransfer.files[0];
			if (file) {
				$pdfInput[0].files = e.originalEvent.dataTransfer.files;
				showPdf(file);
			}
		});

		// Optional: allow clicking on the image to trigger file input
		$pdfDisplay.on('click', function () {
			$pdfInput.click();
		});
	});
}





function _get_form(page) {
	$("#get-more-div").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_form";
	const dataString = "action=" + action + "&page=" + page;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div").html(html);
			if (page == 'app_settings') {
				_fetchAcademicsSession();
				_fetchSettings();
			}
		},
	});
}

function _get_form_with_id(page, ids) {
	$("#get-more-div").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_form_with_id";
	const dataString = "action=" + action + "&page=" + page + "&ids=" + ids;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div").html(html);
			if (page == 'executive_profile') {
				sessionStorage.setItem("excoIdSession", JSON.stringify(ids));
				_getExcoProfile();
				_uploadExcoPix_();
			} else if (page == 'update_course_content') {
				sessionStorage.setItem("getPublishId", JSON.stringify(ids));
				_fetchEachCourses(ids);
			} else if (page == 'update_past_question') {
				sessionStorage.setItem("getPastQuestionIDSession", JSON.stringify(ids));
				_fetchEachPastQuestion(ids);
			}
		},
	});
}


function _get_pages_form_with_id(page, page_category_id, publish_id) {
	$("#get-more-div").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_form_with_id";
	const dataString = "action=" + action + "&page=" + page + "&page_category_id=" + page_category_id + "&publish_id=" + publish_id;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div").html(html);
		},
	});
}

function _get_secondary_form_with_id(page, ids) {
	$("#get-more-div-secondary").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_secondary_form_with_id";
	const dataString = "action=" + action + "&page=" + page + "&ids=" + ids;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div-secondary").html(html);
		},
	});
}

function _get_video_secondary_form_with_id(page, publish_id, video_id) {
	$("#get-more-div-secondary").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_secondary_form_with_id";
	const dataString = "action=" + action + "&page=" + page + "&publish_id=" + publish_id + "&video_id=" + video_id;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div-secondary").html(html);
		},
	});
}

function _get_material_secondary_form_with_id(page, publish_id, material_id) {
	$("#get-more-div-secondary").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_secondary_form_with_id";
	const dataString = "action=" + action + "&page=" + page + "&publish_id=" + publish_id + "&material_id=" + material_id;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div-secondary").html(html);
		},
	});
}

function _get_audio_secondary_form_with_id(page, publish_id, audio_id) {
	$("#get-more-div-secondary").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = "get_secondary_form_with_id";
	const dataString = "action=" + action + "&page=" + page + "&publish_id=" + publish_id + "&audio_id=" + audio_id;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$("#get-more-div-secondary").html(html);
		},
	});
}
//////////////////////////////////End OF Paramount Scripts////////////////////////////////////////////////////////////////////////

function handleAdminClick() {
	if (login_role_id > 1) {
		let adminText =
			'<div class="statistics-div" onClick="_get_page(' + "'view_staff'" + "," + "'staff'" + ')" id="staff">' +
			'<div class="inner-div">' +
			'<div class="number-div">' +
			'Administrator' +
			'<span id="total_active_staff_count">0</span>' +
			'</div>' +
			'<div class="icon"><i class="bi-people"></i></div>' +
			'</div>' +
			'</div>';
		$('#adminstrator_link').html(adminText);
	}
}

function _sideAdminCheck(containerId) {
	if (login_role_id > 3) {
		if (containerId == 'adminCheck') {
			document.write(`
		 <div class="nav-div" title="Staff" onClick="_get_page('view_staff', 'staff')" id="side-staff">
			<div class="icon"><i class="bi-people"></i></div>
			<div class="txt-hidden">Admin</div>
			<div class="hidden" id="_staff"><i class="bi-people"></i> All Active Administrators</div>
		</div>
	  `);
	  return;
		}
	}
}

function _adminAccountCheck(containerId) {
	if (login_role_id > 3) {
		// ACCOUNT BLOCK
		if (containerId === 'adminAccountCheck') {
			$('#' + containerId).html(`
				<div class="settings-div" onclick="_next_page('account_detail','back_icon','account');">
					<div class="div-in">
						<div class="text-container">
							<div class="icon-div">
								<i class="bi-bank"></i>
							</div>
							<div class="text-div">
								<h4 id="account">ACCOUNT DETAILS</h4>
								<span>Manage your account information</span>
							</div>
						</div>
						<div class="right-icon-div">
							<i class="bi-chevron-right"></i>
						</div>
					</div>
				</div>
			`);
			return;
		}
	}
}

function _get_active_modal_link(menu_id) {
	$('#page_content, #video_page, #audio_page, #material_page, #picture_page').removeClass('active-li');
	$('#' + menu_id).addClass('active-li');
}


function _check_page_content(menu_id, page, publish_id) {
	_get_active_modal_link(menu_id);
	$('#get_pages_details').html('<div class="ajax-loader other-pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("slow");
	const action = 'get_pages_details';
	const dataString = 'action=' + action + '&page=' + page + '&publish_id=' + publish_id;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) {
			$('#get_pages_details').html(html);
		}
	});
}


function _edit_page(page_category_id, publish_id) {
	$("#get-more-div").css({ 'display': 'flex', 'justify-content': 'center', 'align-items': 'center' }).fadeIn(500);
	const action = 'get_edit_page_form';
	const dataString = 'action=' + action + '&page_category_id=' + page_category_id + '&publish_id=' + publish_id;
	$.ajax({
		type: "POST",
		url: admin_local_portal_url,
		data: dataString,
		cache: false,
		success: function (html) { $('#get-more-div').html(html); }
	});
}






function _upload_pix_() {
	$(function () {
		Staff = {
			UpdatePreview: function (obj) {
				if (!window.FileReader) {
					// Handle browsers that don't support FileReader
					console.error("FileReader is not supported.");
				} else {
					_uploadProfilepix(login_staff_id);
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#passportimg1,#passportimg2').prop("src", e.target.result);
					};

					reader.readAsDataURL(obj.files[0]);
				}
			},
		};
	});
}



function _uploadStaffPix_(staff_id) {
	$(function () {
		Staffs = {
			UpdatePreview: function (obj) {
				if (!window.FileReader) {
					// Handle browsers that don't support FileReader
					console.error("FileReader is not supported.");
				} else {
					_uploadStaffProfilepix(staff_id);
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#passportimg4').prop("src", e.target.result);
					};

					reader.readAsDataURL(obj.files[0]);
				}
			},
		};
	});
}




$(function () {
	eventPixPreview = {
		UpdatePreview: function (obj) {
			if (!window.FileReader) {
				// Handle browsers that don't support FileReader
				console.error("FileReader is not supported.");
			} else {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#event_preview_pix').prop("src", e.target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		},
	};
});

$(function () {
	examPixPreview = {
		UpdatePreview: function (obj) {
			if (!window.FileReader) {
				// Handle browsers that don't support FileReader
				console.error("FileReader is not supported.");
			} else {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#exam_preview_pix').prop("src", e.target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		},
	};
});



$(function () {
	galleyPixPreview = {
		UpdatePreview: function (obj) {
			if (!window.FileReader) {
				// Handle browsers that don't support FileReader
				console.error("FileReader is not supported.");
			} else {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#gallery_preview_pix').prop("src", e.target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		},
	};
});


$(function () {
	blogPixPreview = {
		UpdatePreview: function (obj) {
			if (!window.FileReader) {
				// Handle browsers that don't support FileReader
				console.error("FileReader is not supported.");
			} else {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blog_preview_pix').prop("src", e.target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		},
	};
});


$(function () {
	coursePixPreview = {
		UpdatePreview: function (obj) {
			if (!window.FileReader) {
				// Handle browsers that don't support FileReader
				console.error("FileReader is not supported.");
			} else {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#course_preview_pix').prop("src", e.target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		},
	};
});

$(function () {
	seoFlyer = {
		UpdatePreview: function (obj) {
			if (!window.FileReader) {
				// Handle browsers that don't support FileReader
				console.error("FileReader is not supported.");
			} else {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#seo_flyer_preview_pix').prop("src", e.target.result);
				};
				reader.readAsDataURL(obj.files[0]);
			}
		},
	};
});



function formatSessionDate(inputDate) {
	const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

	let [year, month, day] = inputDate.split("-");
	month = months[parseInt(month) - 1]; // Convert month number to name

	// Add suffix (st, nd, rd, th) to day
	let dayInt = parseInt(day);
	let suffix = "th";
	if (dayInt === 1 || dayInt === 21 || dayInt === 31) suffix = "st";
	else if (dayInt === 2 || dayInt === 22) suffix = "nd";
	else if (dayInt === 3 || dayInt === 23) suffix = "rd";

	return `${dayInt}${suffix} ${month}, ${year}`;
}


function _uploadProfilepix() {
	const passport_pix_input = $('#profile_pix')[0];
	const passport_pix_file = passport_pix_input.files[0];

	const form_data = new FormData();
	form_data.append('staff_id', login_staff_id);
	form_data.append('profile_pix', passport_pix_file);
	form_data.append('profile_pix', profile_pix);

	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/staff/update-staff-picture',
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			processData: false,
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					_actionAlert(message, true);
				} else {
					_actionAlert(message, false);
				}
			},
			error: function (error) {
				_actionAlert('An error occurred while processing your request: Please try Again Later', false);
			}
		});
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
	}
}

function _uploadStaffProfilepix(staff_id) {
	const passport_pix_input = $('#profile_pix')[0];
	const passport_pix_file = passport_pix_input.files[0];

	const form_data = new FormData();
	form_data.append('staff_id', staff_id);
	form_data.append('profile_pix', passport_pix_file);
	form_data.append('profile_pix', profile_pix);

	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/staff/update-staff-picture',
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			processData: false,
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					_actionAlert(message, true);
					_get_page('view_staff', 'staff');
				} else {
					_actionAlert(message, false);
				}
			},
			error: function (error) {
				_actionAlert('An error occurred while processing your request: Please try Again Later', false);
			}
		});
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
	}
}






function _fetchLoginUser() {
	const fullname = staffLoginData.staff[0].fullname;
	const last_login_time = staffLoginData.staff[0].last_login_time;
	const status_id = staffLoginData.staff[0].status_id;
	const status_name = staffLoginData.staff[0].status_name;
	const staff_id = staffLoginData.staff[0].staff_id;
	const role_id = staffLoginData.staff[0].role_id;
	const role_name = staffLoginData.staff[0].role_name;
	const phone = staffLoginData.staff[0].phone;
	const email = staffLoginData.staff[0].email;
	const address = staffLoginData.staff[0].address;
	const position_id = staffLoginData.staff[0].position_id;
	const position_name = staffLoginData.staff[0].position_name;
	const documentStoragePath = staffLoginData.staff[0].documentStoragePath;
	const profile_pix = staffLoginData.staff[0].profile_pix;
	const created_time = staffLoginData.staff[0].created_time;

	$("#login_fullname,#header_fullname,#pro_header_fullname,#login_user_fullname").html(capitalizeFirstLetterOfEachWord(fullname));
	$('#login_user_last_time').html(last_login_time);
	$('#login_user_status_name').html(status_name);
	$("#pro_header_staff_id").html(staff_id);
	$("#login_role_name").html(role_name);
	$("#pro_header_phone").html(phone);

	$('#current_user_passport2').html('<img id="passportimg1" src="' + documentStoragePath + "/" + profile_pix + '"/>');
	$('#updt_fullname').val(fullname);
	$('#updt_mobile').val(phone);
	$('#updt_email').val(email);
	$('#updt_address').val(address);
	$('#updt_position').append('<option value="' + position_id + '" selected="selected">' + position_name + "</option>");
	$('#updt_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
	$('#updt_role_id').append('<option value="' + role_id + '" selected="selected">' + role_name + "</option>");
	$('#s_staff_id').val(staff_id);
	$('#s_created_time').val(created_time);
	$('#s_last_login').val(last_login_time);
	_getHeaderPix(documentStoragePath, profile_pix);

	_toggleSession('academics-session-chart');
	handleAdminClick();
}

function _getHeaderPix(documentStoragePath, profile_pix) {
	header_pix = '<img id="passportimg2" src="' + documentStoragePath + "/" + profile_pix + '" />';
	$("#header_pix,#toggle_header_pix").html(header_pix);
}


function _fetchAcademicsSession() {
	let academicsSessionData = JSON.parse(sessionStorage.getItem("academicsSessionData"));

	$('#current_academics_session').html(academicsSessionData.session);
	$('#current_session_start_date').html(formatSessionDate(academicsSessionData.session_start_date));
	$('#current_session_end_date').html(formatSessionDate(academicsSessionData.session_end_date));
	$('#current_semester').html(academicsSessionData.semester_id + "" + '<sup>' + academicsSessionData.tittle + '</sup>');

	$('#session').val(academicsSessionData.session);
	$('#session_start_date').val(academicsSessionData.session_start_date);
	$('#session_end_date').val(academicsSessionData.session_end_date);
	$('#semester_id').append('<option value="' + academicsSessionData.semester_id + '" selected="selected">' + academicsSessionData.semester_name + "</option>");
}



function _getSelectStataus(select_id, status_id) {
	const dataString = "status_id=" + status_id;
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/status',
		data: dataString,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const status_id = fetch[i].status_id;
					const status_name = fetch[i].status_name;
					$('#' + select_id).append('<option value="' + status_id + '">' + status_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
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

function _getPageSelectStataus(select_id, status_id) {
	const dataString = "status_id=" + status_id;
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/status',
		data: dataString,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const status_name = fetch[i].status_name;
					$('#' + select_id).append('<option value="' + status_name + '">' + status_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}




function _getSelectPosition(select_id) {
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/position',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const position_id = fetch[i].position_id;
					const position_name = fetch[i].position_name;
					$('#' + select_id).append('<option value="' + position_id + '">' + position_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}



function _getSelectRole(select_id) {
	var dataString = "login_role_id=" + login_role_id;
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/role',
		data: dataString,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const role_id = fetch[i].role_id;
					const role_name = fetch[i].role_name;
					$('#' + select_id).append('<option value="' + role_id + '">' + role_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}


function _getSelectPost(select_id) {
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/post',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const post_id = fetch[i].post_id;
					const post_name = fetch[i].post_name;
					$('#' + select_id).append('<option value="' + post_id + '">' + post_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}



function _getSelectLevel(select_id, level_id) {
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
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const level_id = fetch[i].level_id;
					const level_name = fetch[i].level_name;
					$('#' + select_id).append('<option value="' + level_id + '">' + level_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}




function _getSelectSession(select_id) {
	let academicsSessionData = JSON.parse(sessionStorage.getItem("academicsSessionData"));
	const academics_session = academicsSessionData.session;

	$.ajax({
		type: "POST",
		url: endPoint + '/admin/settings/fetch-academics-years',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
			'Authorization': 'Bearer ' + login_access_key
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const session = fetch[i].session;
					if (academics_session == session) {
						$('#' + select_id).append('<option value="' + session + '" selected="selected">' + session + '</option>');
					} else {
						$('#' + select_id).append('<option value="' + session + '">' + session + '</option>');
					}
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}

function _getSelectSemester(select_id) {
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-semester',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const semester_id = fetch[i].semester_id;
					const semester_name = fetch[i].semester_name;
					$('#' + select_id).append('<option value="' + semester_id + '">' + semester_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}




function _getSelectCategory(action) {
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/' + action,
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const cat_id = fetch[i].cat_id;
					const cat_name = fetch[i].cat_name;
					$('#cat_id').append('<option value="' + cat_id + '">' + cat_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}




function _getSelectTimeOption(select_id, option_id) {
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-time-option',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const time_option_id = fetch[i].time_option_id;
					const time_option_name = fetch[i].time_option_name;
					if (time_option_id == option_id) {
						$('#' + select_id).append('<option value="' + time_option_id + '" selected="selected">' + time_option_name + '</option>');
					} else {
						$('#' + select_id).append('<option value="' + time_option_id + '">' + time_option_name + '</option>');
					}
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}

function _fetchAllStaff() {
	const search_keywords = $('#search_keywords').val();
	const status_id = $('#status_id').val();
	$('#fetchAllStaff').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/staff/fetch-staff',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'staff_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW ADMIN</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const staff_id = fetch[i].staff_id;
								const position_name = fetch[i].position_name;
								const fullname = fetch[i].fullname;
								const phone = fetch[i].phone;
								const status_name = fetch[i].status_name;
								const role_name = fetch[i].role_name;
								const profile_pix = fetch[i].profile_pix;
								const documentStoragePath = fetch[i].documentStoragePath;

								text +=
									'<div class="user-div animated fadeIn" title="CLICK TO VIEW ' + fullname + ' PROFILE" onclick="_get_form_with_id(\'staff_profile\', \'' + staff_id + '\')")>' +
									'<div class="pix-div"><img src="' + documentStoragePath + "/" + profile_pix + '"/></div>' +
									'<div class="detail">' +
									'<div class="name-div"><div class="name">' + fullname + '</div><hr /><br/></div>' +
									'<div class="text"><span>' + position_name + '</span></div>' +
									'<div class="text"><span>' + phone + '</span></div>' +
									'<div class="text"><span>' + role_name + '</span></div>' +
									'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllStaff').html(text);
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllStaff').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllStaff').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}


function _addStaff() {
	try {
		const fullname = $('#fullname').val();
		const email = $('#email').val();
		const phone = $('#phone').val();
		const position_id = $('#position_id').val();
		const role_id = $('#role_id').val();
		const status_id = $('#status_id').val();

		$('#fullname, #email, #phone, #position, #role_id, #status_id').removeClass('issue');

		if (!fullname) {
			$('#fullname').addClass('issue');
			_actionAlert('Provide fullname to continue', false);
			return;
		}

		if (!email || $('#email').val().indexOf("@") <= 0) {
			$('#email').addClass("issue");
			_actionAlert('Provide valid email address to continue', false);
			return;
		}

		if (!phone) {
			$('#phone').addClass("issue");
			_actionAlert('Provide mobile number to continue', false);
			return;
		}

		if (!position_id) {
			$('#position').addClass("issue");
			_actionAlert('Select Position to continue', false);
			return;
		}

		if (!role_id) {
			$('#role_id').addClass("issue");
			_actionAlert('Select role to continue', false);
			return;
		}

		if (!status_id) {
			$('#status_id').addClass("issue");
			_actionAlert('Select status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("fullname", fullname);
			form_data.append("phone", phone);
			form_data.append("email", email);
			form_data.append("position_id", position_id);
			form_data.append("role_id", role_id);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/staff/add-staff',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('view_staff', 'staff');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}





function _getStaffProfile(staff_id) {
	const dataString = "staff_id=" + staff_id;
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/staff/fetch-staff',
			data: dataString,
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					const data = info.data[0];
					const staff_id = data.staff_id;
					const fullname = data.fullname;
					const phone = data.phone;
					const email = data.email;
					const address = data.address;
					const position_id = data.position_id;
					const position_name = data.position_name;
					const profile_pix = data.profile_pix;
					const role_id = data.role_id;
					const role_name = data.role_name;
					const status_id = data.status_id;
					const status_name = data.status_name;
					const created_time = data.created_time;
					const last_login_time = data.last_login_time;
					const documentStoragePath = data.documentStoragePath;

					$('#staff_login_fullname').html(fullname);
					$('#last_login_time').html(last_login_time);
					$('#staff_status_name').html(status_name);
					$('#current_user_passport1').html('<img id="passportimg4" src="' + documentStoragePath + "/" + profile_pix + '"/>');

					$('#updt_fullname').val(fullname);
					$('#updt_mobile').val(phone);
					$('#updt_email').val(email);
					$('#updt_address').val(address);
					$('#updt_position').append('<option value="' + position_id + '" selected="selected">' + position_name + "</option>");
					$('#updt_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
					$('#updt_role_id').append('<option value="' + role_id + '" selected="selected">' + role_name + "</option>");
					$('#s_staff_id').val(staff_id);
					$('#s_created_time').val(created_time);
					$('#s_last_login').val(last_login_time);
				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						_actionAlert(message, false);
					}
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


function _updateLoginStaff() {
	try {
		const fullname = $('#updt_fullname').val();
		const email = $('#updt_email').val();
		const phone = $('#updt_mobile').val();
		const position_id = $('#updt_position').val();
		const role_id = $('#updt_role_id').val();
		const status_id = $('#updt_status_id').val();

		$('#updt_fullname, #updt_email, #updt_mobile, #updt_position, #updt_role_id, #updt_status_id').removeClass('issue');

		if (!fullname) {
			$('#updt_fullname').addClass('issue');
			_actionAlert('Provide fullname to continue', false);
			return;
		}

		if (!email || $('#updt_email').val().indexOf("@") <= 0) {
			$('#updt_email').addClass("issue");
			_actionAlert('Provide valid email address to continue', false);
			return;
		}

		if (!phone) {
			$('#updt_mobile').addClass("issue");
			_actionAlert('Provide mobile number to continue', false);
			return;
		}

		if (!position_id) {
			$('#updt_position').addClass("issue");
			_actionAlert('Select Position to continue', false);
			return;
		}

		if (!role_id) {
			$('#updt_role_id').addClass("issue");
			_actionAlert('Select role to continue', false);
			return;
		}

		if (!status_id) {
			$('#updt_status_id').addClass("issue");
			_actionAlert('Select status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("staff_id", login_staff_id);
			form_data.append("fullname", fullname);
			form_data.append("phone", phone);
			form_data.append("email", email);
			form_data.append("position_id", position_id);
			form_data.append("role_id", role_id);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/staff/update-staff',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_get_form_with_id('my_profile', login_staff_id);
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					_actionAlert('An error occurred while processing your request: Please try again', false);
					$("#update_btn").html(btn_text).prop("disabled", false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		$("#update_btn").html(btn_text).prop("disabled", false);
	}
}




function _updateStaff(staff_id) {
	try {
		const fullname = $('#updt_fullname').val();
		const email = $('#updt_email').val();
		const phone = $('#updt_mobile').val();
		const position_id = $('#updt_position').val();
		const role_id = $('#updt_role_id').val();
		const status_id = $('#updt_status_id').val();

		$('#updt_fullname, #updt_email, #updt_mobile, #updt_position, #updt_role_id, #updt_status_id').removeClass('issue');

		if (!fullname) {
			$('#updt_fullname').addClass('issue');
			_actionAlert('Provide fullname to continue', false);
			return;
		}

		if (!email || $('#updt_email').val().indexOf("@") <= 0) {
			$('#updt_email').addClass("issue");
			_actionAlert('Provide valid email address to continue', false);
			return;
		}

		if (!phone) {
			$('#updt_mobile').addClass("issue");
			_actionAlert('Provide mobile number to continue', false);
			return;
		}


		if (!position_id) {
			$('#updt_position').addClass("issue");
			_actionAlert('Select Position to continue', false);
			return;
		}

		if (!role_id) {
			$('#updt_role_id').addClass("issue");
			_actionAlert('Select role to continue', false);
			return;
		}

		if (!status_id) {
			$('#updt_status_id').addClass("issue");
			_actionAlert('Select status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("staff_id", staff_id);
			form_data.append("fullname", fullname);
			form_data.append("phone", phone);
			form_data.append("email", email);
			form_data.append("position_id", position_id);
			form_data.append("role_id", role_id);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/staff/update-staff',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_get_page('view_staff', 'staff');
						_get_form_with_id('staff_profile', staff_id);
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					_actionAlert('An error occurred while processing your request: Please try again', false);
					$("#update_btn").html(btn_text).prop("disabled", false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		$("#update_btn").html(btn_text).prop("disabled", false);
	}
}



//// START EXCO FUNCTION ////////////////

function _addExco() {
	try {
		const academics_session = $('#academics_session').val();
		const matric_no = $('#matric_no').val();
		const surname = $('#surname').val();
		const firstname = $('#firstname').val();
		const nickname = $('#nickname').val();
		const email = $('#email').val();
		const phone = $('#phone').val();
		const level_id = $('#level_id').val();
		const course_study_id = $('#course_study_id').val();
		const post_id = $('#post_id').val();
		const status_id = $('#status_id').val();

		$('#matric_no, #academics_session, #surname, #firstname, #email, #phone, #level_id, #course_study_id, #post_id, #status_id').removeClass('issue');

		if (!academics_session) {
			$('#academics_session').addClass('issue');
			_actionAlert('Provide academic session to continue', false);
			return;
		}
		if (!matric_no) {
			$('#matric_no').addClass('issue');
			_actionAlert('Provide matric no to continue', false);
			return;
		}
		if (!surname) {
			$('#surname').addClass('issue');
			_actionAlert('Provide surname to continue', false);
			return;
		}
		if (!firstname) {
			$('#firstname').addClass('issue');
			_actionAlert('Provide first name to continue', false);
			return;
		}
		if (!email || $('#email').val().indexOf("@") <= 0) {
			$('#email').addClass("issue");
			_actionAlert('Provide valid email address to continue', false);
			return;
		}
		if (!phone) {
			$('#phone').addClass("issue");
			_actionAlert('Provide phone number to continue', false);
			return;
		}
		if (!level_id) {
			$('#level_id').addClass("issue");
			_actionAlert('Select Level to continue', false);
			return;
		}
		if (level_id > 2) {
			if (!course_study_id) {
				$('#course_study_id').addClass("issue");
				_actionAlert('Select Course of Study to continue', false);
				return;
			}
		}

		if (!post_id) {
			$('#post_id').addClass("issue");
			_actionAlert('Select post to continue', false);
			return;
		}
		if (!status_id) {
			$('#status_id').addClass("issue");
			_actionAlert('Select status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("academics_session", academics_session);
			form_data.append("matric_no", matric_no);
			form_data.append("surname", surname);
			form_data.append("firstname", firstname);
			form_data.append("nickname", nickname);
			form_data.append("email", email);
			form_data.append("phone", phone);
			form_data.append("level_id", level_id);
			form_data.append("course_study_id", course_study_id);
			form_data.append("post_id", post_id);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/exco/add-executive',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('view_excos', 'excos');
					} else {
						const target = info.email ? '#email' : '#matric_no';
						$(target).addClass("issue");
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}


function _fetchAllExcos() {
	let academicsSessionData = JSON.parse(sessionStorage.getItem("academicsSessionData"));
	const academics_session = $('#academics_session').val() || academicsSessionData.session;
	const status_id = $('#status_id').val();
	const search_keywords = $('#search_keywords').val();
	$('#academic_year_session').html(academics_session);

	$('#fetchAllExcos').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'academics_session=' + academics_session + '&status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/exco/fetch-all-executives',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.usersData;
					const success = info.success;
					const message = info.message;
					const documentStoragePath = info.documentStoragePath;
					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'excos_reg'" + ')"><i class="bi-person-plus"></i> ADD NEW EXECUTIVE</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const exco_id = fetch[i].exco_id;
								const surname = fetch[i].surname;
								const firstname = fetch[i].firstname;
								const fullname = surname + ' ' + firstname;
								const phone = fetch[i].phone;
								const post_name = fetch[i].post_name;
								const level_name = fetch[i].level_name;
								const course_study_id = fetch[i].course_study_id ?? '';
								const status_name = fetch[i].status_name;
								const profile_pix = fetch[i].profile_pix;


								text +=
									'<div class="user-div animated fadeIn" title="CLICK TO VIEW ' + fullname + ' PROFILE" onclick="_get_form_with_id(\'executive_profile\', \'' + exco_id + '\')")>' +
									'<div class="pix-div"><img src="' + documentStoragePath + "/" + profile_pix + '"/></div>' +
									'<div class="detail">' +
									'<div class="name-div"><div class="name">' + fullname + '</div><hr /><br/></div>' +
									'<div class="text"><span>' + post_name + '</span></div>' +
									'<div class="text"><span>' + level_name + ' - ' + course_study_id + '</span></div>' +
									'<div class="text"><span>' + phone + '</span></div>' +
									'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllExcos').html(text);
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllExcos').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllExcos').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}


function _getExcoProfile() {
	let exco_id = JSON.parse(sessionStorage.getItem("excoIdSession"));

	const dataString = "exco_id=" + exco_id;
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/exco/fetch-executive-profile',
			data: dataString,
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const success = info.success;
				const documentStoragePath = info.documentStoragePath;

				if (success == true) {
					const {
						matric_no = '',
						surname = '',
						firstname = '',
						nickname = '',
						phone = '',
						email = '',
						level_id = '',
						level_name = '',
						post_id = '',
						post_name = '',
						profile_pix = '',
						academics_session = '',
						status_id = '',
						status_name = '',
						created_at = '',
						updated_at = '',
						course_study_id = '',
						course_study_title = ''
					} = info.userData;
					const fullname = `${surname} ${firstname}`;
					// Fields that may be empty

					$('#exco_fullname').html(nickname ? fullname + ' (' + capitalizeFirstLetterOfEachWord(nickname) + ')' : fullname);
					$('#last_updated_at').html(updated_at);
					$('#exco_status_name').html(status_name);
					$('#excoPassportImg').html('<img id="excoPassport" src="' + documentStoragePath + "/" + profile_pix + '"/>');

					$('#updt_surname').val(surname);
					$('#updt_firstname').val(firstname);
					$('#updt_nickname').val(nickname);
					$('#updt_mobile').val(phone);
					$('#updt_email').val(email);
					$('#updt_level_id').append('<option value="' + level_id + '" selected="selected">' + level_name + "</option>");
					course_study_id &&
						$('#updt_course_study_id').append(
							`<option value="${course_study_id}" selected>${course_study_title}</option>`
						);
					$('#updt_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
					$('#updt_post_id').append('<option value="' + post_id + '" selected="selected">' + post_name + "</option>");
					$('#updt_matric_no').val(matric_no);
					$('#updt_academics_session').val(academics_session);
					$('#updt_matric_no').val(matric_no);
					$('#exco_created_at').val(created_at);
				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						//_actionAlert(message, false);
					}
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


function _uploadExcoPix_() {
	let exco_id = JSON.parse(sessionStorage.getItem("excoIdSession"));
	$(function () {
		Exco = {
			UpdatePreview: function (obj) {
				if (!window.FileReader) {
					// Handle browsers that don't support FileReader
					console.error("FileReader is not supported.");
				} else {
					_uploadExcoProfilepix(exco_id);
					var reader = new FileReader();
					var target = null;

					reader.onload = function (e) {
						target = e.target || e.srcElement;
						$('#excoPassport').prop("src", target.result);
					};

					reader.readAsDataURL(obj.files[0]);
				}
			},
		};
	});
}



function _uploadExcoProfilepix(exco_id) {
	const passport_pix_input = $('#profile_pix')[0];
	const passport_pix_file = passport_pix_input.files[0];

	const form_data = new FormData();
	form_data.append('exco_id', exco_id);
	form_data.append('profile_pix', passport_pix_file);
	form_data.append('profile_pix', profile_pix);

	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/exco/update-executive-picture',
			data: form_data,
			dataType: "json",
			contentType: false,
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			processData: false,
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					_actionAlert(message, true);
					_get_page('view_excos', 'excos');
				} else {
					_actionAlert(message, false);
				}
			},
			error: function (error) {
				_actionAlert('An error occurred while processing your request: Please try Again Later', false);
			}
		});
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
	}
}


function _updateExco() {
	try {
		const exco_id = JSON.parse(sessionStorage.getItem("excoIdSession"));
		const surname = $('#updt_surname').val();
		const firstname = $('#updt_firstname').val();
		const nickname = $('#updt_nickname').val();
		const email = $('#updt_email').val();
		const phone = $('#updt_mobile').val();
		const level_id = $('#updt_level_id').val();
		const course_study_id = $('#updt_course_study_id').val();
		const academics_session = $('#updt_academics_session').val();
		const matric_no = $('#updt_matric_no').val();
		const post_id = $('#updt_post_id').val();
		const status_id = $('#updt_status_id').val();

		$('#updt_surname, #updt_firstname, #updt_email, #updt_mobile, #updt_level_id, #updt_matric_no, #updt_post_id, #updt_status_id,#updt_academics_session').removeClass('issue');


		if (!surname) {
			$('#updt_surname').addClass('issue');
			_actionAlert('Provide surname to continue', false);
			return;
		}
		if (!firstname) {
			$('#updt_firstname').addClass('issue');
			_actionAlert('Provide first name to continue', false);
			return;
		}
		if (!email || $('#updt_email').val().indexOf("@") <= 0) {
			$('#updt_email').addClass("issue");
			_actionAlert('Provide valid email address to continue', false);
			return;
		}
		if (!phone) {
			$('#updt_mobile').addClass("issue");
			_actionAlert('Provide phone number to continue', false);
			return;
		}
		if (!level_id) {
			$('#updt_level_id').addClass("issue");
			_actionAlert('Select Level to continue', false);
			return;
		}
		if (!matric_no) {
			$('#updt_matric_no').addClass('issue');
			_actionAlert('Provide matric no to continue', false);
			return;
		}
		if (!academics_session) {
			$('#updt_academics_session').addClass('issue');
			_actionAlert('Provide academics session to continue', false);
			return;
		}
		if (!post_id) {
			$('#updt_post_id').addClass("issue");
			_actionAlert('Select post to continue', false);
			return;
		}
		if (!status_id) {
			$('#updt_status_id').addClass("issue");
			_actionAlert('Select status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("exco_id", exco_id);
			form_data.append("matric_no", matric_no);
			form_data.append("surname", surname);
			form_data.append("firstname", firstname);
			form_data.append("nickname", nickname);
			form_data.append("email", email);
			form_data.append("phone", phone);
			form_data.append("level_id", level_id);
			form_data.append("course_study_id", course_study_id);
			form_data.append("academics_session", academics_session);
			form_data.append("post_id", post_id);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/exco/update-executive',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						$("#exco_fullname").html(surname.toUpperCase() + ' ' + firstname.toUpperCase() + ' (' + nickname + ')');
						$('#updt_surname').val(surname.toUpperCase());
						$('#updt_firstname').val(firstname.toUpperCase());
						_actionAlert(message, true);
						_get_page('view_excos', 'excos');
					} else {
						const target = info.email ? '#updt_email' : '#updt_matric_no';
						$(target).addClass("issue");
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_btn").disabled = false;
	}
}




//// END EXCO FUNCTION ////////////////



function formatDate(date) {
	const options = { day: '2-digit', month: 'short', year: 'numeric' };
	const formattedDate = new Date(date).toLocaleDateString('en-GB', options);

	const dateParts = formattedDate.split(' ');
	return `${dateParts[0]} ${dateParts[1]} ${dateParts[2]}`;
}



////////// EVENT SCRIPT////////////////////////
function _fetchAllEvent(page_category_id) {
	const academics_session = $('#academics_session').val();
	const search_keywords = $('#search_keywords').val();
	const status_id = $('#status_id').val();

	$('#academic_year_session').html(academics_session);

	$('#fetchAllEvent').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'page_category_id=' + page_category_id + '&academics_session=' + academics_session + '&status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/event/fetch-event',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'event_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW EVENT</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const page_category_id = fetch[i].page_category_id;
								const publish_id = fetch[i].publish_id;
								const cat_name = fetch[i].cat_name;
								const reg_title = fetch[i].reg_title.substr(0, 50);
								const event_start_time = fetch[i].event_start_time + ' ' + fetch[i].event_start_meridian;
								const event_end_time = fetch[i].event_end_time + ' ' + fetch[i].event_end_meridian;
								const updated_time = fetch[i].updated_time;
								const status_name = fetch[i].status_name;
								const reg_pix = fetch[i].reg_pix;
								const documentStoragePath = fetch[i].documentStoragePath;
								const formattedDate = formatDate(updated_time);
								const page_view = fetch[i].page_view;

								text +=
									'<div class="grid-div" data-aos="fade-in" data-aos-duration="1500">' +
									'<div class="btn-div">' +
									'<button class="btn active-btn" onclick="_get_pages_form_with_id(' + "'update_event'" + "," + "'" + page_category_id + "'" + "," + "'" + publish_id + "'" + ')">EDIT</button>' +
									'<button class="btn" onclick="_edit_page(' + "'" + page_category_id + "'," + "'" + publish_id + "'" + ')">EDIT PAGE DETAILS</button>' +
									'</div>' +

									'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
									'<div class="img-div"><img src="' + documentStoragePath + '/' + reg_pix + '" alt="' + reg_pix + '"></div>' +
									'<div class="text-div">' +
									'<div class="top-text"><span>' + cat_name + '</span> </div>' +
									'<div class="top-text"><span><i class="bi-calendar-check"></i> </span><em>' + event_start_time + ' - ' + event_end_time + '</em> </div>' +
									'<h2>' + reg_title + '...</h2>' +
									'<div class="text-in">' +
									'<div class="text">UPDATED ON: <span>' + formattedDate + '</span> | <span>' + page_view + '</span> VIEWS </div>' +
									'</div>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllEvent').html(text);
						sessionStorage.setItem("fetchEvent", JSON.stringify(fetch));
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllEvent').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllEvent').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}


function formatTimeWithoutAMPM(time12h) {
	return time12h.replace(/ AM| PM/, "");
}




function _fetchEachEvent(categoryIdToFind, publishId) {
	let fetchEvent = JSON.parse(sessionStorage.getItem("fetchEvent"));
	const event = fetchEvent.find(s => s.page_category_id === categoryIdToFind && s.publish_id === publishId);

	const event_cat_id = event.event_cat_id;
	const cat_name = event.cat_name;
	const reg_title = event.reg_title;
	const event_date = event.event_date;
	const event_start_meridian = event.event_start_meridian;
	const event_start_time = formatTimeWithoutAMPM(event.event_start_time);
	const event_end_meridian = event.event_end_meridian;
	const event_end_time = formatTimeWithoutAMPM(event.event_end_time);
	const event_location = event.event_location;
	const reg_pix = event.reg_pix;
	const status_id = event.status_id;
	const status_name = event.status_name;
	const updated_time = event.updated_time;
	const documentStoragePath = event.documentStoragePath;
	const page_view = event.page_view;

	const formattedDate2 = event_date.split(" ")[0];
	const formattedDate = formatDate(updated_time);

	$('#event_preview_pix').attr('src', documentStoragePath + '/' + reg_pix);
	$('#reg_title').val(reg_title);
	$('#cat_id').append('<option value="' + event_cat_id + '" selected="selected">' + cat_name + "</option>");

	$('#event_date').val(formattedDate2);
	$('#event_start_time').val(event_start_time);
	$('#event_end_time').val(event_end_time);
	$('#event_start_time').html(event_start_time);
	$('#event_end_time').html(event_end_time);
	$('#event_location').val(event_location);
	$('#summary_reg_title').html(reg_title);
	$('#formattedDate').html(formattedDate);
	$('#page_view').html(page_view);

	// $('#event_start_meridian').append('<option value="' + event_start_meridian + '" selected="selected">' + event_start_meridian + "</option>");
	// $('#event_end_meridian').append('<option value="' + event_end_meridian + '" selected="selected">' + event_end_meridian + "</option>");
	_getSelectTimeOption('event_start_meridian', event_start_meridian);
	_getSelectTimeOption('event_end_meridian', event_end_meridian);
	$('#uptd_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");

}





function _addEvent(page_category_id) {
	try {
		const event_cat_id = $('#cat_id').val();
		const reg_title = $('#reg_title').val();
		const event_date = $('#event_date').val();
		const event_start_time = $('#event_start_time').val();
		const event_start_meridian = $('#event_start_meridian').val();
		const event_end_time = $('#event_end_time').val();
		const event_end_meridian = $('#event_end_meridian').val();
		const event_location = $('#event_location').val();
		const event_pix = $('#reg_thumbnail').prop('files')[0];
		const status_id = $('#status_id').val();

		$('#cat_id, #reg_title, #event_date, #event_start_time, #event_start_meridian, #event_end_time, #event_end_meridian, #event_location, #reg_thumbnail, #status_id').removeClass('issue');

		if (!event_cat_id) {
			$('#cat_id').addClass('issue');
			_actionAlert('Provide Event Category to continue', false);
			return;
		}
		if (!reg_title) {
			$('#reg_title').addClass('issue');
			_actionAlert('Provide Event Title to continue', false);
			return;
		}

		if (!event_date) {
			$('#event_date').addClass("issue");
			_actionAlert('Provide Event Date Speaker to continue', false);
			return;
		}

		if (!event_start_time) {
			$('#event_start_time').addClass("issue");
			_actionAlert('Provide Event Start Time to continue', false);
			return;
		}

		if (!event_start_meridian) {
			$('#event_start_meridian').addClass("issue");
			_actionAlert('Provide Event Start Meridian to continue', false);
			return;
		}

		if (!event_end_time) {
			$('#event_end_time').addClass("issue");
			_actionAlert('Provide Event End Time to continue', false);
			return;
		}

		if (!event_end_meridian) {
			$('#event_end_meridian').addClass("issue");
			_actionAlert('Provide Event End Meridian to continue', false);
			return;
		}

		if (!event_location) {
			$('#event_location').addClass("issue");
			_actionAlert('Provide Event Location Time to continue', false);
			return;
		}

		if (!event_pix) {
			$('#reg_thumbnail').addClass("issue");
			_actionAlert('Upload Evnet Picture to continue', false);
			return;
		}

		if (!status_id) {
			$('#status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}


		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("event_cat_id", event_cat_id);
			form_data.append("page_category_id", page_category_id);
			form_data.append("reg_title", reg_title);
			form_data.append("event_date", event_date);
			form_data.append("event_start_time", event_start_time);
			form_data.append("event_start_meridian", event_start_meridian);
			form_data.append("event_end_time", event_end_time);
			form_data.append("event_end_meridian", event_end_meridian);
			form_data.append("event_location", event_location);
			form_data.append("reg_thumbnail", event_pix);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/event/add-event',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('event_category', 'event');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}




function _updateEvent(page_category_id, publish_id) {
	try {
		const event_cat_id = $('#cat_id').val();
		const reg_title = $('#reg_title').val();
		const event_date = $('#event_date').val();
		const event_start_time = $('#event_start_time').val();
		const event_start_meridian = $('#event_start_meridian').val();
		const event_end_time = $('#event_end_time').val();
		const event_end_meridian = $('#event_end_meridian').val();
		const event_location = $('#event_location').val();
		const event_pix = $('#reg_thumbnail').prop('files')[0];
		const status_id = $('#uptd_status_id').val();

		$('#cat_id, #reg_title, #event_date, #event_start_time, #event_start_meridian, #event_end_time, #event_end_meridian, #event_location, #reg_thumbnail, #uptd_status_id').removeClass('issue');

		if (!event_cat_id) {
			$('#cat_id').addClass('issue');
			_actionAlert('Provide Event Category to continue', false);
			return;
		}
		if (!reg_title) {
			$('#reg_title').addClass('issue');
			_actionAlert('Provide Event Title to continue', false);
			return;
		}

		if (!event_date) {
			$('#event_date').addClass("issue");
			_actionAlert('Provide Event Date Speaker to continue', false);
			return;
		}

		if (!event_start_time) {
			$('#event_start_time').addClass("issue");
			_actionAlert('Provide Event Start Time to continue', false);
			return;
		}

		if (!event_start_meridian) {
			$('#event_start_meridian').addClass("issue");
			_actionAlert('Provide Event Start Meridian to continue', false);
			return;
		}

		if (!event_end_time) {
			$('#event_end_time').addClass("issue");
			_actionAlert('Provide Event End Time to continue', false);
			return;
		}

		if (!event_end_meridian) {
			$('#event_end_meridian').addClass("issue");
			_actionAlert('Provide Event End Meridian to continue', false);
			return;
		}

		if (!event_location) {
			$('#event_location').addClass("issue");
			_actionAlert('Provide Event Location Time to continue', false);
			return;
		}

		if (!status_id) {
			$('#uptd_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("event_cat_id", event_cat_id);
			form_data.append("page_category_id", page_category_id);
			form_data.append("publish_id", publish_id);
			form_data.append("reg_title", reg_title);
			form_data.append("event_date", event_date);
			form_data.append("event_start_time", event_start_time);
			form_data.append("event_start_meridian", event_start_meridian);
			form_data.append("event_end_time", event_end_time);
			form_data.append("event_end_meridian", event_end_meridian);
			form_data.append("event_location", event_location);
			form_data.append("reg_thumbnail", event_pix);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/event/update-event',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('event_category', 'event');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					_actionAlert('An error occurred while processing your request: Please try again', false);
					$("#update_btn").html(btn_text).prop("disabled", false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		$("#update_btn").html(btn_text).prop("disabled", false);
	}
}



////////// COURSE CONTENT SCRIPT////////////////////////
function _fetchAllCoursesByLevel(page_category_id) {
	const status_id = $('#status_id').val();
	const level_id = $('#level_id').val();
	const search_keywords = $('#search_keywords').val();
	$('#fetchAllNDCourses').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'status_id=' + status_id + '&level_id=' + level_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/courses/fetch-all-course-content',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let textHND = '';
					let textND = '';
					let no = 0;
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'course_content_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW COURSE CONTENT</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								no++;
								const documentStoragePath = fetch[i].documentStoragePath;
								const publish_id = fetch[i].publish_id;
								const course_study_title = fetch[i].course_study_title;
								const level_id = fetch[i].course_level_id;
								const status_name = fetch[i].status_name;
								const level_title = fetch[i].level_title;
								const thumbnail = fetch[i].reg_pix;
								const level_name = fetch[i].level_name;
								const course_content = fetch[i].course_content;
								const updated_time = formatDate(fetch[i].updated_time);
								if (level_id > 2) {
									textHND +=
										'<div class="grid-div animated fadeIn">' +
										'<div class="btn-div">' +
										'<button class="btn active-btn" onclick="_get_form_with_id(' + "'update_course_content'" + "," + "'" + publish_id + "'" + ')">EDIT</button>' +
										'<button class="btn" onclick="_edit_page(' + "'" + page_category_id + "'," + "'" + publish_id + "'" + ')">EDIT PAGE DETAILS</button>' +
										'</div>' +
										'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
										'<div class="img-div"><img src="' + documentStoragePath + '/' + thumbnail + '" alt="' + thumbnail + '"></div>' +
										'<div class="text-div">' +
										'<div class="top-text">Level: <span>' + level_name + '</span> </div>' +
										'<h2>' + course_study_title + '...</h2>' +
										'<div class="text-in">' +
										'<div class="text">CREATED ON: <span>' + updated_time + '</span> </div>' +
										'</div>' +
										'</div>' +
										'</div>';
								} else {
									textND +=
										'<div class="faq-back-div" data-aos="fade-in" data-aos-duration="1500">' +
										'<div class="title-div">' +
										'<div class="num rounded ' + status_name + '"></div>' +
										'<button class="btn" onClick="_get_form_with_id(' + "'update_course_content'" + "," + "'" + publish_id + "'" + ')"><i class="bi-pencil-square"></i> <span>' + level_title + ' (' + level_name + ')  </span> Available Courses </button>' +
										'<div class="expand-div" id="' + publish_id + 'num" onclick="_collapse(' + "'" + publish_id + "'" + ')">' +
										'<i class="bi-plus"></i>' +
										'</div>' +
										'</div>' +
										'<div class="answer-div" id="' + publish_id + "answer" + '">' + course_content + '</div>' +
										'</div>';
								}
							}

							$('#fetchAllNDCourses').html(textND);
							$('#fetchAllHNDCourses').html(textHND);

						}
						sessionStorage.setItem("allCoursesByLevelSession", JSON.stringify(fetch));
					} else {
						textND +=
							'<div class="false-notification-div">' +
							"<p> " + message + " </p>" +
							'<button class="btn" onclick="_get_form(' + "'course_content_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW COURSE CONTENT</button>' + "</div>";

						const response = info.response;
						if (response < 100) {
							_logout();
						}
						$('#fetchAllNDCourses').html(textND);
					}

				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllFaq').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllFaq').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}



function _fetchEachCourses(publish_id) {
	$('#course_of_study_container_with_image,#course_of_study_container').hide()
	let fetchData = JSON.parse(sessionStorage.getItem("allCoursesByLevelSession"));
	const data = fetchData.find(s => s.publish_id === publish_id);

	const {
		documentStoragePath,
		course_content,
		course_level_id,
		level_name,
		course_study_title,
		reg_pix,
		status_id,
		status_name,
		updated_time
	} = data;

	// Update level dropdown
	$('#updt_level_id').html('<option value="' + course_level_id + '" selected="selected">' + level_name + "</option>");
	// Check level ID as number
	const level_id = parseInt(course_level_id, 10);

	if (level_id > 2) {
		$('#course_of_study_container_with_image').show();
		$('#updt_course_study_title').val(course_study_title);
		$('#course_preview_pix, #preview_pix').attr('src', documentStoragePath + '/' + reg_pix);

		$('#course_study_title').html(course_study_title);
		$('#course_level').html(level_name);
		$('#formattedDate').html(formatDate(updated_time));
	} else {
		$('#course_of_study_container').show();
		setTimeout(function () {
			tinymce.get('updt_course_content').setContent(course_content);
		}, 2000);
	}

	// Update status dropdown
	$('#updt_status_id').html('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
}



function _checkField(inputId) {
	$('#course_of_study_container_with_image,#course_content_container,#course_study_container').hide()
	var level_id = $('#' + inputId).val();
	if (level_id > 2) {
		$('#course_of_study_container_with_image,#course_study_container').show();
	} else {
		$('#course_content_container').show();
		$('#course_study_container').hide();
	}
}

function _addCourseContent(page_category_id) {
	tinyMCE.triggerSave();
	try {
		const level_id = $('#reg_level_id').val();
		const reg_course_study_title = $('#reg_course_study_title').val();
		const course_pix = $('#reg_thumbnail').prop('files')[0];
		const course_content = $('#reg_course_content').val();
		const status_id = $('#reg_status_id').val();

		$('#reg_level_id, #reg_course_study_title, #reg_course_content, #reg_status_id').removeClass('issue');

		if (!page_category_id) {
			_actionAlert('Page Category is Required!', false);
			return;
		}
		if (!level_id) {
			$('#reg_level_id').addClass("issue");
			_actionAlert('Select level to continue', false);
			return;
		}

		if (level_id > 2) {
			if (!reg_course_study_title) {
				$('#reg_course_study_title').addClass('issue');
				_actionAlert('Fill in course study title to continue', false);
				return;
			}
			if (!course_pix) {
				_actionAlert('Select course picture to continue', false);
				return;
			}
		} else {
			if (!course_content) {
				$('#reg_course_content').addClass("issue");
				_actionAlert('Fill in Course content to continue', false);
				return;
			}
		}
		if (!status_id) {
			$('#reg_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("level_id", level_id);
			form_data.append("course_study_title", reg_course_study_title);
			form_data.append("thumbnail", course_pix);
			form_data.append("course_content", course_content);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/courses/add-course-content',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('course_category', 'courses');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}


function _updateCourseContent(page_category_id) {
	let publish_id = JSON.parse(sessionStorage.getItem("getPublishId"));
	tinyMCE.triggerSave();
	try {
		const level_id = $('#updt_level_id').val();
		const course_study_title = $('#updt_course_study_title').val();
		const course_pix = $('#updt_thumbnail').prop('files')[0];
		const course_content = $('#updt_course_content').val();
		const status_id = $('#updt_status_id').val();

		$('#updt_level_id, #updt_course_study_title, #updt_course_content, #updt_status_id').removeClass('issue');

		if (!page_category_id) {
			_actionAlert('Page Category is Required!', false);
			return;
		}
		if (!publish_id) {
			_actionAlert('Error! Provide Course Publish ID', false);
			return;
		}
		if (!level_id) {
			$('#updt_level_id').addClass("issue");
			_actionAlert('Select level to continue', false);
			return;
		}
		if (level_id > 2) {
			if (!course_study_title) {
				$('#updt_course_study_title').addClass('issue');
				_actionAlert('Fill in course study title to continue', false);
				return;
			}
		} else {
			if (!course_content) {
				$('#updt_course_content').addClass("issue");
				_actionAlert('Fill in Course content to continue', false);
				return;
			}
		}
		if (!status_id) {
			$('#updt_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("publish_id", publish_id);
			form_data.append("level_id", level_id);
			form_data.append("course_study_title", course_study_title);
			form_data.append("thumbnail", course_pix);
			form_data.append("course_content", course_content);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/courses/update-course-content',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('course_category', 'courses');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_btn").disabled = false;
	}
}





////////// PAST QUESTION SCRIPT////////////////////////
function _fetchAllPastQuestion() {
	const status_id = $('#status_id').val();
	const search_keywords = $('#search_keywords').val();

	$('#fetchAllPastQestion').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'status_id=' + status_id + '&search_keywords=' + search_keywords;
		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/exam-material/fetch-all-past-question',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;
					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'past_quesion_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW PAST QUESTION</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const past_question_id = fetch[i].past_question_id;
								const exam_session = fetch[i].exam_session;
								const level_name = fetch[i].level_name;
								const semester_name = fetch[i].semester_name;
								const course_code = fetch[i].course_code;
								const course_unit = fetch[i].course_unit;
								const course_title = fetch[i].course_title.substr(0, 50);
								const thumbnail = fetch[i].thumbnail;
								const status_name = fetch[i].status_name;
								const created_at = fetch[i].created_at;
								const examPixPath = fetch[i].examPixPath;
								const formattedDate = formatDate(created_at);

								text +=
									'<div class="grid-div animated fadeIn">' +
									'<div class="btn-div">' +
									'<button class="btn active-btn" onclick="_get_form_with_id(' + "'update_past_question'" + "," + "'" + past_question_id + "'" + ')">EDIT</button>' +
									'</div>' +
									'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
									'<div class="img-div"><img src="' + examPixPath + '/' + thumbnail + '" alt="' + thumbnail + '"></div>' +
									'<div class="text-div">' +
									'<div class="top-text">Exam Session: <span>' + exam_session + '</span> </div>' +
									'<div class="top-text">Level: <span>' + level_name + '</span> </div>' +
									'<div class="top-text">Semester: <span>' + semester_name + '</span> </div>' +
									'<div class="top-text">Course Code: <span>' + course_code + '  (' + course_unit + ' Unit)</span> </div>' +
									'<h2>' + course_title + '...</h2>' +
									'<div class="text-in">' +
									'<div class="text">CREATED ON: <span>' + formattedDate + '</span> </div>' +
									'</div>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllPastQestion').html(text);
						sessionStorage.setItem("getPastQuestionDataSession", JSON.stringify(fetch));
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllEvent').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllEvent').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}

function _getSearchItem(divClass, displayId) {
	const keyword = $('input, select').map(function () {
		return $(this).val().toLowerCase().trim();
	}).get().join(' ');
	let matchCount = 0;
	$('.' + divClass).each(function () {
		const text = $(this).text().toLowerCase();
		const match = keyword.split(' ').every(k => text.includes(k));

		$(this).toggle(match);
		if (match) matchCount++;
	});
	$('#no-record').remove();
	if (matchCount === 0) {
		$('#' + displayId).append('<div id="no-record" class="false-notification-div"><p>No record found</p> <button class="btn" onclick="_get_form(' + "'past_quesion_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW PAST QUESTION</button></div>');
	}
}

// function _getSearchItem(divClass, displayId) {
//   const examSession = $('#exam_session').val().toLowerCase();
//   const searchKeyword = $('#search_keywords').val().toLowerCase();

//   let matchCount = 0;

//   $('.' + divClass).removeClass('matched-item').hide(); // Reset
//   $('#' + displayId + ' #no-record').remove();

//   $('.' + divClass).each(function () {
//     const text = $(this).text().toLowerCase();
//     const match = text.includes(searchKeyword) && text.includes(examSession);

//     if (match) {
//       $(this).addClass('matched-item').show(); // Mark as matched
//       matchCount++;
//     }
//   });

//   if (matchCount === 0) {
//     $('#' + displayId).append('<div id="no-record" class="false-notification-div"><p>No record found</p> <button class="btn" onclick="_get_form(\'past_quesion_reg\')">Request for Past Question <i class="bi-send"></i></button></div>');
//     $('#paginationControls').empty();
//   } else {
//     _showPagination(1, 'matched-item');
//   }
// }


function _fetchEachPastQuestion(past_question_id) {
	let fetchPastQuestion = JSON.parse(sessionStorage.getItem("getPastQuestionDataSession"));
	const data = fetchPastQuestion.find(s => s.past_question_id === past_question_id);

	const exam_session = data.exam_session;
	const level_id = data.level_id;
	const semester_id = data.semester_id;
	const course_code = data.course_code;
	const course_title = data.course_title;
	const course_unit = data.course_unit;
	const thumbnail = data.thumbnail;
	const material = data.material;
	const status_id = data.status_id;
	const status_name = data.status_name;
	const level_name = data.level_name;
	const semester_name = data.semester_name;
	const examPixPath = data.examPixPath;
	const examMaterialPath = data.examMaterialPath;

	$('#reg_exam_session').val(exam_session);
	$('#reg_level_id').append('<option value="' + level_id + '" selected="selected">' + level_name + "</option>");
	$('#reg_semester_id').append('<option value="' + semester_id + '" selected="selected">' + semester_name + "</option>");
	$('#reg_course_code').val(course_code);
	$('#reg_course_title').val(course_title);
	$('#reg_course_unit').val(course_unit);
	$('#exam_preview_pix').attr('src', examPixPath + '/' + thumbnail);
	_getExamMaterial(examMaterialPath, material);
	$('#uptd_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
}



function _getExamMaterial(documentStoragePath_material, material) {
	const pdfIframe = $('#pdfFile');
	const pdfUrl = documentStoragePath_material + "/" + material;
	pdfIframe.attr('src', pdfUrl);
	pdfIframe.css('display', 'block');
}



function _addPastQuestion() {
	try {
		const exam_session = $('#reg_exam_session').val();
		const level_id = $('#reg_level_id').val();
		const semester_id = $('#reg_semester_id').val();
		const course_code = $('#reg_course_code').val();
		const course_title = $('#reg_course_title').val();
		const course_unit = $('#reg_course_unit').val();
		const thumbnail = $('#reg_thumbnail').prop('files')[0];
		const exam_material = $('#material').prop('files')[0];
		const status_id = $('#reg_status_id').val();

		$('#reg_exam_session, #reg_level_id, #reg_semester_id, #reg_course_code, #reg_course_title, #reg_course_unit, #reg_thumbnail, #reg_status_id').removeClass('issue');

		if (!exam_session) {
			$('#reg_exam_session').addClass('issue');
			_actionAlert('Provide Exam Session to continue', false);
			return;
		}
		if (!level_id) {
			$('#reg_level_id').addClass('issue');
			_actionAlert('Select level to continue', false);
			return;
		}

		if (!semester_id) {
			$('#reg_semester_id').addClass("issue");
			_actionAlert('Select Semester to continue', false);
			return;
		}
		if (!course_code) {
			$('#reg_course_code').addClass("issue");
			_actionAlert('Provide Course Code to continue', false);
			return;
		}
		if (!course_title) {
			$('#reg_course_title').addClass("issue");
			_actionAlert('Provide Course Title to continue', false);
			return;
		}
		if (!course_unit) {
			$('#reg_course_unit').addClass("issue");
			_actionAlert('Provide Course Unit to continue', false);
			return;
		}
		if (!thumbnail) {
			_actionAlert('Choose a Exam Picture to continue', false);
			return;
		}
		if (!exam_material) {
			_actionAlert('Choose Exam Past Question to continue', false);
			return;
		}
		if (!status_id) {
			$('#reg_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}


		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("exam_session", exam_session);
			form_data.append("level_id", level_id);
			form_data.append("semester_id", semester_id);
			form_data.append("course_code", course_code);
			form_data.append("course_title", course_title);
			form_data.append("course_unit", course_unit);
			form_data.append("thumbnail", thumbnail);
			form_data.append("exam_material", exam_material);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/exam-material/add-past-question',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('past_question_category', 'past');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}


function _updatePastQuestion() {
	let past_question_id = JSON.parse(sessionStorage.getItem("getPastQuestionIDSession"));
	try {
		const exam_session = $('#reg_exam_session').val();
		const level_id = $('#reg_level_id').val();
		const semester_id = $('#reg_semester_id').val();
		const course_code = $('#reg_course_code').val();
		const course_title = $('#reg_course_title').val();
		const course_unit = $('#reg_course_unit').val();
		const thumbnail = $('#reg_thumbnail').prop('files')[0];
		const exam_material = $('#material').prop('files')[0];
		const status_id = $('#uptd_status_id').val();

		$('#reg_exam_session, #reg_level_id, #reg_semester_id, #reg_course_code, #reg_course_title, #reg_course_unit, #reg_thumbnail, #uptd_status_id').removeClass('issue');

		if (!exam_session) {
			$('#reg_exam_session').addClass('issue');
			_actionAlert('Provide Exam Session to continue', false);
			return;
		}
		if (!level_id) {
			$('#reg_level_id').addClass('issue');
			_actionAlert('Select level to continue', false);
			return;
		}

		if (!semester_id) {
			$('#reg_semester_id').addClass("issue");
			_actionAlert('Select Semester to continue', false);
			return;
		}
		if (!course_code) {
			$('#reg_course_code').addClass("issue");
			_actionAlert('Provide Course Code to continue', false);
			return;
		}
		if (!course_title) {
			$('#reg_course_title').addClass("issue");
			_actionAlert('Provide Course Title to continue', false);
			return;
		}
		if (!course_unit) {
			$('#reg_course_unit').addClass("issue");
			_actionAlert('Provide Course Unit to continue', false);
			return;
		}
		if (!status_id) {
			$('#uptd_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}


		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("past_question_id", past_question_id);
			form_data.append("exam_session", exam_session);
			form_data.append("level_id", level_id);
			form_data.append("semester_id", semester_id);
			form_data.append("course_code", course_code);
			form_data.append("course_title", course_title);
			form_data.append("course_unit", course_unit);
			form_data.append("thumbnail", thumbnail);
			form_data.append("exam_material", exam_material);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/exam-material/update-past-question',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('past_question_category', 'past');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_btn").disabled = false;
	}
}












////////// GALLERY SCRIPT////////////////////////
function _fetchAllGallery(page_category_id) {
	const search_keywords = $('#search_keywords').val();
	const status_id = $('#status_id').val();
	$('#fetchAllGallery').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'page_category_id=' + page_category_id + '&status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/gallery/fetch-gallery',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'gallery_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW GALLERY</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const page_category_id = fetch[i].page_category_id;
								const publish_id = fetch[i].publish_id;
								const reg_title = fetch[i].reg_title.substr(0, 50);
								const gallery_sub_title = fetch[i].gallery_sub_title;
								const class_gallery_sub_title = fetch[i].class_gallery_sub_title;
								const updated_time = fetch[i].updated_time;
								const status_name = fetch[i].status_name;
								const reg_pix = fetch[i].reg_pix;
								const documentStoragePath = fetch[i].documentStoragePath;
								const formattedDate = formatDate(updated_time);
								const page_view = fetch[i].page_view;
								const displayTitle = gallery_sub_title ? gallery_sub_title : class_gallery_sub_title;

								text +=
									'<div class="grid-div" data-aos="fade-in" data-aos-duration="1500">' +
									'<div class="btn-div">' +
									'<button class="btn active-btn" onclick="_get_pages_form_with_id(' + "'update_gallery'" + "," + "'" + page_category_id + "'" + "," + "'" + publish_id + "'" + ')">EDIT</button>' +
									'<button class="btn" onclick="_edit_page(' + "'" + page_category_id + "'," + "'" + publish_id + "'" + ')">EDIT PAGE DETAILS</button>' +
									'</div>' +

									'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
									'<div class="img-div"><img src="' + documentStoragePath + '/' + reg_pix + '" alt="' + reg_pix + '"></div>' +
									'<div class="text-div">' +
									'<div class="top-text"><span>' + displayTitle + '</span></div>' +
									'<h2>' + reg_title + '...</h2>' +
									'<div class="text-in">' +
									'<div class="text">UPDATED ON: <span>' + formattedDate + '</span> | <span>' + page_view + '</span> VIEWS </div>' +
									'</div>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllGallery').html(text);
						sessionStorage.setItem("fetchGallery", JSON.stringify(fetch));
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllGallery').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllGallery').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}



function _fetchEachGallery(categoryIdToFind, publishId) {
	let fetchGallery = JSON.parse(sessionStorage.getItem("fetchGallery"));
	const gallery = fetchGallery.find(s => s.page_category_id === categoryIdToFind && s.publish_id === publishId);

	const reg_title = gallery.reg_title;
	const gallery_sub_title = gallery.gallery_sub_title;
	const class_gallery_sub_title = gallery.class_gallery_sub_title;
	const reg_pix = gallery.reg_pix;
	const status_id = gallery.status_id;
	const status_name = gallery.status_name;
	const updated_time = gallery.updated_time;
	const documentStoragePath = gallery.documentStoragePath;
	const formattedDate = formatDate(updated_time);
	const page_view = gallery.page_view;

	$('#reg_title').val(reg_title);
	$('#gallery_sub_title').val(gallery_sub_title);
	$('#class_gallery_sub_title').val(class_gallery_sub_title);
	$('#gallery_preview_pix').attr('src', documentStoragePath + '/' + reg_pix);
	$('#uptd_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");

	$('#summary_reg_title').html(reg_title);
	$('#gallery_sub_title').html(gallery_sub_title);
	$('#formattedDate').html(formattedDate);
	$('#page_view').html(page_view);
}




function _addGallery(page_category_id) {
	try {
		const reg_title = $('#reg_title').val();
		const gallery_sub_title = $('#gallery_sub_title').val();
		const class_gallery_sub_title = $('#class_gallery_sub_title').val();
		const gallery_pix = $('#reg_thumbnail').prop('files')[0];
		const status_id = $('#status_id').val();

		$('#reg_title, #gallery_sub_title, #class_gallery_sub_title, #reg_thumbnail, #status_id').removeClass('issue');

		if (!reg_title) {
			$('#reg_title').addClass('issue');
			_actionAlert('Provide Event Title to continue', false);
			return;
		}

		if ((!gallery_sub_title && !class_gallery_sub_title) ||
			(gallery_sub_title && class_gallery_sub_title)) {
			$('#gallery_sub_title, #class_gallery_sub_title').addClass('issue');
			_actionAlert('Provide either Gallery Sub Title or Class Gallery Sub Title, but not both', false);
			return;
		}

		if (!gallery_pix) {
			$('#reg_thumbnail').addClass("issue");
			_actionAlert('Upload Gallery Picture to continue', false);
			return;
		}

		if (!status_id) {
			$('#status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#reg_title, #gallery_sub_title, #class_gallery_sub_title, #reg_thumbnail, #status_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("reg_title", reg_title);
			form_data.append("gallery_sub_title", gallery_sub_title);
			form_data.append("class_gallery_sub_title", class_gallery_sub_title);
			form_data.append("reg_thumbnail", gallery_pix);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/gallery/add-gallery',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('gallery_category', 'gallery');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}




function _updateGallery(page_category_id, publish_id) {
	try {
		const reg_title = $('#reg_title').val();
		const gallery_sub_title = $('#gallery_sub_title').val();
		const class_gallery_sub_title = $('#class_gallery_sub_title').val();
		const updt_gallery_pix = $('#reg_thumbnail').prop('files')[0];
		const status_id = $('#uptd_status_id').val();

		$('#reg_title, #gallery_sub_title, #class_gallery_sub_title, #reg_thumbnail, #uptd_status_id').removeClass('issue');

		if (!reg_title) {
			$('#reg_title').addClass('issue');
			_actionAlert('Provide Event Title to continue', false);
			return;
		}

		if ((!gallery_sub_title && !class_gallery_sub_title) ||
			(gallery_sub_title && class_gallery_sub_title)) {
			$('#gallery_sub_title, #class_gallery_sub_title').addClass('issue');
			_actionAlert('Provide either Gallery Sub Title or Class Gallery Sub Title, but not both', false);
			return;
		}

		if (!status_id) {
			$('#uptd_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#reg_title, #gallery_sub_title, #class_gallery_sub_title, #reg_thumbnail, #uptd_status_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("publish_id", publish_id);
			form_data.append("reg_title", reg_title);
			form_data.append("gallery_sub_title", gallery_sub_title);
			form_data.append("class_gallery_sub_title", class_gallery_sub_title);
			form_data.append("reg_thumbnail", updt_gallery_pix);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/gallery/update-gallery',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('gallery_category', 'gallery');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					_actionAlert('An error occurred while processing your request: Please try again', false);
					$("#update_btn").html(btn_text).prop("disabled", false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		$("#update_btn").html(btn_text).prop("disabled", false);
	}
}




////////// PAGE CONTENT SCRIPT////////////////////////
function _fetchPageContent(publish_id) {
	const dataString = "publish_id=" + publish_id;
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/pages/pages-content/fetch-page-content',
			data: dataString,
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					const data = info.page_content_details[0];
					const page_url = data.page_url;
					const page_title = data.page_title;
					const seo_keywords = data.seo_keywords;
					const seo_description = data.seo_description;
					const seo_flyer = data.seo_flyer;
					const page_content_text = data.page_content;
					const documentStoragePath = data.documentStoragePath;

					$('#page_url').val(page_url);
					$('#page_title').val(page_title);
					$('#seo_keywords').val(seo_keywords);
					$('#seo_description').val(seo_description);
					$('#page_content_text').val(page_content_text);
					$('#seo_flyer_preview_pix').attr('src', documentStoragePath + '/' + seo_flyer);

					setTimeout(function () {
						tinymce.get('page_content_text').setContent(page_content_text);
					}, 2000);

				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						//_actionAlert(message, false);
					}
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




function _addPageContent(publish_id) {
	tinyMCE.triggerSave();
	try {
		const page_url = $('#page_url').val();
		const page_title = $('#page_title').val();
		const seo_keywords = $('#seo_keywords').val();
		const seo_description = $('#seo_description').val();
		const page_content = $('#page_content_text').val();
		const seo_flyer_pix = $('#seo_flyer').prop('files')[0];

		$('#page_url, #page_title, #seo_keywords, #seo_description, #page_content_text, #seo_flyer').removeClass('issue');

		if (!page_url) {
			$('#page_url').addClass('issue');
			_actionAlert('Provide Page Url to continue', false);
			return;
		}

		if (!page_title) {
			$('#page_title').addClass("issue");
			_actionAlert('Provide Page Title to continue', false);
			return;
		}

		if (!seo_keywords) {
			$('#seo_keywords').addClass("issue");
			_actionAlert('Provide Seo Keywords to continue', false);
			return;
		}

		if (!seo_description) {
			$('#seo_description').addClass("issue");
			_actionAlert('Provide Seo Description to continue', false);
			return;
		}

		if (!page_content) {
			$('#page_content').addClass("issue");
			_actionAlert('Provide Content to continue', false);
			return;
		}

		$('#page_url, #page_title, #seo_keywords, #seo_description, #page_content, #seo_flyer').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#save_btn").html();
			$("#save_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("save_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("publish_id", publish_id);
			form_data.append("page_url", page_url);
			form_data.append("page_title", page_title);;
			form_data.append("seo_keywords", seo_keywords);
			form_data.append("seo_description", seo_description);
			form_data.append("page_content", page_content);
			form_data.append("seo_flyer", seo_flyer_pix);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/pages/pages-content/save-page-content',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						const page_category_id = info.page_category_id;
						const publish_id = info.publish_id;
						const page_url = info.page_url;
						const db_page_url = info.db_page_url;
						const page_title = info.page_title;
						const db_seo_flyer = info.db_seo_flyer;
						const seo_flyer = info.seo_flyer;
						const seo_keywords = info.seo_keywords;
						const seo_description = info.seo_description;

						_createPagesFolder(page_category_id, publish_id, page_url, db_page_url, page_title, db_seo_flyer, seo_flyer, seo_keywords, seo_description, message);
					} else {
						_actionAlert(message, false);
					}
					$("#save_btn").html(btn_text);
					document.getElementById("save_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#save_btn").html(btn_text);
					document.getElementById("save_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("save_btn").disabled = false;
	}
}





function _createPagesFolder(page_category_id, publish_id, page_url, db_page_url, page_title, db_seo_flyer, seo_flyer, seo_keywords, seo_description, message) {
	const action = "createPagesFolder";
	if (seo_flyer == null) {
		seo_flyer = '';
	}
	if (db_page_url == null) {
		db_page_url = '';
	}

	const form_data = new FormData();
	form_data.append("action", action);
	form_data.append("page_category_id", page_category_id);
	form_data.append("publish_id", publish_id);
	form_data.append("page_url", page_url);
	form_data.append("db_page_url", db_page_url);
	form_data.append("page_title", page_title);
	form_data.append("db_seo_flyer", db_seo_flyer);
	form_data.append("seo_flyer", seo_flyer);
	form_data.append("seo_keywords", seo_keywords);
	form_data.append("seo_description", seo_description);

	$.ajax({
		url: admin_local_portal_url,
		type: "POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (html) {
			_actionAlert(message, true);
		},
	});
}



function _save_page_other_pictures(publish_id) {
	try {

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const form_data = new FormData();
			form_data.append("publish_id", publish_id);
			const totalFiles = $('#pictures').get(0).files.length;
			for (var i = 0; i < totalFiles; i++) {
				form_data.append("pictures[]", $("#pictures").get(0).files[i]);
			}

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/pages/pages-pictures/save-pages-pictures',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_check_page_content('picture_page', 'picture-page', publish_id);
					} else {
						_actionAlert(message, false);
					}
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
	}
}



function _fetchPagePicture(publish_id) {
	const dataString = "publish_id=" + publish_id;
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/pages/pages-pictures/fetch-pages-pictures',
			data: dataString,
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const fetch = info.picture_details;
				const success = info.success;
				const message = info.message;

				let text = '';
				if (success === true) {
					if (!fetch) {
						_actionAlert(message, false);
					} else {
						for (let i = 0; i < fetch.length; i++) {
							const sn = fetch[i].sn;
							const pictures = fetch[i].pictures;
							const documentStoragePath = fetch[i].documentStoragePath;
							const publish_id = fetch[i].publish_id;

							text +=
								'<div class="video-div picture-div" id="pictures-' + sn + '">' +
								'<div class="icon-div" onclick="deletePagePictures(' + "'" + publish_id + "'," + "'" + sn + "'" + ');"><i class="bi-trash"></i></div>' +
								'<img src="' + documentStoragePath + '/' + pictures + '" alt="' + sn + '">' +
								'</div>';
						}
						$('#fetchPagePicture').html(text);
					}
				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						_actionAlert(message, false);
					}
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



function deletePagePictures(publish_id, sn) {
	try {

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const form_data = new FormData();
			form_data.append("publish_id", publish_id);
			form_data.append("sn", sn);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/pages/pages-pictures/delete-pages-pictures',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						$('#pictures-' + sn).fadeOut(500);
					} else {
						_actionAlert(message, false);
					}
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
	}
}



function _getDashboardStatistics() {
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/dashboard/dashboad-statistics',
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					const data = info.data[0];
					const academics_session = data.academics_session;
					const total_active_staff_count = data.total_active_staff_count;
					const total_active_event_count = data.total_active_event_count;
					const total_active_gallery_count = data.total_active_gallery_count;
					const total_active_blog_count = data.total_active_blog_count;
					const total_active_faq_count = data.total_active_faq_count;
					const total_active_testimony_count = data.total_active_testimony_count;

					$('#current_academics_session').html(academics_session);
					$('#total_active_staff_count').html(total_active_staff_count);
					$('#total_active_event_count').html(total_active_event_count);
					$('#total_active_gallery_count').html(total_active_gallery_count);
					$('#total_active_blog_count').html(total_active_blog_count);
					$('#total_active_faq_count').html(total_active_faq_count);
					$('#total_active_testimony_count').html(total_active_testimony_count);

				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						_actionAlert(message, false);
					}
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





////////// BLOG SCRIPT////////////////////////
function _fetchAllBlog(page_category_id) {
	const search_keywords = $('#search_keywords').val();
	const status_id = $('#status_id').val();
	$('#fetchAllBlog').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'page_category_id=' + page_category_id + '&status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/blog/fetch-blog',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'blog_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW BLOG</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const page_category_id = fetch[i].page_category_id;
								const publish_id = fetch[i].publish_id;
								const reg_title = fetch[i].reg_title.substr(0, 50);
								const status_name = fetch[i].status_name;
								const reg_pix = fetch[i].reg_pix;
								const updated_time = fetch[i].updated_time;
								const documentStoragePath = fetch[i].documentStoragePath;
								const formattedDate = formatDate(updated_time);
								const blog_view = fetch[i].blog_view;
								const cat_name = fetch[i].cat_name;

								text +=
									'<div class="grid-div" data-aos="fade-in" data-aos-duration="1500">' +
									'<div class="btn-div">' +
									'<button class="btn active-btn" onclick="_get_pages_form_with_id(' + "'update_blog'" + "," + "'" + page_category_id + "'" + "," + "'" + publish_id + "'" + ')">EDIT</button>' +
									'<button class="btn" onclick="_edit_page(' + "'" + page_category_id + "'," + "'" + publish_id + "'" + ')">EDIT PAGE DETAILS</button>' +
									'</div>' +

									'<div class="status-div ' + status_name + '">' + status_name + '</div>' +
									'<div class="img-div"><img src="' + documentStoragePath + "/" + reg_pix + '" alt="' + reg_title + '"></div>' +
									'<div class="text-div">' +
									'<div class="top-text">Category: <span> ' + cat_name + ' </span></div>' +
									'<h2>' + reg_title + '...</h2>' +
									'<div class="text-in">' +
									'<div class="text">UPDATED ON: <span>' + formattedDate + '</span> | <span>' + blog_view + '</span> VIEWS </div>' +
									'</div>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllBlog').html(text);
						sessionStorage.setItem("fetchBlog", JSON.stringify(fetch));
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllBlog').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllBlog').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}


function _fetchEachBlogs(categoryIdToFind, publishId) {
	let fetchBlog = JSON.parse(sessionStorage.getItem("fetchBlog"));
	const blogs = fetchBlog.find(s => s.page_category_id === categoryIdToFind && s.publish_id === publishId);

	const blog_cat_id = blogs.blog_cat_id;
	const cat_name = blogs.cat_name;
	const reg_title = blogs.reg_title;
	const status_id = blogs.status_id;
	const status_name = blogs.status_name;
	const reg_pix = blogs.reg_pix;
	const documentStoragePath = blogs.documentStoragePath;
	const updated_time = blogs.updated_time;
	const formattedDate = formatDate(updated_time);
	const blog_view = blogs.blog_view;

	$('#reg_title').val(reg_title);
	$('#blog_preview_pix').attr('src', documentStoragePath + '/' + reg_pix);
	$('#cat_id').append('<option value="' + blog_cat_id + '" selected="selected">' + cat_name + "</option>");
	$('#uptd_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");

	$('#summary_reg_title').html(reg_title);
	$('#cat_name').html(cat_name);
	$('#formattedDate').html(formattedDate);
	$('#page_view').html(blog_view);
}




function _addBlog(page_category_id) {
	try {

		const blog_cat_id = $('#cat_id').val();
		const reg_title = $('#reg_title').val();
		const blog_pix = $('#reg_thumbnail').prop('files')[0];
		const status_id = $('#status_id').val();

		$('#reg_title, #cat_id, #reg_thumbnail, #status_id').removeClass('issue');

		if (!blog_cat_id) {
			$('#cat_id').addClass("issue");
			_actionAlert('Select Blog Category to continue', false);
			return;
		}

		if (!reg_title) {
			$('#reg_title').addClass('issue');
			_actionAlert('Provide Blog Title to continue', false);
			return;
		}

		if (!blog_pix) {
			$('#reg_thumbnail').addClass("issue");
			_actionAlert('Upload Blog Picture to continue', false);
			return;
		}

		if (!status_id) {
			$('#status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#reg_title, #cat_id, #reg_thumbnail, #status_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("blog_cat_id", blog_cat_id);
			form_data.append("reg_title", reg_title);
			form_data.append("reg_thumbnail", blog_pix);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/blog/add-blog',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('blog_category', 'blog');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}




function _updateBlog(page_category_id, publish_id) {
	try {

		const blog_cat_id = $('#cat_id').val();
		const reg_title = $('#reg_title').val();
		const updt_blog_pix = $('#reg_thumbnail').prop('files')[0];
		const status_id = $('#uptd_status_id').val();

		$('#reg_title, #cat_id, #reg_thumbnail, #uptd_status_id').removeClass('issue');

		if (!blog_cat_id) {
			$('#cat_id').addClass("issue");
			_actionAlert('Select Blog Category to continue', false);
			return;
		}

		if (!reg_title) {
			$('#reg_title').addClass('issue');
			_actionAlert('Provide Blog Title to continue', false);
			return;
		}

		if (!status_id) {
			$('#uptd_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#reg_title, #cat_id, #reg_thumbnail, #uptd_status_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("publish_id", publish_id);
			form_data.append("blog_cat_id", blog_cat_id);
			form_data.append("reg_title", reg_title);
			form_data.append("reg_thumbnail", updt_blog_pix);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/blog/update-blog',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('blog_category', 'blog');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_btn").disabled = false;
	}
}




////////// FAQ SCRIPT////////////////////////
function _fetchAllFaq(page_category_id) {
	const search_keywords = $('#search_keywords').val();
	const status_id = $('#status_id').val();
	$('#fetchAllFaq').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'page_category_id=' + page_category_id + '&status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/faq/fetch-faq',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let text = '';
					let no = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								"<p> " + message + " </p>" +
								'<button class="btn" onclick="_get_form(' + "'faq_reg'" + ')"><i class="bi-person-plus"></i> ADD A NEW FAQ</button>' + "</div>";
						} else {
							for (let i = 0; i < fetch.length; i++) {
								no++;
								const page_category_id = fetch[i].page_category_id;
								const publish_id = fetch[i].publish_id;
								const faq_question = fetch[i].faq_question;
								const faq_answer = fetch[i].faq_answer;

								text +=
									'<div class="faq-back-div" data-aos="fade-in" data-aos-duration="1500">' +
									'<div class="title-div">' +
									'<div class="num">' + no + '</div>' +
									'<button class="btn" onClick="_get_pages_form_with_id(' + "'update_faq'" + "," + "'" + page_category_id + "'" + "," + "'" + publish_id + "'" + ')"><i class="bi-pencil-square"></i> <span>' + faq_question + '</span></button>' +
									'<div class="expand-div" id="' + publish_id + 'num" onclick="_collapse(' + "'" + publish_id + "'" + ')">' +
									'<i class="bi-plus"></i>' +
									'</div>' +
									'</div>' +
									'<div class="answer-div" id="' + publish_id + 'answer">' + faq_answer + '</div>' +
									'</div>';
							}
						}
						$('#fetchAllFaq').html(text);
						sessionStorage.setItem("fetchFaq", JSON.stringify(fetch));
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllFaq').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllFaq').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}


function _fetchEachFaq(categoryIdToFind, publishId) {
	let fetchFaq = JSON.parse(sessionStorage.getItem("fetchFaq"));
	const faqs = fetchFaq.find(s => s.page_category_id === categoryIdToFind && s.publish_id === publishId);

	const faq_cat_id = faqs.faq_cat_id;
	const cat_name = faqs.cat_name;
	const faq_question = faqs.faq_question;
	const faq_answer = faqs.faq_answer;
	const status_id = faqs.status_id;
	const status_name = faqs.status_name;

	setTimeout(function () {
		tinymce.get('faq_answer').setContent(faq_answer);
	}, 2000);

	$('#faq_question').val(faq_question);
	$('#cat_id').append('<option value="' + faq_cat_id + '" selected="selected">' + cat_name + "</option>");
	$('#updt_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
}




function _addFaq(page_category_id) {
	tinyMCE.triggerSave();
	try {

		const faq_cat_id = $('#cat_id').val();
		const faq_question = $('#faq_question').val();
		const faq_answer = $('#faq_answer').val();
		const status_id = $('#status_id').val();

		$('#cat_id, #faq_question, #faq_answer, #status_id').removeClass('issue');

		if (!faq_cat_id) {
			$('#cat_id').addClass("issue");
			_actionAlert('Select FAQ Category to continue', false);
			return;
		}

		if (!faq_question) {
			$('#faq_question').addClass('issue');
			_actionAlert('Provide Faq Question to continue', false);
			return;
		}


		if (!faq_answer) {
			$('#faq_answer').addClass("issue");
			_actionAlert('Provide Faq Answer to continue', false);
			return;
		}

		if (!status_id) {
			$('#status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#cat_id, #faq_question, #faq_answer, #status_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#submit_btn").html();
			$("#submit_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("submit_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("faq_cat_id", faq_cat_id);
			form_data.append("faq_question", faq_question);
			form_data.append("faq_answer", faq_answer);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/faq/add-faq',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('faq_category', 'faq');
					} else {
						_actionAlert(message, false);
					}
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#submit_btn").html(btn_text);
					document.getElementById("submit_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("submit_btn").disabled = false;
	}
}


function _updateFaq(page_category_id, publish_id) {
	tinyMCE.triggerSave();
	try {

		const faq_cat_id = $('#cat_id').val();
		const faq_question = $('#faq_question').val();
		const faq_answer = $('#faq_answer').val();
		const status_id = $('#updt_status_id').val();

		$('#cat_id, #faq_question, #faq_answer, #updt_status_id').removeClass('issue');

		if (!faq_cat_id) {
			$('#cat_id').addClass("issue");
			_actionAlert('Select FAQ Category to continue', false);
			return;
		}

		if (!faq_question) {
			$('#faq_question').addClass('issue');
			_actionAlert('Provide Faq Question to continue', false);
			return;
		}


		if (!faq_answer) {
			$('#faq_answer').addClass("issue");
			_actionAlert('Provide Faq Answer to continue', false);
			return;
		}

		if (!status_id) {
			$('#updt_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#cat_id, #faq_question, #faq_answer, #updt_status_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("page_category_id", page_category_id);
			form_data.append("publish_id", publish_id);
			form_data.append("faq_cat_id", faq_cat_id);
			form_data.append("faq_question", faq_question);
			form_data.append("faq_answer", faq_answer);
			form_data.append("status_id", status_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/faq/update-faq',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('faq_category', 'faq');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_btn").disabled = false;
	}
}





function _fetchAllTestimony() {
	const search_keywords = $('#search_keywords').val();
	const status_id = $('#status_id').val();
	$('#fetchAllTestimony').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	if (search_keywords.length > 2 || search_keywords === '') {
		const dataString = 'status_id=' + status_id + '&search_keywords=' + search_keywords;

		try {
			$.ajax({
				type: "POST",
				url: endPoint + '/admin/testimony/fetch-testimony',
				data: dataString,
				dataType: "json",
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				success: function (info) {
					const fetch = info.data;
					const success = info.success;
					const message = info.message;

					let text = '';
					if (success === true) {
						if (!fetch) {
							text +=
								'<div class="false-notification-div">' +
								'<p> ' + message + ' </p>' +
								'</div>';
						} else {
							for (let i = 0; i < fetch.length; i++) {
								const testimony_id = fetch[i].testimony_id;
								const fullname = fetch[i].fullname;
								const email = fetch[i].email;
								const phone = fetch[i].phone;
								const relationship_type_name = fetch[i].relationship_type_name;
								const status_name = fetch[i].status_name;

								text +=
									'<div class="list">' +
									'<div class="student-profile">' +
									'<div class="details">' +
									'<div class="pix"><img src="' + website_url + '/all-images/images/quote.png" alt="Quote"/></div>' +
									'<div class="text">' +
									'<h3>' + fullname + '</h3>' +
									'<div class="info">' +
									'<div>' +
									'<p>Email: <span>' + email + '</span></p>' +
									'<p>Phone: <span>' + phone + '</span></p>' +
									'<p>Relationship: <span>' + relationship_type_name + '</span></p>' +
									'</div>' +
									'<button class="status-btn ' + status_name + '">' + status_name + '</button>' +
									'</div>' +
									'</div>' +
									'</div>' +
									'<button class="btn" onClick="_get_form_with_id(' + "'update_testimony'" + "," + "'" + testimony_id + "'" + ')">VIEW DETAILS</button>' +
									'</div>' +
									'</div>';
							}
						}
						$('#fetchAllTestimony').html(text);
						sessionStorage.setItem("fetchTestimony", JSON.stringify(fetch));
					} else {
						const response = info.response;
						if (response < 100) {
							_logout();
						}
					}
				},
				error: function (textStatus, errorThrown) {
					console.error("AJAX Error: ", textStatus, errorThrown);
					$('#fetchAllTestimony').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
				}
			});
		} catch (error) {
			console.error("Error: ", error);
			$('#fetchAllTestimony').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
		}
	}
}


function _getSelectRelationship() {
	$.ajax({
		type: "POST",
		url: endPoint + '/setups/fetch-relationship-cat',
		dataType: 'json',
		cache: false,
		headers: {
			'apiKey': apiKey,
		},
		success: function (info) {
			const success = info.success;
			const message = info.message;
			const fetch = info.data;

			if (success == true) {
				for (let i = 0; i < fetch.length; i++) {
					const relationship_type_id = fetch[i].relationship_type_id;
					const relationship_type_name = fetch[i].relationship_type_name;
					$('#relationship_type_id').append('<option value="' + relationship_type_id + '">' + relationship_type_name + '</option>');
				}
			} else {
				_actionAlert(message, false);
			}
		},
	});
}



function _fetchEachTestimony(testimonyId) {
	let fetchTestimony = JSON.parse(sessionStorage.getItem("fetchTestimony"));
	const fetchTest = fetchTestimony.find(s => s.testimony_id === testimonyId);

	const fullname = fetchTest.fullname;
	const email = fetchTest.email;
	const phone = fetchTest.phone;
	const testimony = fetchTest.testimony;
	const relationship_type_id = fetchTest.relationship_type_id;
	const relationship_type_name = fetchTest.relationship_type_name;
	const status_id = fetchTest.status_id;
	const status_name = fetchTest.status_name;

	$('#fullname').val(fullname);
	$('#email').val(email);
	$('#phone').val(phone);
	$('#testimony').val(testimony);
	$('#updt_status_id').append('<option value="' + status_id + '" selected="selected">' + status_name + "</option>");
	$('#relationship_type_id').append('<option value="' + relationship_type_id + '" selected="selected">' + relationship_type_name + "</option>");
}



function _updateTestimony(testimony_id) {
	try {
		const fullname = $('#fullname').val();
		const email = $('#email').val();
		const phone = $('#phone').val();
		const relationship_type_id = $('#relationship_type_id').val();
		const testimony = $('#testimony').val();
		const status_id = $('#updt_status_id').val();

		$('#fullname, #email, #phone, #updt_status_id, #relationship_type_id, #testimony').removeClass('issue');

		if (!fullname) {
			$('#fullname').addClass("issue");
			_actionAlert('Provide Fullname to continue', false);
			return;
		}

		if (!email || $('#email').val().indexOf("@") <= 0) {
			$('#email').addClass("issue");
			_actionAlert('Provide valid email address to continue', false);
			return;
		}

		if (!phone) {
			$('#phone').addClass("issue");
			_actionAlert('Provide Phone Number to continue', false);
			return;
		}

		if (!relationship_type_id) {
			$('#relationship_type_id').addClass("issue");
			_actionAlert('Select Relationship to continue', false);
			return;
		}

		if (!testimony) {
			$('#testimony').addClass("issue");
			_actionAlert('Provide Testimony to continue', false);
			return;
		}

		if (!status_id) {
			$('#updt_status_id').addClass("issue");
			_actionAlert('Select Status to continue', false);
			return;
		}

		$('#fullname, #email, #phone, #updt_status_id, #relationship_type_id, #testimony').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_btn").html();
			$("#update_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Processing');
			document.getElementById("update_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("testimony_id", testimony_id);
			form_data.append("fullname", fullname);
			form_data.append("email", email);
			form_data.append("phone", phone);
			form_data.append("status_id", status_id);
			form_data.append("relationship_type_id", relationship_type_id);
			form_data.append("testimony", testimony);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/testimony/activate-testimony',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
						_alert_close();
						_get_page('testimony_category', 'test');
					} else {
						_actionAlert(message, false);
					}
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_btn").html(btn_text);
					document.getElementById("update_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_btn").disabled = false;
	}
}








function _updateAcademicsSession() {
	try {
		const session = $('#session').val();
		const session_start_date = $('#session_start_date').val();
		const session_end_date = $('#session_end_date').val();
		const semester_id = $('#semester_id').val();

		$('#session, #session_start_date, #session_end_date, #semester_id').removeClass('issue');

		if (!session) {
			$('#session').addClass("issue");
			_actionAlert('Provide Session to continue', false);
			return;
		}
		if (!session_start_date) {
			$('#session_start_date').addClass("issue");
			_actionAlert('Provide session start date to continue', false);
			return;
		}
		if (!session_end_date) {
			$('#session_end_date').addClass("issue");
			_actionAlert('Provide session end date to continue', false);
			return;
		}
		if (!semester_id) {
			$('#semester_id').addClass("issue");
			_actionAlert('Provide semester to continue', false);
			return;
		}

		$('#session, #session_start_date, #session_end_date, #semester_id').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_academic_btn").html();
			$("#update_academic_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Updating');
			document.getElementById("update_academic_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("session", session);
			form_data.append("session_start_date", session_start_date);
			form_data.append("session_end_date", session_end_date);
			form_data.append("semester_id", semester_id);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/settings/update-academics-session',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						sessionStorage.setItem("academicsSessionData", JSON.stringify(info.academicsSessionData));
						_fetchAcademicsSession();
						_actionAlert(message, true);
					} else {
						_actionAlert(message, false);
					}
					$("#update_academic_btn").html(btn_text);
					document.getElementById("update_academic_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_academic_btn").html(btn_text);
					document.getElementById("update_academic_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_academic_btn").disabled = false;
	}
}

function _updateSettings() {
	try {
		const sender_name = $('#sender_name').val();
		const smtp_host = $('#smtp_host').val();
		const smtp_username = $('#smtp_username').val();
		const smtp_password = $('#smtp_password').val();
		const smtp_port = $('#smtp_port').val();
		const support_email = $('#support_email').val();

		$('#sender_name, #smtp_host, #smtp_username, #smtp_password, #smtp_port, #support_email').removeClass('issue');

		if (!sender_name) {
			$('#sender_name').addClass("issue");
			_actionAlert('Provide Sender name to continue', false);
			return;
		}

		if (!smtp_host) {
			$('#smtp_host').addClass("issue");
			_actionAlert('Provide SMTP host Number to continue', false);
			return;
		}

		if (!smtp_username) {
			$('#smtp_username').addClass("issue");
			_actionAlert('Provide SMTP username to continue', false);
			return;
		}

		if (!smtp_password) {
			$('#smtp_password').addClass("issue");
			_actionAlert('Provide SMTP password to continue', false);
			return;
		}

		if (!smtp_port) {
			$('#smtp_port').addClass("issue");
			_actionAlert('Provide SMTP port to continue', false);
			return;
		}

		if (!support_email || $('#support_email').val().indexOf("@") <= 0) {
			$('#support_email').addClass("issue");
			_actionAlert('Provide Support Email to continue', false);
			return;
		}

		$('#sender_name, #smtp_host, #smtp_username, #smtp_password, #smtp_port, #support_email').removeClass('issue');

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_setting_btn").html();
			$("#update_setting_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Updating');
			document.getElementById("update_setting_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("sender_name", sender_name);
			form_data.append("smtp_host", smtp_host);
			form_data.append("smtp_username", smtp_username);
			form_data.append("smtp_password", smtp_password);
			form_data.append("smtp_port", smtp_port);
			form_data.append("support_email", support_email);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/settings/update-settings',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
					} else {
						_actionAlert(message, false);
					}
					$("#update_setting_btn").html(btn_text);
					document.getElementById("update_setting_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_setting_btn").html(btn_text);
					document.getElementById("update_setting_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_setting_btn").disabled = false;
	}
}

function _fetchSettings() {
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/settings/fetch-settings',
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					const data = info.data[0];
					const sender_name = data.sender_name;
					const smtp_host = data.smtp_host;
					const smtp_username = data.smtp_username;
					const smtp_password = data.smtp_password;
					const smtp_port = data.smtp_port;
					const support_email = data.support_email;

					const phone_number = data.phone_number;
					const whatsapp_number = data.whatsapp_number;
					const email_address = data.email_address;
					const instagram_link = data.instagram_link;

					// SMTP DETAILS
					$('#sender_name').val(sender_name);
					$('#smtp_host').val(smtp_host);
					$('#smtp_username').val(smtp_username);
					$('#smtp_password').val(smtp_password);
					$('#smtp_port').val(smtp_port);
					$('#support_email').val(support_email);

					// CONTACT DETAILS
					$('#phone_number').val(phone_number);
					$('#whatsapp_number').val(whatsapp_number);
					$('#email_address').val(email_address);
					$('#instagram_link').val(instagram_link);

				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						_actionAlert(message, false);
					}
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

function _updateContact() {
	try {
		const phone_number = $('#phone_number').val();
		const whatsapp_number = $('#whatsapp_number').val();
		const email_address = $('#email_address').val();
		const instagram_link = $('#instagram_link').val();

		$('#phone_number, #whatsapp_number, #email_address, #instagram_link').removeClass('issue');

		if (!phone_number) {
			$('#phone_number').addClass("issue");
			_actionAlert('Provide phone number to continue', false);
			return;
		}
		if (!whatsapp_number) {
			$('#whatsapp_number').addClass("issue");
			_actionAlert('Provide whatsapp to continue', false);
			return;
		}
		if (!email_address) {
			$('#email_address').addClass("issue");
			_actionAlert('Provide email address to continue', false);
			return;
		}
		if (!instagram_link) {
			$('#semester_id').addClass("issue");
			_actionAlert('Provide instagram link to continue', false);
			return;
		}

		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_contact_btn").html();
			$("#update_contact_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Updating');
			document.getElementById("update_contact_btn").disabled = true;

			const form_data = new FormData();
			form_data.append("phone_number", phone_number);
			form_data.append("whatsapp_number", whatsapp_number);
			form_data.append("email_address", email_address);
			form_data.append("instagram_link", instagram_link);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/settings/update-contact',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (info) {
					const success = info.success;
					const message = info.message;

					if (success === true) {
						_actionAlert(message, true);
					} else {
						_actionAlert(message, false);
					}
					$("#update_contact_btn").html(btn_text);
					document.getElementById("update_contact_btn").disabled = false;
				},
				error: function (error) {
					_actionAlert('An error occurred while processing your request: ' + error, false);
					$("#update_contact_btn").html(btn_text);
					document.getElementById("update_contact_btn").disabled = false;
				}
			});
		}
	} catch (error) {
		_actionAlert('An unexpected error occurred: ' + error.message, false);
		document.getElementById("update_contact_btn").disabled = false;
	}
}



function _changePassword() {
	const old_password = $('#old_password').val();
	const new_password = $('#new_password').val();
	const confirm_password = $('#confirm_password').val();

	$('#old_password, #new_password, #confirm_password').removeClass('complain');

	if (!old_password) {
		$('#old_password').addClass('issue');
		_actionAlert('Provide Old Password To Continue', false);

	} else if (!new_password) {
		$('#new_password').addClass('issue');
		_actionAlert('Provide New Password To Continue', false);

	} else if (!confirm_password) {
		$('#confirm_password').addClass('issue');
		_actionAlert('Provide Password To Continue', false);

	} else if (new_password != confirm_password) {
		$('#new_password, #confirm_password').addClass('complain');
		_actionAlert('Password Not Match', false);

	} else if (new_password.length < 8) {
		$('#new_password,#confirm_password').addClass("complain");
		_actionAlert('Password Not Accepted, Please follow the instructon', false);

	} else if (new_password.match(/^(?=[^A-Z]*[A-Z])(?=[^!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]*[!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~])(?=\D*\d).{8,}$/)) {

		$('#old_password, #new_password, #confirm_password').removeClass('complain');

		//////////////// get btn text ////////////////
		if (confirm("Confirm!!\n\n Are you sure to PERFORM THIS ACTION?")) {
			const btn_text = $("#update_password_btn").html();
			$("#update_password_btn").html('<img src="' + website_url + '/all-images/images/loading.gif" width="12px" alt="Loading"/> Resetting');
			document.getElementById("update_password_btn").disabled = true;
			////////////////////////////////////////////////

			const form_data = new FormData();
			form_data.append("old_password", old_password);
			form_data.append("new_password", new_password);
			form_data.append("confirm_password", confirm_password);

			$.ajax({
				type: "POST",
				url: endPoint + '/admin/settings/change-password',
				data: form_data,
				dataType: "json",
				contentType: false,
				cache: false,
				headers: {
					'apiKey': apiKey,
					'Authorization': 'Bearer ' + login_access_key
				},
				processData: false,
				success: function (data) {
					const success = data.success;
					const message = data.message;

					if (success == true) {
						_actionAlert(message, true);
						_get_form('access_key_validation_info');
					} else {
						_actionAlert(message, false);
					}
					$("#update_password_btn").html(btn_text);
					document.getElementById("update_password_btn").disabled = false;
				},
				error: function (error) {
					console.log(error);
					_actionAlert('An error occurred. Please try again', false);
					$("#update_password_btn").html(btn_text);
					document.getElementById("update_password_btn").disabled = false;
				}
			});
		}
	} else {
		$('#new_password,#confirm_password').addClass("complain");
		_actionAlert('Password Not Accepted, Please follow the instructon', false);
	}
}




function _fetchDashboardAlert() {
	$('#fetchDashboardAlert').html('<div class="ajax-loader pages-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/settings/fetch-dashboard-alert',
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const fetch = info.data;
				const success = info.success;
				const message = info.message;

				let text = '';
				if (success === true) {
					if (!fetch) {
						text +=
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'</div>';
					} else {
						for (let i = 0; i < fetch.length; i++) {
							const alert_id = fetch[i].alert_id;
							const user_name = capitalizeFirstLetterOfEachWord(fetch[i].user_name);
							const alert_detail = fetch[i].alert_detail.substr(0, 55);
							const created_time = fetch[i].created_time;

							text +=
								'<div class="system-alert" id="' + alert_id + '" onclick="_get_form_with_id(' + "'alert-read'" + "," + "'" + alert_id + "'" + ')">' +
								'<div class="alert-name"><i class="bi-person"></i> ' + user_name + '<span id="' + alert_id + 'viewed"><i class="bi-check"></i></span></div>' +
								'<div class="alert-text">Success Alert: ' + alert_detail + '...</div>' +
								'<div class="alert-time"><i class="bi-clock"></i> <span>' + created_time + '</span></div>' +
								'</div>';
						}
					}
					$('#fetchDashboardAlert').html(text);
				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					}
				}
			},
			error: function (textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				$('#fetchDashboardAlert').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		$('#fetchDashboardAlert').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
	}
}



function getNotificationNumber() {
	$.ajax({
		type: "POST",
		url: endPoint + '/admin/settings/fetch-dashboard-alert',
		dataType: "json",
		cache: false,
		headers: {
			'apiKey': apiKey,
			'Authorization': 'Bearer ' + login_access_key
		},
		success: function (info) {
			const success = info.success;
			const unread_alert = info.unread_alert;

			if (success == true) {
				if (unread_alert === undefined || unread_alert === null) {
					unread_alert = 0;
				}
				if (unread_alert >= 100) {
					$('.bell_notification').html('<i class="bi-bell"></i><div>99+</div>');
				} else {
					$('.bell_notification').html('<i class="bi-bell"></i><div>' + unread_alert + '</div>');
				}
			} else {
				const response = info.response;
				if (response < 100) {
					_logout();
				}
			}
		}
	});
}



function _read_alert(alert_id) {
	$('#' + alert_id + 'viewed').html('<i class="bi-check2-all"></i>');
	$('#' + alert_id).addClass('system-alert alert-seen');
}



function _fetchReadAlert(alert_id) {
	const dataString = 'alert_id=' + alert_id;
	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/settings/fetch-system-alert',
			data: dataString,
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const success = info.success;
				const message = info.message;

				if (success == true) {
					const data = info.data[0];
					const alert_id = data.alert_id;
					const user_id = data.user_id;
					const user_name = capitalizeFirstLetterOfEachWord(data.user_name);
					const ip_address = data.ip_address;
					const system_name = data.system_name;
					const created_time = data.created_time;
					const alert_detail = data.alert_detail;

					$('#alert_id').html(alert_id);
					$('#read_user_id').html(user_id);
					$('#user_name').html(user_name);
					$('#ip_address').html(ip_address);
					$('#system_name').html(system_name);
					$('#created_time').html(created_time);
					$('#alert_detail').html(alert_detail);
					_read_alert(alert_id);
					get_notification_number();

				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					} else {
						_actionAlert(message, false);
					}
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



function _getAlertReport(id, view_report) {
	$('#srch-text').html($('#' + id).html());
	$('.custom-srch-div').fadeOut(500);
	var dataString = 'view_report=' + view_report;
	_fetchAllSystemAlert(dataString);
}



function _getCustomReport(datefrom, dateto, view_report) {
	var datefrom = $('#datepicker-from').val();
	var dateto = $('#datepicker-to').val();
	var dataString = 'datefrom=' + datefrom + "&dateto=" + dateto + "&view_report=" + view_report;

	if ((datefrom == '') || (dateto == '')) {
		$('#datepicker-from, #datepicker-to').addClass('complain');
		$('#warning-div').html('<div><i class="bi-exclamation-circle"></i></div>DATE ERROR<br /> <span>Select date to continue</span>').fadeIn(500).delay(3000).fadeOut(100);
	} else {
		$('#datepicker-from, #datepicker-to').removeClass('complain');
		_fetchAllSystemAlert(dataString);
	}
}



function _fetchAllSystemAlert(dataString) {
	$('#fetchAllSystemAlert').html('<div class="ajax-loader alert-ajax-loader"><img src="' + website_url + '/all-images/images/spinner.gif" alt="Loading"/></div>').fadeIn("fast");

	try {
		$.ajax({
			type: "POST",
			url: endPoint + '/admin/settings/fetch-system-alert',
			data: dataString,
			dataType: "json",
			cache: false,
			headers: {
				'apiKey': apiKey,
				'Authorization': 'Bearer ' + login_access_key
			},
			success: function (info) {
				const fetch = info.data;
				const success = info.success;
				const message = info.message;
				const date_from = info.date_from;
				const date_to = info.date_to;
				const view_from = info.view_from;
				const view_to = info.view_to;
				const all_record_count = info.all_record_count;

				let text = '';
				if (success === true) {
					if (!fetch) {
						text +=
							'<div class="false-notification-div">' +
							'<p> ' + message + ' </p>' +
							'</div>';
					} else {
						for (let i = 0; i < fetch.length; i++) {
							const alert_id = fetch[i].alert_id;
							const user_name = capitalizeFirstLetterOfEachWord(fetch[i].user_name);
							const alert_detail = fetch[i].alert_detail.substr(0, 55);
							const created_time = fetch[i].created_time;
							const seen_status = fetch[i].seen_status;

							if (seen_status == 0) {
								text +=
									'<div class="system-alert main-system-alert" id="' + alert_id + '" onclick="_get_form_with_id(' + "'alert-read'" + "," + "'" + alert_id + "'" + ')">' +
									'<div class="alert-name"><i class="bi-person"></i> ' + user_name + '<span id="' + alert_id + 'viewed"><i class="bi-check2"></i></span></div>' +
									'<div class="alert-text">Success Alert: ' + alert_detail + '...</div>' +
									'<div class="alert-time"><i class="bi-clock"></i> <span>' + created_time + '</span></div>' +
									'</div>';
							} else {
								text +=
									'<div class="system-alert main-system-alert alert-seen" id="' + alert_id + '" onclick="_get_form_with_id(' + "'alert-read'" + "," + "'" + alert_id + "'" + ')">' +
									'<div class="alert-name"><i class="bi-person"></i> ' + user_name + '<span id="' + alert_id + 'viewed"><i class="bi-check2-all"></i></span></div>' +
									'<div class="alert-text">Success Alert: ' + alert_detail + '...</div>' +
									'<div class="alert-time"><i class="bi-clock"></i> <span>' + created_time + '</span></div>' +
									'</div>';
							}
						}
					}
					_fetchDashboardAlert();

					$('#date_from').html(date_from);
					$('#date_to').html(date_to);
					$('#view_from').html(view_from);
					$('#view_to').html(view_to);
					$('#all_record_count').html(all_record_count);

					$('#fetchAllSystemAlert').html(text);
				} else {
					const response = info.response;
					if (response < 100) {
						_logout();
					}
				}
			},
			error: function (textStatus, errorThrown) {
				console.error("AJAX Error: ", textStatus, errorThrown);
				$('#fetchAllSystemAlert').html('<div class="false-notification-div"><p>An error occurred while fetching data. Please try again.</p></div>');
			}
		});
	} catch (error) {
		console.error("Error: ", error);
		$('#fetchAllSystemAlert').html('<div class="false-notification-div"><p>An unexpected error occurred. Please try again.</p></div>');
	}
}




function _fetchNextAlerts() {
	const search_keywords = $("#search_keywords").val();
	const view_to = $("#view_to").html();
	const view_from = parseInt(view_to);
	const all_record_count = parseInt($("#all_record_count").html());

	if (view_to < all_record_count) {
		const dataString = 'search_keywords=' + search_keywords + '&view_from=' + view_from;
		_fetchAllSystemAlert(dataString);
	}
}



function _fetchPreviousAlerts() {
	const search_keywords = $("#search_keywords").val();
	var view_from = $("#view_from").html();
	var view_from = parseInt(view_from - 51);

	if (view_from >= 0) {
		const dataString = 'search_keywords=' + search_keywords + '&view_from=' + view_from;
		_fetchAllSystemAlert(dataString);
	}
}



function _fetchAlertByKeywords() {
	const search_keywords = $("#search_keywords").val();
	if (search_keywords.length > 2 || search_keywords == '') {

		const dataString = 'search_keywords=' + search_keywords;
		_fetchAllSystemAlert(dataString);
	} else {
		////
	}
}