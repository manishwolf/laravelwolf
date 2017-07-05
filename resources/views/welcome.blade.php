
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></style></style>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <head>
		
        <title>Laravel</title>
        

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            
        </style>
    </head>
    <body>
		<?php if(Session::has('successMsg')) { ?>
			<div class="alert alert-success">
				<?php echo Session::get('successMsg'); ?>
			</div>
		<?php } if (Session::has('errorMsg')) { ?>
			<div class="alert alert-danger">
				<?php echo Session::get('errorMsg'); ?>
			</div>
		<?php } ?>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
