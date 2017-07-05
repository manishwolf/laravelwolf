$(document).ready(function () {
	$("#login_form").validate({
		debug: true,
		errorElement:'p',
		rules: {
			'email':{
			   required: true,
			   
			},
			'password': {
			 required: true,	
			}
		},
		messages: {
			'email':{
				   required: 'Please enter email address.',
				   
			},
			'password':{
				   required: 'Please enter password.',	
			}
		},
		errorClass: 'form__error',
		highlight: function(element) {
			$(element).parent('div').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).parent('div').removeClass('has-error');
		},
		submitHandler: function(form){
			form.submit();
		}
	});

	$("#userProfile").validate({
		debug: true,
		errorElement:'p',
		ignore: [],
		rules: {
			'firstName':{
			   required: true,
			},
			'lastName':{
			   required: true,
			},
			'department': {
			 required: true,	
			},
			'position': {
			 required: true,	
			},
			'bankLabel[]': {
			 required: true,	
			},
			'bankInfo[]': {
			 required: true,	
			},
			/*'manager': {
			 required: true,	
			},*/
			'accountType': {
			 required: true,	
			},
			'signature': {
			 required: true,	
			},
			'mobile': {
			 required: true,
			 number: true	
			},
		},
		messages: {
			'firstName':{
				   required: 'Please enter first name.',
			},
			'lastName':{
				   required: 'Please enter last name.',
			},
			'department':{
				   required: 'Please choose department.',
			},
			'position':{
				   required: 'Please choose position.',
			},
			'bankLabel[]':{
				   required: 'Please enter bank label.',
			},
			'bankInfo[]':{
				   required: 'Please enter bank information.',
			},
			/*'manager':{
				   required: 'Please choose manager.',
			},*/
			'accountType':{
				   required: 'Please set a primary account.',
			},
			'signature':{
				   required: 'Please upload signature image.',
			},
			'mobile':{
				   required: 'Please enter mobile number.',
				   number: 'Please enter valid mobile number',
			},
		},
		errorClass: 'form__error',
		highlight: function(element) {
			$(element).parent('div').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).parent('div').removeClass('has-error');
		},
		submitHandler: function(form){
			form.submit();
		}
	});
	$("#addBook").click(function() {
		if($("#category").val() == '') {
			$("#categoryErr").html("Please select category");
		} else {
			$("#categoryErr").html("");
		}
		$("#bookform").validate({
			debug: true,
			errorElement:'p',
			rules: {
				'bookName':{
				   required: true,
				   
				},
				'category':{
				   required: true
				   
				},
				'desc':{
				   required: true,
				   
				},
				'publishBy': {
				 required: true,	
				}
			},
			messages: {
				'bookName':{
					   required: 'Please enter book name.',
					   
				},
				'category':{
					   required: 'Please select category.'
					   
				},
				'publishBy':{
					   required: 'Please enter publisher name.',
					   
				},
				'desc':{
					   required: 'Please enter description.',	
				}
			},
			errorClass: 'form__error',
			highlight: function(element) {
				$(element).addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).removeClass('has-error');
			},
			submitHandler: function(form){
				form.submit();
			}
		});
	});
	$("#editBook").click(function() {
		if($("#category").val() == '') {
			$("#categoryErr").html("Please select category");
		} else {
			$("#categoryErr").html("");
		}
		$("#bookeditform").validate({
			debug: true,
			errorElement:'p',
			rules: {
				'bookName':{
				   required: true,
				   
				},
				'category':{
				   required: true
				   
				},
				'desc':{
				   required: true,
				   
				},
				'publishBy': {
				 required: true,	
				}
			},
			messages: {
				'bookName':{
					   required: 'Please enter book name.',
					   
				},
				'category':{
					   required: 'Please select category.'
					   
				},
				'publishBy':{
					   required: 'Please enter publisher name.',
					   
				},
				'desc':{
					   required: 'Please enter description.',	
				}
			},
			errorClass: 'form__error',
			highlight: function(element) {
				$(element).addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).removeClass('has-error');
			},
			submitHandler: function(form){
				form.submit();
			}
		});
	});
	
	
});
