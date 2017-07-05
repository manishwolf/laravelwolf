<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Pannel</title>

<!-- CSS -->
<link href="{{ url('/') }}/public/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="{{ url('/') }}/public/js/jquery.js"></script>
<script type="text/javascript" src="{{ url('/') }}/public/js/jNice.js"></script>
<script type="text/javascript" src="{{ url('/') }}/public/js/validation.js"></script>
<script type="text/javascript" src="{{ url('/') }}/public/js/script.js"></script>
<style>
.form__error {
    text-align: left;
    margin-top: 5px;
    font-size: .8rem;
    color: #c0392b;
}
.has-error{
    border-color: #a94442;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
</style>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>

  .alert {
    color: #414042;
    background-color: #fbfbfb;
    border: 1px solid #cccccc;
    position: relative;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
    -o-border-radius: 5px;
    -ms-border-radius: 5px;
    text-align: center;
    border-radius: 5px;
    margin: 13px auto 0px auto;
    padding: 10px 0px;
    width: 72%;
}
.alert-success {
    color: #468847;
    background-color: #dff0d8;
    border-color: #d6e9c6;
}
.alert-danger {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1; }
 .close {
  float: right;
  font-size: 21px;
  font-weight: bold;
  line-height: 1;
  color: #000;
  text-shadow: 0 1px 0 #fff;
  filter: alpha(opacity=20);
  opacity: .2; }

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  filter: alpha(opacity=50);
  opacity: .5; }


</style>

</head>

<body>
	


	
	<?php if(Session::has('msgInfo')) { 
			foreach((Session::get('msgInfo')) as $error) { ?>
				<div class="alert alert-danger">
					<?php echo $error; ?>
				</div>
		<?php } 
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
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>Book Manage System</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="{{ url('/') }}/home" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li class="logout"><a href="{{ url('/') }}/logout">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="{{ url('/') }}/home" @if ($title =='viewBook') class="active" @endif  >View Books</a></li>
                    	<li><a href="{{ url('/') }}/addbook" @if ($title =='addBook') class="active" @endif >Add Book</a></li>
                    	<!--<li><a href="{{ url('/') }}/addbook">Reset Password</a></li>-->
                    </ul>
                    <!-- // .sideNav -->
                </div>   
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <div class='container'>
					{!! $content !!}
                <!-- // #main -->
					</div>
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer">Laravel  <a href="">Testing Site</a></p>
    </div>
    <!-- // #wrapper -->
</body>
</html>


