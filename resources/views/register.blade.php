<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

			.login-page {
			  width: 360px;
			  padding: 8% 0 0;
			  margin: auto;
			}
			.form {
			  position: relative;
			  z-index: 1;
			  background: #FFFFFF;
			  max-width: 360px;
			  margin: 0 auto 100px;
			  padding: 45px;
			  text-align: center;
			  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
			}
			.form input {
			  font-family: "Roboto", sans-serif;
			  outline: 0;
			  background: #f2f2f2;
			  width: 100%;
			  border: 0;
			  margin: 0 0 15px;
			  padding: 15px;
			  box-sizing: border-box;
			  font-size: 14px;
			}
			.form .register {
			  font-family: "Roboto", sans-serif;
			  text-transform: uppercase;
			  outline: 0;
			  background: #4CAF50;
			  width: 100%;
			  border: 0;
			  padding: 15px;
			  color: #FFFFFF;
			  font-size: 14px;
			  -webkit-transition: all 0.3 ease;
			  transition: all 0.3 ease;
			  cursor: pointer;
			}
			.form .register:hover,.form .register:active,.form .register:focus {
			  background: #43A047;
			}
			.form .message {
			  margin: 15px 0 0;
			  color: #b3b3b3;
			  font-size: 12px;
			}
			.form .message a {
			  color: #4CAF50;
			  text-decoration: none;
			}
			.container {
			  position: relative;
			  z-index: 1;
			  max-width: 300px;
			  margin: 0 auto;
			}
			.container:before, .container:after {
			  content: "";
			  display: block;
			  clear: both;
			}
			.container .info {
			  margin: 50px auto;
			  text-align: center;
			}
			.container .info h1 {
			  margin: 0 0 15px;
			  padding: 0;
			  font-size: 36px;
			  font-weight: 300;
			  color: #1a1a1a;
			}
			.container .info span {
			  color: #4d4d4d;
			  font-size: 12px;
			}
			.container .info span a {
			  color: #000000;
			  text-decoration: none;
			}
			.container .info span .fa {
			  color: #EF3B3A;
			}
			body {
			  background: #76b852; /* fallback for old browsers */
			  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
			  background: -moz-linear-gradient(right, #76b852, #8DC26F);
			  background: -o-linear-gradient(right, #76b852, #8DC26F);
			  background: linear-gradient(to left, #76b852, #8DC26F);
			  font-family: "Roboto", sans-serif;
			  -webkit-font-smoothing: antialiased;
			  -moz-osx-font-smoothing: grayscale;      
			}
			
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></style></style>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
		.alert {
				padding: 14px;
				margin-right: auto;
				margin-left: auto;
				width: 50%;
				text-align: center;
			}
		</style>
    </head>
    <body>
		@if($errors->has())
			@foreach ($errors->all() as $error)
				<div>{{ $error }}</div>
			@endforeach
		@endif
		<?php if(Session::has('msgInfo')) { 
			$errormsg = implode(Session::get('msgInfo'),' , '); ?>
			<div class="alert alert-danger">
				<?php echo $errormsg; ?>
			</div>
		<?php 
			}
		?>
			
		<?php if(Session::has('successMsg')) { ?>
			<div class="alert alert-success">
				<?php echo Session::get('successMsg'); ?>
			</div>
		<?php } if (Session::has('errorMsg')) { ?>
			<div class="alert alert-danger">
				<?php echo Session::get('errorMsg'); ?>
			</div>
		<?php } ?>
		<div class="login-page">
			<div class="form">
				<form class="register-form" id="register_form" name="register_form" method="post">
					<div class="form-group">
						<input type="text" name="name" id="name" placeholder="name"/>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" placeholder="password"/>
					</div>
					<div class="form-group">
						<input type="password" name="cpassword" id="cpassword" placeholder="confirm password"/>
					</div>
					<div class="form-group">
						<input type="text" name="email" id="email" placeholder="email address"/>
					</div>
					<input  class="register" type="submit" id="register" name="register" value="register">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
					<p class="message" id="registerMsg">Already registered? <a href="{{ url('/') }}">Sign In</a></p>
				</form>
			</div>
		</div>
    </body>
</html>
