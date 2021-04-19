"use strict";


// Class definition
var KTProfile = function () {
	// Elements
	var avatar;
	var offcanvas;

	// Private functions
	var _initAside = function () {
		// Mobile offcanvas for mobile mode
		offcanvas = new KTOffcanvas('kt_profile_aside', {
			overlay: true,
			baseClass: 'offcanvas-mobile',
			//closeBy: 'kt_user_profile_aside_close',
			toggleBy: 'kt_subheader_mobile_toggle'
		});
	}

	var _initForm = function () {
		avatar = new KTImageInput('kt_profile_avatar');
	}
	var profile_post = () => {
		// $('#submitButton').click(()=>{ 
		// 	alert('a');
		// 	var formData = new FormData();
		//     formData.append("file",$('#profile_avatar')[0].files[0]);
		//     ajax.
		// });




	}
	var validation = function () {
		FormValidation.formValidation(
			document.getElementById('profileinformation'),
			{
				fields: {
					firstname: {
						validators: {
							notEmpty: {
								message: 'First is required'
							}
						}
					},
					lastname: {
						validators: {
							notEmpty: {
								message: 'First is required'
							}
						}
					},
					website: {
						validators: {
							notEmpty: {
								message: 'Website URL is required'
							},
							uri: {
								message: 'The website address is not valid'
							}
						}
					},

					aboutme: {
						validators: {
							notEmpty: {
								message: 'Please enter about text'
							},
							stringLength: {
								min: 50,
								max: 100,
								message: 'Please enter a menu within text length range 50 and 100'
							}
						}
					},
				},

				plugins: { //Learn more: https://formvalidation.io/guide/plugins
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
				}
			}
		);
	}

	return {
		// public functions
		init: function () {
			_initAside();
			_initForm();
			profile_post();
		}
	};
}();

jQuery(document).ready(function () {
	KTProfile.init();
	var formData = new FormData($('#infoup')[0]);
	var files = $('#profile_avatar')[0].files;
	formData.append('file',files[0]);
	//formData.append('username', 'Chris');
	//formData.append('userpic', $('#profile_avatar')[0].files[0]);
	//data.append('file', ;
	$('#submitButton').click(() => {
		$.ajax({
			url: window.self.location.pathname,
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			type: "POST",
			data: formData,
			enctype: 'multipart/form-data',
			processData: false,  // tell jQuery not to process the data
			contentType: false   // tell jQuery not to set contentType
		})
		// axios.post(window.self.location.pathname, document.getElementById('profile_avatar').files[0], {
		// 	headers: {
		// 		'Content-Type': 'multipart/form-data'
		// 	}
		// })
		// 	.then(response => {

		// 		console.log(response);
		// 	})
		// 	.catch(error => console.error(error));
	});
});